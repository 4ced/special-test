<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Autor */

$this->title = 'Update Autor: ' . $model->autor_id;
$this->params['breadcrumbs'][] = ['label' => 'Autors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->autor_id, 'url' => ['view', 'id' => $model->autor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="autor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
