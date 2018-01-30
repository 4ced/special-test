<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ausleihebuchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ausleihe-buch-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ausleihebuch_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'ausleihen_ausleihen_id') ?>

    <?= $form->field($model, 'buecher_id') ?>

    <?= $form->field($model, 'leihbeginn') ?>

    <?php // echo $form->field($model, 'leihende') ?>

    <?php // echo $form->field($model, 'rückgabe') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
