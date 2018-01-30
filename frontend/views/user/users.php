<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
// protected function initDefaultButtons()
//   {
//           if (!isset($this->buttons['view'])) {
//                   $this->buttons['view'] = function ($model, $key, $index, $column) {
//                           /** @var ActionColumn $column */
//                           $url = $column->createUrl($model, $key, $index, 'view');
//                           return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
//                                   'title' => Yii::t('yii', 'View'),
//                           ]);
//                   };
//           }
//           if (!isset($this->buttons['update'])) {
//                   $this->buttons['update'] = function ($model, $key, $index, $column) {
//                           /** @var ActionColumn $column */
//                           $url = $column->createUrl($model, $key, $index, 'update');
//                           return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
//                                   'title' => Yii::t('yii', 'Update'),
//                           ]);
//                   };
//           }
//           if (!isset($this->buttons['delete'])) {
//                   $this->buttons['delete'] = function ($model, $key, $index, $column) {
//                           /** @var ActionColumn $column */
//                           $url = $column->createUrl($model, $key, $index, 'delete');
//                           return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
//                                   'title' => Yii::t('yii', 'Delete'),
//                                   'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
//                                   'data-method' => 'post',
//                           ]);
//                   };
//           }
//   }

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
                'template'=>'{addfriend}{info}',
                'buttons' => [
                    'addfriend' => function ($url, $model) {
                               return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [
                                       'title' => Yii::t('yii', 'Add'),
                               ]);
                    }
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
