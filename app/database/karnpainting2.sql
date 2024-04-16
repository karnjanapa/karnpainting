-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 avr. 2024 à 11:47
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `karnpainting`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `titles` varchar(100) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`article_id`, `titles`, `description`, `_date`) VALUES
(32, 'Actualités du musée', 'description titles Actualités du musée description Le musée des beaux-arts, La Cohue - Vannes, lance cette année une étude des publics, avant sa transition vers un nouveau musée sur le site de l’Hermine à Vannes.', '2024-04-16 09:06:49');

-- --------------------------------------------------------

--
-- Structure de la table `artworks`
--

CREATE TABLE `artworks` (
  `artworks_id` int(11) NOT NULL,
  `titles` varchar(200) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `photos` varchar(50) DEFAULT NULL,
  `width` varchar(50) DEFAULT NULL,
  `langth` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `belong`
--

CREATE TABLE `belong` (
  `catagories_id` int(11) NOT NULL,
  `artworks_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `catagories_id` int(11) NOT NULL,
  `abstraits` varchar(50) DEFAULT NULL,
  `paysages` varchar(50) DEFAULT NULL,
  `fleurs` varchar(50) DEFAULT NULL,
  `sous_marins` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `_date` datetime DEFAULT NULL,
  `texts` text DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `_user`
--

CREATE TABLE `_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `e_mail` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `_user`
--

INSERT INTO `_user` (`user_id`, `name`, `e_mail`, `password`, `is_admin`) VALUES
(28, 'sssssssssssssss', 'eeeeeeeeeeeeee@gmail.com', '$2y$10$tE5OfoZ2MfVVEX95LTN.POqhDfbbOYuCi.SjohpZrF.NHGJR3hZhe', 0),
(53, 'kevni', 'kevni@gmail.com', '$2y$10$80Y9j2FHOqrk/f3yXqxMt.YfpWjcaEnkoe/zLe5A3c6jkYPPPktTe', 15),
(58, 'ppppp', 'ppppp@gmail.com', '$2y$10$R4CSZQQOjkImh4AxTa0EF.k8uCN2.oOasuGq3chKc5rFexIDL2g.u', 0),
(59, 'hhhh', 'kevkev@gmail.com', '$2y$10$5sfPzvDgGQmT5g584J1Cs.Xmjmgc7tGSo7qaGOuS1ktW7S0Y6Yi0e', 0),
(61, 'mama', 'mama@gmail.com', '$2y$10$zTZdJbSMhSHowlA.p16SzuJdohXp7rMC48QR2HgxQNNY00NTnNmE.', 0),
(64, 'kevin', 'kkkk@gmail.com', '$2y$10$Sx2xI77ztVIsWRYImQwtFeI3QKdLBKZnk1vwBFPajm.OfGucy1ccC', 0),
(65, 'karn', 'karnkarn@gmail.com', '$2y$10$sRvjGgaZvZLVa7P4lfEK8ONRnRUgKSDVphhHZb9cWUXdu5WwXvJ9a', 0),
(66, 'kevin', 'kevin@gmail.com', '$2y$10$d6AMb.IvjF160zeCgaFKDeNeAvWGfoplOI6Kk0fwNXmfxIeE327fq', 15);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Index pour la table `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`artworks_id`);

--
-- Index pour la table `belong`
--
ALTER TABLE `belong`
  ADD PRIMARY KEY (`catagories_id`,`artworks_id`),
  ADD KEY `artworks_id` (`artworks_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catagories_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`),
  ADD KEY `comments_ibfk_1` (`user_id`);

--
-- Index pour la table `_user`
--
ALTER TABLE `_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `e_mail` (`e_mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `_user`
--
ALTER TABLE `_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `belong`
--
ALTER TABLE `belong`
  ADD CONSTRAINT `belong_ibfk_1` FOREIGN KEY (`catagories_id`) REFERENCES `categories` (`catagories_id`),
  ADD CONSTRAINT `belong_ibfk_2` FOREIGN KEY (`artworks_id`) REFERENCES `artworks` (`artworks_id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `_user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
