
<?php

use yii\helpers\Html;
use yii\grid\GridView2;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\bootstrap\Tabs;
use common\models\User;
use yii\widgets\DetailView;

use yii\helpers\HtmlPurifier;
use yii\helpers\Url;


?>
<div class="buecher-view">
  <!-- <div class="well"> -->
  <div class="row">
    <div class="col-md-12 patrick-col">
      <!-- <?php echo Html::img('@web/images/covers/default.png', $options = ["class" => "myimg"] ) ?> -->
      <p>
          <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->buecher_id], ['class' => 'btn-patrick']) ?>
          <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->buecher_id], [
            'class' => 'btn-patrick',
              'data' => [
                  'confirm' => 'Are you sure you want to delete this item?',
                  'method' => 'post',
              ],
          ]) ?>
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <?php echo Html::img('@web/images/covers/default.png', $options = ["class" => "myimg"] ) ?>
    </div>
    <div class="col-md-4">
      <?= DetailView::widget([
          'model' => $model,
          'options' => ["class" => "mydetailview"],
          'attributes' => [
              // 'buecher_id',
              // 'ort_id',
              // 'user_id',
              'titel',
              'autor',
              'isbn',
              'kategorie',
              'seitenzahl',
              // 'beschreibung',
          ],
      ]) ?>
    </div>
    <div class="col-md-4">
      <?= DetailView::widget([
          'model' => $model,
          'options' => ["class" => "mydetailview"],
          'attributes' => [
              // 'buecher_id',
              // 'ort_id',
              // 'user_id',
              'imageFile',
              // 'autor',
              // 'isbn',
              // 'kategorie',
              // 'seitenzahl',
              // 'beschreibung',
          ],
      ]) ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?= DetailView::widget([
          'options' => ["class" => "mydetailview"],
          'model' => $model,
          'attributes' => [
              // 'buecher_id',
              // 'ort_id',
              // 'user_id',
              // 'isbn',
              // 'titel',
              'beschreibung',
              // 'autor'
          ],
      ]) ?>
    </div>
  <!-- </div> -->
  </div>
</div>
