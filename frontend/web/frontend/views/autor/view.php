<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Autor */

$this->title = $model->autor_id;
$this->params['breadcrumbs'][] = ['label' => 'Autors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->autor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->autor_id], [
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
            'autor_id',
            'vorname',
            'nachname',
            'user_id',
        ],
    ]) ?>

</div>
