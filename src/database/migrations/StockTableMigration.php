<?php

namespace app\database\migrations;

require_once  str_replace('src\database\migrations', '', __DIR__).'bootstrap.php';
use app\database\migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class StockTableMigration implements Migration
{
    public function create()
    {
        Capsule::schema()->create('stock', function ($table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned();
            $table->integer('amount');
            $table->timestamps();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }
}
