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

use SimpleSkeletonCMS\Service\TemplateService;
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
     * @var Session
     */
    protected $session;

    /**
     * LoginController constructor.
     * @param TemplateService $templateService
     * @param Request $request
     * @param Session $session
     */
    public function __construct(TemplateService $templateService, Request $request, Session $session)
    {
        $this->templateService = $templateService;
        $this->request = $request;
        $this->session = $session;
    }

    /**
     * @return string
     */
    public function index(): string
    {
        if ($this->request->getMethod() === 'POST') {
            $formData = array_map('trim', $this->request->request->all());
            // $this->session->getFlashBag()->add('danger', $e->getMessage());
        }
        return $this->templateService->render('admin::login', []);
    }
}
