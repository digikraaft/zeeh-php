<?php


    namespace Digikraaft\Zeeh;

    use Digikraaft\Zeeh\Exceptions\ApiErrorException;
    use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
    use Digikraaft\Zeeh\Exceptions\IsNullException;

    class Passport extends ApiResource
    {
        /**
         * @param string $dateOfBirth must be in this format YYYY-MM-DD
         *@throws Exceptions\IsNullException|Exceptions\ApiErrorException
         * @throws Exceptions\InvalidArgumentException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/passport-verification
         */
        public static function lookUp(string $passportNumber, string $lastName, string $firstName, string $dateOfBirth) : array|object
        {
            $url = static::buildQueryString("passport/live/lookup", [
                "passportNumber" => $passportNumber,
                "lastName" => $lastName,
                "firstName" => $firstName,
                "dateOfBirth" => $dateOfBirth,
            ]);

            return static::staticRequest('GET', $url);
        }

    }
