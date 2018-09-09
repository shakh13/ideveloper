<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/docs.css',
        'css/font-awesome.css',
        'css/fonts.css',
        'css/materialize.css',
        'css/bootstrap-social.css',
    ];
    public $js = [
        'js/jquery.js',
        'js/materialize.js',
        'js/docs.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
