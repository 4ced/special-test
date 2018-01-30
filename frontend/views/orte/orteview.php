<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ort */

// $this->title = $model->name;
// $this->params['breadcrumbs'][] = ['label' => 'Orts', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="ort-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
      <div class="col-md-12 patrick-col">
        <!-- <?php echo Html::img('@web/images/covers/default.png', $options = ["class" => "myimg"] ) ?> -->
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->ort_id], ['class' => 'btn-patrick']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->ort_id], [
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
      <div class="col-md-12">
        <?= DetailView::widget([
            'model' => $model,
            'options' => ["class" => "mydetailview"],
            'attributes' => [
                // 'ort_id',
                // 'user_id',
                'name',
            ],
        ]) ?>

        </div>
        </div>

    <!-- <p>
        <?= Html::a('Update', ['update', 'id' => $model->ort_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ort_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->



</div>
