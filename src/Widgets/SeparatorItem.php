<?php

namespace Diezz\ModuleAdmin\Widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class SeparatorItem
 *
 * @package app\modules\admin\widgets
 */
class SeparatorItem extends Widget
{
    /**
     * Separator title.
     *
     * @var string
     */
    public $title = '';

    /**
     * @return string
     */
    public function run()
    {
        return Html::tag('li', $this->title, [
            'class' => 'header',
        ]);
    }
}