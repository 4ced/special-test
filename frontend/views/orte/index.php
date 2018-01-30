<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="buecher-index">
<?php
    echo Tabs::widget([
      'items' => [
        [
          'label' => 'Standorte',
          'content' =>   '<div class="container">' . $this->render('orteindex', [
            'dataProvider'=> $dataProvider,
            'orte' => $orte,
          ]) . '</div>'
        ],
      ],
      'options' => ['class' => 'pebibtab'],
    ]);
    ?>
</div>
