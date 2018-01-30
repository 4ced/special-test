<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Buecher */

$this->title = 'Create Buecher';
$this->params['breadcrumbs'][] = ['label' => 'Buechers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buecher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
