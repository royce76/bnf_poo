<?php
// Controleur qui gère l'affichage du détail d'un livre
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';
require 'model/entity/User.php';
require 'model/UserManager.php';

$book_manager = new BookManager();
//on affiche un livre avec son emprunteur s'il y a.
$book = $book_manager->getBookByGetId();
$user_manager = new UserManager();

//Delete book
if (isset($_POST["delete"])) {
  $delete_book = $book_manager->deleteBook();
  if ($delete_book) {
    header("Location: index.php");
    exit();
  }
}
$error = "";
//update book lending
if (isset($_POST["bookLending"])) {
  try {
    $user = new User($_POST);
  } catch (\Exception $e) {
    $error = $e->getMessage();
  }
  if (empty($error)) {
    $user = $user_manager->getUser($user);
    $book_manager->updateBookStatus($user);
    header("Location: book.php?id={$_GET["id"]}");
    exit();
  }
  else {
    $error = "Identifiant non reconnu.";
  }
}

//update book back
if (isset($_POST["bookBack"])) {
  $book = $book_manager->updateBookStatusBack();
  header("Location: book.php?id={$_GET["id"]}");
  exit();
}
include "View/bookView.php";
