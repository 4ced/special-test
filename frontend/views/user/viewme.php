<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

// $this->title = $model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
      <div class="col-md-12 patrick-col">
        <!-- <?php echo Html::img('@web/images/covers/default.png', $options = ["class" => "myimg"] ) ?> -->
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['updateme', 'id' => $model->id], ['class' => 'btn-patrick']) ?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <?php echo Html::img('@web/images/profile/' . $model->id.'.jpg', $options = ["class" => "myimg"] ) ?>
      </div>
      <div class="col-md-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => ["class" => "mydetailview"],
            'attributes' => [
                // 'id',
                'username',
                // 'auth_key',
                // 'password_hash',
                // 'password_reset_token',
                'email:email',
                'public_status',
                'ort'
            ],
        ]) ?>
      </div>
      <div class="col-md-4">
      </div>
    </div>
</div>
