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

use Delight\Auth\Auth;
use DI\Container;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use League\Plates\Engine;
use SimpleSkeletonCMS\Extension\ViewHelpers;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

return [
    EntityManager::class => function () {
        $dbParams = [
            'driver' => getenv('DB_DRIVER'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
            'dbname' => getenv('DB_DBNAME'),
            'host' => getenv('DB_HOST'),
        ];
        $config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/../../src/Entity'], true, null, null, false);
        return EntityManager::create($dbParams, $config);
    },
    Engine::class => function (Container $container) {
        $engine = new Engine('templates');
        $engine->loadExtension($container->get(ViewHelpers::class));
        $engine->addFolder('admin', 'templates/admin');
        $engine->addFolder('app', 'templates/app');
        $engine->setFileExtension('phtml');
        return $engine;
    },
    Request::class => function () {
        return Request::createFromGlobals();
    },
    Session::class => function () {
        $session = new Session();
        // $session->start();
        return $session;
    },
    Auth::class => function (Container $container) {
        $entityManager = $container->get(EntityManager::class);
        /** @var PDO $pdo */
        $pdo = $entityManager->getConnection()->getWrappedConnection();
        return new Auth($pdo);
    },
    ViewHelpers::class => function (Container $container) {
        return new ViewHelpers($container->get(Request::class), $container->get(Session::class), $container->get(Auth::class), $container->get(EntityManager::class));
    },
];
