<?php
// Classe représetant les utilisateurs stockés en base de données
class User {

  const SEX = ["h", "f"];

  protected int $id;
  protected ?Book $bookLend = null;
  protected string $lastname;
  protected string $firstname;
  protected string $email;
  protected string $city;
  protected int $cityCode;
  protected string $adress;
  protected string $sex;
  protected string $birthDate;
  protected string $borrowingDate;
  protected string $identificationUser;

  public function setId(int $id):self {
    $this->id = $id;
    return $this;
  }

  public function getId() {
    return $this->id;
  }

  public function setBookLend(Book $bookLend = null):self {
    $this->bookLend = $bookLend;
    return $this;
  }

  public function getBookLend() {
    return $this->bookLend;
  }

  public function setLastname(string $lastname):self {
    $this->lastname = $lastname;
    return $this;
  }

  public function getLastname() {
    return $this->lastname;
  }

  public function setFirstname(string $firstname):self {
    $this->firstname = $firstname;
    return $this;
  }

  public function getFirstname() {
    return $this->firstname;
  }

  public function setEmail(string $email):self {
    $this->email = $email;
    return $this;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setCity(string $city):self {
    $this->city = $city;
    return $this;
  }

  public function getCity() {
    return $this->city;
  }

  public function setCityCode(int $cityCode):self {
    $this->cityCode = $cityCode;
    return $this;
  }

  public function getCityCode() {
    return $this->cityCode;
  }

  public function setAdress(string $adress):self {
    $this->adress = $adress;
    return $this;
  }

  public function getAdress() {
    return $this->adress;
  }

  public function setSex(string $sex):self {
    if (in_array($sex, self::SEX)) {
      $this->sex = $sex;
    }
    return $this;
  }

  public function getSex() {
    return $this->sex;
  }

  public function setBirthDate(string $birthDate):self {
    $this->birthDate = $birthDate;
    return $this;
  }

  public function getBirthDate() {
    return $this->birthDate;
  }

  public function setBorrowingDate(string $borrowingDate):self {
    $this->borrowingDate = $borrowingDate;
    return $this;
  }

  public function getBorrowingDate() {
    return $this->borrowingDate;
  }

  public function setIdentificationUser(string $identificationUser):self {
    if (preg_match("/^[0-9]{9}$/",$identificationUser)) {
      $this->identificationUser = $identificationUser;
      return $this;
    }
    throw new Exception("<li>Identification de 9 chiffres exactements</li>");
  }

  public function getIdentificationUser() {
    return $this->identificationUser;
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
