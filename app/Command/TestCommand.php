<?php
namespace App\Command;

use App\Lib\CommandInterface;
use App\Lib\IoC;

class TestCommand extends IoC implements CommandInterface
{

    public function run()
    {
        echo 'command running...';
    }


}