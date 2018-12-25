<?php

use Slim\Http\Request;
use Slim\Http\Response;


$app->get('/', function (Request $request, Response $response) {
    $this->logger->info('abc');
    return $this->view->render($response, 'test.phtml', ['router' => $this->router]);
})->setName('home');

$app->get('/test', function (Request $request, Response $response) {
    var_dump($request->getQueryParams());
//    echo 1;
//    $response->write('hello world');
//    return $response;
});

$app->get('/index', \App\Controller\IndexController::class. ':index');