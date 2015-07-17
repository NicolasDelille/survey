-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Juillet 2015 à 09:45
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `survey`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(2) DEFAULT NULL,
  `first_name` varchar(10) DEFAULT NULL,
  `last_name` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `date_created` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `email`, `date_created`) VALUES
(1, 'Richard', 'Bernier', 'bernier.richard@roy.fr', '2014-07-19 13:00'),
(2, 'Yves', 'Royer', 'royer.yves@guerin.org', '2014-03-20 16:08'),
(3, 'Manon', 'Leclerc', 'leclerc.manon@ribeiro.fr', '2015-03-05 12:36'),
(4, 'Vincent', 'Laroche', 'laroche.vincent@legros.com', '2013-10-02 19:05'),
(5, 'Frédéric', 'Faivre', 'faivre.frederic@albert.fr', '2015-04-26 11:10'),
(6, 'Victoire', 'Boyer', 'victoire@lacroix.fr', '2014-03-21 10:50'),
(7, 'Éléonore', 'Roger', 'eleonore.roger@carlier.com', '2014-10-15 19:59'),
(8, 'Jeannine', 'Andre', 'jeannine.andre@normand.com', '2015-03-08 03:19'),
(9, 'Laure', 'Dupont', 'dupont.laure@delaunay.com', '2013-08-16 17:03'),
(10, 'Camille', 'Lombard', 'camille@bonnin.com', '2014-06-28 18:51'),
(11, 'Madeleine', 'Labbe', 'labbe.madeleine@gilbert.com', '2014-04-14 13:03'),
(12, 'Jean', 'Guillet', 'guillet.jean@duhamel.com', '2015-02-13 07:51'),
(13, 'Marcel', 'Meyer', 'meyer.marcel@pruvost.fr', '2014-12-13 15:39'),
(14, 'Bernadette', 'Henry', 'bernadette@morvan.fr', '2015-01-20 22:42'),
(15, 'Michelle', 'Lagarde', 'michelle@allard.com', '2013-08-18 19:36'),
(16, 'Alexandria', 'Grondin', 'alexandria@allard.fr', '2014-06-01 08:17'),
(17, 'Isabelle', 'Leduc', 'leduc.isabelle@guerin.fr', '2014-05-30 06:15'),
(18, 'Bernard', 'Caron', 'bernard@moulin.com', '2013-09-08 19:17'),
(19, 'Lucas', 'Menard', 'lucas@remy.com', '2014-10-06 04:37'),
(20, 'Élisabeth', 'Dupuis', 'elisabeth.dupuis@couturier.com', '2015-02-10 07:38'),
(21, 'Étienne', 'Huet', 'etienne.huet@traore.fr', '2014-04-06 16:57'),
(22, 'Aurélie', 'Ramos', 'aurelie.ramos@bigot.fr', '2014-02-10 11:08'),
(23, 'Sabine', 'Alexandre', 'sabine.alexandre@colin.net', '2014-10-24 18:27'),
(24, 'Sabine', 'Barthelemy', 'sabine.barthelemy@marchal.com', '2014-12-16 08:57'),
(25, 'Adrienne', 'Guillou', 'adrienne@boutin.fr', '2014-06-11 19:16'),
(26, 'Aurélie', 'Bousquet', 'bousquet.aurelie@monnier.fr', '2014-09-05 13:57'),
(27, 'Frédéric', 'Ribeiro', 'ribeiro.frederic@joly.org', '2014-06-21 05:55'),
(28, 'Stéphanie', 'Poirier', 'stephanie.poirier@lopes.net', '2015-01-27 15:53'),
(29, 'Honoré', 'Colin', 'honore.colin@marchal.net', '2013-12-03 07:36'),
(30, 'Théodore', 'Brunet', 'theodore@poulain.com', '2014-06-19 12:54'),
(31, 'Marthe', 'Blanchard', 'marthe@devaux.com', '2013-08-21 02:34'),
(32, 'Marianne', 'Rolland', 'marianne@barthelemy.com', '2015-03-05 00:02'),
(33, 'Susanne', 'Guillou', 'guillou.susanne@chauvet.fr', '2015-02-19 01:03'),
(34, 'Cécile', 'Lemonnier', 'lemonnier.cecile@bernier.com', '2015-05-16 00:26'),
(35, 'Claire', 'Guillet', 'claire.guillet@boucher.com', '2013-11-27 01:26'),
(36, 'Arthur', 'Guillon', 'arthur@chretien.fr', '2015-05-25 04:45'),
(37, 'Sébastien', 'Couturier', 'sebastien@valentin.net', '2013-12-22 16:46'),
(38, 'Sébastien', 'Moreau', 'moreau.sebastien@girard.fr', '2014-04-30 04:53'),
(39, 'Monique', 'Moreno', 'monique.moreno@michel.fr', '2014-09-08 04:30'),
(40, 'Frédérique', 'Hubert', 'frederique@deoliveira.com', '2015-04-24 14:11'),
(41, 'Geneviève', 'Salmon', 'geneviève@ledoux.com', '2015-02-17 13:00'),
(42, 'Maurice', 'Descamps', 'maurice.descamps@diaz.fr', '2015-06-15 18:09'),
(43, 'Zacharie', 'Leclerc', 'zacharie.leclerc@blanchard.net', '2015-06-26 13:27'),
(44, 'Franck', 'Antoine', 'franck.antoine@dufour.fr', '2015-04-20 10:17'),
(45, 'Astrid', 'Andre', 'andre.astrid@charpentier.org', '2015-05-27 06:31'),
(46, 'Charlotte', 'Klein', 'charlotte@delannoy.fr', '2015-02-08 00:07'),
(47, 'Adrien', 'Roy', 'adrien.roy@dias.com', '2013-08-28 06:56');

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(255) NOT NULL,
  `client_id` int(255) NOT NULL,
  `rating` tinyint(2) NOT NULL,
  `will_recommend` varchar(10) NOT NULL,
  `reactivity` tinyint(1) NOT NULL COMMENT '0 or 1(false or true)',
  `professionalism` tinyint(1) NOT NULL COMMENT '0 or 1(false or true)',
  `friendliness` tinyint(1) NOT NULL COMMENT '0 or 1(false or true)',
  `service_delivery_quality` tinyint(1) NOT NULL COMMENT '0 or 1(false or true)',
  `none` tinyint(1) NOT NULL COMMENT '0 or 1(false or true)',
  `comments` varchar(5000) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rating`
--

INSERT INTO `rating` (`id`, `client_id`, `rating`, `will_recommend`, `reactivity`, `professionalism`, `friendliness`, `service_delivery_quality`, `none`, `comments`, `date_created`) VALUES
(1, 2, 8, 'oui', 1, 0, 0, 1, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, quam, repellendus, magnam quas similique atque optio vitae blanditiis tempora molestiae ullam eius aliquid quia perspiciatis tenetur suscipit fuga odit illum?', '2015-07-16 17:10:05'),
(2, 10, 0, 'non', 0, 0, 0, 0, 1, 'Vous êtes nuls ! nuls !', '2015-07-16 17:10:45'),
(3, 20, 10, 'oui', 1, 1, 1, 1, 0, 'Parfait, rien à redire !', '2015-07-16 17:11:13'),
(4, 25, 6, 'maybe', 0, 0, 1, 1, 0, 'Peut mieux faire...', '2015-07-16 17:11:40'),
(5, 24, 8, 'oui', 1, 0, 0, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, quam, repellendus, magnam quas similique atque optio vitae blanditiis tempora molestiae ullam eius aliquid quia perspiciatis tenetur suscipit fuga odit illum?', '2015-07-16 17:12:47'),
(6, 1, 4, 'oui', 1, 1, 0, 0, 0, 'vklvhncklxwv', '2015-07-16 17:35:20');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
