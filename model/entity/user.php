<?php
// Classe représetant les utilisateurs stockés en base de données
class User {

  const SEX = [h, f];

  protected int $id;
  protected string $lastname;
  protected string $firstname;
  protected string $email;
  protected string $city;
  protected int $cityCode;
  protected string $adress;
  protected string $sex;
  protected string $birthDate;
  protected int $identification;

  public function setId(int $id):self {
    $this->id = $id;
    return $this;
  }

  public function getId() {
    return $this->id;
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

  public function setCityCode(string $cityCode):self {
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

  public function setIdentification(string $identification):self {
    $this->identification = $identification;
    return $this;
  }

  public function getIdentification() {
    return $this->identification;
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
