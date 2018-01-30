
<?php

use yii\helpers\Html;
use yii\grid\GridView2;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\bootstrap\Tabs;
use common\models\User;
use common\models\Ort;

use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>
<div class="col-md-12 mycol">
    <form method="get">
  <input type="search" placeholder="search" name="q"

  value="<?=isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ;

  ?>" />
  <input type="submit" value="search" />
  </form>

</div>
<?php
foreach ($aryGroup as $key => $value) {
    $ort = Ort::find()->where('ort_id = :id', ['id' => $key])->one();
    echo '<div class="col-md-12">';
    echo '<h1>' . $ort->name . '</h1>';
    echo '</div>';
    for ($j = 0; $j < 8; $j++) {
        if (isset($value[$j])) {
            ?>
            <a href = <?= Url::to(["buecher/view", 'id' => $value[$j]['buecher_id']]);?>>
            <div class="col-md-3 mycol">
              <div class ="mydivimg">
                <?php echo Html::img('@web/images/covers/default.png', $options = ["class" => "myimg"] ) ?>
              </div>
              <h3><?= Html::encode($value[$j]['titel']) ?></h3>
              <h3><?= Html::encode($value[$j]['isbn']) ?></h3>
            </div>
          </a>
          <?php
        }
    }
}
