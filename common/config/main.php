<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Shanghai', //time zone affect the formatter datetime format
    'language' => 'zh-CN',
    'name' => '后台管理系统',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],

];