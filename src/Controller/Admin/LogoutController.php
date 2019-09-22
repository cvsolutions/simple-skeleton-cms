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

use Delight\Auth\AuthError;
use SimpleSkeletonCMS\Controller\AbstractController;

/**
 * Class LoginController
 * @package SimpleSkeletonCMS\Controller\Admin
 */
class LogoutController extends AbstractController
{
    /**
     * Logout
     */
    public function index()
    {
        try {
            $this->auth->logOut();
        } catch (AuthError $e) {
            exit($e->getMessage());
        }
        $this->redirect('/');
    }
}
