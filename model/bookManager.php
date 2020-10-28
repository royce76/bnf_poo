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
      "SELECT id, isbn, title, author, publisher, bookType, identificationBook, userId FROM Book"
    );
    $title_book = $query->fetchAll(PDO::FETCH_CLASS, "Book");
    return $title_book;
  }

  // Récupère un livre
  public function getBookByGetId() {
    $query = $this->getDb()->prepare(
      "SELECT *
      FROM Book
      WHERE id = :id"
    );
    $result = $query->execute([
      "id" => $_GET["id"]
    ]);
    $book = $query->fetchAll(PDO::FETCH_CLASS, "Book")[0];
    return $book;
  }

  public function deleteBook() {
    $query = $this->getDb()->prepare(
      "DELETE FROM book
      WHERE id = :id"
    );
    $result = $query->execute([
      "id" => $_GET["id"]
    ]);
    return $result;
  }

  // Ajoute un nouveau livre
  public function addBook(Book $book):bool {
    $query = $this->getDb()->prepare(
      "INSERT INTO Book(isbn, title, author, publisher, publicationYear, pagesNumber, summary, quantity, bookType, bookNature, identificationBook, userId)
      VALUES
      (:isbn, :title, :author, :publisher, :publicationYear, :pagesNumber, :summary, :quantity, :bookType, :bookNature, :identificationBook, null)"
    );
    $result = $query->execute([
      "isbn" => $book->getIsbn(),
      "title" => $book->getTitle(),
      "author" => $book->getAuthor(),
      "publisher" => $book->getPublisher() ,
      "publicationYear" => $book->getPublicationYear(),
      "pagesNumber" => $book->getPagesNumber(),
      "summary" => $book->getSummary(),
      "quantity" => $book->getQuantity(),
      "bookType" => $book->getBookType(),
      "bookNature" => $book->getBookNature(),
      "identificationBook" => $book->getIdentificationBook()
    ]);
    return $result;
  }

  // Met à jour le statut d'un livre emprunté
  public function updateBookStatus(User $user):bool {
    $query = $this->getDb()->prepare(
      "UPDATE book
      SET userId = :userId
      WHERE id = :id"
    );
    $result = $query->execute([
      "id" => $_GET["id"],
      "userId" => $user->getId()
    ]);
    return $result;
  }

  // Met à jour le statut d'un livre rendu
  public function updateBookStatusBack():bool {
    $query = $this->getDb()->prepare(
      "UPDATE book
      SET userId = null
      WHERE id = :id"
    );
    $result = $query->execute([
      "id" => $_GET["id"]
    ]);
    return $result;
  }

  //On récupère sur index.php un livre en rentrant son identifiant
  public function getBookUser(User $user) {
    $query = $this->getDb()->prepare(
      "SELECT lastname, identificationUser, b.userId, b.title, b.identificationBook, b.author
      FROM User AS u
      RIGHT JOIN Book AS b
      ON b.userId = :idUser"
    );
    $result = $query->execute([
      "idUser" => $user->getId()
    ]);
    $user_book = $query->fetchAll(PDO::FETCH_CLASS, "Book")[0];
    return $user_book;
  }

}
