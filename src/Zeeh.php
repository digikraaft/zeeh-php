<?php

namespace Digikraaft\Zeeh;

use Digikraaft\Zeeh\Exceptions\ApiErrorException;
use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
use Digikraaft\Zeeh\Exceptions\IsNullException;

class Zeeh extends ApiResource
{
    public static string $privateKey;

    public static string $publicKey;

    public static $apiBaseUrl = 'https://api.zeeh.africa/api/v1';


    public static function getPrivateKey() : string
    {
        return self::$privateKey;
    }

    public static function getPublicKey() : string
    {
        return self::$publicKey;
    }

    public static function setPublicKey(string $publicKey)
    {
        self::validateSecretKey($publicKey);
        self::$publicKey = $publicKey;
    }

    public static function setPrivateKey($privateKey)
    {
        self::validateSecretKey($privateKey);
        self::$privateKey = $privateKey;
    }

    private static function validateSecretKey($secretKey)
    {
        if ($secretKey == '' || ! is_string($secretKey)) {
            throw new InvalidArgumentException('Secret key must be a string and cannot be empty');
        }
    }

    /**
     * @throws InvalidArgumentException
     * @throws ApiErrorException
     * @throws IsNullException
     * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/balance
     */
    public static function walletBalance()
    {
        $url = static::endPointUrl("balance/live");

        return static::staticRequest('GET', $url);
    }
}
