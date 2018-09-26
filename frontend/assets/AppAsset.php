<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $css = [
        'css/materialize.min.css',
        'css/docs.css',
        'css/fonts.css',
        'css/font-awesome.css',
        'css/bootstrap-social.css',
        'css/style.css',
    ];
    public $baseUrl = '@web';
    public $js = [
        'js/jquery.min.js',
        'js/docs.js',
        'js/materialize.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
