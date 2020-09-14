<?php

namespace app\controllers;

require_once 'vendor/autoload.php';



class BookController
{
    public static function index()
    {
        $books = DbService::getAllBooks();
        $authors = DbService::getAllAuthors();
        $publishers = DbService::getAllPublishers();
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/bookstore/src/views');
        $twig = new \Twig\Environment($loader);
        echo $twig->render('Books.html.twig', ['name' => 'Fabien']);
    }
}
