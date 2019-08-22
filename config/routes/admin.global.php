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

use SimpleSkeletonCMS\Controller\Admin\ArticlesController;
use SimpleSkeletonCMS\Controller\Admin\BlocksController;
use SimpleSkeletonCMS\Controller\Admin\DashboardController;
use SimpleSkeletonCMS\Controller\Admin\LoginController;
use SimpleSkeletonCMS\Controller\Admin\LogoutController;
use SimpleSkeletonCMS\Controller\Admin\PagesController;

return [
    'routes' => [

        /**
         * Administrator
         */
        'admin' => [
            [
                'methods' => ['GET', 'POST'],
                'route' => '',
                'controller' => LoginController::class,
                'action' => 'index',
                'options' => [
                    'protected' => false,
                ],
            ],
            [
                'methods' => 'GET',
                'route' => '/dashboard',
                'controller' => DashboardController::class,
                'action' => 'index',
                'options' => [
                    'protected' => true,
                ],
            ],
            [
                'methods' => 'GET',
                'route' => '/pages',
                'controller' => PagesController::class,
                'action' => 'index',
                'options' => [
                    'protected' => true,
                ],
            ],
            [
                'methods' => 'GET',
                'route' => '/pages/add',
                'controller' => PagesController::class,
                'action' => 'add',
                'options' => [
                    'protected' => true,
                ],
            ],
            [
                'methods' => 'GET',
                'route' => '/articles',
                'controller' => ArticlesController::class,
                'action' => 'index',
                'options' => [
                    'protected' => true,
                ],
            ],
            [
                'methods' => 'GET',
                'route' => '/articles/add',
                'controller' => ArticlesController::class,
                'action' => 'add',
                'options' => [
                    'protected' => true,
                ],
            ],
            [
                'methods' => 'GET',
                'route' => '/blocks',
                'controller' => BlocksController::class,
                'action' => 'index',
                'options' => [
                    'protected' => true,
                ],
            ],
            [
                'methods' => 'GET',
                'route' => '/blocks/add',
                'controller' => BlocksController::class,
                'action' => 'add',
                'options' => [
                    'protected' => true,
                ],
            ],
            [
                'methods' => 'GET',
                'route' => '/logout',
                'controller' => LogoutController::class,
                'action' => 'index',
                'options' => [
                    'protected' => true,
                ],
            ],
        ],
    ],
];
