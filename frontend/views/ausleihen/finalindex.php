<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

?>
<div class="buecher-index">
    <?php

    echo Tabs::widget([
      'items' => [
        [
          'label' => 'Ausgeliehen',
          'content' =>   '<div class="container">' . $this->render('ausleihenview', [
            'grpAusgeliehen' => $grpAusgeliehen,
          ]) . '</div>'
        ],
        [
          'label' => 'Verliehen',
          'content' =>   '<div class="container">' . $this->render('verliehenview', [
            'grpVerliehen' => $grpVerliehen,
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
