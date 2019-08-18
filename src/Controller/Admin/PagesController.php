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

/**
 * Class PagesController
 * @package SimpleSkeletonCMS\Controller\Admin
 */
class PagesController
{
    /**
     * @var TemplateService
     */
    protected $templateService;

    /**
     * PagesController constructor.
     * @param TemplateService $templateService
     */
    public function __construct(TemplateService $templateService)
    {
        $this->templateService = $templateService;
    }

    /**
     * @return string
     */
    public function index(): string
    {
        return $this->templateService->render('admin::pages', []);
    }

    /**
     * @return string
     */
    public function add(): string
    {
        return $this->templateService->render('admin::pages-add', []);
    }

    /**
     * @return string
     */
    public function edit(): string
    {
        return $this->templateService->render('admin::pages-edit', []);
    }
}
