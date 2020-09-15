<?php

namespace App\Controller;

use App\Service\CustomerRentService;

class CustomerRentController
{
    public function index()
    {
        $CustomerRentService = new CustomerRentService();

        return $CustomerRentService->view();
    }
}
