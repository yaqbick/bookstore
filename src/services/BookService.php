<?php

namespace app\services;

use app\models\Book;
use app\models\Publisher;

class BookService
{
    public function view()
    {
        $books = Book::with('hasPublisher')->get();
        $publishers = Publisher::all();
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/bookstore/src/views');
        $twig = new \Twig\Environment($loader);
        echo $twig->render('Books.html.twig', ['books' => $books, 'publishers' => $publishers]);
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
    }
}
