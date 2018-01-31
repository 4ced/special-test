<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model common\models\User */

?>
<div class="buecher-index">
<?php
var_dump($aryBuecher);
echo Tabs::widget([
  'items' => [
    [
      'label' => 'Meine Bücher',
      'content' =>   '<div class="container">' . $this->render('detailview', [
        'model' => $model,
      ]) . '</div>'
    ],
    [
      'label' => 'Bücher',
      'content' =>   '<div class="container">' . $this->render('//buecher/buecherview', [
        'aryBuecher' => $aryBuecher,
      ]) . '</div>'
    ],
  ],
  'options' => ['class' => 'pebibtab'],
]);
?>
</div>
