<?php

namespace app\widgets\adminLte;

use yii\base\InvalidParamException;
use yii\base\Widget;

/**
 * Class InfoBox
 *
 * @package app\widgets\adminLte
 */
class InfoBox extends Widget
{
    const COLOR_GREEN = 'bg-green';
    const COLOR_BLUE = 'bg-aqua';
    const COLOR_YELLOW = 'bg-yellow';
    const COLOR_RED = 'bg-red';

    /**
     * Color of the box. You may use one of the predefined color constants.
     *
     * @var string
     */
    public $color = self::COLOR_BLUE;
    /**
     * Title of the box.
     *
     * @var string
     */
    public $title = '';
    /**
     * Subtitle of the box.
     *
     * @var string
     */
    public $subTitle = '';
    /**
     * Icon of the box. Use font awesome icons. For example: 'fa fa-flag-o'
     *
     * @see http://fontawesome.io/icons/
     * @var string
     */
    public $icon = '';

    /**
     * Executes the widget.
     *
     * @throws InvalidParamException if the view file does not exist.
     * @return string
     */
    public function run()
    {
        return $this->render('info-box', [
            'title'    => $this->title,
            'subTitle' => $this->subTitle,
            'icon'     => $this->icon,
            'color'    => $this->color,
        ]);
    }
}
