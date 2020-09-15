<?php

require_once 'vendor/autoload.php';

use app\database\migrations\AuthorsTableMigration;
use app\database\migrations\BooksAuthorsTableMigration;
use app\database\migrations\BooksTableMigration;
use app\database\migrations\CustomerOrdersTableMigration;
use app\database\migrations\CustomerRentsTableMigration;
use app\database\migrations\CustomersTableMigration;
use app\database\migrations\OrderItemsTableMigration;
use app\database\migrations\PublishersTableMigration;
use app\database\migrations\StockTableMigration;
use app\database\seeds\AuthorSeeder;
use app\database\seeds\BookSeeder;
use app\database\seeds\PublisherSeeder;
use app\database\seeds\CustomerRentsSeeder;
use app\database\seeds\CustomerSeeder;
use app\models\Book;

$AuthorsTableMigration = new AuthorsTableMigration();
$PublishersTableMigration = new PublishersTableMigration();
$CustomersTableMigration = new CustomersTableMigration();
$BooksTableMigration = new BooksTableMigration();
$BooksAuthorsTableMigration = new BooksAuthorsTableMigration();
$CustomerOrdersTableMigration = new CustomerOrdersTableMigration();
$CustomerRentsTableMigration = new CustomerRentsTableMigration();
$OrderItemsTableMigration = new OrderItemsTableMigration();
$StockTableMigration = new StockTableMigration();
$migrations = [$AuthorsTableMigration, $PublishersTableMigration, $CustomersTableMigration, $BooksTableMigration, $BooksAuthorsTableMigration, $CustomerOrdersTableMigration, $CustomerRentsTableMigration, $OrderItemsTableMigration, $StockTableMigration];
// foreach ($migrations as $migration) {
//     $migration->create();
// }
// $publisherSeeder = new PublisherSeeder();
// $publisherSeeder->seed();
// $bookSeeder = new BookSeeder();
// $bookSeeder->seed();
// $authorSeeder = new AuthorSeeder();
// $authorSeeder->seed();
// $customerSeeder = new CustomerSeeder();
// $customerSeeder->seed();
// $CusotmerRentsSeeder = new CustomerRentsSeeder();
// $CusotmerRentsSeeder->seed();
