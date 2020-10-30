<?php
// Classe pour se connecter à la base de données
// Son usage n'est pas obligatoire, vous pouvez faire sans

abstract class DataBase {
  //Identification connection to the database
  const HOST = "localhost";
  const DBNAME = "bnf";
  const USER = "root";
  const PASSWORD = "root";

  //call the database
  static public function getConnection() {
    try {
      $db = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DBNAME, self::USER, self::PASSWORD);
      return $db;
    } catch (\Exception $e) {
      echo "Connexion à la base de données raté " . $e->getMessage() . "<br/>";
      die();
    }
  }

}
