<?php


    namespace Digikraaft\Zeeh;

    use Digikraaft\Zeeh\Exceptions\ApiErrorException;
    use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
    use Digikraaft\Zeeh\Exceptions\IsNullException;

    class DriverLicense extends ApiResource
    {
        /**
         *
         * @param string $licenseNumber
         * @return array|object
         * @throws ApiErrorException
         * @throws InvalidArgumentException
         * @throws IsNullException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/drivers-license
         */
        public static function lookUp(string $licenseNumber) : array|object
        {
            $url = static::buildQueryString("driverLicense/live/lookup", [
                "licenseNo" => $licenseNumber,
            ]);

            return static::staticRequest('GET', $url);
        }

    }
