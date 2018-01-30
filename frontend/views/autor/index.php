<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\autorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Autors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Autor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'autor_id',
            'vorname',
            'nachname',
            'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
