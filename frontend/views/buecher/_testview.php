
<?php

use yii\helpers\Html;
use yii\grid\GridView2;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\bootstrap\Tabs;
use common\models\User;

use yii\helpers\HtmlPurifier;
use yii\helpers\Url;


$this->title = 'Meine Bücher';
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="buecher-index">

<h1><?= Html::encode($this->title) ?></h1>
