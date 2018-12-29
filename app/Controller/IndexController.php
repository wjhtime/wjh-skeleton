<?php
namespace App\Controller;

use App\Lib\IoC;
use Slim\Http\Request;
use Slim\Http\Response;

class IndexController extends IoC
{

    public function index(Request $request, Response $response)
    {
        return $this->view->render($response, 'index.html', [
            'title' => 'hello world'
        ]);
    }

}