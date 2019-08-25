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
use DI\ContainerBuilder;
use Dotenv\Dotenv;
use Zend\Config\Factory;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

$config = Factory::fromFiles(glob(__DIR__ . '/config/{,*}/{{,*.}global,{,*.}local}.php', GLOB_BRACE));

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions($config);

try {
    /** @var Container $container */
    $container = $containerBuilder->build();
} catch (Exception $e) {
    exit($e->getMessage());
}

return $container;
