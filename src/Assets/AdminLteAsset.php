<?php

namespace Diezz\ModuleAdmin\Assets;

use yii\base\Exception;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class AdminLteAsset extends AssetBundle
{
    public $sourcePath = '@bower/adminlte';

    public $css = [
        'dist/css/AdminLTE.min.css',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    ];

    public $js = [
        'plugins/fastclick/fastclick.js',
        'dist/js/app.min.js',
        'plugins/sparkline/jquery.sparkline.min.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/chartjs/Chart.min.js',
    ];

    public $depends = [
        BootstrapAsset::class,
        JqueryAsset::class,
        BootstrapPluginAsset::class,
    ];

    public $skin = '_all-skins';


    public function init()
    {
        if ($this->skin) {
            if (('_all-skins' !== $this->skin) && (strpos($this->skin, 'skin-') !== 0)) {
                throw new Exception('Invalid skin specified');
            }
            $this->css[] = sprintf('dist/css/skins/%s.min.css', $this->skin);
        }

        parent::init();
    }
}
