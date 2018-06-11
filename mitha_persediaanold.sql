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
  PRIMARY KEY (`brngId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`brngId`,`brngKtgrId`,`brngNama`,`brngKet`,`brngHarga`,`brngJumlah`) values ('B001','K001','E','a',105,10),('B002','K001','G','a',100,90);

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

/*Table structure for table `barangkeluardetail` */

DROP TABLE IF EXISTS `barangkeluardetail`;

CREATE TABLE `barangkeluardetail` (
  `dbrkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbrkBrklId` varchar(15) DEFAULT NULL,
  `dbrkBrngId` varchar(10) DEFAULT NULL,
  `dbrkJumlah` int(11) DEFAULT NULL,
  `dbrkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbrkId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `barangkeluardetail` */

insert  into `barangkeluardetail`(`dbrkId`,`dbrkBrklId`,`dbrkBrngId`,`dbrkJumlah`,`dbrkHarga`) values (4,NULL,'B001',5,140);

/*Table structure for table `barangkeluardetail_temp` */

DROP TABLE IF EXISTS `barangkeluardetail_temp`;

CREATE TABLE `barangkeluardetail_temp` (
  `dbrkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbrkBrngId` varchar(10) DEFAULT NULL,
  `dbrkJumlah` int(11) DEFAULT NULL,
  `dbrkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbrkId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barangkeluardetail_temp` */

/*Table structure for table `barangmasuk` */

DROP TABLE IF EXISTS `barangmasuk`;

CREATE TABLE `barangmasuk` (
  `brmkId` varchar(15) NOT NULL,
  `brmkSuplId` varchar(10) DEFAULT NULL,
  `brmkTanggal` date DEFAULT NULL,
  PRIMARY KEY (`brmkId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barangmasuk` */

/*Table structure for table `barangmasukdetail` */

DROP TABLE IF EXISTS `barangmasukdetail`;

CREATE TABLE `barangmasukdetail` (
  `dbmkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbmkBrmkId` varchar(15) DEFAULT NULL,
  `dbmkBrngId` varchar(10) DEFAULT NULL,
  `dbmkJumlah` int(11) DEFAULT NULL,
  `dbmkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbmkId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `barangmasukdetail` */

insert  into `barangmasukdetail`(`dbmkId`,`dbmkBrmkId`,`dbmkBrngId`,`dbmkJumlah`,`dbmkHarga`) values (1,NULL,'B001',10,120);

/*Table structure for table `barangmasukdetail_temp` */

DROP TABLE IF EXISTS `barangmasukdetail_temp`;

CREATE TABLE `barangmasukdetail_temp` (
  `dbmkId` int(11) NOT NULL AUTO_INCREMENT,
  `dbmkBrngId` varchar(10) DEFAULT NULL,
  `dbmkJumlah` int(11) DEFAULT NULL,
  `dbmkHarga` double DEFAULT NULL,
  PRIMARY KEY (`dbmkId`)
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `historistok` */

insert  into `historistok`(`histId`,`histTanggal`,`histStatus`,`histTranId`,`histBrngId`,`histStokMasuk`,`histHargaMasuk`,`histTotalMasuk`,`histStokKeluar`,`histHargaKeluar`,`histTotalKeluar`,`histHargaJual`,`histTotalJual`,`histStokSaldo`,`histHargaSaldo`,`histTotalSaldo`) values (1,'2018-06-07','Barang Masuk',NULL,'B001',10,120,1200,0,0,0,0,0,20,110,2200),(2,'2018-06-07','Barang Keluar',NULL,'B001',0,0,0,5,110,550,140,700,15,110,1650),(3,'2018-06-07','Retur',NULL,'B001',-5,120,-600,0,0,0,0,0,10,105,1050);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `ktgrId` varchar(5) NOT NULL,
  `ktgrNama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ktgrId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`ktgrId`,`ktgrNama`) values ('K001','a');

/*Table structure for table `retur` */

DROP TABLE IF EXISTS `retur`;

CREATE TABLE `retur` (
  `retuId` varchar(15) NOT NULL,
  `retuTanggal` date DEFAULT NULL,
  `retuBrmkId` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`retuId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `retur` */

/*Table structure for table `returdetail` */

DROP TABLE IF EXISTS `returdetail`;

CREATE TABLE `returdetail` (
  `dretId` int(11) NOT NULL AUTO_INCREMENT,
  `dretRetuId` varchar(15) DEFAULT NULL,
  `dretBrngId` varchar(10) DEFAULT NULL,
  `dretJumlah` int(11) DEFAULT NULL,
  `dretHarga` double DEFAULT NULL,
  PRIMARY KEY (`dretId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `returdetail` */

insert  into `returdetail`(`dretId`,`dretRetuId`,`dretBrngId`,`dretJumlah`,`dretHarga`) values (1,NULL,'B001',5,120);

/*Table structure for table `returdetail_temp` */

DROP TABLE IF EXISTS `returdetail_temp`;

CREATE TABLE `returdetail_temp` (
  `dretId` int(11) NOT NULL AUTO_INCREMENT,
  `dretBrngId` varchar(10) DEFAULT NULL,
  `dretJumlah` int(11) DEFAULT NULL,
  `dretHarga` double DEFAULT NULL,
  PRIMARY KEY (`dretId`)
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
	
	
	set harga_awal=(select brngHarga from barang where brngId=new.dbrkBrngId);
	set stok_awal =(select brngJumlah from barang where brngId=new.dbrkBrngId);
	set stok_keluar=new.dbrkJumlah;
	set harga_keluar=new.dbrkHarga;
	set stok_akhir=stok_awal-stok_keluar;
	set harga_akhir=stok_akhir*harga_awal;
	
	insert into historistok() values(
		default,now(),'Barang Keluar',new.dbrkBrklId,new.dbrkBrngId,0,0,0,stok_keluar,harga_awal,(stok_keluar*harga_awal),harga_keluar,(harga_keluar*stok_keluar),
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
	
	set harga_awal=(select brngHarga from barang where brngId=new.dbmkBrngId);
	set stok_awal =(select brngJumlah from barang where brngId=new.dbmkBrngId);
	set harga_masuk=new.dbmkHarga;
	set stok_masuk=new.dbmkJumlah;
	set stok_akhir=stok_awal+stok_masuk;
	set harga_akhir=((harga_awal*stok_awal)+(harga_masuk*stok_masuk))/stok_akhir;
	
	insert into historistok() values(
		default,now(),'Barang Masuk',new.dbmkBrmkId,new.dbmkBrngId,stok_masuk,harga_masuk,(stok_masuk*harga_masuk),0,0,0,0,0,stok_akhir,harga_akhir,(stok_akhir*harga_akhir));
	update barang set brngHarga=harga_akhir where brngId=new.dbmkBrngId;
	
	update barang set brngJumlah=stok_akhir where brngId=new.dbmkBrngId;
	
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
	
	
	set harga_awal=(select brngHarga from barang where brngId=new.dretBrngId);
	set stok_awal =(select brngJumlah from barang where brngId=new.dretBrngId);
	set stok_retur=new.dretJumlah*-1;
	set harga_retur=new.dretHarga;
	set stok_akhir=stok_awal+stok_retur;
	set harga_akhir=((harga_awal*stok_awal)+(harga_retur*stok_retur))/stok_akhir;
	
	insert into historistok() values(
		default,now(),'Retur',new.dretRetuId,new.dretBrngId,stok_retur,harga_retur,(stok_retur*harga_retur),0,0,0,0,0,stok_akhir,harga_akhir,(stok_akhir*harga_akhir));
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
