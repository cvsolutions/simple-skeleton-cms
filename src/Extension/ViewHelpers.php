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

use Carbon\Carbon;
use Delight\Auth\Auth;
use Doctrine\ORM\EntityManager;
use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use SimpleSkeletonCMS\Entity\Users;
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
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * ViewHelpers constructor.
     * @param Request $request
     * @param Session $session
     * @param Auth $auth
     * @param EntityManager $entityManager
     */
    public function __construct(Request $request, Session $session, Auth $auth, EntityManager $entityManager)
    {
        $this->request = $request;
        $this->session = $session;
        $this->auth = $auth;
        $this->entityManager = $entityManager;
    }

    /**
     * @param Engine $engine
     */
    public function register(Engine $engine)
    {
        $engine->registerFunction('getUser', [$this, 'getUser']);
        $engine->registerFunction('getAlertMessages', [$this, 'getAlertMessages']);
        $engine->registerFunction('getDateFromTimestamp', [$this, 'getDateFromTimestamp']);
    }

    /**
     * @return object|Users
     */
    public function getUser()
    {
        $userId = $this->auth->getUserId();
        return $this->entityManager->getRepository(Users::class)->find($userId);
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

    /**
     * @param int $timestamp
     * @param string $format
     * @param string $locale
     * @return string
     */
    public function getDateFromTimestamp(int $timestamp, string $format = 'dddd, D MMMM YYYY, HH:mm', string $locale = 'it'): string
    {
        $date = Carbon::createFromTimestamp($timestamp);
        return $date->locale($locale)->isoFormat($format);
    }
}
