-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `keluar`;
CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penerima` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`idkeluar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`) VALUES
(1,	2,	'2022-03-22 19:06:54',	'ere',	30),
(2,	4,	'2022-03-24 12:19:06',	'ko',	500),
(4,	8,	'2022-03-24 17:50:56',	'rw',	100),
(6,	9,	'2022-03-26 15:29:51',	'ade',	1000),
(7,	8,	'2022-03-26 17:32:35',	'ere',	1200),
(8,	10,	'2022-05-16 02:17:42',	'kki',	90),
(9,	10,	'2022-05-16 03:07:04',	'venar',	10),
(10,	10,	'2022-05-16 03:39:01',	'Terang Jaya',	800),
(11,	10,	'2022-05-16 03:50:15',	'Terang Jaya',	800);

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `roles` varchar(244) DEFAULT 'user',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `login` (`iduser`, `email`, `password`, `roles`) VALUES
(1,	'cobain@gmail.com',	'1234567',	'admin'),
(2,	'kaploks@gmail.com',	'1234567',	'user'),
(3,	'osea.dev@gmail.com',	'1234567',	'admin');

DROP TABLE IF EXISTS `masuk`;
CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`idmasuk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `qty`) VALUES
(1,	2,	'2022-03-22 17:47:08',	'Asep',	0),
(2,	2,	'2022-03-22 18:31:33',	'ade',	50),
(3,	4,	'2022-03-24 12:18:45',	'rw',	200),
(4,	5,	'2022-03-24 14:53:01',	'Asep',	300),
(5,	7,	'2022-03-24 15:04:28',	'Asep',	100),
(8,	8,	'2022-03-24 17:50:22',	'Asep',	100),
(9,	10,	'2022-05-16 02:17:26',	'koko',	900);

DROP TABLE IF EXISTS `pp`;
CREATE TABLE `pp` (
  `idpp` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` int(11) NOT NULL,
  `nopp` varchar(244) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text,
  `qty` bigint(20) DEFAULT NULL,
  `status` varchar(244) DEFAULT NULL,
  `penerima` varchar(244) DEFAULT NULL,
  PRIMARY KEY (`idpp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pp` (`idpp`, `idbarang`, `nopp`, `tanggal`, `keterangan`, `qty`, `status`, `penerima`) VALUES
(8,	10,	'',	'2022-05-17 14:18:43',	'',	200,	'PENDING',	''),
(9,	10,	'',	'2022-05-17 14:20:28',	'',	10,	'PENDING',	''),
(10,	10,	NULL,	'2022-05-17 14:22:25',	NULL,	1,	'PENDING',	'');

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL AUTO_INCREMENT,
  `namabarang` varchar(25) NOT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`idbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `stock` (`idbarang`, `namabarang`, `deskripsi`, `stock`, `image`) VALUES
(8,	'Heyna',	'Kaos Kaki',	0,	''),
(9,	'Putih',	'Kaos Kaki',	0,	''),
(10,	'Hitam',	'Kaos Kaki',	1200,	'');

-- 2022-05-17 14:23:45
