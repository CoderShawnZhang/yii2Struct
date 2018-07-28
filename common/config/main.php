<?php
return [
    'timeZone' => 'Asia/Shanghai',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'jsUrlManager' => [
            'class' => '\dmirogin\js\urlmanager\JsUrlManager::class',
        ],
        'queue' => [
            'class' => \yii\queue\beanstalk\Queue::className(),
            'host' => 'localhost',
            'port' => 3306,
            'tube' => 'queue',
        ],
        /**
         * URL 重写设置
         */
        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
        ],
    ],
];
