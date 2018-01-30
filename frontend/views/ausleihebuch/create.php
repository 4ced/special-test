<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AusleiheBuch */

$this->title = 'Create Ausleihe Buch';
$this->params['breadcrumbs'][] = ['label' => 'Ausleihe Buches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ausleihe-buch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
