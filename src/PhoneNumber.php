<?php


    namespace Digikraaft\Zeeh;

    use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
    use Digikraaft\Zeeh\Exceptions\IsNullException;

    class PhoneNumber extends ApiResource
    {
        /**
         * @throws Exceptions\InvalidArgumentException
         * @throws Exceptions\IsNullException|Exceptions\ApiErrorException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/phone-number#basic-phone-lookup
         */
        public static function simpleLookUp(string $phoneNumber) : array|object
        {
            $url = static::buildQueryString("phone_number/live/lookup/basic", [
                "phoneNo" => $phoneNumber
            ]);

            return static::staticRequest('GET', $url);
        }

        /**
         * @throws InvalidArgumentException
         * @throws IsNullException|Exceptions\ApiErrorException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/phone-number#advanced-phone-lookup
         */
        public static function advancedLookUp(string $phoneNumber) : array|object
        {
            $url = static::buildQueryString("phone_number/live/lookup/advanced", [
                "phoneNo" => $phoneNumber
            ]);

            return static::staticRequest('GET', $url);
        }
    }
