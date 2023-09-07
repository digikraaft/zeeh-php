<?php

namespace Digikraaft\Zeeh\Tests;

use Digikraaft\Zeeh\Zeeh;

class TestHelper
{
    public static function setup()
    {
        Zeeh::$apiBaseUrl = 'https://api.zeeh.africa/api/v1';
        Zeeh::setPrivateKey('sec-sdddsje');
    }
}
