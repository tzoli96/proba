<?php

namespace App\Models;

class HotelOffer
{
    private $hotelName;
    private $country;
    private $city;
    private $price;
    private $image;
    private $hotel_id;
    private $star;

    /**
     * @param $hotelId
     * @param $hotelName
     * @param $country
     * @param $city
     * @param $price
     * @param $image
     * @param $star
     */
    public function __construct($hotelId, $hotelName, $country, $city, $price, $image, $star)
    {
        $this->hotel_id = $hotelId;
        $this->hotelName = $hotelName;
        $this->country = $country;
        $this->city = $city;
        $this->price = $price;
        $this->image = $image;
        $this->star = $star;
    }

    /**
     * @return string
     */
    public function getHotelName(): string
    {
        return $this->hotelName;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param $image
     * @return HotelOffer
     */
    public function setImage($image): HotelOffer
    {
        $this->image = $image;
        return $this;
    }

    public function getStar(): int
    {
        return $this->star;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'hotel_id' => $this->hotel_id,
            'hotel_name' => $this->hotelName,
            'country' => $this->country,
            'city' => $this->city,
            'star' => $this->star,
            'price' => $this->price,
            'image' => $this->image,
        ];
    }
}
