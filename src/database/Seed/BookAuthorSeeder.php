<?php
namespace App\Database\Seed;

require_once 'vendor/autoload.php';
use App\Model\Book;
use App\Model\Author;
use App\Model\BooksAuthor;
use App\Interfaces\Seeder;
use Faker;

class BookAuthorSeeder implements Seeder
{
    public function seed():void
    {
        $faker = Faker\Factory::create();
        $authors = Author::all()->pluck('id')->toArray();
        $books = Book::all()->pluck('id')->toArray();
        for ($i = 0; $i < 20; ++$i) {
            {
                BooksAuthor::Create(['author_id' => $authors[$faker->numberBetween(1, 19)],
                                    'book_id' => $books[$faker->numberBetween(1, 19)] ]);
            }
        }
    }
}
