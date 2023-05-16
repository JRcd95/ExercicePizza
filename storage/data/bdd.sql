-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 16 mai 2023 à 08:18
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pizza`
--

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `name`, `price`) VALUES
(1, 'tomates', 0.5),
(2, 'champignons', 0.5),
(3, 'feta', 0.5),
(4, 'saucisses', 0.5),
(5, 'mozarella', 0.5),
(6, 'oignons ', 0.5),
(7, 'origan', 1),
(8, 'basilic', 1),
(9, 'jambon', 1.5),
(10, 'oeuf', 1.5);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient_pizza`
--

DROP TABLE IF EXISTS `ingredient_pizza`;
CREATE TABLE IF NOT EXISTS `ingredient_pizza` (
  `id_ingredient` int NOT NULL,
  `id_pizza` int NOT NULL,
  KEY `id_ingredient` (`id_ingredient`),
  KEY `id_pizza` (`id_pizza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `ingredient_pizza`
--

INSERT INTO `ingredient_pizza` (`id_ingredient`, `id_pizza`) VALUES
(2, 1),
(1, 1),
(3, 1),
(4, 1),
(6, 1),
(5, 1),
(7, 1),
(1, 2),
(5, 2),
(8, 2),
(1, 3),
(5, 3),
(9, 3),
(2, 3),
(9, 4),
(2, 4),
(10, 4),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

DROP TABLE IF EXISTS `pizza`;
CREATE TABLE IF NOT EXISTS `pizza` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `price`) VALUES
(1, 'SuperPizza', 7.5),
(2, 'Margherita', 3),
(3, 'Reine', 4.5),
(4, 'Calzone', 5.25);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ingredient_pizza`
--
ALTER TABLE `ingredient_pizza`
  ADD CONSTRAINT `ingredient_pizza_ibfk_1` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredient` (`id`),
  ADD CONSTRAINT `ingredient_pizza_ibfk_2` FOREIGN KEY (`id_pizza`) REFERENCES `pizza` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
