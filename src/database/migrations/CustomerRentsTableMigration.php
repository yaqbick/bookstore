<?php

namespace app\database\migrations;

require_once  str_replace('src\database\migrations', '', __DIR__).'bootstrap.php';
use app\database\migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class CustomerRentsTableMigration implements Migration
{
    public function create()
    {
        Capsule::schema()->create('customer_rents', function ($table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->date('startdate');
            $table->date('enddate');
            $table->float('fee');
            $table->boolean('active');
            $table->float('cash_penalty');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }
}
