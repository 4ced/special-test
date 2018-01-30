<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Buecher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buecher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ort_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'isbn')->textInput() ?>

    <?= $form->field($model, 'titel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beschreibung')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
