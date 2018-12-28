<?php
use Slim\Container;
use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Illuminate\Database\Capsule\Manager;
use Philo\Blade\Blade;

$config = require APP_ROOT . 'app/Config/config.php';

// 容器配置
$container = new Container([
    'settings' => [
        'displayErrorDetails' => false,
        'determineRouteBeforeAppMiddleware' => true,
    ]
]);

// 配置文件
$container['config'] = $config;

// 日志
$container['log'] = function ($c) {
    $logger = new Logger($c['config']['app']['app_name']);
    $logger->pushHandler(new RotatingFileHandler($c['config']['app']['log_file']));
    return $logger;
};

// 数据库连接
$container['db'] = function ($c) {
    $capsule = new Manager();
    $capsule->addConnection($c['config']['db']['dev']);
    $capsule->setAsGlobal();
//    $capsule->bootEloquent();
    return $capsule;
};

// 视图
$container['view'] = function ($c) {
    return new Blade($c['config']['app']['view_dir'], $c['config']['app']['cache_dir']);
};

// redis
$container['redis'] = function ($c) {
    return new \Predis\Client($c['config']['db']['redis']);
};

// 邮件
$container['mailer'] = function ($c) {
    $mailConfig = $c['config']['mail'];
    $transport = new \Swift_SmtpTransport($mailConfig['host'], $mailConfig['port']);
    $transport->setUsername($mailConfig['username'])
              ->setPassword($mailConfig['password']);
    $mailer = new \Swift_Mailer($transport);

    return $mailer;
};

$container['notFoundHandler'] = function () {
    die('not found');
};

$container['phpErrorHandler'] = function () {
    die('php_error');
};

$container['errorHandler'] = function () {
    die('error');
};


return $container;