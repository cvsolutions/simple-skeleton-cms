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

use SimpleSkeletonCMS\Controller\Console\AddUserController;
use SimpleSkeletonCMS\Controller\Console\InstallationController;

return [
    'routes' => [

        /**
         * Console
         */
        'console' => [
            [
                'expression' => 'installation',
                'controller' => InstallationController::class,
                'description' => 'Default CMS data installation',
            ],
            [
                'expression' => 'add-user',
                'controller' => AddUserController::class,
                'description' => 'New user registration',
            ],
        ],
    ],
];
