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

use PDO;

/**
 * Class AbstractModel
 * @package SimpleSkeletonCMS\Model
 */
abstract class AbstractModel
{
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * AbstractModel constructor.
     * @param PDO $PDO
     */
    public function __construct(PDO $PDO)
    {
        $this->pdo = $PDO;
    }
}
