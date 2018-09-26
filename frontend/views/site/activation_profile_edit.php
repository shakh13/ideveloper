<?php
/**
 * Created by PhpStorm.
 * User: shaxzod
 * Date: 23.09.18
 * Time: 23:15
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = "Сведение о пользователья";

?>

<div class="container">
    <div class="center">
        <img src="logo0.png" width="58" height="58" style="margin: 30px 0 0px 0;">
        <h5 class="grey-text text-darken-2"><?= $this->title ?></h5>
        <br>
    </div>
    <div class="row">
        <div class="col s12 m4 offset-m4 white z-depth-1-half mb20">
            <?php $form = ActiveForm::begin(['id' => 'form-profile', 'action' => ['/site/activate-profile']]); ?>

            <input type="hidden" name="user_id" value="<?= $user->id ?>" required>
            <input type="hidden" name="activation_code" value="<?= $activation_code ?>" required>

            <?= $form->field($model, 'role', ['options' => ['class' => 'input-field']])
                ->dropDownList([2 => 'Заказчик', 1 => 'Фрилансер'])
                ->label('')?>

            <?= $form->field($model, 'firstname', ['options' => ['class' => 'input-field']])
                ->textInput(['autofocus' => true])
                ->label('Имя') ?>

            <?= $form->field($model, 'lastname', ['options' => ['class' => 'input-field']])
                ->label('Фамилия') ?>

            <?= $form->field($model, 'address', ['options' => ['class' => 'input-field']])
                ->label('Адрес') ?>

            <?php
                $cities = \yii\helpers\ArrayHelper::map(\common\models\City::find()->orderBy('name_ru')->all(), 'id', 'name_ru');
                echo $form->field($model, 'city_id', ['options' => ['class' => 'input-field']])
                        ->dropDownList($cities)
                        ->label('');
            ?>

            <?= $form->field($model, 'postcode', ['options' => ['class' => 'input-field']])
                ->textInput(['type' => 'number', 'min' => 100000, 'max' => 999999])
                ->label('Почтовый индекс')?>

            <?= $form->field($model, 'alias', ['options' => ['class' => 'input-field']])
                ->label('Псевдоним')?>

            <?= $form->field($model, 'phone', ['options' => ['class' => 'input-field']])
                ->textInput(['type' => 'number'])
                ->label('Номер телефона')?>

            <?php
                $categories = \yii\helpers\ArrayHelper::map(\common\models\Category::find()->orderBy('name')->all(), 'id', 'name');
                echo $form->field($model, 'category_id', ['options' => ['class' => ['input-field']]])
                        ->dropDownList($categories)
                        ->label('')
            ?>

            <?= $form->field($model, 'about')->textarea(['class' => 'materialize-textarea']) ?>

            <span class="red-text fs12">
                Пока Вы не заполните Выши данные и не сохраните их, аккаунт не будет активирован.
            </span>

            <p class="center">
                <?= Html::submitButton('Сохранить и активировать', ['class' => 'btn w100', 'name' => 'signup-button']) ?>
            </p>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
