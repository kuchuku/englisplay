/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `englishplay` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `englishplay`;

CREATE TABLE IF NOT EXISTS `avance` (
  `codigoEstudiante` double NOT NULL,
  `mundoAvance` int(11) NOT NULL,
  `nivelAvance` int(11) NOT NULL,
  PRIMARY KEY (`codigoEstudiante`),
  CONSTRAINT `Estudiante_Avance_codEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `avance` DISABLE KEYS */;
/*!40000 ALTER TABLE `avance` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `checkpoint` (
  `codigoEstudiante` double NOT NULL,
  `mundoCheckpoint` int(11) NOT NULL,
  `nivelCheckpoint` int(11) NOT NULL,
  `posXCheckpoint` float NOT NULL,
  `posYCheckpoint` float NOT NULL,
  `saludCheckpoint` float NOT NULL,
  `cajasMisionCheckpoint` float NOT NULL,
  `cajaMision1` int(11) DEFAULT NULL,
  `cajaMision2` int(11) DEFAULT NULL,
  `cajaMision3` int(11) DEFAULT NULL,
  `cajaMision4` int(11) DEFAULT NULL,
  `cajaMision5` int(11) DEFAULT NULL,
  `casaDesafio1` int(11) DEFAULT NULL,
  `casaDesafio2` int(11) DEFAULT NULL,
  `casaDesafio3` int(11) DEFAULT NULL,
  `casaDesafio4` int(11) DEFAULT NULL,
  `casaDesafio5` int(11) DEFAULT NULL,
  `casaDesafio6` int(11) DEFAULT NULL,
  `casaDesafio7` int(11) DEFAULT NULL,
  `casaDesafio8` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigoEstudiante`),
  CONSTRAINT `Estudiante_Checkpoint_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `checkpoint` DISABLE KEYS */;
/*!40000 ALTER TABLE `checkpoint` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `compra` (
  `codigoEstudiante` double NOT NULL,
  `idObjeto` int(11) NOT NULL,
  PRIMARY KEY (`codigoEstudiante`,`idObjeto`),
  KEY `Objeto_Compra_idObjeto` (`idObjeto`),
  CONSTRAINT `Estudiante_Compra_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoUsuario`),
  CONSTRAINT `Objeto_Compra_idObjeto` FOREIGN KEY (`idObjeto`) REFERENCES `objeto` (`idObjeto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `estadisticas` (
  `codEstudiante` int(11) NOT NULL,
  `nombreEstudiante` varchar(50) DEFAULT NULL,
  `examen` int(11) NOT NULL,
  `tema` int(11) NOT NULL,
  `puntuacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`codEstudiante`,`examen`,`tema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `estadisticas` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadisticas` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `estudiante` (
  `codigoUsuario` double NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `nickEstudiante` varchar(50) NOT NULL,
  PRIMARY KEY (`codigoUsuario`),
  KEY `Grupo_Estudiante_idGrupo` (`idGrupo`),
  CONSTRAINT `Grupo_Estudiante_idGrupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`),
  CONSTRAINT `Usuario_Estudiante_codigoUsuario` FOREIGN KEY (`codigoUsuario`) REFERENCES `usuario` (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` (`codigoUsuario`, `idGrupo`, `nickEstudiante`) VALUES
	(201255218, 50, ''),
	(201255229, 50, ''),
	(201513141, 50, ''),
	(201663714, 50, '');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreGrupo` varchar(50) NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` (`idGrupo`, `nombreGrupo`) VALUES
	(50, 'TG 1');
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `objeto` (
  `idObjeto` int(11) NOT NULL,
  `nombreObjeto` varchar(50) NOT NULL,
  `descripcionObjeto` varchar(500) NOT NULL,
  PRIMARY KEY (`idObjeto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `objeto` DISABLE KEYS */;
/*!40000 ALTER TABLE `objeto` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `personaje` (
  `codigoEstudiante` double NOT NULL,
  `sexoPersonaje` char(50) NOT NULL,
  `rolPersonaje` int(11) NOT NULL,
  `expPersonaje` float NOT NULL,
  `oroPersonaje` int(11) NOT NULL,
  `nivelPersonaje` int(11) NOT NULL,
  `skinGuerrero` int(11) DEFAULT NULL,
  `skinMago` int(11) DEFAULT NULL,
  `skinArquero` int(11) DEFAULT NULL,
  `armaGuerrero` int(11) DEFAULT NULL,
  `armaMago` int(11) DEFAULT NULL,
  `armaArquero` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigoEstudiante`),
  CONSTRAINT `Estudiante_Personaje_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `personaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `personaje` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pregunta` (
  `id` int(11) NOT NULL,
  `test` int(11) DEFAULT NULL,
  `capitulo` int(11) DEFAULT NULL,
  `pregunta` varchar(200) DEFAULT NULL,
  `respuesta` varchar(100) DEFAULT NULL,
  `elec1` varchar(100) DEFAULT NULL,
  `elec2` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `resultadodesafio` (
  `codigoEstudiante` double NOT NULL,
  `mundo` int(11) NOT NULL,
  `desafio` int(11) NOT NULL,
  `preguntas` int(11) NOT NULL,
  `correctas` int(11) NOT NULL,
  PRIMARY KEY (`codigoEstudiante`,`mundo`,`desafio`),
  KEY `Estudiante_ResultadoDesafio_codigoEstudiante` (`codigoEstudiante`),
  CONSTRAINT `Estudiante_ResultadoDesafio_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `resultadodesafio` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultadodesafio` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `resultadotest` (
  `idResultadoTest` int(11) NOT NULL,
  `codigoEstudiante` double NOT NULL,
  `mundoTest` int(11) DEFAULT NULL,
  `nivelTest` int(11) DEFAULT NULL,
  `calificacionTest` int(11) DEFAULT NULL,
  PRIMARY KEY (`idResultadoTest`,`codigoEstudiante`),
  KEY `Estudiante_ResultadoTest_codigoEstudiante` (`codigoEstudiante`),
  CONSTRAINT `Estudiante_ResultadoTest_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `resultadotest` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultadotest` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tema` (
  `idTema` varchar(50) NOT NULL,
  `contenido` varchar(10000) NOT NULL,
  PRIMARY KEY (`idTema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigoUsuario` double NOT NULL,
  `contraseniaUsuario` varchar(50) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`codigoUsuario`, `contraseniaUsuario`, `nombreUsuario`, `tipoUsuario`) VALUES
	(201255218, '', 'BUENO PEÑA ANDRES MAURICIO', 0),
	(201255229, '', 'NARANJO HERRERA JAVIER SIMÓN', 0),
	(201513141, '', 'ZAPATA CASTAÑO JORGE LEONARDO', 0),
	(201663714, '', 'QUINTERO CASTAÑO LUIS FERNANDO', 0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
