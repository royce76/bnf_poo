<?php
// Controleur qui gère l'affichage de tous les utilisateurs
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';
require 'model/entity/User.php';
require 'model/UserManager.php';

$user_manager = new UserManager();
$users = $user_manager->getUsers();

$book_manager = new BookManager();

$user_identification = $book_user = [];
if (isset($_POST["informations"])) {
  try {
    $user = new User($_POST);
  } catch (\Exception $e) {
    $error = $e->getMessage();
  }
  if (empty($error)) {
    $user_identification = $user_manager->getUser($user);
    $book_user = $book_manager->getBookUser($user_identification);
  }
  $error = "Identifiant non reconnu.";
}

include "View/usersView.php";
