<?php

require_once 'vendor/autoload.php';
use app\database\DbService;

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'add_book') {
        DbService::addBook($_POST['data']);
    }
    if ($_POST['action'] == 'delete_book') {
        DbService::deleteBook($_POST['data']);
    }
}
