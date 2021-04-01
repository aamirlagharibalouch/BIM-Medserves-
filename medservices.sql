/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.29-MariaDB : Database - medservices
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`medservices` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `medservices`;

/*Table structure for table `appointment` */

DROP TABLE IF EXISTS `appointment`;

CREATE TABLE `appointment` (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `pickupaddress` varchar(150) DEFAULT NULL,
  `typeoftransport` varchar(100) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `typeofproduct` varchar(100) DEFAULT NULL,
  `deliverytype` varchar(100) DEFAULT NULL,
  `destinationaddress` varchar(200) DEFAULT NULL,
  `contactinfo` varchar(150) DEFAULT NULL,
  `weight` varchar(150) DEFAULT '0',
  `value` varchar(150) DEFAULT '0',
  `phonenumber` varchar(50) DEFAULT '0',
  `specialnote` varchar(150) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `deliverydate` varchar(50) DEFAULT NULL,
  `lastupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `confirmationnumber` varchar(250) DEFAULT NULL,
  `driverid` int(150) DEFAULT NULL,
  `anynote` varchar(200) DEFAULT NULL,
  `startupmillage` varchar(200) DEFAULT '0',
  `gasfuel` varchar(200) DEFAULT '0',
  `regularmaintenance` varchar(200) DEFAULT '0',
  `deletenote` varchar(200) DEFAULT NULL,
  `deletedby` int(150) DEFAULT NULL,
  `notice` varchar(14) NOT NULL,
  `signature` varchar(200) NOT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `phonenumber` varchar(50) DEFAULT NULL,
  `emergencycontact` varchar(50) DEFAULT NULL,
  `streetaddress` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipcode` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `drivers` */

DROP TABLE IF EXISTS `drivers`;

CREATE TABLE `drivers` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `streetaddress` varchar(150) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zipcode` varchar(100) DEFAULT NULL,
  `emergencycontact` varchar(50) DEFAULT NULL,
  `socialsecurity` varchar(100) DEFAULT NULL,
  `employeetype` varchar(50) DEFAULT NULL,
  `drivinglicense` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'driver',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(70) DEFAULT NULL,
  `lastname` varchar(70) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `phonenumber` varchar(50) DEFAULT NULL,
  `streetaddress` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipcode` varchar(30) DEFAULT NULL,
  `emergencycontact` varchar(50) DEFAULT NULL,
  `securitynumber` varchar(50) DEFAULT NULL,
  `employeetype` varchar(30) DEFAULT NULL,
  `dashboard` varchar(14) DEFAULT NULL,
  `orderscreen` varchar(14) DEFAULT NULL,
  `assigndelivery` varchar(14) DEFAULT NULL,
  `addcustomer` varchar(14) DEFAULT NULL,
  `addappointment` varchar(14) DEFAULT NULL,
  `billing` varchar(14) DEFAULT NULL,
  `addemployees` varchar(14) DEFAULT NULL,
  `adddrivers` varchar(14) DEFAULT NULL,
  `addvehicle` varchar(14) DEFAULT NULL,
  `addproduct` varchar(14) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'employee',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Table structure for table `invoice` */

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `customerid` int(150) DEFAULT NULL,
  `appointmentid` int(105) DEFAULT NULL,
  `customeremail` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `paymentdue` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `tax` varchar(100) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `invoicenumber` varchar(200) NOT NULL,
  `roundtrip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`invoicenumber`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `quote` */

DROP TABLE IF EXISTS `quote`;

CREATE TABLE `quote` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `quotenumber` varchar(200) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `itemdescription` varchar(150) DEFAULT NULL,
  `qty` varchar(150) DEFAULT NULL,
  `unitprice` varchar(150) DEFAULT NULL,
  `lastupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `refcode` varchar(250) DEFAULT NULL,
  `discount` varchar(150) DEFAULT NULL,
  `tax` varchar(150) DEFAULT NULL,
  `quotedate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `quotesr` */

DROP TABLE IF EXISTS `quotesr`;

CREATE TABLE `quotesr` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `quotenumber` int(255) NOT NULL,
  `ref` varchar(250) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `lastupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`quotenumber`,`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `vehicle` */

DROP TABLE IF EXISTS `vehicle`;

CREATE TABLE `vehicle` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `make` varchar(100) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `modelnumber` varchar(50) DEFAULT NULL,
  `plate` varchar(50) DEFAULT NULL,
  `unitnumber` varchar(50) DEFAULT NULL,
  `registrationexpirydate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
