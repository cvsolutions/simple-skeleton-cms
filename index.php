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

use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use SimpleSkeletonCMS\Application;

/** @var Container $container */
$container = require __DIR__ . '/bootstrap.php';
$application = new Application($container);
try {
    $application->init();
} catch (DependencyException | NotFoundException $e) {
    exit($e->getMessage());
}
