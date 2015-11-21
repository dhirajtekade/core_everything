-- phpMyAdmin SQL Dump
-- version 2.11.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2015 at 10:17 AM
-- Server version: 5.1.23
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `php-dt-ztest_php-20150528_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `description` longtext,
  `Author` varchar(40) DEFAULT NULL,
  `Price` varchar(20) DEFAULT NULL,
  `Type` varchar(40) DEFAULT NULL,
  `Availability` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `Name`, `description`, `Author`, `Price`, `Type`, `Availability`) VALUES
(1, 'Fault is of the sufferer', 'Dada gives brief explanation about the faults and suffering..', 'Dr Niruben Amen', '20', '1', NULL),
(2, 'Noble use of Money', NULL, 'Dr Niruben Amen', '20', '1', '1'),
(3, 'PHP 5.1 For Beginners', NULL, 'Sharanam', '500', '2', NULL),
(4, 'w', NULL, NULL, NULL, NULL, NULL),
(5, 'w', 'aaa', NULL, NULL, NULL, NULL),
(6, 'Wings of Fire', 'Motivational', 'APJ Kalam', '350', '2', '3200'),
(7, 'Wings of Fire', 'Motivational', 'APJ Kalam', '350', '2', '3200'),
(8, 'Harry Potter and Sorcer''s stone', 'Fiction, kids, adventure', 'JK Rowling', '500', '2', '260');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) DEFAULT NULL,
  `product_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `product_id`) VALUES
(1, 'Spiritual', '1'),
(2, 'Technology', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dvd`
--

CREATE TABLE IF NOT EXISTS `dvd` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Price` float DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `Avail` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dvd`
--

INSERT INTO `dvd` (`id`, `Name`, `Price`, `Type`, `Avail`) VALUES
(1, 'Charanwidhi', 50, 'dvd', NULL),
(2, 'From SR to UL', 50, 'dvd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `magazines`
--

CREATE TABLE IF NOT EXISTS `magazines` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Editor` varchar(30) DEFAULT NULL,
  `Month` varchar(30) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `Type` varchar(20) NOT NULL,
  `Availibility` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `magazines`
--


-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE IF NOT EXISTS `usertable` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `userpassword` varchar(30) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `privileges` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `username`, `firstname`, `lastname`, `email`, `userpassword`, `birthday`, `sex`, `privileges`) VALUES
(1, 'testuser', 'dhiraj', 'tekade', 'dhirajtekade@gmail.com', 'test', NULL, NULL, 1),
(2, 'testuser2', 'shrikant', 'nakade', 'ShrikantN.imail@paramss.com', 'test', NULL, NULL, 2),
(3, 'admin', 'dhiraj', 'tekade', 'dhiraj@paramss.com', 'akram', '1988-04-09', 'male', 1),
(4, 'test3', 'Dheeraj', 'Tekade', 'dhiru_mw@yahoo.in', '134', '2015-05-29', 'male', 2),
(5, 'test34', 'Dheeraj', 'Tekade', 'dhiru_mw@yahoo.in', '12345', '1997-01-17', 'male', 2),
(7, 'test343', 'Dheeraj', 'Tekade', 'dhiru_mw@yahoo.in', '12345', '1998-01-21', 'male', 2),
(8, 'test345', 'Dheeraj', 'Tekade', 'dhiru_mw@yahoo.in', '123456', '1998-01-18', 'male', 2),
(9, 'test378', 'Dheeraj', 'Tekade', 'dhiru_mw@yahoo.in', '12345', '2000-02-16', 'male', 2);
