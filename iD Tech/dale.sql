-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2014 at 03:42 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dale`
--
CREATE DATABASE IF NOT EXISTS `dale` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dale`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `password`) VALUES
('dale22599', 'password'),
('test', 'asdfasdf'),
('abc', 'asdfasdf'),
('ddf', 'asdfasdf'),
('j', 'asdfasdf'),
('asdf', 'asdfasdf'),
('asdfadsf', 'asdfasdf'),
('asdfasdfasdf', 'asdfasdf'),
('test69', '69696969'),
('iadsfoji', 'asdfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `Address` varchar(25) NOT NULL,
  `Person ID` varchar(10) NOT NULL,
  KEY `Person ID` (`Person ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`Address`, `Person ID`) VALUES
('2 Mountain Road', '');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `Color` varchar(15) NOT NULL,
  `Brand` varchar(15) NOT NULL,
  `Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`Color`, `Brand`, `Year`) VALUES
('Red', 'Ferrari', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `Person ID` varchar(10) NOT NULL,
  KEY `Person ID` (`Person ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`FirstName`, `LastName`, `Age`, `Person ID`) VALUES
('cvbxf', 'cvbcv', 12, ''),
('vcxvxc', 'cxvcxv', 13, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `Person ID` FOREIGN KEY (`Person ID`) REFERENCES `test` (`Person ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
