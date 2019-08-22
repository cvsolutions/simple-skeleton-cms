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
use Delight\Auth\Auth;
use Delight\Auth\AuthError;
use Delight\Auth\EmailNotVerifiedException;
use Delight\Auth\InvalidEmailException;
use Delight\Auth\InvalidPasswordException;
use Delight\Auth\TooManyRequestsException;
use SimpleSkeletonCMS\Service\TemplateService;
use SimpleSkeletonCMS\Utility\MessagesUtil;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class LoginController
 * @package SimpleSkeletonCMS\Controller\Admin
 */
class LoginController
{
    /**
     * @var TemplateService
     */
    protected $templateService;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Auth
     */
    protected $auth;

    /**
     * @var Session
     */
    protected $session;

    /**
     * LoginController constructor.
     * @param TemplateService $templateService
     * @param Request $request
     * @param Auth $auth
     * @param Session $session
     */
    public function __construct(TemplateService $templateService, Request $request, Auth $auth, Session $session)
    {
        $this->templateService = $templateService;
        $this->request = $request;
        $this->auth = $auth;
        $this->session = $session;
    }

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
                (new RedirectResponse('/admin/dashboard'))->send();
                exit();
            } catch (AttemptCancelledException $e) {
                $this->session->getFlashBag()->add('danger', MessagesUtil::NO_ACCESS_ALLOWED);
            } catch (AuthError $e) {
                $this->session->getFlashBag()->add('danger', MessagesUtil::NO_ACCESS_ALLOWED);
            } catch (EmailNotVerifiedException $e) {
                $this->session->getFlashBag()->add('danger', MessagesUtil::NO_ACCESS_ALLOWED);
            } catch (InvalidEmailException $e) {
                $this->session->getFlashBag()->add('danger', MessagesUtil::NO_ACCESS_ALLOWED);
            } catch (InvalidPasswordException $e) {
                $this->session->getFlashBag()->add('danger', MessagesUtil::NO_ACCESS_ALLOWED);
            } catch (TooManyRequestsException $e) {
                $this->session->getFlashBag()->add('danger', MessagesUtil::NO_ACCESS_ALLOWED);
            }
        }
        return $this->templateService->render('admin::login', []);
    }
}
