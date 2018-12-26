<?php
namespace App\Model;


use App\Lib\IoC;
use Psr\Container\ContainerInterface;

class Renting extends IoC
{

    const TABLE = 'renting';

    protected $ci;

    public function getList()
    {
        return $this->db->table(self::TABLE)->get();
    }


    
}