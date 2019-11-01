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
use SimpleSkeletonCMS\Model\PageModel;

/**
 * Class PageService
 * @package SimpleSkeletonCMS\Service
 */
class PageService
{
    /**
     * @var PageModel
     */
    protected $pageModel;

    /**
     * PageService constructor.
     * @param PageModel $pageModel
     */
    public function __construct(PageModel $pageModel)
    {
        $this->pageModel = $pageModel;
    }
}
