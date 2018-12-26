<?php
namespace App\Controller;

use App\Lib\IoC;
use App\Model\Renting;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class HouseController extends IoC
{

    public function index(Request $request, Response $response)
    {
        $rent = $this->get(Renting::class);
        return $this->view->render($response, 'houseList.phtml', ['data' => $rent->getList()]);
//        return $response->withJson($rent->getList());
    }

}