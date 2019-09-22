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

namespace SimpleSkeletonCMS\Controller;

use Delight\Auth\Auth;
use SimpleSkeletonCMS\Service\TemplateService;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class AbstractController
 * @package SimpleSkeletonCMS\Controller
 */
abstract class AbstractController
{
    /**
     * @var TemplateService
     */
    protected $view;

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
     * AbstractController constructor.
     * @param TemplateService $templateService
     * @param Request $request
     * @param Auth $auth
     * @param Session $session
     */
    public function __construct(TemplateService $templateService, Request $request, Auth $auth, Session $session)
    {
        $this->view    = $templateService;
        $this->request = $request;
        $this->auth    = $auth;
        $this->session = $session;
    }

    /**
     * @param string $url
     * @return RedirectResponse
     */
    public function redirect(string $url): RedirectResponse
    {
        return (new RedirectResponse($url))->send();
    }

    /**
     * @param string $type
     * @param string $message
     */
    public function addMessage(string $type, string $message)
    {
        $this->session->getFlashBag()->add($type, $message);
    }
}
