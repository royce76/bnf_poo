<?php
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';

$book_manager = new BookManager();
$list_book = $book_manager->getBooks();

$errors = "";
$error = "";
$field = "";
$entries = array_filter($_POST);
//Look for form addBook
if (isset($_POST["add"]) && !empty($_POST["add"])) {
  if (count($entries) === count($_POST)) {
    if ($book_manager->checkIsbn($_POST["isbn"]) === FALSE) {
      if ($book_manager->checkIdentificationBook($_POST["identificationBook"]) === FALSE) {
        try {
          $book = new Book($_POST);
        } catch (\Exception $e) {
          $error = $e->getMessage();
        }
        if (empty($error)) {
          $addbook = $book_manager->addBook($book);
          if ($addbook) {
            header("Location: index.php");
            exit();
          }
          else {
            $errors = "La base de données a eu un problème";
            // throw new Exception("transaction non effectué");
          }
        }
      }
      else {
        $field = "Identité du livre déjà utilisée";
      }
    }
    else {
      $field = "ISBN existant";
    }
  }
  else {
    $field = "Les champs ne sont pas tous remplis";
  }
}


include "View/indexView.php";
