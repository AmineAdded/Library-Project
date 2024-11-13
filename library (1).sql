-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2019 at 09:42 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `username`, `password`, `email`, `contact`, `pic`) VALUES
(1, 'Mr.', 'Abdul', 'Hamid', '123456', 'mr.hamid@gmail.com', '12345678', 'p.jpg'),
(2, 'Nobonita', 'Das', 'Nobonita', '111111', 'nobonita@gmail.com', '012345678', '4881.jpg'),
(3, 'Mr.', 'X', 'X', '222222', 'samiarahman@gmail.com', '133446557', 'p.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `department`) VALUES
(1, 'Principal of electronics', 'V.K. Mehta, Rohit Mehta', '3rd', 'Available', 3, 'EEE'),
(2, 'The Complete Reference C++', 'Herbert Schildt', '4th', 'Available', 4, 'CSE'),
(3, 'Data Structure', 'Seymour Lipschutz', '4th', 'Available', 4, 'ECE');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`) VALUES
(5, 'Promi', 'hello!'),
(16, 'Afifa', 'There is no books of ETE department.When will it be available?'),
(17, 'Admin', 'Hi! which book do you need Afifa. Please let us know.'),
(18, '', 'hello! '),
(19, 'Promi', 'Hi! which book do you need Afifa. Please let us know.');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE IF NOT EXISTS `fine` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `returned` varchar(100) NOT NULL,
  `day` int(50) NOT NULL,
  `fine` double NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`username`, `bid`, `returned`, `day`, `fine`, `status`) VALUES
('Promi', 1, '2019-05-21', 31, 3.1, 'not paid'),
('Afifa', 1, '2019-05-21', 1, 0.1, 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE IF NOT EXISTS `issue_book` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `return` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`username`, `bid`, `approve`, `issue`, `return`) VALUES
('Promi', 3, '<p style="color:yellow; background-color:red;">EXPIRED</p>', '2019-04-22', '2019-05-16'),
('Promi', 1, '<p style="color:yellow; background-color:green;">RETURNED</p>', '2019-03-20', '2019-04-20'),
('Promi', 2, '<p style="color:yellow; background-color:green;">RETURNED</p>', '2019-01-30', '2019-02-28'),
('Afifa', 1, '<p style="color:yellow; background-color:green;">RETURNED</p>', '2019-04-20', '2019-05-20'),
('Afifa', 2, '<p style="color:yellow; background-color:green;">RETURNED</p>', '2019-02-20', '2019-02-10'),
('Afifa', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first`, `last`, `username`, `password`, `roll`, `email`, `contact`, `pic`) VALUES
('Afia', 'Abida', 'Promi', '111111', 1, 'afia1@gmail.com', '000000000', '7996_3d_modeling_5.jpg'),
('sanzida', 'mou', 'Mim', '555555', 324, 'mim@gmail.com', '53454', 'p.jpg'),
('Mr.', 'Rahman', 'Rahman', '212324', 1510016, 'samiarahman@gmail.com', '123456', 'p.jpg'),
('Sumaiya', 'Shimu', 'Shimu1', '987654', 1510052, 'shimu1@gmail.com', '1739000000', 'p.jpg'),
('Suchana', 'Pramanik', 'Suchana', '121212', 1510047, 'suchana@gmail.com', '1739000000', 'p.jpg'),
('Afifa ', 'Ashraf', 'Afifa', '121212', 1510047, 'afifa@gmail.com', '1739000001', 'p.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
