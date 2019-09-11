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

/**
 * Class UserModel
 * @package SimpleSkeletonCMS\Model
 */
class UserModel extends AbstractModel
{
    /**
     * @param $userId
     * @return array
     */
    public function findById($userId): array
    {
        $sth = $this->pdo->prepare('SELECT * FROM cms_users WHERE id = ? LIMIT 0,1');
        $sth->execute([$userId]);
        return $sth->fetch();
    }
}
