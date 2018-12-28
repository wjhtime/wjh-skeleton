<?php
return [
    // 测试环境数据库配置
    'dev' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'python',
        'username' => 'root',
        'password' => 'root',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],

    // redis数据库
    'redis' => [
        'host' => '127.0.0.1',
        'port' => 6379,
    ],
];