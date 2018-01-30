<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model common\models\Ort */
?>
<div class="buecher-index">
<?php
    echo Tabs::widget([
      'items' => [
        [
          'label' => 'Standorte',
          'content' =>   '<div class="container">' . $this->render('orteview', [
            'model'=> $model,
          ]) . '</div>'
        ],
      ],
      'options' => ['class' => 'pebibtab'],
    ]);
    ?>
</div>
