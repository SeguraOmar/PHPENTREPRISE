-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 07 fév. 2024 à 15:36
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trajet`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@example.com', 'AdminPassword');

-- --------------------------------------------------------

--
-- Structure de la table `enterprise`
--

CREATE TABLE `enterprise` (
  `enterprise_id` int NOT NULL,
  `enterprise_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_siret` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_adress` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_zipcode` int NOT NULL,
  `enterprise_city` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enterprise`
--

INSERT INTO `enterprise` (`enterprise_id`, `enterprise_name`, `enterprise_email`, `enterprise_siret`, `enterprise_adress`, `enterprise_password`, `enterprise_zipcode`, `enterprise_city`, `enterprise_photo`) VALUES
(1, 'France Gazouz', 'FranceGazouz@gmail.com', '54DE65Z5D2DF', '28 Rue De La Mort', 'Geleklek123', 76000, 'Rouen', NULL),
(2, 'Nouvelle Entreprise SAS', 'contact@nouvelleentreprise.com', '12345678901234', '15 Rue du Commerce', 'MotDePasse123', 75001, 'Paris', NULL),
(3, 'SMEDAR', 'Smedar76@gmail.com', '12345678912345', '2 Rue clémenceau', '$2y$10$gojnXZOU9E66bUA/xjOSme.3uRgQlcAm4Ppje1QNllmMTargPdUWG', 76300, 'Rouen', NULL),
(5, 'Les Codeurs', 'Lol76@gmail.com', '55555555555555', '25 Rue Edouard', '$2y$10$8NvIn9ZcjefayB0s4AbmO.OEDZbPEY6Ek1E7QwnhKsRmrO8Q6H6PK', 76100, 'Rouen', NULL),
(7, 'ffrfrfr', 'ferfefe@gmail.com', '85462514215648', '99 avenue champlain', '$2y$10$RB4QI7qxrX6FgS1qn9L/jOBkY93kkSL6cjOY8/qjrJh/lbSS867xe', 76000, 'rouen', NULL),
(8, 'Naan', 'kdlsoapdlnp85@gmail.com', '85214796325874', '66 Avenue la rue', '$2y$10$iU59mmxbF/Ob45pU3eWFn.IB4k/9HHpTOW7ND3zcJgw51sISU6HmS', 76000, 'Rouen', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `events_id` int NOT NULL,
  `events_startdate` date NOT NULL,
  `events_challengedescrib` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `events_photo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `events_enddate` date NOT NULL,
  `events_challengename` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `enterprise_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`events_id`, `events_startdate`, `events_challengedescrib`, `events_photo`, `events_enddate`, `events_challengename`, `enterprise_id`) VALUES
(1, '2024-11-01', 'L\'entreprise France Gazouz organise une marche à pied pour fêter la saison 14 de League Of Legends', NULL, '2024-11-01', 'Faille de l\'invocateur', 1),
(2, '2024-02-02', 'Défi de remise en forme pour février', NULL, '2024-02-10', 'Février Fit Challenge', 2);

-- --------------------------------------------------------

--
-- Structure de la table `ride`
--

CREATE TABLE `ride` (
  `ride_id` int NOT NULL,
  `ride_date` date NOT NULL,
  `ride_distance` float NOT NULL,
  `ride_photo` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `transport_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ride`
--

INSERT INTO `ride` (`ride_id`, `ride_date`, `ride_distance`, `ride_photo`, `user_id`, `transport_id`) VALUES
(1, '2024-02-01', 3, 'parc_epicerie.jpg', 1, 1),
(2, '2024-02-02', 4, 'bureau_parc.jpg', 2, 2),
(3, '2024-02-03', 4, 'gym_magasin.jpg', 3, 1),
(4, '2024-02-01', 3, 'parc_epicerie.jpg', 1, 1),
(5, '2024-02-02', 4, 'bureau_parc.jpg', 2, 2),
(6, '2024-02-03', 4, 'gym_magasin.jpg', 3, 1),
(7, '2024-02-01', 3, 'parc_epicerie.jpg', 1, 1),
(8, '2024-02-02', 4, 'bureau_parc.jpg', 2, 2),
(9, '2024-02-03', 4, 'gym_magasin.jpg', 3, 1),
(64, '2024-02-04', 7, 'maison_travail.jpg', 1, 3),
(65, '2024-02-05', 1, 'travail_restaurant.jpg', 1, 1),
(66, '2024-02-06', 6, 'maison_bureau.jpg', 2, 2),
(67, '2024-02-07', 2, 'bureau_parc.jpg', 2, 2),
(68, '2024-02-08', 4, 'maison_bureau.jpg', 3, 3),
(69, '2024-02-09', 5, 'bureau_parc.jpg', 3, 3),
(70, '2024-02-10', 2, 'maison_epicerie.jpg', 4, 4),
(71, '2024-02-11', 1, 'epicerie_cafe.jpg', 4, 4),
(72, '2024-02-12', 7, 'maison_travail.jpg', 5, 5),
(73, '2024-02-13', 3, 'travail_parc.jpg', 5, 5),
(74, '2024-02-14', 6, 'maison_travail.jpg', 5, 5),
(75, '2024-02-15', 2, 'travail_boulangerie.jpg', 5, 5),
(76, '2024-02-16', 7, 'maison_travail.jpg', 1, 3),
(77, '2024-02-17', 2, 'travail_restaurant.jpg', 1, 1),
(78, '2024-02-18', 5, 'maison_bureau.jpg', 2, 2),
(79, '2024-02-19', 3, 'bureau_parc.jpg', 2, 2),
(80, '2024-02-20', 4, 'maison_bureau.jpg', 3, 3),
(81, '2024-02-21', 4, 'bureau_parc.jpg', 3, 3),
(99, '2024-01-30', 514, NULL, 10, 1),
(101, '2024-02-24', 2, NULL, 12, 1),
(104, '2024-02-05', 15.8, NULL, 15, 1),
(106, '2024-02-15', 55, NULL, 17, 3),
(107, '2024-02-10', 742774, NULL, 17, 1),
(108, '2024-03-02', 2272730, NULL, 17, 1),
(109, '2024-03-03', 374374, NULL, 18, 1),
(110, '2024-03-29', 35434, NULL, 18, 4);

-- --------------------------------------------------------

--
-- Structure de la table `transport`
--

CREATE TABLE `transport` (
  `transport_id` int NOT NULL,
  `transport_type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `transport`
--

INSERT INTO `transport` (`transport_id`, `transport_type`) VALUES
(1, 'Le vélo'),
(2, 'La trottinette'),
(3, 'La marche'),
(4, 'Le roller'),
(5, 'Le skate');

-- --------------------------------------------------------

--
-- Structure de la table `transport_pris_en_compte`
--

CREATE TABLE `transport_pris_en_compte` (
  `events_id` int NOT NULL,
  `transport_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `transport_pris_en_compte`
--

INSERT INTO `transport_pris_en_compte` (`events_id`, `transport_id`) VALUES
(2, 1),
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `userprofil`
--

CREATE TABLE `userprofil` (
  `user_id` int NOT NULL,
  `user_validate` tinyint(1) NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_firstname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_pseudo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_describ` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_dateofbirth` date NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `enterprise_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `userprofil`
--

INSERT INTO `userprofil` (`user_id`, `user_validate`, `user_name`, `user_firstname`, `user_pseudo`, `user_describ`, `user_email`, `user_dateofbirth`, `user_password`, `user_photo`, `enterprise_id`) VALUES
(1, 1, 'Dupont', 'Alice', 'alice89', 'I love coding!', 'alice@example.com', '1990-05-15', 'PasswordAlice', 'alice.jpg', 1),
(2, 1, 'Martin', 'Bob', 'bob92', 'Passionate about technology', 'bob@example.com', '1985-09-20', 'PasswordBob', 'bob.jpg', 1),
(3, 1, 'Leclerc', 'Caroline', 'caro77', 'Travel enthusiast', 'caroline@example.com', '1988-12-10', 'PasswordCaroline', 'caroline.jpg', 1),
(4, 1, 'Lefevre', 'David', 'david78', 'Nature lover', 'david@example.com', '1982-07-25', 'PasswordDavid', 'david.jpg', 2),
(5, 1, 'Bertrand', 'Émilie', 'emilie_94', 'Art and culture enthusiast', 'emilie@example.com', '1995-02-03', 'PasswordEmilie', 'emilie.jpg', 2),
(6, 1, 'Lambert', 'François', 'francois123', 'Fitness and sports', 'francois@example.com', '1987-11-08', 'PasswordFrancois', 'francois.jpg', 2),
(7, 1, 'Segua', 'Omar', 'zxRaW', NULL, 'Musashi@gmail.com', '2024-01-12', '$2y$10$Nco/lgBpNiYAjn2152P2u.TKpdY/0wPu82n58Ucq0KqQyYkAGIZQK', NULL, 2),
(8, 1, 'Omar', 'Segura', 'zxRaW', NULL, 'omarsegura76300@gmail.com', '2001-08-24', '$2y$10$tqOIjwoWMYAuKOLxyQRHN.kEGekIHkSsMbK/g/F6pnjKREC.Pts3G', NULL, 1),
(10, 1, 'Lol', 'spla', 'okdpzfdzfz', NULL, 'fioehfoiejfpoiekjfeeofe@gmail.com', '1997-06-11', '$2y$10$q.3nTzt59mUutFpJIun.bO55JafQWDQ6hGA62Nz/I.Mn5SFH5j0KG', 'images.png', 2),
(12, 1, 'Segura', 'Omaaaar', 'zRaW', 'uyky', 'okfejoife@gmail.com', '2024-01-02', '$2y$10$IDsiw8JFQ8TqYl/J0HCIjehVWxo7rvl3JP1YDigrUjLZHaVJT/5aq', 'agent-dale-cooper.jpg', 2),
(13, 1, 'Jane', 'DOE', 'afpa', 'Je kiffe LDLC', 'tata@mail.fr', '2024-02-06', '$2y$10$/j1BSNwxCR/iBkTcJw5KLel1mBjJ2NCcBY9NpNT.gPpHWPVKDi6ia', 'streetfighter6_avril2023showcase_0034.jpg', 1),
(14, 1, 'Helene', 'Poirier', 'Fjdjdjddj', NULL, 'poirier.helene@outlook.fr', '2024-02-01', '$2y$10$h6xy4gyUiFsuRLkqWmzkfeJ/eCp382QK3I2sXyPLpSdXN5POPHjs.', NULL, 2),
(15, 1, 'Hélène', 'Poirier', 'Lnwarrior', NULL, 'heloceinlove@hotmail.fr', '2023-12-14', '$2y$10$lLM4ihb9jJgHPBRbOtXIN.QIZYX5E0V9K.myVinrMrraglwpbyJAy', NULL, 1),
(16, 1, 'Gerard', 'Depardieu', 'Gégé ', NULL, 'gg@mail.fr', '2024-02-17', '$2y$10$TXkCIJ.kCROLvgkXcHItA.JqpIsqnUY92ZCytGEXOBOXEL5lqyYi2', NULL, 1),
(17, 1, 'vdvfdvd', 'vdvdvdvvsv', 'vsdsvdsvsd', '', 'vdsvdsvsvsvs@gmail.com', '2024-03-05', '$2y$10$4e0q3YbRVU/UL3QNB7OawuR5VKgAHb/.iEdxliLHELufxG7gpaXw6', 'agent-dale-cooper.jpg', 8),
(18, 1, 'gergrgeege', 'gegrgegerge', 'azerty', '', 'gerherherhberhoiuerhe@gmail.com', '2024-03-30', '$2y$10$aR/CzyBUh7LxtxoUEs9wyeUa7/VDn8F2nt.oiWiCXRP1M/knRltRu', 'images.png', 8),
(19, 1, 'fefefefefe', 'fefefe', 'lol', '', 'hrthtrjhrjtrjrjr@gmail.com', '2024-02-16', '$2y$10$8Y3PFWwtVP2V2HxYpVFUQ.mrftXtxVOg0mt888A4aW5c6jMqpJDZu', 'why-is-luffy-so-strong-min.jpg', 8);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Index pour la table `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`enterprise_id`),
  ADD UNIQUE KEY `enterprise_siret` (`enterprise_siret`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`events_id`),
  ADD KEY `enterprise_id` (`enterprise_id`);

--
-- Index pour la table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`ride_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `transport_id` (`transport_id`);

--
-- Index pour la table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transport_id`);

--
-- Index pour la table `transport_pris_en_compte`
--
ALTER TABLE `transport_pris_en_compte`
  ADD PRIMARY KEY (`events_id`,`transport_id`),
  ADD KEY `transport_id` (`transport_id`);

--
-- Index pour la table `userprofil`
--
ALTER TABLE `userprofil`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `enterprise_id` (`enterprise_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `enterprise`
--
ALTER TABLE `enterprise`
  MODIFY `enterprise_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `events_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ride`
--
ALTER TABLE `ride`
  MODIFY `ride_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT pour la table `transport`
--
ALTER TABLE `transport`
  MODIFY `transport_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `userprofil`
--
ALTER TABLE `userprofil`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprise` (`enterprise_id`);

--
-- Contraintes pour la table `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `ride_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofil` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `ride_ibfk_2` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`transport_id`);

--
-- Contraintes pour la table `transport_pris_en_compte`
--
ALTER TABLE `transport_pris_en_compte`
  ADD CONSTRAINT `transport_pris_en_compte_ibfk_1` FOREIGN KEY (`events_id`) REFERENCES `events` (`events_id`),
  ADD CONSTRAINT `transport_pris_en_compte_ibfk_2` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`transport_id`);

--
-- Contraintes pour la table `userprofil`
--
ALTER TABLE `userprofil`
  ADD CONSTRAINT `userprofil_ibfk_1` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprise` (`enterprise_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
