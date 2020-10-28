<?php
// Controlleur qui gérer l'affichage de tous les livres
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';
require 'model/entity/User.php';
require 'model/UserManager.php';

function test_input($data) {
  $data = trim($data); // remove space of both side
  $data = stripslashes($data);// remove backslashes
  $data = htmlspecialchars($data, ENT_QUOTES);//both quotes
  return $data;
}

$book_manager = new BookManager();
$list_book = $book_manager->getBooks();
$user_manager = new UserManager();

//Look for form addBook
if (isset($_POST["Ajouter"]) && !empty($_POST["Ajouter"])) {
  foreach ($_POST as $key => $value) {
    $_POST[$key] = test_input($_POST[$key]);
  }
  $book = new Book($_POST);
  $book_manager->addBook($book);
  header("Location: index.php");
  exit();
}


include "View/indexView.php";
