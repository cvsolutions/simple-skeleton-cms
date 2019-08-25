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
use League\Plates\Engine;
use SimpleSkeletonCMS\Extension\ViewHelpers;
use SimpleSkeletonCMS\Model\UserModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

return [
    PDO::class => function () {
        try {
            $dbh = new PDO(getenv('PDO_DSN'), getenv('PDO_USERNAME'), getenv('PDO_PASSWD'), [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]);
        } catch (PDOException $exception) {
            exit($exception->getMessage());
        }
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $dbh;
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
        $PDO = $container->get(PDO::class);
        return new Auth($PDO);
    },
    ViewHelpers::class => function (Container $container) {
        return new ViewHelpers(
            $container->get(Request::class),
            $container->get(Session::class),
            $container->get(Auth::class),
            $container->get(UserModel::class)
        );
    },
];
