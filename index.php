<?php
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';

function test_input($data) {
  $data = trim($data); // remove space of both side
  $data = stripslashes($data);// remove backslashes
  $data = htmlspecialchars($data, ENT_QUOTES);//both quotes
  return $data;
}

$book_manager = new BookManager();
$list_book = $book_manager->getBooks();

$error = "";
$entries = array_filter($_POST);
//Look for form addBook
if (isset($_POST["Ajouter"]) && !empty($_POST["Ajouter"])) {
  foreach ($_POST as $key => $value) {
    $_POST[$key] = test_input($_POST[$key]);
  }
  if (count($entries) === count($_POST)) {
    try {
      $book = new Book($_POST);
    } catch (\Exception $e) {
      $error = $e->getMessage();
    }
    if (empty($error)) {
      $book_manager->addBook($book);
      header("Location: index.php");
      exit();
    }
  }
  else {
    $error = "Les champs ne sont pas tous remplis.";
  }
}


include "View/indexView.php";
