<?php

/* @var $this yii\web\View */

$this->title = 'Удалённая работа фрилансеров - iDeveloper';
?>
<div class="land">
    <div class="content">
        <h1>Мы рады Вам помочь</h1>
        <div class="row">
            <div class="col s12 m6 offset-m3 row">
                <div class="col s12 m5" style="margin-top: 10px; margin-bottom: 10px;">
                    <a href="<?= Yii::$app->urlManager->createUrl(['/site/signup', 'role' => 'customer']) ?>" class="btn btn-large white blue-grey-text waves-effect z-depth-5 w100">Я заказчик</a>
                </div>
                <div class="col s12 m5 offset-m2" style="margin-top: 10px; margin-bottom: 10px;">
                    <a href="<?= Yii::$app->urlManager->createUrl(['/site/signup', 'role' => 'freelancer']) ?>" class="btn btn-large white blue-grey-text waves-effect z-depth-5 w100">Я фрилансер</a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container me white mb20">
    <div class="title">Недавные проекты</div>
    <div class="row" style="margin: 0;">
        <div class="col m3">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/office.jpg">
                </div>
                <div class="card-action">
                    <a href="#">Materializecss</a>
                </div>
            </div>
        </div>
        <div class="col m3">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/sample-1.jpg">
                </div>
                <div class="card-action">
                    <a href="#">Materializecss</a>
                </div>
            </div>
        </div>
        <div class="col m3">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/office.jpg">
                </div>
                <div class="card-action">
                    <a href="#">Materializecss</a>
                </div>
            </div>
        </div>
        <div class="col m3">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/sample-1.jpg">
                </div>
                <div class="card-action">
                    <a href="#">Materializecss</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container white mb20">
    <div class="title">Категории</div>
    <div class="row pad5 categories" style="margin: 0;">
        <div class="col s6 m3">
            <a href="#">
                Разработка сайтов
                <span class="badge new" data-badge-caption="">13</span>
            </a>
        </div>
        <div class="col s6 m3"><a href="#">Тесты<span class="badge new" data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Дизайн и арт<span class="badge new" data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Программирование<span class="badge new" data-badge-caption="">13</span></a>
        </div>
        <div class="col s6 m3"><a href="#">Аутсорсинг и консалтинг<span class="badge new"
                                                                        data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Аудио/Видео<span class="badge new" data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Реклама и маркетинг<span class="badge new"
                                                                    data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Переводы<span class="badge new" data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Разработка игр<span class="badge new" data-badge-caption="">13</span></a>
        </div>
        <div class="col s6 m3"><a href="#">Анимация<span class="badge new" data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">3D Графика<span class="badge new" data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Фотография<span class="badge new" data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Инжиниринг<span class="badge new" data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Оптимизация (SEO)<span class="badge new" data-badge-caption="">13</span></a>
        </div>
        <div class="col s6 m3"><a href="#">Архитектура<span class="badge new" data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Обучения и консультация<span class="badge new"
                                                                        data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Полиграфия<span class="badge new" data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Менеджмент<span class="badge new" data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Мобильные приложения<span class="badge new"
                                                                     data-badge-caption="">13</span></a></div>
        <div class="col s6 m3"><a href="#">Сети и инфосистемы<span class="badge new" data-badge-caption="">13</span></a>
        </div>
    </div>
</div>

<div class="container white mb20">
    <div class="title">Наша креативность</div>
    <div class="row">
        <div class="col s6 m3 center-align">
            <i class="material-icons circle" style="font-size: 100px;">style</i><br>
            Фирменный стиль
        </div>
        <div class="col s6 m3 center-align">
            <i class="material-icons circle" style="font-size: 100px;">web</i><br>
            Мощные веб сайты
        </div>
        <div class="col s6 m3 center-align">
            <i class="material-icons circle" style="font-size: 100px;">timeline</i><br>
            CEO и CMM
        </div>
        <div class="col s6 m3 center-align">
            <i class="material-icons circle" style="font-size: 100px;">code</i><br>
            Чистый код
        </div>
    </div>
</div>

<div class="container white">
    <div class="title">Лучшие разработчики</div>
    <div class="row" style="margin: 0;">
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/office.jpg">
                    <span class="card-title">Shaxzod Saidmurodov</span>
                </div>
                <div class="card-content">
                    <div class="orange-text fs12">Разработчик</div>
                    Верстальшик, Веб дизайнер, Разработчик, 3D Model Maker, Разработка Веб проложений
                </div>
                <div class="card-action">
                    <a href="/templates/profile/customer/freelancer.html">Профиль</a>
                    <a href="/templates/profile/customer/hire.html">Нанять</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/sample-1.jpg">
                    <span class="card-title">Shaxzod Saidmurodov</span>
                </div>
                <div class="card-content">
                    <div class="orange-text fs12">Разработчик</div>
                    Верстальшик, Веб дизайнер, Разработчик, 3D Model Maker, Разработка Веб проложений
                </div>
                <div class="card-action">
                    <a href="/templates/profile/customer/freelancer.html">Профиль</a>
                    <a href="/templates/profile/customer/hire.html">Нанять</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/office.jpg">
                    <span class="card-title">Shaxzod Saidmurodov</span>
                </div>
                <div class="card-content">
                    <div class="orange-text fs12">Разработчик</div>
                    Верстальшик, Веб дизайнер, Разработчик, 3D Model Maker, Разработка Веб проложений
                </div>
                <div class="card-action">
                    <a href="/templates/profile/customer/freelancer.html">Профиль</a>
                    <a href="/templates/profile/customer/hire.html">Нанять</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/sample-1.jpg">
                    <span class="card-title">Shaxzod Saidmurodov</span>
                </div>
                <div class="card-content">
                    <div class="orange-text fs12">Разработчик</div>
                    Верстальшик, Веб дизайнер, Разработчик, 3D Model Maker, Разработка Веб проложений
                </div>
                <div class="card-action">
                    <a href="/templates/profile/customer/freelancer.html">Профиль</a>
                    <a href="/templates/profile/customer/hire.html">Нанять</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/office.jpg">
                    <span class="card-title">Shaxzod Saidmurodov</span>
                </div>
                <div class="card-content">
                    <div class="orange-text fs12">Разработчик</div>
                    Верстальшик, Веб дизайнер, Разработчик, 3D Model Maker, Разработка Веб проложений
                </div>
                <div class="card-action">
                    <a href="/templates/profile/customer/freelancer.html">Профиль</a>
                    <a href="/templates/profile/customer/hire.html">Нанять</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/sample-1.jpg">
                    <span class="card-title">Shaxzod Saidmurodov</span>
                </div>
                <div class="card-content">
                    <div class="orange-text fs12">Разработчик</div>
                    Верстальшик, Веб дизайнер, Разработчик, 3D Model Maker, Разработка Веб проложений
                </div>
                <div class="card-action">
                    <a href="/templates/profile/customer/freelancer.html">Профиль</a>
                    <a href="/templates/profile/customer/hire.html">Нанять</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/office.jpg">
                    <span class="card-title">Shaxzod Saidmurodov</span>
                </div>
                <div class="card-content">
                    <div class="orange-text fs12">Разработчик</div>
                    Верстальшик, Веб дизайнер, Разработчик, 3D Model Maker, Разработка Веб проложений
                </div>
                <div class="card-action">
                    <a href="/templates/profile/customer/freelancer.html">Профиль</a>
                    <a href="/templates/profile/customer/hire.html">Нанять</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/sample-1.jpg">
                    <span class="card-title">Shaxzod Saidmurodov</span>
                </div>
                <div class="card-content">
                    <div class="orange-text fs12">Разработчик</div>
                    Верстальшик, Веб дизайнер, Разработчик, 3D Model Maker, Разработка Веб проложений
                </div>
                <div class="card-action">
                    <a href="/templates/profile/customer/freelancer.html">Профиль</a>
                    <a href="/templates/profile/customer/hire.html">Нанять</a>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="images/samples/office.jpg">
                    <span class="card-title">Shaxzod Saidmurodov</span>
                </div>
                <div class="card-content">
                    <div class="orange-text fs12">Разработчик</div>
                    Верстальшик, Веб дизайнер, Разработчик, 3D Model Maker, Разработка Веб проложений
                </div>
                <div class="card-action">
                    <a href="/templates/profile/customer/freelancer.html">Профиль</a>
                    <a href="/templates/profile/customer/hire.html">Нанять</a>
                </div>
            </div>
        </div>
    </div>
</div>
