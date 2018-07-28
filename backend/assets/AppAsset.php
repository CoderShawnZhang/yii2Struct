<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets/static';

    public $css = [
        'layui/css/layui.css',

    ];
    public $js = [
        'layui/layui.js'
    ];
    public $depends = [


    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置,layui 必须要把js放到头部
    ];
}
