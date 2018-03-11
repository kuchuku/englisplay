-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.26-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para englishplay
CREATE DATABASE IF NOT EXISTS `englishplay` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `englishplay`;

-- Volcando estructura para tabla englishplay.avance
CREATE TABLE IF NOT EXISTS `avance` (
  `codigoEstudiante` double NOT NULL,
  `mundoAvance` int(11) NOT NULL,
  `nivelAvance` int(11) NOT NULL,
  PRIMARY KEY (`codigoEstudiante`),
  CONSTRAINT `Estudiante_Avance_codEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoEstudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.avance: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `avance` DISABLE KEYS */;
INSERT INTO `avance` (`codigoEstudiante`, `mundoAvance`, `nivelAvance`) VALUES
	(201255229, 4, 3);
/*!40000 ALTER TABLE `avance` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.checkpoint
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
  CONSTRAINT `Estudiante_Checkpoint_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoEstudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.checkpoint: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `checkpoint` DISABLE KEYS */;
INSERT INTO `checkpoint` (`codigoEstudiante`, `mundoCheckpoint`, `nivelCheckpoint`, `posXCheckpoint`, `posYCheckpoint`, `saludCheckpoint`, `cajasMisionCheckpoint`, `cajaMision1`, `cajaMision2`, `cajaMision3`, `cajaMision4`, `cajaMision5`, `casaDesafio1`, `casaDesafio2`, `casaDesafio3`, `casaDesafio4`, `casaDesafio5`, `casaDesafio6`, `casaDesafio7`, `casaDesafio8`) VALUES
	(201255229, 4, 1, 8.3075, -34.9895, 199, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `checkpoint` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `codigoEstudiante` double NOT NULL,
  `idObjeto` int(11) NOT NULL,
  PRIMARY KEY (`codigoEstudiante`,`idObjeto`),
  KEY `Objeto_Compra_idObjeto` (`idObjeto`),
  CONSTRAINT `Estudiante_Compra_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoEstudiante`),
  CONSTRAINT `Objeto_Compra_idObjeto` FOREIGN KEY (`idObjeto`) REFERENCES `objeto` (`idObjeto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.compra: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` (`codigoEstudiante`, `idObjeto`) VALUES
	(201255229, 1),
	(201255229, 2),
	(201255229, 3),
	(201255229, 7),
	(201255229, 13),
	(201255229, 19),
	(201255229, 25),
	(201255229, 31);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.estadisticas
CREATE TABLE IF NOT EXISTS `estadisticas` (
  `codEstudiante` int(11) NOT NULL,
  `examen` int(11) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `puntuacion` int(11) DEFAULT NULL,
  `nombreEstudiante` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codEstudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.estadisticas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estadisticas` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadisticas` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.estudiante
CREATE TABLE IF NOT EXISTS `estudiante` (
  `codigoEstudiante` double NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `nombreEstudiante` varchar(50) NOT NULL,
  `nickEstudiante` varchar(50) NOT NULL,
  `contraseniaEstudiante` varchar(50) NOT NULL,
  PRIMARY KEY (`codigoEstudiante`),
  KEY `Grupo_Estudiante_idGrupo` (`idGrupo`),
  CONSTRAINT `Grupo_Estudiante_idGrupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.estudiante: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` (`codigoEstudiante`, `idGrupo`, `nombreEstudiante`, `nickEstudiante`, `contraseniaEstudiante`) VALUES
	(1663714, 1, 'Luis Fernando Quintero', 'Sakasuki', '12345'),
	(201255229, 1, 'JAVIER SIMÓN NARANJO HERRERA', 'simon24', '12345');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.grupo
CREATE TABLE IF NOT EXISTS `grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreGrupo` varchar(50) NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.grupo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` (`idGrupo`, `nombreGrupo`) VALUES
	(1, 'Inglés I Sistemas Agosto-Diciembre 2017');
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.objeto
CREATE TABLE IF NOT EXISTS `objeto` (
  `idObjeto` int(11) NOT NULL,
  `nombreObjeto` varchar(50) NOT NULL,
  `descripcionObjeto` varchar(500) NOT NULL,
  PRIMARY KEY (`idObjeto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.objeto: ~36 rows (aproximadamente)
/*!40000 ALTER TABLE `objeto` DISABLE KEYS */;
INSERT INTO `objeto` (`idObjeto`, `nombreObjeto`, `descripcionObjeto`) VALUES
	(0, 'Espada 0', 'Attack +0'),
	(1, 'Espada 1', 'Attack +5'),
	(2, 'Espada 2', 'Attack +8'),
	(3, 'Espada 3', 'Attack +10'),
	(4, 'Espada 4', 'Attack +15'),
	(5, 'Espada 5', 'Attack +25'),
	(6, 'Cetro 0', 'Magical Attack +0'),
	(7, 'Cetro 1', 'Magical Attack +25'),
	(8, 'Cetro 2', 'Magical Attack +50'),
	(9, 'Cetro 3', 'Magical Attack +75'),
	(10, 'Cetro 4', 'Magical Attack +100'),
	(11, 'Cetro 5', 'Magical Attack +150'),
	(12, 'Arco 0', 'Attack +0'),
	(13, 'Arco 1', 'Attack +7'),
	(14, 'Arco 2', 'Attack +10'),
	(15, 'Arco 3', 'Attack +14'),
	(16, 'Arco 4', 'Attack +16'),
	(17, 'Arco 5', 'Attack +20'),
	(18, 'Skin Guerrero 0', 'Vitality +0 Life +0'),
	(19, 'Skin Guerrero 1', 'Vitality +25 Life +150'),
	(20, 'Skin Guerrero 2', 'Vitality +20 Life +200'),
	(21, 'Skin Guerrero 3', 'Vitality +40 Life +150'),
	(22, 'Skin Guerrero 4', 'Vitality +35 Life +220'),
	(23, 'Skin Guerrero 5', 'Vitality +50 Life +300'),
	(24, 'Skin Mago 0', 'Vitality +0 Life +0'),
	(25, 'Skin Mago 1', 'Vitality +15 Life +95'),
	(26, 'Skin Mago 2', 'Vitality +20 Life +110'),
	(27, 'Skin Mago 3', 'Vitality +25 Life +125'),
	(28, 'Skin Mago 4', 'Vitality +30 Life +140'),
	(29, 'Skin Mago 5', 'Vitality +40 Life +160'),
	(30, 'Skin Arquero 0', 'Vitality +0 Life +0'),
	(31, 'Skin Arquero 1', 'Vitality +20 Life +130'),
	(32, 'Skin Arquero 2', 'Vitality +25 Life +170'),
	(33, 'Skin Arquero 3', 'Vitality +30 Life +200'),
	(34, 'Skin Arquero 4', 'Vitality +35 Life +230'),
	(35, 'Skin Arquero 5', 'Vitality +40 Life +250');
/*!40000 ALTER TABLE `objeto` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.personaje
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
  CONSTRAINT `Estudiante_Personaje_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoEstudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.personaje: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `personaje` DISABLE KEYS */;
INSERT INTO `personaje` (`codigoEstudiante`, `sexoPersonaje`, `rolPersonaje`, `expPersonaje`, `oroPersonaje`, `nivelPersonaje`, `skinGuerrero`, `skinMago`, `skinArquero`, `armaGuerrero`, `armaMago`, `armaArquero`) VALUES
	(1663714, 'h', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
	(201255229, 'h', 0, 0, 8, 1, 1, 1, 1, 2, 1, 1);
/*!40000 ALTER TABLE `personaje` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.pregunta
CREATE TABLE IF NOT EXISTS `pregunta` (
  `id` int(11) NOT NULL,
  `test` int(11) DEFAULT NULL,
  `capitulo` int(11) DEFAULT NULL,
  `pregunta` varchar(100) DEFAULT NULL,
  `respuesta` varchar(100) DEFAULT NULL,
  `elec1` varchar(100) DEFAULT NULL,
  `elec2` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.pregunta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.profesor
CREATE TABLE IF NOT EXISTS `profesor` (
  `codigoProfesor` double NOT NULL,
  `contraseniaProfesor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codigoProfesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.profesor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.resultadodesafio
CREATE TABLE IF NOT EXISTS `resultadodesafio` (
  `idResultadoDesafio` int(11) NOT NULL,
  `codigoEstudiante` double NOT NULL,
  `mundoDesafio` int(11) NOT NULL,
  `nivelDesafio` int(11) NOT NULL,
  `calificacionDesafio` int(11) NOT NULL,
  `idDesafio` int(11) NOT NULL,
  PRIMARY KEY (`idResultadoDesafio`,`codigoEstudiante`),
  KEY `Estudiante_ResultadoDesafio_codigoEstudiante` (`codigoEstudiante`),
  CONSTRAINT `Estudiante_ResultadoDesafio_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoEstudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.resultadodesafio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `resultadodesafio` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultadodesafio` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.resultadotest
CREATE TABLE IF NOT EXISTS `resultadotest` (
  `idResultadoTest` int(11) NOT NULL,
  `codigoEstudiante` double NOT NULL,
  `mundoTest` int(11) DEFAULT NULL,
  `nivelTest` int(11) DEFAULT NULL,
  `calificacionTest` int(11) DEFAULT NULL,
  PRIMARY KEY (`idResultadoTest`,`codigoEstudiante`),
  KEY `Estudiante_ResultadoTest_codigoEstudiante` (`codigoEstudiante`),
  CONSTRAINT `Estudiante_ResultadoTest_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoEstudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.resultadotest: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `resultadotest` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultadotest` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.tema
CREATE TABLE IF NOT EXISTS `tema` (
  `idTema` varchar(50) NOT NULL,
  `contenido` varchar(10000) NOT NULL,
  PRIMARY KEY (`idTema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.tema: ~36 rows (aproximadamente)
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
INSERT INTO `tema` (`idTema`, `contenido`) VALUES
	('Adejtivos de una Sílaba', 'Para conjugar en su forma comparativa y superlativa los adjetivos de una sola sílaba, se utiliza la siguiente regla:'),
	('Adjetivos de dos Sílabas', 'En los adjetivos de dos sílabas o más se emplea el auxiliar <b>more</b> para comparativo de superioridad, <b>less</b> para comparativo de inferioridad.\r\nPara formar los superlativos se añade el auxiliar <b>the most</b> para superlativos de superioridad, y <b>the least</b> para superlativos de inferioridad. '),
	('Adjetivos Irregulares', 'existen adjetivos que no se pueden formar en grado comparativo ni en superlativo con las reglas que se han explicado; esto se debe a que son adjetivos irregulares que tienen su propia formar comparativa y superlativa.\r\n\r\n\r\n<b>Nota:</b> algunas cualidades no pueden variar en intensidad o grado porque son extremos, absolutos o adjetivos de clasificación. Estas cualidades no tienen forma comparativa o superlativa:\r\n<b>Extremos:</b> freezing (helado), excellent (excelente).\r\n<b>Absolutos:</b> dead(muerto), unique (único).\r\n<b>Clasificación:</b> married (casado), domestic (doméstico).\r\n'),
	('Comparativo de Igualdad', 'Con el adjetivo en el grado positivo, utilizamos la conjunción <b>“as…as”</b> para formar las comparaciones de igualdad. Ejemplos:'),
	('Comparativo de Inferioridad', 'Para formar este tipo de comparación podemos usar las conjunciones <b>“not as…as”</b> or <b>“less…than”</b>. En ambos casos, el adjetivo está en el grado positivo. Ejemplos:'),
	('Comparativo de Superioridad', 'En las comparaciones de superioridad, el adjetivo, que está en la forma comparativa (véase más adelante), es seguido por <b>“than”</b>. Ejemplos:'),
	('ConsonanteVocalConsonante', 'Aquellos adjetivos cuya terminación sea en <b>vocal + consonate + vocal</b>, su forma comparativa y superlativa se conjugan de la siguiente manera:'),
	('Futuro Continuo', '<b>FUTURO CONTINUO</b>\r\n\r\n<b>Forma:</b>\r\nPara formar el futuro continuo se utilizan <b>“will be”</b> o <b>“be going to”</b> y el <b>verbo+ing</b>.\r\n\r\n<b>Usos</b>\r\n\r\nA diferencia del futuro simple, las dos formas del futuro continuo significan casi lo mismo y son intercambiables. También, los usos del futuro continuo son los mismos del pasado continuo, pero en el futuro.\r\n\r\n<b>1.</b> El futuro continuo describe la acción que estará en desarrollo en el futuro y que será interumpida. El verbo que interrumpe está en presente simple.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. Jose <b>will be [Jose’s going to be] watching</b> the news when you call.(Jose estará mirando las noticias cuando le llames.)\r\nB. <b>Will</b> it <b>be [Is it going to be] raining</b> when l leave?(¿Estará lloviendo cuando salga?)\r\n\r\n<b>2.</b> Se usa el futuro continuo para hablar sobre acciones en un tiempo específico en el futuro.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. Paula <b>will be [Paula’s going to be] living</b> in Spain next April.(Paula estará viviendo en España el próximo abril.)\r\nB. We’<b>ll</b> still <b>be working</b> [ <b>We’re</b> still <b>going to be working</b>] at 10 o’clock tomorrow night.(Todavía estaremos trabajando a las 10 mañana por la noche.)\r\n'),
	('Futuro Continuo A', '<b>Futuro Continuo Afirmativo</b>\r\n\r\n<b>Estructura: Con Will(Sujeto + “will be” + verbo+ing…), Con Going To(Sujeto + verbo auxiliar (to be) + “going to be” + verbo+ing…)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nI will be talking. / I’m going to be talking.(Estaré hablando.)\r\nHe will be eating. / He’s going to be eating.(Etará comiendo.)\r\nThey will  be learning. / They’re going to be learning.(Estarán aprendiendo.)\r\n\r\n'),
	('Futuro Continuo I', '<b>Futuro Continuo Interrogativo</b>\r\n\r\n<b>Estructura: Con Will(Verbo auxiliar “will” + sujeto + "be"+ verbo+ing…?), Con Going To(Verbo auxiliar (“to be”) + sujeto + “going to be” + verbo+ing…?)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Will</b> you <b>be talking</b>? / <b>Are</b> you <b>going to be talking</b>?(¿Estarás hablando?)\r\nB. <b>Will</b> he <b>be eating</b>? / <b>Is</b> he <b>going to be eating</b>?(¿Estará comiendo?)\r\nC. <b>Will</b> they <b>be learning</b>? / <b>Are</b> they <b>going to be learning</b>?(¿Estarán aprendiendo?)\r\n\r\n<b>Nota:</b> En las frases interrogativas el sujeto va entre los verbos auxiliares <b>“will”</b> y <b>“be”</b> o entre <b>“to be”</b> y <b>“going to be”</b>.'),
	('Futuro Continuo N', '<b>Futuro Continuo Negativo</b>\r\n\r\n<b>Nota:</b> En las frases negativas el auxiliar negativo <b>“not”</b> va entre los verbos auxiliares <b>“will”</b> y <b>“be”</b> o entre <b>“to be”</b> y <b>“going to be”</b>.\r\n\r\n<b>Estructura: Con Will(Sujeto + “will not be” + verbo+ing…), Con Going To(Sujeto + verbo auxiliar (to be) + “ not going to be” + verbo+ing…)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nI will not [won\'t] be talking. / I’m not going to be talking.(No estaré hablando.)\r\nHe will not [won\'t] be eating. / He’s not going to be eating.(No estará comiendo.)\r\nThey will not [won\'t] be learning. / They’re not going to be learning.(No estarán aprendiendo.)\r\n\r\n'),
	('Futuro Simple', '<b>FUTURO SIMPLE</b>\r\n\r\n<b>Usos</b>\r\nLas formas <b>“will”</b> y <b>“going to”</b> se utilizan para expresar el futuro. La diferencia entre <b>“going to”</b> y <b>“will”</b> es el sentido de planificación y probabilidad de que suceda una acción. En general, se usa “going to” para planes concretos, cuando estamos seguros de que algo va a suceder.\r\n\r\n<b>1.</b> Se usa <b>“will”</b> con acciones voluntarias.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Will</b> you <b>help</b> me move?(¿Me ayudarás a mudarme?)\r\nB. They <b>will clean</b> their rooms.(Limpiarán sus habitaciones.)\r\nC. She <b>won’t work</b> with Paul.(No trabajará con Paul.)\r\n\r\n<b>2.</b> Se utiliza <b>“will”</b> para expresar una promesa.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. When I am president, I <b>will lower</b> taxes.(Cuando sea presidente, bajaré los impuestos.)\r\nB. He promises he <b>will call</b> when he arrives.(Promete que llamará cuando llegue.)\r\n\r\n\r\n<b>3.</b> Se usa <b>“going to”</b> para planes. Se indica la intención de hacer algo.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. We <b>are going to have</b> a party tonight.(Vamos a dar una fiesta esta noche.)\r\nB. Richard <b>is going to take</b> an English class.(Richard va a realizar un clase de inglés.)\r\nC. <b>Are</b> they <b>going to play</b> football later?(¿Van a jugar a fútbol luego?)\r\n\r\n<b>4.</b> Se puede usar “will” o “going to” para hacer predicciones. Cuando hay evidencia de que algo va a pasar usamos “going to”.\r\n\r\nA. It <b>will be</b> a great party. / It <b>is going to be</b> a great party.(Será una fiesta genial.)\r\nB. It <b>won’t rain</b>. / It <b>is not going to rain</b>.(No va a llover.)\r\n'),
	('Futuro Simple A', '<b>Futuro Simple Afirmativo</b>\r\n\r\n<b>Estructura: (Sujeto + “will” + verbo principal.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>will [I’ll] call</b> you tonight.(Te llamaré esta noche.)\r\nB. She <b>will [She’ll] arrive</b> late.(Llegará tarde.)\r\nC. They <b>will [They’ll] be</b> happy to see you.(Estarán felices de verte.)'),
	('Futuro Simple I', '<b>Futuro Simple Interrogativo</b>\r\n\r\n<b>Estructura: (“Will” + sujeto + verbo principal?)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Will</b> you <b>call</b> me tonight?(¿Me llamarás esta noche?)\r\nB. <b>Will</b> she <b>arrive</b> late?(¿Llegará tarde?)\r\nC. <b>Will</b> they <b>be</b> happy to see you?(¿Estarán felices de verte?)\r\n'),
	('Futuro Simple N', '<b>Futuro Simple Negativo</b>\r\n\r\n<b>Estructura: (Sujeto + “will” + “not” + verbo principal.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>will not [won’t] call</b> you tonight.(No te llamaré esta noche.)\r\nB. She <b>will not [won’t] arrive</b> late.(No llegará tarde.)\r\nC. They <b>will not [won’t] be</b> happy to see you.(No estarán felices de verte.)'),
	('Grado Comparativo', 'Al hacer comparaciones, podemos destacar la superioridad, inferioridad o igualdad de calidad de uno a otro.\r\nLa estructura de cada uno de estos grados de comparación es diferente.\r\n'),
	('Grado Positivo', 'Los <b>adjetivos</b> describen cualidades de los sustantivos; algunas de estas cualidades pueden variar en el grado o intensidad, ya que al igual que en español, cuando queremos hacer comparaciones contrastamos cualidades o atributos por medio de adjetivos en sus diversos grados.\r\n\r\n<b>Grado positivo:</b>\r\nEl grado positivo de los adjetivos, que hemos visto anteriormente, es la cualidad en el grado más simple. Ejemplos:\r\n'),
	('Grado Superlativo', 'El grado superlativo denota la calidad en el grado más alto y como en español, se usa <b>“the”</b> delante del adjetivo en la forma superlativa (véase más adelante). Ejemplos:\r\n'),
	('Pasado Continuo', '<b>PASADO CONTINUO</b>\r\n\r\n<b>Forma:</b>\r\n\r\nPara formar el pasado continuo se utiliza el verbo auxiliar <b>“to be”</b> y el <b>verbo+ing</b>. El verbo auxiliar <b>“to be”</b> está en el pasado simple, pero ten en cuenta que <b>“to be”</b> es un verbo irregular.\r\n\r\n<b>Usos</b>\r\n\r\n<b>1.</b> El pasado continuo se usa para una acción en desarrollo en el pasado cuando otra acción la interrumpe. La acción que interrumpe está en el pasado simple. <b>“When”</b> y <b>“while”</b> señalan el uso del pasado simple y continuo. En general, usamos el pasado simple directamente después de <b>“when”</b> y el pasado continuo después de <b>“while”</b>.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. Jose called while I <b>was watching</b> the news.(Jose llamó mientras estaba mirando las noticias.)\r\nB. He <b>was walking</b> to work when he fell.(Estaba caminando hacia su trabajo cuando se cayó.)\r\nC. <b>Was</b> it <b>raining</b> when you left?(¿Estaba lloviendo cuando te fuiste?)\r\n\r\n<b>2.</b> Se usa el pasado continuo para hablar sobre acciones en un tiempo específico en el pasado.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. Paula <b>wasn’t living</b> in Spain in 2005.(Paula no estaba viviendo en España en el 2005.)\r\nB. We <b>were</b> still <b>working</b> at 10 o’clock last night.(Todavía estábamos trabajando a las 10 anoche. )\r\n\r\n<b>3.</b> Se usa el pasado continuo para dos acciones que estaban ocurriendo al mismo tiempo en el pasado.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. My son <b>was reading</b> while I <b>was cooking</b>.(Mi hijo estaba leyendo mientras que yo estaba cocinando.)\r\nB. They <b>were talking</b> very loudly while we <b>were trying</b> to watch the movie.(Estaban hablando muy alto mientras nosotros estábamos intentando mirar la película.)\r\n'),
	('Pasado Continuo A', '<b>Pasado Continuo Afirmativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo auxiliar (to be) + verbo+ing.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>was talking</b>.(Estaba hablando.)\r\nB. He <b>was eating</b>.(Estaba comiendo.)\r\nC. They <b>were learning</b>.(Estaban aprendiendo.)\r\n'),
	('Pasado Continuo I', '<b>Pasado Continuo Interrogativo</b>\r\n\r\n<b>Estructura: (Verbo auxiliar (to be) + sujeto + verbo+ing?)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Were</b> you <b>talking</b>?(¿Estabas hablando?)\r\nB. <b>Was</b> he <b>eating</b>?(¿Estaba comiendo?)\r\nC. <b>Were</b> they <b>learning</b>?(¿Estaban aprendiendo?)\r\n'),
	('Pasado Continuo N', '<b>Pasado Continuo Negativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo auxiliar (to be) + auxiliar negativo (not) + verbo+ing.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>was not [wasn’t] talking</b>.(No estaba hablando.)\r\nB. He <b>was not [wasn’t] eating</b>.(No estaba comiendo.)\r\nC. They <b>were not [weren’t] learning</b>.(No estaban aprendiendo.)\r\n'),
	('Pasado Simple', '<b>PASADO SIMPLE</b>\r\n\r\n<b>Forma:</b> \r\n\r\nPara formar el pasado simple con verbos regulares, usamos el infinitivo y añadimos la terminación <b>“-ed”</b>. La forma es la misma para todas las personas (I, you, he, she, it, we, they).\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. want ->   wanted\r\nB. learn ->   learned\r\nC. stay ->   stayed\r\nD. walk ->   walked\r\nE. show ->   showed\r\n\r\n<b>Excepciones:</b>\r\n\r\n<b>1.</b> Para verbos que terminan en una <b>“e”</b>, sólo añadimos <b>“-d”</b>.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. change ->   changed\r\nB. believe ->   believed\r\n\r\n<b>2.</b> Si el verbo termina en una vocal corta y una consonante (excepto <b>“y”</b> o <b>“w”</b>), doblamos la consonante final.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. stop ->   stopped\r\nB. commit ->   committed\r\n\r\n\r\n<b>3.</b> Con verbos que terminan en una consonante y una <b>“y”</b>, se cambia la <b>“y”</b> por una <b>“i”</b>.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. study ->   studied\r\nB. try ->   tried\r\n\r\n<b>Usos</b>\r\n\r\n<b>1.</b> El pasado simple se utiliza para hablar de una acción concreta que comenzó y acabó en el pasado. En este caso equivale al pretérito indefinido español. Generalmente, lo usamos con adverbios de tiempo como <b>“last year”</b>, <b>“yesterday”</b>, <b>“last night”</b>…\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. Tom <b>stayed</b> at home last night.(Tom se quedó en casa anoche.)\r\nB. Kate <b>worked</b> last Saturday.(Kate trabajó el sábado pasado.)\r\nC. I <b>didn’t go</b> to the party yesterday.(No fui a la fiesta ayer.)\r\nD. <b>Did</b> they <b>walk</b> to school this morning?(¿Han andado a la escuela esta mañana?)\r\n\r\n<b>2.</b> Se usa el pasado simple para un serie de acciones en el pasado.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>received</b> the good news and immediately <b>called</b> my husband.(Recibí la buena noticia y llamé de inmediato a mi marido.)\r\nB. He <b>studied</b> for an hour in the morning, <b>worked</b> all afternoon and <b>didn’t return</b> home until 10 at night.(Estudió durante una hora por la mañana, trabajó toda la tarde y no regresó a casa hasta las 10 de la noche.)\r\n\r\n<b>3.</b> También lo usamos para acciones repetidas o habituales en el pasado, como se usa el pretérito imperfecto español.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. We always <b>traveled</b> to Cancun for vacation when we were young.(Siempre viajábamos a Cancun durante las vacaciones cuando éramos jóvenes.)\r\nB. He <b>walked</b> 5 kilometers every day to work.(Caminaba 5 kilómetros hasta el trabajo cada día.)\r\n\r\n<b>4.</b> Lo usamos para narraciones o acciones de períodos de largo tiempo en el pasado, como el pretérito imperfecto español.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>worked</b> for many years in a museum.(Trabajaba en un museo durante muchos años.)\r\nB. She <b>didn’t eat</b> meat for years.(No comía carne durante años.)\r\n\r\n<b>5.</b> Se utiliza para hablar de generalidades o hechos del pasado.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. The Aztec <b>lived</b> in Mexico.(Los aztecas vivían en México)\r\nB. I <b>played</b> the guitar when I was a child.(Tocaba la guitarra cuando era niño.)\r\n\r\n'),
	('Pasado Simple A', '<b>Pasado Simple Afirmativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo principal…)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. She <b>was</b> a doctor.(Era doctora.)\r\nB. The keys <b>were</b> in the drawer.(Las llaves estaban en el cajón.)\r\nC. I <b>wanted</b> to dance.(Quería bailar.)\r\nD. They <b>learned</b> English.(Aprendieron inglés.)\r\nE. We <b>believed</b> him.(Le creímos.)\r\nF. I <b>bought</b> a blue car.(Compré un coche azul.)'),
	('Pasado Simple I', '<b>Pasado Simple Interrogativo</b>\r\n\r\n<b>Estructura:</b>\r\n \r\nTo be: <b>(“To be” + sujeto…?)</b>\r\n\r\n<b>Ejemplos:</b>\r\nA. <b>Was</b> she a doctor?(¿Era doctora?)\r\nB. <b>Were</b> the keys in the drawer?(¿Estaban las llaves en el cajón?)\r\n\r\nTodos los demás verbos: <b>Verbo auxiliar (to do) + sujeto + verbo principal (en infinitivo)…?</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Did</b> you <b>want</b> to dance?(¿Querías bailar?)\r\nB. <b>Did</b> they <b>learn</b> English?(¿Aprendieron inglés?)\r\nC. <b>Did</b> you <b>believe</b> him?(¿Le creíste?)\r\nD. <b>Did</b> you <b>buy</b> a blue car?(¿Compraste un coche azul?)\r\n\r\n<b>Nota:</b> Al igual que en las frases negativas, el verbo auxiliar va en pasado <b>(“did”)</b> y el verbo principal se queda en el infinitivo.\r\n'),
	('Pasado Simple N', '<b>Pasado Simple Negativo</b>\r\n\r\n<b>Estructura: </b>\r\n\r\nTo be: <b>(Sujeto + “to be” + “not”…)</b>\r\n\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. She <b>wasn’t</b> a doctor.(Ella no era doctora.)\r\nB. The keys <b>weren’t</b> in the drawer.(Las llaves no estaban en el cajón.)\r\n\r\nTodos los demás verbos: <b>Sujeto + verbo auxiliar (to do) + “not” + verbo principal (en infinitivo)…</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>didn’t want</b> to dance.(No quería bailar.)\r\nB. They <b>didn’t learn</b> English.(No aprendieron inglés)\r\nC. We <b>didn’t believe</b> him.(No le creímos.)\r\nD. I <b>didn’t buy</b> a blue car.(No compré un coche azul.)\r\n<b>Nota:</b> En frases negativas, el verbo auxiliar va en pasado (“did”) y el verbo principal se queda en el infinitivo.\r\n'),
	('Presente Continuo', '<b>PRESENTE CONTINUO</b>\r\n\r\n<b>Forma:</b>\r\n\r\nPara formar el presente continuo se utiliza el verbo auxiliar <b>“to be”</b> y el <b>verbo+ing</b>.\r\n\r\n<b>Usos</b>\r\n<b>1.</b> El presente continuo se utiliza para hablar sobre algo que está pasando en el momento en el que hablamos.\r\n\r\n<b>Ejemplos:</b>\r\nA. <b>I’m studying</b> now.(Estoy estudiando ahora.)\r\nB. <b>He’s eating</b> at the moment.(Está comiendo en este momento.)\r\nC. <b>Is</b> it <b>raining</b>?(¿Está lloviendo?)\r\n\r\n<b>2.</b> También lo usamos para hablar de algo que está sucediendo en la actualidad pero no necesariamente cuando hablamos. En este caso, se utilizan expresiones de tiempo como <b>“currently”</b>, <b>“lately”</b> o <b>“these days”</b>.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>They’re learning</b> English.(Están aprendiendo inglés.)\r\nB. <b>She’s</b> currently <b>looking</b> for a job.(Actualmente está buscando un trabajo.)\r\nC. <b>Are</b> you <b>working</b> much lately?(¿Estás trabajando mucho últimamente?)\r\n\r\n<b>3.</b> Usamos el presente continuo para hablar de algo que está ya decidido que se hará en el futuro próximo. Su uso indica que es bastante seguro que lo planificado sucederá.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>I’m going</b> to the party tonight.(Voy a la fiesta esta noche.)\r\nB. <b>He’s not [He isn’t] coming</b> to class tomorrow.(No viene a la clase mañana.)\r\nC. <b>Are</b> you <b>working</b> next week?(¿Trabajas la semana que viene?)\r\n'),
	('Presente Continuo A', '<b>Presente Continuo Afirmativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo auxiliar (to be) + verbo+ing.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>I’m talking.</b>(Estoy hablando.)\r\nB. <b>He’s eating.</b>(Está comiendo.)\r\nC. <b>They’re learning.</b>(Están aprendiendo.)\r\n\r\n'),
	('Presente Continuo I', '<b>Presente Continuo Interrogativo</b>\r\n\r\n<b>Estructura: (Verbo auxiliar (to be) + sujeto + verbo+ing?)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Are</b> you <b>talking</b>?(¿Estás hablando?)\r\nB. <b>Is</b> he <b>eating</b>?(¿Está comiendo?)\r\nC. <b>Are</b> they <b>learning</b>?(¿Están aprendiendo?)\r\n'),
	('Presente Continuo N', '<b>Presente Continuo Negativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo auxiliar (to be) + auxiliar negativo (not) + verbo+ing.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>I’m not talking.</b>(No estoy hablando.)\r\nB. <b>He’s not [He isn’t] eating.</b>(No está comiendo.)\r\n'),
	('Presente Simple', '<b>PRESENTE SIMPLE</b>\r\n\r\n<b>Forma</b>\r\n\r\nPara conjugar el presente simple usamos el infinitivo para los sujetos <b>“I”</b>, <b>“you”</b>, <b>“we”</b> y <b>“they”</b> y para las terceras personas <b>“he”</b>, <b>“she”</b> y <b>“it”</b>, añadimos una <b>“-s”</b> al final del verbo.\r\n\r\n<b>Usos</b>\r\n<b>1.</b> El presente simple se utiliza para hablar de cosas que suceden habitualmente. A diferencia con el español, no se usa el presente simple para hablar sobre algo que está pasando en el momento en el que hablamos.\r\nSe suele utilizar el presente simple con adverbios de tiempo:\r\n\r\nA. <b>always</b> (siempre)\r\nB. <b>every</b> day (cada día)\r\nC. <b>usually</b> (normalmente)\r\nD. <b>often</b> (a menudo)\r\nE. <b>sometimes</b> (a veces)\r\nF. <b>rarely</b> (raramente), \r\nG. <b>hardly</b> ever (casi nunca)\r\nH. <b>never</b> (nunca)\r\n\r\n<b>Ejemplos:</b>\r\nA. I always <b>talk</b> to my mother on Sunday.(Siempre hablo con mi madre el domingo.)\r\nB. He never <b>eats</b> vegetables.(Nunca come las verduras.)\r\nC. They usually <b>learn</b> something new in class.(Normalmente aprenden algo nuevo en la clase.)\r\n\r\n<b>Excepción:</b>\r\nLos adverbios de tiempo van delante del verbo, excepto el verbo “to be” (ser/estar). Cuando se usa “to be” el verbo va delante del adverbio.\r\n\r\nA. I <b>am</b> always happy.(Siempre estoy contento.)\r\nB. He <b>is</b> often sick.(A menudo él está enfermo.)\r\nC. They <b>are</b> rarely late.(En raras ocasiones llegan tarde.)\r\n\r\n<b>2.</b> Se utiliza para hablar de generalidades o hechos científicos.\r\nEjemplos:\r\n\r\nA. He <b>does not [doesn’t]</b> eat vegetables.(Él no come verduras.)\r\nB. She <b>works</b> in a hospital.(Ella trabaja en una hospital.)\r\nC. Elephants <b>live</b> in Africa.(Los elefantes viven en África.)\r\nD. Bogota <b>is</b> in Colombia.(Bogotá está en Colombia.)\r\nE. <b>Do</b> children <b>like</b> animals?(¿Les gustan a los niños los animales?)\r\nF. Adults <b>do not [don’t]</b> know everything.(Los adultos no lo saben todo.)\r\n\r\n<b>3.</b> Se usa para eventos programados en el futuro próximo.\r\nEjemplos:\r\n\r\nA. The train <b>leaves</b> at 10:00.(El tren sale a las 10h.)\r\nB. The party <b>is</b> tonight.(La fiesta es esta noche.)\r\nC. <b>Does</b> the festival <b>start</b> tomorrow?(¿Empieza el festival mañana?)\r\nD. The plane <b>does not [doesn’t]</b> arrive today.(El avión no llega hoy.)\r\n\r\n4. Se usa para instrucciones (el imperativo).\r\n\r\nEjemplos:\r\nA. <b>Open</b> the window.(Abre la ventana.)\r\nB. <b>Eat</b> the vegetables.(Come las verduras.)\r\nC. <b>Don’t</b> cry.(No llores.)\r\nD. <b>Do</b> your homework.(Haz los deberes.)\r\nE. <b>Call</b> your mother.(Llama a tu madre.)\r\n\r\n'),
	('Presente Simple A', '<b>Presente Simple Afirmativo</b>\r\n\r\n<b>Estructura: (Sujeto + Verbo)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>talk</b>. (Yo hablo.)\r\nB. He <b>eats</b>. (Él come.)\r\nC. They <b>learn</b>. (Ellos aprenden.)'),
	('Presente Simple I', '<b>Presente Simple Interrogativo</b>\r\n\r\n<b>Estructura: (Verbo auxiliar (to do) + sujeto + verbo principal?)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Do</b> you talk?(¿Hablas tú?)\r\nB. <b>Does</b> he eat?(¿Come él?)\r\nC. <b>Do</b> they learn?(¿Aprenden ellos?)'),
	('Presente Simple N', '<b>Presente Simple Negativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo auxiliar (to do) + auxiliar negativo (“not”) + verbo.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>do not [don’t]</b> talk.(Yo no hablo.)\r\nB. He <b>does not [doesn’t]</b> eat.(Él no come.)\r\nC. They <b>do not [don’t]</b> learn.(Ellos no aprenden.)'),
	('Terminados en e', 'Para conjugar en su forma comparativa y superlativa los adjetivos que terminen en la vocal <b>e</b>, se utiliza la siguiente regla:'),
	('Terminados en Y', 'Para formar comparativos y superlativos en adjetivos de dos sílabas que terminen en <b>y</b>, se debe sustituir la y final por <b>i</b> y añadir <b>-er</b> si es para comparativo y <b>-est</b> si es para superlativo');
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
