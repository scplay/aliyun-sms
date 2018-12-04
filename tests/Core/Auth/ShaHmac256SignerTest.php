<?php

namespace Aliyun\Test\Core\Auth;

use Aliyun\Core\Auth\ShaHmac256Signer;
use Aliyun\Core\Config;
use PHPUnit\Framework\TestCase;

class ShaHmac256SignerTest extends TestCase
{
    public function setUp()
    {
        Config::load();
    }

    public function testShaHmac256Signer()
    {
        $signer = new ShaHmac256Signer();
        $this->assertEquals('TpF1lE/avV9EHGWGg9Vo/QTd2bLRwFCk9jjo56uRbCo=',
            $signer->signString('this is a ShaHmac256 test.', 'accessSecret'));
    }
}
