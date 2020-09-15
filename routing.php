<?php

use app\controllers\BookController;
use app\controllers\CustomerRentController;

if (isset($_SERVER['REQUEST_URI'])) {
    $request = $_SERVER['REQUEST_URI'];
    switch ($request) {
      case '/bookstore/books':
        $bookController = new BookController();
        $bookController->index();
        break;
      case '/bookstore/rents':
        $bookController = new CustomerRentController();
        $bookController->index();
        break;
      default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
      break;
}
}
