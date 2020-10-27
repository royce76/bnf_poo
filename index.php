<?php
// Controlleur qui gérer l'affichage de tous les livres
require 'model/Database.php';
require 'model/BookManager.php';
require 'model/entity/Book.php';

$book_manager = new BookManager();
$list_book = $book_manager->getBooks();


include "View/indexView.php";
