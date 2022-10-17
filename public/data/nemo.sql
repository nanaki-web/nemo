-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : database:3306
-- Généré le : lun. 17 oct. 2022 à 07:11
-- Version du serveur : 5.7.39
-- Version de PHP : 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nemo`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `commercial_id` int(11) DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coefficient` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siret` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `commercial_id`, `email`, `roles`, `password`, `nom`, `prenom`, `numero`, `adress`, `code_postal`, `ville`, `telephone`, `type`, `coefficient`, `siret`) VALUES
(298, NULL, 'gg@gg.gg', '[\"ROLE_USER\"]', '$2y$13$/O3eLZs534K9.BCRGzEahOHhA3bZgE5B5bST4jqkj1yZVk/X.0wXK', 'Wilga', 'Anne', 'cl12456', '12 rue de la liberté', '80100', 'Abbeville', '0236548598', 'client particulier', '2', ''),
(299, NULL, 'margaux.dupont@club-internet.fr', '[\"ROLE_USER\"]', '$2y$13$KHJU6L099nPDvCnS1W6i8ulRcPNeIf4Y1RLNrNtgN.8btVJXExhcS', 'Courtois', 'Luc', 'cl12456', '9, impasse Xavier Tanguy', '74164', 'Roux', '+33 (0)8 99 85 91 69', 'client particulier', '2', NULL),
(300, NULL, 'augustin.vaillant@laposte.net', '[\"ROLE_USER\"]', '$2y$13$EZgMMJoS6nGlW/IHQOz3Hu2cUFZPT9uctkiMHc8wpQdBhzN3rSIpS', 'Bouvier', 'Jérôme', 'cl12456', '63, rue François Salmon', '67331', 'Bertin-sur-Joly', '+33 (0)8 04 37 76 42', 'client particulier', '2', NULL),
(301, NULL, 'patrick54@noos.fr', '[\"ROLE_USER\"]', '$2y$13$0lLQ9Nr8gdvxGXrNfvKyZuNt2za9ysDRdArGVm5HHU.xMXHkyye3S', 'Rossi', 'Arthur', 'cl12456', '45, impasse Thibault Paris', '81192', 'Bigot-sur-Mer', '0825848776', 'client particulier', '2', NULL),
(302, NULL, 'emace@tele2.fr', '[\"ROLE_USER\"]', '$2y$13$lGIBPU03aWWOxeD5g7G.i.HGF0/.Qfbx7.3809crbIbjQKb0Mu6gK', 'Hamon', 'Olivier', 'cl12456', '7, boulevard Alexandre Clement', '50674', 'Boyer', '+33 (0)8 19 75 29 40', 'client particulier', '2', NULL),
(303, NULL, 'jcarpentier@buisson.fr', '[\"ROLE_USER\"]', '$2y$13$2j9yIWUK6ExW5k3DAc9p3OnWr2QpKYxgtN2Bj/KhzCnTUjco0GWAu', 'Maillot', 'Gilbert', 'cl12456', '23, rue de Lefebvre', '48233', 'GrenierBourg', '+33 (0)8 04 63 68 28', 'client particulier', '2', NULL),
(304, NULL, 'leon.lemaitre@voisin.net', '[\"ROLE_USER\"]', '$2y$13$HKhrQZ89cBPJt8dIsQ47yeGRSyBf40F8cqXa8/rn.n7DIfy6ISfv6', 'Guillet', 'Sylvie', 'cl12456', '28, rue Philippe Meunier', '16438', 'Diaz', '+33 8 99 55 44 10', 'client professionel', '4', NULL),
(305, NULL, 'mrossi@caron.org', '[\"ROLE_USER\"]', '$2y$13$bEHrotyZaPFwiC71Xnm9t.ZDPvlAjvqhS23sOOxH1S0WRI1oxsUXe', 'Mendes', 'David', 'cl12456', 'rue Baron', '25629', 'Bretondan', '+33 8 93 51 28 55', 'client professionel', '4', NULL),
(306, NULL, 'muller.theophile@wanadoo.fr', '[\"ROLE_USER\"]', '$2y$13$JwZH6e5vEckN3ha6mSuZ5OLmnECRqYTdMzu5aT4LTfqelRCG7NvGq', 'Lecoq', 'Claude', 'cl12456', '10, place Caron', '38504', 'Chevallier', '+33 8 09 50 52 35', 'client professionel', '4', NULL),
(307, NULL, 'besson.yves@hotmail.fr', '[\"ROLE_USER\"]', '$2y$13$Jzt32WcDfwrtyyH/YAe5/e5IMrJYk1OIXKWszkeajOutuv35J38pC', 'Gilbert', 'Yves', 'cl12456', '85, avenue Gimenez', '88786', 'Vaillant', '08 26 81 38 73', 'client professionel', '4', NULL),
(308, NULL, 'hugues29@orange.fr', '[\"ROLE_USER\"]', '$2y$13$JfHdXRbjQiNCWSBF.msKqO0UdMSHQ5oC6BmeK2NAEnHZZize50.MK', 'Pinto', 'Jacques', 'cl12456', '35, impasse Susan Richard', '58014', 'Aubry', '0893810784', 'client professionel', '4', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `livraison_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `reglement` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_ht` decimal(10,2) NOT NULL,
  `tva` int(11) NOT NULL,
  `reduction` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `total_ttc` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `adresse_livraison` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal_facturation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_facturation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal_livraison` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville_livraison` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facture_numero` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facture_date` date DEFAULT NULL,
  `quantite_pro` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `commande_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commercial`
--

CREATE TABLE `commercial` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commercial`
--

INSERT INTO `commercial` (`id`, `email`, `roles`, `password`, `nom`, `prenom`, `telephone`) VALUES
(164, 'gg@gg.gg', '[\"ROLE_ADMIN\"]', '$2y$13$fwLBt3SobavFo9.LWwbuveqddzLhS7UyA3h9kwIK6/4JM7MnQAHDi', 'Wilga', 'Anne', '0236548598'),
(165, 'scoulon@pasquier.fr', '[\"ROLE_COMMERCIAL\"]', '$2y$13$jdmv9x/TXztuN.Y4lUFfNO2zvf/QLGIEAP4wKo2sCpisVlSzZIRZu', 'Lecoq', 'Isabelle', '0897297378'),
(166, 'gerard31@guyon.org', '[\"ROLE_COMMERCIAL\"]', '$2y$13$weyjsJy.9nlLPvcwN7WG.OWLk.dXvwWPSU/59ZwO8tDGt/cgZMyzu', 'Lacombe', 'Christine', '+33 8 05 57 53 75'),
(167, 'daniel.coste@free.fr', '[\"ROLE_COMMERCIAL\"]', '$2y$13$LfFqjMHcY1LWy6rOEFazI.hhmb6DK0sGqIPmJn2VufoACWlEcSIkO', 'Leconte', 'Aimé', '08 98 88 23 45'),
(168, 'hortense.michel@simon.com', '[\"ROLE_COMMERCIAL\"]', '$2y$13$jUMpd/JhPp3PkFnAH9/MG.HcSI1WeHwSQmVEz0TnrVaM8xG9Pau8W', 'Lefort', 'Laurent', '+33 8 91 53 75 66'),
(169, 'krodrigues@lacombe.net', '[\"ROLE_COMMERCIAL\"]', '$2y$13$AaTvJezed.zVFObRdEb.9uvWNhF./P70FqNF70Gk7ANifveQKnVYG', 'Marion', 'Thibault', '+33 8 11 32 51 52');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220928131735', '2022-09-28 15:17:44', 5279);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `adress`, `code_postal`, `telephone`, `email`, `ville`) VALUES
(111, 'Gay S.A.', 'boulevard de Etienne', '08574', '0152657772', 'uevrard@wanadoo.fr', 'Gomesdan'),
(112, 'Rolland', '659, boulevard Yves Valentin', '49001', '03 41 07 92 12', 'william.brun@chevallier.fr', 'Masson-sur-Lebrun'),
(113, 'Dumas Leconte SA', '57, rue Herve', '10089', '05 47 36 49 63', 'zoe.pereira@hotmail.fr', 'Riou-la-Forêt'),
(114, 'Girard', '7, boulevard Peltier', '93096', '08 98 97 47 28', 'roger.royer@fouquet.net', 'Pires'),
(115, 'Mary S.A.', '7, chemin de Delannoy', '94389', '+33 1 85 06 42 68', 'sabine.moreau@masse.com', 'Chauveau-sur-Ferrand');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `numero` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `stock` int(11) NOT NULL,
  `coef` decimal(10,2) NOT NULL,
  `reference` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  `rubrique_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `fournisseur_id`, `nom`, `description`, `prix`, `active`, `stock`, `coef`, `reference`, `photo`, `date_creation`, `rubrique_id`) VALUES
(51, 114, 'Pruvost', 'Ratione ut explicabo vel enim.', '99.26', 1, 75, '2.00', 'qpcba-83534', 'photo.png', '2022-09-27 23:42:57', 58),
(52, 113, 'Pinto', 'Itaque quo laboriosam ullam maiores sapiente.', '105.73', 1, 47, '2.00', 'ecbil-47180', 'photo.png', '2022-09-24 09:35:38', 59),
(53, 113, 'Dias', 'Qui maiores deleniti.', '100.75', 1, 34, '2.00', 'tzmma-86962', 'photo.png', '2022-09-28 08:34:24', 58),
(54, 115, 'Clement', 'Ab qui delectus libero sed labore.', '67.99', 0, 73, '2.00', 'htnvk-23110', 'photo.png', '2022-09-30 13:33:49', 58),
(55, 111, 'Voisin', 'Sit aut laborum unde.', '97.23', 0, 21, '2.00', 'jrmrd-63277', 'photo.png', '2022-09-24 17:48:13', 58),
(56, 115, 'Collin', 'Voluptatum eligendi omnis nostrum aspernatur.', '73.67', 0, 26, '2.00', 'xhzkc-08323', 'photo.png', '2022-09-29 15:59:18', 60),
(57, 112, 'Guerin', 'Voluptatem aliquam assumenda atque.', '117.54', 1, 75, '2.00', 'xfjfh-57424', 'photo.png', '2022-09-29 00:49:28', 60),
(58, 115, 'Arnaud', 'Eos totam culpa magnam soluta.', '74.24', 0, 21, '2.00', 'bzfzo-98316', 'photo.png', '2022-09-28 15:48:22', 56),
(59, 111, 'Hamel', 'Laudantium soluta veritatis dolore quos.', '78.00', 1, 76, '2.00', 'oqwqg-59891', 'photo.png', '2022-09-27 14:56:26', 55),
(60, 114, 'Blanchard', 'Voluptate distinctio omnis vel hic.', '92.75', 0, 67, '2.00', 'nhzlt-70097', 'photo.png', '2022-09-28 03:57:18', 56);

-- --------------------------------------------------------

--
-- Structure de la table `ss_rubrique`
--

CREATE TABLE `ss_rubrique` (
  `id` int(11) NOT NULL,
  `rubrique_parent_id` int(11) DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ss_rubrique`
--

INSERT INTO `ss_rubrique` (`id`, `rubrique_parent_id`, `nom`, `slug`) VALUES
(55, NULL, 'Eau douce', 'eau-douce'),
(56, 55, 'Poissons d\'eau douce', 'poissons-d-eau-douce'),
(57, 55, 'Crevettes-invertébrés-Tortues', 'crevettes-invertebres-tortues'),
(58, NULL, 'Eau de mer', 'eau-de-mer'),
(59, 58, 'Poissons marins', 'poissons-marins'),
(60, 58, 'Coraux et invertébrés', 'coraux-et-invertebres');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C7440455E7927C74` (`email`),
  ADD KEY `IDX_C74404557854071C` (`commercial_id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67D8E54FB25` (`livraison_id`),
  ADD KEY `IDX_6EEAA67D19EB6921` (`client_id`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`commande_id`,`produit_id`),
  ADD KEY `IDX_DF1E9E8782EA2E54` (`commande_id`),
  ADD KEY `IDX_DF1E9E87F347EFB` (`produit_id`);

--
-- Index pour la table `commercial`
--
ALTER TABLE `commercial`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_7653F3AEE7927C74` (`email`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29A5EC27670C757F` (`fournisseur_id`),
  ADD KEY `IDX_29A5EC273BD38833` (`rubrique_id`);

--
-- Index pour la table `ss_rubrique`
--
ALTER TABLE `ss_rubrique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5654E3372F69CB4D` (`rubrique_parent_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commercial`
--
ALTER TABLE `commercial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `ss_rubrique`
--
ALTER TABLE `ss_rubrique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C74404557854071C` FOREIGN KEY (`commercial_id`) REFERENCES `commercial` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67D19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_6EEAA67D8E54FB25` FOREIGN KEY (`livraison_id`) REFERENCES `livraison` (`id`);

--
-- Contraintes pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD CONSTRAINT `FK_DF1E9E8782EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DF1E9E87F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC273BD38833` FOREIGN KEY (`rubrique_id`) REFERENCES `ss_rubrique` (`id`),
  ADD CONSTRAINT `FK_29A5EC27670C757F` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`);

--
-- Contraintes pour la table `ss_rubrique`
--
ALTER TABLE `ss_rubrique`
  ADD CONSTRAINT `FK_5654E3372F69CB4D` FOREIGN KEY (`rubrique_parent_id`) REFERENCES `ss_rubrique` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
