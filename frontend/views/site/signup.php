<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Создать аккаунт';
?>

<div class="container">
    <div class="center">
        <img src="logo0.png" width="58" height="58" style="margin: 30px 0 0px 0;">
        <h5 class="grey-text text-darken-2">Создать аккаунт</h5>
        <br>
    </div>
    <div class="row">
        <div class="col s12 m4 offset-m4 white z-depth-1-half mb20">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username', ['options' => ['class' => 'input-field']])
                ->textInput(['autofocus' => true])
                ->label('Логин') ?>

            <?= $form->field($model, 'email', ['options' => ['class' => 'input-field']]) ?>

            <?= $form->field($model, 'password', ['options' => ['class' => 'input-field']])
                ->passwordInput()
                ->label('Пароль') ?>

            <p class="center">
                <?= Html::submitButton('Создать аккаунт', ['class' => 'btn w100', 'name' => 'signup-button']) ?>
            </p>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>