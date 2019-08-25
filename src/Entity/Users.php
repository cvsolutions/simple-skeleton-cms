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
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=249, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=100, nullable=true)
     */
    private $username;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false, options={"default"="0"})
     */
    private $status = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="verified", type="boolean", nullable=false,options={"default"="0"})
     */
    private $verified = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="resettable", type="boolean", nullable=false, options={"default"="1","default"="1"})
     */
    private $resettable = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="roles_mask", type="integer", nullable=false, options={"unsigned"=true,"default"="0"})
     */
    private $rolesMask = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="registered", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $registered;

    /**
     * @var int|null
     *
     * @ORM\Column(name="last_login", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $lastLogin;

    /**
     * @var int
     *
     * @ORM\Column(name="force_logout", type="integer", nullable=false, options={"unsigned"=true,"default"="0"})
     */
    private $forceLogout = '0';

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set username.
     *
     * @param string|null $username
     *
     * @return Users
     */
    public function setUsername($username = null)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set status.
     *
     * @param bool $status
     *
     * @return Users
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set verified.
     *
     * @param bool $verified
     *
     * @return Users
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get verified.
     *
     * @return bool
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Set resettable.
     *
     * @param bool $resettable
     *
     * @return Users
     */
    public function setResettable($resettable)
    {
        $this->resettable = $resettable;

        return $this;
    }

    /**
     * Get resettable.
     *
     * @return bool
     */
    public function getResettable()
    {
        return $this->resettable;
    }

    /**
     * Set rolesMask.
     *
     * @param int $rolesMask
     *
     * @return Users
     */
    public function setRolesMask($rolesMask)
    {
        $this->rolesMask = $rolesMask;

        return $this;
    }

    /**
     * Get rolesMask.
     *
     * @return int
     */
    public function getRolesMask()
    {
        return $this->rolesMask;
    }

    /**
     * Set registered.
     *
     * @param int $registered
     *
     * @return Users
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;

        return $this;
    }

    /**
     * Get registered.
     *
     * @return int
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * Set lastLogin.
     *
     * @param int|null $lastLogin
     *
     * @return Users
     */
    public function setLastLogin($lastLogin = null)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin.
     *
     * @return int|null
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set forceLogout.
     *
     * @param int $forceLogout
     *
     * @return Users
     */
    public function setForceLogout($forceLogout)
    {
        $this->forceLogout = $forceLogout;

        return $this;
    }

    /**
     * Get forceLogout.
     *
     * @return int
     */
    public function getForceLogout()
    {
        return $this->forceLogout;
    }
}
