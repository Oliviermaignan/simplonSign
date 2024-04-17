-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 17 avr. 2024 à 13:39
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `simplonsign`
--

-- --------------------------------------------------------

--
-- Structure de la table `b6_authentication`
--

DROP TABLE IF EXISTS `b6_authentication`;
CREATE TABLE IF NOT EXISTS `b6_authentication` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `b6_authentication`
--

INSERT INTO `b6_authentication` (`id`, `status`) VALUES
(0, 'absent'),
(1, 'present'),
(2, 'retard');

-- --------------------------------------------------------

--
-- Structure de la table `b6_classes`
--

DROP TABLE IF EXISTS `b6_classes`;
CREATE TABLE IF NOT EXISTS `b6_classes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `promo_id` int NOT NULL,
  `code` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `promo_id` (`promo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `b6_classes`
--

INSERT INTO `b6_classes` (`id`, `name`, `startTime`, `endTime`, `promo_id`, `code`) VALUES
(33, 'PM', '2024-04-11 13:00:00', '2024-04-11 17:00:00', 1, NULL),
(34, 'AM', '2024-04-12 09:00:00', '2024-04-12 12:00:00', 1, NULL),
(35, 'AM', '2024-04-11 09:00:00', '2024-04-11 12:00:00', 1, NULL),
(36, 'PM', '2024-04-12 13:00:00', '2024-04-12 23:00:00', 1, 98302),
(38, 'AM', '2024-04-15 09:00:00', '2024-04-15 12:00:00', 1, 13920),
(39, 'PM', '2024-04-15 13:00:00', '2024-04-15 17:00:00', 1, 10475),
(40, 'AM', '2024-04-16 09:00:00', '2024-04-16 12:00:00', 1, 51129),
(41, 'PM', '2024-04-16 13:00:00', '2024-04-16 23:00:00', 1, 53587),
(42, 'AM', '2024-04-17 09:00:00', '2024-04-17 12:00:00', 1, 92157),
(43, 'PM', '2024-04-17 13:00:00', '2024-04-17 17:00:00', 1, 57839),
(44, 'AM', '2024-04-18 09:00:00', '2024-04-18 12:00:00', 1, 0),
(45, 'PM', '2024-04-18 13:00:00', '2024-04-18 17:00:00', 1, 0),
(46, 'AM', '2024-04-22 09:00:00', '2024-04-22 12:00:00', 1, 0),
(47, 'PM', '2024-04-22 13:00:00', '2024-04-22 17:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `b6_promo`
--

DROP TABLE IF EXISTS `b6_promo`;
CREATE TABLE IF NOT EXISTS `b6_promo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `b6_promo`
--

INSERT INTO `b6_promo` (`id`, `name`) VALUES
(1, 'premierepromo'),
(2, 'deuxiemepromo');

-- --------------------------------------------------------

--
-- Structure de la table `b6_relation_users_classes`
--

DROP TABLE IF EXISTS `b6_relation_users_classes`;
CREATE TABLE IF NOT EXISTS `b6_relation_users_classes` (
  `user_id` int NOT NULL,
  `authentication_id` int NOT NULL DEFAULT '0',
  `classes_id` int NOT NULL,
  `dateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`authentication_id`,`classes_id`),
  KEY `authentication_id` (`authentication_id`),
  KEY `classes_id` (`classes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `b6_relation_users_classes`
--

INSERT INTO `b6_relation_users_classes` (`user_id`, `authentication_id`, `classes_id`, `dateTime`) VALUES
(1, 0, 39, '2024-04-15 16:23:21'),
(1, 0, 41, '2024-04-16 16:23:21'),
(1, 1, 42, '2024-04-17 09:15:41'),
(1, 2, 43, '2024-04-17 13:04:24'),
(3, 0, 41, '2024-04-16 16:23:21'),
(3, 0, 42, '2024-04-17 09:15:41'),
(3, 0, 43, '2024-04-17 13:04:24');

-- --------------------------------------------------------

--
-- Structure de la table `b6_relation_users_promo`
--

DROP TABLE IF EXISTS `b6_relation_users_promo`;
CREATE TABLE IF NOT EXISTS `b6_relation_users_promo` (
  `users_id` int NOT NULL,
  `promo_id` int NOT NULL,
  PRIMARY KEY (`users_id`,`promo_id`),
  KEY `promo_id` (`promo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `b6_relation_users_promo`
--

INSERT INTO `b6_relation_users_promo` (`users_id`, `promo_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `b6_role`
--

DROP TABLE IF EXISTS `b6_role`;
CREATE TABLE IF NOT EXISTS `b6_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `b6_role`
--

INSERT INTO `b6_role` (`id`, `type`) VALUES
(1, 'student'),
(2, 'teacher');

-- --------------------------------------------------------

--
-- Structure de la table `b6_users`
--

DROP TABLE IF EXISTS `b6_users`;
CREATE TABLE IF NOT EXISTS `b6_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `activated` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `promo_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `promo_id` (`promo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `b6_users`
--

INSERT INTO `b6_users` (`id`, `name`, `last_name`, `email`, `activated`, `password`, `role_id`, `promo_id`) VALUES
(1, 'olivier', 'maignan', 'ol.maignan@gmail.com', 1, '$2y$10$bD7uhfSo3tchaKGNEuAUaurrTp3eQRgPhzCfRQVmKGqOI/sE1IYOC', '1', 1),
(2, 'Kevin', 'Wolff', 'kev.wolff@gmail.com', 1, '$2y$10$bD7uhfSo3tchaKGNEuAUaurrTp3eQRgPhzCfRQVmKGqOI/sE1IYOC', '2', 1),
(3, 'jean', 'dujardin', 'j.dujardin@gmail.com', 1, '$2y$10$bD7uhfSo3tchaKGNEuAUaurrTp3eQRgPhzCfRQVmKGqOI/sE1IYOC', '1', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
