<?php


    namespace Digikraaft\Zeeh;

    use Digikraaft\Zeeh\Exceptions\ApiErrorException;
    use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
    use Digikraaft\Zeeh\Exceptions\IsNullException;

    class Tin extends ApiResource
    {
        /**
         * @throws Exceptions\InvalidArgumentException
         * @throws Exceptions\IsNullException|Exceptions\ApiErrorException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/tin
         */
        public static function lookUp(string $taxIdentificationNumber) : array|object
        {
            $url = static::buildQueryString("tin/live/lookup", [
                "tin" => $taxIdentificationNumber
            ]);

            return static::staticRequest('GET', $url);
        }

    }
