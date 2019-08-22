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

namespace SimpleSkeletonCMS\Extension;

use Delight\Auth\Auth;
use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class ViewHelpers
 * @package SimpleSkeletonCMS\Extension
 */
class ViewHelpers implements ExtensionInterface
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var Auth
     */
    protected $auth;

    /**
     * ViewHelpers constructor.
     * @param Request $request
     * @param Session $session
     * @param Auth $auth
     */
    public function __construct(Request $request, Session $session, Auth $auth)
    {
        $this->request = $request;
        $this->session = $session;
        $this->auth = $auth;
    }

    /**
     * @param Engine $engine
     */
    public function register(Engine $engine)
    {
        $engine->registerFunction('getUsername', [$this, 'getUsername']);
        $engine->registerFunction('getAlertMessages', [$this, 'getAlertMessages']);
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->auth->getUsername();
    }

    /**
     * @return string
     */
    public function getAlertMessages(): string
    {
        $html = '';
        foreach ($this->session->getFlashBag()->all() as $type => $messages) {
            foreach ($messages as $message) {
                $html .= sprintf('<div class="alert alert-%s alert-dismissible">', $type);
                $html .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                $html .= $message;
                $html .= '</div>';
            }
        }
        return $html;
    }
}
