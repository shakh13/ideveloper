<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Вход';
?>

<div class="container">
    <div class="center">
        <img src="logo0.png" width="58" height="58" style="margin: 30px 0 0px 0;">
        <h5 class="grey-text text-darken-2">Войти в iDeveloper</h5>
        <br>
    </div>
    <div class="row">
        <div class="col s12 m4 offset-m4 white z-depth-1-half mb20">
            <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>
                <?= $form->field($model, 'username', ['options' => ['class' => 'input-field']])
                    ->textInput(['autofocus' => true, 'id' => 'username'])
                    ->label('Логин или Email') ?>
                <?= $form->field($model, 'password', ['options' => ['class' => 'input-field']])
                    ->passwordInput()
                    ->label('Пароль') ?>
                <p>
                    <input type="hidden" name="LoginForm[rememberMe]" value="0">
                    <label>
                        <input type="checkbox" id="rememberMe" name="LoginForm[rememberMe]" value="1" class="filled-in" checked>
                        <span>Запомнить</span>
                    </label>
                </p>
                <p>
                    <button type="submit" class="btn w100">Войти</button>
                </p>

                <p class="center">
                    <?= Html::a("Забыли пароль?", ['/site/request-password-reset']) ?>
                </p>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col s12 m4 offset-m4 white z-depth-1-half">
            <p class="center">
                Новое на iDeveloper?
                <?= Html::a('Создать аккаунт.', ['/site/signup']) ?>
            </p>
            <p class="center">или</p>
            <div class="row">
                <div class="col s4 m4 l4 center">
                    <?= Html::a("<span class='fa fa-facebook'/>",
                        ['/site/login', 'with' => 'facebook'],
                        ['class' => 'btn btn-block btn-facebook']) ?>
                </div>
                <div class="col s4 m4 l4 center">
                    <?= Html::a("<span class='fa fa-google'/>",
                        ['/site/login', 'with' => 'google'],
                        ['class' => 'btn btn-block btn-google']) ?>
                </div>
                <div class="col s4 m4 l4 center">
                    <?= Html::a("<span class='fa fa-github'/>",
                        ['/site/login', 'with' => 'github'],
                        ['class' => 'btn btn-block btn-github']) ?>
                </div>
            </div>
        </div>
    </div>
</div>