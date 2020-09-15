<?php

use App\Controller\BookController;
use App\Controller\CustomerRentController;
use App\Interfaces\BookService;
use App\Interfaces\Service;

if (isset($_SERVER['REQUEST_URI'])) {
    $request = $_SERVER['REQUEST_URI'];
    switch ($request) {
      case '/bookstore/books':
        $bookController = new BookController();
        $bookController->index();
        break;
      case '/bookstore/raport':
        $bookController = new CustomerRentController();
        $bookController->index();
        break;
      default:
        http_response_code(404);
        // require __DIR__ . '/views/404.php';
      break;
}
}
