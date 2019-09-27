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

/*Table structure for table `contyp` */

DROP TABLE IF EXISTS `contyp`;

CREATE TABLE `contyp` (
  `contypsnumt` smallint(6) NOT NULL,
  `contypscode` smallint(6) NOT NULL,
  `contyptdesc` varchar(50) NOT NULL,
  PRIMARY KEY (`contypsnumt`,`contypscode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contyp` */

insert  into `contyp`(`contypsnumt`,`contypscode`,`contyptdesc`) values 
(1,0,'Cliente'),
(1,1,'Administrador');

/*Table structure for table `huremp` */

DROP TABLE IF EXISTS `huremp`;

CREATE TABLE `huremp` (
  `hurempicode` int(11) NOT NULL,
  `huremptfnam` varchar(75) NOT NULL,
  `hurempbgend` tinyint(1) NOT NULL,
  `hurempidocn` int(11) NOT NULL,
  `hurempvimgh` text NOT NULL,
  `huremptinco` text NOT NULL,
  `hurempbenbl` tinyint(1) NOT NULL,
  PRIMARY KEY (`hurempicode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `huremp` */

/*Table structure for table `secusr` */

DROP TABLE IF EXISTS `secusr`;

CREATE TABLE `secusr` (
  `secusricode` int(11) NOT NULL,
  `secconnuuid` char(108) NOT NULL,
  `secusrtmail` varchar(100) NOT NULL,
  `secusrtpass` text NOT NULL,
  `secusrdregu` date NOT NULL,
  `secusrdvalu` date NOT NULL,
  `constascode` tinyint(1) NOT NULL,
  `contypscode` smallint(6) NOT NULL,
  `secusrbenbl` tinyint(1) NOT NULL,
  `hurempicode` int(11) NOT NULL,
  `remember_token` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`secusricode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `secusr` */

insert  into `secusr`(`secusricode`,`secconnuuid`,`secusrtmail`,`secusrtpass`,`secusrdregu`,`secusrdvalu`,`constascode`,`contypscode`,`secusrbenbl`,`hurempicode`,`remember_token`) values 
(1,'5a01470f-b11a-4de9-aa5b-de900d5324c3','rojasldante@gmail.com','$2y$10$XXYAxH/DM.o678riGARhfuNOQESA352Rxd7PPT9.lDFY1oDSMr0py','2018-06-03','2018-06-03',1,1,1,1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
