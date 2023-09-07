<?php


    namespace Digikraaft\Zeeh;

    use Digikraaft\Zeeh\Exceptions\ApiErrorException;
    use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
    use Digikraaft\Zeeh\Exceptions\IsNullException;

    class Nuban extends ApiResource
    {
        /**
         * @throws Exceptions\InvalidArgumentException
         * @throws Exceptions\IsNullException|Exceptions\ApiErrorException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/nuban
         */
        public static function lookUp(string $bankAccountNumber) : array|object
        {
            $url = static::buildQueryString("nuban/live/lookup", [
                "nuban" => $bankAccountNumber
            ]);

            return static::staticRequest('GET', $url);
        }

    }
