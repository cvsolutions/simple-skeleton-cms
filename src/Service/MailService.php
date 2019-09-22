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

namespace SimpleSkeletonCMS\Service;

use SimpleSkeletonCMS\Interfaces\MailAdapterInterface;
use SimpleSkeletonCMS\Interfaces\MailServiceInterface;

/**
 * Class MailService
 * @package SimpleSkeletonCMS\Service
 */
class MailService implements MailServiceInterface
{
    /**
     * @var MailAdapterInterface
     */
    protected $mailerAdapter;

    /**
     * MailService constructor.
     * @param MailAdapterInterface $mailerAdapter
     */
    public function __construct(MailAdapterInterface $mailerAdapter)
    {
        $this->mailerAdapter = $mailerAdapter;
    }

    /**
     * @inheritDoc
     */
    public function send(array $data): bool
    {
        return $this->mailerAdapter->process($data);
    }
}
