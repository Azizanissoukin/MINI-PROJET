-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 04 mai 2025 à 14:02
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
-- Base de données : `stock_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `date_inscription` datetime DEFAULT current_timestamp(),
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `telephone`, `adresse`, `date_inscription`, `username`, `password`) VALUES
(7, '', NULL, NULL, '2025-05-03 23:11:26', 'admin', '$2y$10$hUbtklfVzNBOuacPX0oJcOVlQiUOHpXu6lNXzCBry3X0sSrMQWVWu'),
(11, '', NULL, NULL, '2025-05-03 23:18:51', 'mahmoud', '$2y$10$ZNF/dfBVovtV92c4uyGKcusuBgqXMaurgSi7JhApGA1HUZ1zfuylu'),
(12, '', NULL, NULL, '2025-05-03 23:19:09', 'mama', '$2y$10$Zr9aKzUA7SB6KWhcd4WeS.Sym44Eg90F.ItxHFonOSWBFweX/FId2'),
(14, '', NULL, NULL, '2025-05-04 11:22:32', 'safa  youssef', '$2y$10$UlIjyYZaCXH.u/AWk6htJeGFoddvEj7WwMV4632aE1.M9NPzj5PVC'),
(15, '', NULL, NULL, '2025-05-04 12:51:35', 'tarik', '$2y$10$all2JQfloS3s6ZgkPe0QueiUOMIwgzX1DTrkNxgI1oQwEpC/ws9TK');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `stock`, `quantite`) VALUES
(5, 'tofita', NULL, 111.00, 0, 2),
(6, 'takos', NULL, 22.00, 0, 3),
(7, 'nas dyl rchid', NULL, 222.00, 0, 3),
(8, 'si monger', NULL, 222.00, 0, 6);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'marwan', '$2y$10$RFGcMIauA7sfoumWOfs0eO0n3bOQk0tEURDsZq5ojYQo3L7qNPuUK', '2025-05-03 21:10:48'),
(2, 'admin', '$2y$10$IXa8iaHqWAiZwU4js2MFcOzQ3widG2eRKsJi/Rm0BaoGmH.Opmx02', '2025-05-03 22:01:58'),
(3, 'ali', '$2y$10$Lu16Y.4GpYgBZpI4t7y7CeNhkWS.80gHgMBl0yvoB39GOVw.aRT1y', '2025-05-03 22:07:39'),
(4, 'mm', '$2y$10$zcV0ntZrL8VoDJE5QgKJEOSzjoe8msYifYmdu8TZyWwH1kkFn.HjS', '2025-05-03 22:32:25'),
(5, 'ysf', '$2y$10$6JfFo4n5e8sMWMNpsypfTulrTvZ937mvtrF/Acqs86ISC3MA25cK.', '2025-05-04 10:12:11'),
(6, 'aaa', '$2y$10$bDMXNIp8d8aoSMQVkPMIZOHHfPM0Rsdp/ysTpUe8j5v2mfC.Kdx7e', '2025-05-04 10:20:50'),
(7, 'mar', '$2y$10$ZmwaSThnjLgrh0mj2Lho6e8JAA.TIKvDgXoMwqrT2XpzBTPDTKE.C', '2025-05-04 11:50:49');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
