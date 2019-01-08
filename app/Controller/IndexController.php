<?php
namespace App\Controller;

use App\Lib\IoC;
use Slim\Http\Request;
use Slim\Http\Response;

class IndexController extends IoC
{

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return mixed
     */
    public function index(Request $request, Response $response)
    {
        return $this->view->view()->make('index', [
            'title' => 'hello world'
        ])->render();
    }

}