<?php

namespace App\Utils\DataFetch;

use Psr\Http\Message\ResponseInterface;
use App\Services\CheapestHotelProvider;
use App\Exceptions\InvalidResponseException;

class ResponseHandler
{
    /**
     * @param ResponseInterface $response
     * @return array|null
     */
    public function handleResponse(ResponseInterface $response): ?array
    {
        try {
            if ($response->getStatusCode() !== 200) {
                throw new InvalidResponseException('Hiba a válaszkóddal: ' . $response->getStatusCode());
            }

            $body = (string)$response->getBody();
            $data = json_decode($body);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new InvalidResponseException('Hiba a JSON dekódolás során: ' . json_last_error_msg());
            }

            if (!isset($data->data) || !is_array($data->data->hotels)) {
                throw new InvalidResponseException('Hibás válasz formátum');
            }

            $cheapestHotelProvider = new CheapestHotelProvider();
            $cheapestHotels = $cheapestHotelProvider->findCheapestHotels($data->data->hotels);

            return $cheapestHotels;

        } catch (InvalidResponseException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
