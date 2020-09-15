<?php
namespace app\database\seeds;

require_once 'vendor\fzaninotto\faker\src\autoload.php';
use Faker;
use app\models\Book;
use app\models\Customer;
use  app\database\seeds\Seeder;

class CustomerSeeder implements Seeder
{
    public function seed():void
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; ++$i) {
            {
                Customer::Create(['firstname' => $faker->firstname,
                                    'lastname'=> $faker->lastname,
                                    'email'=> $faker->email,
                                    'phone'=>$faker->phoneNumber,
                                    'address'=>$faker->address,
                                    'locked'=>false]);
            }
        }
    }
}
