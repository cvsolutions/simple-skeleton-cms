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

namespace SimpleSkeletonCMS\Interfaces;

use Exception;

/**
 * Interface MailServiceInterface
 * @package SimpleSkeletonCMS\Interfaces
 */
interface MailServiceInterface
{
    /**
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function send(array $data): bool;
}
