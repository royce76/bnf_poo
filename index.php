<?php
// Controlleur qui gérer l'affichage de tous les livres
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';

$book_manager = new BookManager();
$book_manager->getBooks();
$book_manager->getBook();
$book_manager->addBook();
$book_manager->updateBookStatus();
var_dump($book_manager->updateBookStatus());

include "View/indexView.php";
