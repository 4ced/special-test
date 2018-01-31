<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */
foreach ($aryFriends as $friend) {
          $user = User::find()->where('id = :id', ['id' => $friend])->one();
          ?>
          <a href = <?= Url::to(["user/view", 'id' => $user->id]);?>>
          <div class="col-md-4 mycol">
            <div class ="mydivimg">
              <?php echo Html::img('@web/images/profile/default.png', $options = ["class" => "myimg"] ) ?>
            </div>
            <h3><?= Html::encode($user->username) ?></h3>
          </div>
        </a>
        <?php


}
