/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.1.16-MariaDB : Database - compare_it
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`compare_it` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `compare_it`;

/*Table structure for table `tb_barang` */

DROP TABLE IF EXISTS `tb_barang`;

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` text,
  `id_kategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `tb_barang` */

insert  into `tb_barang`(`id_barang`,`nama_barang`,`id_kategori`) values 
(1,'Xiaomi Mi Max',1),
(2,'Xiaomi Mi 6',1),
(18,'Samsung Galaxy S8 Plus - Garansi Resmi SEIN 1th',1);

/*Table structure for table `tb_det_barang` */

DROP TABLE IF EXISTS `tb_det_barang`;

CREATE TABLE `tb_det_barang` (
  `id_det_barang` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `id_web` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` text,
  `link_barang` text,
  PRIMARY KEY (`id_det_barang`),
  KEY `id_barang` (`id_barang`),
  KEY `id_web` (`id_web`),
  CONSTRAINT `tb_det_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_det_barang_ibfk_2` FOREIGN KEY (`id_web`) REFERENCES `tb_web` (`id_web`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tb_det_barang` */

insert  into `tb_det_barang`(`id_det_barang`,`id_barang`,`id_web`,`harga`,`gambar`,`link_barang`) values 
(1,2,1,7000000,NULL,'tokopedia'),
(22,18,6,11450000,'//s.blanja.com/picspace/87/101463/768.831_50d8d74b73ac4b5ea56b4e7aaa02f056.jpg_348x348.jpg','https://item.blanja.com/item/jual-beli-samsung-galaxy-s8-plus-garansi-resmi-sein-1th-15726427');

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` text,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id_kategori`,`kategori`) values 
(1,'Smartphone'),
(2,'Aksesoris');

/*Table structure for table `tb_link` */

DROP TABLE IF EXISTS `tb_link`;

CREATE TABLE `tb_link` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `link` text,
  `label` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_link` */

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(10) DEFAULT NULL,
  `password` text,
  `label` char(1) DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`label`) values 
(1,'Admin','76dd54222bc398453610a0bdf96564a7',NULL);

/*Table structure for table `tb_web` */

DROP TABLE IF EXISTS `tb_web`;

CREATE TABLE `tb_web` (
  `id_web` int(11) NOT NULL AUTO_INCREMENT,
  `nama_web` text,
  `link_toko` text,
  `label` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_web`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_web` */

insert  into `tb_web`(`id_web`,`nama_web`,`link_toko`,`label`) values 
(1,'www.tokopedia.com',NULL,NULL),
(6,'item.blanja.com',NULL,NULL);

/*Table structure for table `tmp` */

DROP TABLE IF EXISTS `tmp`;

CREATE TABLE `tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `th` text,
  `td` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tmp` */

insert  into `tmp`(`id`,`th`,`td`) values 
(1,'url','https://item.blanja.com/item/jual-beli-samsung-galaxy-s8-plus-garansi-resmi-sein-1th-15726427'),
(2,'nama','Samsung Galaxy S8 Plus - Garansi Resmi SEIN 1th'),
(3,'img','//s.blanja.com/picspace/87/101463/768.831_50d8d74b73ac4b5ea56b4e7aaa02f056.jpg_348x348.jpg'),
(4,'Rp','11450000');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
