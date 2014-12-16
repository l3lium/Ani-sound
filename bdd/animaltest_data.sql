-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Décembre 2014 à 01:09
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `anisound`
--

--
-- Contenu de la table `animal`
--

INSERT INTO `animal` (`id`, `name`, `img`, `sound`, `date`, `pending`, `idUser`) VALUES
(1, 'Cheval', 'up-content/img/animal/cheval.jpg', 'up-content/sound/animal/cheval.mp3', '2014-11-25 14:56:51', 0, 3),
(2, 'Ours', 'up-content/img/animal/ours.jpg', 'up-content/sound/animal/cheval.mp3', '2014-11-25 14:56:51', 0, 2),
(3, 'Koala', 'up-content/img/animal/koala.jpg', 'up-content/sound/animal/cheval.mp3', '2014-11-25 14:56:51', 0, 3),
(4, 'Panda', 'up-content/img/animal/panda.jpg', 'up-content/sound/animal/cheval.mp3', '2014-11-25 14:56:51', 0, 5),
(5, 'Lion', 'up-content/img/animal/lion.jpg', 'up-content/sound/animal/cheval.mp3', '2014-11-25 14:56:51', 1, 4),
(6, 'Lapin', 'up-content/img/animal/lapin.jpg', 'up-content/sound/animal/cheval.mp3', '2014-11-25 14:56:51', 0, 4),
(7, 'Chat', 'up-content/img/animal/chat.jpg', 'up-content/sound/animal/cheval.mp3', '2014-11-25 14:56:51', 0, 3),
(8, 'Chien', 'up-content/img/animal/chien.jpg', 'up-content/sound/animal/cheval.mp3', '2014-11-25 14:56:51', 0, 2),
(9, 'Aigle', 'up-content/img/animal/aigle.jpg', 'up-content/sound/animal/cheval.mp3', '2014-11-25 14:56:51', 1, 3),
(13, 'Vache', 'up-content/img/animal/vache.jpg', 'up-content/sound/animal/cheval.mp3', '2014-12-15 23:47:10', 1, 0),
(12, 'Dauphin', 'up-content/img/animal/dauphin.jpg', 'up-content/sound/animal/cheval.mp3', '2014-12-15 23:47:10', 1, 0),
(14, 'Hippopotame', 'up-content/img/animal/hippopotame.jpg', 'up-content/sound/animal/cheval.mp3', '2014-12-15 23:48:05', 1, 0),
(15, 'Perroquet', 'up-content/img/animal/perroquet.jpg', 'up-content/sound/animal/cheval.mp3', '2014-12-15 23:48:05', 1, 0),
(16, 'Perruche', 'up-content/img/animal/perruche.jpg', 'up-content/sound/animal/cheval.mp3', '2014-12-15 23:51:50', 1, 0),
(17, 'Hibou', 'up-content/img/animal/hibou.jpg', 'up-content/sound/animal/cheval.mp3', '2014-12-15 23:51:50', 1, 0),
(18, 'Phoque', 'up-content/img/animal/seal.jpg', 'up-content/sound/animal/cheval.mp3', '2014-12-15 23:54:44', 0, 0),
(19, 'Loutre', 'up-content/img/animal/loutre.jpg', 'up-content/sound/animal/cheval.mp3', '2014-12-15 23:54:44', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
