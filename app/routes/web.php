<?php

use Slim\Http\Request;
use Slim\Http\Response;


$app->get('/', function (Request $request, Response $response) {
    $this->logger->info('abc');
    return $this->view->render($response, 'test.phtml', ['router' => $this->router]);
})->setName('home');

$app->get('/index', \App\Controller\IndexController::class. ':index');
$app->get('/house/index', \App\Controller\HouseController::class. ':index');

