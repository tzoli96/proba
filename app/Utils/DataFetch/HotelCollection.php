<?php

namespace App\Utils\DataFetch;
class HotelCollection implements HotelIteratorInterface
{
    private $hotels;
    private $position = 0;

    public function __construct(array $hotels)
    {
        $this->hotels = $hotels;
    }

    public function current()
    {
        return $this->hotels[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->hotels[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
