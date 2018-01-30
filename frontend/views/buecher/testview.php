
<?php

use yii\helpers\Html;
use yii\grid\GridView2;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\bootstrap\Tabs;
use common\models\User;

use yii\helpers\HtmlPurifier;
use yii\helpers\Url;


$this->title = 'Meine Bücher';
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="buecher-index">

<h1><?= Html::encode($this->title) ?></h1>

<?php
foreach ($aryGroup as $key => $value) {
    $user = User::find()->where('id = :id', ['id' => $key])->one();
    // var_dump($user);
    echo '<div class="col-md-12">';
    echo '<h1>' . $user->username . '</h1>';
    echo '</div>';
    for ($j = 0; $j < 8; $j++) {
        if (isset($value[$j])) {
            // var_dump($value[$j]);
            ?>
            <a href = <?= Url::to(["buecher/view", 'id' => $value[$j]['buecher_id']]);?>
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


 ?>
