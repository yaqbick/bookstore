<?php
namespace app\database\seeds;

require_once 'vendor/autoload.php';
require_once 'vendor\fzaninotto\faker\src\autoload.php';
use Faker;
use app\models\Book;
use app\models\Publisher;
use  app\database\seeds\Seeder;

class PublisherSeeder implements Seeder
{
    public function seed():void
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; ++$i) {
            {
                Publisher::Create(['name' => $faker->company ]);
            }
        }
    }
}
