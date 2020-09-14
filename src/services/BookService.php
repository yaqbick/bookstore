<?php
namespace app\services;

use app\models\Publisher;
use app\models\Book;

class BookService
{
    public function view()
    {
        $books = Book::all()->join('publishers', 'publishers.id', '=', 'books.publisher_id');
        $publishers = Publisher::all();
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/bookstore/src/views');
        $twig = new \Twig\Environment($loader);
        echo $twig->render('Books.html.twig', ['books' => $books, 'publishers'=>$publishers]);
    }
}
