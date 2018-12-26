<?php
namespace App\Controller;

use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class IndexController
{

    protected $ci;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function index(Request $request, Response $response)
    {
        return $response->withStatus(500)->write('hahaha');
    }

}