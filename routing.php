<?php

require_once 'vendor/autoload.php';
use app\controllers\BookController;
use app\controllers\RentController;
use app\database\DbService;

DbService::createAndSeed();
$request = $_SERVER['REQUEST_URI'];
  $params = explode('/', $request);
  $index = count($params);

  if ($params[$index - 1] == 'rent') {
      RentController::index();
  }
  if ($params[$index - 1] == 'books') {
      BookController::index();
  }
  // if ($params[$index - 1] == 'ajax') {
  //     require_once 'ajax.php';
  // }
