# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.10-MariaDB)
# Database: issiloo
# Generation Time: 2016-04-25 10:33:58 +0000
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
  `en_name` varchar(500) DEFAULT NULL,
  `vi_name` varchar(500) DEFAULT NULL,
  `is_menu` tinyint(1) NOT NULL DEFAULT '0',
  `sort_index` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `parent_id_fk` (`parent_id`),
  CONSTRAINT `parent_id_fk` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`id`, `parent_id`, `slug`, `en_name`, `vi_name`, `is_menu`, `sort_index`, `created_date`, `updated_date`)
VALUES
	(1,NULL,'gioi-thieu','Introduce','Giới thiệu',1,1,'2016-04-25 16:17:30','2016-04-25 17:32:21'),
	(2,1,'gioi-thieu','Introduce','Giới thiệu',0,0,'2016-04-25 16:18:52','2016-04-25 16:19:52'),
	(3,1,'linh-vuc-hoat-dong','We are working on','Lĩnh vực hoạt động',0,1,'2016-04-25 16:19:35','2016-04-25 16:19:48'),
	(4,1,'tam-nhin-su-menh','Mission & Vision','Tầm nhìn và Sứ mệnh',0,2,'2016-04-25 16:21:26',NULL),
	(5,1,'nhan-vien-issiloo','Our employees','Nhân viên tại ISSILOO',0,3,'2016-04-25 16:22:26',NULL),
	(6,1,'hanh-trinh-issiloo','An advanture','Hành trình ISSILOO',0,4,'2016-04-25 16:23:06',NULL),
	(7,18,'tin-tuc','News & Events','Tin tức và Sự kiện',1,0,'2016-04-25 16:23:54','2016-04-25 17:29:44'),
	(8,18,'chia-se-hinh-anh-video','Sharing','Góc chia sẻ',1,1,'2016-04-25 16:24:52','2016-04-25 17:33:12'),
	(9,NULL,'hanh-trang-du-hoc','Tips for study abroad','Hành trang du học',0,0,'2016-04-25 16:27:52',NULL),
	(10,NULL,'du-hoc','Study abroad','Du học',1,2,'2016-04-25 16:28:56','2016-04-25 17:32:33'),
	(11,10,'du-hoc-han-quoc','Study in Korea','Du học Hàn Quốc',1,0,'2016-04-25 16:36:25','2016-04-25 17:30:17'),
	(12,11,'du-hoc-tai-truong-cao-dang-koguryeo','Study at Koguryeo','Du học tại Koguryeo',1,0,'2016-04-25 16:38:31','2016-04-25 17:30:30'),
	(13,NULL,'hoc-tieng-han','Learning korean','Học tiếng hàn',0,0,'2016-04-25 16:39:10',NULL),
	(14,NULL,'trung-tam-han-ngu','Korean center','Trung tâm Hàn ngữ',1,3,'2016-04-25 16:39:47','2016-04-25 17:32:43'),
	(15,14,'chuong-trinh-dao-tao','Programmers','Chương trình đào tạo',1,0,'2016-04-25 16:40:16','2016-04-25 17:30:31'),
	(16,14,'thoi-khoa-bieu','Schedule','Thời khoá biểu',1,1,'2016-04-25 16:40:42','2016-04-25 17:30:33'),
	(17,NULL,'trang-chu','Homepage','Trang chủ',1,0,'2016-04-25 17:28:53','2016-04-25 17:29:05'),
	(18,NULL,'tin-tuc','News','Tin tức',1,4,'2016-04-25 17:29:38','2016-04-25 17:32:53'),
	(19,18,'hoi-dap-du-hoc','FAQs','Hỏi đáp',1,2,'2016-04-25 17:31:06','2016-04-25 17:33:06'),
	(20,NULL,'lien-he','Contact us','Liên hệ',1,5,'2016-04-25 17:32:06','2016-04-25 17:33:01');

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
