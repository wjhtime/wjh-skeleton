<?php

define('APP_ROOT', dirname(__DIR__). '/');

require APP_ROOT. 'vendor/autoload.php';
$config = require APP_ROOT. 'app/config/config.php';

use Slim\App;

$app = new App([
    'settings' => $config
]);
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
    $capsule = new \Illuminate\Database\Capsule\Manager();
    $capsule->addConnection($c['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    return $capsule;
};

// 视图
$container['view'] = function ($c) {
    return new \Slim\Views\PhpRenderer($c['settings']['view_dir']);
};



$app->run();