<?php

namespace app\database;

require_once 'vendor/autoload.php';
// include 'config.php';

use Faker;
use PDO;

class DbSeeder
{
    public static function seedAll()
    {
        DbSeeder::seedAuthorsTable();
        DbSeeder::seedPublishersTable();
        DbSeeder::seedBooksTable();
        DbSeeder::seedBooksAuthorRelationshipTable();
    }

    public static function seedAuthorsTable()
    {
        $conn = DbService::connect();
        $faker = Faker\Factory::create();
        $query = 'insert into authors (firstname,lastname) VALUES';
        for ($i = 0; $i < 20; ++$i) {
            $query .= '("'.$faker->firstname.'","'.$faker->lastname.'"),';
        }
        $query = substr($query, 0, -1);
        $conn->exec($query);
    }

    public static function seedPublishersTable()
    {
        $conn = DbService::connect();
        $faker = Faker\Factory::create();
        $query = 'insert into publishers (name) VALUES';
        for ($i = 0; $i < 20; ++$i) {
            $query .= '("'.$faker->company.'"),';
        }
        $query = substr($query, 0, -1);
        $conn->exec($query);
    }

    public static function seedBooksTable()
    {
        $conn = DbService::connect();
        $faker = Faker\Factory::create();
        $sth = $conn->prepare('SELECT id FROM publishers');
        $sth->execute();
        $publishers_ids = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
        $query = 'insert into books (title,publisher_id,cover,price) VALUES';
        for ($i = 0; $i < 20; ++$i) {
            $query .= '("'.$faker->sentence(2).'","'.$publishers_ids[$faker->numberBetween(1, 15)].'","'.$faker->imageUrl.'","'.$faker->randomFloat(2, 10, 30).'"),';
        }
        $query = substr($query, 0, -1);
        $conn->exec($query);
    }

    public static function seedCustomersTable()
    {
        $conn = DbService::connect();
        $faker = Faker\Factory::create();
        $query = 'insert into customers (firstname,lastname,email,phone,address) VALUES';
        for ($i = 0; $i < 20; ++$i) {
            $query .= '("'.$faker->firstname.'","'.$faker->lastname.'","'.$faker->email.'","'.$faker->phoneNumber.'","'.$faker->address.'"),';
        }
        $query = substr($query, 0, -1);
        $conn->exec($query);
    }

    public static function seedBooksAuthorRelationshipTable()
    {
        $conn = DbService::connect();
        $faker = Faker\Factory::create();
        $sth = $conn->prepare('SELECT id FROM books');
        $sth->execute();
        $books_ids = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
        $sth = $conn->prepare('SELECT id FROM authors');
        $sth->execute();
        $authors_ids = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
        $query = 'insert into books_authors_relationship (author_id,book_id) VALUES';
        for ($i = 0; $i < 20; ++$i) {
            $query .= '("'.$authors_ids[$faker->numberBetween(1, 15)].'","'.$books_ids[$faker->numberBetween(1, 15)].'"),';
        }
        $query = substr($query, 0, -1);
        $conn->exec($query);
    }
}
