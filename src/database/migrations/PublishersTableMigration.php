<?php
namespace app\database\migrations;

require_once  str_replace('src\database\migrations', '', __DIR__).'bootstrap.php';
use app\database\migrations\Migration;
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
