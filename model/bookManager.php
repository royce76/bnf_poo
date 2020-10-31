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
  public function getBooks():?array {
    $query = $this->getDb()->query(
      "SELECT id, isbn, title, author, publisher, bookType, identificationBook, userId FROM Book"
    );
    $title_book = $query->fetchAll(PDO::FETCH_CLASS, "Book");
    return $title_book;
  }

  // Récupère un livre avec son éventuelle emprunteur
  public function getBookByGetId():Book {
    $query = $this->getDb()->prepare(
      "SELECT lastname, identificationUser, b.*
      FROM User AS u
      RIGHT JOIN Book AS b
      ON u.id = b.userId
      WHERE b.id = :id"
    );
    $result = $query->execute([
      "id" => $_GET["id"]
    ]);
    $book_id = $query->fetchAll(PDO::FETCH_ASSOC)[0];
    $book = new Book($book_id);
    if ($book_id["lastname"] !== null) {
      $book->setUserLend(new user($book_id));
    }
    return $book;
  }

  public function deleteBook():bool {
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
    try {
      $this->getDb()->beginTransaction();
      $query = $this->getDb()->prepare(
        "INSER INTO Book(isbn, title, author, publisher, publicationYear, pagesNumber, summary, quantity, bookType, bookNature, identificationBook, userId)
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
      $this->getDb()->commit();
      return $result;
    } catch (\Exception $e) {
      $this->getDb()->rollBack();
    }
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

}
