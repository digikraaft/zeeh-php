<?php


    namespace Digikraaft\Zeeh;

    use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
    use Digikraaft\Zeeh\Exceptions\IsNullException;

    class Bvn extends ApiResource
    {
        /**
         * @throws Exceptions\InvalidArgumentException
         * @throws Exceptions\IsNullException|Exceptions\ApiErrorException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/bvn#simple-bvn-lookup
         */
        public static function simpleLookUp(string $bvn) : array|object
        {
            $url = static::buildQueryString("bvn/live/lookupv1", [
                "bvn" => $bvn
            ]);

            return static::staticRequest('GET', $url);
        }

        /**
         * @throws InvalidArgumentException
         * @throws IsNullException|Exceptions\ApiErrorException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/bvn#advanced-bvn-lookup
         */
        public static function advancedLookUp(string $bvn) : array|object
        {
            $url = static::buildQueryString("bvn/live/lookup", [
                "bvn" => $bvn
            ]);

            return static::staticRequest('GET', $url);
        }
    }
