DROP DATABASE IF EXISTS bnf;
CREATE DATABASE bnf CHARACTER SET 'utf8';
USE bnf;

CREATE TABLE User(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  lastname VARCHAR(50) NOT NULL,
  firstname VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  city VARCHAR(30) NOT NULL,
  cityCode CHAR(5) NOT NULL,
  adress VARCHAR(50) NOT NULL,
  sex CHAR(1) NOT NULL,
  birthDate DATE NOT NULL,
  borrowingDate DATE NOT NULL,
  identificationUser CHAR(9) NOT NULL UNIQUE,
  PRIMARY KEY (id)
)
ENGINE=InnoDB;

INSERT INTO User(lastname, firstname, email, city, cityCode, adress, sex, birthDate, borrowingDate, identificationUser)
VALUES
("George", "Royce", "royce@hotmail.com", "Oissel", "76350", "16 rue pierre Sémard", "h", "1986-09-19", "2020-10-26", "123456789"),
("Clara", "Morgane", "clara@gmail.com", "Alfortville", "94140", "2 rue de Lisbonne", "f", "1998-08-17", "2020-09-30", "987654321");

CREATE TABLE Book(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  isbn CHAR(13) NOT NULL,
  title VARCHAR(100) NOT NULL,
  author VARCHAR(100) NOT NULL,
  publisher VARCHAR(100) NOT NULL,
  publicationYear YEAR NOT NULL,
  pagesNumber VARCHAR(4) NOT NULL,
  summary TEXT NOT NULL,
  quantity VARCHAR(2) NOT NULL,
  bookType VARCHAR(50) NOT NULL,
  bookNature VARCHAR(50) NOT NULL,
  identificationBook CHAR(10) NOT NULL UNIQUE,
  userId INT UNSIGNED,
  PRIMARY KEY (id),
  FOREIGN KEY (userId) REFERENCES User(id)
)
ENGINE=InnoDB;

INSERT INTO Book(isbn, title, author, publisher, publicationYear, pagesNumber, summary, quantity, bookType, bookNature, identificationBook, userId)
VALUES
("9782266259453", "Elle&lui", "Marc Levy", "Pocket", "2015", "373", "Elle est actrice. Lui est écrivain", "4", "Roman", "Romance", "0123456789", 2),
("9782266243261", "BEAUTIFUL BASTARD", "Christina Lauren", "Pocket", "2013", "328", "Brillante et déterminée,Chloé n'a qu'un problème dans la vie...", "2", "Roman", "Erotique", "9876543210", 1);
