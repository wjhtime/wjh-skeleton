<?php
use App\Controller\HouseController;
use App\Controller\IndexController;

$app->get('/index', IndexController::class. ':index');

$app->get('/house/index', HouseController::class. ':index');
$app->get('/house/ajax-get-house-detail', HouseController::class. ':ajaxGetHouseDetail');