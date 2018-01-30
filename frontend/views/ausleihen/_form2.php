<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use common\models\User;
use common\models\Buecher;

/* @var $this yii\web\View */
/* @var $model common\models\Ausleihen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ausleihen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <!-- <?= $form->field($model, 'ausleiher')->textInput() ?> -->
       <?php
          // $attribs = array();
          // $criteria = new CDbCriteria(array('order'=>'name ASC'));
          $list = ArrayHelper::map(User::find()->all(), 'id', 'username');
          $list2 = ArrayHelper::map(Buecher::find()->all(), 'buecher_id', 'titel');
          // var_dump($list);
          echo $form ->field($model, 'ausleiher')->dropdownList($list, ['prompt'=>'Select Ausleiher']);
          echo $form ->field($model, 'buch_id')->dropdownList($list2, ['prompt'=>'Select Ausleiher']);
          // echo DatePicker::widget([
          //     'model' => $model,
          //     'attribute' => 'from_date',
          //     //'language' => 'ru',
          //     //'dateFormat' => 'yyyy-MM-dd',
          // ]);
      ?>

      <?= $form->field($model, 'leihbeginn')->textInput() ?>
      <?= $form->field($model, 'leihende')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
