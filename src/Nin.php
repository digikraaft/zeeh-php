<?php


    namespace Digikraaft\Zeeh;

    use Digikraaft\Zeeh\Exceptions\ApiErrorException;
    use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
    use Digikraaft\Zeeh\Exceptions\IsNullException;

    class Nin extends ApiResource
    {
        /**
         * @throws Exceptions\InvalidArgumentException
         * @throws Exceptions\IsNullException|Exceptions\ApiErrorException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/nin
         */
        public static function lookUp(string $nin) : array|object
        {
            $url = static::buildQueryString("nin/live/lookup", [
                "nin" => $nin
            ]);

            return static::staticRequest('GET', $url);
        }


        /**
         * @throws InvalidArgumentException
         * @throws ApiErrorException
         * @throws IsNullException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/facial-verification
         */
        public static function verifySelfie(string $nin, string $base64SelfieImage) : array|object
        {
            $url = static::endPointUrl("nin/live/selfie-verification");

            return static::staticRequest('POST', $url, [
                'selfieImage' => $base64SelfieImage,
                'nin' => $nin,
            ]);
        }

    }
