<?php
use yii\helpers\Html;
use yii\grid\GridView2;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\bootstrap\Tabs;


// $this->title = 'Meine Bücher';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="buecher-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php

    echo Tabs::widget([
      'items' => [
        [
          'label' => 'Meine Bücher',
          'content' =>   '<div class="container">' . $this->render('buecherview', [
            'allebuecher'=> $allebuecher,
          ]) . '</div>'
        ],
        [
          'label' => 'Bücherregale',
          'content' =>   '<div class="container">' . $this->render('regaleview', [
            'aryGroup'=> $aryGroup,
          ]) . '</div>'
        ]
      ],
      'options' => ['class' => 'pebibtab'],
    ]);

    ?>
    <!-- <form method="get">
    <input type="search" placeholder="search" name="q"

    value="<?=isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ;

    ?>" />
    <input type="submit" value="search" />
    </form> -->

</div>
