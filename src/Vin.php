<?php


    namespace Digikraaft\Zeeh;

    use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
    use Digikraaft\Zeeh\Exceptions\IsNullException;

    class Vin extends ApiResource
    {
        /**
         * @throws Exceptions\InvalidArgumentException
         * @throws Exceptions\IsNullException|Exceptions\ApiErrorException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/vin
         */
        public static function lookUp(string $vin, string $state, string $lastName) : array|object
        {
            $url = static::buildQueryString("vin/live/lookup", [
                "vin" => $vin,
                "state" => $state,
                "last_name" => $lastName,
            ]);

            return static::staticRequest('GET', $url);
        }

    }
