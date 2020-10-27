<?php

class BookManager {

  private PDO $_db;

  public function __construct() {
    $this->setDb(DATABASE::getConnection());
  }

  public function setDb(PDO $db) {
    $this->_db = $db;
  }

  public function getDb() {
    return $this->_db;
  }

  // Récupère tous les livres
  public function getBooks() {
    $query = $this->getDb()->query(
      "SELECT isbn, title, author, publisher, bookType, identificationBook, userId FROM Book"
    );
    $title_book = $query->fetchAll(PDO::FETCH_CLASS, "Book");
    return $title_book;
  }

  // Récupère un livre
  public function getBook() {

  }

  // Ajoute un nouveau livre
  public function addBook() {

  }

  // Met à jour le statut d'un livre emprunté
  public function updateBookStatus() {

  }

}
