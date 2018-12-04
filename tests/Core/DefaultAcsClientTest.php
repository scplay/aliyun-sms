<?php

namespace Aliyun\Test\Core;

use Aliyun\Core\Config;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Test\Core\Ecs\Request\DescribeRegionsRequest;
use PHPUnit\Framework\TestCase;

class DefaultAcsClientTest extends TestCase
{
    public function setUp()
    {
        Config::load();
    }

    public function testDoActionRPC()
    {
        echo "\nWARNING: setup accessKeyId and accessSecret of DefaultAcsClientTest";
        $iClientProfile = DefaultProfile::getProfile(
            'cn-hangzhou',
            'yourAccessKeyId',
            'yourAccessKeySecret'
        );
        $request = new DescribeRegionsRequest();
        $client = new DefaultAcsClient($iClientProfile);
        $response = $client->getAcsResponse($request);

        $this->assertNotNull($response->RequestId);
        $this->assertNotNull($response->Regions->Region[0]->LocalName);
        $this->assertNotNull($response->Regions->Region[0]->RegionId);
    }
}
