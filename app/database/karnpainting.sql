-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 avr. 2024 à 11:33
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
  `description` varchar(1000) DEFAULT NULL,
  `_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`article_id`, `titles`, `description`, `_date`) VALUES
(11, 'fffffff', 'ffffffffffffffffffff', '2024-04-14 23:11:03'),
(12, 'qqqqq', 'qqqqqqqqqqqqqqqq', '2024-04-14 23:11:39'),
(13, 'sssssssss', 'sssssssssssssssssssss', '2024-04-14 23:23:12'),
(14, 'fdfdxbfdxbf', 'bwcxbwcf', '2024-04-14 23:23:50'),
(15, 'hjillkjbl;jb', 'bjl;jb:;j ;: ', '2024-04-14 23:26:10'),
(16, 'cxwvxwbvfwcx', 'cbcbcfn vgn ', '2024-04-14 23:26:20'),
(17, 'wwwwwwwwwww', 'wwwwwwwwwwwwwwwww', '2024-04-14 23:31:16'),
(18, 'Ceci est un <h1>article</h1>', 'Alors ? ', '2024-04-15 09:23:39'),
(19, 'Ceci est un <h1><script>alert(\'article\');</script></h1>', 'C\'est l\'été', '2024-04-15 09:24:59'),
(20, 'ddddddddddddddddddd', 'dssssssssqqqqqqqqqqqqqq', '2024-04-15 10:03:31'),
(22, 'dddddddddddddddd', 'sssssssssssssssssssssss', '2024-04-15 10:35:29');

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

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comments_id`, `_date`, `texts`, `user_id`) VALUES
(6, '2024-04-14 00:00:00', 'rrrrrr', 37),

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
(3, 'ssss', 'cccxcx@jjjj.com', '$2y$10$yvH0AGK38SQLUVChOAvrxeNl4fbUP7gKQ9jm87BrWYza7z/60xQ1u', 0),
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
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `_user`
--
ALTER TABLE `_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
