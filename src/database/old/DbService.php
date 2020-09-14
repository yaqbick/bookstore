<?php

namespace app\database;

use PDO;

include 'config.php';
class DbService
{
    public static function connect()
    {
        try {
            $conn = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function createAndSeed()
    {
        DbMigrations::createTables();
        if (DbService::checkIfEmpty()) {
        } else {
            DbSeeder:: seedAll();
        }
    }

    public static function checkIfEmpty()
    {
        $conn = DbService::connect();
        $sth = $conn->prepare('SELECT title FROM books');
        $sth->execute();
        $result = $sth->fetchAll();
        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }

    public static function getAllBooks()
    {
        $conn = DbService::connect();
        try {
            $sth = $conn->prepare('SELECT * FROM books INNER JOIN publishers ON books.publisher_id=publishers.id 
                                    INNER JOIN books_authors_relationship ON books.id=books_authors_relationship.book_id
                                    INNER JOIN authors ON authors.id=books_authors_relationship.author_id');
            $sth->execute();
            $result = $sth->fetchAll();

            return $result;
        } catch (PDOException $e) {
            // echo $e->getMessage();
        }
    }

    public static function deleteBook($bookID)
    {
        $conn = DbService::connect();
        try {
            // $sth = $conn->prepare('delete from books_authors_relationship where book_id='.$bookID);
            // $sth->execute();
            $sth = $conn->prepare('delete from books where id='.$bookID);
            $sth->execute();
        } catch (PDOException $e) {
            // echo $e->getMessage();
        }
    }

    public static function addBook($post)
    {
        $conn = DbService::connect();
        $data = json_decode(stripslashes($post), true);
        // $data = json_decode($post, true);
        try {
            $sth = $conn->prepare('insert into books(title,publisher_id,cover,price) values("'.$data['title'].'","'.$data['publisher'].'","aaaaa","20")');
            $sth->execute();
            $sth = $conn->prepare('select * from books where title="'.$data['title'].'" AND publisher_id="'.$data['publisher'].'"');
            $sth->execute();
            $result = $sth->fetchAll();
            // $file = 'people.txt';
            // file_put_contents($file, $result[0]['id']);
            $sth = $conn->prepare('insert into books_authors_relationship(author_id,book_id) values("'.$data['author'].'","'.$result[0]['id'].'")');
            $sth->execute();
        } catch (PDOException $e) {
            // echo $e->getMessage();
        }
    }

    public static function getAllPublishers()
    {
        $conn = DbService::connect();
        try {
            $sth = $conn->prepare('select * from publishers');
            $sth->execute();
            $result = $sth->fetchAll();

            return $result;
        } catch (PDOException $e) {
            // echo $e->getMessage();
        }
    }

    public static function getAllAuthors()
    {
        $conn = DbService::connect();
        try {
            $sth = $conn->prepare('select * from authors');
            $sth->execute();
            $result = $sth->fetchAll();

            return $result;
        } catch (PDOException $e) {
            // echo $e->getMessage();
        }
    }
}
