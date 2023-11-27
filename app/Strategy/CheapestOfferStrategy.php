<?php

namespace App\Strategy;

use App\Models\HotelOffer;

class CheapestOfferStrategy implements HotelOfferStrategyInterface
{
    public function processOffer(
        HotelOffer $currentOffer,
        HotelOffer $newOffer
    ): HotelOffer
    {
        if ($newOffer->getPrice() < $currentOffer->getPrice()) {
            $validOffer = $newOffer;
        } else {
            $validOffer = $currentOffer;
        }

        if (!$validOffer->getImage() && $newOffer->getImage()) {
            $validOffer->setImage($newOffer->getImage());
        }
        return $validOffer;

    }
}
