-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2021 at 02:34 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(20) NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_name` (`u_name`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `u_name`, `u_pass`, `user_name`) VALUES
(1, 'smakel', 'smakel98610', 'Sachin Mohanty'),
(2, 'admin', 'admin', 'Admin'),
(3, 'rakesh', '12345', 'Rakesh Pradhan'),
(12, 'smakel02', '98610', 'sachin'),
(11, 'sachinM', '9861098610', 'Sachin Mohanty');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) DEFAULT NULL,
  `foods` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

DROP TABLE IF EXISTS `foods`;
CREATE TABLE IF NOT EXISTS `foods` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `res_id` varchar(50) NOT NULL,
  `foods` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `veg` varchar(5) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`sl`, `res_id`, `foods`, `price`, `veg`) VALUES
(1, '5655156', 'Plain Paratha + Aloo Dum + Papad', 120, 'yes'),
(3, '5655156', 'fgfd fg fgfdgf df fgdf fgf', 350, 'yes'),
(4, '5655156', 'dfj dkfjdk lfjsld', 140, 'yes'),
(10, '6589546', 'Daal Mughlaai', 120, 'yes'),
(9, '6589546', 'Rash Malaai', 70, 'yes'),
(11, '6589546', 'Chicken sandwich', 85, 'no'),
(12, '6589546', 'Tuna Stick', 45, 'no'),
(13, '6589546', 'Rice', 25, 'yes'),
(14, '5655156', 'Spaghetti', 55, 'yes'),
(15, '6589546', 'Spaghetti', 55, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `rndm_num` varchar(20) DEFAULT NULL,
  `res_name` varchar(255) NOT NULL,
  `price` double(6,2) DEFAULT NULL,
  `res_info` varchar(255) NOT NULL,
  `res_info2` varchar(255) NOT NULL,
  `veg` varchar(3) DEFAULT NULL,
  `res_img` varchar(255) NOT NULL,
  `area` varchar(20) NOT NULL,
  `dist` varchar(20) NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`res_id`),
  UNIQUE KEY `rndm_num` (`rndm_num`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`res_id`, `rndm_num`, `res_name`, `price`, `res_info`, `res_info2`, `veg`, `res_img`, `area`, `dist`, `category`) VALUES
(1, '5655156', 'Green Chilliz', 700.00, 'North India Spicy', 'So many things available over here', 'no', 'daqnolh4.jpg', 'Kandasar', 'Angul', 'breakfast'),
(2, '6589546', 'New Restro Bazar', 300.00, 'Italian Food', 'Spicy Burgers', 'yes', 'Healthy Food Made Easy -min.jpg', 'Nalco Township', 'Angul', 'lunch'),
(3, '9784456', 'Pubg Biriyani', 400.00, 'Special biriyani', 'Hydrabadi biriyani', 'yes', 'download.jpg', 'tamrit colony', 'Bhubaneswar', 'lunch'),
(34, '2763356', 'Spicy Village', 350.00, 'Sweet & Spicy Food', 'Too many things available over here.', 'yes', 'chinesse.JPG', 'Amlapada', 'Angul', NULL),
(35, '9168792', 'Yarian Restro', 625.00, 'Launge & Restro', 'Special for couple', 'no', 'newimage.jpg', 'kandasar', 'Angul', NULL),
(36, '9308634', 'Yarian Restro 2', 700.00, 'ghjghfg  y ty ty tyu', 'tyj yuty ytut ty ytuty', 'yes', 'chinesse.JPG', 'nalco township', 'Angul', NULL),
(37, '1669729', 'fgjk fkg kdnfgkjdf', 1000.00, 'Launge & Restro', 'tyj yuty ytut ty ytuty', 'no', 'iiii.jpg', 'nalco township', 'Angul', NULL),
(38, '4760595', 'hhj fghj gh jjy', 850.00, 'Launge & Restro', 'Special for couple', 'yes', 'Desert.jpg', 'nalco township', 'Angul', NULL),
(39, '2309974', 'ghgjgh gh ghj', 450.00, 'ghjghfg  y ty ty tyu', 'hj g g jkgkj ', 'no', 'Hydrangeas.jpg', 'kandasar', 'Angul', NULL),
(40, '5496405', 'gfhfgh fghfg hg', 525.00, ' fhfgh fghf  f', 'gf ffgf fghfh fghf fghfhf gg', 'yes', 'Chrysanthemum.jpg', 'kandasar', 'Angul', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
