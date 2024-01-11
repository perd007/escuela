-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.27-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema escuela
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ escuela;
USE escuela;

--
-- Table structure for table `escuela`.`alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno` (
  `cedula` int(11) default NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `enfermedad` varchar(200) default NULL,
  `sexo` varchar(10) NOT NULL,
  `edad` int(11) NOT NULL,
  `fecha_nac` date NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  `representante` int(11) NOT NULL,
  `representante2` int(11) default NULL,
  `direccion` varchar(200) NOT NULL,
  `afinida` varchar(15) NOT NULL,
  `afinida2` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  KEY `representante` (`representante`),
  KEY `representante2` (`representante2`),
  KEY `cedula` (`cedula`),
  CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`representante`) REFERENCES `representante` (`cedula`) ON UPDATE CASCADE,
  CONSTRAINT `alumno_ibfk_4` FOREIGN KEY (`representante2`) REFERENCES `representante` (`cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`alumno`
--

/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` (`cedula`,`nombre`,`apellido`,`enfermedad`,`sexo`,`edad`,`fecha_nac`,`id`,`representante`,`representante2`,`direccion`,`afinida`,`afinida2`) VALUES 
 (147896541,'joseito','perdomo','urb alto carinagua','Masculino',12,'2005-01-03',1,17792270,NULL,'urb alto carinagua','padre',NULL),
 (18456321,'luis miguel','mendez perdomo','ninguna','Masculino',9,'2001-11-18',2,17792270,NULL,'urb la bolivariana','hermano',NULL),
 (11111111,'luis miguel','perdomo briceÃ±o','Urb alto parima','Masculino',10,'2005-11-08',4,17792270,NULL,'Urb alto parima','padre',NULL),
 (1234567,'josefina','perdomo','urb. alto parima','Femenino',12,'2012-11-21',5,17792270,NULL,'urb. alto parima','padre',NULL);
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`diversifivado`
--

DROP TABLE IF EXISTS `diversifivado`;
CREATE TABLE `diversifivado` (
  `id_divers` int(11) NOT NULL auto_increment,
  `seccion` varchar(1) NOT NULL,
  `ano_escolar` varchar(10) NOT NULL,
  `grado` varchar(5) NOT NULL,
  `mencion` varchar(15) NOT NULL,
  `cod_hist` int(11) NOT NULL,
  PRIMARY KEY  (`id_divers`),
  KEY `cod_hist` (`cod_hist`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`diversifivado`
--

/*!40000 ALTER TABLE `diversifivado` DISABLE KEYS */;
/*!40000 ALTER TABLE `diversifivado` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`educ_trabajo`
--

DROP TABLE IF EXISTS `educ_trabajo`;
CREATE TABLE `educ_trabajo` (
  `id_eduT` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(30) default NULL,
  `grado` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_eduT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`educ_trabajo`
--

/*!40000 ALTER TABLE `educ_trabajo` DISABLE KEYS */;
/*!40000 ALTER TABLE `educ_trabajo` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE `historial` (
  `cod_hist` int(11) NOT NULL auto_increment,
  `media` int(11) default NULL,
  `diversificado` int(11) default NULL,
  `id_alumno` int(11) NOT NULL,
  `ano_escolar` varchar(20) NOT NULL,
  `grado` int(11) NOT NULL,
  `seccion` varchar(2) NOT NULL,
  `mencion` varchar(10) default NULL,
  `id_eduT` int(11) default NULL,
  `actual` int(11) default NULL,
  PRIMARY KEY  (`cod_hist`),
  KEY `id_media` (`media`,`diversificado`),
  KEY `id_divers` (`diversificado`),
  KEY `id_alumno` (`id_alumno`),
  KEY `id_eduT` (`id_eduT`),
  KEY `grado` (`grado`),
  CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`historial`
--

/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` (`cod_hist`,`media`,`diversificado`,`id_alumno`,`ano_escolar`,`grado`,`seccion`,`mencion`,`id_eduT`,`actual`) VALUES 
 (1,NULL,1,11111111,'2007 - 2008',4,'A','Educacion',NULL,NULL);
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL auto_increment,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `grado` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_materia`),
  KEY `grado` (`grado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`materia`
--

/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` (`id_materia`,`nombre`,`descripcion`,`grado`) VALUES 
 (1,'matematica','o','4'),
 (2,'catellano','hablar bien','4');
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `seccion` varchar(1) NOT NULL,
  `ano_escolar` varchar(10) NOT NULL,
  `grado` varchar(5) NOT NULL,
  `id_eduT` int(11) NOT NULL,
  `cod_hist` int(11) NOT NULL,
  PRIMARY KEY  (`id_media`),
  KEY `id_eduT` (`id_eduT`),
  KEY `cod_hist` (`cod_hist`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`media`
--

/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`notas_educ_trab`
--

DROP TABLE IF EXISTS `notas_educ_trab`;
CREATE TABLE `notas_educ_trab` (
  `cod_ET` int(11) NOT NULL auto_increment,
  `programa1` int(11) default NULL,
  `programa2` int(11) default NULL,
  `programa3` int(11) default NULL,
  `programa4` int(11) default NULL,
  `definitivo` int(11) default NULL,
  `observaciones` int(11) default NULL,
  `id_eduT` int(11) NOT NULL,
  PRIMARY KEY  (`cod_ET`),
  KEY `id_eduT` (`id_eduT`),
  CONSTRAINT `notas_educ_trab_ibfk_1` FOREIGN KEY (`id_eduT`) REFERENCES `educ_trabajo` (`id_eduT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`notas_educ_trab`
--

/*!40000 ALTER TABLE `notas_educ_trab` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas_educ_trab` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`notas_materias`
--

DROP TABLE IF EXISTS `notas_materias`;
CREATE TABLE `notas_materias` (
  `cod_NM` int(11) NOT NULL auto_increment,
  `lapso_1_70` int(11) default NULL,
  `lapso_1_30` int(11) default NULL,
  `lapso_2_70` int(11) default NULL,
  `lapso_2_30` int(11) default NULL,
  `lapso_3_70` int(11) default NULL,
  `lapso_3_30` int(11) default NULL,
  `definitiva` int(11) default NULL,
  `id_materia` int(11) NOT NULL,
  `observacion` varchar(200) default NULL,
  `cod_hist` int(11) NOT NULL,
  PRIMARY KEY  (`cod_NM`),
  KEY `id_materia` (`id_materia`),
  KEY `cod_hist` (`cod_hist`),
  CONSTRAINT `notas_materias_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notas_materias_ibfk_2` FOREIGN KEY (`cod_hist`) REFERENCES `historial` (`cod_hist`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`notas_materias`
--

/*!40000 ALTER TABLE `notas_materias` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas_materias` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`representante`
--

DROP TABLE IF EXISTS `representante`;
CREATE TABLE `representante` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `id_representante` int(11) NOT NULL auto_increment,
  `sexo` varchar(10) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  PRIMARY KEY  (`id_representante`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`representante`
--

/*!40000 ALTER TABLE `representante` DISABLE KEYS */;
INSERT INTO `representante` (`cedula`,`nombre`,`apellido`,`profesion`,`id_representante`,`sexo`,`direccion`) VALUES 
 (17792270,'jose carlos','perdomo Herrera','ingeniero de sistemas',1,'Masculino','urb. la bolivariana, cuata vereda al final segunda casa\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r'),
 (16746722,'Yatmar Luz Patricia','briceÃ±o Rodriguez','medico',3,'Femeninio','Urb. alto carinagua');
/*!40000 ALTER TABLE `representante` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`seguridad`
--

DROP TABLE IF EXISTS `seguridad`;
CREATE TABLE `seguridad` (
  `id_seg` int(11) NOT NULL auto_increment,
  `usuario` varchar(10) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `modificar` varchar(2) NOT NULL,
  `consultar` varchar(2) NOT NULL,
  `registrar` varchar(2) NOT NULL,
  `eliminar` varchar(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `cedula` int(11) NOT NULL,
  PRIMARY KEY  (`id_seg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`seguridad`
--

/*!40000 ALTER TABLE `seguridad` DISABLE KEYS */;
/*!40000 ALTER TABLE `seguridad` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
