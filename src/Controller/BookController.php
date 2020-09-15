<?php

namespace App\Controller;

use App\Service\BookService;

class BookController
{
    public function index()
    {
        $bookService = new BookService();

        return $bookService->view();
    }
}
