<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ausleihen */

$this->title = 'Update Ausleihen: ' . $model->ausleihen_id;
$this->params['breadcrumbs'][] = ['label' => 'Ausleihens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ausleihen_id, 'url' => ['view', 'id' => $model->ausleihen_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ausleihen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
