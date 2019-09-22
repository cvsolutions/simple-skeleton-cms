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

use SimpleSkeletonCMS\Controller\AbstractController;

/**
 * Class HomeController
 * @package SimpleSkeletonCMS\Controller\App
 */
class HomeController extends AbstractController
{
    /**
     * @param string $lang
     * @return string
     */
    public function index(string $lang = 'it'): string
    {
        return $this->view->render('app::home', [
            '_lang' => $lang,
        ]);
    }
}
