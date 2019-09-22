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

use DI\ContainerBuilder;
use DI\DependencyException;
use DI\NotFoundException;
use Dotenv\Dotenv;
use SimpleSkeletonCMS\Application;
use Zend\Config\Factory;

ini_set("display_startup_errors", '1');
ini_set("display_errors", '1');

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

$config = Factory::fromFiles(glob(__DIR__ . '/config/{,*}/{{,*.}global,{,*.}local}.php', GLOB_BRACE));

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions($config);

try {
    $container = $containerBuilder->build();
    (new Application($container))->init();
} catch (DependencyException | NotFoundException | Exception $e) {
    exit($e->getMessage());
}
