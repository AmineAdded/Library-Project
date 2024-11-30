-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2024 at 04:31 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `idAdherent` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tel` int NOT NULL,
  `password` varchar(50) NOT NULL,
  `picture` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdherent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `picture` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`, `email`, `picture`) VALUES
(1, 'Rayen.Benzid', 'rayen123', 'rayenbenzid@gmail.com', 'C:\\wamp64\\www\\Atelier_cote_serveur\\Admin\\assets\\im'),
(2, 'Amine.Added', 'amine123', 'amineadded@gmail.com', 'C:\\wamp64\\www\\Atelier_cote_serveur\\Admin\\assets\\im');

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `dateEmp` date DEFAULT NULL,
  PRIMARY KEY (`userid`,`id`),
  KEY `id` (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ouvrages`
--

DROP TABLE IF EXISTS `ouvrages`;
CREATE TABLE IF NOT EXISTS `ouvrages` (
  `idBook` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `auteur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantite` int NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `frais` float NOT NULL,
  `picture` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(10000) NOT NULL,
  PRIMARY KEY (`idBook`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ouvrages`
--

INSERT INTO `ouvrages` (`idBook`, `titre`, `auteur`, `quantite`, `categorie`, `frais`, `picture`, `description`) VALUES
(1, 'Les grandes énigmes de l\'histoire', 'Jean-Christian Petitfils ', 5, 'Histoire', 43, '../image_I/image/image du livre/Histoire/images (1).jfif', 'Le 27 septembre 52 avant notre ère, tout était réuni pour que Vercingétorix l\'emporte à Alésia sur les légions de César ; or, c\'est tout l\'inverse qui se produisit. '),
(2, 'Histoire Populaire du Quebec', 'Jaques Lacoursière', 3, 'Histoire', 45, '../image_I/image/image du livre/Histoire/images (2).jfif', 'Dans ce premier tome d\'une série de cinq, Jacques Lacoursière raconte, avec force détails, l\'arrivée des Français, leur cohabitation avec les autochtones, leur épopée à travers le continent, leur adaptation, les guerres anglo-françaises,'),
(3, 'La grande histoire du monde', 'François Reynaert', 3, 'Histoire', 49, '../image_I/image/image du livre/Histoire/images (3).jfif', 'Des grands empires de l’Antiquité à la chute de l’URSS, de l’Europe de Charlemagne au Japon du xixe siècle, de l’Asie des Mongols à l’Afrique de la décolonisation, cet ouvrage nous convie à un voyage extraordinaire au fil des siècles.'),
(4, 'Malplaquet 1709', 'Clément Oury', 6, 'Histoire', 46, '../image_I/image/image du livre/Histoire/images (4).jfif', 'En cette année 1709, le royaume de France est au bord du gouffre. Engagé dans le plus dur conflit de tout le règne – la guerre de Succession d\'Espagne –, le pays a déjà subi défaite sur défaite.'),
(5, 'Savoir et pouvoir en Al-Andalus au XIe siècle', 'Emmanuelle Tixier du Mesnil', 3, 'Histoire', 46, '../image_I/image/image du livre/Histoire/images (5).jfif', 'est un ouvrage atypique qui prend la forme d\'une grande enquête qui a mené l\'autrice à sortir de son terrain de médiéviste, pour s\'intéresser aux XVIIIe et XIXe siècles.'),
(6, 'Voyager en Europe au temps des lumières', 'gilles montègre', 3, 'Histoire', 53, '../image_I/image/image du livre/Histoire/images (6).jfif', 'Voilà une histoire entièrement renouvelée du voyage en Europe au siècle des Lumières. Suivant les pas de Voltaire, de Casanova mais aussi d’un mystérieux voyageur qui pourrait avoir été le fils caché de Montesquieu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
