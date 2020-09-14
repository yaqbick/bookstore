<?php

namespace app\database\migrations;

require_once  str_replace('src\database\migrations', '', __DIR__).'bootstrap.php';
use app\database\migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class OrderItemsTableMigration implements Migration
{
    public function create()
    {
        Capsule::schema()->create('order_items', function ($table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->integer('amount');
            $table->float('totals');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('customer_orders')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }
}
