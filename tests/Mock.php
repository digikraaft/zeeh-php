<?php

namespace Digikraaft\Zeeh\Tests;

use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
use Digikraaft\Zeeh\Zeeh;
use Mockery as mk;
use PHPUnit\Framework\TestCase;

class Mock extends TestCase
{
    protected $zeeh;
    protected $mock;

    public function setUp(): void
    {
        TestHelper::setup();
        $this->zeeh = mk::mock('Digikraaft\Zeeh\Zeeh');
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    /** @test */
    public function it_returns_instance_of_Zeeh_ng()
    {
        $this->assertInstanceOf("Digikraaft\Zeeh\Zeeh", $this->zeeh);
    }

    /** @test */
    public function it_returns_invalid_api_key()
    {
        $this->expectException(InvalidArgumentException::class);
        Zeeh::setPrivateKey('');
    }

    /** @test */
    public function it_returns_api_key()
    {
        Zeeh::setPrivateKey('sk_apikey');
        $this->assertIsString(Zeeh::getPrivateKey());
    }
}
