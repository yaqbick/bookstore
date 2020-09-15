<?php
namespace App\Database\Migration;

require_once  str_replace('src\Database\Migration', '', __DIR__).'bootstrap.php';
use App\Interfaces\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class PublishersTableMigration implements Migration
{
    public function create()
    {
        Capsule::schema()->create('publishers', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }
}
