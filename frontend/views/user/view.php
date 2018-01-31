<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model common\models\User */

?>
<div class="buecher-index">
<?php
echo Tabs::widget([
  'items' => [
    [
      'label' => 'Meine Bücher',
      'content' =>   '<div class="container">' . $this->render('viewme', [
        'model' => $model,
      ]) . '</div>'
    ],
    [
      'label' => 'Bücher',
      'content' =>   '<div class="container">' . $this->render('//buecher/buecherview', [
        'allebuecher' => $aryBuecher,
      ]) . '</div>'
    ],
  ],
  'options' => ['class' => 'pebibtab'],
]);
?>
</div>
