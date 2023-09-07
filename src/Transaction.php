<?php

namespace Digikraaft\Zeeh;


use Digikraaft\Zeeh\Exceptions\ApiErrorException;
use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
use Digikraaft\Zeeh\Exceptions\IsNullException;

class Transaction extends ApiResource
{
    /**
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @throws ApiErrorException
     * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/transactions
     */
    public static function list(string $accountId): object|array
    {
        $url = static::endPointUrl("transaction/live/$accountId", false);

        return static::staticRequest("GET", $url);
    }

    /**
     *
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException|ApiErrorException
     * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/statements
     */
    public static function fetchStatement(string $accountId, int $period = 7): object|array
    {
        $url = static::buildQueryString("statement/live/statement/$accountId", [
            'period' => $period
        ]);

        return static::staticRequest('GET', $url);
    }

}
