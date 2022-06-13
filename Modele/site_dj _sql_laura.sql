-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 05 Mai 2019 à 15:56
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_dj`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `idActu` int(11) NOT NULL,
  `titreActu` varchar(25) DEFAULT NULL,
  `texteActu` varchar(255) DEFAULT NULL,
  `dateActu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`idActu`, `titreActu`, `texteActu`, `dateActu`) VALUES
(3, 'Testmodif', 'MonActu', '2019-05-05'),
(4, 'la tete toto', 'Le margoulin', '2019-05-05');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idComment` int(11) NOT NULL,
  `contenu` varchar(255) DEFAULT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`idComment`, `contenu`, `idUser`) VALUES
(1, 'ghgfhf', 1),
(2, 'commentaire de Laura', 1),
(3, 'gfhgf', 1),
(4, 'ghfgh', 1),
(5, 'fgfdgfdg', 1),
(6, 'fgdfgfdgd', 1),
(7, 'hhfhfgh', 1),
(8, 'hgjhgjghj', 1),
(9, 'fgfdfgdfgdfgdfg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `idMedia` int(11) NOT NULL,
  `nomMedia` varchar(255) DEFAULT NULL,
  `typeMedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `idGenre` int(11) NOT NULL,
  `libelleG` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE `musique` (
  `idMusique` int(11) NOT NULL,
  `titre` varchar(80) DEFAULT NULL,
  `genre` int(11) NOT NULL,
  `lien`  text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typemedia`
--

CREATE TABLE `typemedia` (
  `idTypeM` int(11) NOT NULL,
  `libelleType` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `login` varchar(25) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `droit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `nom`, `prenom`, `login`, `mdp`, `droit`) VALUES
(1, 'Lyotard', 'Laura', 'll27', '2c7964fd4050402530c3e5dae4e17a25d945bc74', 1),
(2, 'Labouro', 'Loic', 'loic28', 'ba40ebf302fcb6eb7187610b593bc17ee956a832', 1),
(3, 'Nicolas', 'Théo', 'theoN', '898582fc684747ea7c16d9633782fa26ee71fcb5', 1);

--
--Contenu de la table `galerie`
-- 
INSERT INTO `galerie` (`idMedia`, `nomMedia`, `typeMedia`) VALUES
(5, 'fichier_du_20190506144210.jpg', 1),
(7, 'fichier_du_20190506134515.jpg', 1),
(8, 'fichier_du_20190506210837.jpg', 1),
(9, 'fichier_du_20190506210959.png', 1);

--
-- Contenu de la table `type media`
--
INSERT INTO `typemedia` (`idTypeM`, `libelleType`) VALUES
(1, 'img');

--
-- Contenu de la table `genre`
--
INSERT INTO `genre`
VALUES(NULL, "Trance"),
(NULL, "Raggatek"),
(NULL, "Frenchcore"),
(NULL, "Hardstyle"),
(NULL, "Electro");

--
-- Contenu de la table `musique`
--
INSERT INTO `musique`
VALUES(1, "Electro-Trance 2018", 1, "Vue/video/electro_trance_2018.mp4"),
(2, "Mix Trance 1", 1, "Vue/video/Mix_trance.mp4");
--
-- Index pour les tables exportées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`idActu`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `user` (`idUser`);

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`idMedia`),
  ADD KEY `typeMedia` (`typeMedia`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`);

--
-- Index pour la table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`idMusique`),
  ADD KEY `genre` (`genre`);

--
-- Index pour la table `typemedia`
--
ALTER TABLE `typemedia`
  ADD PRIMARY KEY (`idTypeM`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `idActu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `idMedia` int(11) NOT NULL AUTO_INCREMENT,  AUTO_INCREMENT=10;;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `idGenre` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `musique`
--
ALTER TABLE `musique`
  MODIFY `idMusique` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `typemedia`
--
ALTER TABLE `typemedia`
  MODIFY `idTypeM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD CONSTRAINT `galerie_ibfk_1` FOREIGN KEY (`typeMedia`) REFERENCES `typemedia` (`idTypeM`);

--
-- Contraintes pour la table `musique`
--
ALTER TABLE `musique`
  ADD CONSTRAINT `musique_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genre` (`idGenre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
