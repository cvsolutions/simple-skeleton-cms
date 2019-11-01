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
use EasyCSRF\EasyCSRF;
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
     * @var EasyCSRF
     */
    protected $easyCSRF;

    /**
     * AbstractController constructor.
     * @param TemplateService $view
     * @param Request $request
     * @param Auth $auth
     * @param Session $session
     * @param EasyCSRF $easyCSRF
     */
    public function __construct(
        TemplateService $view,
        Request $request,
        Auth $auth,
        Session $session,
        EasyCSRF $easyCSRF
    ) {
        $this->view     = $view;
        $this->request  = $request;
        $this->auth     = $auth;
        $this->session  = $session;
        $this->easyCSRF = $easyCSRF;
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

    /**
     * @param array $errors
     * @return string
     */
    public function getErrors(array $errors): string
    {
        $data = '<ul class="list-unstyled">';
        foreach ($errors as $field) {
            foreach ($field as $item) {
                $data .= sprintf('<li>%s</li>', $item);
            }
        }
        $data .= '</ul>';
        return $data;
    }
}
