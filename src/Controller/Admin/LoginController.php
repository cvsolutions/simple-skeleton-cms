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
use SimpleSkeletonCMS\Controller\AbstractController;
use SimpleSkeletonCMS\Utility\MessagesUtil;

/**
 * Class LoginController
 * @package SimpleSkeletonCMS\Controller\Admin
 */
class LoginController extends AbstractController
{
    /**
     * @return string
     */
    public function index(): string
    {
        if ($this->request->getMethod() === 'POST') {
            $formData = array_map('trim', $this->request->request->all());
            $remember = isset($formData['remember']) ? 1 : 0;
            $rememberDuration = null;
            if ($remember == 1) {
                $this->auth::createRememberCookieName();
                $rememberDuration = $remember == 1 ? (int)(60 * 60 * 24 * 365.25) : null;
            }
            try {
                $this->auth->login($formData['usermail'], $formData['pwd'], $rememberDuration);
                $this->redirect('/admin/dashboard');
            } catch (AttemptCancelledException | TooManyRequestsException | InvalidPasswordException | InvalidEmailException | EmailNotVerifiedException | AuthError $e) {
                $this->session->getFlashBag()->add('danger', MessagesUtil::MSG_NO_ACCESS_ALLOWED);
            }
        }
        return $this->view->render('admin::login', []);
    }
}
