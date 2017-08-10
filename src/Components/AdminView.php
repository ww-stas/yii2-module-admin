<?php

namespace Diezz\ModuleAdmin\Components;

use Diezz\ModuleAdmin\Assets\AdminLteAsset;
use yii\base\InvalidConfigException;
use yii\web\View;

/**
 * Class AdminView
 * Default view for the Admin View
 *
 * @package app\modules\admin\components
 */
class AdminView extends View
{
    const SKIN_BLUE = 'skin-blue';
    const SKIN_BLUE_LIGHT = 'skin-blue-light';
    const SKIN_YELLOW = 'skin-yellow';
    const SKIN_YELLOW_LIGHT = 'skin-yellow-light';
    const SKIN_GREEN = 'skin-green';
    const SKIN_GREEN_LIGHT = 'skin-green-light';
    const SKIN_PURPLE = 'skin-purple';
    const SKIN_PURPLE_LIGHT = 'skin-purple-light';
    const SKIN_RED = 'skin-red';
    const SKIN_RED_LIGHT = 'skin-red-light';
    const SKIN_BLACK = 'skin-black';
    const SKIN_BLACK_LIGHT = 'skin-black-light';
    /**
     * Subtitle for view.
     *
     * @var
     */
    public $subTitle;
    /**
     * Sidebar menu config.
     *
     * @var array
     */
    public $sidebarMenuConfig = [];
    /**
     *  Admin layout theme. By default are used blue skin.
     *
     * @var string
     */
    public $skin = self::SKIN_BLUE;
    /**
     * AssetBundle config.
     *
     * @var null|array|string
     */
    public $assetBundleConfig = null;
    /**
     * Company name.
     *
     * @var string
     */
    public $companyName = 'Company';
    /**
     * Short company name
     *
     * @var string
     */
    public $shotCompanyName = '';
    /**
     * Home URL.
     *
     * @var string
     */
    public $homeUrl = '/admin';
    /**
     * An array of extra asset. Each asset can be specified one of the following format:
     *
     * - a string thar represent a class name of extra asset;
     * - an array that must contain a class key and may contain other settings of asset bundle.
     *
     * @see BaseYii::createObject()
     * @var array
     */
    public $extraAssets = [];
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
     * Asset bundle class-name using by default for admin view.
     *
     * @var string
     */
    protected $defaultAssetBundleClass = AdminLteAsset::class;

    /**
     * Initializes the object.
     *
     * @return void
     */
    public function init()
    {
        $this->registerAdminAsset();
        $this->registerExtraAssets();
    }

    /**
     * Register a main admin asset.
     *
     * @return void
     */
    protected function registerAdminAsset()
    {
        $assetConfig = $this->getAdminAssetConfig();
        $this->registerAsset($assetConfig);
    }

    /**
     * Register an extra assets.
     *
     * @return void
     */
    protected function registerExtraAssets()
    {
        foreach ($this->extraAssets as $asset) {
            $assetConfig = $this->getExtraAssetConfig($asset);
            $this->registerAsset($assetConfig);
        }
    }

    /**
     * Register an asset bundle in view.
     *
     * @param array $assetConfig config of asset bundle.
     *
     * @return void
     */
    protected function registerAsset(array $assetConfig)
    {
        $assetClassName = $assetConfig['class'];
        $this->assetManager->bundles[$assetClassName] = $assetConfig;
        if (method_exists($assetClassName, 'register')) {
            call_user_func([
                $assetClassName,
                'register',
            ], $this);
        }
    }

    /**
     * Return config array for create instance of AssetBundle.
     *
     * @return array
     */
    protected function getAdminAssetConfig()
    {
        $config = $this->assetBundleConfig;
        if (null === $config) {
            $config = [];
        }
        if (is_string($config)) {
            $config['class'] = $config;
        }
        if (is_array($config) && !array_key_exists('class', $config)) {
            $config['class'] = $this->defaultAssetBundleClass;
            if (array_key_exists('skin', $config)) {
                $config['skin'] = $this->skin;
            }
        }

        return $config;
    }

    /**
     * Prepare and return an extra asset config.
     *
     * @param string|array $asset extra asset config.
     *
     * @throws InvalidConfigException if the configuration is invalid.
     * @return array
     */
    protected function getExtraAssetConfig($asset)
    {
        $config = [];
        if (is_string($asset)) {
            $config['class'] = $asset;
        } else {
            $config = $asset;
        }
        if (false === array_key_exists('class', $config)) {
            throw new InvalidConfigException('Object configuration must be an array containing a "class" element.');
        }

        return $config;
    }

}
