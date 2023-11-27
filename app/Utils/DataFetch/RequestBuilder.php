<?php

namespace App\Utils\DataFetch;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class RequestBuilder
{
    /**
     * Api for fetching
     */
    private const URL = 'http://testapi.swisshalley.com/hotels/';

    /**
     * API Key for fetching
     */
    private const API_KEY = 'b92189884ce200d55d403ccfe68f98f4';

    /**
     * @var Client
     */
    private Client $httpClient;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->httpClient = new Client();
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function buildRequest(): ResponseInterface
    {
        return $this->httpClient->get(
            self::URL,
            $this->getRequestHeader()
        );
    }

    /**
     * @return array[]
     */
    private function getRequestHeader(): array
    {
        return [
            'headers' => [
                'x-api-key' => self::API_KEY,
            ],
        ];
    }
}
