<?php

namespace app\controllers;

use app\services\BookService;

class BookController
{
    public function index()
    {
        return BookService::view();
    }
}
