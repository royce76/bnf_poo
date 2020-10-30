<?php
// Controleur qui gère l'affichage de tous les utilisateurs
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';
require 'model/entity/User.php';
require 'model/UserManager.php';

$user_manager = new UserManager();
$users = $user_manager->getUsers();

$error = $ok = "";
if (isset($_POST["informations"])) {
  try {
    $user = new User($_POST);
    $user_identification = $user_manager->getUser($user);
  } catch (\Exception $e) {
    $error = $e->getMessage();
  }
  if(empty($error)){
    $ok = "okay";
  }
  else {
    $error = "Identifiant non reconnu.";
  }

}

include "View/usersView.php";
