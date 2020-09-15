<?php

namespace app\controllers;

use app\services\CustomerRentService;

class CustomerRentController
{
    public function index()
    {
        $CustomerRentService = new CustomerRentService();

        return $CustomerRentService->view();
    }
}
