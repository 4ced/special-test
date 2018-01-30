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

    <!-- <?= $form->field($model, 'isbn')->textInput() ?> -->

    <?php
    // $attribs = array();
    // $criteria = new CDbCriteria(array('order'=>'name ASC'));
    $list = ArrayHelper::map(Ort::find()->all(), 'ort_id', 'name');
    // var_dump($list);
    echo $form ->field($model, 'ort_id')->dropdownList($list, ['prompt'=>'Select Category']);
    // echo $form->dropDownList($model,'ort_id',
    //                                    $list,
    //                                    array('empty' => Yii::t("app", 'dropdown-keine-auswahl')));
    //
    ?>

    <!-- <?= $form->field($model, 'titel')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'beschreibung')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <!-- <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?> -->
        <?= Html::submitButton('sortaccept',[ 'name'=>'sortaccept', 'value' => 'print', 'class' => 'btn btn-success','data-pjax' => 0]) ?>
    </div>


    <!-- <?= Html::submitButton('stop',[ 'name'=>'stop', 'value' => 'view', 'class' => 'btn btn-default','data-pjax' => 0]) ?> -->

    <?php ActiveForm::end(); ?>

</div>
