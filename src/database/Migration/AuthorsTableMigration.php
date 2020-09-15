<?php

namespace App\Database\Migration;

require_once  str_replace('src\Database\Migration', '', __DIR__).'bootstrap.php';
use App\Interfaces\Migration;
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
