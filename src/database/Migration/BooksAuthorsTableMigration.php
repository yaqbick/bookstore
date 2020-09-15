<?php

namespace App\Database\Migration;

require_once  str_replace('src\Database\Migration', '', __DIR__).'bootstrap.php';
use App\Interfaces\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class BooksAuthorsTableMigration implements Migration
{
    public function create()
    {
        Capsule::schema()->create('books_authors', function ($table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }
}
