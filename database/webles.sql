/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.12-MariaDB-1:10.4.12+maria~bionic-log : Database - weblesdb
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
(8,'3g02460f-oo1a-4de9-aa5b-ff811d5324b4','Quimica Sanguinea','Examenes Habilitados',0,'fa fa-thermometer-full',1,2,0,3),
(9,'2f02460f-ffla-4de9-aa5b-ff811d5324b4','Inmunologia y Serologia','Examenes Habilitados',1,'fa fa-bandcamp ',1,2,0,3),
(10,'4g03360f-ffla-2as8-aa5b-ff811d5324b4','Hormonas - Pruebas Funcionales','Examenes habilitados',0,'noimage.png',1,2,0,3),
(11,'5c01350g-bbcl-4de9-aa5b-de811d5324c3','Quienes Somos',NULL,2,'fa fa-window-maximize',1,5,1,1),
(12,'1b02460f-ac1a-3aa8-aa5b-de811d5324c3','Ultimas Noticias',NULL,0,'fa fa-newspaper-o',1,3,0,0),
(13,'2b01350g-cccl-4de9-aa5b-de811d5324c3','Redes Sociales',NULL,3,'fa fa-window-maximize',1,5,1,1),
(14,'6aa2460f-nn1a-4de9-aa5b-de811d5324c3','Homenajes',NULL,0,'fa fa-calendar',1,3,0,0),
(15,'5e03360f-nn1a-4de9-aa5b-de811d5324c3','Galeria',NULL,0,'fa fa-photo',1,3,0,0),
(16,'1g02460f-oo1a-4de9-aa5b-ff811d5324b4','Usuarios',NULL,0,'fa fa-window-maximize',1,5,1,1),
(17,'4f02460f-nn1a-4de9-aa5b-ff811d5324b4','Menu Principal',NULL,1,'fa fa-window-maximize',1,5,1,1),
(18,'3e02460f-ccal-4de9-aa5b-de811d5324c3','Servicios',NULL,4,'fa fa-window-maximize',1,5,1,1);

/*Table structure for table `confrs` */

DROP TABLE IF EXISTS `confrs`;

CREATE TABLE `confrs` (
  `confrsscode` smallint(6) NOT NULL AUTO_INCREMENT,
  `confrmscode` smallint(6) NOT NULL,
  `secconnuuid` char(36) NOT NULL,
  `confrsttitl` varchar(100) NOT NULL,
  `confrstdesc` text NOT NULL,
  `confrstlink` text DEFAULT NULL,
  `confrsyorde` tinyint(1) NOT NULL,
  `confrsvsmai` text DEFAULT NULL,
  `confrsvbigi` text DEFAULT NULL,
  `confrsdcrea` date DEFAULT NULL,
  `confrsdpubl` date DEFAULT NULL,
  `confrsbenbl` tinyint(1) NOT NULL,
  KEY `confrsscode` (`confrsscode`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `confrs` */

insert  into `confrs`(`confrsscode`,`confrmscode`,`secconnuuid`,`confrsttitl`,`confrstdesc`,`confrstlink`,`confrsyorde`,`confrsvsmai`,`confrsvbigi`,`confrsdcrea`,`confrsdpubl`,`confrsbenbl`) values 
(1,6,'3e05460f-ab1a-4de9-aa5b-de811d5324c3','Mision','Buscar el mejoremiento continuo en la atención a nuestros pacientes y en la calidad de los resultados comprometidos a cumplir con las expectativas de los clienetes.\n\nTener un compromiso de calidad e integridad permanente con nuestros pacientes, médicos, instituciones de salud y empresas.\n\nSer el Laboratorio de referencia en estudios endocrinológicos y genéticos a nivel departamental.',NULL,0,NULL,'1579289284.jpg','2019-11-26','2019-11-26',1),
(2,6,'2b03360f-ac1a-4de9-aa5b-de811d5324c3','Vision','Ser el laboratorio de referencia en el Departamento especializado en las diversas áreas, en especial estudios hormonales y geneticos, con personal altamente capacitado y lider en tecnología, a la vanguardia de nuevas técnicas a incorporarse, cumpliendo con las normativas vigentes en el Departamento y contando con un sistema de calidad certificado por Normas Internacionales en beneficio de la población.',NULL,1,NULL,'1579289303.jpg','2019-11-26','2019-11-26',1),
(3,6,'6e01830f-bbma-3de9-aa5b-de811d5324c3','Valores','Siempre tenemos como prioridad al paciente...',NULL,2,NULL,'1574347210.png','2019-11-26','2019-11-26',1),
(4,7,'3a15560f-amma-4de9-aa5b-de811d5324c3','Historia','Creación.\n\nLaboratorio LES nace el año 1995 en la ciudad de Santa Cruz, Bolivia, respaldado por un grupo de médicos y bioquímicos visionarios en ese entonces, conociendo las necesidades de la población y la posibilidad de aportar con mejores servicios a la sociedad en especial la realización de pruebas hormonales; ademas de pretender incursionar en el área de genética.\n\nEn el año 1998 inaugura sus propias instalaciones, donde permite brindar una mejor atención a los clientes.\n\nDesde su inicio, la filosofia de Laboratorio LES está basada en el mejoramiento continuo del recurso humano, científico y tecnológico el cual se actualiza día a día de acuerdo con las exigencias del momento y la demanda del servicio y nuestro Programa de Mejora Continua para entregar resultados, confiables y oportunos a la población.\n\nEsto nos ha consolidado como un grupo altamente capacitado en todas las áreas del diagnóstico clínico, preparado para brindar una atención que colme las expectativas de quienes utilizan nuestros servicios: Médicos, Clientes y empresas.',NULL,0,NULL,'1578665758.jpeg','2019-11-26','2019-11-26',1),
(5,7,'8f01830f-llma-3de9-aa5b-de811d5324c3','Directiva','La directiva del laboratorio, fiel a sus principios de honestidad y transparencia, esta compuesta de las siguientes personas:\n- Dra. Rima Ribera / Gerente General\n- Dra. Marilyn Camacho / Gerente Financiera\n- Dr. Mariano Parada / Gerente Administrativo',NULL,1,NULL,'1578666030.jpeg','2019-11-26','2019-11-26',1),
(6,12,'19b12f64-38d6-421c-a3b0-46885ecb11d4','RESULTADOS CONFIABLES','En Laboratorio Endogenética Santa Cruz #LES, contamos con Bioquímicos especialistas en cada area, todos nuestros profesionales son altamente capacitados, para brindarte Resultados confiables para ti y para los que amas.\n\nCONSULTA CON TU MEDICO ESPECIALISTA.!!',NULL,0,NULL,'1579015188.jpg',NULL,'2019-12-10',1),
(12,12,'4482c10a-cfd3-4d02-a4a0-7270f99f528d','PROCALCITONINA','El Citograma Nasal es una prueba de laboratorio útil para descartar o afirmar la presencia de alergias (rinitis) o bacterias, así como su agrupación.\n\nEs necesario acudir a la toma de la muestra sin aseo nasal, además de suspender medicamentos que pueden alterar el conteo de eosinófilos en moco nasal.\n\nConsulta a tu médico especialista\n#ESTAMOSPARAATENDERTE\nCENTRAL: Calle Sarah entre Cuellar y Seoane\nSUCURSAL: 3er. Anillo Externo, entre Av. Paraguá y Av. Canal Cotoca, Frente a la Emergencia del Hospital Japonés.',NULL,0,NULL,'1579031087.jpg',NULL,'2019-12-20',1),
(13,12,'c1d2bba0-18ea-4fa8-af9a-4a3110a31228','Amamos lo que hacemos','AMAMOS LO QUE HACEMOS #AMAMOSLOQUEHACEMOS\n\nPara tu mayor comodidad nos puedes encontrar en 3 lugares, ABRIMOS LOS 365 DIAS DEL AÑO EN NUESTRA SUCURSAL ESTE',NULL,0,NULL,'1579277361.png',NULL,'2020-01-17',1);

/*Table structure for table `conico` */

DROP TABLE IF EXISTS `conico`;

CREATE TABLE `conico` (
  `conicosicid` smallint(6) NOT NULL,
  `conicotdesc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`conicosicid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `conico` */

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
(2,2,'Section'),
(2,3,'Servicio'),
(3,0,'Principal'),
(3,1,'Secundario'),
(4,0,'Categoria'),
(4,1,'Servicio');

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
