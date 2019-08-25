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
use Silly\Application as CliApplication;
use SimpleSkeletonCMS\Application;
use Zend\Config\Factory;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

$config = Factory::fromFiles(glob(__DIR__ . '/config/{,*}/{{,*.}global,{,*.}local}.php', GLOB_BRACE));

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions($config);

try {
    $container = $containerBuilder->build();
    if (PHP_SAPI != 'cli') {
        (new Application($container))->init();
    } else {
        $app = new CliApplication();
        $app->setName('Simple Skeleton CMS Console');
        $app->setVersion('1.0');
        $app->useContainer($container);
        foreach ($container->get('routes')['console'] as $item) {
            $app->command($item['expression'], $item['controller'])->descriptions($item['description']);
        }
        $app->run();
    }
} catch (DependencyException | NotFoundException | Exception $e) {
    exit($e->getMessage());
}
