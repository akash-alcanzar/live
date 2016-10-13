-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2016 at 11:40 AM
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
-- Table structure for table `bg_group_activities`
--

CREATE TABLE IF NOT EXISTS `bg_group_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activity_category_name` varchar(110) NOT NULL,
  `group_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `request_purpose` varchar(255) NOT NULL,
  `request_date` varchar(100) NOT NULL,
  `request_time` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `post_type` int(11) NOT NULL COMMENT '1->register_user,2->all',
  `note` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `add_date` varchar(100) NOT NULL,
  `modify_date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bg_group_activities`
--

INSERT INTO `bg_group_activities` (`id`, `user_id`, `activity_category_name`, `group_id`, `city_id`, `locality`, `request_purpose`, `request_date`, `request_time`, `location`, `post_type`, `note`, `status`, `add_date`, `modify_date`) VALUES
(7, 5, 'D Activity', 2, 1, '5', 'testing class', '13/10/2016', '2:00am', 'lucknow', 2, 'testing class', 1, '1476271969', '1476271969'),
(8, 5, 'D Activity', 3, 1, '5', 'testing class', '13/10/2016', '2:00am', 'lucknow', 2, 'testing class', 2, '1476271969', '1476272053'),
(9, 5, 'D Activity', 4, 1, '5', 'testing class', '13/10/2016', '2:00am', 'lucknow', 2, 'testing class', 0, '1476271969', '1476271969'),
(10, 5, 'D Activity', 5, 1, '5', 'testing class', '13/10/2016', '2:00am', 'lucknow', 2, 'testing class', 0, '1476271969', '1476271969');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
