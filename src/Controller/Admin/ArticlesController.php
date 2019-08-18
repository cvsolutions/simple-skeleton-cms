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
 * Class ArticlesController
 * @package SimpleSkeletonCMS\Controller\Admin
 */
class ArticlesController
{
    /**
     * @var TemplateService
     */
    protected $templateService;

    /**
     * ArticlesController constructor.
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
        return $this->templateService->render('admin::articles', []);
    }

    /**
     * @return string
     */
    public function add(): string
    {
        return $this->templateService->render('admin::articles-add', []);
    }

    /**
     * @return string
     */
    public function edit(): string
    {
        return $this->templateService->render('admin::articles-edit', []);
    }
}
