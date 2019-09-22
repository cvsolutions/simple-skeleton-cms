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

/**
 * Interface GenericModelInterface
 * @package SimpleSkeletonCMS\Interfaces
 */
interface GenericModelInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function create(array $data = []): string;

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data = []): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @return bool
     */
    public function truncate(): bool;

    /**
     * @param int $id
     * @return array
     */
    public function findById(int $id): array;

    /**
     * @return array
     */
    public function findAll(): array;
}
