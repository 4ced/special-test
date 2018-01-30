<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buechers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buecher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Buecher', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'buecher_id',
            'ort_id',
            'user_id',
            'isbn',
            'titel',
            // 'beschreibung',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
