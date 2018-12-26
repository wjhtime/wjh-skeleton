<?php
use Slim\App;

define('APP_ROOT', dirname(__DIR__). '/');

require APP_ROOT. 'vendor/autoload.php';

$container = require APP_ROOT. 'app/initContainer.php';

$app = new App($container);
require APP_ROOT. 'app/routes/web.php';

$app->run();
