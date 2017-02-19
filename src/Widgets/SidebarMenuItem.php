<?php

namespace Diezz\ModuleAdmin\Widgets;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class SidebarMenuItem
 * The menu item widget.
 *
 * @package app\modules\admin\widgets
 */
class SidebarMenuItem extends Widget
{
    /**
     * Css-class of icon for the menu item, for example "fa fa-envelope".
     *
     * @var string
     */
    public $icon = '';
    /**
     * Is menu item need to be displayed.
     *
     * @var bool
     */
    protected $active = true;
    /**
     * Title of menu item.
     *
     * @var string
     */
    protected $title = '';
    /**
     * Array of children menu items.
     *
     * @var SidebarMenu[]
     */
    protected $children = [];
    /**
     * Url of menu item.
     *
     * @var string
     */
    protected $url = '';

    /**
     * Executes the widget.
     *
     * @return string the result of widget execution to be outputted.
     */
    public function run()
    {
        if (false === $this->hasChildren()) {
            return $this->renderItem();
        }

        return $this->renderRecursive();
    }

    /**
     * Render children items.
     *
     * @return string
     */
    protected function renderRecursive()
    {
        $items = '';
        foreach ($this->getChildren() as $child) {
            $items .= $child->run();
        }

        $list = Html::tag('ul', $items, [
            'class' => 'treeview-menu',
        ]);

        return Html::tag('li', $this->renderLink(true) . $list, [
            'class' => 'treeview',
        ]);
    }

    /**
     * Render menu item.
     *
     * @return string
     */
    protected function renderItem()
    {
        if (false === $this->active) {
            return '';
        }

        return Html::tag('li', $this->renderLink());
    }

    /**
     * Generate link for the menu item.
     *
     * @param bool $useRight is need to render arrow.
     *
     * @return string
     */
    protected function renderLink($useRight = false)
    {
        $icon = Html::tag('i',
            '',
            [
                'class' => $this->icon,
            ]);
        $span = Html::tag('span', $this->getTitle());
        $content = $icon . $span;
        if (true === $useRight) {
            $content .= $this->renderRightArrow();
        }

        return Html::a($content, $this->getUrl());
    }

    /**
     * Generate arrow-element for the menu item that has children items.
     *
     * @return string
     */
    protected function renderRightArrow()
    {
        $icon = Html::tag('i', '', [
            'class' => 'fa fa-angle-left pull-right',
        ]);

        return Html::tag('span', $icon, [
            'class' => 'pull-right-container',
        ]);
    }

    /**
     * Url getter.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Url setter.
     *
     * @param string $url Url of menu item
     *
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param bool $active
     *
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return SidebarMenu[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param array|SidebarMenu[] $children
     *
     * @throws InvalidConfigException
     * @return $this
     */
    public function setChildren(array $children)
    {
        $this->children = [];
        foreach ($children as $menuItem) {
            $this->addChildren($menuItem);
        }

        return $this;
    }

    /**
     * @param array|SidebarMenu $menuItem
     *
     * @throws InvalidConfigException
     * @return $this
     */
    public function addChildren($menuItem)
    {
        if (is_array($menuItem)) {
            if (!array_key_exists('class', $menuItem)) {
                $menuItem['class'] = SidebarMenuItem::class;
            }

            $menuItem = \Yii::createObject($menuItem);
        }

        $this->children[] = $menuItem;
        return $this;
    }

    /**
     * @return bool
     */
    protected function hasChildren()
    {
        return count($this->children) > 0;
    }
}
