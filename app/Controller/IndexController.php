<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

class IndexController
{

    public function index(Request $request, Response $response)
    {
        var_dump($request);
        return $response->withStatus(500)->write('hahaha');
    }

}