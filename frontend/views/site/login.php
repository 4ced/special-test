<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row">
        <div class="col-lg-5">
          <!-- <img src="/../../assets/PeBib_Logo.jpg" class="img-fluid" alt="Responsive image" width="250px"> -->
          <?php echo Html::img('@web/images/PeBib_Logo.jpg') ?>
        </div>
        <div class="col-lg-5">
            <h1 class="login"><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <p>If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.</p>
                    <p>Noch kein Konto. <?= Html::a('Jetzt registrieren', ['site/signup'])?>.</p>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn mybtn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="row">
    </div>

</div>
