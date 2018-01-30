<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model common\models\Ausleihen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ausleihen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ausleihen_id',
            'user_id',
            'buch_id',
            'ausleiher',
            'leihbeginn',
            'leihende',
            'status',
        ],
    ]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'ausleiher')->textInput() ?>

    <div class="form-group">
        <!-- <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?> -->
        <?= Html::submitButton('Bestätigen', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
