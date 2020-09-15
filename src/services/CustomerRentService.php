<?php

namespace app\services;

use app\models\Book;
use app\models\Publisher;
use app\models\CustomerRent;
use app\models\Customer;
use app\services\Service;

class CustomerRentService implements Service
{
    public function view()
    {
        $rents = Customer::with(['hasCustomerRent'=> function ($query) {
            $query->where('customer_rents.cash_penalty', '>', 0);
            $query->where('customer_rents.book_id', '!=', 2);
        }])->where('locked', true)->get();
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/bookstore/src/views');
        $twig = new \Twig\Environment($loader);
        echo $twig->render('CustomerRent.html.twig', ['rents' => $rents]);
    }
}
