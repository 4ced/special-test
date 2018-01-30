<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            // 'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',
            [
                'class' => ActionColumn::className(),
                // // you may configure additional properties here
                // 'class' => 'yii\grid\ActionColumn',
                'template'=>'{delete}{block}',
                'buttons' => [
                    // 'addfriend' => function ($url, $model) {
                    //            return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                    //                    'title' => Yii::t('yii', 'Add'),
                    //            ]);
                    // },
                    // 'acceptfr' => function ($url, $model) {
                    //            return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, [
                    //                    'title' => Yii::t('yii', 'Add'),
                    //            ]);
                    // },
                    'delete' => function ($url, $model) {
                               return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                                       'title' => Yii::t('yii', 'Add'),
                               ]);
                    },
                    'block' => function ($url, $model) {
                               return Html::a('<span class="glyphicon glyphicon-stop"></span>', $url, [
                                       'title' => Yii::t('yii', 'Add'),
                               ]);
                    },
                    //  $this->buttons['view'] = function ($model, $key, $index, $column) {
                    //          /** @var ActionColumn $column */
                    //          $url = $column->createUrl($model, $key, $index, 'view');
                    //          return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                    //                  'title' => Yii::t('yii', 'View'),
                    //          ]);
                    //  },
                ]

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
