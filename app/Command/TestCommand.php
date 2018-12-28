<?php
namespace App\Command;

use App\Lib\IoC;

class TestCommand extends IoC
{

    public function run()
    {
        echo 'command running...';
    }


}