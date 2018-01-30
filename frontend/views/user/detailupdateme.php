<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
<div class="buecher-view">
  <div class="row">
    <div class="col-md-12 patrick-col">
          <?= Html::submitButton('<span class="glyphicon glyphicon-ok"></span>', ['class' => 'btn-patrick']) ?>
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3" style="height: 500px;">
      <?php echo Html::img('@web/images/profile/default.png', $options = ["class" => "myimg"] ) ?>

      <?= $form->field($model, 'imageFile')->fileInput() ?>


    </div>
    <div class="row">
      <div class="col-md-4">

        <?= $form->field($model, 'public_status')->textInput() ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ort')->textInput(['maxlength' => true]) ?>

      </div>
      <div class="col-md-4">

      </div>
    </div>
  <?php ActiveForm::end(); ?>
  </div>
</div>
