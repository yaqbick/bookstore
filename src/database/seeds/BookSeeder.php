<?php
namespace app\database\seeds;

require_once 'vendor/autoload.php';
use app\models\Book;
use app\models\Publisher;
use  app\database\seeds\Seeder;
use Faker;

class BookSeeder implements Seeder
{
    public function seed():void
    {
        $faker = Faker\Factory::create();
        $publishers = Publisher::all()->pluck('id')->toArray();
        for ($i = 0; $i < 20; ++$i) {
            {
                Book::Create(['title' => $faker->sentence(2),    'publisher_id' => $publishers[$faker->numberBetween(1, 15)],    'cover' => $faker->imageUrl, 'price'=>$faker->randomFloat(2, 10, 30) ]);
            }
        }
    }
}
