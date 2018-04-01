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
  CONSTRAINT `Estudiante_Avance_codEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.avance: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `avance` DISABLE KEYS */;
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
  CONSTRAINT `Estudiante_Checkpoint_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.checkpoint: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `checkpoint` DISABLE KEYS */;
/*!40000 ALTER TABLE `checkpoint` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `codigoEstudiante` double NOT NULL,
  `idObjeto` int(11) NOT NULL,
  PRIMARY KEY (`codigoEstudiante`,`idObjeto`),
  KEY `Objeto_Compra_idObjeto` (`idObjeto`),
  CONSTRAINT `Estudiante_Compra_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoUsuario`),
  CONSTRAINT `Objeto_Compra_idObjeto` FOREIGN KEY (`idObjeto`) REFERENCES `objeto` (`idObjeto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.compra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.estadisticas
CREATE TABLE IF NOT EXISTS `estadisticas` (
  `codEstudiante` int(11) NOT NULL,
  `nombreEstudiante` varchar(50) DEFAULT NULL,
  `examen` int(11) NOT NULL,
  `tema` int(11) NOT NULL,
  `puntuacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`codEstudiante`,`examen`,`tema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.estadisticas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estadisticas` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadisticas` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.estudiante
CREATE TABLE IF NOT EXISTS `estudiante` (
  `codigoUsuario` double NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `nickEstudiante` varchar(50) NOT NULL,
  PRIMARY KEY (`codigoUsuario`),
  KEY `Grupo_Estudiante_idGrupo` (`idGrupo`),
  CONSTRAINT `Grupo_Estudiante_idGrupo` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`),
  CONSTRAINT `Usuario_Estudiante_codigoUsuario` FOREIGN KEY (`codigoUsuario`) REFERENCES `usuario` (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.estudiante: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` (`codigoUsuario`, `idGrupo`, `nickEstudiante`) VALUES
	(201255218, 1, ''),
	(201255229, 1, ''),
	(201513141, 1, ''),
	(201663714, 1, '');
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.grupo
CREATE TABLE IF NOT EXISTS `grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `codigoDocente` double DEFAULT NULL,
  `nombreGrupo` varchar(50) NOT NULL,
  PRIMARY KEY (`idGrupo`),
  KEY `Usuario_Grupo_codigoUsuario` (`codigoDocente`),
  CONSTRAINT `Usuario_Grupo_codigoUsuario` FOREIGN KEY (`codigoDocente`) REFERENCES `usuario` (`codigoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.grupo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` (`idGrupo`, `codigoDocente`, `nombreGrupo`) VALUES
	(1, 201255229, 'TG 1');
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
  CONSTRAINT `Estudiante_Personaje_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.personaje: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `personaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `personaje` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.pregunta
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

-- Volcando datos para la tabla englishplay.pregunta: ~120 rows (aproximadamente)
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
INSERT INTO `pregunta` (`id`, `test`, `capitulo`, `pregunta`, `respuesta`, `elec1`, `elec2`) VALUES
	(1, 0, 1, 'I __________ in a bank.', 'work', 'working', 'is working'),
	(2, 0, 1, 'Barbara __________ everyday.', 'runs', 'run', 'is running'),
	(3, 0, 1, 'He __________ in Canada.', 'doesn\'t live', 'not lives', 'don\'t live'),
	(4, 0, 1, 'We __________ English.', 'are studying', 'is studying', 'studys'),
	(5, 0, 1, 'What are you doing right now? I __________ my homework.\r\n', 'am doing', 'are doing', 'do'),
	(6, 0, 1, 'We __________ to the cinema next weekend', 'are going', 'is going', 'goes'),
	(7, 0, 1, 'He __________ next week.', 'isn\'t working', 'not is working', 'is working not'),
	(8, 0, 1, '________ the train _________ at 8:00?', 'Does, leave', 'Does, leaves', 'Do, leaves'),
	(9, 0, 1, '__________ to the party tonight?', 'Are you going', 'You go', 'Is you going'),
	(10, 0, 1, 'Michael __________ a new car.', 'wants', 'are wanting', 'want'),
	(11, 0, 1, 'Why ________ your sister _______? B: Because she has lost her teddy bear.', 'is / crying', 'does / cry', 'was / crying'),
	(12, 0, 1, '_______________ nowadays? B: He is studying at a university.', 'What is John doing', 'What does John do', 'What has John done'),
	(13, 0, 1, 'She usually listens to pop music but she _____________ to jazz these days.', 'is listening', 'listens', 'has listened'),
	(14, 0, 1, 'Bill ____ really hard at the moment because his company has just received a big order from China.', 'is working', 'works', 'is work'),
	(15, 0, 1, 'I ________ during rush hour.', 'will be driving', 'will have drive', 'will be drive'),
	(16, 1, 1, 'The skill of safe driving ___ necessary to avoid collisions, which ___ many thousands of people annually.', 'is / hurt', 'was / will hurt', 'would be / is hurt'),
	(17, 1, 1, 'As the doctor  ___ into the room the nurse  ___ him the temperature chart of the patient.', 'came / handed', 'was coming / will hand', 'comes / was handing'),
	(18, 1, 1, 'After natural gas  ___ out of the ground, it  ___ to a processing plant where it is cleaned of impurities', 'comes / goes', 'is coming / will go', 'will come / will go'),
	(19, 1, 1, 'When I  ___ to the park with my friend Jake, we  ___ fun because it was such a nice day.', 'went / had', 'would go / were having', 'was going / have'),
	(20, 1, 1, 'Anatomy  ___ the branch of biology that  ___ with the structure and organization of living things.', 'is / deals', 'will be / dealt', 'was / is dealing'),
	(21, 1, 1, 'She  ___ for her pen when she discovered that she  ___ it in her handbag all the time.', 'was looking / had', 'is looking / has', 'looked / would have'),
	(22, 1, 1, 'The robber ___ sure that no one ___ before he crept through the window.', 'made / was looking', 'was making / will look', 'makes / looks'),
	(23, 1, 1, 'We ___ warm clothes on the field trip because it was cool outside but we ___ take any of them out of the suitcase.', 'took / didn\'t have to', 'were taking / won\'t have to', 'will take / will have to'),
	(24, 1, 1, 'Most people ___ being disturbed while they ___ .', 'don\'t like / are working', 'would like / worked', 'like / worked'),
	(25, 1, 1, 'Although footballers mainly ___their feet to move the ball around, they ___any part of their bodies other than their hands or arms', 'use / may use', 'are using / used', 'used to use / used'),
	(26, 1, 1, 'The little girl ___to remain sitting under the table until her father ___home.', 'wanted / came', 'would want / will come', 'wants / will com'),
	(27, 1, 1, 'The lecturer ___the student who was the closest to the door to turn off the light when the film ___.', 'asked / started', 'is asking / is starting', 'would ask / starts'),
	(28, 1, 1, 'In ancient times, the status of manual laborers ___low as slaves ___most physical labor.', 'was / did', 'will be / was doing', 'is / would do'),
	(29, 1, 1, 'The digestive system ___a group of organs that ___primarily to convert ingested food into metabolically useful substances.', 'is / function', 'is / will function', 'will be / function'),
	(30, 1, 1, 'Mrs Grant absentmindedly ___the umbrella that ___on the seat before her.\r\n', 'took / was hanging', 'would take / is hanging', 'was taking / will hang'),
	(31, 0, 2, 'In the evenings, I often play chess with my next door neighbor. I ___chess with him ever since I ___to live here ten years ago.', 'have been playing / came', 'play / came', 'have been playing / have come'),
	(32, 0, 2, 'Ann ___ her driving test because she\'s so bad at reversing. But she ___ reversing since last week and I think she has got a bit better at it.', 'has failed / has been practicing', 'failed / practiced', 'fails / practices'),
	(33, 0, 2, 'I have been waiting for the prices of the houses to come down before buying one, but I think I ___too long and the prices ___to go up again.', 'have waited / are beginning', 'wait / began', 'am waiting / are beginning'),
	(34, 0, 2, 'Last year, I experienced how tedious long plane trips could be. I ___In an airplane for fairly long distances before that, but never as long as when I went to Australia last June.', 'had flown', 'didn\'t fly', 'have never flown'),
	(35, 0, 2, 'Alex ___ alone.', 'Hasn’t traveled', 'will have to traveled', 'Haven’t traveled'),
	(36, 0, 2, 'John ___ to London two weeks before', 'had gone', 'have go', 'have gone'),
	(37, 0, 2, 'She ____ ____ her homework\r\n', 'has, finished.', 'have, finished', 'hasn’t, finish'),
	(38, 0, 2, 'Had you been ____ in that firm for many years?.', 'working', 'worked', 'work'),
	(39, 0, 2, 'This bicycle ___In our family for fourteen years. My father used it for the first five years, my brother rode it for the next five and I ___ it for the last four.', 'has been / have had', 'had been / had', 'is / have had'),
	(40, 0, 2, 'It\'s a great pity you didn\'t come to London with us last summer, As you ___ it before, it ---- a wonderful holiday for you.', 'hadn\'t seen / would have been', 'have never seen / will surely be', 'didn\'t see / has been'),
	(41, 0, 2, 'Yesterday at a restaurant, I saw Sally, an old friend of mine. I had not see n her for years. At first, I ___ her because she ___ at least 20 kilos.', 'didn\'t recognize / had lost', 'didn\'t recognize / will lose', 'didn\'t recognize / lost'),
	(42, 0, 2, 'Our committee is trying to raise money to buy a new lifeboat. By the end of the year, we ___ out 5.000 letters asking for contributions.', ' will have sent', 'will have been sending', 'will send'),
	(43, 0, 2, 'Most of the patient visits ___  to physician assistants in the recent years all around the world.', 'have been made', 'will have been made', 'was made'),
	(44, 0, 2, 'These differences between two photographs ___  with the help of Photoshop.', 'could have been removed', 'have to remove', 'should remove'),
	(45, 0, 2, 'No clinical studies ___  in this child disease research so far.', 'have been completed', 'had to complete', 'have completed'),
	(46, 1, 2, 'If you would like to know what ____ in the project so far, you ____ the full report at our website.', 'has been completed / can find', 'was completed / had been found', 'completed / will be found'),
	(47, 1, 2, 'These clothes ___  for daily use so you ___  them wherever you want.', 'are designed / can wear', 'were designed / could be worn', 'design / should be worn'),
	(48, 1, 2, 'A more developed model of this car ___  in the showroom soon.', 'will be shown', 'is going to show', 'was shown'),
	(49, 1, 2, 'The government ___ that the tasks ___  with great success.', 'confirms / have been maintained', 'is confirming / maintained', 'was confirmed / have maintained'),
	(50, 1, 2, 'With this comprehensive international report, the country\'s position in the regional and global arena ___  with measurable criteria.', 'will be identified', 'identified', 'identifies'),
	(51, 1, 2, 'The critics ___  that the review ___ as a book in English and in many other languages.', 'say / can be published', 'are said / could be published', 'said / may be published'),
	(52, 1, 2, 'New legislation ___  in congress but it ___  by many.', 'was introduced / wasn\'t accepted', 'introduced / didn\'t accept', 'will be introduced / isn\'t accepted'),
	(53, 1, 2, 'The painting that ___ by Picasso ___  worth of exhibition in the art gallery.', 'was made / was considered', 'was making / being considered', 'made / considered'),
	(54, 1, 2, 'All the songs on this new album ___  by Lisa herself, and the album ___  live during her recent successful concert tour.', 'were written / was recorded', 'wrote / recorded', 'written / recorded'),
	(55, 1, 2, 'It ___ that the victim ___ with poison.', 'was thought / had been killed', 'is thought / has killed', 'is thought / must killed'),
	(56, 1, 2, 'It ___ that too little money ___ by the government on roads.', 'is being said / is being spent', 'has been said / is spending', 'was said / spent'),
	(57, 1, 2, 'Mary ___ the mechanic ___ her car yesterday.', 'got / to repair', 'had / to repair', 'will have / repair'),
	(58, 1, 2, 'My bike which ___  was brought back only when a 20-pound-reward ___ ', 'was stolen / was offered', 'has been stolen / has been offered', 'stole / offered'),
	(59, 1, 2, 'The criminal ___ for further questioning but as he had a heart attack during the first questioning he ___ to hospital for a week.', 'was to have been held / was sent', 'has been held / has been sent', 'has held / was sent'),
	(60, 1, 2, 'Look at Susan\'s fair hair. She has had it ___ .', 'dyed', 'being dyed', 'to dye'),
	(61, 0, 3, 'They live ___ Atlantic Avenue.', 'on', 'in', 'at'),
	(62, 0, 3, 'Tokyo is the most crowded city ___ the world.', 'in', 'at', 'on'),
	(63, 0, 3, 'Don\'t walk ___ the street! Walk here ___ the sidewalk.', 'in / on', 'on / at', 'at / on\r\n'),
	(64, 0, 3, 'I\'m going to meet my friends, ___ Times Square tonight.', 'in', 'on', 'over'),
	(65, 0, 3, 'He tried to open the tin ___ a knife.', 'with', 'by', 'to'),
	(66, 0, 3, 'Mike is sitting ___ the desk ___ front of the door.', 'at / in', 'in / on', 'on / on'),
	(67, 0, 3, 'Listen! I think there is someone ___ the front door.', 'at', 'on', 'in'),
	(68, 0, 3, 'There\'s paper ___ the floor. Please put it ___ the wastebasket.', 'on / in', 'on / at', 'at / into'),
	(69, 0, 3, 'See you ___ Monday morning.', 'on', 'at', 'in'),
	(70, 0, 3, 'We are giving him a surprise party ___ his birthday.', 'on', 'with', 'in'),
	(71, 0, 3, 'A dictionary has information ___ words.', 'about', 'to', 'in'),
	(72, 0, 3, 'You\'ll find the poem ___ page 16', 'on', 'over', 'in'),
	(73, 0, 3, 'I\'ll call you ___ seven o\'clock.\r\n', 'at', 'of', 'on'),
	(74, 0, 3, 'We\'ll go ___ Caribbeans ___ June.', 'to / in', 'at / on', 'to / on'),
	(75, 0, 3, 'I was born ___ September 9th.', 'on', 'in', 'at'),
	(76, 1, 3, 'I talked to him ________ the weekend.', 'on', 'at', 'in'),
	(77, 1, 3, 'The dog is ________ the doghouse.', 'in', 'at', 'on'),
	(78, 1, 3, 'I eat breakfast ________ the morning', 'in', 'at', '0n'),
	(79, 1, 3, 'We arrived ________ the airport in the evening.', 'at', 'in', 'on'),
	(80, 1, 3, 'I woke up ___ five o\'clock ___ the morning.', 'at / in', 'at / at', 'at / on'),
	(81, 1, 3, 'The weather is pleasant here ___ the spring.', 'in', 'on', 'at'),
	(82, 1, 3, 'They met ___ Miami ___ 2004.', 'in / in', 'at / in', 'to / in'),
	(83, 1, 3, 'My friends will be there ___ two or three hours.', 'in', 'on', 'at'),
	(84, 1, 3, 'The plane will stay on the runway ___ five minutes.', 'for', 'in', 'on'),
	(85, 1, 3, 'She graduated from the university ___ 1969.', 'in', 'for', 'on'),
	(86, 1, 3, 'Are you going to study ___ the afternoon or ___ night?', 'in / at', 'at / in', 'in / in'),
	(87, 1, 3, '___ university is ___ institution of higher education.', 'a / an', 'the / the', 'an / a'),
	(88, 1, 3, 'I can\'t hear very well. Please turn the radio ___ .', 'up', 'down', 'on'),
	(89, 1, 3, 'Put the book ________ the table.', 'on', 'in', 'at'),
	(90, 1, 3, 'He is currently ________ vacation.', 'on', 'in', 'at'),
	(91, 0, 4, 'Your blue skirt is ___  the one you\'ve got on, Mary; why don\'t you change into it?', 'much nicer than', 'as better as', 'more expensive than'),
	(92, 0, 4, 'He\'s one of ___ people I\'ve ever met. He never stops talking and never says anything ___ .', 'the most boring / interesting', 'the least bored / interested', 'the more bored / interested'),
	(93, 0, 4, 'You looked ___ this morning but you look ___ now.', 'depressed / a bit happier', 'a bit happier / more depressing', 'depressed / much happy'),
	(94, 0, 4, '___ electricity you use, ___ your bill will be.', 'The more / the higher', 'The less / the higher', 'The most / the lowest'),
	(95, 0, 4, 'It\'s ___ to learn a foreign language in the country where it is spoken than in another country.', 'a lot easier', 'much easy', 'easiest'),
	(96, 0, 4, '___ a room is, ___ it is likely to be.', 'The more expensive / the more comfortable', 'The most expensive / the most comfortable', 'The most expensive / more comfortable'),
	(97, 0, 4, 'The fault in the engine is ___ this time than it was the last time.', 'much more serious', 'as serious as', 'so serious that'),
	(98, 0, 4, 'Minicomputers are _______ than mainframes.', 'less expensive', 'less expensiver', 'less expensivest'),
	(99, 0, 4, 'The politician spoke __ than was necessary.', 'louder', 'more louderst', 'the more louder'),
	(100, 0, 4, 'Bill gates is one of __ men in the world.', 'the richest', 'the richer', 'richert'),
	(101, 0, 4, 'Luis hates to clean. He has ___ apartment I’ve ever seen.', 'the dirtiest', 'dirtest', 'dirtyest'),
	(102, 0, 4, 'Supposedly, digital voice discs, or DVDs as they are called, are ___ resistant to scratching ___ records.', 'far more / than', 'such / that', 'so / as'),
	(103, 0, 4, 'I don\'t have ___ much time for reading ___ I would like to.', 'as / as', 'more / than', 'so / that'),
	(104, 0, 4, 'English is today the third ___ native language worldwide after Chinese and Hindi, with some 380 million speakers.', 'most spoken', 'the least spoken', 'much spoken'),
	(105, 0, 4, 'My students\' sleepless nights became ___ as the finals approached.', 'more frequent', 'as frequent', 'so frequently'),
	(106, 1, 4, 'It is often said that the hyena is an aggressive animal, but in fact it is not ___ many people believe.', 'so vicious as', 'more viciously than', 'as viciously as'),
	(107, 1, 4, 'The cupboard was ___ big ___ fit through the door, so we had to take it apart first.', 'too / to', 'more / than', 'so / that'),
	(108, 1, 4, 'The roots of the old tree spread out ___ thirty meters in all directions and damaged nearby buildings.', 'as much as', 'so much', 'too much'),
	(109, 1, 4, 'According to the recent election\'s results, the Democrats are ___ of the four main political parties.', 'the smallest', 'much smaller', 'smaller'),
	(110, 1, 4, 'Ever since the use of natural gas became widespread, London isn\'t ___ a polluted city ___ it was ten years ago.', 'such / as', 'as / as', 'as / as'),
	(111, 1, 4, 'The plot of the novel was ___ it was completely incomprehensible.', 'so complicated that', 'much more complicated than', 'so complicated as'),
	(112, 1, 4, 'The Mediterranean Sea, which means \'in the midst of lands\' In Latin, is the world\'s ___ inland sea and surrounded by Europe, Asia, and Africa.', 'largest', 'as large', 'the largest'),
	(113, 1, 4, 'The new language school has a ___ exam pass rate than the other schools in the area.', 'higher', 'so high', 'the highest'),
	(114, 1, 4, 'This machine is ___ of the two models in the shop, so you should buy that one.', 'the most modern', 'as modern as', 'more modern'),
	(115, 1, 4, 'Cars are becoming ___ damaging to the environment ___ factory chimneys.', 'as / as', 'so / that', 'so / as'),
	(116, 1, 4, 'People in this country live ___ anybody else in the world.', 'longer than', 'the longest', 'long as'),
	(117, 1, 4, 'His qualifications are ___ than those of any other candidate.', 'better', 'good enough', 'the best'),
	(118, 1, 4, 'I could have found the place ___ if I had a map.', 'more easily', 'more easier', 'as easily'),
	(119, 1, 4, 'The crisis we are facing now is ___ than any of the previous ones.', 'more serious', 'seriously', 'as serious'),
	(120, 1, 4, 'She is ___ than Rose and has more to think about.', 'more thoughtful', 'so thoughtful', 'such a thoughtful');
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.resultadodesafio
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
  CONSTRAINT `Estudiante_ResultadoTest_codigoEstudiante` FOREIGN KEY (`codigoEstudiante`) REFERENCES `estudiante` (`codigoUsuario`)
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

-- Volcando datos para la tabla englishplay.tema: ~68 rows (aproximadamente)
/*!40000 ALTER TABLE `tema` DISABLE KEYS */;
INSERT INTO `tema` (`idTema`, `contenido`) VALUES
	('Adejtivos de una Sílaba', 'Para conjugar en su forma comparativa y superlativa los adjetivos de una sola sílaba, se utiliza la siguiente regla:'),
	('Adjetivos de dos Sílabas', 'En los adjetivos de dos sílabas o más se emplea el auxiliar <b>more</b> para comparativo de superioridad, <b>less</b> para comparativo de inferioridad.\r\nPara formar los superlativos se añade el auxiliar <b>the most</b> para superlativos de superioridad, y <b>the least</b> para superlativos de inferioridad. '),
	('Adjetivos Irregulares', 'existen adjetivos que no se pueden formar en grado comparativo ni en superlativo con las reglas que se han explicado; esto se debe a que son adjetivos irregulares que tienen su propia formar comparativa y superlativa.\r\n\r\n\r\n<b>Nota:</b> algunas cualidades no pueden variar en intensidad o grado porque son extremos, absolutos o adjetivos de clasificación. Estas cualidades no tienen forma comparativa o superlativa:\r\n<b>Extremos:</b> freezing (helado), excellent (excelente).\r\n<b>Absolutos:</b> dead(muerto), unique (único).\r\n<b>Clasificación:</b> married (casado), domestic (doméstico).\r\n'),
	('Agregar Informacion', '<b>CONECTORES</b>\r\n\r\nLinking words, también conocidos como “connectors”, son palabras que vinculan o relacionan dos ideas, dentro de una oración (conectando dos cláusulas) o dentro de un párrafo (conectando dos frases).\r\n\r\nLos linking words o conectores, tienen varias funciones, tales como contrastar información, hacer comparaciones, agregar información o dar razones o explicaciones. Si usamos incorrectamente estas palabras podemos cambiar completamente el significado de la frase y puede causar confusión. Por lo tanto, es importante tener una buena comprensión de los diversos significados y usos de estas palabras. Mediante el uso de linking words mejoramos el nivel de inglés ya que nos permiten expresarnos de manera más compleja. Las siguientes lecciones proporcionan una explicación de las diferentes funciones de relacionar palabras y las reglas gramaticales para su uso.\r\n\r\n<b>AGREGAR INFORMACIÓN</b>\r\n\r\nLa siguiente lista incluye linking words que se utilizan para agregar o proporcionar más información.\r\n\r\n<b>AND</b>\r\n\r\nTraducido como ‘y’, esta linking word es la más común para añadir información. “And” se utiliza en oraciones, con frecuencia en listas separadas por comas, aunque nunca se utiliza una coma antes ni después de “and”.\r\n\r\n<b>ALSO</b>\r\n\r\n“Also”, o ‘también’ en español, se utiliza entre el sujeto y el verbo para dar información adicional o para dar énfasis.\r\n\r\n<b>IN ADDITION</b>\r\n\r\nCon frecuencia se encuentra al principio de una oración, “in addition” (‘además’ en español) se usa para añadir información a la oración anterior.\r\n\r\n<b>AS WELL AS</b>\r\n\r\nEsta linking word, traducida como ‘además de’ en español, puede utilizarse al principio o en medio de una frase.\r\n\r\n<b>TOO</b>\r\n\r\nToo” puede encontrarse al final de una oración o entre el sujeto y el verbo; significa ‘también’.\r\n\r\n<b>BESIDES</b>\r\n\r\nGeneralmente se encuentra al principio de una oración, “besides” tiene un significado muy similar a “as well”.\r\n\r\n<b>FURTHERMORE</b>\r\n\r\nEsta linking word se traduce como ‘además’, pero es más formal. Agrega información adicional a una idea y se encuentra generalmente al principio de una frase.\r\n\r\n<b>MOREOVER</b>\r\n\r\nComo “furthermore”, este añade información adicional a una idea y se encuentra generalmente al principio de una frase.'),
	('Comparativo de Igualdad', 'Con el adjetivo en el grado positivo, utilizamos la conjunción <b>“as…as”</b> para formar las comparaciones de igualdad. Ejemplos:'),
	('Comparativo de Inferioridad', 'Para formar este tipo de comparación podemos usar las conjunciones <b>“not as…as”</b> or <b>“less…than”</b>. En ambos casos, el adjetivo está en el grado positivo. Ejemplos:'),
	('Comparativo de Superioridad', 'En las comparaciones de superioridad, el adjetivo, que está en la forma comparativa (véase más adelante), es seguido por <b>“than”</b>. Ejemplos:'),
	('ConsonanteVocalConsonante', 'Aquellos adjetivos cuya terminación sea en <b>vocal + consonate + vocal</b>, su forma comparativa y superlativa se conjugan de la siguiente manera:'),
	('Contrastar Informacion', '<b>CONTRASTAR INFORMACIÓN</b>\r\n\r\nLas siguientes palabras se utilizan para presentar el contraste entre dos ideas. Cuando se utiliza una de estas palabras entre dos cláusulas contrastantes, debemos usar una coma al final de la primera cláusula, antes de la linking word.\r\n\r\n<b>BUT</b>\r\n\r\nLa palabra más común para contrastar ideas, “but” generalmente se encuentra entre las dos ideas contrastantes dentro de una oración y siempre sigue a una coma. Se traduce como “pero” en español.\r\n\r\n<b>YET</b>\r\n\r\n“Yet” se utiliza de la misma manera que “but”, aunque generalmente se considera más formal.\r\n\r\n<b>HOWEVER</b>\r\n\r\nGeneralmente se encuentra al principio de una frase, “however” es más formal que “but”. Se traduce como “sin embargo”.\r\n\r\n<b>ALTHOUGH</b>\r\n\r\nEsta palabra puede utilizarse al principio de una oración o entre las dos cláusulas contrastantes. Se traduce como “aunque”.\r\n\r\n<b>THOUGH</b>\r\n\r\nComo “although”, puede utilizarse al principio de una oración o entre las dos cláusulas contrastantes. Se traduce como “aunque”.\r\n\r\n<b>EVEN THOUGH</b>\r\n\r\nGeneralmente se encuentra al principio de una frase, “even though” también se puede utilizar entre dos cláusulas.\r\n\r\n<b>DESPITE</b>\r\n\r\nEsta palabra debe ir seguida por un sustantivo o un gerundio (verbo+ing). Si va a ir seguida de una cláusula (verbo sujeto), debemos usar “Despite the fact that”. Se traduce como “a pesar de”.\r\n\r\n<b>IN SPITE OF</b>\r\n\r\nLas reglas para el uso de esta linking word son iguales que las de “despite”.\r\n\r\n<b>NEVERTHELESS</b>\r\n\r\nEl significado de “nevertheless” equivale a “in spite of” y puede ser utilizada al principio de una oración o entre las dos cláusulas. Siempre va seguida por una coma. Se traduce como “no obstante”.\r\n\r\n<b>NONETHELESS</b>\r\n\r\nSe utiliza del mismo modo que “nevertheless”.\r\n\r\n<b>WHILE</b>\r\n\r\nEncontramos “while” frecuentemente al principio de la frase.\r\n\r\n<b>CONDITIONAL IDEAS</b>\r\n\r\nLas siguientes palabras se utilizan cuando una idea es dependiente de otra. Estas palabras condicionales siempre se encuentran delante de la cláusula condicional. Ver la lección conditionals para obtener más información.\r\n\r\n<b>PROVIDING</b>\r\n\r\nEsta palabra puede utilizarse en lugar de “if”, aunque suele ser más formal. Se utiliza frecuentemente con permisos y puede ser utilizada al principio o en el medio de la oración.\r\n\r\n<b>PROVIDED THAT</b>\r\n\r\n“Provided that” se usa de la misma manera que “providing”. Se traduce como “a condición de”.\r\n\r\n<b>AS/SO LONG AS</b>\r\n\r\nEsta linking word funciona de la misma manera que “providing” o “provided that”.\r\n\r\n<b>UNLESS</b>\r\n\r\nEsta palabra indica una excepción a la condición. Se utiliza siempre antes de un verbo afirmativo para expresar la idea de “if…not”. Se traduce como “a menos que”\r\n\r\n<b>ONLY IF</b>\r\n\r\n“Only if” se utiliza para restringir la condición, indicando que sólo hay una condición que hará realidad la cláusula principal. Se traduce como “sólo si”.\r\n\r\n<b>EVEN IF</b>\r\n\r\nEsta palabra se usa para expresar la idea de que la condición es irrelevante; que los resultados serán los mismos. Se traduce como “aun si” o “incluso si”.\r\n\r\n<b>WHETHER OR NOT</b>\r\n\r\nComo “even if”, “whether or not” se utiliza para expresar la irrelevancia de las condiciones, ya que el resultado será el mismo.'),
	('Dar Razon', '<b>DAR RAZÓN</b>\r\n\r\nLas siguientes palabras se utilizan para presentar una razón o una causa.\r\n\r\n<b>BECAUSE</b>\r\n\r\nEs la palabra usada más frecuentemente para dar razón o causa. Se traduce como “porque”. Puede utilizarse al principio o en el medio de una oración, aunque es más frecuente en el medio. Si va a ir seguida de un sustantivo, tenemos que utilizar “of”.\r\n\r\n<b>SINCE</b>\r\n\r\nSe usa de la misma manera que “because”. Se traduce como “ya que”.\r\n\r\n<b>AS</b>\r\n\r\nSe usa de la misma manera que “because”. Se traduce como “como”.\r\n\r\n<b>DUE TO</b>\r\n\r\nEsta palabra debe ir seguida de un sustantivo. Si va a ir seguida de una cláusula, debemos usar due to the fact that. Se traduce como “debido a”.\r\n\r\n<b>OWING TO</b>\r\n\r\nLas reglas del uso de esta palabra son iguales que las de “due to”.\r\n\r\n<b>DAR EJEMPLOS</b>\r\n\r\nPara dar ejemplos, podemos utilizar las siguientes palabras:\r\n\r\n<b>FOR EXAMPLE</b>\r\n\r\n“For example” se puede usar al principio o en medio de una oración. Cuando se usa al principio, siempre va seguida de una coma. Cuando la utilizamos en medio de una oración, debemos usar una coma antes y después. Se traduce como “por ejemplo”.\r\n\r\n<b>SUCH AS</b>\r\n\r\nUtilizamos esta linking word dentro de una frase. Nunca se encuentra “such as” al prinicipio de una frase y siempre va una coma antes de ella. Se traduce como “tales como”.\r\n\r\n<b>FOR INSTANCE</b>\r\n\r\nSe traduce igual y sigue las mismas reglas que “for example”.'),
	('Futuro Continuo', '<b>FUTURO CONTINUO</b>\r\n\r\n<b>Forma:</b>\r\nPara formar el futuro continuo se utilizan <b>“will be”</b> o <b>“be going to”</b> y el <b>verbo+ing</b>.\r\n\r\n<b>Usos</b>\r\n\r\nA diferencia del futuro simple, las dos formas del futuro continuo significan casi lo mismo y son intercambiables. También, los usos del futuro continuo son los mismos del pasado continuo, pero en el futuro.\r\n\r\n<b>1.</b> El futuro continuo describe la acción que estará en desarrollo en el futuro y que será interumpida. El verbo que interrumpe está en presente simple.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. Jose <b>will be [Jose’s going to be] watching</b> the news when you call.(Jose estará mirando las noticias cuando le llames.)\r\nB. <b>Will</b> it <b>be [Is it going to be] raining</b> when l leave?(¿Estará lloviendo cuando salga?)\r\n\r\n<b>2.</b> Se usa el futuro continuo para hablar sobre acciones en un tiempo específico en el futuro.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. Paula <b>will be [Paula’s going to be] living</b> in Spain next April.(Paula estará viviendo en España el próximo abril.)\r\nB. We’<b>ll</b> still <b>be working</b> [ <b>We’re</b> still <b>going to be working</b>] at 10 o’clock tomorrow night.(Todavía estaremos trabajando a las 10 mañana por la noche.)\r\n'),
	('Futuro Continuo A', '<b>Futuro Continuo Afirmativo</b>\r\n\r\n<b>Estructura: Con Will(Sujeto + “will be” + verbo+ing…), Con Going To(Sujeto + verbo auxiliar (to be) + “going to be” + verbo+ing…)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nI will be talking. / I’m going to be talking.(Estaré hablando.)\r\nHe will be eating. / He’s going to be eating.(Etará comiendo.)\r\nThey will  be learning. / They’re going to be learning.(Estarán aprendiendo.)\r\n\r\n'),
	('Futuro Continuo I', '<b>Futuro Continuo Interrogativo</b>\r\n\r\n<b>Estructura: Con Will(Verbo auxiliar “will” + sujeto + "be"+ verbo+ing…?), Con Going To(Verbo auxiliar (“to be”) + sujeto + “going to be” + verbo+ing…?)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Will</b> you <b>be talking</b>? / <b>Are</b> you <b>going to be talking</b>?(¿Estarás hablando?)\r\nB. <b>Will</b> he <b>be eating</b>? / <b>Is</b> he <b>going to be eating</b>?(¿Estará comiendo?)\r\nC. <b>Will</b> they <b>be learning</b>? / <b>Are</b> they <b>going to be learning</b>?(¿Estarán aprendiendo?)\r\n\r\n<b>Nota:</b> En las frases interrogativas el sujeto va entre los verbos auxiliares <b>“will”</b> y <b>“be”</b> o entre <b>“to be”</b> y <b>“going to be”</b>.'),
	('Futuro Continuo N', '<b>Futuro Continuo Negativo</b>\r\n\r\n<b>Nota:</b> En las frases negativas el auxiliar negativo <b>“not”</b> va entre los verbos auxiliares <b>“will”</b> y <b>“be”</b> o entre <b>“to be”</b> y <b>“going to be”</b>.\r\n\r\n<b>Estructura: Con Will(Sujeto + “will not be” + verbo+ing…), Con Going To(Sujeto + verbo auxiliar (to be) + “ not going to be” + verbo+ing…)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nI will not [won\'t] be talking. / I’m not going to be talking.(No estaré hablando.)\r\nHe will not [won\'t] be eating. / He’s not going to be eating.(No estará comiendo.)\r\nThey will not [won\'t] be learning. / They’re not going to be learning.(No estarán aprendiendo.)\r\n\r\n'),
	('Futuro Perfecto', 'Sujeto + “will have” + participio pasado.\r\n\r\n\r\nSujeto + verbos auxiliar (to be) + “going to have” + participio pasado.\r\n'),
	('Futuro Perfecto A', 'Sujeto + “will have” + participio pasado.\r\n\r\nSujeto + verbos auxiliar (to be) + “going to have” + participio pasado\r\n'),
	('Futuro Perfecto I', '“Will” + sujeto + “have” + participio pasado?\r\n\r\nVerbo auxiliar (to be) + sujeto + “going to have” + participio pasado?\r\n'),
	('Futuro Perfecto N', 'Sujeto + “will” + “not” + “have” + participio pasado.\r\n\r\nSujeto + verbo auxiliar (to be) + “not” + “going to have” + participio pasado.\r\n'),
	('Futuro Simple', '<b>FUTURO SIMPLE</b>\r\n\r\n<b>Usos</b>\r\nLas formas <b>“will”</b> y <b>“going to”</b> se utilizan para expresar el futuro. La diferencia entre <b>“going to”</b> y <b>“will”</b> es el sentido de planificación y probabilidad de que suceda una acción. En general, se usa “going to” para planes concretos, cuando estamos seguros de que algo va a suceder.\r\n\r\n<b>1.</b> Se usa <b>“will”</b> con acciones voluntarias.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Will</b> you <b>help</b> me move?(¿Me ayudarás a mudarme?)\r\nB. They <b>will clean</b> their rooms.(Limpiarán sus habitaciones.)\r\nC. She <b>won’t work</b> with Paul.(No trabajará con Paul.)\r\n\r\n<b>2.</b> Se utiliza <b>“will”</b> para expresar una promesa.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. When I am president, I <b>will lower</b> taxes.(Cuando sea presidente, bajaré los impuestos.)\r\nB. He promises he <b>will call</b> when he arrives.(Promete que llamará cuando llegue.)\r\n\r\n\r\n<b>3.</b> Se usa <b>“going to”</b> para planes. Se indica la intención de hacer algo.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. We <b>are going to have</b> a party tonight.(Vamos a dar una fiesta esta noche.)\r\nB. Richard <b>is going to take</b> an English class.(Richard va a realizar un clase de inglés.)\r\nC. <b>Are</b> they <b>going to play</b> football later?(¿Van a jugar a fútbol luego?)\r\n\r\n<b>4.</b> Se puede usar “will” o “going to” para hacer predicciones. Cuando hay evidencia de que algo va a pasar usamos “going to”.\r\n\r\nA. It <b>will be</b> a great party. / It <b>is going to be</b> a great party.(Será una fiesta genial.)\r\nB. It <b>won’t rain</b>. / It <b>is not going to rain</b>.(No va a llover.)\r\n'),
	('Futuro Simple A', '<b>Futuro Simple Afirmativo</b>\r\n\r\n<b>Estructura: (Sujeto + “will” + verbo principal.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>will [I’ll] call</b> you tonight.(Te llamaré esta noche.)\r\nB. She <b>will [She’ll] arrive</b> late.(Llegará tarde.)\r\nC. They <b>will [They’ll] be</b> happy to see you.(Estarán felices de verte.)'),
	('Futuro Simple I', '<b>Futuro Simple Interrogativo</b>\r\n\r\n<b>Estructura: (“Will” + sujeto + verbo principal?)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Will</b> you <b>call</b> me tonight?(¿Me llamarás esta noche?)\r\nB. <b>Will</b> she <b>arrive</b> late?(¿Llegará tarde?)\r\nC. <b>Will</b> they <b>be</b> happy to see you?(¿Estarán felices de verte?)\r\n'),
	('Futuro Simple N', '<b>Futuro Simple Negativo</b>\r\n\r\n<b>Estructura: (Sujeto + “will” + “not” + verbo principal.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>will not [won’t] call</b> you tonight.(No te llamaré esta noche.)\r\nB. She <b>will not [won’t] arrive</b> late.(No llegará tarde.)\r\nC. They <b>will not [won’t] be</b> happy to see you.(No estarán felices de verte.)'),
	('Grado Comparativo', 'Al hacer comparaciones, podemos destacar la superioridad, inferioridad o igualdad de calidad de uno a otro.\r\nLa estructura de cada uno de estos grados de comparación es diferente.\r\n'),
	('Grado Positivo', 'Los <b>adjetivos</b> describen cualidades de los sustantivos; algunas de estas cualidades pueden variar en el grado o intensidad, ya que al igual que en español, cuando queremos hacer comparaciones contrastamos cualidades o atributos por medio de adjetivos en sus diversos grados.\r\n\r\n<b>Grado positivo:</b>\r\nEl grado positivo de los adjetivos, que hemos visto anteriormente, es la cualidad en el grado más simple. Ejemplos:\r\n'),
	('Grado Superlativo', 'El grado superlativo denota la calidad en el grado más alto y como en español, se usa <b>“the”</b> delante del adjetivo en la forma superlativa (véase más adelante). Ejemplos:\r\n'),
	('La Voz Pasiva', 'Cuando se quiere dar más importancia a la acción y no a quien la ha realizado, se utiliza la voz pasiva. Esto porque quién o qué realiza la acción es irrelevante, desconocido o es obvio para todo el mundo. Como en español, la voz pasiva se forma con el verbo \'to be\' (ser) y el participio pasado. El sujeto de un verbo en pasiva corresponde al objeto de un verbo en activa.'),
	('Palabras de Secuencia', '<b>PALABRAS DE SECUENCIA</b>\r\n\r\nCuando queremos presentar una secuencia de ideas, podemos usar estas palabras:\r\n\r\n<b>FIRSTLY, SECONDLY…LASTLY</b>\r\n\r\nEstas palabras se encuentran siempre al principio de una frase y siempre van seguidas por una coma. Se traducen como “en primer lugar”, “en segundo lugar” y “por último”.\r\n\r\n<b>THE FOLLOWING</b>\r\n\r\nAunque se encuentra más a menudo al principio de una oración, también se puede encontrar dentro de la oración. Se traduce como “el/los siguiente/s”.'),
	('Pasado Continuo', '<b>PASADO CONTINUO</b>\r\n\r\n<b>Forma:</b>\r\n\r\nPara formar el pasado continuo se utiliza el verbo auxiliar <b>“to be”</b> y el <b>verbo+ing</b>. El verbo auxiliar <b>“to be”</b> está en el pasado simple, pero ten en cuenta que <b>“to be”</b> es un verbo irregular.\r\n\r\n<b>Usos</b>\r\n\r\n<b>1.</b> El pasado continuo se usa para una acción en desarrollo en el pasado cuando otra acción la interrumpe. La acción que interrumpe está en el pasado simple. <b>“When”</b> y <b>“while”</b> señalan el uso del pasado simple y continuo. En general, usamos el pasado simple directamente después de <b>“when”</b> y el pasado continuo después de <b>“while”</b>.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. Jose called while I <b>was watching</b> the news.(Jose llamó mientras estaba mirando las noticias.)\r\nB. He <b>was walking</b> to work when he fell.(Estaba caminando hacia su trabajo cuando se cayó.)\r\nC. <b>Was</b> it <b>raining</b> when you left?(¿Estaba lloviendo cuando te fuiste?)\r\n\r\n<b>2.</b> Se usa el pasado continuo para hablar sobre acciones en un tiempo específico en el pasado.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. Paula <b>wasn’t living</b> in Spain in 2005.(Paula no estaba viviendo en España en el 2005.)\r\nB. We <b>were</b> still <b>working</b> at 10 o’clock last night.(Todavía estábamos trabajando a las 10 anoche. )\r\n\r\n<b>3.</b> Se usa el pasado continuo para dos acciones que estaban ocurriendo al mismo tiempo en el pasado.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. My son <b>was reading</b> while I <b>was cooking</b>.(Mi hijo estaba leyendo mientras que yo estaba cocinando.)\r\nB. They <b>were talking</b> very loudly while we <b>were trying</b> to watch the movie.(Estaban hablando muy alto mientras nosotros estábamos intentando mirar la película.)\r\n'),
	('Pasado Continuo A', '<b>Pasado Continuo Afirmativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo auxiliar (to be) + verbo+ing.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>was talking</b>.(Estaba hablando.)\r\nB. He <b>was eating</b>.(Estaba comiendo.)\r\nC. They <b>were learning</b>.(Estaban aprendiendo.)\r\n'),
	('Pasado Continuo I', '<b>Pasado Continuo Interrogativo</b>\r\n\r\n<b>Estructura: (Verbo auxiliar (to be) + sujeto + verbo+ing?)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Were</b> you <b>talking</b>?(¿Estabas hablando?)\r\nB. <b>Was</b> he <b>eating</b>?(¿Estaba comiendo?)\r\nC. <b>Were</b> they <b>learning</b>?(¿Estaban aprendiendo?)\r\n'),
	('Pasado Continuo N', '<b>Pasado Continuo Negativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo auxiliar (to be) + auxiliar negativo (not) + verbo+ing.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>was not [wasn’t] talking</b>.(No estaba hablando.)\r\nB. He <b>was not [wasn’t] eating</b>.(No estaba comiendo.)\r\nC. They <b>were not [weren’t] learning</b>.(No estaban aprendiendo.)\r\n'),
	('Pasado Perfecto', 'Igual que en el presente perfecto, se forma el pasado perfecto con el verbo auxiliar “to have” y el participio pasado. El verbo auxiliar estará en pasado'),
	('Pasado Perfecto A', 'Sujeto + “had” + participio pasado'),
	('Pasado Perfecto I', 'Had” + sujeto + participio pasado…?'),
	('Pasado Perfecto N', 'Sujeto + “had” + “not” + participio pasado'),
	('Pasado Simple', '<b>PASADO SIMPLE</b>\r\n\r\n<b>Forma:</b> \r\n\r\nPara formar el pasado simple con verbos regulares, usamos el infinitivo y añadimos la terminación <b>“-ed”</b>. La forma es la misma para todas las personas (I, you, he, she, it, we, they).\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. want ->   wanted\r\nB. learn ->   learned\r\nC. stay ->   stayed\r\nD. walk ->   walked\r\nE. show ->   showed\r\n\r\n<b>Excepciones:</b>\r\n\r\n<b>1.</b> Para verbos que terminan en una <b>“e”</b>, sólo añadimos <b>“-d”</b>.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. change ->   changed\r\nB. believe ->   believed\r\n\r\n<b>2.</b> Si el verbo termina en una vocal corta y una consonante (excepto <b>“y”</b> o <b>“w”</b>), doblamos la consonante final.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. stop ->   stopped\r\nB. commit ->   committed\r\n\r\n\r\n<b>3.</b> Con verbos que terminan en una consonante y una <b>“y”</b>, se cambia la <b>“y”</b> por una <b>“i”</b>.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. study ->   studied\r\nB. try ->   tried\r\n\r\n<b>Usos</b>\r\n\r\n<b>1.</b> El pasado simple se utiliza para hablar de una acción concreta que comenzó y acabó en el pasado. En este caso equivale al pretérito indefinido español. Generalmente, lo usamos con adverbios de tiempo como <b>“last year”</b>, <b>“yesterday”</b>, <b>“last night”</b>…\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. Tom <b>stayed</b> at home last night.(Tom se quedó en casa anoche.)\r\nB. Kate <b>worked</b> last Saturday.(Kate trabajó el sábado pasado.)\r\nC. I <b>didn’t go</b> to the party yesterday.(No fui a la fiesta ayer.)\r\nD. <b>Did</b> they <b>walk</b> to school this morning?(¿Han andado a la escuela esta mañana?)\r\n\r\n<b>2.</b> Se usa el pasado simple para un serie de acciones en el pasado.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>received</b> the good news and immediately <b>called</b> my husband.(Recibí la buena noticia y llamé de inmediato a mi marido.)\r\nB. He <b>studied</b> for an hour in the morning, <b>worked</b> all afternoon and <b>didn’t return</b> home until 10 at night.(Estudió durante una hora por la mañana, trabajó toda la tarde y no regresó a casa hasta las 10 de la noche.)\r\n\r\n<b>3.</b> También lo usamos para acciones repetidas o habituales en el pasado, como se usa el pretérito imperfecto español.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. We always <b>traveled</b> to Cancun for vacation when we were young.(Siempre viajábamos a Cancun durante las vacaciones cuando éramos jóvenes.)\r\nB. He <b>walked</b> 5 kilometers every day to work.(Caminaba 5 kilómetros hasta el trabajo cada día.)\r\n\r\n<b>4.</b> Lo usamos para narraciones o acciones de períodos de largo tiempo en el pasado, como el pretérito imperfecto español.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>worked</b> for many years in a museum.(Trabajaba en un museo durante muchos años.)\r\nB. She <b>didn’t eat</b> meat for years.(No comía carne durante años.)\r\n\r\n<b>5.</b> Se utiliza para hablar de generalidades o hechos del pasado.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. The Aztec <b>lived</b> in Mexico.(Los aztecas vivían en México)\r\nB. I <b>played</b> the guitar when I was a child.(Tocaba la guitarra cuando era niño.)\r\n\r\n'),
	('Pasado Simple A', '<b>Pasado Simple Afirmativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo principal…)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. She <b>was</b> a doctor.(Era doctora.)\r\nB. The keys <b>were</b> in the drawer.(Las llaves estaban en el cajón.)\r\nC. I <b>wanted</b> to dance.(Quería bailar.)\r\nD. They <b>learned</b> English.(Aprendieron inglés.)\r\nE. We <b>believed</b> him.(Le creímos.)\r\nF. I <b>bought</b> a blue car.(Compré un coche azul.)'),
	('Pasado Simple I', '<b>Pasado Simple Interrogativo</b>\r\n\r\n<b>Estructura:</b>\r\n \r\nTo be: <b>(“To be” + sujeto…?)</b>\r\n\r\n<b>Ejemplos:</b>\r\nA. <b>Was</b> she a doctor?(¿Era doctora?)\r\nB. <b>Were</b> the keys in the drawer?(¿Estaban las llaves en el cajón?)\r\n\r\nTodos los demás verbos: <b>Verbo auxiliar (to do) + sujeto + verbo principal (en infinitivo)…?</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Did</b> you <b>want</b> to dance?(¿Querías bailar?)\r\nB. <b>Did</b> they <b>learn</b> English?(¿Aprendieron inglés?)\r\nC. <b>Did</b> you <b>believe</b> him?(¿Le creíste?)\r\nD. <b>Did</b> you <b>buy</b> a blue car?(¿Compraste un coche azul?)\r\n\r\n<b>Nota:</b> Al igual que en las frases negativas, el verbo auxiliar va en pasado <b>(“did”)</b> y el verbo principal se queda en el infinitivo.\r\n'),
	('Pasado Simple N', '<b>Pasado Simple Negativo</b>\r\n\r\n<b>Estructura: </b>\r\n\r\nTo be: <b>(Sujeto + “to be” + “not”…)</b>\r\n\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. She <b>wasn’t</b> a doctor.(Ella no era doctora.)\r\nB. The keys <b>weren’t</b> in the drawer.(Las llaves no estaban en el cajón.)\r\n\r\nTodos los demás verbos: <b>Sujeto + verbo auxiliar (to do) + “not” + verbo principal (en infinitivo)…</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>didn’t want</b> to dance.(No quería bailar.)\r\nB. They <b>didn’t learn</b> English.(No aprendieron inglés)\r\nC. We <b>didn’t believe</b> him.(No le creímos.)\r\nD. I <b>didn’t buy</b> a blue car.(No compré un coche azul.)\r\n<b>Nota:</b> En frases negativas, el verbo auxiliar va en pasado (“did”) y el verbo principal se queda en el infinitivo.\r\n'),
	('Preposiciones', '<b>PREPOSICIONES</b>\r\n\r\nLas preposiciones son una de las partes del inglés que más cuesta aprender a los hablantes de lengua española porque la traducción directa a menudo es imposible. Las preposiciones pueden ser traducidas de manera distinta según la situación o el contexto de su uso. Por ello es recomendable memorizar las diferentes variaciones y usos dependiendo de si hablamos de preposiciones de lugar, movimiento o tiempo. Veremos que muchas de las preposiciones se repiten en los diferentes apartados.\r\n\r\n<b>IN / AT / ON</b>\r\n\r\nSon unas de las preposiciones más comunes que se pueden usar para indicar lugar o tiempo: in, at y on.\r\n\r\n<b>IN</b>\r\n\r\nSignificado: en, dentro, dentro de\r\n\r\nUso (lugar): Se usa para indicar tanto espacios cerrados como espacios abiertos. Lo utilizamos para indicar que algo está dentro de una cosa, en un lugar cerrado, o en el interior de algo físicamente. Sin embargo, como vemos en los ejemplos, también se utiliza para indicar que se está en un lugar geográfico.\r\n\r\n<b>AT</b>\r\n\r\nSignificado: en, a, al, cerca de, tocando\r\n\r\nUso (lugar): Se usa delante de edificios como casas, aeropuertos, universidades, para acontecimientos como reuniones, fiestas, conciertos, deportes, etc., antes de “top” (parte superior), “bottom” (parte inferior), “the end of” (al final de) y detrás de “arrive” (llegar) cuando nos referimos a lugares que no sean ciudades o países.\r\n\r\n<b>ON</b>\r\n\r\nSignificado: sobre, encima de algo, tocando\r\n\r\nUso (lugar): Se coloca delante de nombres de lugares con base como mesas, suelos, etc., cuando nos referimos a partes de una habitación como el techo o la pared y para indicar que alguien está dentro de un transporte público o en una planta de un edificio.'),
	('Preposiciones de Direccion', '<b>PREPOSICIONES DE MOVIMIENTO O DIRECCIÓN</b>\r\n\r\nLas preposiciones de movimiento o dirección se utilizan para mostrar movimiento de un lugar a otro. Estas preposiciones se usan con mayor frecuencia con los verbos de movimiento y se encuentran después del verbo.\r\n\r\n<b>TO</b>\r\n\r\n“To” es la preposición de movimiento o dirección más común.\r\n\r\nSignificado: a, hacia, dirección a (siempre indica movimiento)\r\n\r\n<b>ACROSS</b>\r\n\r\nSignificado: al otro lado de; de un lado a otro\r\n\r\n<b>ALONG</b>\r\n\r\nSignificado: a lo largo de\r\n\r\n<b>AROUND</b>\r\n\r\nSignificado: alrededor de\r\n\r\n<b>DOWN</b>\r\n\r\nSignificado: abajo\r\n\r\n<b>INTO</b>\r\n\r\nSignificado: en, dentro de\r\n\r\n<b>OFF</b>\r\n\r\nSignificado: más distante, más lejano\r\n\r\n<b>ONTO</b>\r\n\r\nSignificado: en, sobre, por encima de, arriba de\r\n\r\n<b>OVER</b>\r\n\r\nSignificado: sobre, encima de, arriba de\r\n\r\n<b>PAST</b>\r\n\r\nSignificado: por delante\r\n\r\n<b>THROUGH</b>\r\n\r\nSignificado: a través de, por\r\n\r\n<b>TOWARD[S]</b>\r\n\r\nSignificado: hacia, con dirección a\r\n\r\n<b>UP</b>\r\n\r\nSignificado: hacia arriba'),
	('Preposiciones de Lugar', '<b>PREPOSICIONES DE LUGAR</b>\r\n\r\nLas preposiciones de lugar se colocan detrás del verbo principal, que suele ser el verbo “to be” (estar, ser) en cualquiera de los tiempos pasados, presentes o futuros y en sus formas tanto simples como compuestas.\r\n\r\n<b>NEXT TO (BESIDE)</b>\r\n\r\nSignificado: al lado de, junto a\r\n\r\nUso: Tanto “next to” como “beside” se pueden utilizar indistintamente. Utilizar una forma u otra dependerá del hablante y del contexto.\r\n\r\n<b>BY</b>\r\n\r\nSignificado: cerca, al lado de, junto a\r\n\r\nUso: Se puede utilizar en los mismos contextos que “next to” pero el significado de “by” es más como “cerca” en castellano.\r\n\r\n<b>BETWEEN</b>\r\n\r\nSignificado: entre\r\n\r\n<b>BEHIND</b>\r\n\r\nSignificado: detrás de\r\n\r\n<b>IN FRONT OF vs. OPPOSITE</b>\r\n\r\nSignificado: contrario, en frente de, opuesto, delante de\r\n\r\nUso: La diferencia entre estas preposiciones la notamos cuando estamos hablando de personas: “opposite” significa delante y cara a cara, en cambio “in front of” significa delante de pero no cara a cara.\r\n\r\n<b>UNDER</b>\r\n\r\nSignificado: debajo de\r\n\r\n<b>ABOVE</b>\r\n\r\nSignificado: por encima sin tocar\r\n\r\n<b>BELOW</b>\r\n\r\nSignificado: por debajo sin tocar'),
	('Preposiciones de Tiempo', '<b>PREPOSICIONES DE TIEMPO</b>\r\n\r\nLas preposiciones de tiempo se utilizan para indicar cuando sucedió algo. Las tres preposiciones más comunes (“in”, “at”, “on”), pueden ser utilizadas como preposiciones de lugar o preposiciones de tiempo. A continuación se presentan otras preposiciones comunes de tiempo.\r\n\r\n<b>BEFORE</b>\r\n\r\nSignificado: antes, antes de\r\n\r\n<b>AFTER</b>\r\n\r\nSignificado: después, después de, tras\r\n\r\n<b>DURING</b>\r\n\r\nSignificado: durante\r\n\r\n<b>FOR</b>\r\n\r\nSignificado: durante, por'),
	('Presente Continuo', '<b>PRESENTE CONTINUO</b>\r\n\r\n<b>Forma:</b>\r\n\r\nPara formar el presente continuo se utiliza el verbo auxiliar <b>“to be”</b> y el <b>verbo+ing</b>.\r\n\r\n<b>Usos</b>\r\n<b>1.</b> El presente continuo se utiliza para hablar sobre algo que está pasando en el momento en el que hablamos.\r\n\r\n<b>Ejemplos:</b>\r\nA. <b>I’m studying</b> now.(Estoy estudiando ahora.)\r\nB. <b>He’s eating</b> at the moment.(Está comiendo en este momento.)\r\nC. <b>Is</b> it <b>raining</b>?(¿Está lloviendo?)\r\n\r\n<b>2.</b> También lo usamos para hablar de algo que está sucediendo en la actualidad pero no necesariamente cuando hablamos. En este caso, se utilizan expresiones de tiempo como <b>“currently”</b>, <b>“lately”</b> o <b>“these days”</b>.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>They’re learning</b> English.(Están aprendiendo inglés.)\r\nB. <b>She’s</b> currently <b>looking</b> for a job.(Actualmente está buscando un trabajo.)\r\nC. <b>Are</b> you <b>working</b> much lately?(¿Estás trabajando mucho últimamente?)\r\n\r\n<b>3.</b> Usamos el presente continuo para hablar de algo que está ya decidido que se hará en el futuro próximo. Su uso indica que es bastante seguro que lo planificado sucederá.\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>I’m going</b> to the party tonight.(Voy a la fiesta esta noche.)\r\nB. <b>He’s not [He isn’t] coming</b> to class tomorrow.(No viene a la clase mañana.)\r\nC. <b>Are</b> you <b>working</b> next week?(¿Trabajas la semana que viene?)\r\n'),
	('Presente Continuo A', '<b>Presente Continuo Afirmativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo auxiliar (to be) + verbo+ing.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>I’m talking.</b>(Estoy hablando.)\r\nB. <b>He’s eating.</b>(Está comiendo.)\r\nC. <b>They’re learning.</b>(Están aprendiendo.)\r\n\r\n'),
	('Presente Continuo I', '<b>Presente Continuo Interrogativo</b>\r\n\r\n<b>Estructura: (Verbo auxiliar (to be) + sujeto + verbo+ing?)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Are</b> you <b>talking</b>?(¿Estás hablando?)\r\nB. <b>Is</b> he <b>eating</b>?(¿Está comiendo?)\r\nC. <b>Are</b> they <b>learning</b>?(¿Están aprendiendo?)\r\n'),
	('Presente Continuo N', '<b>Presente Continuo Negativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo auxiliar (to be) + auxiliar negativo (not) + verbo+ing.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>I’m not talking.</b>(No estoy hablando.)\r\nB. <b>He’s not [He isn’t] eating.</b>(No está comiendo.)\r\n'),
	('Presente Perfecto', 'Para formar el presente perfecto, se usa el verbo auxiliar “to have” en el presente y el participio pasado del verbo. Para verbos regulares, el participio pasado es la forma simple del pasado.'),
	('Presente Perfecto A', 'Sujeto + verbo auxiliar (to have) + participio pasado'),
	('Presente Perfecto I', 'Verbo auxiliar (to have) + sujeto + participio pasado…?'),
	('Presente Perfecto N', 'Sujeto + verbo auxiliar (to have) + “not” + participio pasado'),
	('Presente Simple', '<b>PRESENTE SIMPLE</b>\r\n\r\n<b>Forma</b>\r\n\r\nPara conjugar el presente simple usamos el infinitivo para los sujetos <b>“I”</b>, <b>“you”</b>, <b>“we”</b> y <b>“they”</b> y para las terceras personas <b>“he”</b>, <b>“she”</b> y <b>“it”</b>, añadimos una <b>“-s”</b> al final del verbo.\r\n\r\n<b>Usos</b>\r\n<b>1.</b> El presente simple se utiliza para hablar de cosas que suceden habitualmente. A diferencia con el español, no se usa el presente simple para hablar sobre algo que está pasando en el momento en el que hablamos.\r\nSe suele utilizar el presente simple con adverbios de tiempo:\r\n\r\nA. <b>always</b> (siempre)\r\nB. <b>every</b> day (cada día)\r\nC. <b>usually</b> (normalmente)\r\nD. <b>often</b> (a menudo)\r\nE. <b>sometimes</b> (a veces)\r\nF. <b>rarely</b> (raramente), \r\nG. <b>hardly</b> ever (casi nunca)\r\nH. <b>never</b> (nunca)\r\n\r\n<b>Ejemplos:</b>\r\nA. I always <b>talk</b> to my mother on Sunday.(Siempre hablo con mi madre el domingo.)\r\nB. He never <b>eats</b> vegetables.(Nunca come las verduras.)\r\nC. They usually <b>learn</b> something new in class.(Normalmente aprenden algo nuevo en la clase.)\r\n\r\n<b>Excepción:</b>\r\nLos adverbios de tiempo van delante del verbo, excepto el verbo “to be” (ser/estar). Cuando se usa “to be” el verbo va delante del adverbio.\r\n\r\nA. I <b>am</b> always happy.(Siempre estoy contento.)\r\nB. He <b>is</b> often sick.(A menudo él está enfermo.)\r\nC. They <b>are</b> rarely late.(En raras ocasiones llegan tarde.)\r\n\r\n<b>2.</b> Se utiliza para hablar de generalidades o hechos científicos.\r\nEjemplos:\r\n\r\nA. He <b>does not [doesn’t]</b> eat vegetables.(Él no come verduras.)\r\nB. She <b>works</b> in a hospital.(Ella trabaja en una hospital.)\r\nC. Elephants <b>live</b> in Africa.(Los elefantes viven en África.)\r\nD. Bogota <b>is</b> in Colombia.(Bogotá está en Colombia.)\r\nE. <b>Do</b> children <b>like</b> animals?(¿Les gustan a los niños los animales?)\r\nF. Adults <b>do not [don’t]</b> know everything.(Los adultos no lo saben todo.)\r\n\r\n<b>3.</b> Se usa para eventos programados en el futuro próximo.\r\nEjemplos:\r\n\r\nA. The train <b>leaves</b> at 10:00.(El tren sale a las 10h.)\r\nB. The party <b>is</b> tonight.(La fiesta es esta noche.)\r\nC. <b>Does</b> the festival <b>start</b> tomorrow?(¿Empieza el festival mañana?)\r\nD. The plane <b>does not [doesn’t]</b> arrive today.(El avión no llega hoy.)\r\n\r\n4. Se usa para instrucciones (el imperativo).\r\n\r\nEjemplos:\r\nA. <b>Open</b> the window.(Abre la ventana.)\r\nB. <b>Eat</b> the vegetables.(Come las verduras.)\r\nC. <b>Don’t</b> cry.(No llores.)\r\nD. <b>Do</b> your homework.(Haz los deberes.)\r\nE. <b>Call</b> your mother.(Llama a tu madre.)\r\n\r\n'),
	('Presente Simple A', '<b>Presente Simple Afirmativo</b>\r\n\r\n<b>Estructura: (Sujeto + Verbo)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>talk</b>. (Yo hablo.)\r\nB. He <b>eats</b>. (Él come.)\r\nC. They <b>learn</b>. (Ellos aprenden.)'),
	('Presente Simple I', '<b>Presente Simple Interrogativo</b>\r\n\r\n<b>Estructura: (Verbo auxiliar (to do) + sujeto + verbo principal?)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. <b>Do</b> you talk?(¿Hablas tú?)\r\nB. <b>Does</b> he eat?(¿Come él?)\r\nC. <b>Do</b> they learn?(¿Aprenden ellos?)'),
	('Presente Simple N', '<b>Presente Simple Negativo</b>\r\n\r\n<b>Estructura: (Sujeto + verbo auxiliar (to do) + auxiliar negativo (“not”) + verbo.)</b>\r\n\r\n<b>Ejemplos:</b>\r\n\r\nA. I <b>do not [don’t]</b> talk.(Yo no hablo.)\r\nB. He <b>does not [doesn’t]</b> eat.(Él no come.)\r\nC. They <b>do not [don’t]</b> learn.(Ellos no aprenden.)'),
	('Terminados en e', 'Para conjugar en su forma comparativa y superlativa los adjetivos que terminen en la vocal <b>e</b>, se utiliza la siguiente regla:'),
	('Terminados en Y', 'Para formar comparativos y superlativos en adjetivos de dos sílabas que terminen en <b>y</b>, se debe sustituir la y final por <b>i</b> y añadir <b>-er</b> si es para comparativo y <b>-est</b> si es para superlativo'),
	('Voz Pasiva Condicional Pasado', 'Conditional Past:'),
	('Voz Pasiva Condicional Presente', 'Conditional Present:'),
	('Voz Pasiva en Condicional', 'structure'),
	('Voz Pasiva en Futuro Simple', 'Simple Future:'),
	('Voz Pasiva en Pasado c', 'Past Continouos:'),
	('Voz Pasiva en Pasado Simple', 'Simple Past:'),
	('Voz Pasiva en Presente', 'Presente simple:'),
	('Voz Pasiva en Presente c', 'Present Continous:'),
	('Voz Pasiva Impersonal', 'La voz Pasiva Impersonal es la que se forma utilizando verbos relacionados con la percepción. Suelen ser verbos de discurso y pensamiento. En las oraciones de voz pasiva impersonal al utilizar verbos intransitivos como acción principal, no existe objeto que pueda cumplir esa función y por ello se utiliza el pronombre it.'),
	('Voz Pasiva Personal', 'Si en una oración se encuentran dos objetos, uno de ellos se convierte en sujeto para la voz pasiva. Cuando este complemento pasa a convertirse en sujeto, es lo que se conoce como el "sujeto pasivo personal". El objeto indirecto en la oración activa puede aparecer antes del objeto directo o después de éste si le precede la preposición to. En cambio, en la oración pasiva la preposición desaparece.'),
	('Voz Pasiva Personal e Impersonal', 'Si en una oración se encuentran dos objetos, uno de ellos se convierte en sujeto para la voz pasiva. Cuando este complemento pasa a convertirse en sujeto, es lo que se conoce como el "sujeto pasivo personal". El objeto indirecto en la oración activa puede aparecer antes del objeto directo o después de éste si le precede la preposición to. En cambio, en la oración pasiva la preposición desaparece.');
/*!40000 ALTER TABLE `tema` ENABLE KEYS */;

-- Volcando estructura para tabla englishplay.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `codigoUsuario` double NOT NULL,
  `contraseniaUsuario` varchar(50) NOT NULL,
  `nombreUsuario` varchar(50) NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`codigoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla englishplay.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`codigoUsuario`, `contraseniaUsuario`, `nombreUsuario`, `tipoUsuario`) VALUES
	(201255218, '', 'BUENO PEÑA ANDRES MAURICIO', 0),
	(201255229, '', 'NARANJO HERRERA JAVIER SIMÓN', 1),
	(201513141, '', 'ZAPATA CASTAÑO JORGE LEONARDO', 0),
	(201663714, '', 'QUINTERO CASTAÑO LUIS FERNANDO', 0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
