<?php

namespace app\controllers;

use app\services\BookService;

class BookController
{
    public function index()
    {
        $bookService = new BookService();

        return $bookService->view();
    }
}
