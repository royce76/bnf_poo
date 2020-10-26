<?php

class UserManager {

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

  
  // Récupère tous les utilisateurs
  public function getUsers() {
    return  "coucou";
  }

  // Récupère un utilisateur par son id
  public function getUserById() {
    return  "coucou";
  }

  // Récupère un utilisateur par son code personnel
  public function getUser() {
    return  "coucou";
  }
}
