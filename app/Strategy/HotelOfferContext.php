<?php

namespace App\Strategy;

use App\Models\HotelOffer;

class HotelOfferContext
{
    /**
     * @var HotelOfferStrategyInterface
     */
    private HotelOfferStrategyInterface $offerStrategy;

    /**
     * @param HotelOfferStrategyInterface $offerStrategy
     */
    public function __construct(
        HotelOfferStrategyInterface $offerStrategy
    )
    {
        $this->offerStrategy = $offerStrategy;
    }

    /**
     * @param HotelOffer $currentOffer
     * @param HotelOffer $newOffer
     * @return HotelOffer
     */
    public function findBestOffer(
        HotelOffer $currentOffer,
        HotelOffer $newOffer
    ): HotelOffer
    {
        return $this->offerStrategy->processOffer(
            $currentOffer, $newOffer
        );
    }
}
