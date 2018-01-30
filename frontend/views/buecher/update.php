<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model common\models\Buecher */

// $this->title = 'Update Buecher: ' . $model->buecher_id;
// $this->params['breadcrumbs'][] = ['label' => 'Buechers', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->buecher_id, 'url' => ['view', 'id' => $model->buecher_id]];
// $this->params['breadcrumbs'][] = 'Update';
?>
<div class="buecher-index">
<?php
echo Tabs::widget([
  'items' => [
    [
      'label' => 'Meine Bücher',
      'content' =>   '<div class="container">' . $this->render('buecherdetailupdate', [
        'model' => $model,
      ]) . '</div>'
    ],
  ],
  'options' => ['class' => 'pebibtab'],
]);
?>
</div>
