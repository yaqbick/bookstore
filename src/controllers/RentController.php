<?php

namespace app\controllers;

class RentController
{
    public static function index()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/bookstore/src/views/RentView.php';
    }
}
