-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 08:29 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pebib_alt`
--

-- --------------------------------------------------------

--
-- Table structure for table `ausleihen`
--

CREATE TABLE `ausleihen` (
  `ausleihen_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buch_id` int(11) NOT NULL,
  `ausleiher` int(11) NOT NULL,
  `leihbeginn` date NOT NULL,
  `leihende` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ausleihen`
--

INSERT INTO `ausleihen` (`ausleihen_id`, `user_id`, `buch_id`, `ausleiher`, `leihbeginn`, `leihende`, `status`) VALUES
(10, 3, 13, 2, '2018-01-21', '2018-02-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ausleihe_buch`
--

CREATE TABLE `ausleihe_buch` (
  `ausleihebuch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ausleihen_ausleihen_id` int(11) NOT NULL,
  `buecher_id` int(11) NOT NULL,
  `leihbeginn` date DEFAULT NULL,
  `leihende` date NOT NULL,
  `rückgabe` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ausleihe_einstellungen`
--

CREATE TABLE `ausleihe_einstellungen` (
  `pk_Ausleihe_einstellungen` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ausleiher` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `autor_id` int(11) NOT NULL,
  `vorname` varchar(45) DEFAULT NULL,
  `nachname` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`autor_id`, `vorname`, `nachname`, `user_id`) VALUES
(1, 'Testvorname', 'Testnachname', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bilder`
--

CREATE TABLE `bilder` (
  `bilder_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buecher_id` int(11) NOT NULL,
  `Dateiname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buchautor`
--

CREATE TABLE `buchautor` (
  `buchautor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `buecher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buecher`
--

CREATE TABLE `buecher` (
  `buecher_id` int(11) NOT NULL,
  `ort_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `ausleihe_id` int(11) DEFAULT NULL,
  `isbn` varchar(45) NOT NULL,
  `titel` varchar(45) DEFAULT NULL,
  `beschreibung` varchar(255) DEFAULT NULL,
  `autor` varchar(45) NOT NULL,
  `seitenzahl` int(11) DEFAULT NULL,
  `kategorie` varchar(255) DEFAULT NULL,
  `imageFile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buecher`
--

INSERT INTO `buecher` (`buecher_id`, `ort_id`, `user_id`, `ausleihe_id`, `isbn`, `titel`, `beschreibung`, `autor`, `seitenzahl`, `kategorie`, `imageFile`) VALUES
(13, NULL, 3, 0, '9783785565438', 'Die Muschelmagier', 'Jolly and Munk start training with Forefather when they discover that their special abilities as \"polliwogs\" may be the only way to save the city Aelenium from the Maelstrom.', 'Kai Meyer', 0, '', ''),
(14, NULL, 3, 0, '9783785565438', 'Die Muschelmagier', 'Jolly and Munk start training with Forefather when they discover that their special abilities as \"polliwogs\" may be the only way to save the city Aelenium from the Maelstrom.', 'Kai Meyer', 0, '', ''),
(15, NULL, 3, 0, '9783785565438', 'Die Muschelmagier', 'Jolly and Munk start training with Forefather when they discover that their special abilities as \"polliwogs\" may be the only way to save the city Aelenium from the Maelstrom.', 'Kai Meyer', 0, '', ''),
(16, NULL, 3, 0, '9783785565438', 'Die Muschelmagier', 'Jolly and Munk start training with Forefather when they discover that their special abilities as \"polliwogs\" may be the only way to save the city Aelenium from the Maelstrom.', 'Kai Meyer', 0, '', ''),
(17, 3, 2, 0, '9783785565438', 'Die Muschelmagier', 'Jolly and Munk start training with Forefather when they discover that their special abilities as \"polliwogs\" may be the only way to save the city Aelenium from the Maelstrom.', 'Kai Meyer', 0, '', ''),
(18, NULL, 2, 0, '9783785565438', 'Die Muschelmagier', 'Jolly and Munk start training with Forefather when they discover that their special abilities as \"polliwogs\" may be the only way to save the city Aelenium from the Maelstrom.', 'Kai Meyer', 0, '', ''),
(19, NULL, 3, 0, '9783785565438', 'Die Muschelmagier', 'Jolly and Munk start training with Forefather when they discover that their special abilities as \"polliwogs\" may be the only way to save the city Aelenium from the Maelstrom.', 'Kai Meyer', 358, NULL, ''),
(20, NULL, 3, 0, '9783785565438', 'Die Muschelmagier', 'Jolly and Munk start training with Forefather when they discover that their special abilities as \"polliwogs\" may be the only way to save the city Aelenium from the Maelstrom.', 'Kai Meyer', 358, NULL, ''),
(21, NULL, 3, 0, '9783785564561', 'Die Wellenläufer', 'Die Quappen Jolly und Munk sind Wasserläufer. Als das Mare Tenebrosum ihre Welt bedroht, machen sie sich mit einer bunt zusammengewürfelten Mannschaft auf zu deren Rettung. Ab 13.', 'Kai Meyer', 377, 'Fantasy fiction', ''),
(22, 6, 2, 0, '1', 'Mein Buch', 'Testbeschreibung', 'Miep', NULL, NULL, ''),
(23, 7, 2, 0, '2', 'Mein Buch 2', 'Testbeschreibung', 'Miep', NULL, NULL, ''),
(24, 7, 2, 0, '123', 'Härri Potter', 'Testbeschreibung', 'Lea', NULL, '', 'Katzenbilder-zum-Schluss.jpg'),
(25, 9, 2, 0, '21123231', 'Hexe Lilly', 'Testbeschreibung', 'Lea Francis', NULL, NULL, ''),
(26, NULL, 2, 0, '988923', 'Mein Stuss', 'Ein Kampf gegen alles dumme', 'Patrick (der Coole)', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1515785746),
('m130524_201442_init', 1515785750);

-- --------------------------------------------------------

--
-- Table structure for table `ort`
--

CREATE TABLE `ort` (
  `ort_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ort`
--

INSERT INTO `ort` (`ort_id`, `user_id`, `name`) VALUES
(1, 3, 'Regal 01'),
(2, 3, 'Regal 02'),
(3, 3, 'Regal 03'),
(4, 1, 'Regal 04'),
(5, 1, 'Regal 05'),
(6, 2, 'Regal 01'),
(7, 2, 'Regal 02'),
(8, 2, 'Regal 03'),
(9, 2, 'Regal 04');

-- --------------------------------------------------------

--
-- Table structure for table `profilbilder`
--

CREATE TABLE `profilbilder` (
  `profilbilder_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateiname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilbilder`
--

INSERT INTO `profilbilder` (`profilbilder_id`, `user_id`, `dateiname`) VALUES
(1, 2, 'Katzenbilder-entspannt.jpg'),
(2, 2, 'Katzenbilder-entspannt.jpg'),
(3, 3, 'Katzenbilder-zum-Schluss.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE `relation` (
  `relation_id` int(11) NOT NULL,
  `user_id_big` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id_action` int(11) NOT NULL,
  `status` tinyint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`relation_id`, `user_id_big`, `user_id`, `user_id_action`, `status`) VALUES
(1, 3, 2, 2, 1),
(2, 3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `public_status` tinyint(11) NOT NULL,
  `imageFile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ort` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `public_status`, `imageFile`, `ort`) VALUES
(1, 'admin', '-UdHQHBOViHqjFZS7vwJfAZOIB4KAx3D', '$2y$13$Lgqo.2lrgcoNnTDITi2wDeaIDMl9b4tgZzZzbz088gvhMAjEPT0IW', NULL, 'patrick.baisch@arcor.de', 10, 1515850375, 1515850375, 0, '', ''),
(2, 'Denise', 'zLQ9XHE3pYEamQqNILiOknXPlZ5N2r2z', '$2y$13$QDMAhsnHqno8kx.Hkb6XZuLxgGCri/SuxfKsPKhzVALMVqXZnT3Ja', NULL, 'denise@test.com', 10, 1516043977, 1517297178, 0, 'Katzenbilder-noch-mehr-davon.jpg', 'stuttgart'),
(3, 'Patrick', 'xwYWls1r_oo0oQ6mniNVvYEVeYSvqA9_', '$2y$13$5ELXAZHkD00LDkUYmyjRteRygAO3.Jr8MQ2y2rjkSHf.EPM/D.MDG', NULL, 'patrick@test.de', 10, 1516302922, 1516302922, 0, '', ''),
(4, 'francis', 'i1UUQQNbIYc02BucP1vZTkIfrG1pVRrc', '$2y$13$uN0WMIU7Q3lj4uVztEunDedtek/RhMESJI.XQV3pAXqiU1FnpSZG.', NULL, 'francis@test.de', 10, 1516831262, 1516831262, 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ausleihen`
--
ALTER TABLE `ausleihen`
  ADD PRIMARY KEY (`ausleihen_id`),
  ADD KEY `fk_ausleihen_user1_idx` (`user_id`),
  ADD KEY `fk_ausleihen_user2_idx` (`ausleiher`);

--
-- Indexes for table `ausleihe_buch`
--
ALTER TABLE `ausleihe_buch`
  ADD PRIMARY KEY (`ausleihebuch_id`),
  ADD KEY `fk_ausleihe_buch_ausleihen1_idx` (`ausleihen_ausleihen_id`),
  ADD KEY `fk_ausleihe_buch_buecher1_idx` (`buecher_id`),
  ADD KEY `fk_ausleihe_buch_user1_idx` (`user_id`);

--
-- Indexes for table `ausleihe_einstellungen`
--
ALTER TABLE `ausleihe_einstellungen`
  ADD PRIMARY KEY (`pk_Ausleihe_einstellungen`),
  ADD KEY `fk_ausleihe_einstellungen_user1_idx` (`user_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`autor_id`),
  ADD KEY `fk_autor_user1_idx` (`user_id`);

--
-- Indexes for table `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`bilder_id`),
  ADD KEY `fk_bilder_buecher1_idx` (`buecher_id`),
  ADD KEY `fk_bilder_user1_idx` (`user_id`);

--
-- Indexes for table `buchautor`
--
ALTER TABLE `buchautor`
  ADD PRIMARY KEY (`buchautor_id`),
  ADD KEY `fk_buchautor_user1_idx` (`user_id`),
  ADD KEY `fk_buchautor_autor1_idx` (`autor_id`),
  ADD KEY `fk_buchautor_buecher1_idx` (`buecher_id`);

--
-- Indexes for table `buecher`
--
ALTER TABLE `buecher`
  ADD PRIMARY KEY (`buecher_id`),
  ADD KEY `fk_buecher_ort1_idx` (`ort_id`),
  ADD KEY `fk_buecher_user1_idx` (`user_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `ort`
--
ALTER TABLE `ort`
  ADD PRIMARY KEY (`ort_id`),
  ADD KEY `fk_ort_user1_idx` (`user_id`);

--
-- Indexes for table `profilbilder`
--
ALTER TABLE `profilbilder`
  ADD PRIMARY KEY (`profilbilder_id`),
  ADD KEY `fk_profilbilder_user1_idx` (`user_id`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`relation_id`),
  ADD KEY `fk_relation_user1_idx` (`user_id`),
  ADD KEY `fk_relation_user2_idx` (`user_id_big`),
  ADD KEY `fk_relation_user3_idx` (`user_id_action`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ausleihen`
--
ALTER TABLE `ausleihen`
  MODIFY `ausleihen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ausleihe_buch`
--
ALTER TABLE `ausleihe_buch`
  MODIFY `ausleihebuch_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ausleihe_einstellungen`
--
ALTER TABLE `ausleihe_einstellungen`
  MODIFY `pk_Ausleihe_einstellungen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `autor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bilder`
--
ALTER TABLE `bilder`
  MODIFY `bilder_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buchautor`
--
ALTER TABLE `buchautor`
  MODIFY `buchautor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buecher`
--
ALTER TABLE `buecher`
  MODIFY `buecher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `ort`
--
ALTER TABLE `ort`
  MODIFY `ort_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `profilbilder`
--
ALTER TABLE `profilbilder`
  MODIFY `profilbilder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `relation`
--
ALTER TABLE `relation`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ausleihen`
--
ALTER TABLE `ausleihen`
  ADD CONSTRAINT `fk_ausleihen_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ausleihen_user2` FOREIGN KEY (`ausleiher`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ausleihe_einstellungen`
--
ALTER TABLE `ausleihe_einstellungen`
  ADD CONSTRAINT `fk_ausleihe_einstellungen_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `fk_autor_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bilder`
--
ALTER TABLE `bilder`
  ADD CONSTRAINT `fk_bilder_buecher1` FOREIGN KEY (`buecher_id`) REFERENCES `buecher` (`buecher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bilder_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `buchautor`
--
ALTER TABLE `buchautor`
  ADD CONSTRAINT `fk_buchautor_autor1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`autor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buchautor_buecher1` FOREIGN KEY (`buecher_id`) REFERENCES `buecher` (`buecher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buchautor_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `buecher`
--
ALTER TABLE `buecher`
  ADD CONSTRAINT `fk_buecher_ort1` FOREIGN KEY (`ort_id`) REFERENCES `ort` (`ort_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buecher_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ort`
--
ALTER TABLE `ort`
  ADD CONSTRAINT `fk_ort_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profilbilder`
--
ALTER TABLE `profilbilder`
  ADD CONSTRAINT `fk_profilbilder_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `fk_relation_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_relation_user2` FOREIGN KEY (`user_id_big`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_relation_user3` FOREIGN KEY (`user_id_action`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
