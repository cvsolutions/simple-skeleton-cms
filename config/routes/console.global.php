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

return [
    'routes' => [

        /**
         * Console
         */
        'console' => [
            [
                'expression'  => 'add-user',
                'controller'  => AddUserController::class,
                'description' => 'New user registration',
            ],
        ],
    ],
];
