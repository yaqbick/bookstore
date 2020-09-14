<?php

namespace app\database\migrations;

require_once  str_replace('src\database\migrations', '', __DIR__).'bootstrap.php';
use app\database\migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class AuthorsTableMigration implements Migration
{
    public function create()
    {
        Capsule::schema()->create('authors', function ($table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->timestamps();
        });
    }
}
