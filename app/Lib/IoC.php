<?php

namespace App\Lib;

use Psr\Container\ContainerInterface;

class IoC
{

    protected $ci;
    protected $instanceBag = [];

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function __get($key)
    {
        return $this->ci->get($key);
    }

    public function makeClass($className, ...$args)
    {
        $index = md5($className . json_encode($args));
        if (isset($this->instanceBag[$index]) && $this->instanceBag[$index] !== NULL) {
            return $this->instanceBag[$index];
        }
        if ($className == __CLASS__) {
            throw new \Exception('Class '. __CLASS__ . ' can only be instanced once');
        }

        $this->instanceBag[$index] = new $className($this->ci, ...$args);
        return $this->instanceBag[$index];
    }

}