<?php

namespace App\Controllers;

use App\Services\DataFetchService;

class Test extends BaseController
{
    public function index()
    {
        $dataFetchService = new DataFetchService();
        $dataFetchService->execute();
        die('test');
    }
}
