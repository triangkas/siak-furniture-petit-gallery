/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.24 : Database - siak_furniture
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `akuns` */

DROP TABLE IF EXISTS `akuns`;

CREATE TABLE `akuns` (
  `akunId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `akunParentId` int(11) NOT NULL DEFAULT '0',
  `akunKode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `akunNama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `akunSaldoNormal` enum('D','K') COLLATE utf8_unicode_ci NOT NULL,
  `akunSaldoBertambah` enum('D','K') COLLATE utf8_unicode_ci NOT NULL,
  `akunSaldoBerkurang` enum('D','K') COLLATE utf8_unicode_ci NOT NULL,
  `akunCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `akunUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`akunId`),
  UNIQUE KEY `akuns_akunkode_unique` (`akunKode`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `akuns` */

insert  into `akuns`(`akunId`,`akunParentId`,`akunKode`,`akunNama`,`akunSaldoNormal`,`akunSaldoBertambah`,`akunSaldoBerkurang`,`akunCreated`,`akunUpdated`) values (11,0,'1','Aset','D','D','K','2018-12-07 13:25:45','2018-12-07 13:25:45'),(12,0,'2','Utang','K','K','D','2018-12-07 13:26:06','2018-12-07 13:26:06'),(13,0,'3','Modal','K','K','D','2018-12-07 13:26:21','2018-12-07 13:26:21'),(14,0,'4','Penjualan','K','K','D','2018-12-07 13:26:33','2018-12-07 13:26:33'),(15,0,'5','Pembelian','D','D','K','2018-12-07 13:26:48','2018-12-07 13:26:48'),(16,0,'6','Beban/Biaya','D','D','K','2018-12-07 13:27:15','2018-12-07 13:27:15'),(17,11,'11','Aset Lancar','D','D','K','2018-12-07 13:27:40','2018-12-07 13:27:40'),(18,11,'12','Aset Tetap','D','D','K','2018-12-07 13:28:07','2018-12-07 13:28:07'),(19,17,'111','Kas','D','D','K','2018-12-07 13:29:24','2018-12-07 13:29:24'),(20,17,'112','Piutang Dagang','D','D','K','2018-12-07 13:29:33','2018-12-07 13:29:33'),(21,17,'113','Persediaan Barang Dagangan','D','D','K','2018-12-07 13:29:50','2018-12-07 13:29:50'),(22,17,'114','Persediaan Bahan Baku','D','D','K','2018-12-07 13:30:02','2018-12-07 13:30:02'),(23,17,'115','Persediaan Perlengkapan Toko','D','D','K','2018-12-07 13:30:14','2018-12-07 13:30:14'),(24,17,'116','Persediaan Perlengkapan kantor','D','D','K','2018-12-07 13:30:26','2018-12-07 13:30:26'),(25,17,'117','Persekot biaya sewa','D','D','K','2018-12-07 13:30:40','2018-12-07 13:30:40'),(26,18,'121','Tanah','D','D','K','2018-12-07 13:31:45','2018-12-07 13:31:45'),(27,18,'122','Gedung','D','D','K','2018-12-07 13:32:00','2018-12-07 13:32:00'),(28,18,'123','Kendaraan','D','D','K','2018-12-07 13:32:12','2018-12-07 13:32:12'),(29,18,'124','Akumulasi Penyusutan Kendaraan','D','D','K','2018-12-07 13:32:24','2018-12-07 13:32:24'),(30,18,'125','Peralatan Kantor','D','D','K','2018-12-07 13:32:36','2018-12-07 13:32:36'),(31,18,'126','Akum. Penyesutan Peralaratan Kantor','D','D','K','2018-12-07 13:32:49','2018-12-07 13:32:49'),(32,18,'127','Peralatan Toko','D','D','K','2018-12-07 13:33:04','2018-12-07 13:33:04'),(33,18,'128','Akum. Penyesutan Peralaratan Toko','D','D','K','2018-12-07 13:33:19','2018-12-07 13:33:19'),(34,12,'21','Utang','K','K','D','2018-12-07 13:33:46','2018-12-07 13:33:46'),(35,34,'211','Utang Dagang','K','K','D','2018-12-07 13:34:08','2018-12-07 13:34:08'),(36,34,'212','Utang Bank','K','K','D','2018-12-07 13:34:24','2018-12-07 13:34:24'),(37,13,'301','Modal','K','K','D','2018-12-07 13:34:47','2018-12-07 13:34:47'),(38,13,'302','Prive','K','K','D','2018-12-07 13:35:00','2018-12-07 13:35:00'),(39,14,'401','Penjualan','K','K','D','2018-12-07 13:35:16','2018-12-07 13:35:16'),(40,14,'402','Potongan Penjualan','D','D','K','2018-12-07 13:35:30','2018-12-07 13:35:30'),(41,14,'403','Biaya Angkut Penjualan','D','D','K','2018-12-07 13:35:43','2018-12-07 13:35:43'),(42,15,'501','Pembelian','D','D','K','2018-12-07 13:35:59','2018-12-07 13:35:59'),(43,15,'502','Potonagn Pembelian','K','K','D','2018-12-07 13:36:11','2018-12-07 13:36:11'),(44,15,'503','Retur Pembelian','K','K','D','2018-12-07 13:36:24','2018-12-07 13:36:24'),(45,16,'601','Biaya Gaji','D','D','K','2018-12-07 13:36:44','2018-12-07 13:36:44'),(46,16,'602','Biaya Listrik','D','D','K','2018-12-07 13:36:56','2018-12-07 13:36:56'),(47,16,'603','Biaya Telepon','D','D','K','2018-12-07 13:37:09','2018-12-07 13:37:09'),(48,16,'604','Biaya Air','D','D','K','2018-12-07 13:37:26','2018-12-07 13:37:26'),(49,16,'605','Biaya Sewa','D','D','K','2018-12-07 13:37:40','2018-12-07 13:37:40'),(50,16,'606','Biaya Reparasi Peralatan','D','D','K','2018-12-07 13:37:52','2018-12-07 13:37:52'),(51,16,'607','Biaya Bantuan Sosial','D','D','K','2018-12-07 13:38:05','2018-12-07 13:38:05'),(52,16,'608','Biaya Penyusutan Kendaraan','D','D','K','2018-12-07 13:38:16','2018-12-07 13:38:16'),(53,16,'609','Biaya Penyusutan Peralatan Kantor','D','D','K','2018-12-07 13:38:33','2018-12-07 13:38:33'),(54,16,'610','Biaya Penyusutan Peralatan Toko','D','D','K','2018-12-07 13:38:46','2018-12-07 13:38:46'),(55,16,'611','Biaya Perlengkapan Kantor','D','D','K','2018-12-07 13:38:58','2018-12-07 13:38:58'),(56,16,'612','Biaya Perlengkapan Toko','D','D','K','2018-12-07 13:39:11','2018-12-07 13:39:11'),(57,16,'613','Biaya Bahan Baku','D','D','K','2018-12-07 13:39:24','2018-12-07 13:39:24'),(61,59,'71','sub Percobaan','D','D','D','2018-12-21 13:59:02','2018-12-21 13:59:02'),(64,17,'119','Percobaan','D','D','D','2018-12-21 14:43:38','2018-12-21 14:43:38');

/*Table structure for table `jurnals` */

DROP TABLE IF EXISTS `jurnals`;

CREATE TABLE `jurnals` (
  `jurnalId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jurnalTanggal` date NOT NULL,
  `jurnalRef` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jurnalKodeAkun` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jurnalNamaAkun` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jurnalKeterangan` text COLLATE utf8_unicode_ci,
  `jurnalDebit` double(20,2) DEFAULT NULL,
  `jurnalKredit` double(20,2) DEFAULT NULL,
  `jurnalCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jurnalUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`jurnalId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `jurnals` */

insert  into `jurnals`(`jurnalId`,`jurnalTanggal`,`jurnalRef`,`jurnalKodeAkun`,`jurnalNamaAkun`,`jurnalKeterangan`,`jurnalDebit`,`jurnalKredit`,`jurnalCreated`,`jurnalUpdated`) values (1,'2018-12-01',NULL,'111','Kas',NULL,500000000.00,NULL,'2018-12-21 06:45:30','2019-01-16 14:19:53'),(2,'2018-12-01','','125','Peralatan Kantor','',10000000.00,0.00,'2018-12-21 06:45:46','2018-12-21 12:35:30'),(3,'2018-12-01','','127','Peralatan Toko','',8000000.00,0.00,'2018-12-21 06:46:16','2018-12-21 12:34:03'),(4,'2018-12-01',NULL,'123','Kendaraan',NULL,7000000.00,NULL,'2018-12-21 12:34:22','2019-01-16 14:19:47'),(5,'2018-12-01','','301','Modal','Mencatat setoran modal',0.00,500000000.00,'2018-12-21 12:35:05','2018-12-21 12:37:48'),(6,'2018-12-03','','605','Biaya Sewa','',20000000.00,0.00,'2018-12-21 12:35:26','2018-12-21 12:35:55'),(7,'2018-12-03','','111','Kas','Mencatat biaya sewa',0.00,20000000.00,'2018-12-21 12:35:49','2018-12-21 12:36:34'),(10,'2018-12-04',NULL,'112','Piutang Dagang',NULL,80000.00,NULL,'2018-12-27 08:35:05','2018-12-27 08:35:05');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2018_10_26_124537_create_sys_password_resets_table',1),(2,'2018_10_26_124553_create_sys_users_table',1),(6,'2018_11_29_092722_create_kode_akuns_table',2),(7,'2018_12_06_144045_create_akuns_table',3),(9,'2018_12_20_195014_create_jurnals_table',4);

/*Table structure for table `sys_password_resets` */

DROP TABLE IF EXISTS `sys_password_resets`;

CREATE TABLE `sys_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `sys_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sys_password_resets` */

/*Table structure for table `sys_users` */

DROP TABLE IF EXISTS `sys_users`;

CREATE TABLE `sys_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sys_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sys_users` */

insert  into `sys_users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Triangkas','triangkas@gmail.com','$2y$10$E6xb/0Gu7x9zDzZCZS0WVeuEDiGd50lhTFxXhBLyiA/pqXrPLw/Vq','TjveNhQlu68IuadDwutuSSlw9aEgtKXJHvZErKBPOVHilTCuTPGRLHp67Rf7','2018-11-29 01:03:11','2018-11-29 01:03:11');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
