<?php

define('APP_ROOT', dirname(__DIR__). '/');

require APP_ROOT. 'vendor/autoload.php';


use Slim\App;


$config = [
    'settings' => [
        'displayErrorDetails' => false,
        'view_dir' => APP_ROOT. 'app/templates'
    ]
];
$app = new App($config);
$container = $app->getContainer();

require APP_ROOT. 'app/routes/web.php';



// 日志
$container['logger'] = function ($c) {
    $logger = new \Monolog\Logger('wjh');
    $logger->pushHandler(new \Monolog\Handler\RotatingFileHandler(APP_ROOT. 'log/wjh.log'));
    return $logger;
};

// 数据库连接
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
};

$container['view'] = function ($c) {
    return new \Slim\Views\PhpRenderer($c['settings']['view_dir']);
};



$app->run();