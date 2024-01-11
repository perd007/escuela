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
  `lugarNac` varchar(200) default NULL,
  `comunidad` varchar(200) default NULL,
  `hermanos` varchar(2) default NULL,
  `hermanosG` varchar(100) default NULL,
  `escuelaProc` varchar(100) default NULL,
  `poblacion` varchar(50) default NULL,
  `repitiente` varchar(2) default NULL,
  `materias` varchar(100) default NULL,
  `Nmaterias` varchar(2) default NULL,
  `materias2` varchar(100) default NULL,
  `fecha_nac` date NOT NULL,
  `id` int(11) NOT NULL auto_increment,
  `nombreR` varchar(50) NOT NULL,
  `cedulaR` int(11) NOT NULL,
  `sexoR` varchar(10) NOT NULL,
  `ocupacionR` varchar(100) default NULL,
  `fechaR` date default NULL,
  `viveR` varchar(2) default NULL,
  `cedulaP` varchar(10) default NULL,
  `nombreP` varchar(50) default NULL,
  `ocupacionP` varchar(100) default NULL,
  `fechaP` date default NULL,
  `viveP` varchar(2) default NULL,
  `cedulaM` varchar(10) default NULL,
  `nombreM` varchar(50) default NULL,
  `ocupacionM` varchar(100) default NULL,
  `fechaM` date default NULL,
  `viveM` varchar(2) default NULL,
  `Observacion` varchar(100) default NULL,
  `fechaI` date NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`alumno`
--

/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` (`cedula`,`nombre`,`apellido`,`enfermedad`,`sexo`,`edad`,`lugarNac`,`comunidad`,`hermanos`,`hermanosG`,`escuelaProc`,`poblacion`,`repitiente`,`materias`,`Nmaterias`,`materias2`,`fecha_nac`,`id`,`nombreR`,`cedulaR`,`sexoR`,`ocupacionR`,`fechaR`,`viveR`,`cedulaP`,`nombreP`,`ocupacionP`,`fechaP`,`viveP`,`cedulaM`,`nombreM`,`ocupacionM`,`fechaM`,`viveM`,`Observacion`,`fechaI`) VALUES 
 (147896541,'joseito','perdomo','urb alto carinagua','Masculino',12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2005-01-03',1,'',0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00'),
 (18456321,'luis miguel','mendez perdomo','ninguna','Masculino',9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2001-11-18',2,'',0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00'),
 (11111111,'luis miguel','perdomo briceÃ±o','Urb alto parima','Masculino',10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2005-11-08',4,'',0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00'),
 (1234567,'josefina','perdomo','urb. alto parima','Femenino',12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012-11-21',5,'',0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00');
INSERT INTO `alumno` (`cedula`,`nombre`,`apellido`,`enfermedad`,`sexo`,`edad`,`lugarNac`,`comunidad`,`hermanos`,`hermanosG`,`escuelaProc`,`poblacion`,`repitiente`,`materias`,`Nmaterias`,`materias2`,`fecha_nac`,`id`,`nombreR`,`cedulaR`,`sexoR`,`ocupacionR`,`fechaR`,`viveR`,`cedulaP`,`nombreP`,`ocupacionP`,`fechaP`,`viveP`,`cedulaM`,`nombreM`,`ocupacionM`,`fechaM`,`viveM`,`Observacion`,`fechaI`) VALUES 
 (657937,'juan carlos','perdomo','asma','Masculino',12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2009-11-09',6,'',0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00'),
 (15412369,'juan','perez','ninguna','Masculino',14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1990-11-13',7,'',0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00'),
 (18777888,'CARMEN','TORRES','NINGUNA','Femenino',14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2009-11-09',10,'',0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00'),
 (21543819,'marilin','mendez perez','puerto samariapo, eje carretero sur.','Femeninio',15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1996-11-01',11,'',0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00');
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE `asistencia` (
  `id_Asis` int(11) NOT NULL auto_increment,
  `cod_hist` int(11) NOT NULL,
  `lapso` int(11) NOT NULL,
  `mes` varchar(10) NOT NULL,
  `materia` int(11) NOT NULL,
  `dias_asis` int(11) NOT NULL,
  `dias_totales` int(11) NOT NULL,
  `periodo` varchar(15) NOT NULL,
  `grado` int(11) NOT NULL,
  `docente` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_Asis`),
  KEY `cod_hist` (`cod_hist`,`materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`asistencia`
--

/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` (`id_Asis`,`cod_hist`,`lapso`,`mes`,`materia`,`dias_asis`,`dias_totales`,`periodo`,`grado`,`docente`) VALUES 
 (1,4,1,'Septiembre',5,15,25,'',0,''),
 (2,3,1,'Octubre',3,51,78,'2011 - 2012',1,'juan Gamez'),
 (3,6,3,'Junio',26,27,30,'2010 - 2011',3,'jhexon cova');
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;


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
  `id_eduT` int(11) NOT NULL auto_increment,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(30) default NULL,
  `grado` int(11) NOT NULL,
  PRIMARY KEY  (`id_eduT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`educ_trabajo`
--

/*!40000 ALTER TABLE `educ_trabajo` DISABLE KEYS */;
INSERT INTO `educ_trabajo` (`id_eduT`,`nombre`,`descripcion`,`grado`) VALUES 
 (1,'DIBUJO',NULL,1),
 (2,'ARTESANIA',NULL,1),
 (3,'TECNICAS DE INVESTIGACION',NULL,1),
 (4,'BIBLIOTECA',NULL,1),
 (5,'AGRICULTURA',NULL,1),
 (6,'AGRICULTURA',NULL,2),
 (7,'DIBUJO',NULL,2),
 (8,'ARTESANIA',NULL,2),
 (9,'INFORMATICA',NULL,2),
 (10,'AGRICULTURA',NULL,3),
 (11,'INFORMATICA',NULL,3),
 (12,'BIBLIOTECA',NULL,3),
 (13,'CESTERIA',NULL,3);
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
  `mencion` varchar(50) default NULL,
  `actual` int(11) default NULL,
  PRIMARY KEY  (`cod_hist`),
  KEY `id_media` (`media`,`diversificado`),
  KEY `id_divers` (`diversificado`),
  KEY `id_alumno` (`id_alumno`),
  KEY `grado` (`grado`),
  CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`historial`
--

/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` (`cod_hist`,`media`,`diversificado`,`id_alumno`,`ano_escolar`,`grado`,`seccion`,`mencion`,`actual`) VALUES 
 (1,NULL,1,11111111,'2007 - 2008',4,'A','Auxiliar Docente',NULL),
 (2,NULL,1,1234567,'2008 - 2009',4,'B','Auxiliar Docente',NULL),
 (3,NULL,NULL,657937,'2011 - 2012',1,'C',NULL,NULL),
 (4,NULL,1,15412369,'2002 - 2005',4,'B','Administracion de Servicios en Salud',NULL),
 (5,NULL,1,11111111,'2008 - 2009',5,'A','Auxiliar Docente',1),
 (6,1,NULL,21543819,'2010 - 2011',3,'A',NULL,0),
 (7,NULL,1,21543819,'2011 - 2012',4,'A',NULL,1);
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  `grado` varchar(10) NOT NULL,
  `mencion` varchar(50) default NULL,
  PRIMARY KEY  (`id_materia`),
  KEY `grado` (`grado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`materia`
--

/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` (`id_materia`,`nombre`,`grado`,`mencion`) VALUES 
 (4,'CASTELLANO Y LITERATURA','1',NULL),
 (5,'INGLES','1',NULL),
 (6,'MATEMATICA','1',NULL),
 (7,'EST. DE LA NATURALEZA','1',NULL),
 (8,'HISTORIA DE VENEZUELA','1',NULL),
 (9,'EDUC. FAM. Y CIUDADANA','1',NULL),
 (10,'GEOGRAFIA GENERAL','1',NULL),
 (11,'EDUCACION ARTISTICA','1',NULL),
 (12,'EDUC. FISICA Y DEPORTE','1',NULL),
 (13,'LENGUA  AUTOCTONA','1',NULL),
 (14,'CASTELLANO Y LITERATURA','2',NULL),
 (15,'INGLES','2',NULL),
 (16,'MATEMATICA','2',NULL),
 (17,'EDUCACION PARA LA  SALUD','2',NULL),
 (18,'CIENCIAS BIOLOGICAS','2',NULL),
 (19,'HISTORIA DE VENEZUELA','2',NULL),
 (20,'HISTORIA UNIVERSAL','2',NULL),
 (21,'EDUCACION ARTISTICA','2',NULL),
 (22,'EDUC. FISICA Y DEPORTE','2',NULL),
 (23,'LENGUA AUTOCTONA','2',NULL),
 (24,'CASTELLANO Y LITERATURA','3',NULL),
 (25,'INGLES','3',NULL),
 (26,'MATEMATICA','3',NULL),
 (27,'CIENCIAS BIOLOGICAS','3',NULL),
 (28,'FISICA','3',NULL),
 (29,'QUIMICA','3',NULL),
 (30,'CATEDRA BOLIVARIANA','3',NULL),
 (31,'GEOGRAFIA DE VENEZUELA','3',NULL);
INSERT INTO `materia` (`id_materia`,`nombre`,`grado`,`mencion`) VALUES 
 (32,'EDUCACION FISICA Y DEPORTE','3',NULL),
 (33,'LENGUA AUTOCTONA','3',NULL),
 (34,'CASTELLANO Y LITERATURA','4','Auxiliar Docente'),
 (35,'INGLES','4','Auxiliar Docente'),
 (36,'MATEMATICA','4','Auxiliar Docente'),
 (37,'CIENCIAS BIOLOGICAS ','4','Auxiliar Docente'),
 (38,'PSICOLOGIA ','4','Auxiliar Docente'),
 (39,'HISTORIA DE VENEZUELA','4','Auxiliar Docente'),
 (40,'INSTRUCCION PREMILITAR','4','Auxiliar Docente'),
 (41,'INFORMATICA','4','Auxiliar Docente'),
 (42,'METODOLOGIA DE LA INVEST.','4','Auxiliar Docente'),
 (43,'DIDACTICA','4','Auxiliar Docente'),
 (44,'EDUCACION  AMBIENTAL ','4','Auxiliar Docente'),
 (45,'EDUC. FISICA Y DEPORTE ','4','Auxiliar Docente'),
 (46,'LECTO ESCRITURA ','4','Auxiliar Docente'),
 (47,'CASTELLANO Y LITERATURA ','5','Auxiliar Docente'),
 (48,'INGLES','5','Auxiliar Docente'),
 (49,'MATEMATICA','5','Auxiliar Docente'),
 (50,'LITERATURA VENEZOLANA ','5','Auxiliar Docente'),
 (51,'HISTORIA DE VENEZUELA ','5','Auxiliar Docente'),
 (52,'GEOGRAFIA ECONOMICA ','5','Auxiliar Docente');
INSERT INTO `materia` (`id_materia`,`nombre`,`grado`,`mencion`) VALUES 
 (53,'PSICOLOGIA EVOLUTIVA ','5','Auxiliar Docente'),
 (54,'INFORMATICA ','5','Auxiliar Docente'),
 (55,'INSTRUCCION PREMILITAR ','5','Auxiliar Docente'),
 (56,'CULTURA INDIGENA ','5','Auxiliar Docente'),
 (57,'EDUCAC.  FISICA Y DEPORTE ','5','Auxiliar Docente'),
 (58,'LEGISLACION EDUCATIVA ','5','Auxiliar Docente'),
 (59,'PRE- PASANTIA ','5','Auxiliar Docente'),
 (60,'CASTELLANO Y LITERATURA','4','Administracion de Servicios en Salud'),
 (61,'INGLES','4','Administracion de Servicios en Salud'),
 (62,'MATEMATICA','4','Administracion de Servicios en Salud'),
 (63,'CIENCIAS BIOLOGICAS','4','Administracion de Servicios en Salud'),
 (64,'FISICA','4','Administracion de Servicios en Salud'),
 (65,'QUIMICA','4','Administracion de Servicios en Salud'),
 (66,'HISTORIA DE VENEZUELA ','4','Administracion de Servicios en Salud'),
 (67,'INSTRUCCION PREMILITAR ','4','Administracion de Servicios en Salud'),
 (68,'INFORMATICA ','4','Administracion de Servicios en Salud'),
 (69,'EDUC. FISICA Y DEPORTE','4','Administracion de Servicios en Salud');
INSERT INTO `materia` (`id_materia`,`nombre`,`grado`,`mencion`) VALUES 
 (70,'LITERATURA VENEZOLANA','5','Administracion de Servicios en Salud'),
 (71,'INGLES','5','Administracion de Servicios en Salud'),
 (72,'MATEMATICA','5','Administracion de Servicios en Salud'),
 (73,'CIENCIAS BIOLOGICAS','5','Administracion de Servicios en Salud'),
 (74,'FISICA ','5','Administracion de Servicios en Salud'),
 (75,'QUIMICA ','5','Administracion de Servicios en Salud'),
 (76,'GEOGRAFIA ECONOMICA ','5','Administracion de Servicios en Salud'),
 (77,'HISTORIA DE VENEZUELA ','5','Administracion de Servicios en Salud'),
 (78,'INSTRUCCION PREMILITAR ','5','Administracion de Servicios en Salud'),
 (79,'INFORMATICA ','5','Administracion de Servicios en Salud'),
 (80,'EDUC.  FISICA Y DEPORTE','5','Administracion de Servicios en Salud'),
 (81,'PRE - PASANTIA ','5','Administracion de Servicios en Salud');
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
  `primer_lapso` int(11) default NULL,
  `segundo_lapso` int(11) default NULL,
  `tercer_lapso` int(11) default NULL,
  `definitivo` int(11) default NULL,
  `id_eduT` int(11) NOT NULL,
  `cod_hist` int(11) NOT NULL,
  PRIMARY KEY  (`cod_ET`),
  KEY `id_eduT` (`id_eduT`),
  KEY `cod_hist` (`cod_hist`),
  CONSTRAINT `notas_educ_trab_ibfk_1` FOREIGN KEY (`id_eduT`) REFERENCES `educ_trabajo` (`id_eduT`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `notas_educ_trab_ibfk_2` FOREIGN KEY (`cod_hist`) REFERENCES `historial` (`cod_hist`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`notas_educ_trab`
--

/*!40000 ALTER TABLE `notas_educ_trab` DISABLE KEYS */;
INSERT INTO `notas_educ_trab` (`cod_ET`,`primer_lapso`,`segundo_lapso`,`tercer_lapso`,`definitivo`,`id_eduT`,`cod_hist`) VALUES 
 (1,1,1,1,1,10,6),
 (2,2,2,2,2,11,6),
 (3,3,3,3,3,12,6),
 (4,4,4,4,4,13,6),
 (5,5,5,5,5,1,3),
 (6,11,11,11,11,2,3),
 (7,11,11,11,11,3,3),
 (8,11,11,11,11,4,3),
 (9,11,11,11,11,5,3);
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
INSERT INTO `notas_materias` (`cod_NM`,`lapso_1_70`,`lapso_1_30`,`lapso_2_70`,`lapso_2_30`,`lapso_3_70`,`lapso_3_30`,`definitiva`,`id_materia`,`cod_hist`) VALUES 
 (1,14,14,15,16,15,17,15,24,6),
 (2,13,16,15,17,17,14,15,25,6),
 (3,16,16,14,18,18,14,16,26,6),
 (4,12,17,16,14,17,14,15,27,6),
 (5,10,15,17,15,17,13,14,28,6),
 (6,10,13,15,13,12,14,12,29,6),
 (7,18,19,18,13,14,14,16,30,6),
 (8,17,12,11,18,14,13,14,31,6),
 (9,19,15,12,13,18,13,15,32,6),
 (10,15,13,15,16,10,14,13,33,6),
 (11,10,10,10,10,10,10,10,4,3),
 (12,1,1,1,1,1,1,1,5,3),
 (13,1,1,1,1,1,1,1,6,3),
 (14,1,1,1,1,1,1,1,7,3),
 (15,1,1,1,1,1,1,1,8,3),
 (16,1,1,1,1,1,1,1,9,3),
 (17,1,1,1,1,1,1,1,10,3),
 (18,1,1,1,1,1,1,1,11,3),
 (19,1,1,1,1,1,1,1,12,3),
 (20,20,20,20,20,20,20,20,13,3),
 (21,1,1,1,1,1,1,1,47,5),
 (22,1,1,1,1,1,1,1,48,5),
 (23,1,1,1,1,1,1,1,49,5),
 (24,1,1,1,1,1,1,1,50,5),
 (25,1,1,1,1,1,1,1,51,5),
 (26,1,1,1,1,1,1,1,52,5),
 (27,1,1,1,1,1,1,1,53,5),
 (28,1,1,1,1,1,1,1,54,5),
 (29,1,1,1,1,1,1,1,55,5),
 (30,1,1,1,1,1,1,1,56,5),
 (31,1,1,1,1,1,1,1,57,5);
INSERT INTO `notas_materias` (`cod_NM`,`lapso_1_70`,`lapso_1_30`,`lapso_2_70`,`lapso_2_30`,`lapso_3_70`,`lapso_3_30`,`definitiva`,`id_materia`,`cod_hist`) VALUES 
 (32,1,1,1,1,1,1,1,58,5),
 (33,1,1,1,1,1,1,1,59,5),
 (34,1,1,1,1,1,1,1,70,5),
 (35,1,1,1,1,1,1,1,71,5),
 (36,1,1,1,1,1,1,1,72,5),
 (37,1,1,1,1,1,1,1,73,5),
 (38,1,1,1,1,1,1,1,74,5),
 (39,1,1,1,1,1,1,1,75,5),
 (40,1,1,1,1,1,1,1,76,5),
 (81,1,1,1,1,1,1,1,34,1),
 (82,1,1,1,1,1,1,1,35,1),
 (83,1,1,1,1,1,1,1,36,1),
 (84,1,1,1,1,1,1,1,37,1),
 (85,1,1,1,1,1,1,1,38,1),
 (86,1,1,1,1,1,1,1,39,1),
 (87,1,1,1,1,1,1,1,40,1),
 (88,1,1,1,1,1,1,1,41,1),
 (89,1,1,1,1,1,1,1,42,1),
 (90,1,1,1,1,1,1,1,43,1),
 (91,1,1,1,1,1,1,1,44,1),
 (92,1,1,1,1,1,1,1,45,1),
 (93,1,1,1,1,1,1,1,46,1),
 (94,1,1,1,1,1,1,1,60,1),
 (95,1,1,1,1,1,1,1,61,1),
 (96,1,1,1,1,1,1,1,62,1),
 (97,1,1,1,1,1,1,1,63,1),
 (98,1,1,1,1,1,1,1,64,1),
 (99,1,1,1,1,1,1,1,65,1),
 (100,1,1,1,1,1,1,1,66,1);
/*!40000 ALTER TABLE `notas_materias` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`observaciones`
--

DROP TABLE IF EXISTS `observaciones`;
CREATE TABLE `observaciones` (
  `id_observacion` int(11) NOT NULL auto_increment,
  `primero` varchar(200) default NULL,
  `segundo` varchar(200) default NULL,
  `tercero` varchar(200) default NULL,
  `cod_hist` int(11) NOT NULL,
  PRIMARY KEY  (`id_observacion`),
  KEY `cod_hist` (`cod_hist`),
  CONSTRAINT `observaciones_ibfk_1` FOREIGN KEY (`cod_hist`) REFERENCES `historial` (`cod_hist`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`observaciones`
--

/*!40000 ALTER TABLE `observaciones` DISABLE KEYS */;
INSERT INTO `observaciones` (`id_observacion`,`primero`,`segundo`,`tercero`,`cod_hist`) VALUES 
 (46,'aaaaaaaaaaaaaaaaaaaaaa','bbbbbbbbbbbbbbbbbb','ccccccccccccccc',3),
 (47,'aaaaaaaaaaaaaaaaaaaaaa','bbbbbbbbbbbbbbbbbb','ccccccccccccccc',3),
 (48,'aaaaaaaaaaaaaaaaaaaaaa','bbbbbbbbbbbbbbbbbb','ccccccccccccccc',3),
 (49,'aaaaaaaaaaaaaaaaaaaaaa','bbbbbbbbbbbbbbbbbb','ccccccccccccccc',3),
 (50,'aaaaaaaaaaaaaaaaaaaaaa','bbbbbbbbbbbbbbbbbb','ccccccccccccccc',3),
 (51,'aaaaaaaaaaaaaaaaaaaaaa','bbbbbbbbbbbbbbbbbb','ccccccccccccccc',3),
 (52,'aaaaaaaaaaaaaaaaaaaaaa','bbbbbbbbbbbbbbbbbb','ccccccccccccccc',3),
 (53,'aaaaaaaaaaaaaaaaaaaaaa','bbbbbbbbbbbbbbbbbb','ccccccccccccccc',3),
 (54,'Debe aplicarse mas.',NULL,NULL,6),
 (55,'aaaaaaaaaaaaaaaaaaaaaa','bbbbbbbbbbbbbbbbbb','ccccccccccccccc',3),
 (56,NULL,NULL,NULL,5),
 (57,NULL,NULL,NULL,1),
 (58,NULL,NULL,NULL,1),
 (59,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `observaciones` ENABLE KEYS */;


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
 (16746722,'Yatmar Luz Patricia','briceÃ±o Rodriguez','medico',3,'Femeninio','Urb. alto carinagua'),
 (10234569,'carlos a','mendez ','chofer',4,'Masculino','puerto samariapo'),
 (9213546,'amelia','perez ','ama de casa',5,'Femenino','puerto samariapo, eje carretero sur.');
/*!40000 ALTER TABLE `representante` ENABLE KEYS */;


--
-- Table structure for table `escuela`.`seguridad`
--

DROP TABLE IF EXISTS `seguridad`;
CREATE TABLE `seguridad` (
  `id_seg` int(11) NOT NULL auto_increment,
  `usuario` varchar(10) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `modificar` int(11) default NULL,
  `consultar` int(11) default NULL,
  `registrar` int(11) default NULL,
  `eliminar` int(11) default NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `cedula` int(11) NOT NULL,
  `administrar` int(11) default NULL,
  PRIMARY KEY  (`id_seg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escuela`.`seguridad`
--

/*!40000 ALTER TABLE `seguridad` DISABLE KEYS */;
INSERT INTO `seguridad` (`id_seg`,`usuario`,`clave`,`modificar`,`consultar`,`registrar`,`eliminar`,`nombre`,`apellido`,`cedula`,`administrar`) VALUES 
 (1,'root','root',1,1,1,1,'jose carlos','perdomo herrera',17792270,1),
 (2,'elvis','1234',NULL,1,1,NULL,'elvis','rodriguez',1456987,NULL),
 (3,'admin','1234',NULL,1,NULL,NULL,'elvis','rodriguez',14569874,NULL);
/*!40000 ALTER TABLE `seguridad` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
