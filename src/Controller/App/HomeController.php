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

namespace SimpleSkeletonCMS\Controller\App;

use SimpleSkeletonCMS\Service\TemplateService;

/**
 * Class HomeController
 * @package SimpleSkeletonCMS\Controller\App
 */
class HomeController
{
    /**
     * @var TemplateService
     */
    protected $templateService;

    /**
     * HomeController constructor.
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
        return $this->templateService->render('app::home', []);
    }
}
