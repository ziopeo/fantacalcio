# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: UFL_PEO
# Generation Time: 2016-09-18 19:56:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Acquistato
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Acquistato`;

CREATE TABLE `Acquistato` (
  `idFantagiocatore` int(11) NOT NULL,
  `idSquadra` varchar(12) DEFAULT NULL,
  `idAcquisto` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idAcquisto`),
  UNIQUE KEY `idAcquisto_UNIQUE` (`idAcquisto`),
  UNIQUE KEY `idFantagiocatore` (`idFantagiocatore`,`idSquadra`),
  KEY `sdfas_idx` (`idFantagiocatore`),
  KEY `dsafsds` (`idSquadra`),
  CONSTRAINT `dsafsds` FOREIGN KEY (`idSquadra`) REFERENCES `Utente` (`matricola`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `sdfas` FOREIGN KEY (`idFantagiocatore`) REFERENCES `Giocatore` (`idGiocatore`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Acquistato` WRITE;
/*!40000 ALTER TABLE `Acquistato` DISABLE KEYS */;

INSERT INTO `Acquistato` (`idFantagiocatore`, `idSquadra`, `idAcquisto`)
VALUES
	(104,'0510200479',1834),
	(109,'0510200479',1833),
	(135,'0510200479',1832),
	(233,'0510200479',1840),
	(280,'0510200479',1841),
	(281,'0510200479',1839),
	(306,'0510200479',1838),
	(326,'0510200479',1842),
	(358,'0510200479',1836),
	(387,'0510200479',1837),
	(400,'0510200479',1835),
	(513,'0510200479',1844),
	(547,'0510200479',1843),
	(603,'0510200479',1845),
	(604,'0510200479',1846),
	(612,'0510200479',1847),
	(634,'0510200479',1848),
	(645,'0510200479',1849),
	(646,'0510200479',1850),
	(844,'0510200479',1856),
	(852,'0510200479',1851),
	(865,'0510200479',1852),
	(867,'0510200479',1853),
	(909,'0510200479',1854),
	(928,'0510200479',1855);

/*!40000 ALTER TABLE `Acquistato` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Admin`;

CREATE TABLE `Admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAdmin`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Admin` WRITE;
/*!40000 ALTER TABLE `Admin` DISABLE KEYS */;

INSERT INTO `Admin` (`idAdmin`, `email`, `password`)
VALUES
	(1,'peo','peo');

/*!40000 ALTER TABLE `Admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ArchivioLega
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ArchivioLega`;

CREATE TABLE `ArchivioLega` (
  `idArchivioLega` int(11) NOT NULL AUTO_INCREMENT,
  `lega` int(11) DEFAULT NULL,
  `dataUpload` datetime DEFAULT NULL,
  PRIMARY KEY (`idArchivioLega`),
  KEY `leg_idx` (`lega`),
  CONSTRAINT `legarch` FOREIGN KEY (`lega`) REFERENCES `Leghe` (`idLeghe`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ClassificaFacolta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ClassificaFacolta`;

CREATE TABLE `ClassificaFacolta` (
  `posizione` int(11) DEFAULT NULL,
  `squadra` varchar(12) NOT NULL DEFAULT '',
  `lega` int(11) DEFAULT NULL,
  `punti` decimal(4,1) DEFAULT NULL,
  UNIQUE KEY `squadra` (`squadra`,`lega`),
  KEY `squadraclassificafacolta_idx` (`squadra`),
  KEY `legaclassificafacolta_idx` (`lega`),
  CONSTRAINT `legaclassificafacolta` FOREIGN KEY (`lega`) REFERENCES `LegaFacolta` (`idLegaFacolta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `squadraclassificafacolta` FOREIGN KEY (`squadra`) REFERENCES `Utente` (`matricola`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ClassificaFacolta` WRITE;
/*!40000 ALTER TABLE `ClassificaFacolta` DISABLE KEYS */;

INSERT INTO `ClassificaFacolta` (`posizione`, `squadra`, `lega`, `punti`)
VALUES
	(2,'0510200479',1,0.0);

/*!40000 ALTER TABLE `ClassificaFacolta` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Formazione
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Formazione`;

CREATE TABLE `Formazione` (
  `idFormazione` int(11) NOT NULL AUTO_INCREMENT,
  `dataConsegna` datetime DEFAULT NULL,
  `modulo` varchar(45) DEFAULT NULL,
  `giornata` int(11) DEFAULT NULL,
  `utente` varchar(12) DEFAULT NULL,
  `punti` float NOT NULL,
  PRIMARY KEY (`idFormazione`),
  KEY `giorn_idx` (`giornata`),
  KEY `uten_idx` (`utente`),
  CONSTRAINT `giornForma` FOREIGN KEY (`giornata`) REFERENCES `Giornata` (`idGiornata`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `utForma` FOREIGN KEY (`utente`) REFERENCES `Utente` (`matricola`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Formazione` WRITE;
/*!40000 ALTER TABLE `Formazione` DISABLE KEYS */;

INSERT INTO `Formazione` (`idFormazione`, `dataConsegna`, `modulo`, `giornata`, `utente`, `punti`)
VALUES
	(27,'2016-09-17 03:21:01','343',191,'0510200479',0),
	(28,'2016-09-18 10:33:09','343',191,'0510200479',0),
	(29,'2016-09-18 03:49:59','343',191,'0510200479',0),
	(30,'2016-09-18 06:21:01','343',191,'051011111',0);

/*!40000 ALTER TABLE `Formazione` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table formazioneconvoto
# ------------------------------------------------------------

DROP VIEW IF EXISTS `formazioneconvoto`;

CREATE TABLE `formazioneconvoto` (
   `idGiocatore` INT(11) NOT NULL DEFAULT '0',
   `nome` VARCHAR(45) NULL DEFAULT NULL,
   `squadra` VARCHAR(45) NULL DEFAULT NULL,
   `ruolo` VARCHAR(45) NULL DEFAULT NULL,
   `tipoSchieramento` VARCHAR(1) NOT NULL,
   `voto` DECIMAL(10) NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table Giocatore
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Giocatore`;

CREATE TABLE `Giocatore` (
  `idGiocatore` int(11) NOT NULL AUTO_INCREMENT,
  `ruolo` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `squadra` varchar(45) DEFAULT NULL,
  `prezzoIniziale` varchar(45) DEFAULT NULL,
  `prezzoAttuale` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idGiocatore`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Giocatore` WRITE;
/*!40000 ALTER TABLE `Giocatore` DISABLE KEYS */;

INSERT INTO `Giocatore` (`idGiocatore`, `ruolo`, `nome`, `squadra`, `prezzoIniziale`, `prezzoAttuale`)
VALUES
	(101,'P','ABBIATI','MILAN','1','1'),
	(102,'P','ANDUJAR','NAPOLI','1','1'),
	(103,'P','BASSI','ATALANTA','1','1'),
	(104,'P','BENUSSI','CARPI','2','2'),
	(105,'P','BERISHA','LAZIO','1','1'),
	(106,'P','BERNI','INTER','1','1'),
	(107,'P','BIZZARRI','CHIEVO','11','12'),
	(108,'P','BRIGNOLI','SAMPDORIA','1','1'),
	(109,'P','BRKIC','CARPI','8','6'),
	(110,'P','BUFFON','JUVENTUS','17','17'),
	(111,'P','CARRIZO','INTER','1','1'),
	(112,'P','CASTELLAZZI','TORINO','1','1'),
	(113,'P','COLOMBI','PALERMO','1','1'),
	(114,'P','CONSIGLI','SASSUOLO','10','10'),
	(115,'P','COPPOLA','VERONA','1','1'),
	(116,'P','DA COSTA','BOLOGNA','1','1'),
	(117,'P','DE SANCTIS','ROMA','2','2'),
	(118,'P','DONNARUMMA','GENOA','1','1'),
	(119,'P','DONNARUMMA G.','MILAN','1','1'),
	(120,'P','GABRIEL','NAPOLI','1','1'),
	(121,'P','GOLLINI','VERONA','1','1'),
	(123,'P','GUERRIERI','LAZIO','1','1'),
	(124,'P','HANDANOVIC','INTER','14','15'),
	(125,'P','ICHAZO','TORINO','1','1'),
	(126,'P','KARNEZIS','UDINESE','12','13'),
	(127,'P','LAMANNA','GENOA','1','1'),
	(128,'P','LEALI','FROSINONE','8','9'),
	(129,'P','LEZZERINI','FIORENTINA','1','1'),
	(130,'P','LOBONT','ROMA','1','1'),
	(131,'P','DIEGO LOPEZ','MILAN','13','13'),
	(132,'P','MARCHETTI','LAZIO','13','13'),
	(133,'P','MERET','UDINESE','1','1'),
	(134,'P','MIRANTE','BOLOGNA','10','10'),
	(135,'P','MURANO','CARPI','1','1'),
	(136,'P','NETO','JUVENTUS','1','1'),
	(137,'P','PADELLI','TORINO','11','11'),
	(138,'P','PEGOLO','SASSUOLO','1','1'),
	(139,'P','PELAGOTTI','EMPOLI','1','1'),
	(140,'P','PERIN','GENOA','14','14'),
	(141,'P','PIGLIACELLI','FROSINONE','1','1'),
	(142,'P','POMINI','SASSUOLO','1','1'),
	(144,'P','PUGGIONI','SAMPDORIA','1','1'),
	(145,'P','PUGLIESI','EMPOLI','1','1'),
	(146,'P','RADUNOVIC','ATALANTA','1','1'),
	(147,'P','RAFAEL D.A.','VERONA','10','10'),
	(148,'P','REINA','NAPOLI','13','13'),
	(149,'P','RUBINHO','JUVENTUS','1','1'),
	(150,'P','SARR','BOLOGNA','1','1'),
	(152,'P','SECULIN','CHIEVO','1','1'),
	(153,'P','SEPE','FIORENTINA','10','10'),
	(154,'P','SKORUPSKI','EMPOLI','9','8'),
	(155,'P','SORRENTINO','PALERMO','10','11'),
	(156,'P','SPORTIELLO','ATALANTA','11','12'),
	(158,'P','TATARUSANU','FIORENTINA','4','5'),
	(159,'P','UJKANI','GENOA','1','1'),
	(160,'P','VIVIANO','SAMPDORIA','13','15'),
	(161,'P','ZAPPINO','FROSINONE','2','2'),
	(162,'P','BRESSAN','CHIEVO','1','1'),
	(163,'P','SZCZESNY','ROMA','14','15'),
	(164,'P','RAFAEL C.','NAPOLI','1','1'),
	(201,'D','ABATE','MILAN','7','7'),
	(202,'D','ACERBI','SASSUOLO','9','9'),
	(203,'D','ADNAN','UDINESE','5','5'),
	(204,'D','ALBERTAZZI','VERONA','2','2'),
	(205,'D','ALBIOL','NAPOLI','7','7'),
	(206,'D','ALEX','MILAN','7','7'),
	(207,'D','ALONSO','FIORENTINA','5','7'),
	(208,'D','ALTOBELLI','FROSINONE','2','2'),
	(209,'D','ANDELKOVIC','PALERMO','4','4'),
	(210,'D','ANDREOLLI M.','INTER','3','3'),
	(211,'D','ANTEI','SASSUOLO','3','3'),
	(212,'D','ANTONELLI L.','MILAN','11','11'),
	(213,'D','ARIAUDO','SASSUOLO','3','3'),
	(214,'D','AVELAR','TORINO','8','9'),
	(215,'D','BAGADUR','FIORENTINA','1','1'),
	(216,'D','BARBA','EMPOLI','6','6'),
	(217,'D','BARZAGLI','JUVENTUS','10','10'),
	(218,'D','BASANTA','FIORENTINA','6','6'),
	(219,'D','BASTA','LAZIO','12','12'),
	(220,'D','BELLINI','ATALANTA','4','4'),
	(222,'D','BERTONCINI','FROSINONE','2','2'),
	(223,'D','BIANCHETTI','VERONA','3','3'),
	(224,'D','BIRAGHI','CHIEVO','4','4'),
	(225,'D','BITTANTE','EMPOLI','5','5'),
	(226,'D','BLANCHARD','FROSINONE','6','6'),
	(228,'D','BONUCCI','JUVENTUS','13','13'),
	(229,'D','BORGHINI','EMPOLI','1','1'),
	(230,'D','BOVO','TORINO','4','4'),
	(231,'D','BRAAFHEID','LAZIO','4','4'),
	(232,'D','BRIVIO','ATALANTA','3','3'),
	(233,'D','BUBNJIC','CARPI','3','3'),
	(234,'D','BURDISSO','GENOA','7','7'),
	(235,'D','CACCIATORE','CHIEVO','4','4'),
	(236,'D','CACERES','JUVENTUS','5','5'),
	(237,'D','CALABRIA','MILAN','1','1'),
	(238,'D','CAMPORESE','EMPOLI','3','3'),
	(239,'D','CANA','LAZIO','3','3'),
	(240,'D','CANINI','ATALANTA','2','2'),
	(241,'D','CANNAVARO','SASSUOLO','5','6'),
	(242,'D','CAPRADOSSI','ROMA','1','1'),
	(243,'D','CASSANI','SAMPDORIA','6','7'),
	(244,'D','CASTAN','ROMA','7','6'),
	(245,'D','CESAR B.','CHIEVO','4','4'),
	(246,'D','CHERUBIN','ATALANTA','4','4'),
	(247,'D','CHIELLINI','JUVENTUS','12','12'),
	(248,'D','CIOFANI M.','FROSINONE','3','3'),
	(249,'D','CISSOKHO','GENOA','4','5'),
	(250,'D','CODA','SAMPDORIA','2','2'),
	(251,'D','COLE','ROMA','5','5'),
	(252,'D','CONTI A.','ATALANTA','2','2'),
	(253,'D','COSTA A.','EMPOLI','4','4'),
	(254,'D','CRIVELLO','FROSINONE','4','4'),
	(255,'D','D\'AMBROSIO','INTER','6','6'),
	(256,'D','DAINELLI','CHIEVO','6','6'),
	(257,'D','DANILO','UDINESE','10','10'),
	(258,'D','DAPRELA F.','PALERMO','3','3'),
	(259,'D','DE CEGLIE','JUVENTUS','3','3'),
	(260,'D','DE MAIO','GENOA','7','7'),
	(261,'D','DE SCIGLIO','MILAN','5','5'),
	(262,'D','DE SILVESTRI','SAMPDORIA','9','9'),
	(263,'D','DE VRIJ','LAZIO','11','11'),
	(264,'D','DEL GROSSO','ATALANTA','3','3'),
	(265,'D','DERMAKU','EMPOLI','2','2'),
	(266,'D','DIAKITÔ','FROSINONE','5','6'),
	(267,'D','DIMARCO','INTER','2','2'),
	(268,'D','DODO\'','INTER','4','4'),
	(269,'D','DOMIZZI','UDINESE','6','6'),
	(270,'D','DRAME\'','ATALANTA','4','4'),
	(271,'D','EDENILSON','UDINESE','6','6'),
	(272,'D','ELY','MILAN','2','1'),
	(273,'D','EMERSON P.','ROMA','4','4'),
	(274,'D','EVRA','JUVENTUS','9','9'),
	(275,'D','FARAONI','UDINESE','2','2'),
	(276,'D','FERRARI','BOLOGNA','2','2'),
	(277,'D','FIGUEIRAS','GENOA','6','6'),
	(278,'D','FONTANESI','SASSUOLO','2','2'),
	(279,'D','FREY N.','CHIEVO','5','5'),
	(280,'D','GABRIEL SILVA','CARPI','5','5'),
	(281,'D','GAGLIOLO','CARPI','6','6'),
	(282,'D','GAMBERINI','CHIEVO','4','5'),
	(283,'D','GASTALDELLO','BOLOGNA','7','7'),
	(284,'D','GASTON SILVA','TORINO','2','2'),
	(285,'D','GAZZOLA','SASSUOLO','4','4'),
	(286,'D','GENTILETTI','LAZIO','8','9'),
	(287,'D','GHOULAM','NAPOLI','6','6'),
	(288,'D','GLIK','TORINO','14','14'),
	(289,'D','GOBBI','CHIEVO','5','6'),
	(290,'D','GOLDANIGA','PALERMO','4','4'),
	(291,'D','GONZALEZ','PALERMO','8','9'),
	(292,'D','HEGAZI','FIORENTINA','2','2'),
	(293,'D','HENRIQUE','NAPOLI','3','3'),
	(294,'D','HEURTAUX','UDINESE','8','8'),
	(295,'D','HOEDT','LAZIO','5','5'),
	(296,'D','HYSAJ','NAPOLI','5','5'),
	(297,'D','ISLA','JUVENTUS','4','4'),
	(298,'D','IZZO','GENOA','6','6'),
	(299,'D','JANSSON','TORINO','3','3'),
	(300,'D','JUAN JESUS','INTER','6','6'),
	(301,'D','KONKO','LAZIO','3','3'),
	(302,'D','KOULIBALY','NAPOLI','7','7'),
	(303,'D','KRESIC','ATALANTA','1','1'),
	(304,'D','LAURINI','EMPOLI','4','4'),
	(305,'D','LAZAAR','PALERMO','8','8'),
	(306,'D','LETIZIA','CARPI','5','4'),
	(307,'D','LICHTSTEINER','JUVENTUS','14','14'),
	(308,'D','LONGHI','SASSUOLO','4','4'),
	(309,'D','LUPERTO','NAPOLI','1','1'),
	(310,'D','MAGGIO','NAPOLI','5','5'),
	(311,'D','MAICON','ROMA','10','10'),
	(312,'D','MAIETTA','BOLOGNA','3','3'),
	(313,'D','MAKSIMOVIC','TORINO','7','7'),
	(314,'D','MANOLAS','ROMA','11','11'),
	(315,'D','MARCHESE','GENOA','8','8'),
	(316,'D','MARIO RUI','EMPOLI','7','7'),
	(317,'D','MARQUEZ','VERONA','6','6'),
	(318,'D','MARTINELLI','EMPOLI','2','2'),
	(319,'D','MASIELLO','ATALANTA','4','4'),
	(320,'D','MASINA','BOLOGNA','3','3'),
	(321,'D','MATTIELLO','CHIEVO','4','4'),
	(322,'D','MAURICIO','LAZIO','4','4'),
	(323,'D','MBAYE','BOLOGNA','5','5'),
	(324,'D','MESBAH','SAMPDORIA','3','3'),
	(325,'D','MEXES','MILAN','6','6'),
	(326,'D','MIRANDA','INTER','12','12'),
	(327,'D','MOISANDER','SAMPDORIA','7','7'),
	(328,'D','MOLINARO','TORINO','5','5'),
	(329,'D','MONTOYA','INTER','7','7'),
	(330,'D','MORAS','VERONA','7','7'),
	(331,'D','MORETTI E.','TORINO','9','9'),
	(332,'D','MORLEO','BOLOGNA','4','4'),
	(333,'D','MUNOZ','GENOA','6','6'),
	(334,'D','MURILLO','INTER','8','8'),
	(335,'D','NAGATOMO','INTER','5','5'),
	(336,'D','OIKONOMOU','BOLOGNA','4','4'),
	(337,'D','PALETTA','MILAN','6','6'),
	(338,'D','PARENTE','GENOA','1','1'),
	(339,'D','PASQUAL','FIORENTINA','9','9'),
	(340,'D','PASQUALE','UDINESE','3','3'),
	(341,'D','PATRIC','LAZIO','2','2'),
	(342,'D','PAVLOVIC','FROSINONE','5','5'),
	(343,'D','PELUSO','SASSUOLO','6','6'),
	(344,'D','PERES','TORINO','11','11'),
	(345,'D','PIRIS','UDINESE','5','5'),
	(346,'D','PIRRELLO','PALERMO','1','1'),
	(347,'D','PISANO','VERONA','4','4'),
	(348,'D','POLI F.','CARPI','3','3'),
	(349,'D','PRCE','LAZIO','1','1'),
	(350,'D','PUCINO','CHIEVO','3','3'),
	(351,'D','RADU','LAZIO','8','7'),
	(352,'D','RAIMONDI','ATALANTA','5','5'),
	(353,'D','RANOCCHIA','INTER','8','8'),
	(354,'D','REGINI','SAMPDORIA','4','4'),
	(355,'D','RISPOLI','PALERMO','6','6'),
	(356,'D','RODRIGUEZ GON.','FIORENTINA','14','14'),
	(357,'D','ROMAGNOLI','MILAN','10','9'),
	(358,'D','ROMAGNOLI S.','CARPI','4','4'),
	(359,'D','RONCAGLIA','FIORENTINA','4','4'),
	(360,'D','ROSI','FROSINONE','5','6'),
	(361,'D','ROSSETTINI','BOLOGNA','6','6'),
	(362,'D','RUGANI','JUVENTUS','7','7'),
	(363,'D','RUSSO','FROSINONE','3','3'),
	(364,'D','SALAMON B.','SAMPDORIA','4','4'),
	(365,'D','SANTON','INTER','6','6'),
	(366,'D','SARDO','CHIEVO','4','4'),
	(368,'D','SILVESTRE','SAMPDORIA','8','8'),
	(369,'D','SOUPRAYEN','VERONA','5','5'),
	(371,'D','STENDARDO','ATALANTA','6','6'),
	(372,'D','STRINIC','NAPOLI','5','5'),
	(373,'D','STRUNA','PALERMO','5','5'),
	(374,'D','SUAGHER','ATALANTA','3','3'),
	(375,'D','TAMBE','GENOA','3','3'),
	(376,'D','TERRANOVA','SASSUOLO','4','4'),
	(378,'D','TOMOVIC','FIORENTINA','6','7'),
	(379,'D','TONELLI','EMPOLI','12','12'),
	(380,'D','TOROSIDIS V.','ROMA','5','5'),
	(381,'D','TROIANI','CHIEVO','1','1'),
	(383,'D','VIDIC','INTER','5','5'),
	(384,'D','VITIELLO','PALERMO','4','4'),
	(385,'D','VRSALJKO','SASSUOLO','9','9'),
	(386,'D','WAGUE','UDINESE','5','5'),
	(387,'D','WALLACE','CARPI','4','4'),
	(388,'D','WIDMER','UDINESE','11','11'),
	(389,'D','WINCK','VERONA','5','5'),
	(391,'D','ZACCARDO','MILAN','3','3'),
	(393,'D','ZANON','FROSINONE','4','4'),
	(394,'D','ZAPATA C.','MILAN','5','5'),
	(395,'D','ZAPPACOSTA','TORINO','12','12'),
	(396,'D','ZUKANOVIC','SAMPDORIA','9','9'),
	(397,'D','ZUNIGA','NAPOLI','6','6'),
	(398,'D','GILBERTO','FIORENTINA','5','5'),
	(399,'D','HELANDER','VERONA','5','5'),
	(400,'D','SPOLLI','CARPI','6','6'),
	(401,'D','EL KAOUTARI','PALERMO','5','7'),
	(402,'D','CHIRICHES','NAPOLI','6','6'),
	(403,'D','ASTORI','FIORENTINA','7','7'),
	(404,'D','CECCARELLI','BOLOGNA','3','3'),
	(406,'D','ZAMBELLI','EMPOLI','6','6'),
	(407,'D','DELL\'ORCO','SASSUOLO','3','3'),
	(408,'D','KRAFTH','BOLOGNA','4','4'),
	(409,'D','RUDIGER','ROMA','8','8'),
	(410,'D','NEUTON','UDINESE','3','3'),
	(411,'D','GYOMBER','ROMA','3','3'),
	(413,'D','ALEX SANDRO','JUVENTUS','13','13'),
	(414,'D','DIGNE','ROMA','7','7'),
	(415,'D','TOLOI','ATALANTA','7','7'),
	(416,'D','INSUA','GENOA','5','5'),
	(501,'C','ACQUAH','TORINO','5','5'),
	(502,'C','ALLAN','NAPOLI','11','11'),
	(503,'C','FELIPE ANDERSON','LAZIO','24','23'),
	(504,'C','ASAMOAH','JUVENTUS','6','6'),
	(505,'C','BADELJ','FIORENTINA','6','6'),
	(506,'C','BADU','UDINESE','7','7'),
	(507,'C','BAKIC M.','FIORENTINA','2','2'),
	(508,'C','BARRETO E.','SAMPDORIA','11','11'),
	(509,'C','BASELLI','TORINO','8','10'),
	(510,'C','BENALI','PALERMO','5','5'),
	(511,'C','BENASSI','TORINO','7','8'),
	(512,'C','BERTOLACCI','MILAN','14','13'),
	(513,'C','BIANCO','CARPI','3','3'),
	(514,'C','BIGLIA','LAZIO','13','15'),
	(515,'C','BIONDINI','SASSUOLO','5','5'),
	(516,'C','BIRSA','CHIEVO','6','9'),
	(517,'C','BOLZONI','PALERMO','3','3'),
	(518,'C','BONAVENTURA','MILAN','16','15'),
	(519,'C','BRIGHI','BOLOGNA','6','5'),
	(520,'C','BRILLANTE','EMPOLI','3','3'),
	(521,'C','BROH','SASSUOLO','1','1'),
	(522,'C','BROZOVIC','INTER','8','8'),
	(523,'C','BRUGMAN','PALERMO','5','5'),
	(524,'C','CANDREVA','LAZIO','23','23'),
	(526,'C','CARLINI','FROSINONE','4','4'),
	(527,'C','CARMONA','ATALANTA','5','4'),
	(528,'C','CASTRO L.','CHIEVO','11','11'),
	(529,'C','CATALDI','LAZIO','7','7'),
	(530,'C','CHIBSAH','FROSINONE','5','5'),
	(531,'C','CHOCHEV','PALERMO','6','6'),
	(532,'C','CHRISTIANSEN','CHIEVO','4','4'),
	(533,'C','CIGARINI','ATALANTA','9','9'),
	(534,'C','CORREA J.','SAMPDORIA','8','8'),
	(535,'C','COSTA T.','GENOA','9','9'),
	(537,'C','CRISETIG','BOLOGNA','5','5'),
	(538,'C','CROCE','EMPOLI','8','9'),
	(539,'C','D\'ALESSANDRO','ATALANTA','5','5'),
	(540,'C','DE GUZMAN','NAPOLI','7','7'),
	(541,'C','DE JONG','MILAN','8','8'),
	(542,'C','DE ROON','ATALANTA','5','6'),
	(543,'C','DE ROSSI','ROMA','11','11'),
	(545,'C','DELLA ROCCA','PALERMO','2','2'),
	(546,'C','DEZI','NAPOLI','2','2'),
	(547,'C','DI GAUDIO','CARPI','9','9'),
	(548,'C','DIAKHATE','FIORENTINA','1','1'),
	(549,'C','DIAWARA','BOLOGNA','1','1'),
	(550,'C','DIOUSSE\'','EMPOLI','1','1'),
	(551,'C','DUNCAN','SASSUOLO','6','6'),
	(552,'C','EL KADDOURI','NAPOLI','8','8'),
	(553,'C','ESTIGARRIBIA','ATALANTA','6','6'),
	(554,'C','EVANGELISTA','UDINESE','3','3'),
	(555,'C','FARNERUD','TORINO','6','6'),
	(556,'C','FAZZI','FIORENTINA','2','2'),
	(557,'C','FERNANDES','UDINESE','8','8'),
	(558,'C','FERNANDEZ M.','FIORENTINA','12','12'),
	(559,'C','FERNANDO','SAMPDORIA','8','10'),
	(560,'C','FLORENZI','ROMA','12','14'),
	(561,'C','FRARA','FROSINONE','4','4'),
	(563,'C','GAZZI','TORINO','4','4'),
	(564,'C','GIORGI','ATALANTA','3','3'),
	(565,'C','GNOUKOURI','INTER','4','4'),
	(566,'C','GOMEZ','ATALANTA','12','12'),
	(567,'C','GORI','FROSINONE','4','4'),
	(568,'C','GRASSI','ATALANTA','2','2'),
	(569,'C','GRECO','VERONA','5','5'),
	(570,'C','GUARIN','INTER','13','13'),
	(571,'C','GUCHER','FROSINONE','6','6'),
	(572,'C','GUILHERME','UDINESE','5','5'),
	(574,'C','HALLFREDSSON','VERONA','11','12'),
	(575,'C','HAMSIK','NAPOLI','18','19'),
	(576,'C','HERNANES','INTER','15','15'),
	(577,'C','HETEMAJ','CHIEVO','6','6'),
	(578,'C','HILJEMARK','PALERMO','5','6'),
	(579,'C','HONDA','MILAN','9','9'),
	(581,'C','IONITA','VERONA','6','6'),
	(582,'C','ITURRA','UDINESE','4','4'),
	(583,'C','IVAN','SAMPDORIA','1','1'),
	(584,'C','IZCO','CHIEVO','7','7'),
	(585,'C','JAJALO','PALERMO','4','4'),
	(586,'C','JANKOVIC B.','VERONA','7','9'),
	(587,'C','JOAQUIN','FIORENTINA','12','12'),
	(588,'C','JORGINHO','NAPOLI','6','6'),
	(589,'C','KEITA','ROMA','9','9'),
	(590,'C','KHEDIRA','JUVENTUS','10','10'),
	(591,'C','KISHNA','LAZIO','7','9'),
	(592,'C','KONDOGBIA','INTER','14','14'),
	(593,'C','KONE P.','UDINESE','9','10'),
	(595,'C','KRSTICIC','SAMPDORIA','5','5'),
	(596,'C','KRUNIC','EMPOLI','3','3'),
	(597,'C','KUCKA','MILAN','7','7'),
	(598,'C','KURTIC','ATALANTA','6','7'),
	(599,'C','LANER','VERONA','2','2'),
	(600,'C','LARIBI','SASSUOLO','5','5'),
	(601,'C','LAXALT','GENOA','3','4'),
	(602,'C','LAZOVIC','GENOA','8','8'),
	(603,'C','LAZZARI','CARPI','7','7'),
	(604,'C','LOLLO','CARPI','4','4'),
	(605,'C','DAVID LOPEZ','NAPOLI','7','7'),
	(606,'C','LULIC K.','SAMPDORIA','1','1'),
	(607,'C','LULIC S.','LAZIO','11','11'),
	(608,'C','MAGNANELLI','SASSUOLO','6','6'),
	(609,'C','MARCHIONNI M.','SAMPDORIA','3','3'),
	(610,'C','MARCHISIO','JUVENTUS','14','14'),
	(611,'C','MARESCA','PALERMO','4','4'),
	(612,'C','MARRONE','CARPI','6','6'),
	(613,'C','MASTOUR','MILAN','2','2'),
	(614,'C','MAURI J.','MILAN','5','5'),
	(615,'C','MBAYE M.','CHIEVO','1','1'),
	(616,'C','MEDEL','INTER','6','6'),
	(617,'C','MERKEL','UDINESE','4','4'),
	(618,'C','MERTENS','NAPOLI','17','16'),
	(619,'C','MIGLIACCIO','ATALANTA','3','3'),
	(620,'C','MISSIROLI S.','SASSUOLO','10','10'),
	(621,'C','MONTOLIVO','MILAN','7','7'),
	(622,'C','MORALEZ','ATALANTA','14','13'),
	(623,'C','MORRISON','LAZIO','7','7'),
	(624,'C','NAINGGOLAN','ROMA','15','15'),
	(625,'C','NOCERINO','MILAN','4','4'),
	(626,'C','OBI','TORINO','3','3'),
	(627,'C','OIKONOMIDIS','LAZIO','2','2'),
	(628,'C','ONAZI','LAZIO','4','4'),
	(629,'C','PADOIN','JUVENTUS','4','4'),
	(630,'C','PAGANINI','FROSINONE','5','6'),
	(631,'C','PALOMBO','SAMPDORIA','6','6'),
	(632,'C','PAREDES','ROMA','4','4'),
	(633,'C','PAROLO','LAZIO','18','18'),
	(634,'C','PASCIUTI','CARPI','5','5'),
	(635,'C','PASQUATO','JUVENTUS','4','4'),
	(636,'C','PELLEGRINI','SASSUOLO','1','1'),
	(637,'C','PEREYRA','JUVENTUS','12','12'),
	(638,'C','PEROTTI','GENOA','17','17'),
	(639,'C','PETRICCIONE','FIORENTINA','1','1'),
	(640,'C','PINZI','UDINESE','5','5'),
	(641,'C','PJANIC','ROMA','16','16'),
	(642,'C','POGBA','JUVENTUS','22','21'),
	(643,'C','POLI','MILAN','5','5'),
	(644,'C','POLITANO','SASSUOLO','5','5'),
	(645,'C','PORCARI','CARPI','4','4'),
	(646,'C','PUGLIESE','CARPI','1','1'),
	(647,'C','QUAISON','PALERMO','7','7'),
	(648,'C','RADOVANOVIC','CHIEVO','6','6'),
	(649,'C','RIGONI L.','PALERMO','15','15'),
	(650,'C','RIGONI N.','CHIEVO','3','3'),
	(651,'C','RINCON','GENOA','7','7'),
	(652,'C','RIZZO','BOLOGNA','6','6'),
	(653,'C','ROMULO','VERONA','8','8'),
	(654,'C','RONALDO P.','EMPOLI','6','6'),
	(655,'C','ROSSI F.','JUVENTUS','2','2'),
	(657,'C','SALA','VERONA','8','8'),
	(658,'C','SAMMARCO','FROSINONE','4','4'),
	(659,'C','SAPONARA','EMPOLI','19','21'),
	(661,'C','SIGNORELLI','EMPOLI','4','4'),
	(662,'C','SODDIMO','FROSINONE','8','10'),
	(663,'C','SORIANO','SAMPDORIA','12','13'),
	(664,'C','STEVANOVIC','TORINO','3','3'),
	(665,'C','STROOTMAN','ROMA','11','11'),
	(666,'C','STURARO','JUVENTUS','6','6'),
	(667,'C','SUAREZ','FIORENTINA','9','9'),
	(668,'C','SUSO','MILAN','7','7'),
	(669,'C','TACHTSIDIS','GENOA','6','6'),
	(670,'C','UCAN','ROMA','3','3'),
	(672,'C','VALDIFIORI','NAPOLI','12','11'),
	(673,'C','BORJA VALERO','FIORENTINA','13','13'),
	(675,'C','VECINO','FIORENTINA','7','7'),
	(678,'C','VIVES','TORINO','5','5'),
	(679,'C','VIVIANI','VERONA','6','6'),
	(680,'C','WSZOLEK','SAMPDORIA','3','3'),
	(681,'C','ZACCAGNI','VERONA','1','1'),
	(682,'C','ZIELINSKI','EMPOLI','5','5'),
	(683,'C','ZUCULINI','BOLOGNA','4','4'),
	(684,'C','BRIENZA','BOLOGNA','15','16'),
	(685,'C','MARTINHO','CARPI','8','8'),
	(686,'C','FEDELE','CARPI','4','4'),
	(687,'C','NTCHAM','GENOA','3','4'),
	(688,'C','MILINKOVIC-SAVIC','LAZIO','5','5'),
	(689,'C','PULGAR','BOLOGNA','6','6'),
	(690,'C','PEPE','CHIEVO','6','6'),
	(691,'C','MAIELLO','EMPOLI','5','5'),
	(692,'C','SCHELOTTO','INTER','3','3'),
	(693,'C','CAPEL','GENOA','9','9'),
	(694,'C','MARQUINHO','UDINESE','8','8'),
	(695,'C','INIGUEZ','CARPI','5','5'),
	(696,'C','FALCO','BOLOGNA','5','5'),
	(697,'C','MAURI S.','LAZIO','15','15'),
	(699,'C','CRIMI','BOLOGNA','5','5'),
	(700,'C','CUADRADO','JUVENTUS','18','18'),
	(701,'C','DONSAH','BOLOGNA','9','9'),
	(702,'C','TONEV','FROSINONE','6','6'),
	(703,'C','CARBONERO','SAMPDORIA','8','8'),
	(801,'A','ACQUAFRESCA','BOLOGNA','11','11'),
	(802,'A','AGUIRRE','UDINESE','5','5'),
	(803,'A','AMAURI','TORINO','8','8'),
	(804,'A','BABACAR','FIORENTINA','17','17'),
	(805,'A','BACCA','MILAN','27','26'),
	(806,'A','BELOTTI','TORINO','18','18'),
	(807,'A','BENTIVEGNA','PALERMO','1','1'),
	(808,'A','BERARDI D.','SASSUOLO','27','27'),
	(809,'A','BERNARDESCHI','FIORENTINA','11','11'),
	(810,'A','BIABIANY','INTER','8','8'),
	(812,'A','BOAKYE','ATALANTA','7','7'),
	(813,'A','BONAZZOLI','SAMPDORIA','8','8'),
	(814,'A','CACIA','BOLOGNA','12','12'),
	(815,'A','CALLEJON','NAPOLI','19','19'),
	(817,'A','CASSINI','PALERMO','10','10'),
	(818,'A','CERCI','MILAN','11','11'),
	(819,'A','CIOFANI D.','FROSINONE','12','12'),
	(820,'A','COMAN','JUVENTUS','6','6'),
	(821,'A','DENIS','ATALANTA','17','16'),
	(822,'A','DESTRO','BOLOGNA','18','17'),
	(823,'A','DI NATALE','UDINESE','27','26'),
	(824,'A','DIONISI','FROSINONE','14','14'),
	(825,'A','DJORDJEVIC','LAZIO','18','18'),
	(827,'A','DYBALA','JUVENTUS','25','24'),
	(828,'A','EDER','SAMPDORIA','22','25'),
	(829,'A','FALCINELLI','SASSUOLO','9','9'),
	(830,'A','FARES','VERONA','2','2'),
	(831,'A','FLOCCARI','SASSUOLO','11','11'),
	(832,'A','FLORO FLORES','SASSUOLO','13','15'),
	(833,'A','GABBIADINI','NAPOLI','24','23'),
	(834,'A','GAKPE\'','GENOA','9','9'),
	(835,'A','GEIJO','UDINESE','8','8'),
	(836,'A','GERVINHO','ROMA','14','14'),
	(837,'A','GHIGLIONE','GENOA','1','1'),
	(838,'A','GLIOZZI','SASSUOLO','2','2'),
	(839,'A','GOMEZ T.','VERONA','13','13'),
	(841,'A','HIGUAIN','NAPOLI','32','31'),
	(842,'A','IAGO FALQUE','ROMA','19','19'),
	(843,'A','IBARBO','ROMA','11','11'),
	(844,'A','ICARDI','INTER','34','33'),
	(845,'A','ILICIC','FIORENTINA','17','19'),
	(846,'A','INGLESE','CHIEVO','6','6'),
	(847,'A','INSIGNE','NAPOLI','16','15'),
	(848,'A','ITURBE','ROMA','13','13'),
	(849,'A','KEITA M.','LAZIO','13','13'),
	(850,'A','KLOSE','LAZIO','22','22'),
	(851,'A','LA GUMINA','PALERMO','2','2'),
	(852,'A','LASAGNA','CARPI','10','10'),
	(853,'A','LJAJIC','ROMA','13','13'),
	(854,'A','LLORENTE','JUVENTUS','14','14'),
	(856,'A','MAXI LOPEZ','TORINO','17','16'),
	(858,'A','LUIZ ADRIANO','MILAN','22','21'),
	(859,'A','LUPOLI','FROSINONE','7','7'),
	(860,'A','MACCARONE','EMPOLI','19','19'),
	(861,'A','MANCOSU','BOLOGNA','9','11'),
	(862,'A','MANDZUKIC','JUVENTUS','25','25'),
	(863,'A','MARILUNGO','ATALANTA','8','8'),
	(864,'A','MARTINEZ','TORINO','12','12'),
	(865,'A','MATOS','CARPI','8','10'),
	(866,'A','MATRI','MILAN','14','14'),
	(867,'A','MBAKOGU','CARPI','15','15'),
	(868,'A','MCHEDLIDZE','EMPOLI','11','11'),
	(869,'A','MEGGIORINI','CHIEVO','13','16'),
	(870,'A','MENEZ','MILAN','18','18'),
	(871,'A','MONACHELLO','ATALANTA','5','5'),
	(872,'A','MORATA','JUVENTUS','26','26'),
	(874,'A','MPOKU','CHIEVO','15','14'),
	(875,'A','MURIEL','SAMPDORIA','18','22'),
	(876,'A','NIANG','MILAN','15','15'),
	(878,'A','PALACIO','INTER','20','20'),
	(880,'A','PALOSCHI','CHIEVO','18','20'),
	(881,'A','PANDEV','GENOA','16','15'),
	(882,'A','PANICO','GENOA','1','1'),
	(883,'A','PAVOLETTI','GENOA','16','16'),
	(884,'A','PAZZINI','VERONA','15','15'),
	(885,'A','PELLISSIER','CHIEVO','13','13'),
	(887,'A','PERICA','UDINESE','7','7'),
	(888,'A','PINILLA','ATALANTA','18','18'),
	(889,'A','PIU','EMPOLI','2','2'),
	(890,'A','PUCCIARELLI','EMPOLI','13','13'),
	(892,'A','QUAGLIARELLA','TORINO','23','25'),
	(893,'A','REBIC','FIORENTINA','6','6'),
	(894,'A','ROSSI G.','FIORENTINA','21','21'),
	(896,'A','SANSONE N.','SASSUOLO','14','16'),
	(898,'A','SILIGARDI','VERONA','10','10'),
	(899,'A','SOWE','CHIEVO','4','4'),
	(901,'A','THEREAU','UDINESE','18','20'),
	(902,'A','TONI','VERONA','29','28'),
	(904,'A','TOTTI','ROMA','20','20'),
	(905,'A','TRAJKOVSKI','PALERMO','7','7'),
	(906,'A','VARGAS E.','NAPOLI','12','12'),
	(907,'A','VAZQUEZ','PALERMO','22','22'),
	(908,'A','VERDE','FROSINONE','11','11'),
	(909,'A','WILCZEK','CARPI','11','11'),
	(912,'A','ZAPATA D.','UDINESE','18','18'),
	(913,'A','ZAZA','JUVENTUS','16','16'),
	(914,'A','JOVETIC','INTER','23','25'),
	(915,'A','SALAH','ROMA','23','22'),
	(916,'A','DEFREL','SASSUOLO','18','18'),
	(917,'A','LONGO','FROSINONE','13','13'),
	(918,'A','DZEKO','ROMA','26','26'),
	(920,'A','CASSANO','SAMPDORIA','18','18'),
	(921,'A','MANAJ','INTER','2','2'),
	(922,'A','ONETO','SAMPDORIA','1','1'),
	(923,'A','KALINIC','FIORENTINA','20','20'),
	(924,'A','DJURDJEVIC','PALERMO','6','6'),
	(925,'A','BALOTELLI','MILAN','21','21'),
	(926,'A','BAEZ','FIORENTINA','9','9'),
	(927,'A','GILARDINO','PALERMO','22','22'),
	(928,'A','HIWAT','CARPI','4','4');

/*!40000 ALTER TABLE `Giocatore` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table GiocatoreArchiviato
# ------------------------------------------------------------

DROP TABLE IF EXISTS `GiocatoreArchiviato`;

CREATE TABLE `GiocatoreArchiviato` (
  `idArchivioGiocatori` int(11) NOT NULL AUTO_INCREMENT,
  `archivioLega` int(11) DEFAULT NULL,
  `giocatore` int(11) DEFAULT NULL,
  PRIMARY KEY (`idArchivioGiocatori`),
  KEY `giocatorearchiviolega_idx` (`archivioLega`),
  KEY `gioactoregiocatore_idx` (`giocatore`),
  CONSTRAINT `gioactoregiocatore` FOREIGN KEY (`giocatore`) REFERENCES `Giocatore` (`idGiocatore`),
  CONSTRAINT `giocatorearchiviolega` FOREIGN KEY (`archivioLega`) REFERENCES `ArchivioLega` (`idArchivioLega`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Giornata
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Giornata`;

CREATE TABLE `Giornata` (
  `idGiornata` int(11) NOT NULL AUTO_INCREMENT,
  `dataGiornata` datetime NOT NULL,
  `lega` int(11) NOT NULL,
  `dataFineGiornata` datetime NOT NULL,
  `numero` int(11) NOT NULL,
  `incorso` int(1) NOT NULL,
  PRIMARY KEY (`idGiornata`),
  KEY `viybuiù_idx` (`lega`),
  CONSTRAINT `viybuiù` FOREIGN KEY (`lega`) REFERENCES `LegaFacolta` (`idLegaFacolta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Giornata` WRITE;
/*!40000 ALTER TABLE `Giornata` DISABLE KEYS */;

INSERT INTO `Giornata` (`idGiornata`, `dataGiornata`, `lega`, `dataFineGiornata`, `numero`, `incorso`)
VALUES
	(191,'2015-08-23 00:00:00',1,'0000-00-00 00:00:00',1,1),
	(192,'2015-08-30 00:00:00',1,'0000-00-00 00:00:00',2,0),
	(193,'2015-09-13 00:00:00',1,'0000-00-00 00:00:00',3,0),
	(194,'2015-09-20 00:00:00',1,'0000-00-00 00:00:00',4,0),
	(195,'2015-09-23 00:00:00',1,'0000-00-00 00:00:00',5,0),
	(196,'2015-09-27 00:00:00',1,'0000-00-00 00:00:00',6,0),
	(197,'2015-10-04 00:00:00',1,'0000-00-00 00:00:00',7,0),
	(198,'2015-10-18 00:00:00',1,'0000-00-00 00:00:00',8,0),
	(199,'2015-10-25 00:00:00',1,'0000-00-00 00:00:00',9,0),
	(200,'2015-10-28 00:00:00',1,'0000-00-00 00:00:00',10,0),
	(201,'2015-11-01 00:00:00',1,'0000-00-00 00:00:00',11,0),
	(202,'2015-11-08 00:00:00',1,'0000-00-00 00:00:00',12,0),
	(203,'2015-11-22 00:00:00',1,'0000-00-00 00:00:00',13,0),
	(204,'2015-11-29 00:00:00',1,'0000-00-00 00:00:00',14,0),
	(205,'2015-12-06 00:00:00',1,'0000-00-00 00:00:00',15,0),
	(206,'2015-12-13 00:00:00',1,'0000-00-00 00:00:00',16,0),
	(207,'2015-12-20 00:00:00',1,'0000-00-00 00:00:00',17,0),
	(208,'2016-01-06 00:00:00',1,'0000-00-00 00:00:00',18,0),
	(209,'2016-01-10 00:00:00',1,'0000-00-00 00:00:00',19,0),
	(210,'2016-01-17 00:00:00',1,'0000-00-00 00:00:00',20,0),
	(211,'2016-01-24 00:00:00',1,'0000-00-00 00:00:00',21,0),
	(212,'2016-01-31 00:00:00',1,'0000-00-00 00:00:00',22,0),
	(213,'2016-02-03 00:00:00',1,'0000-00-00 00:00:00',23,0),
	(214,'2016-02-07 00:00:00',1,'0000-00-00 00:00:00',24,0),
	(215,'2016-02-14 00:00:00',1,'0000-00-00 00:00:00',25,0),
	(216,'2016-02-21 00:00:00',1,'0000-00-00 00:00:00',26,0),
	(217,'2016-02-28 00:00:00',1,'0000-00-00 00:00:00',27,0),
	(218,'2016-03-06 00:00:00',1,'0000-00-00 00:00:00',28,0),
	(219,'2016-03-13 00:00:00',1,'0000-00-00 00:00:00',29,0),
	(220,'2016-03-20 00:00:00',1,'0000-00-00 00:00:00',30,0),
	(221,'2016-04-03 00:00:00',1,'0000-00-00 00:00:00',31,0),
	(222,'2016-04-10 00:00:00',1,'0000-00-00 00:00:00',32,0),
	(223,'2016-04-17 00:00:00',1,'0000-00-00 00:00:00',33,0),
	(224,'2016-04-20 00:00:00',1,'0000-00-00 00:00:00',34,0),
	(225,'2016-04-24 00:00:00',1,'0000-00-00 00:00:00',35,0),
	(226,'2016-05-01 00:00:00',1,'0000-00-00 00:00:00',36,0),
	(227,'2016-05-08 00:00:00',1,'0000-00-00 00:00:00',37,0),
	(228,'2016-05-15 00:00:00',1,'0000-00-00 00:00:00',38,0),
	(229,'2015-08-23 00:00:00',2,'0000-00-00 00:00:00',1,1),
	(230,'2015-08-30 00:00:00',2,'0000-00-00 00:00:00',2,0),
	(231,'2015-09-13 00:00:00',2,'0000-00-00 00:00:00',3,0),
	(232,'2015-09-20 00:00:00',2,'0000-00-00 00:00:00',4,0),
	(233,'2015-09-23 00:00:00',2,'0000-00-00 00:00:00',5,0),
	(234,'2015-09-27 00:00:00',2,'0000-00-00 00:00:00',6,0),
	(235,'2015-10-04 00:00:00',2,'0000-00-00 00:00:00',7,0),
	(236,'2015-10-18 00:00:00',2,'0000-00-00 00:00:00',8,0),
	(237,'2015-10-25 00:00:00',2,'0000-00-00 00:00:00',9,0),
	(238,'2015-10-28 00:00:00',2,'0000-00-00 00:00:00',10,0),
	(239,'2015-11-01 00:00:00',2,'0000-00-00 00:00:00',11,0),
	(240,'2015-11-08 00:00:00',2,'0000-00-00 00:00:00',12,0),
	(241,'2015-11-22 00:00:00',2,'0000-00-00 00:00:00',13,0),
	(242,'2015-11-29 00:00:00',2,'0000-00-00 00:00:00',14,0),
	(243,'2015-12-06 00:00:00',2,'0000-00-00 00:00:00',15,0),
	(244,'2015-12-13 00:00:00',2,'0000-00-00 00:00:00',16,0),
	(245,'2015-12-20 00:00:00',2,'0000-00-00 00:00:00',17,0),
	(246,'2016-01-06 00:00:00',2,'0000-00-00 00:00:00',18,0),
	(247,'2016-01-10 00:00:00',2,'0000-00-00 00:00:00',19,0),
	(248,'2016-01-17 00:00:00',2,'0000-00-00 00:00:00',20,0),
	(249,'2016-01-24 00:00:00',2,'0000-00-00 00:00:00',21,0),
	(250,'2016-01-31 00:00:00',2,'0000-00-00 00:00:00',22,0),
	(251,'2016-02-03 00:00:00',2,'0000-00-00 00:00:00',23,0),
	(252,'2016-02-07 00:00:00',2,'0000-00-00 00:00:00',24,0),
	(253,'2016-02-14 00:00:00',2,'0000-00-00 00:00:00',25,0),
	(254,'2016-02-21 00:00:00',2,'0000-00-00 00:00:00',26,0),
	(255,'2016-02-28 00:00:00',2,'0000-00-00 00:00:00',27,0),
	(256,'2016-03-06 00:00:00',2,'0000-00-00 00:00:00',28,0),
	(257,'2016-03-13 00:00:00',2,'0000-00-00 00:00:00',29,0),
	(258,'2016-03-20 00:00:00',2,'0000-00-00 00:00:00',30,0),
	(259,'2016-04-03 00:00:00',2,'0000-00-00 00:00:00',31,0),
	(260,'2016-04-10 00:00:00',2,'0000-00-00 00:00:00',32,0),
	(261,'2016-04-17 00:00:00',2,'0000-00-00 00:00:00',33,0),
	(262,'2016-04-20 00:00:00',2,'0000-00-00 00:00:00',34,0),
	(263,'2016-04-24 00:00:00',2,'0000-00-00 00:00:00',35,0),
	(264,'2016-05-01 00:00:00',2,'0000-00-00 00:00:00',36,0),
	(265,'2016-05-08 00:00:00',2,'0000-00-00 00:00:00',37,0),
	(266,'2016-05-15 00:00:00',2,'0000-00-00 00:00:00',38,0);

/*!40000 ALTER TABLE `Giornata` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table LegaFacolta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `LegaFacolta`;

CREATE TABLE `LegaFacolta` (
  `idLegaFacolta` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `lega` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLegaFacolta`),
  KEY `elg_idx` (`lega`),
  CONSTRAINT `elg` FOREIGN KEY (`lega`) REFERENCES `Leghe` (`idLeghe`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `LegaFacolta` WRITE;
/*!40000 ALTER TABLE `LegaFacolta` DISABLE KEYS */;

INSERT INTO `LegaFacolta` (`idLegaFacolta`, `nome`, `lega`)
VALUES
	(1,'informatica',23),
	(2,'ingegneria',23),
	(3,'Chimica',23),
	(4,'Biologia',23);

/*!40000 ALTER TABLE `LegaFacolta` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Leghe
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Leghe`;

CREATE TABLE `Leghe` (
  `idLeghe` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(11) DEFAULT NULL,
  `statoFantamercato` int(11) DEFAULT NULL,
  `attiva` int(11) NOT NULL,
  PRIMARY KEY (`idLeghe`),
  KEY `admin_idx` (`admin`),
  CONSTRAINT `admin` FOREIGN KEY (`admin`) REFERENCES `Admin` (`idAdmin`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Leghe` WRITE;
/*!40000 ALTER TABLE `Leghe` DISABLE KEYS */;

INSERT INTO `Leghe` (`idLeghe`, `admin`, `statoFantamercato`, `attiva`)
VALUES
	(15,1,0,0),
	(16,1,0,0),
	(17,1,0,0),
	(18,1,0,0),
	(19,1,0,0),
	(20,1,0,0),
	(21,1,0,0),
	(22,1,0,0),
	(23,1,0,0),
	(24,1,0,0),
	(25,1,0,0);

/*!40000 ALTER TABLE `Leghe` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mio
# ------------------------------------------------------------

DROP VIEW IF EXISTS `mio`;

CREATE TABLE `mio` (
   `Giocatore` INT(11) NOT NULL,
   `Formazione` INT(11) NOT NULL,
   `tipoSchieramento` VARCHAR(1) NOT NULL
) ENGINE=MyISAM;



# Dump of table PagellaGiocatore
# ------------------------------------------------------------

DROP TABLE IF EXISTS `PagellaGiocatore`;

CREATE TABLE `PagellaGiocatore` (
  `idPagellaGiocatori` int(11) NOT NULL AUTO_INCREMENT,
  `giornata` int(11) DEFAULT NULL,
  `voto` decimal(10,1) DEFAULT NULL,
  `giocatore` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPagellaGiocatori`),
  KEY `giorn_idx` (`giornata`),
  KEY `sdnos_idx` (`giocatore`),
  CONSTRAINT `giornataPagellaGiocatori` FOREIGN KEY (`giornata`) REFERENCES `Giornata` (`idGiornata`),
  CONSTRAINT `sdnos` FOREIGN KEY (`giocatore`) REFERENCES `Giocatore` (`idGiocatore`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Schierato
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Schierato`;

CREATE TABLE `Schierato` (
  `Giocatore` int(11) NOT NULL,
  `Formazione` int(11) NOT NULL,
  `tipoSchieramento` varchar(1) NOT NULL,
  KEY `Giocatore_UNIQUE` (`Giocatore`),
  KEY `Formazione_UNIQUE` (`Formazione`) USING BTREE,
  CONSTRAINT `dsafssxcv` FOREIGN KEY (`Formazione`) REFERENCES `Formazione` (`idFormazione`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `oindsaivbsd` FOREIGN KEY (`Giocatore`) REFERENCES `Giocatore` (`idGiocatore`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Schierato` WRITE;
/*!40000 ALTER TABLE `Schierato` DISABLE KEYS */;

INSERT INTO `Schierato` (`Giocatore`, `Formazione`, `tipoSchieramento`)
VALUES
	(120,27,'1'),
	(205,27,'1'),
	(293,27,'1'),
	(287,27,'1'),
	(502,27,'1'),
	(540,27,'1'),
	(546,27,'1'),
	(575,27,'1'),
	(833,27,'1'),
	(815,27,'1'),
	(841,27,'1'),
	(148,27,'0'),
	(402,27,'0'),
	(397,27,'0'),
	(672,27,'0'),
	(618,27,'0'),
	(885,27,'0'),
	(906,27,'0'),
	(101,28,'1'),
	(206,28,'1'),
	(212,28,'1'),
	(237,28,'1'),
	(541,28,'1'),
	(579,28,'1'),
	(597,28,'1'),
	(613,28,'1'),
	(818,28,'1'),
	(805,28,'1'),
	(858,28,'1'),
	(119,28,'0'),
	(201,28,'0'),
	(261,28,'0'),
	(518,28,'0'),
	(614,28,'0'),
	(866,28,'0'),
	(870,28,'0'),
	(131,29,'1'),
	(206,29,'1'),
	(212,29,'1'),
	(237,29,'1'),
	(512,29,'1'),
	(541,29,'1'),
	(518,29,'1'),
	(597,29,'1'),
	(818,29,'1'),
	(805,29,'1'),
	(858,29,'1'),
	(119,29,'0'),
	(337,29,'0'),
	(325,29,'0'),
	(621,29,'0'),
	(614,29,'0'),
	(876,29,'0'),
	(870,29,'0'),
	(101,30,'1'),
	(237,30,'1'),
	(272,30,'1'),
	(325,30,'1'),
	(512,30,'1'),
	(518,30,'1'),
	(541,30,'1'),
	(579,30,'1'),
	(805,30,'1'),
	(818,30,'1'),
	(858,30,'1'),
	(131,30,'0'),
	(337,30,'0'),
	(212,30,'0'),
	(614,30,'0'),
	(621,30,'0'),
	(870,30,'0'),
	(876,30,'0');

/*!40000 ALTER TABLE `Schierato` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ultimaformazione
# ------------------------------------------------------------

DROP VIEW IF EXISTS `ultimaformazione`;

CREATE TABLE `ultimaformazione` (
   `Giocatore` INT(11) NOT NULL,
   `Formazione` INT(11) NOT NULL,
   `tipoSchieramento` VARCHAR(1) NOT NULL
) ENGINE=MyISAM;



# Dump of table Utente
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Utente`;

CREATE TABLE `Utente` (
  `matricola` varchar(12) NOT NULL DEFAULT '',
  `nome` varchar(45) DEFAULT NULL,
  `cognome` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL DEFAULT '',
  `nomeFantasquadra` varchar(45) DEFAULT NULL,
  `puntiAccumulati` int(11) DEFAULT NULL,
  `fantamilioni` int(11) DEFAULT NULL,
  `pass` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`matricola`),
  UNIQUE KEY `matricola_UNIQUE` (`matricola`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `squadra_UNIQUE` (`nomeFantasquadra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Utente` WRITE;
/*!40000 ALTER TABLE `Utente` DISABLE KEYS */;

INSERT INTO `Utente` (`matricola`, `nome`, `cognome`, `email`, `nomeFantasquadra`, `puntiAccumulati`, `fantamilioni`, `pass`)
VALUES
	('051011111','giusepp','paglial','peonida','sdfccc',NULL,6,'aaaa'),
	('0510200479','giuseppe','paglialonga','peo','santamaria',NULL,2811,'ciao'),
	('0511111111','prova','prova','prova','lapinta',NULL,165,'prova');

/*!40000 ALTER TABLE `Utente` ENABLE KEYS */;
UNLOCK TABLES;




# Replace placeholder table for formazioneconvoto with correct view syntax
# ------------------------------------------------------------

DROP TABLE `formazioneconvoto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `formazioneconvoto` AS (select `giocatore`.`idGiocatore` AS `idGiocatore`,`giocatore`.`nome` AS `nome`,`giocatore`.`squadra` AS `squadra`,`giocatore`.`ruolo` AS `ruolo`,`ultimaformazione`.`tipoSchieramento` AS `tipoSchieramento`,`pagellagiocatore`.`voto` AS `voto` from ((`ultimaformazione` join `giocatore`) join `pagellagiocatore`) where ((`ultimaformazione`.`Giocatore` = `giocatore`.`idGiocatore`) and (`pagellagiocatore`.`giocatore` = `ultimaformazione`.`Giocatore`)));


# Replace placeholder table for mio with correct view syntax
# ------------------------------------------------------------

DROP TABLE `mio`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mio`
AS SELECT
   `schierato`.`Giocatore` AS `Giocatore`,
   `schierato`.`Formazione` AS `Formazione`,
   `schierato`.`tipoSchieramento` AS `tipoSchieramento`
FROM `schierato` where (`schierato`.`Formazione` = (select max(`formazione`.`idFormazione`) from `formazione`));


# Replace placeholder table for ultimaformazione with correct view syntax
# ------------------------------------------------------------

DROP TABLE `ultimaformazione`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ultimaformazione` AS (select `schierato`.`Giocatore` AS `Giocatore`,`schierato`.`Formazione` AS `Formazione`,`schierato`.`tipoSchieramento` AS `tipoSchieramento` from `schierato` where (`schierato`.`Formazione` = (select max(`formazione`.`idFormazione`) from `formazione`)));

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
