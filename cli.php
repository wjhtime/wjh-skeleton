<?php
use Slim\App;

define('APP_ROOT', __DIR__. '/');

require APP_ROOT. 'vendor/autoload.php';

$container = require APP_ROOT. 'app/initContainer.php';

$command = "App\\Command\\".$argv[1];
if (!class_exists($command)) {
    echo 'class '. $command .' not exist';
    exit();
}

$app = new $command($container);
$app->run();
