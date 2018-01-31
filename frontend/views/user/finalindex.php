<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

// var_dump($aryFriends);
// var_dump($aryFriendrequests);
// var_dump($aryOtherUsers);
?>
<div class="buecher-index">
    <?php

    echo Tabs::widget([
      'items' => [
        [
          'label' => 'Freunde',
          'content' =>   '<div class="container">' . $this->render('freundeview', [
            'aryFriends' => $aryFriends,
          ]) . '</div>'
        ],
        [
          'label' => 'Freunde finden',
          'content' =>   '<div class="container">' . $this->render('findenview', [
            'aryOtherUsers' => $aryOtherUsers,
          ]) . '</div>'
        ],
        // [
        //   'label' => 'Anfragen',
        //   'content' =>   '<div class="container">' . $this->render('anfragenview', [
        //     'aryFriendrequests' => $aryFriendrequests,
        //   ]) . '</div>'
        // ],
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
