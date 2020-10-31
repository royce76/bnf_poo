<?php
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';

$book_manager = new BookManager();
$list_book = $book_manager->getBooks();

//function check isbn exist
function checkIsbn(int $data):bool {
  $check = FALSE;
  $book_manager = new BookManager();
  $list_book = $book_manager->getBooks();
  foreach ($list_book as $key => $book) {
    if ($book->getIsbn() === $data) {
      $check = TRUE;
    }
    else {
      $check;
    }
  }
  return $check;
}

//function check identificationBook exist
function checkIdentificationBook(int $data):bool {
  $check = FALSE;
  $book_manager = new BookManager();
  $list_book = $book_manager->getBooks();
  foreach ($list_book as $key => $book) {
    if ($book->getIdentificationBook() === $data) {
      $check = TRUE;
    }
    else {
      $check;
    }
  }
  return $check;
}

$errors = "";
$error = "";
$field = "";
$entries = array_filter($_POST);
//Look for form addBook
if (isset($_POST["add"]) && !empty($_POST["add"])) {
  if (count($entries) === count($_POST)) {
    if (!checkIsbn($_POST["isbn"])) {
      if (!checkIdentificationBook($_POST["identificationBook"])) {
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
            $errors = "La base de donnée a eu un problème";
            // throw new Exception("transaction non effectué");
          }
        }
      }
      else {
        $field = "Identité du livre déjà utilisé.";
      }
    }
    else {
      $field = "Isbn existant.";
    }
  }
  else {
    $field = "Les champs ne sont pas tous remplis.";
  }
}


include "View/indexView.php";
