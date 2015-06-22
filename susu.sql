-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2015 at 04:45 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `susu`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `year` varchar(4) NOT NULL,
  `balance` double NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `contact`, `email`, `location`, `picture`, `year`, `balance`, `status`) VALUES
(3, 'Client 1', '0243246888', 'me@you.com', 'Kumasi', '', '2015', 100, '1'),
(4, 'John Mahame', '0241212121', 'mahama@dumsor.com', 'Kojo Sardine Abromi', '', '2015', 1900, '1'),
(5, 'Joshua Larbi', '0243246888', '', 'La, Apapa', '', '2015', 100, '1');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `client` int(12) NOT NULL,
  `amount` decimal(12,0) NOT NULL,
  `balance` decimal(12,0) NOT NULL,
  `user` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `date`, `client`, `amount`, `balance`, `user`) VALUES
(2, 'Deposit', '12-06-2015', 3, '500', '500', 7),
(3, 'Withdrawal', '05-06-2015', 3, '200', '300', 7),
(4, 'Deposit', '19-06-2015', 4, '1500', '1500', 7),
(5, 'Withdrawal', '11-Jun-2015', 3, '200', '100', 7),
(6, 'Deposit', '21-Jun-2015', 4, '200', '1700', 7),
(7, 'Deposit', '21-Jun-2015', 4, '200', '1900', 7),
(8, 'Deposit', '22-Jun-2015 06:10 am', 5, '100', '100', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `position` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `location`, `username`, `password`, `position`, `status`) VALUES
(7, 'Nurudin Lartey', '0243246888', 'undefined', 'Labadi', 'nuru', 'pass', 'undefined', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
