<?php

namespace App\Controllers\Api\Hotels;

use App\Controllers\BaseController;
use App\Models\Hotel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class Index extends BaseController
{
    use ResponseTrait;

    /**
     * @var Hotel
     */
    private Hotel $hotelModel;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->hotelModel = new Hotel();
    }

    /**
     * @return ResponseInterface
     */
    public function index(): ResponseInterface
    {
        $hotels = $this->hotelModel->findAll();
        return $this->respond($hotels, 200);
    }
}
