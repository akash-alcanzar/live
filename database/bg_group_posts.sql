-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2016 at 11:41 AM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brainwma_braingroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `bg_group_posts`
--

CREATE TABLE IF NOT EXISTS `bg_group_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `city_id` int(110) NOT NULL,
  `locality_id` int(110) NOT NULL,
  `status` int(11) NOT NULL,
  `add_date` varchar(100) NOT NULL,
  `modify_date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `bg_group_posts`
--

INSERT INTO `bg_group_posts` (`id`, `group_id`, `user_id`, `description`, `city_id`, `locality_id`, `status`, `add_date`, `modify_date`) VALUES
(7, 1, 5, 'testing data demo', 1, 4, 1, '1476276404', '1476276404'),
(8, 2, 5, 'testing data demo', 1, 4, 2, '1476276404', '1476276845'),
(9, 3, 5, 'testing data demo', 1, 4, 1, '1476276404', '1476276404');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
