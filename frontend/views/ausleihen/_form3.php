<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model common\models\Ausleihen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ausleihen-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->

    <!-- <?= $form->field($model, 'ausleiher')->textInput() ?> -->
    <?php
    echo $form->field($model, 'ausleiher')->dropdownList($list, ['prompt'=>'Select Category']);
    // $form->field($model, 'ausleiher')->textInput()
    ?>
    <?php
    // echo DatePicker::widget([
    //   	'name' => 'check_issue_date',
    //   	'value' => date('d-M-Y', strtotime('+2 days')),
    //   	'options' => ['placeholder' => 'Select issue date ...'],
    //   	'pluginOptions' => [
    //   		'format' => 'dd-M-yyyy',
    //   		'todayHighlight' => true
    //   	]
    //   ]);
    ?>
    <?= $form->field($model, 'leihbeginn', [
      'template' => "<label class='col-xs-4 col-sm-4 col-md-3 col-lg-3 control-label'>{label}</label><div class='col-xs-6 col-sm-7 col-md-5 col-lg-5'>{input}</div>\n{hint}\n{error}"
      ])->widget(DatePicker::classname(),[
        'options' => ['placeholder' => ''],
        'value' => date('d-M-Y'),
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'readonly' => true,

        'pluginOptions' => [
          'autoclose'=>true,
          'format' => 'dd.mm.yyyy',
          'todayHighlight' => TRUE,
      ]
      ]);
    ?>
    <?= $form->field($model, 'leihende', [
      'template' => "<label class='col-xs-4 col-sm-4 col-md-3 col-lg-3 control-label'>{label}</label><div class='col-xs-6 col-sm-7 col-md-5 col-lg-5'>{input}</div>\n{hint}\n{error}"
      ])->widget(DatePicker::classname(),[
        'options' => ['placeholder' => ''],
        'value' => date('d-M-Y'),
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'readonly' => true,

        'pluginOptions' => [
          'autoclose'=>true,
          'format' => 'dd.mm.yyyy',
          'todayHighlight' => TRUE,
      ]
      ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
