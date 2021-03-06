<?php

namespace App\Database\Migration;

require_once  str_replace('src\Database\Migration', '', __DIR__).'bootstrap.php';
use App\Interfaces\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class CustomerOrdersTableMigration implements Migration
{
    public function create()
    {
        Capsule::schema()->create('customer_orders', function ($table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->date('date');
            $table->float('totals');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }
}
