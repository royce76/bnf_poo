<?php
// Classe représetant les livres stockés en base de données
class Book {
  //les identités sont en string pour mettre des 0
  protected int $id;
  protected string $isbn;
  protected string $title;
  protected string $author;
  protected string $publisher;
  protected int $publicationYear;
  protected int $pagesNumber;
  protected string $summary;
  protected int $quantity;
  protected string $bookType;
  protected string $bookNature;
  protected string $identificationBook;
  protected ?User $userLend = null;
  protected ?string $userId;

  public function setId(int $id):self {
    $this->id = $id;
    return $this;
  }

  public function getId() {
    return $this->id;
  }

  public function setUserLend(User $userLend = null):Book {
    $this->userLend = $userLend;
    return $this;
  }

  public function getUserLend() {
    return $this->userLend;
  }

  public function setIsbn(string $isbn):self {
    if (preg_match("/^[0-9]{13}$/",$isbn)) {
      $this->isbn = $isbn;
      return $this;
    }
    throw new Exception("L'isbn contient 13 chiffres exactement");
  }

  public function getIsbn() {
    return $this->isbn;
  }

  public function setTitle(string $title):self {
    if (preg_match("/^[0-9a-zA-Z-'&@#_^éèàç()ù°\".+* ]{2,100}$/",$title)) {
      $this->title = $title;
      return $this;
    }
    throw new Exception("Titre entre 2 et 100 caractères");
  }

  public function getTitle() {
    return $this->title;
  }

  public function setAuthor(string $author):self {
    if (preg_match("/^[0-9a-zA-Z-'&_^éèàçù ]{2,100}$/",$author)) {
      $this->author = $author;
      return $this;
    }
    throw new Exception("Auteur entre 2 et 100 caractères");
  }

  public function getAuthor() {
    return $this->author;
  }

  public function setPublisher(string $publisher):self {
    if (preg_match("/^[0-9a-zA-Z-'^&éèàçù ]{2,100}$/",$publisher)) {
      $this->publisher = $publisher;
      return $this;
    }
    throw new Exception("Nom de l'éditeur entre 2 et 100 caractères");
  }

  public function getPublisher() {
    return $this->publisher;
  }

  public function setPublicationYear(int $publicationYear):self {
    if (preg_match("/^[0-9]{4}$/",strval($publicationYear))) {
      $this->publicationYear = $publicationYear;
      return $this;
    }
    throw new Exception("Année non conforme");
  }

  public function getPublicationYear() {
    return $this->publicationYear;
  }

  public function setPagesNumber(int $pagesNumber):self {
    if (preg_match("/^[0-9]{1,4}$/",strval($pagesNumber))) {
      $this->pagesNumber = $pagesNumber;
      return $this;
    }
    throw new Exception("Nombre de pages non conformes");
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
    if (preg_match("/^[0-9]{1,2}$/",strval($quantity))) {
      $this->quantity = $quantity;
      return $this;
    }
    throw new Exception("Quantitée hors norme.");
  }

  public function getQuantity() {
    return $this->quantity;
  }

  public function setBookType(string $bookType):self {
    if (preg_match("/^[0-9a-zA-Z-'^éèàçù ]{2,50}$/",$bookType)) {
      $this->bookType = $bookType;
      return $this;
    }
    throw new Exception("Type du livre entre 2 et 50 caractères");
  }

  public function getBookType() {
    return $this->bookType;
  }

  public function setBookNature(string $bookNature):self {
    if (preg_match("/^[0-9a-zA-Z-'^éèàçù ]{2,50}$/",$bookNature)) {
      $this->bookNature = $bookNature;
      return $this;
    }
    throw new Exception("Nature du livre entre 2 et 50 caractères");
  }

  public function getBookNature() {
    return $this->bookNature;
  }

  public function setIdentificationBook(string $identificationBook):self {
    if (preg_match("/^[0-9]{10}$/",$identificationBook)) {
      $this->identificationBook = $identificationBook;
      return $this;
    }
    throw new Exception("Identité du livre : 10 chiffres exactements");
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


  private function hydrate(array $data) {
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
