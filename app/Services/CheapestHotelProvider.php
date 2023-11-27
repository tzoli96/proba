<?php

namespace App\Services;

use App\Strategy\HotelOfferContext;
use App\Strategy\CheapestOfferStrategy;
use App\Models\HotelOffer;

class CheapestHotelProvider
{
    /**
     * @var HotelOfferContext
     */
    private HotelOfferContext $offerContext;

    /**
     * Construct
     */
    public function __construct()
    {
        $cheapestOffer = new CheapestOfferStrategy();
        $this->offerContext = new HotelOfferContext($cheapestOffer);
    }

    /**
     * @param array $hotels
     * @return array
     */
    public function findCheapestHotels(array $hotels): array
    {
        $cheapestHotels = [];

        foreach ($hotels as $hotel) {
            $hotelId = $hotel->hotel_id;
            $currentCheapest = $cheapestHotels[$hotelId] ?? null;

            if ($currentCheapest === null) {
                $cheapestHotels[$hotelId] = $this->createHotelOffer($hotel);
            } else {
                $newOffer = $this->createHotelOffer($hotel);
                $cheapestHotels[$hotelId] = $this->offerContext->findBestOffer(
                    $currentCheapest,
                    $newOffer
                );
            }
        }

        return array_values($cheapestHotels);
    }


    /**
     * @param $hotel
     * @return HotelOffer
     */
    private function createHotelOffer($hotel): HotelOffer
    {
        return new HotelOffer(
            $hotel->hotel_id,
            $hotel->hotel_name,
            $hotel->country,
            $hotel->city,
            ceil($hotel->price),
            $hotel->image,
            $hotel->star
        );
    }
}
