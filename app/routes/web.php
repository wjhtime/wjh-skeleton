<?php

$app->get('/index', \App\Controller\IndexController::class. ':index');
$app->get('/house/index', \App\Controller\HouseController::class. ':index');

