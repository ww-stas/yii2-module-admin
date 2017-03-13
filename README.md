Yii2 Admin Module
=================

Installation
------------
```composer require "diezz/yii2-module-admin"```

Basic Configuration
-------------------

Once the extension is installed, simply modify your application configuration as follows:
```php
return [
   'modules' => [
       'admin' => [
           'class'         => 'Diezz\ModuleAdmin\Module',
           // Place your views in this directory
           'viewPath'      => '@app/views/admin',
           'controllerMap' => [
               'first'  => 'app\controllers\FirstController',
               'second' => 'app\controllers\SecondController',
           ],
           'view'          => [
               'class'             => AdminView::class,
               'skin'              => AdminView::SKIN_RED,
               // You may specify an extra assets
               'extraAssets'       => [
                    // Like class name:
                    ExtraAsset::class,
                    // Or like config aray:
                    [
                        'class' => AnotherAsset::class,
                    ],
               ],
               // Menu config
               'sidebarMenuConfig' => [
                   'menuItems' => [
                       [
                           'title' => 'First menu item',
                           'icon'  => 'fa fa-envelope',
                           'url'   => '/admin/first',
                       ],
                       [
                           'title'    => 'Second menu item',
                           'icon'     => 'fa fa-envelope',
                           'url'      => '/admin/second',
                           'children' => [
                               [
                                   'title' => 'First sub-menu item',
                                   'icon'  => 'fa fa-circle',
                                   'url'   => '/admin/second/first',
                               ],
                               [
                                   'title' => 'Second sub-menu item',
                                   'icon'  => 'fa fa-circle',
                                   'url'   => '/admin/second/second',
                               ],
                           ],
                       ],
                   ],
               ],
           ],
       ],
   ],
];
```

All of your admin controllers must extend Diezz\ModuleAdmin\Controllers\AdminController

