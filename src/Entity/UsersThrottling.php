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

namespace SimpleSkeletonCMS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersThrottling
 *
 * @ORM\Table(name="users_throttling", indexes={@ORM\Index(name="expires_at", columns={"expires_at"})})
 * @ORM\Entity
 */
class UsersThrottling
{
    /**
     * @var string
     *
     * @ORM\Column(name="bucket", type="string", length=44)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bucket;

    /**
     * @var float
     *
     * @ORM\Column(name="tokens", type="float", precision=10, scale=0, nullable=false)
     */
    private $tokens;

    /**
     * @var int
     *
     * @ORM\Column(name="replenished_at", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $replenishedAt;

    /**
     * @var int
     *
     * @ORM\Column(name="expires_at", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $expiresAt;

    /**
     * Get bucket.
     *
     * @return string
     */
    public function getBucket()
    {
        return $this->bucket;
    }

    /**
     * Set tokens.
     *
     * @param float $tokens
     *
     * @return UsersThrottling
     */
    public function setTokens($tokens)
    {
        $this->tokens = $tokens;

        return $this;
    }

    /**
     * Get tokens.
     *
     * @return float
     */
    public function getTokens()
    {
        return $this->tokens;
    }

    /**
     * Set replenishedAt.
     *
     * @param int $replenishedAt
     *
     * @return UsersThrottling
     */
    public function setReplenishedAt($replenishedAt)
    {
        $this->replenishedAt = $replenishedAt;

        return $this;
    }

    /**
     * Get replenishedAt.
     *
     * @return int
     */
    public function getReplenishedAt()
    {
        return $this->replenishedAt;
    }

    /**
     * Set expiresAt.
     *
     * @param int $expiresAt
     *
     * @return UsersThrottling
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt.
     *
     * @return int
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }
}
