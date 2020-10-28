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
  public function getUsers():?array {
    $query = $this->getDb()->query(
      "SELECT * FROM User"
    );
    $users = $query->fetchAll(PDO::FETCH_CLASS,"User");
    return $users;
  }

  // Récupère un utilisateur par son id
  public function getUserById():User {
    $query= $this->getDb()->prepare(
      "SELECT *
      FROM User
      WHERE id=:id"
    );
    $result = $query->execute([
      "id" => $_GET["id"]
    ]);
    $user_by_id = $query->fetchAll(PDO::FETCH_CLASS,"User")[0];
    return $user_by_id;
  }

  // Récupère un utilisateur par son code personnel
  public function getUser(User $user_identification):User {
    $query = $this->getDb()->prepare(
      "SELECT *
      FROM User
      WHERE identificationUser = :identificationUser"
    );
    $result = $query->execute([
      "identificationUser" => $user_identification->getidentificationUser()
    ]);
    $user_by_identification = $query->fetchAll(PDO::FETCH_CLASS, "User")[0];
    return $user_by_identification;
  }

  //Récupère le user en fonction du livre à book.php
  public function getUserBook(Book $book):?array {
    $query = $this->getDb()->prepare(
      "SELECT u.id, lastname, identificationUser, b.userId, b.id
      FROM User AS u
      INNER JOIN Book AS b
      ON u.id = b.userId AND b.id = :id"
    );
    $result = $query->execute([
      "id" => $_GET["id"]
    ]);
    $user_book = $query->fetchAll(PDO::FETCH_CLASS, "User");
    return $user_book;
  }
}
