<?php

namespace Diezz\ModuleAdmin\Widgets;

use Diezz\ModuleAdmin\Interfaces\UserMenuInterface;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class UserMenu
 *
 * @package Diezz\ModuleAdmin\Widgets
 */
class UserMenu extends Widget
{
    /**
     * User model.
     *
     * @var UserMenuInterface
     */
    private $user;
    /**
     * Link to user profile;
     *
     * @var string
     */
    public $profileLink = '/profile';
    /**
     * Link to sign-out action.
     *
     * @var string
     */
    public $signOutLink = '/sign-out';
    /**
     * This array contain a key->value pairs where key - is link name and value is link
     * that will be rendered in "user-body" section of menu.
     *
     * @var string[]
     */
    public $userBody = [];

    /**
     * Setter for the User model.
     *
     * @param UserMenuInterface $user
     */
    public function setUser(UserMenuInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function run()
    {
        return $this->render('user-menu', [
            'user'        => $this->user,
            'profileLink' => $this->profileLink,
            'signOutLink' => $this->signOutLink,
            'userBody'    => $this->userBody,
        ]);
    }
}