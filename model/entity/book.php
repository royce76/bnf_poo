<?php
// Classe représetant les livres stockés en base de données
class Book {

  protected int $id;
  protected int $isbn;
  protected string $title;
  protected string $author;
  protected string $publisher;
  protected string $publicationYear;
  protected int $pagesNumber;
  protected string $summary;
  protected int $quantity;
  protected string $bookType;
  protected string $bookNature;
  protected int $identificationBook;
  protected ?int $userId;

  public function setId(int $id):self {
    $this->id = $id;
    return $this;
  }

  public function getId() {
    return $this->id;
  }

  public function setIsbn(int $isbn):self {
    $this->isbn = $isbn;
    return $this;
  }

  public function getIsbn() {
    return $this->isbn;
  }

  public function setTitle(string $title):self {
    $this->title = $title;
    return $this;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setAuthor(string $author):self {
    $this->author = $author;
    return $this;
  }

  public function getAuthor() {
    return $this->author;
  }

  public function setPublisher(string $publisher):self {
    $this->publisher = $publisher;
    return $this;
  }

  public function getPublisher() {
    return $this->publisher;
  }

  public function setPublicationYear(string $publicationYear):self {
    $this->publicationYear = $publicationYear;
    return $this;
  }

  public function getPublicationYear() {
    return $this->publicationYear;
  }

  public function setPagesNumber(int $pagesNumber):self {
    $this->pagesNumber = $pagesNumber;
    return $this;
  }

  public function getPagesNumber() {
    return $this->pagesNumber;
  }

  public function setSummary(string $summary):self {
    $this->summary = $summary;
    return $this;
  }

  public function getSummary() {
    return $this->summary;
  }

  public function setQuantity(int $quantity):self {
    $this->quantity = $quantity;
    return $this;
  }

  public function getQuantity() {
    return $this->quantity;
  }

  public function setBookType(string $bookType):self {
    $this->bookType = $bookType;
    return $this;
  }

  public function getBookType() {
    return $this->bookType;
  }

  public function setBookNature(string $bookNature):self {
    $this->bookNature = $bookNature;
    return $this;
  }

  public function getBookNature() {
    return $this->bookNature;
  }

  public function setIdentificationBook(int $identificationBook):self {
    $this->identificationBook = $identificationBook;
    return $this;
  }

  public function getIdentificationBook() {
    return $this->identificationBook;
  }

  public function setUserId(int $userId = null):self {
    $this->userId = $userId;
    return $this;
  }

  public function getUserId() {
    return $this->userId;
  }


  public function hydrate(array $data) {
      foreach ($data as $key => $value) {
        $method = "set". ucfirst($key);
        if (method_exists($this,$method)) {
          $this->$method($value);
        }
      }
  }

  public function __construct(array $data = null) {
    if($data) {
      $this->hydrate($data);
    }
  }

}
