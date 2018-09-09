<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="navbar-fixed">
        <nav class="blue-grey darken-4">
            <div class="nav-wrapper container">
                <!-- edit menu -->
                <a href="<?= Yii::$app->homeUrl ?>" class="brand-logo" id="brand-logo">iDeveloper</a>
                <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <form id="horizontalmenu">
                            <i class="item material-icons">search</i>
                            <input class="item" type="search" name="search" placeholder="Искать">
                        </form>
                    </li>
                    <li><a href="login.html">Войти</a></li>
                    <li style="padding: 0 5px">или</li>
                    <li><a href="#" class="image"><img src="images/socialicons/png/036-facebook.png"/></a></li>
                    <li><a href="#" class="image"><img src="images/socialicons/png/033-google-plus.png"/></a></li>
                    <li><a href="#" class="image"><img src="images/socialicons/png/027-linkedin.png"/></a></li>
                    <li><a href="registration.html">Регистрация</a></li>

                </ul>
            </div>
        </nav>
    </div>

    <ul class="sidenav" id="mobile-menu">
        <li><a href="#">Sass</a></li>
        <li><a href="#">Components</a></li>
    </ul>

    <main>
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
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
            </div>
        </div>
    </footer>

<?php $this->endBody() ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".sidenav").sidenav();
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
