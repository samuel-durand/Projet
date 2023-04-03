CREATE DATABASE utilisateurs;

USE utilisateurs;

CREATE TABLE utilisateurs (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);
