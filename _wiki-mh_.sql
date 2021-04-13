-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 13 avr. 2021 à 07:55
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wiki-mh`
--

-- --------------------------------------------------------

--
-- Structure de la table `armes`
--

CREATE TABLE `armes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attaque` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rarete` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affinitee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `element` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_joyaux` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `armes_joyaux`
--

CREATE TABLE `armes_joyaux` (
  `armes_id` int(11) NOT NULL,
  `joyaux_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `armure`
--

CREATE TABLE `armure` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `defense` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rarete` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_talent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_joyaux` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `armure_joyaux`
--

CREATE TABLE `armure_joyaux` (
  `armure_id` int(11) NOT NULL,
  `joyaux_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `armure_talents`
--

CREATE TABLE `armure_talents` (
  `armure_id` int(11) NOT NULL,
  `talents_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cartes`
--

CREATE TABLE `cartes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_de_secteur` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campement` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_monstres` int(11) NOT NULL,
  `Image` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cartes`
--

INSERT INTO `cartes` (`id`, `nom`, `nombre_de_secteur`, `campement`, `id_monstres`, `Image`) VALUES
(1, 'Forêt ancienne', '17 zones', 'Zone 1, Zone 8, Zone 11, Zone 17', 6, 0),
(2, 'Désert des termites', '15 zones', 'Zone 1, Zone 8, Zone 11, Zone 15', 4, 0),
(3, 'Plateau de corail', '15', 'Zone 1 et Zone 12', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `cartes_items`
--

CREATE TABLE `cartes_items` (
  `cartes_id` int(11) NOT NULL,
  `items_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cartes_monstre`
--

CREATE TABLE `cartes_monstre` (
  `cartes_id` int(11) NOT NULL,
  `monstre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rarete` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effets` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recette` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `nom`, `type`, `rarete`, `effets`, `recette`, `prix`) VALUES
(1, 'Potion', 'Objet de soin', '2', 'Restaure 30% des PVs', 'Aucune disponible qu\'auprès des marchands', '50 Gz'),
(2, 'Miel', 'Fabrication', '3', 'Aucun directement', 'Potion et Miel = Mégapotion', 'Pas disponible à l\'achat'),
(3, 'Potion de démon', 'Soutien', '4', 'Augmente la statistique d\'attaque', 'En cours', 'Achat impossible');

-- --------------------------------------------------------

--
-- Structure de la table `joyaux`
--

CREATE TABLE `joyaux` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rarete` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effets` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_talent` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `joyaux_talents`
--

CREATE TABLE `joyaux_talents` (
  `joyaux_id` int(11) NOT NULL,
  `talents_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200909130208', '2020-09-15 13:23:24'),
('20200915132546', '2020-09-15 13:26:31'),
('20200915143231', '2020-09-15 14:33:15'),
('20200915143641', '2020-09-15 14:36:55'),
('20200915143843', '2020-09-15 14:39:02'),
('20200915144044', '2020-09-15 14:41:05'),
('20200915144503', '2020-09-15 14:45:15'),
('20200915144656', '2020-09-15 14:47:12'),
('20200922073859', '2020-09-22 07:40:39'),
('20200922074912', '2020-09-22 07:49:46'),
('20200922075535', '2020-09-22 07:56:27'),
('20200922080005', '2020-09-22 08:01:10'),
('20200922080417', '2020-09-22 08:05:05'),
('20200922080745', '2020-09-22 08:08:02'),
('20200922081054', '2020-09-22 08:11:07'),
('20200922081238', '2020-09-22 08:12:50'),
('20200929132817', '2020-09-29 13:32:40'),
('20201006120127', '2020-10-06 12:03:18'),
('20201006140808', '2020-10-06 14:08:43'),
('20201006141404', '2020-10-06 14:14:36'),
('20201006143627', '2020-10-06 14:46:29');

-- --------------------------------------------------------

--
-- Structure de la table `monstre`
--

CREATE TABLE `monstre` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `element` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faiblesses` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resistances` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `armure_id` int(11) DEFAULT NULL,
  `arme_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `monstre`
--

INSERT INTO `monstre` (`id`, `nom`, `type`, `element`, `faiblesses`, `resistances`, `armure_id`, `arme_id`) VALUES
(1, 'Rathalos', 'Wyvern Volante', 'Feu', 'Dragon', 'Feu', NULL, NULL),
(2, 'Kulu-Ya-Ku', 'Wyvern Oiseau', 'Aucun', 'Eau', 'Aucune', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `monstre_armes`
--

CREATE TABLE `monstre_armes` (
  `monstre_id` int(11) NOT NULL,
  `armes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `talents`
--

CREATE TABLE `talents` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effets` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `talents`
--

INSERT INTO `talents` (`id`, `nom`, `niveau`, `effets`) VALUES
(1, 'Machine de Guerre', '1-6', 'Augmente l\'attaque ainsi l\'affinité aux niveaux supérieurs'),
(2, 'Afflux de vie', '1-3', 'Augmente la vie maximum'),
(3, 'Bastion', '1-7', 'Augmente la défense et la résistance élémantaire'),
(6, 'Invulnérabilité', '1-5', 'Augmente la durée d\'invulnérabilité lorsque vous esquivez une attaque.'),
(7, 'Fronde+', '1-3', 'Augmente le nombre de projectiles et de munitions obtenus sur le terrain pour la fronde.'),
(8, 'Etanchéité', '1-3', 'Augmente la protection contre les attaques élémentaires eau et les attaques physiques.'),
(9, 'Ignifuge', '1-3', 'Augmente la protection contre les attaques élémentaires feu et les attaques physiques.'),
(10, 'Antigel', '1-3', 'Augmente la protection contre les attaques élémentaires glace et les attaques physiques.'),
(11, 'Paratonnerre', '1-3', 'Augmente la protection contre les attaques élémentaires foudre et les attaques physiques.'),
(12, 'Aura draconien', '1-3', 'Augmente la protection contre les attaques élémentaires dragon et les attaques physiques.'),
(13, 'Toxicologie', '1-3', 'Augmente les résistance contre le poison'),
(14, 'Antiparalysie', '1-3', 'Augmente la résistance contra la paralysie'),
(15, 'Insomnie', '1-3', 'Augmente la résistance contre le sommeil'),
(16, 'Crâne d\'acier', '1-3', 'Augmente la résistance contre les étourdissements'),
(17, 'Anti-fange', '1', 'Réduit les entraves à la mobilité quand vous êtes dans la fange d\'un monstre.'),
(18, 'Anti-explosion', '3', 'Augmente la résistance contre les fléaux explosions'),
(19, 'Anti-hémorragie', '1-3', 'Augmente la résistance contre les hémorragies.'),
(20, 'Peau de fer', '1-3', 'Augmente la résistance contre les effets de fragilité'),
(21, 'Bouchon d\'oreilles', '1-5', 'Affecte la résistance contre les rugissements.'),
(22, 'Pare-vent', '1-5', 'Affecte la résistance contre les bourrasques'),
(23, 'Sismologie', '1-3', 'Affecte la résistance contre les secousses'),
(24, 'Grand bousier', '1', 'Augmente l\'efficacité des capsules de bouse.'),
(25, 'Aura de purge', '1', 'Augmente la résistance contre les effets du Val putride.'),
(26, 'Thermorésistante', '1', 'Annule les dégâts occasionnés par l’aridité ou la chaleur.'),
(27, 'Cercle de vie', '1-3', 'Augmente la quantité de vie restaurée'),
(28, 'Halo de guérison', '1-3', 'Accélère la vitesse de guérison des dégâts temporaires (zone rouge de la jauge de vie)');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `armes`
--
ALTER TABLE `armes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `armes_joyaux`
--
ALTER TABLE `armes_joyaux`
  ADD PRIMARY KEY (`armes_id`,`joyaux_id`),
  ADD KEY `IDX_4A7ABF207A649A7` (`armes_id`),
  ADD KEY `IDX_4A7ABF209A6E1F6A` (`joyaux_id`);

--
-- Index pour la table `armure`
--
ALTER TABLE `armure`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `armure_joyaux`
--
ALTER TABLE `armure_joyaux`
  ADD PRIMARY KEY (`armure_id`,`joyaux_id`),
  ADD KEY `IDX_ED3AE51FE4000E4F` (`armure_id`),
  ADD KEY `IDX_ED3AE51F9A6E1F6A` (`joyaux_id`);

--
-- Index pour la table `armure_talents`
--
ALTER TABLE `armure_talents`
  ADD PRIMARY KEY (`armure_id`,`talents_id`),
  ADD KEY `IDX_A4F2C0E4000E4F` (`armure_id`),
  ADD KEY `IDX_A4F2C0D7DC35B0` (`talents_id`);

--
-- Index pour la table `cartes`
--
ALTER TABLE `cartes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_monstres` (`id_monstres`);

--
-- Index pour la table `cartes_items`
--
ALTER TABLE `cartes_items`
  ADD PRIMARY KEY (`cartes_id`,`items_id`),
  ADD KEY `IDX_75DF3608C5BA6C52` (`cartes_id`),
  ADD KEY `IDX_75DF36086BB0AE84` (`items_id`);

--
-- Index pour la table `cartes_monstre`
--
ALTER TABLE `cartes_monstre`
  ADD PRIMARY KEY (`cartes_id`,`monstre_id`),
  ADD KEY `IDX_396C2761C5BA6C52` (`cartes_id`),
  ADD KEY `IDX_396C2761DAF13697` (`monstre_id`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joyaux`
--
ALTER TABLE `joyaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `joyaux_talents`
--
ALTER TABLE `joyaux_talents`
  ADD PRIMARY KEY (`joyaux_id`,`talents_id`),
  ADD KEY `IDX_12D5D01C9A6E1F6A` (`joyaux_id`),
  ADD KEY `IDX_12D5D01CD7DC35B0` (`talents_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `monstre`
--
ALTER TABLE `monstre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A20EC7A5E4000E4F` (`armure_id`),
  ADD KEY `id_arme` (`arme_id`),
  ADD KEY `id_armure` (`armure_id`),
  ADD KEY `id_armure_2` (`armure_id`);

--
-- Index pour la table `monstre_armes`
--
ALTER TABLE `monstre_armes`
  ADD PRIMARY KEY (`monstre_id`,`armes_id`),
  ADD KEY `IDX_903080D7DAF13697` (`monstre_id`),
  ADD KEY `IDX_903080D77A649A7` (`armes_id`);

--
-- Index pour la table `talents`
--
ALTER TABLE `talents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `armes`
--
ALTER TABLE `armes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `armure`
--
ALTER TABLE `armure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cartes`
--
ALTER TABLE `cartes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `joyaux`
--
ALTER TABLE `joyaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `monstre`
--
ALTER TABLE `monstre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `talents`
--
ALTER TABLE `talents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `armes_joyaux`
--
ALTER TABLE `armes_joyaux`
  ADD CONSTRAINT `FK_4A7ABF207A649A7` FOREIGN KEY (`armes_id`) REFERENCES `armes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4A7ABF209A6E1F6A` FOREIGN KEY (`joyaux_id`) REFERENCES `joyaux` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `armure_joyaux`
--
ALTER TABLE `armure_joyaux`
  ADD CONSTRAINT `FK_ED3AE51F9A6E1F6A` FOREIGN KEY (`joyaux_id`) REFERENCES `joyaux` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ED3AE51FE4000E4F` FOREIGN KEY (`armure_id`) REFERENCES `armure` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `armure_talents`
--
ALTER TABLE `armure_talents`
  ADD CONSTRAINT `FK_A4F2C0D7DC35B0` FOREIGN KEY (`talents_id`) REFERENCES `talents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A4F2C0E4000E4F` FOREIGN KEY (`armure_id`) REFERENCES `armure` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cartes_items`
--
ALTER TABLE `cartes_items`
  ADD CONSTRAINT `FK_75DF36086BB0AE84` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_75DF3608C5BA6C52` FOREIGN KEY (`cartes_id`) REFERENCES `cartes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cartes_monstre`
--
ALTER TABLE `cartes_monstre`
  ADD CONSTRAINT `FK_396C2761C5BA6C52` FOREIGN KEY (`cartes_id`) REFERENCES `cartes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_396C2761DAF13697` FOREIGN KEY (`monstre_id`) REFERENCES `monstre` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `joyaux_talents`
--
ALTER TABLE `joyaux_talents`
  ADD CONSTRAINT `FK_12D5D01C9A6E1F6A` FOREIGN KEY (`joyaux_id`) REFERENCES `joyaux` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_12D5D01CD7DC35B0` FOREIGN KEY (`talents_id`) REFERENCES `talents` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `monstre`
--
ALTER TABLE `monstre`
  ADD CONSTRAINT `FK_A20EC7A5E4000E4F` FOREIGN KEY (`armure_id`) REFERENCES `armure` (`id`);

--
-- Contraintes pour la table `monstre_armes`
--
ALTER TABLE `monstre_armes`
  ADD CONSTRAINT `FK_903080D77A649A7` FOREIGN KEY (`armes_id`) REFERENCES `armes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_903080D7DAF13697` FOREIGN KEY (`monstre_id`) REFERENCES `monstre` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
