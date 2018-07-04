-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 04 Juillet 2018 à 15:36
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `BDD_VIP`
--
CREATE DATABASE IF NOT EXISTS `BDD_VIP` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `BDD_VIP`;

-- --------------------------------------------------------

--
-- Structure de la table `actionentreprise`
--

CREATE TABLE `actionentreprise` (
  `numAction` int(11) NOT NULL,
  `libelle` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `etat` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `dateRealisation` datetime DEFAULT NULL,
  `numEchange` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `echangevip`
--

CREATE TABLE `echangevip` (
  `numEchange` int(11) NOT NULL,
  `dateEchange` datetime DEFAULT NULL,
  `contenuEchange` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `numVIP` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `numFilm` int(11) NOT NULL,
  `typeFilm` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `titreFilm` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `duree` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `invitation`
--

CREATE TABLE `invitation` (
  `numVIP` int(11) NOT NULL,
  `numProjection` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `jury`
--

CREATE TABLE `jury` (
  `numJury` int(11) NOT NULL,
  `typeJury` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `numPresident` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `palmares`
--

CREATE TABLE `palmares` (
  `typePalmares` varchar(254) COLLATE utf8_bin NOT NULL,
  `numVIP` int(11) DEFAULT NULL,
  `numFilm` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `projection`
--

CREATE TABLE `projection` (
  `numProjection` int(11) NOT NULL,
  `numFilm` int(11) DEFAULT NULL,
  `numSalle` int(11) DEFAULT NULL,
  `numJury` int(11) DEFAULT NULL,
  `dateProjection` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `salle_festival`
--

CREATE TABLE `salle_festival` (
  `numSalle` int(11) NOT NULL,
  `nomSalle` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `nbPlaces` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `login` varchar(100) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `vip`
--

CREATE TABLE `vip` (
  `numVIP` int(11) NOT NULL,
  `nom` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `nationalite` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `photo` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `typeVIP` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `priorite` int(11) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `numCompagnon` int(11) DEFAULT NULL,
  `numJury` int(11) DEFAULT NULL,
  `numFilm` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `visionnagecompetition`
--

CREATE TABLE `visionnagecompetition` (
  `numJury` int(11) NOT NULL,
  `numProjection` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actionentreprise`
--
ALTER TABLE `actionentreprise`
  ADD PRIMARY KEY (`numAction`),
  ADD KEY `FK_ActionEntreprise_Echange` (`numEchange`);

--
-- Index pour la table `echangevip`
--
ALTER TABLE `echangevip`
  ADD PRIMARY KEY (`numEchange`),
  ADD KEY `FK_EchangeVip_VIP` (`numVIP`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`numFilm`);

--
-- Index pour la table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`numVIP`,`numProjection`),
  ADD KEY `FK_Invitation_Projection` (`numProjection`);

--
-- Index pour la table `jury`
--
ALTER TABLE `jury`
  ADD PRIMARY KEY (`numJury`),
  ADD KEY `FK_Jury_President` (`numPresident`);

--
-- Index pour la table `palmares`
--
ALTER TABLE `palmares`
  ADD PRIMARY KEY (`typePalmares`),
  ADD KEY `FK_Palmares_VIP` (`numVIP`),
  ADD KEY `FK_Palmares_Film` (`numFilm`);

--
-- Index pour la table `projection`
--
ALTER TABLE `projection`
  ADD PRIMARY KEY (`numProjection`),
  ADD KEY `FK_Projection_Film` (`numFilm`),
  ADD KEY `FK_Projection_Salle` (`numSalle`),
  ADD KEY `FK_Projection_Jury` (`numJury`);

--
-- Index pour la table `salle_festival`
--
ALTER TABLE `salle_festival`
  ADD PRIMARY KEY (`numSalle`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `vip`
--
ALTER TABLE `vip`
  ADD PRIMARY KEY (`numVIP`),
  ADD KEY `FK_VIP_Compagnon` (`numCompagnon`),
  ADD KEY `FK_VIP_Jury` (`numJury`),
  ADD KEY `FK_VIP_Film` (`numFilm`);

--
-- Index pour la table `visionnagecompetition`
--
ALTER TABLE `visionnagecompetition`
  ADD PRIMARY KEY (`numJury`,`numProjection`),
  ADD KEY `FK_VisionnageCompetition_Projection` (`numProjection`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actionentreprise`
--
ALTER TABLE `actionentreprise`
  MODIFY `numAction` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `echangevip`
--
ALTER TABLE `echangevip`
  MODIFY `numEchange` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `numFilm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `jury`
--
ALTER TABLE `jury`
  MODIFY `numJury` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `projection`
--
ALTER TABLE `projection`
  MODIFY `numProjection` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `salle_festival`
--
ALTER TABLE `salle_festival`
  MODIFY `numSalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `vip`
--
ALTER TABLE `vip`
  MODIFY `numVIP` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

insert into Utilisateurs (login, mdp) VALUES
("admin", "admin");
