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
    return  "coucou";
  }

  // Récupère un livre
  public function getBook() {
    return  "coucou";
  }

  // Ajoute un nouveau livre
  public function addBook() {
    return  "coucou";
  }

  // Met à jour le statut d'un livre emprunté
  public function updateBookStatus() {
    return  "coucou";
  }

}
