<?php
// Controleur qui gère l'affichage du détail d'un utilisateur
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';
require 'model/UserManager.php';
require 'model/entity/User.php';

$user_manager = new UserManager();
$book_manager = new BookManager();
$user_get_id = $user_manager->getUserById();
$book = $book_manager->getBookUser($user_get_id);


include "View/userView.php";
