<?php
use App\Controller\IndexController;

$app->get('/index', IndexController::class. ':index')->setName('index');
