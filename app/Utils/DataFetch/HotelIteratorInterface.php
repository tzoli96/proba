<?php

namespace App\Utils\DataFetch;

interface HotelIteratorInterface
{
    public function current();
    public function next();
    public function key();
    public function valid();
    public function rewind();
}
