<?php

namespace app\database;

class DbMigrations
{
    public static function createTables()
    {
        DbMigrations::createPublishersTable();
        DbMigrations::createAuthorsTable();
        DbMigrations::createBooksTable();
        DbMigrations::createCustomersTable();
        DbMigrations::createBooksAuthorsRelationshipTable();
        DbMigrations::createCustomerRentsTable();
        DbMigrations::createCustomerOrdersTable();
        DbMigrations::createOrdersItemsTable();
        DbMigrations::createStockTable();
    }

    public static function createPublishersTable()
    {
        $conn = DbService::connect();
        $sql = 'CREATE TABLE IF NOT EXISTS publishers (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            name VARCHAR(45) NOT NULL
            )';
        $conn->exec($sql);
    }

    public static function createAuthorsTable()
    {
        $conn = DbService::connect();
        $sql = 'CREATE TABLE IF NOT EXISTS authors (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            firstname VARCHAR(45) NOT NULL,
            lastname VARCHAR(45) NOT NULL
            )';
        $conn->exec($sql);
    }

    public static function createBooksTable()
    {
        $conn = DbService::connect();
        $sql = 'CREATE TABLE IF NOT EXISTS books (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            title VARCHAR(45) NOT NULL,
            publisher_id int(6) UNSIGNED NOT NULL,
            cover VARCHAR(45),
            price float NOT NULL,
            CONSTRAINT test FOREIGN KEY (publisher_id ) REFERENCES publishers(id) 
            )ENGINE=innodb';
        $conn->exec($sql);
    }

    public static function createCustomersTable()
    {
        $conn = DbService::connect();
        $sql = 'CREATE TABLE IF NOT EXISTS customers (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            firstname VARCHAR(45) NOT NULL,
            lastname VARCHAR(45) NOT NULL,
            email VARCHAR(45) NOT NULL,
            phone VARCHAR(15) NOT NULL,
            address text NOT NULL,
            locked boolean not null
            )';
        $conn->exec($sql);
    }

    public static function createBooksAuthorsRelationshipTable()
    {
        $conn = DbService::connect();
        $sql = 'CREATE TABLE IF NOT EXISTS books_authors_relationship (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            author_id int UNSIGNED not null,
            book_id int UNSIGNED not null,
            CONSTRAINT FK_AuthorBook FOREIGN KEY (author_id) REFERENCES authors(id),
            CONSTRAINT FK_BookAuthor FOREIGN KEY (book_id) REFERENCES books(id) 
            )';
        $conn->exec($sql);
    }

    public static function createCustomerRentsTable()
    {
        $conn = DbService::connect();
        $sql = 'CREATE TABLE IF NOT EXISTS customer_rents (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            customer_id int UNSIGNED NOT NULL,
            book_id int UNSIGNED NOT NULL,
            startdate DATE NOT NULL,
            enddate DATE NOT NULL,
            fee float NOT NULL,
            active boolean NOT NULL,
            cash_penalty float,
            CONSTRAINT FK_CutomerRent FOREIGN KEY (customer_id) REFERENCES customers(id),
            CONSTRAINT FK_BookRent FOREIGN KEY (book_id) REFERENCES books(id)
            )';
        $conn->exec($sql);
    }

    public static function createCustomerOrdersTable()
    {
        $conn = DbService::connect();
        $sql = 'CREATE TABLE IF NOT EXISTS customer_orders (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            customer_id int UNSIGNED NOT NULL,
            date DATE NOT NULL,
            totals float NOT NULL,
            CONSTRAINT FK_CustomerOrder FOREIGN KEY (customer_id) REFERENCES customers(id)

            )';
        $conn->exec($sql);
    }

    public static function createOrdersItemsTable()
    {
        $conn = DbService::connect();
        $sql = 'CREATE TABLE IF NOT EXISTS order_items (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            order_id int UNSIGNED NOT NULL,
            book_id int UNSIGNED NOT NULL UNIQUE,
            amount int not null,
            totals float NOT NULL,
            CONSTRAINT FK_OrderItem FOREIGN KEY (order_id) REFERENCES customer_orders(id),
            CONSTRAINT FK_BookItem FOREIGN KEY (book_id) REFERENCES books(id)

            )';
        $conn->exec($sql);
    }

    public static function createStockTable()
    {
        $conn = DbService::connect();
        $sql = 'CREATE TABLE IF NOT EXISTS stock (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            book_id int  UNSIGNED NOT NULL UNIQUE,
            amount int not null,
            CONSTRAINT FK_StockBook FOREIGN KEY (book_id) REFERENCES books(id)
            )';
        $conn->exec($sql);
    }
}
