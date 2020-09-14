<?php
namespace app\database\migrations;

require_once  str_replace('src\database\migrations', '', __DIR__).'bootstrap.php';
use app\database\migrations\Migration;
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
