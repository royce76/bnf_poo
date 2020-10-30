<?php
// Classe représetant les livres stockés en base de données
class Book {

  protected int $id;
  protected int $isbn;
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
  protected ?int $userId;

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

  public function setIsbn(int $isbn):self {
    if (intval(preg_match("/^[0-9]{13}$/",$isbn))) {
      $this->isbn = $isbn;
      return $this;
    }
    throw new Exception("<li>L'isbn contient 13 chiffres exactement</li>");
  }

  public function getIsbn() {
    return $this->isbn;
  }

  public function setTitle(string $title):self {
    if (preg_match("/^[0-9a-zA-Z-'&@#_éèàç()ù°\/\".+* ]{2,100}$/",$title)) {
      $this->title = $title;
      return $this;
    }
    throw new Exception("<li>Titre entre 2 et 100 caractères</li>");
  }

  public function getTitle() {
    return $this->title;
  }

  public function setAuthor(string $author):self {
    if (preg_match("/^[0-9a-zA-Z-'&@#_éèàç()ù°\/\".+* ]{2,100}$/",$author)) {
      $this->author = $author;
      return $this;
    }
    throw new Exception("<li>Auteur entre 2 et 100 caractères</li>");
  }

  public function getAuthor() {
    return $this->author;
  }

  public function setPublisher(string $publisher):self {
    if (preg_match("/^[0-9a-zA-Z-'&@#_éèàç()ù°\/\".+* ]{2,100}$/",$publisher)) {
      $this->publisher = $publisher;
      return $this;
    }
    throw new Exception("<li>Editeur entre 2 et 100 caractères</li>");
  }

  public function getPublisher() {
    return $this->publisher;
  }

  public function setPublicationYear(int $publicationYear):self {
    if (intval(preg_match("/^[0-9]{4}$/",$publicationYear))) {
      $this->publicationYear = $publicationYear;
      return $this;
    }
    throw new Exception("<li>Année non conforme</li>");
  }

  public function getPublicationYear() {
    return $this->publicationYear;
  }

  public function setPagesNumber(int $pagesNumber):self {
    if (intval(preg_match("/^[0-9]{1,4}$/",$pagesNumber))) {
      $this->pagesNumber = $pagesNumber;
      return $this;
    }
    throw new Exception("<li>Nombre de page non conforme</li>");
  }

  public function getPagesNumber() {
    return $this->pagesNumber;
  }

  public function setSummary(string $summary):self {
    if (preg_match("/^[0-9a-zA-Z-'&@#_éèàç()ù°\/\".+* ]{2,500}$/",$summary)) {
      $this->summary = $summary;
      return $this;
    }
    throw new Exception("<li>Résumé entre 2 et 500 caractères.</li>");
  }

  public function getSummary() {
    return $this->summary;
  }

  public function setQuantity(int $quantity):self {
    if (intval(preg_match("/^[0-9]{1,2}$/",$quantity))) {
      $this->quantity = $quantity;
      return $this;
    }
    throw new Exception("<li>Quantité hors norme.</li>");
  }

  public function getQuantity() {
    return $this->quantity;
  }

  public function setBookType(string $bookType):self {
    if (preg_match("/^[0-9a-zA-Z-'&@#_éèàç()ù°\/\".+* ]{2,50}$/",$bookType)) {
      $this->bookType = $bookType;
      return $this;
    }
    throw new Exception("<li>Type entre 2 et 50 caractères</li>");
  }

  public function getBookType() {
    return $this->bookType;
  }

  public function setBookNature(string $bookNature):self {
    if (preg_match("/^[0-9a-zA-Z-'&@#_éèàç()ù°\/\".+* ]{2,50}$/",$bookNature)) {
      $this->bookNature = $bookNature;
      return $this;
    }
    throw new Exception("<li>Nature entre 2 et 50 caractères</li>");
  }

  public function getBookNature() {
    return $this->bookNature;
  }

  public function setIdentificationBook(string $identificationBook):self {
    if (preg_match("/^[0-9]{10}$/",$identificationBook)) {
      $this->identificationBook = $identificationBook;
      return $this;
    }
    throw new Exception("<li>Identité du livre 10 chiffres exactements</li>");
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
