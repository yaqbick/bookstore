<?php

namespace App\Service;

use App\Model\Book;
use App\Model\Publisher;
use App\Model\Author;
use App\Model\BookAuthor;
use App\Interfaces\Service;

class BookService implements Service
{
    public function view()
    {
        $books = Book::with(['hasPublisher','hasAuthor'])->get();
        $authors =  Author::all();
        $publishers = Publisher::all();
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/bookstore/src/View');
        $twig = new \Twig\Environment($loader);
        echo $twig->render('Books.html.twig', ['books' => $books, 'publishers' => $publishers, 'authors'=>$authors]);
    }

    public function add($post)
    {
        require 'bootstrap.php';
        $data = json_decode(stripslashes($post), true);
        $book = Book::Create(['title'=> $data['title'],'publisher_id'=>$data['publisher'],'cover'=>'xxxx','price'=>20]);
        // $book->hasPublisher()->update($data['publisher']);
        $book->hasAuthor()->attach($data['author']);
    }
    public function delete($id)
    {
        require 'bootstrap.php';
        $book = Book::find($id);
        $book->delete();
    }
}
