<?php

namespace App\Database\Seed;

use App\Model\Author;
use App\Interfaces\Seeder;
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
