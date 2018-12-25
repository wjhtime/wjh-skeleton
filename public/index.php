<?php

define('APP_ROOT', dirname(__DIR__). '/');

require APP_ROOT. 'vendor/autoload.php';

$app = new \Slim\App();
$app->get('/test/', function () {
    echo 1;
});

