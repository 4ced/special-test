
<?php

use yii\helpers\Html;
use yii\grid\GridView2;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\bootstrap\Tabs;
use common\models\User;

use yii\helpers\HtmlPurifier;
use yii\helpers\Url;


?>

<!-- <div class="pebib-style buecher-index"> -->
  <!-- <div class="container"> -->
  <div class="col-md-12 mycol">
      <form method="get">
    <input type="search" placeholder="search" name="q"

    value="<?=isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ;

    ?>" />
    <input type="submit" value="search" />
    </form>

  </div>

<?php
foreach ($allebuecher as $buch) {
  ?>
  <a href = <?= Url::to(["buecher/view", 'id' => $buch['buecher_id']]);?>>
  <div class="col-md-3 mycol">
    <div class ="mydivimg">
      <?php echo Html::img('@web/images/covers/default.png', $options = ["class" => "myimg"] ) ?>
    </div>
    <h3><?= Html::encode($buch['titel']) ?></h3>
    <h3><?= Html::encode($buch['isbn']) ?></h3>
  </div>
</a>
<?php
}
?>
<!-- </div> -->
<!-- </div> -->
