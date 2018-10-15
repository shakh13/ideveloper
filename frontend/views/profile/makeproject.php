<?php
/**
 * Created by PhpStorm.
 * User: shaxzod
 * Date: 08.10.18
 * Time: 0:01
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Оформить заказ";

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
?>
    <div class="row white pad150 mar150 z-depth-1-half" >
        <div class="col s12 m8 offset-m2">
            <ul class="mbreadcrumb">
                <li>
                    <?= Html::a('Главная страница', ['/profile']) ?>
                </li>
                <li>
                    <?= Html::a('Опубликовать проект', ['/profile/make-order']) ?>
                </li>
            </ul>
        </div>
        <?= $form->field($model, 'title', [
            'options' => [
                'class' => 'col s12 m8 offset-m2 input-field'
            ]
        ])
            ->label('Название проекта') ?>
        <?= $form->field($model, 'description', [
                    'options' => ['class' => 'col s12 m8 offset-m2 input-field']
                ])
            ->label('Краткое описание')
        ?>
        <?= $form->field($model, 'content', [
                    'options' => ['class' => 'col s12 m8 offset-m2 input-field']
                ])
            ->textarea(['class' => 'materialize-textarea'])
            ->label('Описание')
        ?>
        <?= $form->field($model, 'price', [
                    'options' => [
                        'class' => 'col s5 m3 offset-m2 input-field'
                    ]
            ])
            ->input('number', ['min' => 20])
            ->label('Цена')
        ?>
        <?= $form->field($model, 'currency', [
                    'options' => [
                        'class' => 'col s3 m3 input-field'
                    ]
            ])
            ->dropDownList(['$' => 'USD', 'UZS' => 'UZS'])
            ->label('')
        ?>
        <?= $form->field($model, 'pay', [
                    'options' => [
                            'class' => 'col s4 m2 input-field'
                    ]
            ])
            ->input('number', ['value' => 100, 'min' => 40, 'max' => 100])
            ->label('Предоплата %')
        ?>
        <div class="col s12 m8 offset-m2">
            <?= $form->field($model, 'file')->fileInput(['required']) ?>
        </div>

        <?php
            $cats = \common\models\Category::find()->orderBy('name')->all();
            $categories = \yii\helpers\ArrayHelper::map($cats, 'id', 'name');

            echo $form->field($model, 'category_id', [
                        'options' => [
                                'class' => 'col s7 m5 offset-m2 input-field'
                        ]
                ])
                ->dropDownList($categories)
                ->label('')
        ?>

        <?= $form->field($model, 'deadline', [
                    'options' => [
                            'class' => 'col s5 m3 input-field'
                    ]
            ])
            ->input('text', ['class' => 'datepicker', 'required'])
            ->label('Срок до')
        ?>
        <div class="col s12 m4 offset-m4"><button type="submit" class="btn w100">К оплату</button></div>
    </div>
<?php
    ActiveForm::end();
?>