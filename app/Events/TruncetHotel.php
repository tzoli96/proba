<?php

namespace App\Events;

use Config\Database;

class TruncetHotel
{
    public static function dispatch()
    {
        $db = Database::connect();
        $db->table('hotel')
            ->truncate();
    }
}
