<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ausleihebuchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ausleihe Buches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ausleihe-buch-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ausleihe Buch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ausleihebuch_id',
            'user_id',
            'ausleihen_ausleihen_id',
            'buecher_id',
            'leihbeginn',
            // 'leihende',
            // 'rückgabe',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
