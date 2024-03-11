-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 08 mars 2024 à 15:19
-- Version du serveur : 5.7.39
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `whosampled`
--
CREATE DATABASE IF NOT EXISTS `whosampled` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `whosampled`;

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `album_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date DEFAULT NULL,
  `album_duration` int(11) DEFAULT NULL,
  `producer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_cover_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `album`
--

INSERT INTO `album` (`id`, `album_name`, `release_date`, `album_duration`, `producer`, `img_cover_file`) VALUES
(33, 'Homework', '1997-01-20', 64, 'Daft Punk', 'homework_cover.jpg'),
(34, 'Discovery', '2001-03-12', 60, 'Daft Punk', 'discovery_cover.jpg'),
(35, 'Human After All', '2005-03-14', 45, 'Daft Punk', 'human_after_all_cover.jpg'),
(36, 'Random Access Memories', '2013-05-17', 75, 'Daft Punk', 'random_access_memories_cover.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `album_song`
--

DROP TABLE IF EXISTS `album_song`;
CREATE TABLE `album_song` (
  `album_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `album_song`
--

INSERT INTO `album_song` (`album_id`, `song_id`) VALUES
(33, 26),
(33, 27),
(33, 28),
(33, 29),
(33, 30),
(33, 31),
(33, 32),
(34, 33),
(34, 34),
(34, 35),
(34, 36),
(34, 37),
(34, 38),
(34, 39),
(34, 40),
(34, 41),
(34, 42),
(34, 43),
(34, 44),
(34, 45),
(34, 46),
(35, 47),
(35, 48),
(35, 49),
(35, 50),
(35, 51),
(35, 52),
(35, 53),
(35, 54),
(35, 55),
(35, 56),
(35, 57),
(36, 58),
(36, 59),
(36, 60),
(36, 61),
(36, 62),
(36, 63),
(36, 64),
(36, 65),
(36, 66),
(36, 67),
(36, 68),
(36, 69),
(36, 70);

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `artist_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_artist_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artist`
--

INSERT INTO `artist` (`id`, `artist_name`, `img_artist_file`) VALUES
(1, 'Daft Punk', 'daftpunk.jpg'),
(2, '	\r\nSugarhill Gang', 'sugarhillgang.jpg'),
(3, 'Chic', 'chic.jpg'),
(4, 'Originals', 'originals.jpg'),
(5, 'Model 500', 'model500.jpg\r\n'),
(6, 'Bar-Kays', 'barkays.jpg'),
(7, 'Vaughan Mason & Crew', 'vaughanmason.jpg'),
(8, 'Tata Vega', 'tatavega.jpg'),
(9, 'Tupac', 'tupacshakur.jpg'),
(10, 'Zero-G', 'zero-g.jpg'),
(11, 'Vaughan Mason & Crew', 'vaughanmason.jpg'),
(12, 'Viola Wills', 'violawills.jpg'),
(13, 'Billy Joel', 'billyjoel.jpg'),
(14, '	\r\nKaren Young', 'karenyoung.jpg'),
(15, 'Elton John & Kiki Dee', 'eltonjohn.jpg'),
(16, 'Fun Factory', 'funfactory.jpg'),
(17, '	\r\nPrince', 'prince.jpg'),
(18, 'Barry White', 'barrywhite.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `artist_album`
--

DROP TABLE IF EXISTS `artist_album`;
CREATE TABLE `artist_album` (
  `artist_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artist_album`
--

INSERT INTO `artist_album` (`artist_id`, `album_id`) VALUES
(1, 33),
(1, 34),
(1, 35),
(1, 36);

-- --------------------------------------------------------

--
-- Structure de la table `artist_song`
--

DROP TABLE IF EXISTS `artist_song`;
CREATE TABLE `artist_song` (
  `artist_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artist_song`
--

INSERT INTO `artist_song` (`artist_id`, `song_id`) VALUES
(2, 71),
(3, 72),
(4, 73),
(5, 87),
(6, 74),
(7, 76),
(8, 77),
(9, 78),
(10, 79),
(12, 81),
(13, 82),
(14, 88),
(15, 83),
(16, 84),
(17, 85),
(18, 75);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240304142233', '2024-03-04 14:27:40', 23),
('DoctrineMigrations\\Version20240304143348', '2024-03-04 14:34:06', 16),
('DoctrineMigrations\\Version20240304143724', '2024-03-04 14:37:53', 12),
('DoctrineMigrations\\Version20240304143944', '2024-03-04 14:39:59', 13),
('DoctrineMigrations\\Version20240304144404', '2024-03-04 14:44:16', 17),
('DoctrineMigrations\\Version20240304144607', '2024-03-04 14:46:19', 11),
('DoctrineMigrations\\Version20240304145058', '2024-03-04 14:51:12', 46),
('DoctrineMigrations\\Version20240304145538', '2024-03-04 14:55:53', 52),
('DoctrineMigrations\\Version20240304145808', '2024-03-04 14:58:27', 43),
('DoctrineMigrations\\Version20240304150030', '2024-03-04 15:00:42', 43),
('DoctrineMigrations\\Version20240305083354', '2024-03-05 08:34:09', 16),
('DoctrineMigrations\\Version20240305085237', '2024-03-05 08:55:39', 38),
('DoctrineMigrations\\Version20240305091203', '2024-03-05 09:12:13', 46),
('DoctrineMigrations\\Version20240305091358', '2024-03-05 09:14:16', 16);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plateform`
--

DROP TABLE IF EXISTS `plateform`;
CREATE TABLE `plateform` (
  `id` int(11) NOT NULL,
  `plateform_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_plateform_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plateform`
--

INSERT INTO `plateform` (`id`, `plateform_name`, `img_plateform_file`) VALUES
(1, 'Spotify', NULL),
(2, 'Napster', NULL),
(3, 'Apple Music', NULL),
(4, 'Deezer', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `plateform_song`
--

DROP TABLE IF EXISTS `plateform_song`;
CREATE TABLE `plateform_song` (
  `plateform_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sample`
--

DROP TABLE IF EXISTS `sample`;
CREATE TABLE `sample` (
  `id` int(11) NOT NULL,
  `audio_sample_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_song_origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sample_artist_origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_cover_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sample`
--

INSERT INTO `sample` (`id`, `audio_sample_file`, `sample_song_origin`, `sample_artist_origin`, `song_name`, `sample_cover_file`) VALUES
(1, 'sample_01.mp3', 'Rapper\'s Delight', 'Sugarhill Gang', 'Around the World', '	\nsugarhillgang.jpg'),
(2, 'sample_02.mp3', 'Good Times', 'Chic', 'Around the World', 'chic.jpg'),
(3, 'sample_03.mp3', 'Down to Love Town', 'Originals', 'Burnin\'', '	\noriginals.jpg'),
(4, 'sample_04.mp3', '# bruitage #', 'Model 500', 'Burnin\'', 'model500.jpg'),
(5, 'sample_05.mp3', 'Freaky Behavior', 'Bar-Kays', 'Burnin\'', '	\nbarkays.jpg'),
(6, 'sample_06.mp3', 'I\'m Gonna Love You Just a Little More, Babe', 'Barry White', 'Da Funk', 'barrywhite.jpg'),
(7, 'sample_07.mp3', 'Bounce, Rock, Skate, Roll', 'Vaughan Mason & Crew', 'Da Funk', 'vaughanmason.jpg'),
(8, 'sample_08.mp3', 'Get It Up for Love', 'Tata Vega', 'Da Funk', 'tatavega.jpg'),
(9, 'sample_09.mp3', 'Bomb First (My Second Reply)', 'Tupac', 'Da Funk', 'tupacshakur.jpg'),
(10, 'sample_10.mp3', '63 - Dance Stabs - House Stab 1', 'Zero-G', 'Da Funk', 'zero-g.jpg'),
(11, 'sample_11.mp3', 'Bounce, Rock, Skate, Roll', 'Vaughan Mason & Crew', 'Daftendirekt', 'vaughanmason.jpg'),
(12, 'sample_12.mp3', 'If You Leave Me Now', 'Viola Wills', 'Fresh', 'violawills.jpg'),
(13, 'sample_13.mp3', 'Just the Way You Are', 'Billy Joel', 'High Fidelity', 'billyjoel.jpg'),
(14, 'sample_14.mp3', 'Hot Shot', 'Karen Young', 'Indo Silver Club', '	\nkarenyoung.jpg'),
(15, 'sample_15.mp3', 'Don\'t Go Breaking My Heart', 'Elton John & Kiki Dee', 'Phoenix', 'eltonjohn.jpg'),
(16, 'sample_16.mp3', 'Celebration (Mousse T\'s Back to the Old School)', 'Fun Factory', 'Revolution 909', 'funfactory.jpg'),
(17, 'sample_17.mp3', 'Head', 'Prince', 'Teachers', '	\nprince.jpg'),
(18, 'sample_18.mp3', 'If You Leave Me Now', 'Viola Wills', 'Teachers', 'violawills.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sample_song`
--

DROP TABLE IF EXISTS `sample_song`;
CREATE TABLE `sample_song` (
  `sample_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sample_song`
--

INSERT INTO `sample_song` (`sample_id`, `song_id`) VALUES
(1, 27),
(2, 27),
(3, 29),
(4, 29),
(5, 29),
(6, 26),
(7, 26),
(8, 26),
(9, 26),
(10, 26),
(11, 69),
(12, 45),
(13, 70),
(14, 68),
(15, 60),
(16, 28),
(17, 35),
(18, 35);

-- --------------------------------------------------------

--
-- Structure de la table `song`
--

DROP TABLE IF EXISTS `song`;
CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `song_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song_duration` int(11) DEFAULT NULL,
  `audio_song_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `song`
--

INSERT INTO `song` (`id`, `song_name`, `song_duration`, `audio_song_file`, `album_id`) VALUES
(26, 'Da Funk', 300, 'da_funk.mp3', 33),
(27, 'Around the World', 420, 'around_the_world.mp3', 33),
(28, 'Revolution 909', 360, 'revolution_909.mp3', 33),
(29, 'Burnin\'', 360, 'burnin.mp3', 33),
(30, 'Indo Silver Club', 240, 'indo_silver_club.mp3', 33),
(31, 'Alive', 300, 'alive.mp3', 33),
(32, 'Funk Ad', 120, 'funk_ad.mp3', 33),
(33, 'One More Time', 300, 'one_more_time.mp3', 34),
(34, 'Aerodynamic', 420, 'aerodynamic.mp3', 34),
(35, 'Digital Love', 500, 'digital_love.mp3', 34),
(36, 'Harder, Better, Faster, Stronger', 220, 'harder_better_faster_stronger.mp3', 34),
(37, 'Crescendolls', 210, 'crescendolls.mp3', 34),
(38, 'Nightvision', 90, 'nightvision.mp3', 34),
(39, 'Superheroes', 235, 'superheroes.mp3', 34),
(40, 'High Life', 200, 'high_life.mp3', 34),
(41, 'Something About Us', 230, 'something_about_us.mp3', 34),
(42, 'Voyager', 330, 'voyager.mp3', 34),
(43, 'Veridis Quo', 340, 'veridis_quo.mp3', 34),
(44, 'Short Circuit', 200, 'short_circuit.mp3', 34),
(45, 'Face to Face', 240, 'face_to_face.mp3', 34),
(46, 'Too Long', 600, 'too_long.mp3', 34),
(47, 'Human After All', 300, 'human_after_all.mp3', 35),
(48, 'The Prime Time of Your Life', 240, 'the_prime_time_of_your_life.mp3', 35),
(49, 'Robot Rock', 240, 'robot_rock.mp3', 35),
(50, 'Steam Machine', 270, 'steam_machine.mp3', 35),
(51, 'Make Love', 370, 'make_love.mp3', 35),
(52, 'The Brainwasher', 290, 'the_brainwasher.mp3', 35),
(53, 'On/Off', 150, 'on_off.mp3', 35),
(54, 'Television Rules the Nation', 210, 'television_rules_the_nation.mp3', 35),
(55, 'Technologic', 240, 'technologic.mp3', 35),
(56, 'Emotion', 300, 'emotion.mp3', 35),
(57, 'Human After All (SebastiAn remix)', 300, 'human_after_all_sebastian_remix.mp3', 35),
(58, 'Give Life Back to Music', 300, 'give_life_back_to_music.mp3', 36),
(59, 'The Game of Love', 340, 'the_game_of_love.mp3', 36),
(60, 'Giorgio by Moroder', 560, 'giorgio_by_moroder.mp3', 36),
(61, 'Within', 230, 'within.mp3', 36),
(62, 'Instant Crush', 360, 'instant_crush.mp3', 36),
(63, 'Lose Yourself to Dance', 350, 'lose_yourself_to_dance.mp3', 36),
(64, 'Touch', 590, 'touch.mp3', 36),
(65, 'Get Lucky', 380, 'get_lucky.mp3', 36),
(66, 'Beyond', 310, 'beyond.mp3', 36),
(67, 'Motherboard', 330, 'motherboard.mp3', 36),
(68, 'Fragments of Time', 290, 'fragments_of_time.mp3', 36),
(69, 'Doin\' It Right', 230, 'doin_it_right.mp3', 36),
(70, 'Contact', 390, 'contact.mp3', 36),
(71, 'Rapper\'s Delight', NULL, NULL, NULL),
(72, 'Good Times', NULL, NULL, NULL),
(73, 'Down to Love Town', NULL, NULL, NULL),
(74, 'Freaky Behavior', NULL, NULL, NULL),
(75, 'I\'m Gonna Love You Just a Little More, Babe', NULL, NULL, NULL),
(76, 'Bounce, Rock, Skate, Roll', NULL, NULL, NULL),
(77, 'Get It Up for Love', NULL, NULL, NULL),
(78, 'Bomb First (My Second Reply)', NULL, NULL, NULL),
(79, 'Dance Stabs - House Stab 1', NULL, NULL, NULL),
(80, 'Bounce, Rock, Skate, Roll', NULL, NULL, NULL),
(81, 'If You Leave Me Now', NULL, NULL, NULL),
(82, 'Just the Way You Are', NULL, '', NULL),
(83, 'Don\'t Go Breaking My Heart', NULL, NULL, NULL),
(84, 'Celebration (Mousse T\'s Back to the Old School)', NULL, NULL, NULL),
(85, 'Head', NULL, NULL, NULL),
(86, 'If You Leave Me Now', NULL, NULL, NULL),
(87, '# bruitage #', NULL, NULL, NULL),
(88, 'Hot Shot', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_user_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `album_song`
--
ALTER TABLE `album_song`
  ADD PRIMARY KEY (`album_id`,`song_id`),
  ADD KEY `IDX_57E658E11137ABCF` (`album_id`),
  ADD KEY `IDX_57E658E1A0BDB2F3` (`song_id`);

--
-- Index pour la table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `artist_album`
--
ALTER TABLE `artist_album`
  ADD PRIMARY KEY (`artist_id`,`album_id`),
  ADD KEY `IDX_59945E10B7970CF8` (`artist_id`),
  ADD KEY `IDX_59945E101137ABCF` (`album_id`);

--
-- Index pour la table `artist_song`
--
ALTER TABLE `artist_song`
  ADD PRIMARY KEY (`artist_id`,`song_id`),
  ADD KEY `IDX_8F53683EB7970CF8` (`artist_id`),
  ADD KEY `IDX_8F53683EA0BDB2F3` (`song_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `plateform`
--
ALTER TABLE `plateform`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plateform_song`
--
ALTER TABLE `plateform_song`
  ADD PRIMARY KEY (`plateform_id`,`song_id`),
  ADD KEY `IDX_249A991DCCAA542F` (`plateform_id`),
  ADD KEY `IDX_249A991DA0BDB2F3` (`song_id`);

--
-- Index pour la table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sample_song`
--
ALTER TABLE `sample_song`
  ADD PRIMARY KEY (`sample_id`,`song_id`),
  ADD KEY `IDX_8FDBCCEC1B1FEA20` (`sample_id`),
  ADD KEY `IDX_8FDBCCECA0BDB2F3` (`song_id`);

--
-- Index pour la table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plateform`
--
ALTER TABLE `plateform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `album_song`
--
ALTER TABLE `album_song`
  ADD CONSTRAINT `FK_57E658E11137ABCF` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_57E658E1A0BDB2F3` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `artist_album`
--
ALTER TABLE `artist_album`
  ADD CONSTRAINT `FK_59945E101137ABCF` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_59945E10B7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `artist_song`
--
ALTER TABLE `artist_song`
  ADD CONSTRAINT `FK_8F53683EA0BDB2F3` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8F53683EB7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `plateform_song`
--
ALTER TABLE `plateform_song`
  ADD CONSTRAINT `FK_249A991DA0BDB2F3` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_249A991DCCAA542F` FOREIGN KEY (`plateform_id`) REFERENCES `plateform` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sample_song`
--
ALTER TABLE `sample_song`
  ADD CONSTRAINT `FK_8FDBCCEC1B1FEA20` FOREIGN KEY (`sample_id`) REFERENCES `sample` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8FDBCCECA0BDB2F3` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
