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

use Pagerfanta\View\TwitterBootstrap4View;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PaginationService
 * @package SimpleSkeletonCMS\Service
 */
class PaginationService extends TwitterBootstrap4View
{
    const MAX_PER_PAGE = 12;

    /**
     * @param Request $request
     * @param int $page
     * @return string
     */
    public function linkPagination(Request $request, int $page): string
    {
        $queryParams         = $request->request->all();
        $queryParams['page'] = $page;
        $args                = http_build_query($queryParams);
        if ($args) {
            $link = sprintf('?%s', $args);
        } else {
            $link = sprintf('?page=%s', $page);
        }
        return $link;
    }
}
