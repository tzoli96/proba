<?php

namespace App\Services;

use App\Utils\DataFetch\ResponseHandler;
use App\Utils\DataFetch\RequestBuilder;
use App\Models\Hotel;
use CodeIgniter\Events\Events;
use GuzzleHttp\Exception\GuzzleException;
use ReflectionException;

class DataFetchService
{
    /**
     * @var RequestBuilder
     */
    private RequestBuilder $dataFetchRequestBuilder;

    /**
     * @var ResponseHandler
     */
    private ResponseHandler $dataFetchResponseHandler;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dataFetchRequestBuilder = new RequestBuilder();
        $this->dataFetchResponseHandler = new ResponseHandler();
    }

    /**
     * @throws ReflectionException
     * @throws GuzzleException
     */
    public function execute()
    {
        Events::trigger('truncetHotels');

        $hotelResponse = $this->dataFetchResponseHandler->handleResponse(
            $this->dataFetchRequestBuilder->buildRequest()
        );
        $this->writeDataToDatabase($hotelResponse);
    }

    /**
     * @param $hotelResponse
     * @return void
     * @throws ReflectionException
     */
    public function writeDataToDatabase($hotelResponse)
    {
        foreach ($hotelResponse as $hotelData) {
            $hotelModel = new Hotel();
            $hotelModel->insert($hotelData->toArray());
        }
    }
}
