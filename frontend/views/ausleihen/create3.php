<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Ausleihen */

$this->title = 'Create Ausleihen';
$this->params['breadcrumbs'][] = ['label' => 'Ausleihens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ausleihen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form3', [
        'model' => $model,
        'list' => $list,
    ]) ?>

</div>
