<?php
namespace App\Database\Migration;

require_once  str_replace('src\Database\Migration', '', __DIR__).'bootstrap.php';
use App\Interfaces\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class BooksTableMigration implements Migration
{
    public function create()
    {
        Capsule::schema()->create('books', function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('publisher_id')->unsigned();
            $table->string('cover');
            $table->string('price');
            $table->timestamps();
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
        });
    }
}
