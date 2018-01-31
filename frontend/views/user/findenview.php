<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\User;
use common\models\Buecher;

/* @var $this yii\web\View */
/* @var $model common\models\User */
foreach ($aryOtherUsers as $user) {
          $buecher = Buecher::find()->where('user_id = :id', ['id' => $user["id"]])->asArray()->all();
          ?>
          <a href = <?= Url::to(["user/view", 'id' => $user["id"]]);?>>
          <div class="col-md-4 mycol">
            <div class ="mydivimg">
              <?php echo Html::img('@web/images/profile/default.png', $options = ["class" => "myimg"] ) ?>
            </div>
            <h3><?= Html::encode($user["username"]) ?></h3>
            <h3>Bücher anzahl:</h3>
            <h3><?= sizeof($buecher); ?></h3>
          </div>
        </a>
        <?php


}
