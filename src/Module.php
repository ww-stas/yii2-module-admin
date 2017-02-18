<?php

namespace Diezz\ModuleAdmin;

use Diezz\ModuleAdmin\Components\AdminView;
use yii\base\View;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * Имя класса для объекта представления по умолчанию используемого для всех контроллеров модуля.
     *
     * @var string
     */
    public $defaultViewClass = AdminView::class;
    /**
     * @var string
     */
    public $layout = '@admin/views/layout/main.php';
    /**
     * Имя класса или конфигурация для дефолтного класса View для модуля.
     *
     * @var
     */
    protected $_view = null;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        \Yii::setAlias('@admin', __DIR__);
    }

    /**
     * Сеттер для устновки значения объекта View.
     *
     * @param string|array $view конфигурация создаваемого объекта.
     *
     * @return void
     */
    public function setView($view)
    {
        $this->_view = $this->createView($view);
    }

    /**
     * Возвращает объект преставления.
     *
     * @return null|object|View
     */
    public function getView()
    {
        if (null === $this->_view) {
            $this->_view = $this->createView();
        }

        return $this->_view;
    }

    /**
     * Создает объект представления.
     *
     * @param null|array|string $view конфигурация создаваемого объекта.
     *
     * @return object|View
     */
    protected function createView($view = null)
    {
        if (null === $view) {
            $view = [
                'class' => $this->defaultViewClass,
            ];
        }
        if (is_array($view) && !array_key_exists('class', $view)) {
            $view['class'] = $this->defaultViewClass;
        }

        return \Yii::createObject($view);
    }
}
