<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
   'driver' => 'mysql',
   'host' => '127.0.0.1',
   'database' => 'bookstore',
   'username' => 'root',
   'password' => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
require 'routing.php';

require_once 'vendor\fzaninotto\faker\src\autoload.php';
