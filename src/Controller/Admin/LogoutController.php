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

namespace SimpleSkeletonCMS\Controller\Admin;

use Delight\Auth\Auth;
use Delight\Auth\AuthError;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class LoginController
 * @package SimpleSkeletonCMS\Controller\Admin
 */
class LogoutController
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * LogoutController constructor.
     * @param Auth $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     *
     */
    public function index()
    {
        try {
            $this->auth->logOut();
        } catch (AuthError $e) {
            exit($e->getMessage());
        }
        (new RedirectResponse('/'))->send();
        exit();
    }
}
