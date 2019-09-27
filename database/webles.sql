/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.7-MariaDB-1:10.4.7+maria~bionic-log : Database - weblesdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`weblesdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `weblesdb`;

/*Table structure for table `secusr` */

DROP TABLE IF EXISTS `secusr`;

CREATE TABLE `secusr` (
  `secusricode` int(11) NOT NULL,
  `secconnuuid` char(108) NOT NULL,
  `secusrtlogu` varchar(60) NOT NULL,
  `secusrtpass` text NOT NULL,
  `secusrtname` varchar(200) NOT NULL,
  `secusrdregu` date NOT NULL,
  `secusrdvalu` date NOT NULL,
  `constascode` tinyint(1) NOT NULL,
  `contypscode` smallint(6) NOT NULL,
  `secusrbenbl` tinyint(1) NOT NULL,
  `secusrvimgu` text NOT NULL,
  `hurempicode` int(11) NOT NULL,
  `remember_token` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`secusricode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `secusr` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
