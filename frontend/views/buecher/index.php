<?php

use yii\helpers\Html;
use yii\grid\GridView2;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meine Bücher';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="buecher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Create Buecher', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
    <?php
    echo Tabs::widget([
    'items' => [
        [
          // 'label' => 'my_label',
      'options' => ['style' =>'background-color: red;]'],
            'label' => 'Alle Bücher',
            'content' => "<div class = well> " . ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_post',
                // 'options' => ['class' => 'mytab'],
                // 'columns' => [
                //     ['class' => 'yii\grid\SerialColumn'],
                //
                //     'buecher_id',
                //     'ort_id',
                //     'user_id',
                //     'isbn',
                //     'titel',
                //     // 'beschreibung',
                //     'autor',
                //
                //     ['class' => 'yii\grid\ActionColumn'],
                // ],
            ]) . "</div>",
            'active' => true
        ],
        [
            'label' => 'Bücherregale',
            'content' => 'Anim pariatur cliche...',
            // 'headerOptions' => [...],
            // 'options' => ['id' => 'myveryownID'],
        ],
        // [
        //     'label' => 'Example',
        //     'url' => 'http://www.example.com',
        // ],
        // [
        //     'label' => 'Dropdown',
        //     'items' => [
        //          [
        //              'label' => 'DropdownA',
        //              'content' => 'DropdownA, Anim pariatur cliche...',
        //          ],
        //          [
        //              'label' => 'DropdownB',
        //              'content' => 'DropdownB, Anim pariatur cliche...',
        //          ],
        //          [
        //              'label' => 'External Link',
        //              'url' => 'http://www.example.com',
        //          ],
        //     ],
        // ],
    ],
      'options' => ['class' => 'mytab'],
]);
?>
    <!-- <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'buecher_id',
            'ort_id',
            'user_id',
            'isbn',
            'titel',
            // 'beschreibung',
            'autor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?> -->
</div>
