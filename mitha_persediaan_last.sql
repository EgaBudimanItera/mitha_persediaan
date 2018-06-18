-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `brngId` varchar(15) NOT NULL,
  `brngKtgrId` varchar(10) DEFAULT NULL,
  `brngNama` varchar(40) DEFAULT NULL,
  `brngKet` varchar(100) DEFAULT NULL,
  `brngHarga` double DEFAULT NULL,
  `brngJumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`brngId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `barang` (`brngId`, `brngKtgrId`, `brngNama`, `brngKet`, `brngHarga`, `brngJumlah`) VALUES
('B00001',	'K001',	'sampo',	'buat mandi',	78543992361459,	125470),
('B00002',	'K002',	'sabun',	'buat mandi',	10568286323440,	34390),
('B00003',	'K003',	'odol',	'buat mandi',	553162589.9654,	122825);

DROP TABLE IF EXISTS `barangkeluar`;
CREATE TABLE `barangkeluar` (
  `brklId` varchar(15) NOT NULL,
  `brklTanggal` date DEFAULT NULL,
  `brklPelanggan` varchar(50) DEFAULT NULL,
  `brklAlamat` text,
  PRIMARY KEY (`brklId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `barangkeluar` (`brklId`, `brklTanggal`, `brklPelanggan`, `brklAlamat`) VALUES
('BK0618-000001',	'2017-01-03',	'okta',	'antasari');

DROP TABLE IF EXISTS `barangkeluardetail`;
CREATE TABLE `barangkeluardetail` (
  `dbrkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbrkBrklId` varchar(15) DEFAULT NULL,
  `dbrkBrngId` varchar(10) DEFAULT NULL,
  `dbrkJumlah` int(11) DEFAULT NULL,
  `dbrkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbrkId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `barangkeluardetail` (`dbrkId`, `dbrkBrklId`, `dbrkBrngId`, `dbrkJumlah`, `dbrkHarga`) VALUES
(4,	'BK0618-000001',	'B00001',	200,	4000),
(5,	'BK0618-000001',	'B00002',	150,	4000);

DROP TABLE IF EXISTS `barangkeluardetail_temp`;
CREATE TABLE `barangkeluardetail_temp` (
  `dbrkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbrkBrngId` varchar(10) DEFAULT NULL,
  `dbrkJumlah` int(11) DEFAULT NULL,
  `dbrkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbrkId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `barangmasuk`;
CREATE TABLE `barangmasuk` (
  `brmkId` varchar(15) NOT NULL,
  `brmkSuplId` varchar(10) DEFAULT NULL,
  `brmkTanggal` date DEFAULT NULL,
  PRIMARY KEY (`brmkId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `barangmasuk` (`brmkId`, `brmkSuplId`, `brmkTanggal`) VALUES
('BM0618-000001',	'S002',	'2017-01-03');

DROP TABLE IF EXISTS `barangmasukdetail`;
CREATE TABLE `barangmasukdetail` (
  `dbmkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbmkBrmkId` varchar(15) DEFAULT NULL,
  `dbmkBrngId` varchar(10) DEFAULT NULL,
  `dbmkJumlah` int(11) DEFAULT NULL,
  `dbmkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbmkId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `barangmasukdetail` (`dbmkId`, `dbmkBrmkId`, `dbmkBrngId`, `dbmkJumlah`, `dbmkHarga`) VALUES
(1,	NULL,	'B001',	10,	120),
(6,	'BM0618-000002',	'B00002',	8,	60000),
(7,	'BM0618-000002',	'B00001',	10,	60000),
(16,	'BM0618-000001',	'B00002',	250,	4000),
(17,	'BM0618-000001',	'B00001',	300,	3500);

DROP TABLE IF EXISTS `barangmasukdetail_temp`;
CREATE TABLE `barangmasukdetail_temp` (
  `dbmkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbmkBrngId` varchar(10) DEFAULT NULL,
  `dbmkJumlah` int(11) DEFAULT NULL,
  `dbmkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbmkId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `historistok`;
CREATE TABLE `historistok` (
  `histId` int(11) NOT NULL AUTO_INCREMENT,
  `histTanggal` date DEFAULT NULL,
  `histStatus` varchar(15) DEFAULT NULL,
  `histTranId` varchar(15) DEFAULT NULL,
  `histBrngId` varchar(10) DEFAULT NULL,
  `histStokMasuk` int(11) DEFAULT '0',
  `histHargaMasuk` double DEFAULT '0',
  `histTotalMasuk` double DEFAULT '0',
  `histStokKeluar` int(11) DEFAULT '0',
  `histHargaKeluar` double DEFAULT '0',
  `histTotalKeluar` double DEFAULT '0',
  `histHargaJual` double DEFAULT '0',
  `histTotalJual` double DEFAULT '0',
  `histStokSaldo` int(11) DEFAULT '0',
  `histHargaSaldo` double DEFAULT '0',
  `histTotalSaldo` double DEFAULT '0',
  PRIMARY KEY (`histId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `historistok` (`histId`, `histTanggal`, `histStatus`, `histTranId`, `histBrngId`, `histStokMasuk`, `histHargaMasuk`, `histTotalMasuk`, `histStokKeluar`, `histHargaKeluar`, `histTotalKeluar`, `histHargaJual`, `histTotalJual`, `histStokSaldo`, `histHargaSaldo`, `histTotalSaldo`) VALUES
(1,	'2018-06-12',	'Barang Masuk',	'BM0618-000001',	'B00001',	700,	4000,	2800000,	NULL,	NULL,	NULL,	NULL,	NULL,	125700,	4994.431185362,	627800000),
(2,	'2018-06-12',	'Barang Masuk',	'BM0618-000001',	'B00002',	550,	3500,	1925000,	NULL,	NULL,	NULL,	NULL,	NULL,	34550,	8912.4457308249,	307925000),
(3,	'2018-06-12',	'Barang Keluar',	'BK0618-000001',	'B00001',	NULL,	NULL,	NULL,	200,	4994.431185362,	998886.2370724,	3000,	600000,	125500,	4994.431185362,	626801113.76293),
(4,	'2018-06-12',	'Barang Keluar',	'BK0618-000001',	'B00002',	NULL,	NULL,	NULL,	100,	8912.4457308249,	891244.57308249,	3500,	350000,	34450,	8912.4457308249,	307033755.42692),
(5,	'2018-06-12',	'Barang Keluar',	'BK0618-000001',	'B00003',	NULL,	NULL,	NULL,	125,	4500,	562500,	4000,	500000,	122875,	4500,	552937500),
(6,	'2018-06-12',	'Retur',	'RT0618-000001',	'B00001',	NULL,	NULL,	-31500,	NULL,	NULL,	NULL,	NULL,	NULL,	125491,	626846066.61631,	78663539745748),
(7,	'2018-06-12',	'Retur',	'RT0618-000001',	'B00002',	NULL,	NULL,	-25000,	NULL,	NULL,	NULL,	NULL,	NULL,	34440,	307122905.03651,	10577312849457),
(8,	'2018-06-12',	'Retur',	'RT0618-000001',	'B00001',	-87,	3000,	-261000,	NULL,	NULL,	NULL,	NULL,	NULL,	125404,	627280943.8674,	78663539484747),
(9,	'2018-06-12',	'Retur',	'RT0618-000002',	'B00001',	-25,	3000,	-75000,	NULL,	NULL,	NULL,	NULL,	NULL,	125379,	627406020.22466,	78663539409747),
(10,	'2018-06-12',	'Retur',	'RT0618-000002',	'B00002',	-30,	3500,	-105000,	NULL,	NULL,	NULL,	NULL,	NULL,	34410,	307390663.89007,	10577312744457),
(11,	'2018-06-12',	'Retur',	'RT0618-000002',	'B00003',	-50,	4000,	-200000,	NULL,	NULL,	NULL,	NULL,	NULL,	122825,	553162589.9654,	67942195112500),
(12,	'2018-06-16',	'Barang Masuk',	'BM0618-000001',	'B00002',	250,	4000,	1000000,	NULL,	NULL,	NULL,	NULL,	NULL,	34660,	305173506.76449,	10577313744457),
(13,	'2018-06-16',	'Barang Masuk',	'BM0618-000001',	'B00001',	300,	3500,	1050000,	NULL,	NULL,	NULL,	NULL,	NULL,	125679,	625908389.30726,	78663540459748),
(14,	'2018-06-16',	'Barang Keluar',	'BK0618-000001',	'B00001',	NULL,	NULL,	NULL,	200,	625908389.30726,	125181677861.45,	4000,	800000,	125479,	625908389.30726,	78538358781886),
(15,	'2018-06-16',	'Barang Keluar',	'BK0618-000001',	'B00002',	NULL,	NULL,	NULL,	150,	305173506.76449,	45776026014.674,	4000,	600000,	34510,	305173506.76449,	10531537718443),
(16,	'2018-06-16',	'Retur',	'RT0618-000003',	'B00001',	-9,	2000,	-18000,	NULL,	NULL,	NULL,	NULL,	NULL,	125470,	78543992361459,	9.8549147215923e18),
(17,	'2018-06-16',	'Retur',	'RT0618-000003',	'B00002',	-120,	3000,	-360000,	NULL,	NULL,	NULL,	NULL,	NULL,	34390,	10568286323440,	3.6344336666311e17);

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `ktgrId` varchar(5) NOT NULL,
  `ktgrNama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ktgrId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kategori` (`ktgrId`, `ktgrNama`) VALUES
('K001',	'kategori 1'),
('K002',	'kategori 2'),
('K003',	'kategori 3');

DROP TABLE IF EXISTS `retur`;
CREATE TABLE `retur` (
  `retuId` varchar(15) NOT NULL,
  `retuTanggal` date DEFAULT NULL,
  `retuBrmkId` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`retuId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `retur` (`retuId`, `retuTanggal`, `retuBrmkId`) VALUES
('RT0618-000001',	'2017-01-04',	'BM0618-000001'),
('RT0618-000002',	'2017-01-04',	'BM0618-000001'),
('RT0618-000003',	'2017-01-05',	'BM0618-000001');

DROP TABLE IF EXISTS `returdetail`;
CREATE TABLE `returdetail` (
  `dretId` int(11) NOT NULL AUTO_INCREMENT,
  `dretRetuId` varchar(15) DEFAULT NULL,
  `dretBrngId` varchar(10) DEFAULT NULL,
  `dretJumlah` int(11) DEFAULT NULL,
  `dretHarga` double DEFAULT NULL,
  PRIMARY KEY (`dretId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `returdetail` (`dretId`, `dretRetuId`, `dretBrngId`, `dretJumlah`, `dretHarga`) VALUES
(3,	'RT0618-000001',	'B00001',	87,	3000),
(4,	'RT0618-000002',	'B00001',	25,	3000),
(5,	'RT0618-000002',	'B00002',	30,	3500),
(6,	'RT0618-000002',	'B00003',	50,	4000),
(7,	'RT0618-000003',	'B00001',	9,	2000),
(8,	'RT0618-000003',	'B00002',	120,	3000);

DROP TABLE IF EXISTS `returdetail_temp`;
CREATE TABLE `returdetail_temp` (
  `dretId` int(11) NOT NULL AUTO_INCREMENT,
  `dretBrngId` varchar(10) DEFAULT NULL,
  `dretJumlah` int(11) DEFAULT NULL,
  `dretHarga` double DEFAULT NULL,
  PRIMARY KEY (`dretId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `spliId` varchar(10) NOT NULL,
  `spliNama` varchar(50) DEFAULT NULL,
  `spliOwner` varchar(50) DEFAULT NULL,
  `spliAlamat` text,
  `spliTelp` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`spliId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `supplier` (`spliId`, `spliNama`, `spliOwner`, `spliAlamat`, `spliTelp`) VALUES
('S001',	'mitra persada',	'okta',	'antasari\r\n',	'0987654'),
('S002',	'solusi indo',	'ega',	'way halim\r\n',	'535261');

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE `userlogin` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userNama` varchar(30) DEFAULT NULL,
  `userPassword` varchar(150) DEFAULT NULL,
  `userHakakses` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `userlogin` (`userId`, `userNama`, `userPassword`, `userHakakses`) VALUES
(1,	'pimpinan',	'$2y$10$sTF2zNFgABHvXXs6zqYrveXJ1llwJiiE0VHm8fbpMQKIPRMtn27rC',	'pimpinan'),
(2,	'admingudang',	'$2y$10$Gh..4ZJPu3h1uVv7BhT2HeHdpufcEL0./Z2qx8Ka9NGvKUt215S3C',	'admin gudang');

DROP VIEW IF EXISTS `vw_barangmasuk`;
CREATE TABLE `vw_barangmasuk` (`dbmkId` int(11), `dbmkBrmkId` varchar(15), `brmkSuplId` varchar(10), `brmkTanggal` date, `dbmkBrngId` varchar(10), `dbmkJumlah` int(11), `dbmkHarga` double, `spliNama` varchar(50), `spliOwner` varchar(50), `spliAlamat` text, `spliTelp` varchar(12), `brngKtgrId` varchar(10), `brngNama` varchar(40), `brngKet` varchar(100), `brngHarga` double, `brngJumlah` int(11), `ktgrNama` varchar(30));


DROP TABLE IF EXISTS `vw_barangmasuk`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_barangmasuk` AS select `barangmasukdetail`.`dbmkId` AS `dbmkId`,`barangmasukdetail`.`dbmkBrmkId` AS `dbmkBrmkId`,`barangmasuk`.`brmkSuplId` AS `brmkSuplId`,`barangmasuk`.`brmkTanggal` AS `brmkTanggal`,`barangmasukdetail`.`dbmkBrngId` AS `dbmkBrngId`,`barangmasukdetail`.`dbmkJumlah` AS `dbmkJumlah`,`barangmasukdetail`.`dbmkHarga` AS `dbmkHarga`,`supplier`.`spliNama` AS `spliNama`,`supplier`.`spliOwner` AS `spliOwner`,`supplier`.`spliAlamat` AS `spliAlamat`,`supplier`.`spliTelp` AS `spliTelp`,`barang`.`brngKtgrId` AS `brngKtgrId`,`barang`.`brngNama` AS `brngNama`,`barang`.`brngKet` AS `brngKet`,`barang`.`brngHarga` AS `brngHarga`,`barang`.`brngJumlah` AS `brngJumlah`,`kategori`.`ktgrNama` AS `ktgrNama` from ((((`barangmasukdetail` join `barangmasuk` on((`barangmasukdetail`.`dbmkBrmkId` = `barangmasuk`.`brmkId`))) join `barang` on((`barangmasukdetail`.`dbmkBrngId` = `barang`.`brngId`))) join `supplier` on((`barangmasuk`.`brmkSuplId` = `supplier`.`spliId`))) join `kategori` on((`barang`.`brngKtgrId` = `kategori`.`ktgrId`)));

-- 2018-06-18 14:20:45
