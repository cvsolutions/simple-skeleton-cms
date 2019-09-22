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
 * Class UserModel
 * @package SimpleSkeletonCMS\Model
 */
class UserModel extends AbstractModel implements GenericModelInterface
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

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @return bool
     */
    public function truncate(): bool
    {
        $sth = $this->pdo->prepare('TRUNCATE TABLE cms_users; TRUNCATE TABLE cms_users_confirmations; TRUNCATE TABLE cms_users_remembered; TRUNCATE TABLE cms_users_resets; TRUNCATE TABLE cms_users_throttling');
        return $sth->execute();
    }

    /**
     * @param int $userId
     * @return array
     */
    public function findById(int $userId): array
    {
        $sth = $this->pdo->prepare('SELECT * FROM cms_users WHERE id = ? LIMIT 0,1');
        $sth->execute([$userId]);
        return $sth->fetch();
    }
}
