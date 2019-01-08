<?php
use App\Controller\IndexController;

$app->get('/', IndexController::class. ':index')->setName('index');
