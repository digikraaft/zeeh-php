<?php


    namespace Digikraaft\Zeeh;

    use Digikraaft\Zeeh\Exceptions\ApiErrorException;
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

        /**
         * @throws InvalidArgumentException
         * @throws ApiErrorException
         * @throws IsNullException
         * @link https://zeehdocs.zeeh.africa/endpoints/endpoints-desk/kyc/facial-verification#verify-with-bvn
         */
        public static function verifySelfie(string $bvn, string $base64SelfieImage) : array|object
        {
            $url = static::endPointUrl("bvn/live/selfie-verification");

            return static::staticRequest('POST', $url, [
                'selfieImage' => $base64SelfieImage,
                'bvn' => $bvn,
            ]);
        }
    }
