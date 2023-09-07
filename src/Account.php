<?php

namespace Digikraaft\Zeeh;


use Digikraaft\Zeeh\Exceptions\ApiErrorException;
use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
use Digikraaft\Zeeh\Exceptions\IsNullException;

class Account extends ApiResource
{

    /**
     * @return array|object
     * @throws Exceptions\ApiErrorException
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/account-information#get-all-accounts
     */
    public static function all(): object|array
    {
        $url = static::endPointUrl("account/live/bank-details/accounts");

        return static::staticRequest('GET', $url);
    }

    /**
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @throws ApiErrorException
     * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/account-information#get-specific-account
     */
    public static function details(string $accountId): object|array
    {
        $url = self::endPointUrl("account/live/bank-details/account/$accountId", false);

        return self::staticRequest('GET', $url);
    }

    /**
     *
     * @throws ApiErrorException
     * @throws InvalidArgumentException
     * @throws IsNullException
     * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/account-information#authorize-customer
     */
    public static function authorize(string $accountId): object|array
    {
        $url = static::endPointUrl("account/live/authorize-account/$accountId", false);

        return static::staticRequest("GET", $url);
    }

    /**
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @throws ApiErrorException
     * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/data-sync
     */
    public static function sync(string $accountId, ?array $params = null): object|array
    {
        $url = static::endPointUrl("account/live/sync/$accountId", false);

        return static::staticRequest("POST", $url);
    }


    /**
     * @throws InvalidArgumentException
     * @throws ApiErrorException
     * @throws IsNullException
     * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/identity
     */
    public static function identity(string $accountId): object|array
    {
        $url = static::endPointUrl("account/live/identity/$accountId", false);

        return static::staticRequest("POST", $url);
    }
}
