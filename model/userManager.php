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
  public function getUser(User $user_identification) {
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
}
