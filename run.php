<?php

require_once 'vendor/autoload.php';
require "bootstrap.php";
use app\database\DbSeeder;
use app\database\DbService;
use app\database\migrations\AuthorsTableMigration;
use app\database\migrations\PublishersTableMigration;
use app\database\migrations\CustomersTableMigration;
use app\database\migrations\BooksTableMigration;
use app\database\migrations\BooksAuthorsTableMigration;
use app\database\migrations\CustomerOrdersTableMigration;
use app\database\migrations\CustomerRentsTableMigration;
use app\database\migrations\OrderItemsTableMigration;
use app\database\migrations\StockTableMigration;
use app\database\seeds\BookSeeder;
use app\database\seeds\PublisherSeeder;
use app\models\Publisher;

$AuthorsTableMigration = new AuthorsTableMigration();
$PublishersTableMigration = new PublishersTableMigration();
$CustomersTableMigration = new CustomersTableMigration();
$BooksTableMigration = new BooksTableMigration();
$BooksAuthorsTableMigration = new BooksAuthorsTableMigration();
$CustomerOrdersTableMigration = new CustomerOrdersTableMigration();
$CustomerRentsTableMigration = new CustomerRentsTableMigration();
$OrderItemsTableMigration = new OrderItemsTableMigration();
$StockTableMigration = new StockTableMigration();
$migrations = array($AuthorsTableMigration,$PublishersTableMigration,$CustomersTableMigration,$BooksTableMigration,$BooksAuthorsTableMigration,$CustomerOrdersTableMigration,$CustomerRentsTableMigration,$OrderItemsTableMigration,$StockTableMigration);
// foreach ($migrations as $migration) {
//     $migration->create();
// }
// $publisherSeeder = new PublisherSeeder();
// $publisherSeeder->seed();
// $user = User::Create(['name' => "Ahmed Khan",    'email' => "ahmed.khan@lbs.com",    'password' => password_hash("ahmedkhan", PASSWORD_BCRYPT), ]);
$publishers = Publisher::all();
