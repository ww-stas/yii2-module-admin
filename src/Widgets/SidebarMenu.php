<?php

namespace Diezz\ModuleAdmin\Widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class SidebarMenu
 * Widget to render side bar menu of admin module.
 *
 * @package app\modules\admin\widgets
 */
class SidebarMenu extends Widget
{
    /**
     * Menu item config.
     *
     * @var SidebarMenuItem[]
     */
    protected $menuItems = [];

    /**
     * @return SidebarMenuItem[]
     */
    public function getMenuItems()
    {
        return $this->menuItems;
    }

    /**
     * Side bar menu items setter.
     *
     * @param array|SidebarMenuItem[] $menuItems menu items config.
     *
     * @return $this
     */
    public function setMenuItems(array $menuItems)
    {
        $this->menuItems = [];
        foreach ($menuItems as $item) {
            $this->addMenuItem($item);
        }
        return $this;
    }

    /**
     * Create a MenuItem instance and add to menu items array.
     *
     * @param array|SidebarMenuItem $item
     *
     * @return void
     */
    public function addMenuItem($item)
    {
        if (is_array($item)) {
            if (!array_key_exists('class', $item)) {
                $item['class'] = SidebarMenuItem::class;
            }
            $item = \Yii::createObject($item);
        }
        $this->menuItems[] = $item;
    }

    /**
     * Executes the widget.
     *
     * @return string the result of widget execution to be outputted.
     */
    public function run()
    {
        $items = '';
        foreach ($this->menuItems as $item) {
            $items .= $item->run();
        }

        return Html::tag('ul',
            $items,
            [
                'class' => 'sidebar-menu',
            ]);
    }
}
