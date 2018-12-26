<?php
use Slim\App;

define('APP_ROOT', dirname(__DIR__). '/');
define("APP_NAME", 'wjh');

require APP_ROOT. 'vendor/autoload.php';


// 容器配置
$container = new \Slim\Container([
    'settings' => [
        'displayErrorDetails' => false,
        'determineRouteBeforeAppMiddleware' => true,
    ]
]);

// 配置文件
$config = require APP_ROOT . 'app/Config/config.php';
$container['config'] = $config;

// 日志
$container['logger'] = function ($c) {
    $logger = new \Monolog\Logger('wjh');
    $logger->pushHandler(new \Monolog\Handler\RotatingFileHandler(APP_ROOT. 'log/wjh.log'));
    return $logger;
};

// 数据库连接
$container['db'] = function ($c) {
    $capsule = new \Illuminate\Database\Capsule\Manager();
    $capsule->addConnection($c['config']['db']['dev']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    return $capsule;
};

// 视图
$container['view'] = function ($c) {
    return new \Slim\Views\PhpRenderer($c['config']['app']['view_dir']);
};


$app = new App($container);
require APP_ROOT. 'app/routes/web.php';


$app->run();