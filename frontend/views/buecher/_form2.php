<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Ort;
// use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Buecher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buecher-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'ort_id')->textInput() ?>-->

    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->

    <?= $form->field($model, 'isbn')->textInput() ?>

    <?php
    $attribs = array();
    // $criteria = new CDbCriteria(array('order'=>'name ASC'));
    $list = ArrayHelper::map(Ort::find()->all(), 'ort_id', 'name');
    // var_dump($list);
    echo $form ->field($model, 'ort_id')->dropdownList($list, ['prompt'=>'Select Category']);
    // echo $form->dropDownList($model,'ort_id',
    //                                    $list,
    //                                    array('empty' => Yii::t("app", 'dropdown-keine-auswahl')));
    //
    ?>

    <?= $form->field($model, 'titel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beschreibung')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'autor')->textInput(['autor' => true]) ?>

    <?= $form->field($model, 'kategorie')->textInput() ?>

    <?= $form->field($model, 'seitenzahl')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::submitButton('ausleihen',[ 'name'=>'ausleihen', 'value' => 'print', 'class' => 'btn btn-primary','data-pjax' => 0]) ?>
        <?= Html::submitButton('aufräumen',[ 'name'=>'sort', 'value' => 'print', 'class' => 'btn btn-info','data-pjax' => 0]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
