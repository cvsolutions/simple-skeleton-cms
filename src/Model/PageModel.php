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

namespace SimpleSkeletonCMS\Model;

use SimpleSkeletonCMS\Interfaces\GenericModelInterface;

/**
 * Class PageModel
 * @package SimpleSkeletonCMS\Model
 */
class PageModel extends AbstractModel implements GenericModelInterface
{
    public function create(array $data = []): string
    {
        // TODO: Implement create() method.
    }

    public function update(int $id, array $data = []): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }

    public function truncate(): bool
    {
        // TODO: Implement truncate() method.
    }

    public function findById(int $id): array
    {
        // TODO: Implement findById() method.
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }
}
