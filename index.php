<?php
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';

$book_manager = new BookManager();
$list_book = $book_manager->getBooks();

$error = "";
$entries = array_filter($_POST);
//Look for form addBook
if (isset($_POST["Ajouter"]) && !empty($_POST["Ajouter"])) {
  if (count($entries) === count($_POST)) {
    try {
      $book = new Book($_POST);
      $book_manager->addBook($book);
    } catch (\Exception $e) {
      $error = $e->getMessage();
    }
    if (empty($error)) {
      header("Location: index.php");
      exit();
    }
  }
  else {
    $error = "Les champs ne sont pas tous remplis.";
  }
}


include "View/indexView.php";
