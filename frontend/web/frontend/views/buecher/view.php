<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Buecher */

$this->title = $model->buecher_id;
$this->params['breadcrumbs'][] = ['label' => 'Buechers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buecher-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->buecher_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->buecher_id], [
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
            'buecher_id',
            'ort_id',
            'user_id',
            'isbn',
            'titel',
            'beschreibung',
        ],
    ]) ?>

</div>
