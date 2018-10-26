<?php
/**
 * Created by PhpStorm.
 * User: Shaxzod
 * Date: 10.10.2018
 * Time: 11:06
 */
use yii\helpers\Html;

$this->title = "Проекты в ожидании оплаты";

if (count($projects)>0){
    ?>
        <div class="row white z-depth-1-half">
            <div class="col s12 m12">
                <ul class="mbreadcrumb">
                    <li>
                        <?= Html::a('Главная страница', ['/profile']) ?>
                    </li>
                    <li>
                        <?= Html::a('Проекты и ожидании оплаты', ['/profile/orders-in-payment']) ?>
                    </li>
                </ul>
            </div>
            <div class="col s12 m12">
                <ul class="collapsible">
                    <?php
                    foreach ($projects as $project){
                        ?>
                        <li>
                            <div class="collapsible-header">
                                <b><?= $project->title ?></b>
                            </div>
                            <div class="collapsible-body">
                                <?= $project->description ?>
                                <p align="right">
                                    <?= Html::a('Дальше &raquo;', ['/profile/project', 'id' => $project->id]) ?>
                                    <?= Html::a('Перейти к оплату &raquo;', ['/profile/order-in-payment', 'id' => $project->id]) ?>
                                </p>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php
}
else {
    ?>
        Нет проектов в ожидающие оплаты
    <?php
}
?>

