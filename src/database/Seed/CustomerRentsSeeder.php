<?php
namespace App\Database\Seed;

require_once 'vendor/autoload.php';
use App\Model\Book;
use App\Model\Customer;
use App\Model\CustomerRent;
use App\Interfaces\Seeder;
use Faker;
use DateTime;

class CustomerRentsSeeder implements Seeder
{
    public function seed():void
    {
        $faker = Faker\Factory::create();
        $books = Book::all()->pluck('id')->toArray();
        $customers = Customer::all()->pluck('id')->toArray();
        for ($i = 0; $i < 20; ++$i) {
            {
                $customerId =  $customers[$faker->numberBetween(1, 15)];
                $startdate = $faker->dateTimeBetween('-3 months', 'now');
                $enddate = $faker->dateTimeBetween('-3 months', 'now');
                $interval = $enddate->diff($startdate);
                $difference = intval($interval->format('%R%a'));
                if ($difference<-30) {
                    $cash_penalty = (($difference+30)*-1)*0.5;
                    Customer::find($customerId)->update(['locked' => true]);
                } else {
                    $cash_penalty=0;
                }
                CustomerRent::Create(['customer_id' => $customerId,
                                        'book_id' => $books[$faker->numberBetween(1, 15)],
                                        'startdate' => $startdate,
                                        'enddate' =>  $enddate,
                                        'fee'=>5,
                                        'active'=>true,
                                        'cash_penalty'=> $cash_penalty
                                        ]);

            }
        }
    }
}
