<?php
namespace App\Controller;

use App\Lib\IoC;
use App\Model\Renting;
use Slim\Http\Request;
use Slim\Http\Response;

class HouseController extends IoC
{

    public function index(Request $request, Response $response)
    {
        $rent = $this->makeClass(Renting::class);
//        return $this->view->view()->make('houseList', ['data' => $rent->getList()])->render();
        return $this->view->view()->make('test', ['data' => $rent->getList()])->render();
//        return $response->withJson($rent->getList());
    }

}