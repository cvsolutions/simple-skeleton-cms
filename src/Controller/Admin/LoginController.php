<?php
/**
 * This file is part of the Simple Skeleton CMS package.
 *
 * (c) Concetto Vecchio <info@cvsolutions.it>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace SimpleSkeletonCMS\Controller\Admin;

use Delight\Auth\AttemptCancelledException;
use Delight\Auth\AuthError;
use Delight\Auth\EmailNotVerifiedException;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;
use Exception;
use SimpleSkeletonCMS\Controller\AbstractController;
use SimpleSkeletonCMS\Utility\MessagesUtil;
use Valitron\Validator;

/**
 * Class LoginController
 * @package SimpleSkeletonCMS\Controller\Admin
 */
class LoginController extends AbstractController
{
    const REDIRECT = '/admin/dashboard';

    /**
     * @return string
     */
    public function index(): string
    {
        if ($this->auth->check()) {
            $this->redirect(self::REDIRECT);
        }
        if ($this->request->getMethod() === 'POST') {
            $formData         = array_map('trim', $this->request->request->all());
            $remember         = isset($formData['remember']) ? 1 : 0;
            $rememberDuration = null;
            if ($remember == 1) {
                $this->auth::createRememberCookieName();
                $rememberDuration = $remember == 1 ? (int)(60 * 60 * 24 * 365.25) : null;
            }
            try {
                // Easy CSRF
                $this->easyCSRF->check('csrf_token', $formData['token'], (60 * 60));
                // Validation of the fields of the form
                Validator::lang('it');
                $validator = new Validator($formData);
                $validator->rule('required', ['usermail', 'pwd']);
                $validator->rule('email', 'usermail');
                $validator->labels(['usermail' => 'Indirizzo email', 'pwd' => 'Password']);
                if (!$validator->validate()) {
                    throw new Exception($this->getErrors($validator->errors()));
                }
            } catch (Exception $e) {
                $this->session->getFlashBag()->add('danger', $e->getMessage());
            }
            try {
                $this->auth->login($formData['usermail'], $formData['pwd'], $rememberDuration);
                $this->redirect(self::REDIRECT);
            } catch (AttemptCancelledException |
            TooManyRequestsException |
            InvalidPasswordException |
            InvalidEmailException |
            EmailNotVerifiedException |
            AuthError $e) {
                $this->session->getFlashBag()->add('danger', MessagesUtil::MSG_NO_ACCESS_ALLOWED);
            }
        }
        return $this->view->render('admin::login', [
            'token' => $this->easyCSRF->generate('csrf_token'),
        ]);
    }
}
