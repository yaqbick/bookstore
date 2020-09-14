<?php

use app\controllers\BookController;
use app\controllers\RentController;

$request = $_SERVER['REQUEST_URI'];
  $params = explode('/', $request);
  $index = count($params);

  if ($params[$index - 1] == 'rent') {
      RentController::index();
  }
  if ($params[$index - 1] == 'books') {
      $bookController = new BookController();
      $bookController->index();
  }
  // if ($params[$index - 1] == 'ajax') {
  //     require_once 'ajax.php';
  // }
