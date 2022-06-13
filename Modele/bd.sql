CREATE DATABASE IF NOT EXISTS Site_DJ;

CREATE TABLE MUSIQUE(
	idMusique		int auto_increment NOT NULL,
	titre			varchar(80),
	genre			int not null,

	PRIMARY KEY (idMusique)
)ENGINE = INNODB DEFAULT CHARSET=utf8;

CREATE TABLE GENRE(
	idGenre			int auto_increment NOT NULL,
	libelleG		varchar(25),

	PRIMARY KEY (idGenre)
)ENGINE = INNODB DEFAULT CHARSET=utf8;

CREATE TABLE ACTUALITE(
	idActu			int auto_increment NOT NULL,
	titreActu		varchar(25),
	texteActu		varchar(255),
	dateActu		date,

	PRIMARY KEY (idActu)
)ENGINE = INNODB DEFAULT CHARSET= utf8;

CREATE TABLE USERS(
  idUser 			int auto_increment NOT NULL,
  nom 				varchar(25) NOT NULL,
  prenom 			varchar(25) NOT NULL,
  login 			varchar(25) NOT NULL,
  mdp 				varchar(25) NOT NULL,
  droit 			int NOT NULL,

  PRIMARY KEY (idUser)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE COMMENTAIRE(
	idComment		int auto_increment NOT NULL,
	contenu			varchar(255),
	user 			int NOT null,

	PRIMARY KEY (idComment)
)ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE TYPEMEDIA(
	idTypeM			int auto_increment not null,
	libelleType 	varchar(5),

	PRIMARY KEY (idTypeM)
)ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE GALERIE(
	idMedia 		int auto_increment not null,
	nomMedia		varchar(25),
	typeMedia 		int not null,

	PRIMARY KEY (idMedia)

)ENGINE = InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE MUSIQUE ADD(
FOREIGN KEY (genre) references GENRE(idGenre));

ALTER TABLE COMMENTAIRE ADD(
FOREIGN KEY (user) references USERS(idUser));

ALTER TABLE GALERIE ADD(
FOREIGN KEY (typeMedia) references TYPEMEDIA(idTypeM));
#Enregistrer dans phpMyadmin jusqu'ici.

INSERT INTO USERS
VALUES (1, "Lyotard", "Laura", "ll27", "laura12", 1),
(2, "Labouro", "Loic", "loic28", "04mdploic", 1),
(3, "Nicolas", "Théo", "theoN", "nico21las", 1);









