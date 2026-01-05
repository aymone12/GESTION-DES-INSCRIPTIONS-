/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  04/01/2026                               */
/*==============================================================*/

/*==================== CREATE DATABASE =========================*/
CREATE DATABASE IF NOT EXISTS db_cours_inscription;
USE db_cours_inscription;

/*==================== DROP TABLES =============================*/
DROP TABLE IF EXISTS Inscription;
DROP TABLE IF EXISTS Cours;
DROP TABLE IF EXISTS Etudiant;
DROP TABLE IF EXISTS Professeur;

/*==============================================================*/
/* Table : Professeur                                           */
/*==============================================================*/
CREATE TABLE Professeur
(
   idProf        INT NOT NULL AUTO_INCREMENT COMMENT '',
   matricule     VARCHAR(50) COMMENT '',
   nom           VARCHAR(100) COMMENT '',
   prenom        VARCHAR(100) COMMENT '',
   email         VARCHAR(100) COMMENT '',
   telephone     VARCHAR(50) COMMENT '',
   specialite    VARCHAR(100) COMMENT '',
   PRIMARY KEY (idProf)
);

/*==============================================================*/
/* Table : Cours                                                */
/*==============================================================*/
CREATE TABLE Cours
(
   idCours       INT NOT NULL AUTO_INCREMENT COMMENT '',
   idProf        INT COMMENT '',
   code          VARCHAR(50) COMMENT '',
   intitule      VARCHAR(100) COMMENT '',
   description   TEXT COMMENT '',
   dureeHeures   INT COMMENT '',
   prix          DECIMAL(10,2) COMMENT '',
   PRIMARY KEY (idCours)
);

/*==============================================================*/
/* Table : Etudiant                                             */
/*==============================================================*/
CREATE TABLE Etudiant
(
   id              INT NOT NULL AUTO_INCREMENT COMMENT '',
   cne             VARCHAR(50) COMMENT '',
   nom             VARCHAR(50) COMMENT '',
   prenom          VARCHAR(50) COMMENT '',
   email           VARCHAR(100) COMMENT '',
   telephone       VARCHAR(50) COMMENT '',
   dateInscription DATE COMMENT '',
   PRIMARY KEY (id)
);

/*==============================================================*/
/* Table : Inscription                                          */
/*==============================================================*/
CREATE TABLE Inscription
(
   idInscription   INT NOT NULL AUTO_INCREMENT COMMENT '',
   idEtudiant      INT NOT NULL COMMENT '',
   idCours         INT NOT NULL COMMENT '',
   dateInscription DATE COMMENT '',
   statut          VARCHAR(100) COMMENT '',
   note            DECIMAL(5,2) COMMENT '',
   PRIMARY KEY (idInscription)
);

/*==================== FOREIGN KEYS =============================*/

ALTER TABLE Cours
   ADD CONSTRAINT FK_COURS_PROFESSEUR
   FOREIGN KEY (idProf)
   REFERENCES Professeur (idProf)
   ON DELETE RESTRICT
   ON UPDATE RESTRICT;

ALTER TABLE Inscription
   ADD CONSTRAINT FK_INSCRIPTION_ETUDIANT
   FOREIGN KEY (idEtudiant)
   REFERENCES Etudiant (id)
   ON DELETE RESTRICT
   ON UPDATE RESTRICT;

ALTER TABLE Inscription
   ADD CONSTRAINT FK_INSCRIPTION_COURS
   FOREIGN KEY (idCours)
   REFERENCES Cours (idCours)
   ON DELETE RESTRICT
   ON UPDATE RESTRICT;
