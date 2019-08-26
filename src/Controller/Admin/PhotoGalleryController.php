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

use SimpleSkeletonCMS\Controller\AbstractController;

/**
 * Class PhotoGalleryController
 * @package SimpleSkeletonCMS\Controller\Admin
 */
class PhotoGalleryController extends AbstractController
{
    /**
     * @return string
     */
    public function index(): string
    {
        return $this->view->render('admin::gallery', []);
    }
}
