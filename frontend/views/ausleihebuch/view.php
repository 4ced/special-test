<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AusleiheBuch */

$this->title = $model->ausleihebuch_id;
$this->params['breadcrumbs'][] = ['label' => 'Ausleihe Buches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ausleihe-buch-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ausleihebuch_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ausleihebuch_id], [
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
            'ausleihebuch_id',
            'user_id',
            'ausleihen_ausleihen_id',
            'buecher_id',
            'leihbeginn',
            'leihende',
            'rückgabe',
        ],
    ]) ?>

</div>
