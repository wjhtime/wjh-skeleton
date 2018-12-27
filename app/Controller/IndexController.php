<?php
namespace App\Controller;

use App\Lib\IoC;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class IndexController extends IoC
{

    public function __construct(ContainerInterface $ci)
    {
        parent::__construct($ci);
    }

    public function index(Request $request, Response $response)
    {
//        echo $this->redis->get('name');
        return $response->withStatus(500)->write('hahaha');
    }

}