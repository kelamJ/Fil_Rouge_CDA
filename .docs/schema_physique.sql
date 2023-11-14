-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 09 nov. 2023 à 11:36
-- Version du serveur : 10.6.12-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sk8`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `cat_sub_id` int(11) DEFAULT NULL,
  `cat_nom` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `cat_sub_id`, `cat_nom`, `cat_description`, `cat_image`, `slug`) VALUES
(1, NULL, 'Électrique', 'Type de planche qui utilise un moteur électrique pour avancer', 'cat-elec.png', NULL),
(2, NULL, 'Classics', 'Simple skate', 'cat-classic.jpg', NULL),
(3, NULL, 'Longboards', 'Long skate', 'cat-longboard.jpeg', NULL),
(4, NULL, 'Cruisers', 'Petit skate', 'cat-cruiser.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `paiement_id` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `livraison_id` int(11) DEFAULT NULL,
  `reference` varchar(20) NOT NULL,
  `com_statut` varchar(50) NOT NULL,
  `com_date` datetime NOT NULL,
  `com_total` decimal(10,2) DEFAULT NULL,
  `com_adresse` varchar(255) DEFAULT NULL,
  `com_ville` varchar(255) DEFAULT NULL,
  `com_cp` varchar(255) DEFAULT NULL,
  `reduction` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `paiement_id`, `utilisateur_id`, `livraison_id`, `reference`, `com_statut`, `com_date`, `com_total`, `com_adresse`, `com_ville`, `com_cp`, `reduction`) VALUES
(1, 2, 2, 3, '654a03e618682', 'En cours', '1997-01-23 02:51:24', NULL, '35, chemin Adrien Bigot', 'BenardVille', '97692', NULL),
(2, 2, 3, 3, '654a03e618719', 'En cours', '2017-06-21 06:29:29', NULL, 'impasse de Bousquet', 'DuhamelVille', '54 376', NULL),
(3, 2, 4, 3, '654a03e6187c2', 'En cours', '2012-01-20 07:13:19', NULL, '566, rue Alexandria Gros', 'Dumas-la-Forêt', '86 639', NULL),
(4, 2, 5, 3, '654a03e618837', 'En cours', '1991-07-20 06:30:19', NULL, 'chemin Georges', 'Riou', '72791', NULL),
(5, 2, 6, 3, '654a03e6188ce', 'En cours', '1992-09-29 08:45:15', NULL, '5, chemin de Berthelot', 'Fernandezboeuf', '31736', NULL),
(6, NULL, 1, NULL, '654a0403a7577', 'En préparation', '2023-11-07 09:31:47', NULL, NULL, NULL, NULL, NULL),
(7, NULL, 1, NULL, '654a066765e78', 'En préparation', '2023-11-07 09:41:59', NULL, NULL, NULL, NULL, NULL),
(8, NULL, 1, NULL, '654a09c92156b', 'En préparation', '2023-11-07 09:56:25', NULL, NULL, NULL, NULL, NULL),
(9, NULL, 7, NULL, '654a3c0edb74f', 'En préparation', '2023-11-07 13:30:54', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `edite`
--

CREATE TABLE `edite` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `livraison_id` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `telephone`, `adresse`, `ville`, `cp`, `pays`) VALUES
(1, 'Albert Pelletier SARL', '+33 (0)6 37 09 59 37', '83, impasse de Guillon', 'Grondin-sur-Brunel', '91 273', 'Nouvelle Calédonie'),
(2, 'Caron', '0643881965', '1, place de Jacob', 'Couturier-sur-Mer', '34 714', 'Corée, Sud'),
(3, 'Chevallier', '05 03 21 74 77', '335, rue Bonnin', 'Klein-sur-Mer', '84901', 'Afrique du sud'),
(4, 'Laroche', '0193309278', '44, place Christelle Morin', 'Lemaitrenec', '09756', 'Afghanistan'),
(5, 'Boulay', '0749648717', 'impasse Pruvost', 'Faure', '59210', 'Arabie saoudite');

-- --------------------------------------------------------

--
-- Structure de la table `lignedecommande`
--

CREATE TABLE `lignedecommande` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) DEFAULT NULL,
  `details_id` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lignedecommande`
--

INSERT INTO `lignedecommande` (`id`, `produit_id`, `details_id`, `quantite`, `prix`) VALUES
(1, 1, NULL, 3, 150.00),
(2, 1, 6, 2, 50.00),
(3, 2, 6, 1, 20.00),
(4, 2, 7, 5, 20.00),
(5, 3, 8, 1, 100.00),
(6, 5, 9, 2, 500.00);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `liv_id_id` int(11) DEFAULT NULL,
  `liv_nom` varchar(255) NOT NULL,
  `liv_url` varchar(255) NOT NULL,
  `liv_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id`, `liv_id_id`, `liv_nom`, `liv_url`, `liv_date`) VALUES
(1, NULL, 'Abeille Rush', 'https://picsum.photos/200/300', '1973-05-19 23:14:17'),
(2, NULL, 'FedEx', 'https://picsum.photos/200/300', '1997-07-30 16:06:11'),
(3, NULL, 'Colissimo', 'https://picsum.photos/200/300', '1999-03-21 23:01:20');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(11) NOT NULL,
  `p_methode` varchar(255) NOT NULL,
  `p_date` datetime NOT NULL,
  `p_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`id`, `p_methode`, `p_date`, `p_total`) VALUES
(1, 'Paypal', '2012-06-02 14:20:11', 785.00),
(2, 'Mastercard', '1981-03-27 13:27:40', 31.91),
(3, 'Lydia', '2018-12-02 07:43:38', 239.89);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `pro_nom` varchar(255) NOT NULL,
  `pro_description` varchar(255) NOT NULL,
  `pro_stock` int(11) NOT NULL,
  `prix_achat` decimal(10,2) NOT NULL,
  `prix_vente` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `categorie_id`, `fournisseur_id`, `pro_nom`, `pro_description`, `pro_stock`, `prix_achat`, `prix_vente`, `image`, `is_active`, `slug`) VALUES
(1, 2, 2, 'Skate GLOBE', 'Planche en bois avec 4 roue en plastique.', 5, 40.00, 50.00, 'skateboard.jpg', 1, 'skate-globe'),
(2, 4, NULL, 'Cruiser PENNY', 'Petite planche en plastique avec 4 roue en gomme.', 5, 10.00, 20.00, 'skateboard.jpg', 1, 'cruiser-penny'),
(3, 3, NULL, 'Long LOADED', 'Grande planche en bois et 4 roue en gomme.', 5, 110.00, 100.00, 'skateboard.jpg', 1, 'long-loaded'),
(4, 1, NULL, 'Hover HUMMER', 'Grande planche en bois et 4 roue en gomme.', 0, 210.00, 200.00, 'skateboard.jpg', 1, 'hover-hummer'),
(5, 1, NULL, 'Onewheel PINT', 'Un format pocket qui va vous faire aimer vos déplacements au quotidien. Le Onewheel Pint est un concentré de technologie, léger, réactif et puissant.', 5, 510.00, 500.00, 'skateboard.jpg', 1, 'onewheel-pint');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `u_adresse` varchar(255) NOT NULL,
  `u_ville` varchar(255) NOT NULL,
  `u_cp` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `reset_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `type`, `telephone`, `u_adresse`, `u_ville`, `u_cp`, `is_verified`, `reset_token`) VALUES
(1, 'admin@mail.fr', '[\"ROLE_ADMIN\"]', '$2y$13$vpkRKevYg.OG7VFpw5AZRere9SgDovHsB/BKxmp/kT3jwmp/8Mqbq', 'Malek', 'Julien', 'ADMIN', '0322329588', 'rue de Dupuy', 'Lemoine-la-Forêt', '91918', 1, NULL),
(2, 'alefevre@tiscali.fr', '[\"ROLE_USER\"]', '$2y$13$BCEwHotUoMhsfdU.Kybvh.apy6LrNaw.Bg4jA1M0UpQl72tX6/gQW', 'Roy', 'Michelle', 'Particulier', '+33 (0)5 39 09 61 48', '93, place de Georges', 'Pelletier', '50 867', 0, NULL),
(3, 'plouis@riviere.com', '[\"ROLE_USER\"]', '$2y$13$oeAhjBqbuoZTLdDt.Fa/v.IeGm1EesfSb7VIhIU79AwDKgET2A79e', 'Begue', 'Augustin', 'Professionnel', '0950065055', '51, impasse de Raynaud', 'Hoaraudan', '99 644', 0, NULL),
(4, 'paul.ruiz@masson.fr', '[\"ROLE_USER\"]', '$2y$13$yT2Z7Yusy/RtFgejdRzcbO8opCuqOsoideJS8Q61wNKl6PELUDZL6', 'Marchand', 'Guy', 'Professionnel', '+33 1 38 45 98 44', '1, chemin de Pascal', 'Remy', '29 460', 0, NULL),
(5, 'christophe46@delahaye.com', '[\"ROLE_USER\"]', '$2y$13$SDQLbxYA8UrSnNaMR80ml.entYQTCwYdW0bgfLdVONU/UTGf7y5O.', 'Guerin', 'Suzanne', 'Professionnel', '+33 (0)6 44 33 67 76', '69, rue de Renard', 'Courtois-sur-Mer', '26 870', 0, NULL),
(6, 'sguyot@legall.com', '[\"ROLE_USER\"]', '$2y$13$U5YhveCZdj/qFknidw1EFem3VnbNL.8SZ083Npir6/aVrfeaCQNsK', 'Blot', 'Capucine', 'Particulier', '02 94 06 01 30', '31, boulevard Morvan', 'Fernandez', '48 532', 0, NULL),
(7, 'kaido667@mail.net', '[]', '$2y$13$UZmxfox4AhUJw0P3CWU6VO2Qi0DdGX7UXCOoKAPtIPioWZIWwQX9i', 'Diallo', 'Seydina', 'Particulier', '0322329588', 'Rue des con', 'CommeToujours', '50000', 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_497DD634DB6E77AC` (`cat_sub_id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_6EEAA67DAEA34913` (`reference`),
  ADD KEY `IDX_6EEAA67D2A4C4478` (`paiement_id`),
  ADD KEY `IDX_6EEAA67DFB88E14F` (`utilisateur_id`),
  ADD KEY `IDX_6EEAA67D8E54FB25` (`livraison_id`);

--
-- Index pour la table `edite`
--
ALTER TABLE `edite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1239B6FEF347EFB` (`produit_id`),
  ADD KEY `IDX_1239B6FE8E54FB25` (`livraison_id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignedecommande`
--
ALTER TABLE `lignedecommande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A4C3DF16F347EFB` (`produit_id`),
  ADD KEY `IDX_A4C3DF16BB1A0722` (`details_id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A60C9F1F58FCEBF7` (`liv_id_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29A5EC27BCF5E72D` (`categorie_id`),
  ADD KEY `IDX_29A5EC27670C757F` (`fournisseur_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `edite`
--
ALTER TABLE `edite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `lignedecommande`
--
ALTER TABLE `lignedecommande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `FK_497DD634DB6E77AC` FOREIGN KEY (`cat_sub_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67D2A4C4478` FOREIGN KEY (`paiement_id`) REFERENCES `paiement` (`id`),
  ADD CONSTRAINT `FK_6EEAA67D8E54FB25` FOREIGN KEY (`livraison_id`) REFERENCES `livraison` (`id`),
  ADD CONSTRAINT `FK_6EEAA67DFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `edite`
--
ALTER TABLE `edite`
  ADD CONSTRAINT `FK_1239B6FE8E54FB25` FOREIGN KEY (`livraison_id`) REFERENCES `livraison` (`id`),
  ADD CONSTRAINT `FK_1239B6FEF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `lignedecommande`
--
ALTER TABLE `lignedecommande`
  ADD CONSTRAINT `FK_A4C3DF16BB1A0722` FOREIGN KEY (`details_id`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `FK_A4C3DF16F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `FK_A60C9F1F58FCEBF7` FOREIGN KEY (`liv_id_id`) REFERENCES `edite` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC27670C757F` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`),
  ADD CONSTRAINT `FK_29A5EC27BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;