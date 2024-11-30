-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2024 at 02:24 PM
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
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `picture` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdherent`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `adherent`
--

INSERT INTO `adherent` (`idAdherent`, `nom`, `prenom`, `email`, `tel`, `password`, `picture`) VALUES
(23, 'Benzid', 'Rayen', 'rayenbenzid1@gmail.com', 56202555, '$2y$10$yhM7dnES8ZcxYmTVU4DHuOihjjpF9JPVTnpb05ciADXayfgU9aOAW', 'customer01.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`, `email`, `picture`) VALUES
(1, 'Rayen.Benzid', '1234', 'rayenbenzid@gmail.com', 'Rayen.png'),
(2, 'Amine.Added', 'amine123', 'amineadded@gmail.com', 'customer02.jpg'),
(3, 'khalilJaafer', 'khalil123', 'khaliljaafer@gmail.com', 'p.jpg'),
(4, 'Aziz.Maddeh', '123', 'azizmaddedh@gmail.com', 'customer02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `dateEmp` date DEFAULT NULL,
  `duree` int NOT NULL DEFAULT '15',
  PRIMARY KEY (`userid`,`id`),
  KEY `id` (`id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emprunt`
--

INSERT INTO `emprunt` (`id`, `userid`, `dateEmp`, `duree`) VALUES
(2, 23, '2024-11-03', 15),
(1, 23, '2024-11-28', 15),
(3, 23, '2024-11-28', 15),
(7, 23, '2024-11-01', 15),
(5, 23, '2024-11-30', 15);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `commentaire` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_ad` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_ad` (`id_ad`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `commentaire`, `id_ad`) VALUES
(1, 'Rayen.benzid', 'Rayen is the best', 1),
(112, 'Benzid', 'rayen is the best', 23),
(113, 'Benzid', 'Rayen est toujours prêt', 23),
(114, 'Benzid', 'Rayen Benzid DSI21', 23);

-- --------------------------------------------------------

--
-- Table structure for table `ouvrages`
--

DROP TABLE IF EXISTS `ouvrages`;
CREATE TABLE IF NOT EXISTS `ouvrages` (
  `idBook` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `quantite` int NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `frais` float NOT NULL,
  `picture` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`idBook`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ouvrages`
--

INSERT INTO `ouvrages` (`idBook`, `titre`, `auteur`, `quantite`, `categorie`, `frais`, `picture`, `description`) VALUES
(1, 'L\'étranger', 'Albert Camus', 10, 'litterature', 5, 'etranger.jpg', '\"L\'Étranger\" d\'Albert Camus est un roman publié en 1942, considéré comme une œuvre majeure de la littérature française et un pilier de l’existentialisme et de l’absurde.'),
(2, 'La Joconde', 'Léonard de Vinci', 5, 'art', 7.5, 'joconde.jpg', 'La Joconde, également appelée \"Mona Lisa\", est une œuvre iconique réalisée par Léonard de Vinci entre 1503 et 1506, bien qu’il ait peut-être continué à la retoucher jusqu’en 1517.'),
(3, 'Une brève histoire du temps', 'Stephen Hawking', 8, 'science', 10, 'histoire.jpg', '\"Une brève histoire du temps\" (A Brief History of Time) est un ouvrage de vulgarisation scientifique écrit par le célèbre physicien Stephen Hawking et publié en 1988.'),
(4, 'La Révolution française', 'Jules Michelet', 4, 'histoire', 6, 'revolution.jpg', 'La Révolution française (1789-1799) est un événement majeur de l\'histoire qui a profondément transformé la France et influencé le monde entier. Elle marque la fin de l\'Ancien Régime et le début d\'une nouvelle ère, basée sur les principes de liberté, égalité et fraternité.'),
(5, 'Les Misérables', 'Victor Hugo', 12, 'litterature', 4, 'miserable.jpg', '\"Les Misérables\", écrit par Victor Hugo et publié en 1862, est l\'un des romans les plus célèbres de la littérature française. Ce chef-d\'œuvre explore des thèmes profonds comme la justice, la rédemption, l\'amour, et la lutte contre l\'injustice sociale, tout en offrant un portrait poignant de la société française du XIXe siècle.'),
(6, 'Le Radeau de la Méduse', 'Théodore Géricault', 3, 'art', 8, 'radeau.jpg', 'Le Radeau de la Méduse est une célèbre peinture réalisée par Théodore Géricault en 1818-1819. Cette œuvre monumentale (491 cm × 716 cm) est conservée au musée du Louvre, à Paris, et est considérée comme un chef-d\'œuvre du romantisme. '),
(7, 'Cosmos', 'Carl Sagan', 6, 'science', 9.5, 'cosmos.jpg', '\"Cosmos\" est un ouvrage emblématique écrit par l\'astronome et vulgarisateur scientifique Carl Sagan en 1980. Il accompagne la célèbre série télévisée du même nom.'),
(8, 'Les Grandes découvertes', 'Fernand Braudel', 7, 'histoire', 6.5, 'decouvrte.jpg', 'Les Grandes Découvertes désignent la période historique située entre le XVe et le XVIIe siècle, marquée par les explorations maritimes et la découverte de nouvelles terres par les Européens. Cette époque a radicalement transformé la vision du monde et inauguré une ère d\'échanges culturels, économiques et scientifiques.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
