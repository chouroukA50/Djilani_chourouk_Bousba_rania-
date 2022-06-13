-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 juin 2022 à 23:54
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `donnation`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_art` int(11) NOT NULL,
  `id_don` int(11) NOT NULL,
  `art_name` varchar(255) NOT NULL,
  `art_type` varchar(255) NOT NULL DEFAULT 'medicament',
  `numbre` varchar(255) NOT NULL,
  `imag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_art`, `id_don`, `art_name`, `art_type`, `numbre`, `imag`) VALUES
(229, 138, 'chaise roulante', 'medicament', '2', '111.jpg'),
(230, 138, 'biqui', 'medicament', '2', '333.png');

-- --------------------------------------------------------

--
-- Structure de la table `donneur`
--

CREATE TABLE `donneur` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `numero` int(10) NOT NULL,
  `unique_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `donneur`
--

INSERT INTO `donneur` (`id`, `name`, `email`, `pass`, `image`, `adress`, `numero`, `unique_id`) VALUES
(101, 'admin1', 'admin1@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', 0, 1060395657),
(138, 'pharmacie Belhouchete', 'belhouchete@gmail.com', '202cb962ac59075b964b07152d234b70', 'b473d08cff778f8b7729919fa3c81e06-700x466.jpg', 'annaba . centre ville', 659231568, 4815990),
(139, 'samia', 'samia@gmail.com', '202cb962ac59075b964b07152d234b70', 'hhhhh.jpg', 'annaba', 1235698, 1426075520),
(140, 'chourouk', 'chourouk@gmail.com', '202cb962ac59075b964b07152d234b70', '14138098_530066397193271_691258653268031061_o.jpg', 'annaba', 1236598, 999260865),
(141, 'kamilia', 'kam@gmail.com', '202cb962ac59075b964b07152d234b70', '6-3.docx-image1-1.jpeg', 'annaba', 12356987, 487660469);

-- --------------------------------------------------------

--
-- Structure de la table `réservation`
--

CREATE TABLE `réservation` (
  `id_res` int(11) NOT NULL,
  `id_don` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `number` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `heure` int(11) NOT NULL,
  `articles_nom` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Déchargement des données de la table `réservation`
--

INSERT INTO `réservation` (`id_res`, `id_don`, `name`, `phone`, `email`, `message`, `number`, `date`, `heure`, `articles_nom`) VALUES
(60, 138, 'salima', '', '', '', '', '0000-00-00', 0, 0),
(61, 138, 'salima', '', '', '', '', '0000-00-00', 12, 0),
(62, 138, 'chourouk dj', '', '', '', '', '0000-00-00', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_art`),
  ADD KEY `articles_ibfk_1` (`id_don`);

--
-- Index pour la table `donneur`
--
ALTER TABLE `donneur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `réservation`
--
ALTER TABLE `réservation`
  ADD PRIMARY KEY (`id_res`),
  ADD KEY `réservation_ibfk_1` (`id_don`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT pour la table `donneur`
--
ALTER TABLE `donneur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT pour la table `réservation`
--
ALTER TABLE `réservation`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_don`) REFERENCES `donneur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `réservation`
--
ALTER TABLE `réservation`
  ADD CONSTRAINT `réservation_ibfk_1` FOREIGN KEY (`id_don`) REFERENCES `donneur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
