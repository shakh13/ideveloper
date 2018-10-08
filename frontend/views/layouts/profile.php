<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="logo1.png"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode("iDeveloper — ".$this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="navbar-fixed">
    <nav class="whitesilver">
        <div class="nav-wrapper grey-text">

            <?= Html::a('<img src="logo1.png"><div class="hide-on-med-and-down">iDeveloper</div>',
                ['/site'],
                [
                    'class' => 'brand-logo grey-text',
                    'id' => 'brand-logo'
                ]) ?>
            <a href="#" data-target="mobile-menu" class="sidenav-trigger">
                <i class="material-icons grey-text">menu</i>
            </a>
            <ul class="right">
                <li>
                    <a href="#" class="dropdown-trigger flex" data-target="profile_dropdown" style="padding: 0 15px">
                        <i class="material-icons grey-text">person</i>
                        <span class='hide-on-small-and-down right grey-text'><?= Yii::$app->user->identity->profile->firstname ?></span>
                        <i class='material-icons grey-text'>arrow_drop_down</i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<ul class="dropdown-content" id="profile_dropdown">
    <li>
        <a href="#">ok google</a>
    </li>
</ul>


    <ul class="sidenav" id="mobile-menu">
        <li><a href="#">Sass</a></li>
        <li><a href="#">Components</a></li>
    </ul>

    <main>
        <div class="row" style="margin-bottom: 0;">
            <div class="col m2 hide-on-small-and-down">
                <ul class="mm">
                    <li class="header">Заказы</li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/profile/make-order']) ?>">
                            <i class="material-icons">add_box</i>
                            <span>Оформить заказ</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/profile/myorders']) ?>">
                            <i class="material-icons">archive</i>
                            <span>Мои заказы</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/profile/orders-in-process']) ?>">
                            <i class="material-icons">access_time</i>
                            <span>В процессе</span>
                        </a>
                    </li>
                </ul>

                <ul class="mm">
                    <li class="header">Профиль</li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/profile']) ?>">
                            <i class="material-icons">home</i>
                            <span>Главная страница</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/profile/settings']) ?>">
                            <i class="material-icons">settings</i>
                            <span>Настройки</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/profile/logout']) ?>">
                            <i class="material-icons">exit_to_app</i>
                            <span>Выход</span>
                        </a>
                    </li>
                </ul>

            </div>
            <div class="col m7 s12">
                <?= $content ?>
            </div>
            <div class="col m3 hide-on-small-and-down">
                <div class="users-online" style="padding-top: 15px; padding-left: 10px;">
                    <div style="font-size: 14px; color: #666; font-weight: bold;">Пользователи в сети</div>
                    <div class="mcollection">
                        <a href="<?= Yii::$app->urlManager->createUrl(['/profile/user', 'id' => 1]) ?>">
                            <img src="images/samples/Web-developer-in-Lahore.jpg" class="circle">
                            <div class="header">
                                Шахзод Саидмуродов
                                <span>Администратор</span>
                            </div>
                        </a>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/profile/user', 'id' => 1]) ?>">
                            <img src="images/samples/Web-developer-in-Lahore.jpg" class="circle">
                            <div class="header">
                                Шахзод Саидмуродов
                                <span>Фрилансер</span>
                            </div>
                        </a>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/profile/user', 'id' => 1]) ?>">
                            <img src="images/samples/Web-developer-in-Lahore.jpg" class="circle">
                            <div class="header">
                                Шахзод Саидмуродов
                                <span>Заказчик</span>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </main>

<footer class="page-footer blue-grey darken-4">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
            <a class="grey-text text-lighten-4 right" href="#!">Shaxzod Saidmurodov</a>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".sidenav").sidenav();
        $(".dropdown-trigger").dropdown({constrainWidth:false});
        $(".collapsible").collapsible();
        $('select').formSelect();
        $('.datepicker').datepicker();
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
