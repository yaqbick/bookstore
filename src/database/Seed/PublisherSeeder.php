<?php
namespace App\Database\Seed;

require_once 'vendor/autoload.php';
require_once 'vendor\fzaninotto\faker\src\autoload.php';
use Faker;
use App\Model\Book;
use App\Model\Publisher;
use App\Interfaces\Seeder;

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
