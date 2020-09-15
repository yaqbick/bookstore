<?php

require_once 'vendor/autoload.php';
use App\Service\BookService;

$bookService = new BookService();
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'add_book') {
        $bookService->add($_POST['data']);
    }
    if ($_POST['action'] == 'delete_book') {
        $bookService->delete($_POST['data']);
    }
}
