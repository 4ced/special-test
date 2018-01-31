<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;
use common\models\Buecher;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Ausleihen */

// $this->title = $model->ausleihen_id;
// $this->params['breadcrumbs'][] = ['label' => 'Ausleihens', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
// var_dump($grpAusgeliehen);
foreach ($grpAusgeliehen as $key => $value) {
  $user = User::find()->where('id = :id', ['id' => $key])->one();
  echo '<div class="col-md-12">';
  echo '<h1>' . $user->username . '</h1>';
  echo '</div>';
  // var_dump(sizeof($value));
  for ($j = 0; $j < sizeof($value); $j++) {
      if (isset($value[$j])) {
          $buch = Buecher::find()->where('buecher_id = :id', ['id' => $value[$j]])->asArray()->one();
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
  }


}
?>
