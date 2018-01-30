<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>
<!-- <div class="well"> -->
<div class="post">
  <a href = <?=Url::to(["buecher/view", 'id' => $model->buecher_id]);?>>
  <div class="col-md-3 mycol">
    <div class ="mydivimg">
      <?php echo Html::img('@web/images/covers/default.png', $options = ["class" => "myimg"] ) ?>
    </div>
    <h3><?= Html::encode($model->titel) ?></h3>
    <h3><?= Html::encode($model->autor) ?></h3>
    <!-- <h3><?= Html::encode($model->isbn) ?></h3> -->

    <!-- <?= HtmlPurifier::process($model->autor) ?> -->
  </div>
</a>
</div>
<!-- </div> -->
