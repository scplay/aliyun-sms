<?php

namespace Aliyun\Test\Core\Profile;

use Aliyun\Core\Config;
use Aliyun\Core\Regions\EndpointProvider;
use PHPUnit\Framework\TestCase;

class EndpointProviderTest extends TestCase
{
    public function setUp()
    {
        Config::load();
    }

    public function testFindProductDomain()
    {
        $this->assertEquals('ecs-cn-hangzhou.aliyuncs.com', EndpointProvider::findProductDomain('cn-hangzhou', 'Ecs'));
    }
}
