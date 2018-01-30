<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Buecher */

$this->title = 'Update Buecher: ' . $model->buecher_id;
$this->params['breadcrumbs'][] = ['label' => 'Buechers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->buecher_id, 'url' => ['view', 'id' => $model->buecher_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="buecher-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
