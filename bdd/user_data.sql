-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 25 Novembre 2014 à 15:24
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
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `userType`) VALUES
(2, 'jeej@jeej.ch', 'jeej', '77de68daecd823babbb58edb1c8e14d7106e83bb', 1),
(3, 'saas@saas.ch', 'saas', '0a57cb53ba59c46fc4b692527a38a87c78d84028', 1),
(4, 'feef@gmail.ch', 'feef', 'b6589fc6ab0dc82cf12099d1c2d40ab994e8410c', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
