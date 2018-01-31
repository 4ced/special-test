<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Ort;
use yii\bootstrap\ActiveForm;
// use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Buecher */
/* @var $form yii\widgets\ActiveForm */
var_dump($model->imageFile);
?>

<!-- <div class="buecher-form"> -->
<?php $form = ActiveForm::begin(['layout' => 'horizontal']);
// echo $form->field($model, 'imageFile')->hiddenInput(['value'=> $model->imageFile])->label(false)
echo $form->field($model, 'imageFile')->textInput(['maxlength' => true]);
?>
<div class="buecher-view">
  <div class="row">
    <div class="col-md-12 patrick-col">
          <?= Html::submitButton('<span class="glyphicon glyphicon-ok"></span>', ['class' => 'btn-patrick']) ?>
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3" style="height: 500px;">
      <?php
      if (isset($model->imageFile)) {
          if(file_exists('@web/images/covers/' .$model->imageFile)) {
              echo Html::img('@web/images/covers/' .$model->imageFile, $options = ["class" => "myimg"] );
          } else {
              echo Html::img($model->imageFile, $options = ["class" => "myimg"] );
          }

      } else {
          echo Html::img('@web/images/covers/default.png', $options = ["class" => "myimg"]);
      }
      ?>

      <?= $form->field($model, 'imageFile')->fileInput() ?>


    </div>
    <div class="row">
      <div class="col-md-4">

        <?= $form->field($model, 'isbn')->textInput() ?>
        <?php
        $list = ArrayHelper::map(Ort::find()->where('user_id = :id', ['id' => \Yii::$app->user->identity->id])->all(), 'ort_id', 'name');
        echo $form->field($model, 'ort_id')->dropdownList($list, ['prompt'=>'Select Category']);
        ?>
        <?= $form->field($model, 'titel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'autor')->textInput(['autor' => true]) ?>

        <?= $form->field($model, 'kategorie')->textInput() ?>

        <?= $form->field($model, 'seitenzahl')->textInput() ?>
      </div>
      <div class="col-md-4">

      </div>
      <div class="col-md-8">

        <?= $form->field($model, 'beschreibung')->textarea(['rows' => '6']) ?>
      </div>
    </div>
  <?php ActiveForm::end(); ?>
  </div>
</div>
