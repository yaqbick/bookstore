<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/bookstore/src/assets/js/ajax.js"></script>
<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">title</th>
      <th scope="col">author</th>
      <th scope="col">publisher</th>
    </tr>
  </thead>
  <tbody>
<?php
use app\database\DbService;

$books = DbService::getAllBooks();
// var_dump($books);
$authors = DbService::getAllAuthors();
$publishers = DbService::getAllPublishers();
$bookInput = '<tr><td><input  id="book_title"></td><td><select id="book_author">';
foreach ($authors as $author) {
    $bookInput .= '<option value="'.$author['id'].'">'.$author['firstname'].' '.$author['lastname'].'</option>';
}
$bookInput .= '</select></td><td><select id="book_publisher">';
foreach ($publishers as $publisher) {
    $bookInput .= '<option value="'.$publisher['id'].'">'.$publisher['name'].'</option>';
}
$bookInput .= '</select></td><td><button name="delete_buttton" class="btn btn-success add_button">+</button></td></tr>';
echo $bookInput;
foreach ($books as $book) {
    echo '<tr><td>'.$book['title'].'</td>
    <td>'.$book['firstname'].' '.$book['lastname'].'</td>
    <td>'.$book['name'].'</td>
    <td><button  value='.$book['book_id'].' name="delete_buttton" class="btn btn-danger delete_button">X</button></td></tr>';
}
// echo '</form>';
?>

  </tbody>
</table>
    </div>
    <div class="col-sm">
   
    </div>
  </div>
</div>