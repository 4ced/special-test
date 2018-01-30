<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model common\models\User */

?>
<div class="buecher-index">
<?php
echo Tabs::widget([
  'items' => [
    [
      'label' => 'Me',
      'content' =>   '<div class="container">' . $this->render('detailupdateme', [
        'model' => $model,
      ]) . '</div>'
    ],
  ],
  'options' => ['class' => 'pebibtab'],
]);
?>
</div>
