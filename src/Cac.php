<?php


    namespace Digikraaft\Zeeh;

    use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
    use Digikraaft\Zeeh\Exceptions\IsNullException;

    class Cac extends ApiResource
    {
        /**
         * @throws Exceptions\InvalidArgumentException
         * @throws Exceptions\IsNullException|Exceptions\ApiErrorException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/cac#simple-cac-lookup
         */
        public static function simpleLookUp(string $rcNumber) : array|object
        {
            $url = static::buildQueryString("cac/live/lookup/basic", [
                "rcNumber" => $rcNumber
            ]);

            return static::staticRequest('GET', $url);
        }

        /**
         * @throws InvalidArgumentException
         * @throws IsNullException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/cac#advanced-cac-lookup
         */
        public static function advancedLookUp(string $rcNumber) : array|object
        {
            $url = static::buildQueryString("cac/live/lookup/shareholder", [
                "rcNumber" => $rcNumber
            ]);

            return static::staticRequest('GET', $url);
        }
    }
