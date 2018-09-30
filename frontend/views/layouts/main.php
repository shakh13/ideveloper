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

<?php

    if (Yii::$app->user->isGuest){
        $navItems = [
            [
                'content' => Html::beginForm(['/site/search'], 'post', ['id' => 'horizontalmenu'])
                    .Html::tag('i', 'search', ['class' => 'item material-icons grey-text'])
                    .Html::input('search', 'search', null, ['class' => 'item', 'placeholder' => 'Искать'])
                    .Html::endForm()
            ],
            [
                'url' => ['/site/login'],
                'content' => 'Войти',
                'class' => 'grey-text',
            ],
            [
                'attrs' => 'style: "padding: 0 5px"',
                'content' => 'или'
            ],
            [
                'class' => 'image',
                'url' => ['/site/login', 'with' => 'facebook'],
                'content' => Html::img('images/socialicons/png/036-facebook.png'),
            ],
            [
                'class' => 'image',
                'url' => ['/site/login', 'with' => 'google'],
                'content' => Html::img('images/socialicons/png/033-google-plus.png'),
            ],
            [
                'class' => 'image',
                'url' => ['/site/login', 'with' => 'github'],
                'content' => Html::img('images/socialicons/png/github.ico'),
            ],
            [
                'url' => ['/site/signup'],
                'content' => 'Регистрация',
                'class' => 'grey-text'
            ]
        ]; // change navbar items on login
    }
    else {
        $navItems = [
            [
                'content' => Html::beginForm(['/site/search'], 'post', ['id' => 'horizontalmenu'])
                    .Html::tag('i', 'search', ['class' => 'item material-icons grey-text'])
                    .Html::input('search', 'search', null, ['class' => 'item', 'placeholder' => 'Искать'])
                    .Html::endForm()
            ],
                [
                        'content' => Html::a(
                                "<i class='material-icons grey-text'>person</i>"
                                ."<span class='hide-on-med-and-down right grey-text'>".Yii::$app->user->identity->profile->firstname."</span>"
                                ."<i class='material-icons  grey-text'>arrow_drop_down</i>",
                                '#',
                                [
                                    'class' => 'dropdown-trigger flex',
                                    'data-target' => 'profile_dropdown',
                                    'style' => 'padding: 0 15px'
                                ])
                ]
        ];
    }

    $nav = new \common\widgets\Nav(['items' => $navItems, 'class' => 'whitesilver']);
    $nav->run();

?>


    <ul class="sidenav" id="mobile-menu">
        <li><a href="#">Sass</a></li>
        <li><a href="#">Components</a></li>
    </ul>

    <main>
            <?= $content ?>
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
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
