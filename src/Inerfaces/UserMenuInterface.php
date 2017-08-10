<?php

namespace Diezz\ModuleAdmin\Interfaces;

/**
 * Interface UserMenuInterface
 * This interface must implement User model for rendering user menu.
 *
 * @package Diezz\ModuleAdmin\Interfaces
 */
interface UserMenuInterface
{
    /**
     * Return user's full name.
     *
     * @return string
     */
    public function getFullName();

    /**
     * Return role name of user, e.g. "Admin" or "Web Developer"
     *
     * @return string
     */
    public function getRoleName();

    /**
     * Return the date when user was registered (sign-up).
     *
     * @return \DateTime
     */
    public function getRegisterDate();

    /**
     * Does the user have an avatar.
     *
     * @return boolean
     */
    public function hasAvatar();

    /**
     * Return a link to avatar image.
     *
     * @return string
     */
    public function getAvatar();
}
