<?php

namespace app\database\migrations;

require_once  str_replace('src\database\migrations', '', __DIR__).'bootstrap.php';
use app\database\migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class CustomersTableMigration implements Migration
{
    public function create()
    {
        Capsule::schema()->create('customers', function ($table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->integer('phone');
            $table->string('address');
            $table->boolean('locked');
            $table->timestamps();
        });
    }
}
