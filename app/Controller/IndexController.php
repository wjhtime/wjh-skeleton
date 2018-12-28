<?php
namespace App\Controller;

use App\Lib\IoC;
use App\Lib\Mail;
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



//        $message = Mail::msg('abc', 'test@qq.com', 'hahahaha');
//        $result = $this->mailer->send($message);
//        dd($result);
//        echo $this->redis->get('name');
        return $response->withStatus(200)->write('hahaha');
    }

}