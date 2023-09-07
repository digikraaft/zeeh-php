<?php

namespace Digikraaft\Zeeh\ApiOperations;

use Digikraaft\Zeeh\Exceptions\ApiErrorException;
use Digikraaft\Zeeh\Exceptions\InvalidArgumentException;
use Digikraaft\Zeeh\Exceptions\IsNullException;
use Digikraaft\Zeeh\Zeeh;
use Digikraaft\Zeeh\Util\Util;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

/**
 * Trait for resources that need to make API requests.
 */
trait Request
{
    /**
     * Instance of Client.
     */
    protected static $client;

    /**
     *  Response from requests made to Zeeh.
     *
     * @var mixed
     */
    protected static $response;

    /**
     *
     * @throws InvalidArgumentException
     */
    public static function validateParams($params = null, $required = false): void
    {
        if ($required) {
            if (empty($params) || ! is_array($params)) {
                $message = 'The parameter passed must be an array and must not be empty';

                throw new InvalidArgumentException($message);
            }
        }
        if ($params && ! is_array($params)) {
            $message = 'The parameter passed must be an array';

            throw new InvalidArgumentException($message);
        }
    }

    /**
     *
     * @throws InvalidArgumentException
     * @throws IsNullException
     * @throws ApiErrorException
     *
     */
    public static function staticRequest($method, $url, $params = [], $return_type = 'obj') : array|object
    {
        if ($return_type != 'arr' && $return_type != 'obj') {
            throw new InvalidArgumentException('Return type can only be obj or arr');
        }

        static::setHttpResponse($method, $url, $params);

        if ($return_type == 'arr') {
            return static::getResponseData();
        }

        return Util::convertArrayToObject(static::getResponse());
    }

    /**
     * Set options for making the Client request.
     */
    protected static function setRequestOptions(): void
    {
        $privateKey = Zeeh::getPrivateKey();

        static::$client = new Client(
            [
                'base_uri' => Zeeh::$apiBaseUrl,
                'headers' => [
                    'zeeh-private-key' => $privateKey,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
            ]
        );
    }

    /**
     * @throws IsNullException
     * @throws ApiErrorException
     */
    private static function setHttpResponse($method, $url, $body = []): \GuzzleHttp\Psr7\Response
    {
        if (is_null($method)) {
            throw new IsNullException('Empty method not allowed');
        }

        static::setRequestOptions();

        try {
            static::$response = static::$client->{strtolower($method)}(
                Zeeh::$apiBaseUrl . '/' . $url,
                ['body' => json_encode($body)]
            );

            return static::$response;
        } catch (ClientException $exception) {
            throw new ApiErrorException($exception->getMessage());
        }
    }

    /**
     * Get the data response from an API operation.
     */
    private static function getResponse(): array
    {
        return json_decode(static::$response->getBody(), true);
    }

    /**
     * Get the data response from a get operation.
     */
    private static function getResponseData(): array
    {
        return json_decode(static::$response->getBody(), true)['data'];
    }
}
