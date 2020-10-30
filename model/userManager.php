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

  // Récupère un utilisateur par son id avec un éventuelle livre emprunté
  public function getUserById():User {
    $query= $this->getDb()->prepare(
      "SELECT u.*, b.title, b.author, b.identificationBook
      FROM User AS u
      LEFT JOIN Book AS b
      ON u.id = b.userId
      WHERE u.id=:id"
    );
    $result = $query->execute([
      "id" => $_GET["id"]
    ]);
    $user_id = $query->fetchAll(PDO::FETCH_ASSOC)[0];
    $user = new User($user_id);
    if ($user_id["title"] !== null) {
      $user->setBookLend(new Book($user_id));
    }
    return $user;
  }

  // Récupère un utilisateur par son code personnel avec un eventuel livre
  public function getUser(User $user_identification):User {
    $query = $this->getDb()->prepare(
      "SELECT u.*, b.title, b.author, b.identificationBook
      FROM User AS u
      LEFT JOIN Book AS b
      ON u.id = b.userId
      WHERE identificationUser = :identificationUser"
    );
    $result = $query->execute([
      "identificationUser" => $user_identification->getidentificationUser()
    ]);
    $user_id = $query->fetchAll(PDO::FETCH_ASSOC)[0];
    $user = new User($user_id);
    if ($user_id["title"] !== null) {
      $user->setBookLend(new Book($user_id));
    }
    return $user;
  }
}
