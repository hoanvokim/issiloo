# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.10-MariaDB)
# Database: issiloo
# Generation Time: 2016-04-25 09:41:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `sort_index` int(11) DEFAULT NULL,
  `en_name` varchar(500) DEFAULT NULL,
  `vi_name` varchar(500) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `parent_id_fk` (`parent_id`),
  CONSTRAINT `parent_id_fk` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`id`, `parent_id`, `slug`, `sort_index`, `en_name`, `vi_name`, `created_date`, `updated_date`)
VALUES
	(1,NULL,'gioi-thieu',0,'Introduce','Giới thiệu','2016-04-25 16:17:30','2016-04-25 16:19:56'),
	(2,1,'gioi-thieu',0,'Introduce','Giới thiệu','2016-04-25 16:18:52','2016-04-25 16:19:52'),
	(3,1,'linh-vuc-hoat-dong',1,'We are working on','Lĩnh vực hoạt động','2016-04-25 16:19:35','2016-04-25 16:19:48'),
	(4,1,'tam-nhin-su-menh',2,'Mission & Vision','Tầm nhìn và Sứ mệnh','2016-04-25 16:21:26',NULL),
	(5,1,'nhan-vien-issiloo',3,'Our employees','Nhân viên tại ISSILOO','2016-04-25 16:22:26',NULL),
	(6,1,'hanh-trinh-issiloo',4,'An advanture','Hành trình ISSILOO','2016-04-25 16:23:06',NULL),
	(7,NULL,'tin-tuc',0,'News & Events','Tin tức và Sự kiện','2016-04-25 16:23:54',NULL),
	(8,NULL,'chia-se-hinh-anh-video',0,'Sharing','Chia sẻ','2016-04-25 16:24:52',NULL),
	(9,NULL,'hanh-trang-du-hoc',0,'Tips for study abroad','Hành trang du học','2016-04-25 16:27:52',NULL),
	(10,NULL,'du-hoc',0,'Study abroad','Du học','2016-04-25 16:28:56',NULL),
	(11,10,'du-hoc-han-quoc',0,'Study in Korea','Du học Hàn Quốc','2016-04-25 16:36:25',NULL),
	(12,11,'du-hoc-tai-truong-cao-dang-koguryeo',0,'Study at Koguryeo','Du học tại Koguryeo','2016-04-25 16:38:31',NULL),
	(13,NULL,'hoc-tieng-han',0,'Learning korean','Học tiếng hàn','2016-04-25 16:39:10',NULL),
	(14,NULL,'trung-tam-han-ngu',0,'Korean center','Trung tâm Hàn ngữ','2016-04-25 16:39:47',NULL),
	(15,14,'chuong-trinh-dao-tao',0,'Programmers','Chương trình đào tạo','2016-04-25 16:40:16',NULL),
	(16,14,'thoi-khoa-bieu',1,'Schedule','Thời khoá biểu','2016-04-25 16:40:42',NULL);

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table faq
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faq`;

CREATE TABLE `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `en_question` varchar(500) DEFAULT NULL,
  `vi_question` varchar(500) DEFAULT NULL,
  `en_answer` longtext,
  `vi_answer` longtext,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_src` varchar(150) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `en_title` varchar(500) DEFAULT NULL,
  `vi_title` varchar(500) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `content` longtext,
  `user_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `message_user_fk` (`user_id`),
  CONSTRAINT `message_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `img_src` varchar(150) DEFAULT '',
  `slug` varchar(250) DEFAULT NULL,
  `title_header` varchar(500) DEFAULT NULL,
  `description_header` varchar(500) DEFAULT NULL,
  `keyword_header` varchar(500) DEFAULT NULL,
  `en_title` varchar(500) DEFAULT NULL,
  `vi_title` varchar(500) DEFAULT NULL,
  `en_content` longtext,
  `vi_content` longtext,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `news_category_fk` (`category_id`),
  CONSTRAINT `news_category_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table newsgallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `newsgallery`;

CREATE TABLE `newsgallery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL,
  `images_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `newsgallery_newsid` (`news_id`),
  KEY `newsgallery_imageid` (`images_id`),
  CONSTRAINT `newsgallery_imageid` FOREIGN KEY (`images_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `newsgallery_newsid` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table slider
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_src` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `en_content` varchar(500) DEFAULT NULL,
  `vi_content` varchar(500) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tagnews
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tagnews`;

CREATE TABLE `tagnews` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_news_fk` (`news_id`),
  KEY `tag_id_fk` (`tag_id`),
  CONSTRAINT `tag_id_fk` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tag_news_fk` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table university
# ------------------------------------------------------------

DROP TABLE IF EXISTS `university`;

CREATE TABLE `university` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `en_title` varchar(500) DEFAULT NULL,
  `vi_title` varchar(500) DEFAULT NULL,
  `en_description` varchar(1000) DEFAULT NULL,
  `vi_description` varchar(1000) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table universityimages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `universityimages`;

CREATE TABLE `universityimages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `university_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `university_images_fk` (`university_id`),
  KEY `university_image_fk` (`image_id`),
  CONSTRAINT `university_image_fk` FOREIGN KEY (`image_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `university_images_fk` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table universitynews
# ------------------------------------------------------------

DROP TABLE IF EXISTS `universitynews`;

CREATE TABLE `universitynews` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `university_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_id_fk` (`news_id`),
  KEY `university_id_fk` (`university_id`),
  CONSTRAINT `news_id_fk` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `university_id_fk` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
