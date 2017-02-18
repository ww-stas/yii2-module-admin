<?php

/* @var $this \Diezz\ModuleAdmin\Components\AdminView */
/* @var $content string */

use Diezz\ModuleAdmin\Widgets\SidebarMenu;
use yii\helpers\Html;

if (!isset($this->subTitle)) {
    $this->subTitle = '';
}

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= Html::encode($this->title) ?></title>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition <?php echo $this->skin ?>">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <header class="main-header">

            <a href="/admin" class="logo">
                <span class="logo-mini"><b>B</b>B</span>
                <span class="logo-lg"><b>moBBea</b></span>
            </a>

            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <?php echo SidebarMenu::widget($this->sidebarMenuConfig); ?>
            </section>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <?php echo $this->title ?>
                    <small><?php echo $this->subTitle ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <section class="content">
                <?php echo $content ?>
            </section>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> <?php echo Yii::$app->version ?>
            </div>
            <strong>Copyright &copy; 2017 <?php echo $this->companyName?></strong> All
            rights
            reserved.
        </footer>

        <div class="control-sidebar-bg"></div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>