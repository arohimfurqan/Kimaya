/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.17-MariaDB : Database - kimaya
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kimaya` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `kimaya`;

/*Table structure for table `biodata` */

DROP TABLE IF EXISTS `biodata`;

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `provinsi_id` int(11) DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tanggal_lahir` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_biodata`),
  KEY `FK_biodata` (`provinsi_id`),
  KEY `FK_biodata2` (`kota_id`),
  KEY `FK_biodata7` (`user_id`),
  CONSTRAINT `FK_biodata7` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

/*Data for the table `biodata` */

insert  into `biodata`(`id_biodata`,`user_id`,`alamat`,`no_hp`,`provinsi_id`,`kota_id`,`jenis_kelamin`,`tanggal_lahir`) values (18,7,NULL,NULL,32,318,NULL,NULL),(19,8,NULL,NULL,32,318,NULL,NULL),(20,10,NULL,NULL,32,318,NULL,NULL),(21,11,NULL,NULL,32,318,NULL,NULL),(22,12,NULL,NULL,32,318,NULL,NULL),(23,13,NULL,NULL,32,318,NULL,NULL),(24,14,NULL,NULL,32,318,NULL,NULL),(25,15,NULL,NULL,32,318,NULL,NULL),(26,16,NULL,NULL,32,318,NULL,NULL),(27,17,NULL,NULL,32,318,NULL,NULL),(28,18,'jalan veteran no 16 b','123456789012',32,318,NULL,NULL);

/*Table structure for table `brand` */

DROP TABLE IF EXISTS `brand`;

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `nama_brand` varchar(45) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `brand` */

insert  into `brand`(`id_brand`,`nama_brand`,`user_id`) values (5,'Nike',11),(6,'Adidas',11),(7,'Lala',11),(8,'Scarlett',13);

/*Table structure for table `foto_lain_produk` */

DROP TABLE IF EXISTS `foto_lain_produk`;

CREATE TABLE `foto_lain_produk` (
  `id_foto_lain` int(11) NOT NULL AUTO_INCREMENT,
  `foto_lain` text NOT NULL,
  `produk_id` int(11) NOT NULL,
  PRIMARY KEY (`id_foto_lain`),
  KEY `FK_foto_lain_produk` (`produk_id`),
  CONSTRAINT `FK_foto_lain_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

/*Data for the table `foto_lain_produk` */

insert  into `foto_lain_produk`(`id_foto_lain`,`foto_lain`,`produk_id`) values (26,'th.jpg',24),(27,'3.jpg',25),(28,'2.jpg',26),(29,'gambar 2.jpg',27),(30,'gambar 3.jpg',28),(31,'2fdeb4006aa9856a8157123227d1d6a2.jpg',29);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`,`user_id`) values (8,'Kecantikan/Kosmetik',11),(9,'Sepatu Pria',11),(10,'srssd',11),(11,'Sepatu Pria 2',11),(12,'Sepatu Pria 3',11),(13,'Body Lation',13);

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal_pesan` varchar(50) DEFAULT NULL,
  `tanggal_pengiriman` varchar(50) DEFAULT NULL,
  `tanggal_terima` varchar(50) DEFAULT NULL,
  `tanggal_pembayaran` varchar(50) DEFAULT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `penjual_id` int(11) DEFAULT NULL,
  `kurir` varchar(25) DEFAULT NULL,
  `paket_kurir` varchar(255) DEFAULT NULL,
  `ongkir` double DEFAULT NULL,
  PRIMARY KEY (`id_keranjang`),
  KEY `FK_keranjang` (`penjual_id`),
  KEY `FK_keranjang8` (`user_id`),
  CONSTRAINT `FK_keranjang` FOREIGN KEY (`penjual_id`) REFERENCES `users` (`id_user`),
  CONSTRAINT `FK_keranjang8` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

/*Data for the table `keranjang` */

insert  into `keranjang`(`id_keranjang`,`user_id`,`status`,`tanggal_pesan`,`tanggal_pengiriman`,`tanggal_terima`,`tanggal_pembayaran`,`bukti_pembayaran`,`penjual_id`,`kurir`,`paket_kurir`,`ongkir`) values (30,18,'Keranjang',NULL,NULL,NULL,NULL,NULL,17,NULL,NULL,NULL),(31,18,'Keranjang',NULL,NULL,NULL,NULL,NULL,15,NULL,NULL,NULL);

/*Table structure for table `keranjang_produk` */

DROP TABLE IF EXISTS `keranjang_produk`;

CREATE TABLE `keranjang_produk` (
  `produk_keranjang_id` int(11) NOT NULL AUTO_INCREMENT,
  `keranjang_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_keranjang` int(11) NOT NULL,
  PRIMARY KEY (`produk_keranjang_id`),
  KEY `FK_keranjang_produk` (`keranjang_id`),
  CONSTRAINT `FK_keranjang_produk` FOREIGN KEY (`keranjang_id`) REFERENCES `keranjang` (`id_keranjang`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Data for the table `keranjang_produk` */

insert  into `keranjang_produk`(`produk_keranjang_id`,`keranjang_id`,`produk_id`,`jumlah`,`harga_keranjang`) values (36,30,29,2,10000),(37,31,28,1,50000),(40,31,27,1,10000);

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `harga` double NOT NULL,
  `foto_produk` text NOT NULL,
  `status_produk` varchar(20) NOT NULL,
  `produk_user_id` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `FK_produk` (`kategori_id`),
  KEY `FK_produk2` (`brand_id`),
  KEY `FK_produk26` (`produk_user_id`),
  CONSTRAINT `FK_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_produk2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id_brand`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_produk26` FOREIGN KEY (`produk_user_id`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`nama_produk`,`deskripsi`,`qty`,`brand_id`,`kategori_id`,`harga`,`foto_produk`,`status_produk`,`produk_user_id`,`berat`) values (24,'Nike','<p>Cocok dipakai Pria dan Wanita</p>',10,5,9,100000,'1661140129th.jpg','Aktif',11,1000),(25,'Facial Wash','<p>Good</p>',10,8,13,75000,'16612286863.jpg','Aktif',13,1000),(26,'Serum Whitening','<p>Mntp</p>',10,8,13,75000,'16612287501.jpg','Aktif',13,1000),(27,'Kripik Balado','<p>Enak, Murah</p>',10,7,10,10000,'1661394972gambar 1.jpg','Aktif',15,1000),(28,'bengbeng','<p>Murah</p>',10,7,10,50000,'1661395020gambar 4.jpg','Aktif',15,1000),(29,'cimory','<p>cimory</p>',96,5,9,10000,'16614277262fdeb4006aa9856a8157123227d1d6a2.jpg','Aktif',17,1000);

/*Table structure for table `tb_kota_kabupaten` */

DROP TABLE IF EXISTS `tb_kota_kabupaten`;

CREATE TABLE `tb_kota_kabupaten` (
  `id` int(4) NOT NULL,
  `id_provinsi` int(4) DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `regencies_province_id_index` (`id_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_kota_kabupaten` */

insert  into `tb_kota_kabupaten`(`id`,`id_provinsi`,`nama`) values (1,21,'Aceh Barat'),(2,21,'Aceh Barat Daya'),(3,21,'Aceh Besar'),(4,21,'Aceh Jaya'),(5,21,'Aceh Selatan'),(6,21,'Aceh Singkil'),(7,21,'Aceh Tamiang'),(8,21,'Aceh Tengah'),(9,21,'Aceh Tenggara'),(10,21,'Aceh Timur'),(11,21,'Aceh Utara'),(12,32,'Agam'),(13,23,'Alor'),(14,19,'Ambon'),(15,34,'Asahan'),(16,24,'Asmat'),(17,1,'Badung'),(18,13,'Balangan'),(19,15,'Balikpapan'),(20,21,'Banda Aceh'),(21,18,'Bandar Lampung'),(22,9,'Bandung'),(23,9,'Bandung'),(24,9,'Bandung Barat'),(25,29,'Banggai'),(26,29,'Banggai Kepulauan'),(27,2,'Bangka'),(28,2,'Bangka Barat'),(29,2,'Bangka Selatan'),(30,2,'Bangka Tengah'),(31,11,'Bangkalan'),(32,1,'Bangli'),(33,13,'Banjar'),(34,9,'Banjar'),(35,13,'Banjarbaru'),(36,13,'Banjarmasin'),(37,10,'Banjarnegara'),(38,28,'Bantaeng'),(39,5,'Bantul'),(40,33,'Banyuasin'),(41,10,'Banyumas'),(42,11,'Banyuwangi'),(43,13,'Barito Kuala'),(44,14,'Barito Selatan'),(45,14,'Barito Timur'),(46,14,'Barito Utara'),(47,28,'Barru'),(48,17,'Batam'),(49,10,'Batang'),(50,8,'Batang Hari'),(51,11,'Batu'),(52,34,'Batu Bara'),(53,30,'Bau-Bau'),(54,9,'Bekasi'),(55,9,'Bekasi'),(56,2,'Belitung'),(57,2,'Belitung Timur'),(58,23,'Belu'),(59,21,'Bener Meriah'),(60,26,'Bengkalis'),(61,12,'Bengkayang'),(62,4,'Bengkulu'),(63,4,'Bengkulu Selatan'),(64,4,'Bengkulu Tengah'),(65,4,'Bengkulu Utara'),(66,15,'Berau'),(67,24,'Biak Numfor'),(68,22,'Bima'),(69,22,'Bima'),(70,34,'Binjai'),(71,17,'Bintan'),(72,21,'Bireuen'),(73,31,'Bitung'),(74,11,'Blitar'),(75,11,'Blitar'),(76,10,'Blora'),(77,7,'Boalemo'),(78,9,'Bogor'),(79,9,'Bogor'),(80,11,'Bojonegoro'),(81,31,'Bolaang Mongondow (Bolmong)'),(82,31,'Bolaang Mongondow Selatan'),(83,31,'Bolaang Mongondow Timur'),(84,31,'Bolaang Mongondow Utara'),(85,30,'Bombana'),(86,11,'Bondowoso'),(87,28,'Bone'),(88,7,'Bone Bolango'),(89,15,'Bontang'),(90,24,'Boven Digoel'),(91,10,'Boyolali'),(92,10,'Brebes'),(93,32,'Bukittinggi'),(94,1,'Buleleng'),(95,28,'Bulukumba'),(96,16,'Bulungan (Bulongan)'),(97,8,'Bungo'),(98,29,'Buol'),(99,19,'Buru'),(100,19,'Buru Selatan'),(101,30,'Buton'),(102,30,'Buton Utara'),(103,9,'Ciamis'),(104,9,'Cianjur'),(105,10,'Cilacap'),(106,3,'Cilegon'),(107,9,'Cimahi'),(108,9,'Cirebon'),(109,9,'Cirebon'),(110,34,'Dairi'),(111,24,'Deiyai (Deliyai)'),(112,34,'Deli Serdang'),(113,10,'Demak'),(114,1,'Denpasar'),(115,9,'Depok'),(116,32,'Dharmasraya'),(117,24,'Dogiyai'),(118,22,'Dompu'),(119,29,'Donggala'),(120,26,'Dumai'),(121,33,'Empat Lawang'),(122,23,'Ende'),(123,28,'Enrekang'),(124,25,'Fakfak'),(125,23,'Flores Timur'),(126,9,'Garut'),(127,21,'Gayo Lues'),(128,1,'Gianyar'),(129,7,'Gorontalo'),(130,7,'Gorontalo'),(131,7,'Gorontalo Utara'),(132,28,'Gowa'),(133,11,'Gresik'),(134,10,'Grobogan'),(135,5,'Gunung Kidul'),(136,14,'Gunung Mas'),(137,34,'Gunungsitoli'),(138,20,'Halmahera Barat'),(139,20,'Halmahera Selatan'),(140,20,'Halmahera Tengah'),(141,20,'Halmahera Timur'),(142,20,'Halmahera Utara'),(143,13,'Hulu Sungai Selatan'),(144,13,'Hulu Sungai Tengah'),(145,13,'Hulu Sungai Utara'),(146,34,'Humbang Hasundutan'),(147,26,'Indragiri Hilir'),(148,26,'Indragiri Hulu'),(149,9,'Indramayu'),(150,24,'Intan Jaya'),(151,6,'Jakarta Barat'),(152,6,'Jakarta Pusat'),(153,6,'Jakarta Selatan'),(154,6,'Jakarta Timur'),(155,6,'Jakarta Utara'),(156,8,'Jambi'),(157,24,'Jayapura'),(158,24,'Jayapura'),(159,24,'Jayawijaya'),(160,11,'Jember'),(161,1,'Jembrana'),(162,28,'Jeneponto'),(163,10,'Jepara'),(164,11,'Jombang'),(165,25,'Kaimana'),(166,26,'Kampar'),(167,14,'Kapuas'),(168,12,'Kapuas Hulu'),(169,10,'Karanganyar'),(170,1,'Karangasem'),(171,9,'Karawang'),(172,17,'Karimun'),(173,34,'Karo'),(174,14,'Katingan'),(175,4,'Kaur'),(176,12,'Kayong Utara'),(177,10,'Kebumen'),(178,11,'Kediri'),(179,11,'Kediri'),(180,24,'Keerom'),(181,10,'Kendal'),(182,30,'Kendari'),(183,4,'Kepahiang'),(184,17,'Kepulauan Anambas'),(185,19,'Kepulauan Aru'),(186,32,'Kepulauan Mentawai'),(187,26,'Kepulauan Meranti'),(188,31,'Kepulauan Sangihe'),(189,6,'Kepulauan Seribu'),(190,31,'Kepulauan Siau Tagulandang Biaro (Sitaro)'),(191,20,'Kepulauan Sula'),(192,31,'Kepulauan Talaud'),(193,24,'Kepulauan Yapen (Yapen Waropen)'),(194,8,'Kerinci'),(195,12,'Ketapang'),(196,10,'Klaten'),(197,1,'Klungkung'),(198,30,'Kolaka'),(199,30,'Kolaka Utara'),(200,30,'Konawe'),(201,30,'Konawe Selatan'),(202,30,'Konawe Utara'),(203,13,'Kotabaru'),(204,31,'Kotamobagu'),(205,14,'Kotawaringin Barat'),(206,14,'Kotawaringin Timur'),(207,26,'Kuantan Singingi'),(208,12,'Kubu Raya'),(209,10,'Kudus'),(210,5,'Kulon Progo'),(211,9,'Kuningan'),(212,23,'Kupang'),(213,23,'Kupang'),(214,15,'Kutai Barat'),(215,15,'Kutai Kartanegara'),(216,15,'Kutai Timur'),(217,34,'Labuhan Batu'),(218,34,'Labuhan Batu Selatan'),(219,34,'Labuhan Batu Utara'),(220,33,'Lahat'),(221,14,'Lamandau'),(222,11,'Lamongan'),(223,18,'Lampung Barat'),(224,18,'Lampung Selatan'),(225,18,'Lampung Tengah'),(226,18,'Lampung Timur'),(227,18,'Lampung Utara'),(228,12,'Landak'),(229,34,'Langkat'),(230,21,'Langsa'),(231,24,'Lanny Jaya'),(232,3,'Lebak'),(233,4,'Lebong'),(234,23,'Lembata'),(235,21,'Lhokseumawe'),(236,32,'Lima Puluh Koto/Kota'),(237,17,'Lingga'),(238,22,'Lombok Barat'),(239,22,'Lombok Tengah'),(240,22,'Lombok Timur'),(241,22,'Lombok Utara'),(242,33,'Lubuk Linggau'),(243,11,'Lumajang'),(244,28,'Luwu'),(245,28,'Luwu Timur'),(246,28,'Luwu Utara'),(247,11,'Madiun'),(248,11,'Madiun'),(249,10,'Magelang'),(250,10,'Magelang'),(251,11,'Magetan'),(252,9,'Majalengka'),(253,27,'Majene'),(254,28,'Makassar'),(255,11,'Malang'),(256,11,'Malang'),(257,16,'Malinau'),(258,19,'Maluku Barat Daya'),(259,19,'Maluku Tengah'),(260,19,'Maluku Tenggara'),(261,19,'Maluku Tenggara Barat'),(262,27,'Mamasa'),(263,24,'Mamberamo Raya'),(264,24,'Mamberamo Tengah'),(265,27,'Mamuju'),(266,27,'Mamuju Utara'),(267,31,'Manado'),(268,34,'Mandailing Natal'),(269,23,'Manggarai'),(270,23,'Manggarai Barat'),(271,23,'Manggarai Timur'),(272,25,'Manokwari'),(273,25,'Manokwari Selatan'),(274,24,'Mappi'),(275,28,'Maros'),(276,22,'Mataram'),(277,25,'Maybrat'),(278,34,'Medan'),(279,12,'Melawi'),(280,8,'Merangin'),(281,24,'Merauke'),(282,18,'Mesuji'),(283,18,'Metro'),(284,24,'Mimika'),(285,31,'Minahasa'),(286,31,'Minahasa Selatan'),(287,31,'Minahasa Tenggara'),(288,31,'Minahasa Utara'),(289,11,'Mojokerto'),(290,11,'Mojokerto'),(291,29,'Morowali'),(292,33,'Muara Enim'),(293,8,'Muaro Jambi'),(294,4,'Muko Muko'),(295,30,'Muna'),(296,14,'Murung Raya'),(297,33,'Musi Banyuasin'),(298,33,'Musi Rawas'),(299,24,'Nabire'),(300,21,'Nagan Raya'),(301,23,'Nagekeo'),(302,17,'Natuna'),(303,24,'Nduga'),(304,23,'Ngada'),(305,11,'Nganjuk'),(306,11,'Ngawi'),(307,34,'Nias'),(308,34,'Nias Barat'),(309,34,'Nias Selatan'),(310,34,'Nias Utara'),(311,16,'Nunukan'),(312,33,'Ogan Ilir'),(313,33,'Ogan Komering Ilir'),(314,33,'Ogan Komering Ulu'),(315,33,'Ogan Komering Ulu Selatan'),(316,33,'Ogan Komering Ulu Timur'),(317,11,'Pacitan'),(318,32,'Padang'),(319,34,'Padang Lawas'),(320,34,'Padang Lawas Utara'),(321,32,'Padang Panjang'),(322,32,'Padang Pariaman'),(323,34,'Padang Sidempuan'),(324,33,'Pagar Alam'),(325,34,'Pakpak Bharat'),(326,14,'Palangka Raya'),(327,33,'Palembang'),(328,28,'Palopo'),(329,29,'Palu'),(330,11,'Pamekasan'),(331,3,'Pandeglang'),(332,9,'Pangandaran'),(333,28,'Pangkajene Kepulauan'),(334,2,'Pangkal Pinang'),(335,24,'Paniai'),(336,28,'Parepare'),(337,32,'Pariaman'),(338,29,'Parigi Moutong'),(339,32,'Pasaman'),(340,32,'Pasaman Barat'),(341,15,'Paser'),(342,11,'Pasuruan'),(343,11,'Pasuruan'),(344,10,'Pati'),(345,32,'Payakumbuh'),(346,25,'Pegunungan Arfak'),(347,24,'Pegunungan Bintang'),(348,10,'Pekalongan'),(349,10,'Pekalongan'),(350,26,'Pekanbaru'),(351,26,'Pelalawan'),(352,10,'Pemalang'),(353,34,'Pematang Siantar'),(354,15,'Penajam Paser Utara'),(355,18,'Pesawaran'),(356,18,'Pesisir Barat'),(357,32,'Pesisir Selatan'),(358,21,'Pidie'),(359,21,'Pidie Jaya'),(360,28,'Pinrang'),(361,7,'Pohuwato'),(362,27,'Polewali Mandar'),(363,11,'Ponorogo'),(364,12,'Pontianak'),(365,12,'Pontianak'),(366,29,'Poso'),(367,33,'Prabumulih'),(368,18,'Pringsewu'),(369,11,'Probolinggo'),(370,11,'Probolinggo'),(371,14,'Pulang Pisau'),(372,20,'Pulau Morotai'),(373,24,'Puncak'),(374,24,'Puncak Jaya'),(375,10,'Purbalingga'),(376,9,'Purwakarta'),(377,10,'Purworejo'),(378,25,'Raja Ampat'),(379,4,'Rejang Lebong'),(380,10,'Rembang'),(381,26,'Rokan Hilir'),(382,26,'Rokan Hulu'),(383,23,'Rote Ndao'),(384,21,'Sabang'),(385,23,'Sabu Raijua'),(386,10,'Salatiga'),(387,15,'Samarinda'),(388,12,'Sambas'),(389,34,'Samosir'),(390,11,'Sampang'),(391,12,'Sanggau'),(392,24,'Sarmi'),(393,8,'Sarolangun'),(394,32,'Sawah Lunto'),(395,12,'Sekadau'),(396,28,'Selayar (Kepulauan Selayar)'),(397,4,'Seluma'),(398,10,'Semarang'),(399,10,'Semarang'),(400,19,'Seram Bagian Barat'),(401,19,'Seram Bagian Timur'),(402,3,'Serang'),(403,3,'Serang'),(404,34,'Serdang Bedagai'),(405,14,'Seruyan'),(406,26,'Siak'),(407,34,'Sibolga'),(408,28,'Sidenreng Rappang/Rapang'),(409,11,'Sidoarjo'),(410,29,'Sigi'),(411,32,'Sijunjung (Sawah Lunto Sijunjung)'),(412,23,'Sikka'),(413,34,'Simalungun'),(414,21,'Simeulue'),(415,12,'Singkawang'),(416,28,'Sinjai'),(417,12,'Sintang'),(418,11,'Situbondo'),(419,5,'Sleman'),(420,32,'Solok'),(421,32,'Solok'),(422,32,'Solok Selatan'),(423,28,'Soppeng'),(424,25,'Sorong'),(425,25,'Sorong'),(426,25,'Sorong Selatan'),(427,10,'Sragen'),(428,9,'Subang'),(429,21,'Subulussalam'),(430,9,'Sukabumi'),(431,9,'Sukabumi'),(432,14,'Sukamara'),(433,10,'Sukoharjo'),(434,23,'Sumba Barat'),(435,23,'Sumba Barat Daya'),(436,23,'Sumba Tengah'),(437,23,'Sumba Timur'),(438,22,'Sumbawa'),(439,22,'Sumbawa Barat'),(440,9,'Sumedang'),(441,11,'Sumenep'),(442,8,'Sungaipenuh'),(443,24,'Supiori'),(444,11,'Surabaya'),(445,10,'Surakarta (Solo)'),(446,13,'Tabalong'),(447,1,'Tabanan'),(448,28,'Takalar'),(449,25,'Tambrauw'),(450,16,'Tana Tidung'),(451,28,'Tana Toraja'),(452,13,'Tanah Bumbu'),(453,32,'Tanah Datar'),(454,13,'Tanah Laut'),(455,3,'Tangerang'),(456,3,'Tangerang'),(457,3,'Tangerang Selatan'),(458,18,'Tanggamus'),(459,34,'Tanjung Balai'),(460,8,'Tanjung Jabung Barat'),(461,8,'Tanjung Jabung Timur'),(462,17,'Tanjung Pinang'),(463,34,'Tapanuli Selatan'),(464,34,'Tapanuli Tengah'),(465,34,'Tapanuli Utara'),(466,13,'Tapin'),(467,16,'Tarakan'),(468,9,'Tasikmalaya'),(469,9,'Tasikmalaya'),(470,34,'Tebing Tinggi'),(471,8,'Tebo'),(472,10,'Tegal'),(473,10,'Tegal'),(474,25,'Teluk Bintuni'),(475,25,'Teluk Wondama'),(476,10,'Temanggung'),(477,20,'Ternate'),(478,20,'Tidore Kepulauan'),(479,23,'Timor Tengah Selatan'),(480,23,'Timor Tengah Utara'),(481,34,'Toba Samosir'),(482,29,'Tojo Una-Una'),(483,29,'Toli-Toli'),(484,24,'Tolikara'),(485,31,'Tomohon'),(486,28,'Toraja Utara'),(487,11,'Trenggalek'),(488,19,'Tual'),(489,11,'Tuban'),(490,18,'Tulang Bawang'),(491,18,'Tulang Bawang Barat'),(492,11,'Tulungagung'),(493,28,'Wajo'),(494,30,'Wakatobi'),(495,24,'Waropen'),(496,18,'Way Kanan'),(497,10,'Wonogiri'),(498,10,'Wonosobo'),(499,24,'Yahukimo'),(500,24,'Yalimo'),(501,5,'Yogyakarta');

/*Table structure for table `tb_provinsi` */

DROP TABLE IF EXISTS `tb_provinsi`;

CREATE TABLE `tb_provinsi` (
  `id` int(4) NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_provinsi` */

insert  into `tb_provinsi`(`id`,`nama`) values (1,'Bali'),(2,'Bangka Belitung'),(3,'Banten'),(4,'Bengkulu'),(5,'DI Yogyakarta'),(6,'DKI Jakarta'),(7,'Gorontalo'),(8,'Jambi'),(9,'Jawa Barat'),(10,'Jawa Tengah'),(11,'Jawa Timur'),(12,'Kalimantan Barat'),(13,'Kalimantan Selatan'),(14,'Kalimantan Tengah'),(15,'Kalimantan Timur'),(16,'Kalimantan Utara'),(17,'Kepulauan Riau'),(18,'Lampung'),(19,'Maluku'),(20,'Maluku Utara'),(21,'Nanggroe Aceh Darussalam (NAD)'),(22,'Nusa Tenggara Barat (NTB)'),(23,'Nusa Tenggara Timur (NTT)'),(24,'Papua'),(25,'Papua Barat'),(26,'Riau'),(27,'Sulawesi Barat'),(28,'Sulawesi Selatan'),(29,'Sulawesi Tengah'),(30,'Sulawesi Tenggara'),(31,'Sulawesi Utara'),(32,'Sumatera Barat'),(33,'Sumatera Selatan'),(34,'Sumatera Utara');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  `foto_profile` text DEFAULT NULL,
  `ktp` text DEFAULT NULL,
  `siup` text DEFAULT NULL,
  `situ` text DEFAULT NULL,
  `statuss` varchar(15) DEFAULT NULL,
  `token_reset` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id_user`,`username`,`nama`,`password`,`email`,`role`,`foto_profile`,`ktp`,`siup`,`situ`,`statuss`,`token_reset`) values (1,'superadmin','Super Admin','$2y$10$gummw8UZ0MNQ6E9nTmCSve3nB42w7Ds5LB2x39EupK6Xs768pQCEO','rohim98@gmail.com','superadmin',NULL,NULL,NULL,NULL,'Aktif',NULL),(7,'aya@gmail.com','Fitri Aulia','$2y$10$nQONwytQz4PDRxERVr/YX.mKT4Z1PdzhEn.VYiqHcHrbf4k7ORSXy','aya@gmail.com','Customer',NULL,NULL,NULL,NULL,'Aktif',NULL),(8,'Felix@gmail.com','Felix','$2y$10$kC2cfAi4cDJxPk4YCp4dReFwwY/Ir98Bz0bmt2jMqvOxEmN/cO7gG','Felix@gmail.com','admin',NULL,NULL,NULL,NULL,'Aktif',NULL),(10,'tes@gmail.com','tes tes','$2y$10$M.be82kffe7EudO.nsJUDOBVbrJPxZG8OrLLQKQawWs1aWcxbv2/G','tes@gmail.com','admin',NULL,NULL,NULL,NULL,'Aktif',NULL),(11,'namjoon@gmail.com','Kim Namjoon','$2y$10$CvUyexUErPAfebVfpMP8P.2owaKYdZUD1WCEE1l0JmWc2hzvlS4dS','namjoon@gmail.com','admin',NULL,NULL,NULL,NULL,'Aktif',NULL),(12,'ilham@gmail.com','Muhammad Ilham','$2y$10$lmlxVueLOYNnw5cTK9l8m.lC/JuE.5IzNvs4YoCenmaWvxnKDb6tO','ilham@gmail.com','Customer',NULL,NULL,NULL,NULL,'Aktif',NULL),(13,'fitriaulia@gmail.com','Fitri Aulia','$2y$10$x421.fl1Pq1tcLWISJiLbuOy.FRVAnzFUeZJi0/BsPP2x.5xYM5dq','fitriaulia@gmail.com','admin',NULL,NULL,NULL,NULL,'Aktif',NULL),(14,'nelly@gmail.com','Nelly Novia','$2y$10$xE8.JmCMTWn3mzDFQZo.6u7xTlSl5isyUBEtCw2OgKHKgUJWFNBhu','nelly@gmail.com','Customer',NULL,NULL,NULL,NULL,'Aktif',NULL),(15,'aulia@gmail.com','Aulia','$2y$10$WxnrgMWBxbRcdEz9shD8DeC.UxtoG2VqoOUuShgURdb/VzWdlwN7S','aulia@gmail.com','admin',NULL,NULL,NULL,NULL,'Aktif',NULL),(16,'il@gmail.com','Ilham','$2y$10$1vHhZAAfDdLrEmECTyw0z.MC2vBlWjLzNp6QUrndgP.ub.t9Wi30C','il@gmail.com','Customer',NULL,NULL,NULL,NULL,'Aktif',NULL),(17,'rohim90@gmail.com','Rohim Shop','$2y$10$cy2tuP3RE3/9xodKHTpLb.1wIkmEC618y4mXK8GAI7yfQ.fmvcoVm','rohim90@gmail.com','admin',NULL,'1661421146db.jpeg','1661421146Input Dan Ouput.pdf','1661421146TABEL POIN TURNAMEN INTERNAL PB JAYANUSA.pdf','Aktif',NULL),(18,'lovela@gmail.com','lovela famazera','$2y$10$V3ZlpqAwarKO/imeo7YYzu5euSR0.lOBP4pFiH70xEcIN8qQYEdg2','lovela@gmail.com','Customer',NULL,NULL,NULL,NULL,'Aktif','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
