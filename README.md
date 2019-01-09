# 框架 wjh-skeleton

wjh-skeleton是一个基于slim实现的mvc框架，包含mvc、数据库、redis、邮件等基础服务，代码简洁且易于扩展


## Quick Start
```php
1. composer install
2. cd wjh-skeleton
3. php -S localhost:8080 -t public
4. 在浏览器中打开localhost:8080即可访问
```

## 容器配置
app/initContainer.php初始化了容器内的所有服务，包括配置文件、日志、数据库、视图、redis、邮件、错误处理等

## 路由
app/routes/web.php为路由配置文件，定义了路由和控制器的对应关系
```
$app->get('/', IndexController::class. ':index')->setName('index');
```

## 控制器

```php
<?php
namespace App\Controller;

use App\Lib\IoC;
use Slim\Http\Request;
use Slim\Http\Response;

class IndexController extends IoC
{

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return mixed
     */
    public function index(Request $request, Response $response)
    {
        return $this->view->view()->make('index', [
            'title' => 'hello world'
        ])->render();
    }

}
```
参考app/Controller/IndexController.php

## 模型
```php
<?php
namespace App\Model;


use App\Lib\IoC;

class Index extends IoC
{

    const TABLE = 'table';

    const PAGE_SIZE = 20;

    protected $ci;

    public function getList($where)
    {
        $query = $this->db->table(self::TABLE);
        $result = $query->limit(self::PAGE_SIZE)
                        ->orderBy('created_at', 'desc')
                        ->get();
        return [
            'houses' => $result,
            'total' => $total
        ];
    }

}
```
参考app/Model/Index.php

## 视图
使用的是blade模板引擎
参考app/templates/index.blade.php



## 命令行
```php
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
```

在app/Command目录下创建命令文件必须实现commandInterface接口，每个命令文件必须实现run方法方可运行
具体参考TestCommand.php文件示例


## CHANGELOG

[CHANGELOG](https://github.com/wjhtime/wjh-skeleton/releases)


## License

[MIT](https://github.com/wjhtime/wjh-skeleton/blob/master/LICENSE)