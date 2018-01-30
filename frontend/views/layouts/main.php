<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => "PeBib",
        // 'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'mynavbar navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        // ['label' => 'Home', 'url' => ['/site/index']],
        // ['label' => 'About', 'url' => ['/site/about']],
        // ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        // $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
          array('label' => Yii::t("app", 'Meine Bücher'), 'url' => array('/buecher/finalbuecher')),
          array('label' => Yii::t("app", 'Standorte'), 'url' => array('/orte/myindex')),
          array('label' => Yii::t("app", 'Profil'), 'url' => array('/user/me')),
          // array('label'=>'Buecher', 'url'=>'#', 'items'=>array(
    			// 		// array('label' => Yii::t("app", 'Buecher-kontakte'), 'url' => array('/buecher/admin')),
    			// 	)),
          // array('label'=>'Autor', 'url'=>'#', 'items'=>array(
    			// 		array('label' => Yii::t("app", 'Autor-index'), 'url' => array('/autor/index')),
    			// 		array('label' => Yii::t("app", 'Autor-myindex'), 'url' => array('/autor/myindex')),
    			// 		array('label' => Yii::t("app", 'Autor-create'), 'url' => array('/autor/create')),
    			// 		array('label' => Yii::t("app", 'Autor-new'), 'url' => array('/autor/new')),
    			// 		// array('label' => Yii::t("app", 'Buecher-kontakte'), 'url' => array('/buecher/admin')),
    			// 	)),
          array('label'=>'Ausleihen', 'url'=>'#', 'items'=>array(
    					array('label' => Yii::t("app", 'Ausleihen-index'), 'url' => array('/ausleihen/index')),
    					array('label' => Yii::t("app", 'Ausleihen-index'), 'url' => array('/ausleihen/index2')),
    					array('label' => Yii::t("app", 'Ausleihen-create'), 'url' => array('/ausleihen/create')),
    					array('label' => Yii::t("app", 'Ausleihen-create'), 'url' => array('/ausleihen/create2')),
    					array('label' => Yii::t("app", 'Ausleihen-new'), 'url' => array('/ausleihen/new')),
    					array('label' => Yii::t("app", 'Ausleihen-create3'), 'url' => array('/ausleihen/create3')),
    					// array('label' => Yii::t("app", 'Buecher-kontakte'), 'url' => array('/buecher/admin')),
    				)),
          // array('label'=>'Ausleihebuch', 'url'=>'#', 'items'=>array(
    			// 		array('label' => Yii::t("app", 'Ausleihebuch-index'), 'url' => array('/ausleihebuch/index')),
    			// 		array('label' => Yii::t("app", 'Ausleihebuch-create'), 'url' => array('/ausleihebuch/create')),
    			// 		array('label' => Yii::t("app", 'Ausleihebuch-new'), 'url' => array('/ausleihebuch/new')),
    			// 		// array('label' => Yii::t("app", 'Buecher-kontakte'), 'url' => array('/buecher/admin')),
    			// 	)),
            array('label'=>'Regale', 'url'=>'#', 'items'=>array(
                array('label' => Yii::t("app", 'Orte-index'), 'url' => array('/orte/index')),
                array('label' => Yii::t("app", 'Orte-myindex'), 'url' => array('/orte/myindex')),
                array('label' => Yii::t("app", 'Orte-create'), 'url' => array('/orte/create')),
                array('label' => Yii::t("app", 'Orte-new'), 'url' => array('/orte/new')),
                // array('label' => Yii::t("app", 'Buecher-kontakte'), 'url' => array('/buecher/admin')),
              )),
              array('label'=>'User', 'url'=>'#', 'items'=>array(
                  array('label' => Yii::t("app", 'User-index'), 'url' => array('/user/index')),
                  array('label' => Yii::t("app", 'User-me'), 'url' => array('/user/seeme')),
                  array('label' => Yii::t("app", 'User-updateme'), 'url' => array('/user/updateme')),
                  array('label' => Yii::t("app", 'User-seeUsers'), 'url' => array('/user/seeusers')),
                  array('label' => Yii::t("app", 'User-SeeUsersblock'), 'url' => array('/user/seeusersblock')),
                  array('label' => Yii::t("app", 'User-friends'), 'url' => array('/user/seefriends')),
                  array('label' => Yii::t("app", 'User-friendrequest'), 'url' => array('/user/seefriendrequests')),
                  array('label' => Yii::t("app", 'User-new'), 'url' => array('/user/new')),
                  // array('label' => Yii::t("app", 'Buecher-kontakte'), 'url' => array('/buecher/admin')),
                )),
            // ['label' => 'Buecher', 'url' => ['/buecher/index']],
            // ['label' => 'Regale', 'url' => ['/orte/index']],
            // ['label' => 'User', 'url' => ['/user/index']],
        ];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer> -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
