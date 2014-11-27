-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Novembre 2014 à 13:20
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
-- Vider la table avant d'insérer `animal`
--

TRUNCATE TABLE `animal`;
--
-- Contenu de la table `animal`
--

INSERT INTO `animal` (`id`, `name`, `img`, `sound`, `date`, `pending`, `idUser`) VALUES
(1, 'sasa', 'fdsafdsaf', 'dsafdsafdsafd', '2014-11-25 14:56:51', 1, 3),
(2, 'sasafgdfd', 'fdsafdsaf', 'dsafdsafdsafd', '2014-11-25 14:56:51', 1, 2),
(3, 'safdsfdsadsa', 'sfdsafdsafdsafdsafsda', 'fdsafdsafdsafdsafsa', '2014-11-25 14:56:51', 0, 3),
(4, 'gfdgdfgdf', 'gfdsgfdsg', 'fdsgfdsgfds', '2014-11-25 14:56:51', 1, 5),
(5, 'fdsfsdaf4', '4ffa4f4a', 'f4afawf4waf', '2014-11-25 14:56:51', 1, 4),
(6, 'gsg5rg4tgrg', 'e54g54tg5fv5gf', 'g54g54zt5wg5g5t', '2014-11-25 14:56:51', 1, 4),
(7, '43wqfgrstg', '45tg54g5tg', '54g54g54', '2014-11-25 14:56:51', 1, 3),
(8, 'greatgr4ge54g5e4', 'gw43gfe5g5eg5eg5e', 'g5wg5ew4tg54g54e', '2014-11-25 14:56:51', 1, 2),
(9, 'grsetgrsegdrghdr', 'grfdtgsertgrdtg', 'erstfrestg4r', '2014-11-25 14:56:51', 1, 3),
(11, 'test', 'img', 'sound', '2014-11-25 15:59:36', 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
