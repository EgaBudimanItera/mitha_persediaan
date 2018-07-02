-- Adminer 4.3.1 MySQL dump

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
('B00001',	'K001',	'cup cup',	'makanan anak anak',	1188.888888888889,	180);

DROP TABLE IF EXISTS `barangkeluar`;
CREATE TABLE `barangkeluar` (
  `brklId` varchar(15) NOT NULL,
  `brklTanggal` date DEFAULT NULL,
  `brklPelanggan` varchar(50) DEFAULT NULL,
  `brklAlamat` text,
  PRIMARY KEY (`brklId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `barangkeluar` (`brklId`, `brklTanggal`, `brklPelanggan`, `brklAlamat`) VALUES
('BK0718-000001',	'2017-01-02',	'arif',	'way halim');

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
(1,	'BK0718-000001',	'B00001',	90,	1100);

DELIMITER ;;

CREATE TRIGGER `barangkeluar` AFTER INSERT ON `barangkeluardetail` FOR EACH ROW
BEGIN
	declare harga_awal DOUBLE;
	DECLARE stok_awal int;
	
	declare stok_keluar int;
	declare harga_keluar DOUBLE;
	declare harga_akhir DOUBLE;
	DECLARE stok_akhir int;
	DECLARE tglkeluar date;
	
	
	set harga_awal=(select brngHarga from barang where brngId=new.dbrkBrngId);
	set stok_awal =(select brngJumlah from barang where brngId=new.dbrkBrngId);
	set tglkeluar = (SELECT `brklTanggal` FROM `barangkeluar` WHERE `brklId`=new.dbrkBrklId);
	set stok_keluar=new.dbrkJumlah;
	set harga_keluar=new.dbrkHarga;
	set stok_akhir=stok_awal-stok_keluar;
	set harga_akhir=stok_akhir*harga_awal;
	
	insert into historistok values(
		'',tglkeluar,'Barang Keluar',new.dbrkBrklId,new.dbrkBrngId,0,0,0,stok_keluar,harga_awal,(stok_keluar*harga_awal),harga_keluar,(harga_keluar*stok_keluar),
		stok_akhir,harga_awal,(stok_akhir*harga_awal));
	update barang set brngJumlah=stok_akhir where brngId=new.dbrkBrngId;
	
    END;;

DELIMITER ;

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
('BM0718-000001',	'S001',	'2017-01-01'),
('BM0718-000002',	'S001',	'2017-01-03');

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
(1,	'BM0718-000001',	'B00001',	100,	1000),
(2,	'BM0718-000002',	'B00001',	190,	1200);

DELIMITER ;;

CREATE TRIGGER `barangmasuk` AFTER INSERT ON `barangmasukdetail` FOR EACH ROW
BEGIN
	declare harga_awal DOUBLE;
	declare harga_akhir DOUBLE;
	DECLARE harga_masuk DOUBLE;
	DECLARE stok_awal int;
	DECLARE stok_akhir int;
	declare stok_masuk int;
	declare tglmasuk date;
	
	set harga_awal=(select brngHarga from barang where brngId=new.dbmkBrngId);
	set stok_awal =(select brngJumlah from barang where brngId=new.dbmkBrngId);
	SET tglmasuk = (SELECT `brmkTanggal` FROM `barangmasuk` WHERE `brmkId`=new.dbmkBrmkId);
	set harga_masuk=new.dbmkHarga;
	set stok_masuk=new.dbmkJumlah;
	set stok_akhir=stok_awal+stok_masuk;
	set harga_akhir=((harga_awal*stok_awal)+(harga_masuk*stok_masuk))/stok_akhir;
	
	insert into historistok values(
		'',tglmasuk,'Barang Masuk',new.dbmkBrmkId,new.dbmkBrngId,stok_masuk,harga_masuk,(stok_masuk*harga_masuk),0,0,0,0,0,stok_akhir,harga_akhir,(stok_akhir*harga_akhir));
	update barang set brngHarga=harga_akhir where brngId=new.dbmkBrngId;
	
	update barang set brngJumlah=stok_akhir where brngId=new.dbmkBrngId;
	
    END;;

DELIMITER ;

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
  `histStokMasuk` int(11) DEFAULT NULL,
  `histHargaMasuk` double DEFAULT NULL,
  `histTotalMasuk` double DEFAULT NULL,
  `histStokKeluar` int(11) DEFAULT NULL,
  `histHargaKeluar` double DEFAULT NULL,
  `histTotalKeluar` double DEFAULT NULL,
  `histHargaJual` double DEFAULT NULL,
  `histTotalJual` double DEFAULT NULL,
  `histStokSaldo` int(11) DEFAULT NULL,
  `histHargaSaldo` double DEFAULT NULL,
  `histTotalSaldo` double DEFAULT NULL,
  PRIMARY KEY (`histId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `historistok` (`histId`, `histTanggal`, `histStatus`, `histTranId`, `histBrngId`, `histStokMasuk`, `histHargaMasuk`, `histTotalMasuk`, `histStokKeluar`, `histHargaKeluar`, `histTotalKeluar`, `histHargaJual`, `histTotalJual`, `histStokSaldo`, `histHargaSaldo`, `histTotalSaldo`) VALUES
(1,	'2017-01-01',	'Barang Masuk',	'BM0718-000001',	'B00001',	100,	1000,	100000,	0,	0,	0,	0,	0,	100,	1000,	100000),
(2,	'2017-01-02',	'Barang Keluar',	'BK0718-000001',	'B00001',	0,	0,	0,	90,	1000,	90000,	1100,	99000,	10,	1000,	10000),
(3,	'2017-01-03',	'Barang Masuk',	'BM0718-000002',	'B00001',	190,	1200,	228000,	0,	0,	0,	0,	0,	200,	1190,	238000),
(4,	'2017-01-04',	'Retur',	'RT0718-000001',	'B00001',	-20,	1200,	-24000,	0,	0,	0,	0,	0,	180,	1188.888888888889,	214000);

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `ktgrId` varchar(5) NOT NULL,
  `ktgrNama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ktgrId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kategori` (`ktgrId`, `ktgrNama`) VALUES
('K001',	'snack');

DROP TABLE IF EXISTS `retur`;
CREATE TABLE `retur` (
  `retuId` varchar(15) NOT NULL,
  `retuTanggal` date DEFAULT NULL,
  `retuBrmkId` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`retuId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `retur` (`retuId`, `retuTanggal`, `retuBrmkId`) VALUES
('RT0718-000001',	'2017-01-04',	'BM0718-000002');

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
(1,	'RT0718-000001',	'B00001',	20,	1200);

DELIMITER ;;

CREATE TRIGGER `retur` AFTER INSERT ON `returdetail` FOR EACH ROW
BEGIN
	declare harga_awal DOUBLE;
	DECLARE stok_awal int;
	
	declare stok_retur int;
	declare harga_retur DOUBLE;
	declare harga_akhir DOUBLE;
	DECLARE stok_akhir int;
	declare tglretur date;
	
	
	set harga_awal=(select brngHarga from barang where brngId=new.dretBrngId);
	set stok_awal =(select brngJumlah from barang where brngId=new.dretBrngId);
	SET tglretur = (SELECT `retuTanggal` FROM `retur` WHERE `retuId`=new.dretRetuId);
	set stok_retur=new.dretJumlah*-1;
	set harga_retur=new.dretHarga;
	set stok_akhir=stok_awal+stok_retur;
	set harga_akhir=((harga_awal*stok_awal)+(harga_retur*stok_retur))/stok_akhir;
	
	insert into historistok values(
		'',tglretur,'Retur',new.dretRetuId,new.dretBrngId,stok_retur,harga_retur,(stok_retur*harga_retur),0,0,0,0,0,stok_akhir,harga_akhir,(stok_akhir*harga_akhir));
	update barang set brngHarga=harga_akhir where brngId=new.dretBrngId;
	
	update barang set brngJumlah=stok_akhir where brngId=new.dretBrngId;
	
    END;;

DELIMITER ;

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
('S001',	'mitra persada',	'ridho',	'natar',	'08578655');

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

-- 2018-07-02 03:33:02
