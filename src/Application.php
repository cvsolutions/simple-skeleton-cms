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

namespace SimpleSkeletonCMS;

use Delight\Auth\Auth;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use Exception;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Silly\Application as CliApplication;
use SimpleSkeletonCMS\Utility\MessagesUtil;
use smmoosavi\util\gettext\L10n;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use function FastRoute\simpleDispatcher;

/**
 * Class Application
 * @package SimpleSkeletonCMS
 */
class Application
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * Application constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return bool
     * @throws DependencyException
     * @throws NotFoundException
     * @throws Exception
     */
    public function init()
    {
        if (PHP_SAPI != 'cli') {
            $request    = $this->container->get(Request::class);
            $auth       = $this->container->get(Auth::class);
            $dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) {
                foreach ($this->container->get('routes')['admin'] as $item) {
                    $routeCollector->addGroup('/admin', function (RouteCollector $collector) use ($item) {
                        $collector->addRoute(
                            $item['methods'],
                            $item['route'],
                            ['handler' => [$item['controller'], $item['action']], 'options' => $item['options']]
                        );
                    });
                }
                foreach ($this->container->get('routes')['app'] as $item) {
                    $routeCollector->addGroup('', function (RouteCollector $collector) use ($item) {
                        $collector->addRoute(
                            $item['methods'],
                            $item['route'],
                            ['handler' => [$item['controller'], $item['action']], 'options' => $item['options']]
                        );
                    });
                }
            });

            // Fetch method and URI from somewhere
            $uri = $request->getRequestUri();

            // Strip query string (?foo=bar) and decode URI
            if (false !== $pos = strpos($uri, '?')) {
                $uri = substr($uri, 0, $pos);
            }
            $uri       = rawurldecode($uri);
            $routeInfo = $dispatcher->dispatch($request->getMethod(), $uri);

            switch ($routeInfo[0]) {
                case Dispatcher::NOT_FOUND:
                    $response = new Response(
                        MessagesUtil::MSG_NOT_FOUND,
                        Response::HTTP_NOT_FOUND,
                        ['content-type' => 'text/html']
                    );
                    $response->send();
                    break;

                case Dispatcher::METHOD_NOT_ALLOWED:
                    // $allowedMethods = $routeInfo[1];
                    $response = new Response(
                        MessagesUtil::MSG_METHOD_NOT_ALLOWED,
                        Response::HTTP_METHOD_NOT_ALLOWED,
                        ['content-type' => 'text/html']
                    );
                    $response->send();
                    break;

                case Dispatcher::FOUND:
                    $controller = $routeInfo[1]['handler'];
                    $options    = $routeInfo[1]['options'];
                    $parameters = $routeInfo[2];
                    if ($options['protected'] === true) {
                        if (!$auth->isLoggedIn()) {
                            $response = new Response(
                                MessagesUtil::MSG_FORBIDDEN,
                                Response::HTTP_FORBIDDEN,
                                ['content-type' => 'text/html']
                            );
                            $response->send();
                            return false;
                        }
                    }
                    $locale = $parameters['lang'] ?? 'it';
                    L10n::init($locale, sprintf('%s/../translations/%s.mo', __DIR__, $locale));
                    echo $this->container->call($controller, $parameters);
                    break;
            }
        } else {
            $app = new CliApplication();
            $app->setName('Simple Skeleton CMS Console');
            $app->setVersion('1.0');
            $app->useContainer($this->container);
            foreach ($this->container->get('routes')['console'] as $item) {
                $app->command($item['expression'], $item['controller'])->descriptions($item['description']);
            }
            $app->run();
        }
        return true;
    }
}
