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
  public function updateBookStatus() {

  }

}
