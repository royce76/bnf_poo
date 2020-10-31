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

//function check identificationUser exist
function checkIdentificationUser(string $data):bool {
  $check = FALSE;
  $user_manager = new UserManager();
  $users = $user_manager->getUsers();
  foreach ($users as $key => $user) {
    if ($user->getidentificationUser() === $data) {
      $check = TRUE;
    }
    else {
      $check;
    }
  }
  return $check;
}

$error = "";
$field = "";
//update book lending
if (isset($_POST["bookLending"])) {
  if (!empty($_POST["identificationUser"])) {
    try {
      $user = new User($_POST);
    } catch (\Exception $e) {
      $error = $e->getMessage();
    }
    if (empty($error)) {
      if (checkIdentificationUser($_POST["identificationUser"])) {
        $user = $user_manager->getUser($user);
        $lend = $book_manager->updateBookStatus($user);
        header("Location: book.php?id={$_GET["id"]}");
        exit();
      }
      else {
        $field = "identifiant inconnu";
      }
    }
  }
  else {
    $field = "Champs vide.";
  }
}

//update book back
if (isset($_POST["bookBack"])) {
  $book = $book_manager->updateBookStatusBack();
  header("Location: book.php?id={$_GET["id"]}");
  exit();
}
include "View/bookView.php";
