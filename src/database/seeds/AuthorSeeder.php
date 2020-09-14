<?php

namespace app\database\seeds;

use app\models\Author;
use Faker;

class AuthorSeeder implements Seeder
{
    public function seed(): void
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; ++$i) {
            Author::Create(['firstname' => $faker->firstname, 'lastname' => $faker->lastname]);
        }
    }
}
