<?php

namespace app\controllers;

class BookController
{
    public static function index()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/bookstore/src/views/BooksView.php';
    }
}
