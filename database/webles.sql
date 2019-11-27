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

/*Table structure for table `confrm` */

DROP TABLE IF EXISTS `confrm`;

CREATE TABLE `confrm` (
  `confrmscode` smallint(6) NOT NULL,
  `secconnuuid` char(108) NOT NULL,
  `confrmttitl` varchar(100) NOT NULL,
  `confrmtdesc` text DEFAULT NULL,
  `confrmyorde` tinyint(1) NOT NULL,
  `confrmvsmai` text DEFAULT NULL,
  `confrmbenbl` tinyint(1) NOT NULL,
  `confrmsfcod` smallint(6) DEFAULT NULL,
  `confrmyadmf` tinyint(1) NOT NULL,
  `contypscod0` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`confrmscode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `confrm` */

insert  into `confrm`(`confrmscode`,`secconnuuid`,`confrmttitl`,`confrmtdesc`,`confrmyorde`,`confrmvsmai`,`confrmbenbl`,`confrmsfcod`,`confrmyadmf`,`contypscod0`) values 
(0,'5c02460f-ceal-4de9-aa5b-de811d5324c3','INICIO',NULL,0,NULL,1,NULL,0,0),
(1,'4b01470f-b11a-4de9-aa5b-de900d5324c3','QUIENES SOMOS',NULL,1,NULL,1,NULL,0,0),
(2,'3c01470f-b11a-4de9-aa5b-de811d5324c3','SERVICIOS',NULL,2,NULL,1,NULL,0,0),
(3,'5a01830f-ac1a-4de9-aa5b-de811d5324c3','REDES SOCIALES',NULL,3,NULL,1,NULL,0,0),
(4,'4a02460f-ac1a-4de9-aa5b-de811d5324c3','CONTACTOS',NULL,4,NULL,1,NULL,0,0),
(5,'2b02460f-nn1a-4de9-aa5b-de811d5324c3','ADMINISTRACION',NULL,5,NULL,1,NULL,1,0),
(6,'4f02460f-nn1a-4de9-aa5b-ff811d5324b4','Valores','Nuestra institucion esta regida por valores que son innegociables y que ayudan a preservar nuestra institucuion',0,'fa fa-bookmark-o',1,1,0,0),
(7,'3g02460f-ss1a-4de9-aa5b-de811d5324c3','Institución','La institucion esta compuesta por personal profesional altamente capacitado desde nuestros inicios',1,'fa fa-university',1,1,0,0),
(8,'3g02460f-oo1a-4de9-aa5b-ff811d5324b4','Quimica Sanguinea','Examenes Habilitados',0,'fa fa-thermometer-full',1,2,0,0),
(9,'2f02460f-ffla-4de9-aa5b-ff811d5324b4','Inmunologia y Serologia','Examenes Habilitados',1,'fa fa-bandcamp ',1,2,0,0),
(10,'4g03360f-ffla-2as8-aa5b-ff811d5324b4','Hormonas - Pruebas Funcionales','Examenes habilitados',2,'fa fa-share-alt',1,2,0,0),
(11,'5c01350g-bbcl-4de9-aa5b-de811d5324c3','Quienes Somos',NULL,0,'fa fa-window-maximize',1,5,1,1),
(12,'1b02460f-ac1a-3aa8-aa5b-de811d5324c3','Ultimas Noticias',NULL,0,NULL,1,3,0,0),
(13,'2b01350g-cccl-4de9-aa5b-de811d5324c3','Redes Sociales',NULL,0,'fa fa-window-maximize',1,5,1,1),
(14,'6c01350g-bbcl-3ab5-cc4b-de811d5324b2','Homenajes',NULL,0,NULL,1,3,0,0);

/*Table structure for table `confrs` */

DROP TABLE IF EXISTS `confrs`;

CREATE TABLE `confrs` (
  `confrsscode` smallint(6) NOT NULL,
  `confrmscode` smallint(6) NOT NULL,
  `secconnuuid` char(36) NOT NULL,
  `confrsttitl` varchar(100) NOT NULL,
  `confrstdesc` text NOT NULL,
  `confrsyorde` tinyint(1) NOT NULL,
  `confrsvsmai` text DEFAULT NULL,
  `confrsvbigi` text DEFAULT NULL,
  `confrsdcrea` date DEFAULT NULL,
  `confrsdpubl` date DEFAULT NULL,
  `confrsbenbl` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `confrs` */

insert  into `confrs`(`confrsscode`,`confrmscode`,`secconnuuid`,`confrsttitl`,`confrstdesc`,`confrsyorde`,`confrsvsmai`,`confrsvbigi`,`confrsdcrea`,`confrsdpubl`,`confrsbenbl`) values 
(1,6,'3e05460f-ab1a-4de9-aa5b-de811d5324c3','Mision','Ser un laboratorio reconocido por la sociedad...',0,NULL,'1574346320.png','2019-11-26','2019-11-26',1),
(2,6,'2b03360f-ac1a-4de9-aa5b-de811d5324c3','Vision','Crecer a nivel Nacional e iInterna...',1,NULL,'1574346332.png','2019-11-26','2019-11-26',1),
(3,6,'6e01830f-bbma-3de9-aa5b-de811d5324c3','Valores','Siempre tenemos como prioridad al paciente...',2,NULL,'1574347210.png','2019-11-26','2019-11-26',1),
(4,7,'3a15560f-amma-4de9-aa5b-de811d5324c3','Historia','Un 1995 nacio el Laboratorio...',0,NULL,NULL,'2019-11-26','2019-11-26',1),
(5,7,'8f01830f-llma-3de9-aa5b-de811d5324c3','Directiva','Nuestra directiva esta compuesta por...',1,NULL,NULL,'2019-11-26','2019-11-26',1);

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
(1,1,'Administrador'),
(2,0,'Scroll'),
(2,1,'Modal'),
(2,2,'Section');

/*Table structure for table `huremp` */

DROP TABLE IF EXISTS `huremp`;

CREATE TABLE `huremp` (
  `hurempicode` int(11) NOT NULL AUTO_INCREMENT,
  `secconnuuid` char(108) NOT NULL,
  `huremptfnam` varchar(75) NOT NULL,
  `hurempbgend` tinyint(1) NOT NULL,
  `hurempddobh` date DEFAULT NULL,
  `hurempidocn` int(11) NOT NULL,
  `hurempvimgh` text DEFAULT NULL,
  `huremptinco` text NOT NULL,
  `hurempbenbl` tinyint(1) NOT NULL,
  PRIMARY KEY (`hurempicode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `huremp` */

insert  into `huremp`(`hurempicode`,`secconnuuid`,`huremptfnam`,`hurempbgend`,`hurempddobh`,`hurempidocn`,`hurempvimgh`,`huremptinco`,`hurempbenbl`) values 
(1,'5a01830f-b11a-4de9-bb5b-de900d5324c3','Miguel Angel',1,'1992-02-14',8255180,'defaultm.jpg\r\n','0',1),
(2,'2a03240f-b11a-4de9-bb5b-de754d5324c3','Dante Rojas Lizondo',1,'1980-10-21',5350253,'en4d270VuCZgj3xcknJkn076MExAJR.png','0',1);

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
(1,'5a01470f-b11a-4de9-aa5b-de900d5324c3','miguelhangelh@hotmail.com','$2y$10$ERSFh620qDugcqUIE7fzxugRxx1qckOYgPrNeQSK0S8sZtPFnu1Cq','2018-06-03','2018-06-03',1,1,1,1,NULL),
(2,'3c01870f-cffa-4de9-aa5b-de900d5324c3','rojasldante@gmail.com','$2y$10$B/naVTnnA90X..GpoymVAuZ6otInj/dXtYT5oxB.0fMlP1RUKCvKG','2018-09-30','2019-09-30',1,1,1,2,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
