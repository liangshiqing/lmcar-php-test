<?php

namespace Test\App;

use App\App\Demo;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase
{

    public function test_foo()
    {
        $demo = new Demo(\Logger::getLogger("Log"),new HttpRequest());
        echo 'foo_测试结果:'.$demo->foo().PHP_EOL;
    }

    public function test_get_user_info()
    {
        $demo = new Demo(\Logger::getLogger("Log"),new HttpRequest());
        echo 'get_user_info_测试结果:'.PHP_EOL;
        print_r($demo->get_user_info());
    }
}
