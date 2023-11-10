-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--

-- Hôte : mysql-tp.svc.nhl.local
-- Généré le :  mar. 19 janv. 2021 à 11:25
-- Version du serveur :  8.0.22
-- Version de PHP :  7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- table user_status
CREATE TABLE user_status (
                             id int NOT NULL PRIMARY KEY,
                             libelle varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- table utilisateur
CREATE TABLE Utilisateur (
                             iduser int NOT NULL PRIMARY KEY,
                             username varchar(50) DEFAULT NULL,
                             email varchar(128) DEFAULT NULL,
                             passwd_hash varchar(256) DEFAULT NULL,
                             activation_token varchar(128) DEFAULT NULL,
                             activation_expires datetime NULL DEFAULT NULL,
                             renew_token varchar(128) DEFAULT NULL,
                             renew_expires datetime NULL DEFAULT NULL,
                             user_status int DEFAULT NULL,
                             FOREIGN KEY (user_status) REFERENCES user_status(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Table Touite
CREATE TABLE Touite
(
    IDTOUITE INT PRIMARY KEY,
    Contenu TEXT,
    Date_de_publication DATETIME,
    Utilisateur_ID INT,
    Image VARCHAR(255)
);

CREATE TABLE Touite_Tag (
    ID INT PRIMARY KEY,
    Touite_ID INT,
    Tag_ID INT,
    FOREIGN KEY (Touite_ID) REFERENCES Touite(IDTOUITE),
    FOREIGN KEY (Tag_ID) REFERENCES Tag(IDTAG)
);

-- Table Tag
CREATE TABLE Tag
(
    IDTAG INT PRIMARY KEY,
    Libellé VARCHAR(50),
    Description TEXT
);

-- Table Abonnement_Tag
CREATE TABLE Abonnement_Tag
(
    IDABNTAG INT PRIMARY KEY,
    Utilisateur_ID INT,
    Tag_ID INT
);

-- Table Suivi_Utilisateur
CREATE TABLE Suivi_Utilisateur
(
    IDSUIVIUSER INT PRIMARY KEY,
    Utilisateur_ID INT,
    Utilisateur_suivi_ID INT
);

-- Table Note_Touite
CREATE TABLE Note_Touite
(
    IDNOTE INT PRIMARY KEY,
    Touite_ID INT,
    Utilisateur_ID INT,
    Note INT
);

-- Contraintes de clés étrangères
ALTER TABLE Touite ADD FOREIGN KEY (Utilisateur_ID) REFERENCES Utilisateur(IDUSER);
ALTER TABLE Abonnement_Tag ADD FOREIGN KEY (Utilisateur_ID) REFERENCES Utilisateur(IDUSER);
ALTER TABLE Abonnement_Tag ADD FOREIGN KEY (Tag_ID) REFERENCES Tag(IDTAG);
ALTER TABLE Suivi_Utilisateur ADD FOREIGN KEY (Utilisateur_ID) REFERENCES Utilisateur(IDUSER);
ALTER TABLE Suivi_Utilisateur ADD FOREIGN KEY (Utilisateur_suivi_ID) REFERENCES Utilisateur(IDUSER);
ALTER TABLE Note_Touite ADD FOREIGN KEY (Touite_ID) REFERENCES Touite(IDTOUITE);
ALTER TABLE Note_Touite ADD FOREIGN KEY (Utilisateur_ID) REFERENCES Utilisateur(IDUSER);
