<?php

namespace App\Service;

use App\Model\Book;
use App\Model\Publisher;
use App\Model\CustomerRent;
use App\Model\Customer;
use App\Interfaces\Service;

class CustomerRentService implements Service
{
    public function view()
    {
        $rents = Customer::with(['hasCustomerRent'=> function ($query) {
            $query->where('customer_rents.cash_penalty', '>', 0);
            $query->where('customer_rents.book_id', '!=', 2);
        }])->where('locked', true)->get();
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/bookstore/src/View');
        $twig = new \Twig\Environment($loader);
        echo $twig->render('CustomerRent.html.twig', ['rents' => $rents]);
    }
}
