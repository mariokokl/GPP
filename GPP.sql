/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for GPP
CREATE DATABASE IF NOT EXISTS `GPP` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `GPP`;


-- Dumping structure for table GPP.autobusi
CREATE TABLE IF NOT EXISTS `autobusi` (
  `rb` int(11) NOT NULL AUTO_INCREMENT,
  `garazniBr` char(4) NOT NULL DEFAULT '0',
  `registracija` varchar(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table GPP.evidencijakvarova
CREATE TABLE IF NOT EXISTS `evidencijakvarova` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sifraZaposlenika` int(11) NOT NULL,
  `rbKvara` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zanimanje1` int(11) DEFAULT NULL,
  `vozilo1` int(11) DEFAULT NULL,
  `vrsta` int(11) DEFAULT NULL,
  `vozilo2` int(11) DEFAULT NULL,
  `vozilo3` int(11) DEFAULT NULL,
  `kilometri` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_evidencijakvarova_zanimanje` (`zanimanje1`),
  KEY `FK_evidencijakvarova_autobusi` (`vozilo1`),
  KEY `FK_evidencijakvarova_vrsta` (`vrsta`),
  KEY `FK_evidencijakvarova_ostalavozila` (`vozilo2`),
  KEY `FK_evidencijakvarova_zaposlenici` (`sifraZaposlenika`),
  KEY `FK_evidencijakvarova_vrstakvara` (`rbKvara`),
  KEY `FK_evidencijakvarova_lice3` (`vozilo3`),
  CONSTRAINT `FK_evidencijakvarova_autobusi` FOREIGN KEY (`vozilo1`) REFERENCES `autobusi` (`rb`),
  CONSTRAINT `FK_evidencijakvarova_lice3` FOREIGN KEY (`vozilo3`) REFERENCES `lice3` (`rb`),
  CONSTRAINT `FK_evidencijakvarova_ostalavozila` FOREIGN KEY (`vozilo2`) REFERENCES `ostalavozila` (`rb`),
  CONSTRAINT `FK_evidencijakvarova_vrsta` FOREIGN KEY (`vrsta`) REFERENCES `vrsta` (`rb`),
  CONSTRAINT `FK_evidencijakvarova_vrstakvara` FOREIGN KEY (`rbKvara`) REFERENCES `vrstakvara` (`rb`),
  CONSTRAINT `FK_evidencijakvarova_zanimanje` FOREIGN KEY (`zanimanje1`) REFERENCES `zanimanje` (`rb`),
  CONSTRAINT `FK_evidencijakvarova_zaposlenici` FOREIGN KEY (`sifraZaposlenika`) REFERENCES `zaposlenici` (`Sifra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table GPP.lice3
CREATE TABLE IF NOT EXISTS `lice3` (
  `rb` int(11) NOT NULL AUTO_INCREMENT,
  `registracija` varchar(50) NOT NULL DEFAULT '0',
  `model` varchar(100) NOT NULL DEFAULT '0',
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table GPP.ostalavozila
CREATE TABLE IF NOT EXISTS `ostalavozila` (
  `rb` int(11) NOT NULL AUTO_INCREMENT,
  `garazniBr` char(4) NOT NULL DEFAULT '0',
  `registracija` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table GPP.vrsta
CREATE TABLE IF NOT EXISTS `vrsta` (
  `rb` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) NOT NULL,
  PRIMARY KEY (`rb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table GPP.vrstakvara
CREATE TABLE IF NOT EXISTS `vrstakvara` (
  `rb` int(11) NOT NULL AUTO_INCREMENT,
  `zanimanje` int(11) NOT NULL DEFAULT '0',
  `nazivKvara` varchar(100) NOT NULL DEFAULT '0',
  `prikaz` enum('Y','N') NOT NULL DEFAULT 'Y',
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rb`),
  KEY `FK_vrstakvara_zanimanje` (`zanimanje`),
  CONSTRAINT `FK_vrstakvara_zanimanje` FOREIGN KEY (`zanimanje`) REFERENCES `zanimanje` (`rb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table GPP.zanimanje
CREATE TABLE IF NOT EXISTS `zanimanje` (
  `rb` int(11) NOT NULL AUTO_INCREMENT,
  `zanimanje` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table GPP.zaposlenici
CREATE TABLE IF NOT EXISTS `zaposlenici` (
  `Ime` varchar(50) NOT NULL,
  `Prezime` varchar(50) NOT NULL,
  `Sifra` int(11) NOT NULL AUTO_INCREMENT,
  `zanimanje` int(11) DEFAULT NULL,
  PRIMARY KEY (`Sifra`),
  KEY `FK_zaposlenici_zanimanje` (`zanimanje`),
  CONSTRAINT `FK_zaposlenici_zanimanje` FOREIGN KEY (`zanimanje`) REFERENCES `zanimanje` (`rb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
