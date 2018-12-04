<?php

namespace Aliyun\Test\Core\Http;

use Aliyun\Core\Config;
use Aliyun\Core\Http\HttpHelper;
use PHPUnit\Framework\TestCase;

class HttpHelperTest extends TestCase
{
    public function setUp()
    {
        Config::load();
    }

    public function testCurl()
    {
        $httpResponse = HttpHelper::curl('ecs.aliyuncs.com');
        $this->assertEquals(400, $httpResponse->getStatus());
        $this->assertNotNull($httpResponse->getBody());
    }
}
