
/*
SQLyog Enterprise - MySQL GUI v7.14 
MySQL - 5.6.25 : Database - mitha_persediaan
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`mitha_persediaan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mitha_persediaan`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `brngId` varchar(15) NOT NULL,
  `brngKtgrId` varchar(10) DEFAULT NULL,
  `brngNama` varchar(40) DEFAULT NULL,
  `brngKet` varchar(100) DEFAULT NULL,
  `brngHarga` double DEFAULT NULL,
  `brngJumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`brngId`),
  KEY `FK_barang` (`brngKtgrId`),
  CONSTRAINT `FK_barang` FOREIGN KEY (`brngKtgrId`) REFERENCES `kategori` (`ktgrId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`brngId`,`brngKtgrId`,`brngNama`,`brngKet`,`brngHarga`,`brngJumlah`) values ('B00001','K001','oz','asa',27630.737704918032,488);

/*Table structure for table `barangkeluar` */

DROP TABLE IF EXISTS `barangkeluar`;

CREATE TABLE `barangkeluar` (
  `brklId` varchar(15) NOT NULL,
  `brklTanggal` date DEFAULT NULL,
  `brklPelanggan` varchar(50) DEFAULT NULL,
  `brklAlamat` text,
  PRIMARY KEY (`brklId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barangkeluar` */

insert  into `barangkeluar`(`brklId`,`brklTanggal`,`brklPelanggan`,`brklAlamat`) values ('BK0718-000001','2018-07-16','a','a');

/*Table structure for table `barangkeluardetail` */

DROP TABLE IF EXISTS `barangkeluardetail`;

CREATE TABLE `barangkeluardetail` (
  `dbrkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbrkBrklId` varchar(15) DEFAULT NULL,
  `dbrkBrngId` varchar(10) DEFAULT NULL,
  `dbrkJumlah` int(11) DEFAULT NULL,
  `dbrkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbrkId`),
  KEY `FK_barangkeluardetail` (`dbrkBrngId`),
  KEY `FK_barangkeluardetail1` (`dbrkBrklId`),
  CONSTRAINT `FK_barangkeluardetail` FOREIGN KEY (`dbrkBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_barangkeluardetail1` FOREIGN KEY (`dbrkBrklId`) REFERENCES `barangkeluar` (`brklId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `barangkeluardetail` */

insert  into `barangkeluardetail`(`dbrkId`,`dbrkBrklId`,`dbrkBrngId`,`dbrkJumlah`,`dbrkHarga`) values (1,'BK0718-000001','B00001',2,1200);

/*Table structure for table `barangkeluardetail_temp` */

DROP TABLE IF EXISTS `barangkeluardetail_temp`;

CREATE TABLE `barangkeluardetail_temp` (
  `dbrkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbrkBrngId` varchar(10) DEFAULT NULL,
  `dbrkJumlah` int(11) DEFAULT NULL,
  `dbrkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbrkId`),
  KEY `FK_barangkeluardetail_temp` (`dbrkBrngId`),
  CONSTRAINT `FK_barangkeluardetail_temp` FOREIGN KEY (`dbrkBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barangkeluardetail_temp` */

/*Table structure for table `barangmasuk` */

DROP TABLE IF EXISTS `barangmasuk`;

CREATE TABLE `barangmasuk` (
  `brmkId` varchar(15) NOT NULL,
  `brmkSuplId` varchar(10) DEFAULT NULL,
  `brmkTanggal` date DEFAULT NULL,
  PRIMARY KEY (`brmkId`),
  KEY `FK_barangmasuk` (`brmkSuplId`),
  CONSTRAINT `FK_barangmasuk` FOREIGN KEY (`brmkSuplId`) REFERENCES `supplier` (`spliId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barangmasuk` */

insert  into `barangmasuk`(`brmkId`,`brmkSuplId`,`brmkTanggal`) values ('BM0718-000001','S001','0000-00-00'),('BM0718-000002','S001','0000-00-00'),('BM0718-000003','S001','2018-07-11');

/*Table structure for table `barangmasukdetail` */

DROP TABLE IF EXISTS `barangmasukdetail`;

CREATE TABLE `barangmasukdetail` (
  `dbmkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbmkBrmkId` varchar(15) DEFAULT NULL,
  `dbmkBrngId` varchar(10) DEFAULT NULL,
  `dbmkJumlah` int(11) DEFAULT NULL,
  `dbmkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbmkId`),
  KEY `FK_barangmasukdetail` (`dbmkBrmkId`),
  KEY `FK_barangmasukdetail1` (`dbmkBrngId`),
  CONSTRAINT `FK_barangmasukdetail` FOREIGN KEY (`dbmkBrmkId`) REFERENCES `barangmasuk` (`brmkId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_barangmasukdetail1` FOREIGN KEY (`dbmkBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `barangmasukdetail` */

insert  into `barangmasukdetail`(`dbmkId`,`dbmkBrmkId`,`dbmkBrngId`,`dbmkJumlah`,`dbmkHarga`) values (1,'BM0718-000001','B00001',200,27000),(2,'BM0718-000002','B00001',100,27500),(3,'BM0718-000003','B00001',200,27000);

/*Table structure for table `barangmasukdetail_temp` */

DROP TABLE IF EXISTS `barangmasukdetail_temp`;

CREATE TABLE `barangmasukdetail_temp` (
  `dbmkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbmkBrngId` varchar(10) DEFAULT NULL,
  `dbmkJumlah` int(11) DEFAULT NULL,
  `dbmkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbmkId`),
  KEY `FK_barangmasukdetail_temp` (`dbmkBrngId`),
  CONSTRAINT `FK_barangmasukdetail_temp` FOREIGN KEY (`dbmkBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barangmasukdetail_temp` */

/*Table structure for table `historistok` */

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
  PRIMARY KEY (`histId`),
  KEY `FK_historistok` (`histBrngId`),
  CONSTRAINT `FK_historistok` FOREIGN KEY (`histBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `historistok` */

insert  into `historistok`(`histId`,`histTanggal`,`histStatus`,`histTranId`,`histBrngId`,`histStokMasuk`,`histHargaMasuk`,`histTotalMasuk`,`histStokKeluar`,`histHargaKeluar`,`histTotalKeluar`,`histHargaJual`,`histTotalJual`,`histStokSaldo`,`histHargaSaldo`,`histTotalSaldo`) values (1,'2018-07-11','Barang Masuk','BM0718-000001','B00001',200,27000,5400000,0,0,0,0,0,200,27000,5400000),(2,'2018-07-13','Barang Masuk','BM0718-000002','B00001',100,27500,2750000,0,0,0,0,0,300,27166.666666666668,8150000),(3,'2018-07-11','Barang Masuk','BM0718-000003','B00001',200,27000,5400000,0,0,0,0,0,500,27100,13550000),(4,'2018-07-16','Barang Keluar','BK0718-000001','B00001',0,0,0,2,27100,54200,1200,2400,498,27100,13495800),(5,'2018-07-16','Retur','RT0718-000001','B00001',-10,1200,-12000,0,0,0,0,0,488,27630.737704918032,13483800);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `ktgrId` varchar(5) NOT NULL,
  `ktgrNama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ktgrId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`ktgrId`,`ktgrNama`) values ('K001','Jilbab');

/*Table structure for table `retur` */

DROP TABLE IF EXISTS `retur`;

CREATE TABLE `retur` (
  `retuId` varchar(15) NOT NULL,
  `retuTanggal` date DEFAULT NULL,
  `retuBrmkId` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`retuId`),
  KEY `FK_retur` (`retuBrmkId`),
  CONSTRAINT `FK_retur` FOREIGN KEY (`retuBrmkId`) REFERENCES `barangmasuk` (`brmkId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `retur` */

insert  into `retur`(`retuId`,`retuTanggal`,`retuBrmkId`) values ('RT0718-000001','2018-07-16','BM0718-000003');

/*Table structure for table `returdetail` */

DROP TABLE IF EXISTS `returdetail`;

CREATE TABLE `returdetail` (
  `dretId` int(11) NOT NULL AUTO_INCREMENT,
  `dretRetuId` varchar(15) DEFAULT NULL,
  `dretBrngId` varchar(10) DEFAULT NULL,
  `dretJumlah` int(11) DEFAULT NULL,
  `dretHarga` double DEFAULT NULL,
  PRIMARY KEY (`dretId`),
  KEY `FK_returdetail` (`dretBrngId`),
  KEY `FK_returdetail1` (`dretRetuId`),
  CONSTRAINT `FK_returdetail` FOREIGN KEY (`dretBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_returdetail1` FOREIGN KEY (`dretRetuId`) REFERENCES `retur` (`retuId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `returdetail` */

insert  into `returdetail`(`dretId`,`dretRetuId`,`dretBrngId`,`dretJumlah`,`dretHarga`) values (1,'RT0718-000001','B00001',10,1200);

/*Table structure for table `returdetail_temp` */

DROP TABLE IF EXISTS `returdetail_temp`;

CREATE TABLE `returdetail_temp` (
  `dretId` int(11) NOT NULL AUTO_INCREMENT,
  `dretBrngId` varchar(10) DEFAULT NULL,
  `dretJumlah` int(11) DEFAULT NULL,
  `dretHarga` double DEFAULT NULL,
  PRIMARY KEY (`dretId`),
  KEY `FK_returdetail_temp` (`dretBrngId`),
  CONSTRAINT `FK_returdetail_temp` FOREIGN KEY (`dretBrngId`) REFERENCES `barang` (`brngId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `returdetail_temp` */

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `spliId` varchar(10) NOT NULL,
  `spliNama` varchar(50) DEFAULT NULL,
  `spliOwner` varchar(50) DEFAULT NULL,
  `spliAlamat` text,
  `spliTelp` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`spliId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`spliId`,`spliNama`,`spliOwner`,`spliAlamat`,`spliTelp`) values ('S001','ega','ega','aa','000');

/*Table structure for table `userlogin` */

DROP TABLE IF EXISTS `userlogin`;

CREATE TABLE `userlogin` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userNama` varchar(30) DEFAULT NULL,
  `userPassword` varchar(150) DEFAULT NULL,
  `userHakakses` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `userlogin` */

insert  into `userlogin`(`userId`,`userNama`,`userPassword`,`userHakakses`) values (1,'pimpinan','$2y$10$sTF2zNFgABHvXXs6zqYrveXJ1llwJiiE0VHm8fbpMQKIPRMtn27rC','pimpinan'),(2,'admingudang','$2y$10$Gh..4ZJPu3h1uVv7BhT2HeHdpufcEL0./Z2qx8Ka9NGvKUt215S3C','admin gudang');

/* Trigger structure for table `barangkeluardetail` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `barangkeluar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `barangkeluar` AFTER INSERT ON `barangkeluardetail` FOR EACH ROW BEGIN
	declare harga_awal DOUBLE;
	DECLARE stok_awal int;
	
	declare stok_keluar int;
	declare harga_keluar DOUBLE;
	declare harga_akhir DOUBLE;
	DECLARE stok_akhir int;
	declare tglkeluar date;
	
	set harga_awal=(select brngHarga from barang where brngId=new.dbrkBrngId);
	set stok_awal =(select brngJumlah from barang where brngId=new.dbrkBrngId);
	set tglkeluar=(select brklTanggal from barangkeluar where brklId=new.dbrkBrklId);
	set stok_keluar=new.dbrkJumlah;
	set harga_keluar=new.dbrkHarga;
	set stok_akhir=stok_awal-stok_keluar;
	set harga_akhir=stok_akhir*harga_awal;
	
	insert into historistok() values(
		'',tglkeluar,'Barang Keluar',new.dbrkBrklId,new.dbrkBrngId,0,0,0,stok_keluar,harga_awal,(stok_keluar*harga_awal),harga_keluar,(harga_keluar*stok_keluar),
		stok_akhir,harga_awal,(stok_akhir*harga_awal));
	update barang set brngJumlah=stok_akhir where brngId=new.dbrkBrngId;
    END */$$


DELIMITER ;

/* Trigger structure for table `barangmasukdetail` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `barangmasuk` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `barangmasuk` AFTER INSERT ON `barangmasukdetail` FOR EACH ROW BEGIN
	declare harga_awal DOUBLE;
	declare harga_akhir DOUBLE;
	DECLARE harga_masuk DOUBLE;
	DECLARE stok_awal int;
	DECLARE stok_akhir int;
	declare stok_masuk int;
	declare tglmasuk date;
	set harga_awal=(select brngHarga from barang where brngId=new.dbmkBrngId);
	set stok_awal =(select brngJumlah from barang where brngId=new.dbmkBrngId);
	set tglmasuk=(select brmkTanggal from barangmasuk where brmkId=new.dbmkBrmkId);
	set harga_masuk=new.dbmkHarga;
	set stok_masuk=new.dbmkJumlah;
	set stok_akhir=stok_awal+stok_masuk;
	set harga_akhir=((harga_awal*stok_awal)+(harga_masuk*stok_masuk))/stok_akhir;
	
	insert into historistok() values(
		'',tglmasuk,'Barang Masuk',new.dbmkBrmkId,new.dbmkBrngId,stok_masuk,harga_masuk,(stok_masuk*harga_masuk),0,0,0,0,0,stok_akhir,harga_akhir,(stok_akhir*harga_akhir));
	update barang set brngHarga=harga_akhir , brngJumlah=stok_akhir where brngId=new.dbmkBrngId;
    END */$$


DELIMITER ;

/* Trigger structure for table `returdetail` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `retur` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `retur` AFTER INSERT ON `returdetail` FOR EACH ROW BEGIN
	declare harga_awal DOUBLE;
	DECLARE stok_awal int;
	
	declare stok_retur int;
	declare harga_retur DOUBLE;
	declare harga_akhir DOUBLE;
	DECLARE stok_akhir int;
	declare tglretur date;
	
	set harga_awal=(select brngHarga from barang where brngId=new.dretBrngId);
	set stok_awal =(select brngJumlah from barang where brngId=new.dretBrngId);
	set tglretur=(select retuTanggal from retur where retuId=new.dretRetuId );
	set stok_retur=new.dretJumlah*-1;
	set harga_retur=new.dretHarga;
	set stok_akhir=stok_awal+stok_retur;
	set harga_akhir=((harga_awal*stok_awal)+(harga_retur*stok_retur))/stok_akhir;
	
	insert into historistok() values(
		'',tglretur,'Retur',new.dretRetuId,new.dretBrngId,stok_retur,harga_retur,(stok_retur*harga_retur),0,0,0,0,0,stok_akhir,harga_akhir,(stok_akhir*harga_akhir));
	update barang set brngHarga=harga_akhir where brngId=new.dretBrngId;
	
	update barang set brngJumlah=stok_akhir where brngId=new.dretBrngId;
    END */$$


DELIMITER ;

/*Table structure for table `vw_barangmasuk` */

DROP TABLE IF EXISTS `vw_barangmasuk`;

/*!50001 DROP VIEW IF EXISTS `vw_barangmasuk` */;
/*!50001 DROP TABLE IF EXISTS `vw_barangmasuk` */;

/*!50001 CREATE TABLE `vw_barangmasuk` (
  `dbmkId` int(11) NOT NULL DEFAULT '0',
  `dbmkBrmkId` varchar(15) DEFAULT NULL,
  `brmkSuplId` varchar(10) DEFAULT NULL,
  `brmkTanggal` date DEFAULT NULL,
  `dbmkBrngId` varchar(10) DEFAULT NULL,
  `dbmkJumlah` int(11) DEFAULT NULL,
  `dbmkHarga` double DEFAULT NULL,
  `spliNama` varchar(50) DEFAULT NULL,
  `spliOwner` varchar(50) DEFAULT NULL,
  `spliAlamat` text,
  `spliTelp` varchar(12) DEFAULT NULL,
  `brngKtgrId` varchar(10) DEFAULT NULL,
  `brngNama` varchar(40) DEFAULT NULL,
  `brngKet` varchar(100) DEFAULT NULL,
  `brngHarga` double DEFAULT NULL,
  `brngJumlah` int(11) DEFAULT NULL,
  `ktgrNama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view vw_barangmasuk */

/*!50001 DROP TABLE IF EXISTS `vw_barangmasuk` */;
/*!50001 DROP VIEW IF EXISTS `vw_barangmasuk` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_barangmasuk` AS select `barangmasukdetail`.`dbmkId` AS `dbmkId`,`barangmasukdetail`.`dbmkBrmkId` AS `dbmkBrmkId`,`barangmasuk`.`brmkSuplId` AS `brmkSuplId`,`barangmasuk`.`brmkTanggal` AS `brmkTanggal`,`barangmasukdetail`.`dbmkBrngId` AS `dbmkBrngId`,`barangmasukdetail`.`dbmkJumlah` AS `dbmkJumlah`,`barangmasukdetail`.`dbmkHarga` AS `dbmkHarga`,`supplier`.`spliNama` AS `spliNama`,`supplier`.`spliOwner` AS `spliOwner`,`supplier`.`spliAlamat` AS `spliAlamat`,`supplier`.`spliTelp` AS `spliTelp`,`barang`.`brngKtgrId` AS `brngKtgrId`,`barang`.`brngNama` AS `brngNama`,`barang`.`brngKet` AS `brngKet`,`barang`.`brngHarga` AS `brngHarga`,`barang`.`brngJumlah` AS `brngJumlah`,`kategori`.`ktgrNama` AS `ktgrNama` from ((((`barangmasukdetail` join `barangmasuk` on((`barangmasukdetail`.`dbmkBrmkId` = `barangmasuk`.`brmkId`))) join `barang` on((`barangmasukdetail`.`dbmkBrngId` = `barang`.`brngId`))) join `supplier` on((`barangmasuk`.`brmkSuplId` = `supplier`.`spliId`))) join `kategori` on((`barang`.`brngKtgrId` = `kategori`.`ktgrId`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

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
('B00001',	'K001',	'cup cup',	'makanan anak anak',	1002.7914614121511,	12180);

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
('BM0718-000002',	'S001',	'2017-01-03'),
('BM0718-000003',	'S001',	'2018-07-04'),
('BM0718-000004',	'S001',	'0000-00-00');

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
(2,	'BM0718-000002',	'B00001',	190,	1200),
(3,	'BM0718-000003',	'B00001',	0,	0),
(4,	'BM0718-000004',	'B00001',	12000,	1000);

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
(4,	'2017-01-04',	'Retur',	'RT0718-000001',	'B00001',	-20,	1200,	-24000,	0,	0,	0,	0,	0,	180,	1188.888888888889,	214000),
(5,	'2018-07-04',	'Barang Masuk',	'BM0718-000003',	'B00001',	0,	0,	0,	0,	0,	0,	0,	0,	180,	1188.888888888889,	214000),
(6,	'0000-00-00',	'Barang Masuk',	'BM0718-000004',	'B00001',	12000,	1000,	12000000,	0,	0,	0,	0,	0,	12180,	1002.7914614121511,	12214000);

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

-- 2018-07-23 03:12:08

