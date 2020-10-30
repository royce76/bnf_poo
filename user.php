<?php
// Controleur qui gère l'affichage du détail d'un utilisateur
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';
require 'model/UserManager.php';
require 'model/entity/User.php';

$user_manager = new UserManager();
$user = $user_manager->getUserById();


include "View/userView.php";
