-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2014 at 01:04 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--


create table if not exists `admin_reg`
(
    `id` int(255) not null auto_increment,
	`name` varchar(255) not null,
	`email` varchar(255) not null,
	`password` varchar(255) not null,
	
	primary key(id)
)
ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


create table if not exists `categories`
(
    `cat_id` int(100) not null auto_increment,
    `offer` varchar(255) not null,
	`cat_title` varchar(255) not null,
	
	primary key(cat_id)
)
ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;






CREATE TABLE IF NOT EXISTS `client_profile` 
(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `bus_name` varchar(255) NOT NULL,
	`email` varchar(255) not null,		
	`cell_phone` varchar(255) NOT NULL,
	`bus_logo` varchar(255) not null,
    `bus_age` varchar(255) not null,	
	`location` varchar(255) NOT NULL,
	`bus_desc` varchar(255) not null,
	`password` varchar(255) not null,
	`verified` varchar(255) not null,
	PRIMARY KEY (`id`)
) 
AUTO_INCREMENT=1 ;
