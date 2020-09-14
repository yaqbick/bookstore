<?php

namespace app\database\migrations;

require_once  str_replace('src\database\migrations', '', __DIR__).'bootstrap.php';
use app\database\migrations\Migration;
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
