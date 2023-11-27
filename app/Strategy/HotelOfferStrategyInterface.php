<?php

namespace App\Strategy;

use App\Models\HotelOffer;

interface HotelOfferStrategyInterface
{
    public function processOffer(
        HotelOffer $currentOffer,
        HotelOffer $newOffer
    ): HotelOffer;

}
