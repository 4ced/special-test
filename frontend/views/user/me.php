<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;


?>
<div class="buecher-index">
<?php
    echo Tabs::widget([
      'items' => [
        [
          'label' => 'Me',
          'content' =>   '<div class="container">' . $this->render('viewme', [
            'dataProvider'=> $dataProvider,
            'model' => $model,
          ]) . '</div>'
        ],
      ],
      'options' => ['class' => 'pebibtab'],
    ]);
    ?>
</div>
