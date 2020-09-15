<?php

require_once 'vendor/autoload.php';

use App\Database\Migration\AuthorsTableMigration;
use App\Database\Migration\BooksAuthorsTableMigration;
use App\Database\Migration\BooksTableMigration;
use App\Database\Migration\CustomerOrdersTableMigration;
use App\Database\Migration\CustomerRentsTableMigration;
use App\Database\Migration\CustomersTableMigration;
use App\Database\Migration\OrderItemsTableMigration;
use App\Database\Migration\PublishersTableMigration;
use App\Database\Migration\StockTableMigration;
use App\Database\Seed\AuthorSeeder;
use App\Database\Seed\BookSeeder;
use App\Database\Seed\PublisherSeeder;
use App\Database\Seed\CustomerRentsSeeder;
use App\Database\Seed\CustomerSeeder;
use App\Database\Seed\BookAuthorSeeder;
use App\Service\BookService;

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
foreach ($migrations as $migration) {
    $migration->create();
}
$publisherSeeder = new PublisherSeeder();
$publisherSeeder->seed();
$bookSeeder = new BookSeeder();
$bookSeeder->seed();
$authorSeeder = new AuthorSeeder();
$authorSeeder->seed();
$customerSeeder = new CustomerSeeder();
$customerSeeder->seed();
$CusotmerRentsSeeder = new CustomerRentsSeeder();
$CusotmerRentsSeeder->seed();
$BookAuthorSeeder = new BookAuthorSeeder();
$BookAuthorSeeder->seed();
