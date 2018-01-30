<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Orts';
// $this->params['breadcrumbs'][] = $this->title;

?>
<div class="ort-index">

  <div class="col-md-12 mycol">
    <?= Html::a('Create Ort', ['create'], ['class' => 'btn btn-success']) ?>
      <form method="get">
    <input type="search" placeholder="search" name="q"

    value="<?=isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ;

    ?>" />
    <input type="submit" value="search" />
    </form>

  </div>

  <?php
  foreach ($orte as $ort) {
    ?>
    <a href = <?= Url::to(["orte/view", 'id' => $ort['ort_id']]);?>>
    <div class="col-md-3 mycol">
      <h3><?= Html::encode($ort['name']) ?></h3>
    </div>
  </a>
  <?php
  }
  ?>
