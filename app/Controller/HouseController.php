<?php
namespace App\Controller;

use App\Lib\IoC;
use App\Model\Renting;
use Illuminate\Support\Facades\Validator;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class HouseController extends IoC
{

    public function __construct(ContainerInterface $ci)
    {
        parent::__construct($ci);
        $this->view->view()->share(['config' => $this->config]);
    }

    public function index(Request $request, Response $response)
    {
        $params = $request->getQueryParams();

        // 数据验证

        $data = $this->makeClass(Renting::class)->getList($params);
        return $this->view->view()->make('house.houseList', [
            'houses' => $data['houses'],
            'total' => $data['total'],
            'page' => $params['page'] ?? 0,
            'pageNum' => $data['total']/Renting::PAGE_SIZE > 10?10:$data['total']/Renting::PAGE_SIZE
        ])->render();

//        return $this->view->view()->make('test', ['houses' => $rent->getList()])->render();
//        return $response->withJson($rent->getList());
    }

}