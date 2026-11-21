CREATE DATABASE tp7_crud;

USE tp7_crud;

CREATE TABLE formation (
    id_formation INT AUTO_INCREMENT PRIMARY KEY,
    intitule VARCHAR(100) NOT NULL,
    duree_heures INT NOT NULL,
    niveau VARCHAR(50) NOT NULL
);

CREATE TABLE etudiant (
    id_etudiant INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    date_naissance DATE NOT NULL,
    id_formation INT NOT NULL,

    FOREIGN KEY (id_formation)
        REFERENCES formation(id_formation)
);

CREATE TABLE module (
    id_module INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    nb_heures INT NOT NULL,
    id_formation INT NOT NULL,

    FOREIGN KEY (id_formation)
        REFERENCES formation(id_formation)
);