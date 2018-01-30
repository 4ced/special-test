<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ausleihen */

$this->title = $model->ausleihen_id;
$this->params['breadcrumbs'][] = ['label' => 'Ausleihens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ausleihen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ausleihen_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ausleihen_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ausleihen_id',
            'user_id',
            'ausleiher',
            'leihbeginn',
            'leihende',
        ],
    ]) ?>

</div>
