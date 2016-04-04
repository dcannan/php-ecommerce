-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2014 at 01:02 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `prodid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` decimal(3,2) NOT NULL,
  `image` varchar(80) NOT NULL,
  `color` varchar(10) NOT NULL,
  PRIMARY KEY (`prodid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodid`, `name`, `description`, `price`, `image`, `color`) VALUES
(1, 'I Always Give Consent', 'While it is always important to get consent, sometimes you have to let people know you''re willing to give it as well.', '9.99', 'images/consent.jpg', 'Black'),
(2, 'Drugs Are Really Expensive', 'Sometimes, its important to be honest with kids.  Drugs are bad, sure, but there are other reasons not to get involved with them.', '9.99', 'images/dare.jpg', 'Black'),
(3, 'Ronald McDonald Joker', 'In the commercials, he seems so nice, but sometimes you have to ask him, why so serious?', '9.99', 'images/mcdjoker.jpg', 'Black'),
(4, 'Smooth Trooper', 'This is one smooth trooper, and he''s not afraid to tell you what he wants', '9.99', 'images/trooper.jpg', 'Blue'),
(5, 'I Love Dick', 'Sometimes, you just have to let everybody know what you love the most!', '9.99', 'images/lovedick.jpg', 'Gray'),
(6, 'Jesus is my Final Solution', 'Tell the world that you have a plan with this stylish shirt', '9.99', 'images/jesus.jpg', 'Blue'),
(7, 'I Know Karate', 'Tell the world what Japanese words you know, and also, to stay back!', '9.99', 'images/knowkarate.jpg', 'Red'),
(8, 'WTF Japan?', 'I''m not kidding.  I think there is something seriously wrong with this country...', '9.99', 'images/wtfjapan.jpg', 'White'),
(9, 'Colonel Sanders', 'This guy is big in Japan, but I don''t know why.', '9.99', 'images/japan.jpg', 'Black'),
(10, 'Cthulu', 'The great old one himself, and the Oddi-Tees mascot, Cthulu!', '9.99', 'images/cthulu.png', 'White');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
