# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.10-MariaDB)
# Database: issiloo
# Generation Time: 2016-04-27 08:48:32 +0000
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

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;

INSERT INTO `gallery` (`id`, `img_src`, `type`, `en_title`, `vi_title`, `created_date`, `updated_date`)
VALUES
	(1,'../assets/upload/images/university/kugo0.jpg','university','kugoryeo','kugoryeo','2016-04-27 15:42:36','2016-04-27 15:45:05'),
	(2,'../assets/upload/images/university/kugo1.jpg','university','kugoryeo','kugoryeo','2016-04-27 15:42:48','2016-04-27 15:45:30'),
	(3,'../assets/upload/images/university/kugo2.jpg','university','kugoryeo','kugoryeo','2016-04-27 15:42:50','2016-04-27 15:45:30'),
	(4,'../assets/upload/images/university/kugo3.jpg','university','kugoryeo','kugoryeo','2016-04-27 15:42:52','2016-04-27 15:45:31'),
	(5,'../assets/upload/images/university/kugo4.jpg','university','kugoryeo','kugoryeo','2016-04-27 15:42:54','2016-04-27 15:45:32'),
	(6,'../assets/upload/images/university/pusan.jpg','university','pusan','pusan','2016-04-27 15:43:30','2016-04-27 15:45:45'),
	(7,'../assets/upload/images/university/pusan0.jpg','university','pusan','pusan','2016-04-27 15:44:10','2016-04-27 15:45:46'),
	(8,'../assets/upload/images/university/pusan1.jpg','university','pusan','pusan','2016-04-27 15:44:11','2016-04-27 15:45:46'),
	(9,'../assets/upload/images/university/pusan2.jpg','university','pusan','pusan','2016-04-27 15:44:13','2016-04-27 15:45:47'),
	(10,'../assets/upload/images/university/pusan3.jpg','university','pusan','pusan','2016-04-27 15:44:15','2016-04-27 15:45:47'),
	(11,'../assets/upload/images/university/yonsei.jpg','university','yonsei','yonsei','2016-04-27 15:44:33','2016-04-27 15:45:57'),
	(12,'../assets/upload/images/university/yonsei1.jpg','university','yonsei','yonsei','2016-04-27 15:44:48','2016-04-27 15:45:58'),
	(13,'../assets/upload/images/university/yonsei2.jpg','university','yonsei','yonsei','2016-04-27 15:44:53','2016-04-27 15:45:59');

/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`id`, `category_id`, `img_src`, `slug`, `title_header`, `description_header`, `keyword_header`, `en_title`, `vi_title`, `en_content`, `vi_content`, `created_date`, `updated_date`)
VALUES
	(1,11,'../assets/upload/images/news/abc.jpg','du-hoc-tai-han-quoc','Du học tại Hàn Quốc','Du học tại Hàn Quốc','Du học, hàn quốc, issiloo','KR- University DONGGUK (GYEONGJU)','KR- ĐẠI HỌC DONGGUK (GYEONGJU)','<p><strong>1.Giới thiệu về Trường<img class=\" wp-image-3117 aligncenter\" src=\"http://duhocico.edu.vn/wp-content/uploads/2016/01/du-hoc-han-quoc-Dongguk-1.jpg\" alt=\"Du học Hàn Quốc đại học Dongguk\" width=\"316\" height=\"87\" /></strong></p>\n<p style=\"text-align: justify;\"><em><strong>Trường Đại học Dongguk</strong></em> là một trường đại học tư thục lớn tại Hàn Quốc. Trường có cơ sở đào tạo ở Seoul, thành phố Gyeongju, tỉnh bắc Gyeongsang và đặc biệt tại Los Angeles – Hoa Kỳ. Ngoài ra trường còn đang hoạt động hai bệnh viện Tây y và bốn bệnh viện Đông y trong đó bao gồm Y học Hàn Quốc truyền thống.</p>\n<table style=\"height: 104px;\" width=\"361\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"background-color: #dbd0b4;\">\n<p style=\"text-align: center;\"><strong>TRƯỜNG ĐẠI HỌC DONGGUK (GYEONGJU)</strong></p>\n<p style=\"text-align: justify;\"><strong>Địa chỉ:</strong> Dongguk University Gyeongju Campus 123, Dongdae-ro, Gyeongju-si, Gyeongsangbuk-do, Korea 780-714 Tel. 82.54.770.2114.</p>\n<p><strong>Web:</strong> dongguk.ac.kr.</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: justify;\">Được thành lập vào năm 1906, trường đại học Dongguk không chỉ là một trong những trường đại học lâu đời nhất Hàn Quốc mà còn là một trong số ít các trường đại học có bản sắc riêng đó là tín ngưỡng Phật giáo không trộn lẫn. Trải qua thế kỉ 20 đầy biến động, sự tàn phá ác liệt của chiến tranh dường như càng tô đậm thêm bản sắc của trường. Con voi được chọn là linh vật của trường, đây là con vật tượng trưng cho trí tuệ và vận may và cũng bởi lẽ đây là con vật biểu trưng cho sự hiện đại, tiến bộ và năng động của sinh viên trường đại học Dongguk bây giờ và trong tương lai. <img class=\"size-medium wp-image-3118 aligncenter\" src=\"http://duhocico.edu.vn/wp-content/uploads/2016/01/du-hoc-han-quoc-Dongguk-2-350x136.jpg\" alt=\"du-hoc-han-quoc-Dongguk (2)\" width=\"350\" height=\"136\" /></p>\n<p style=\"text-align: justify;\"> Mục tiêu của trường đại học Dongguk là giúp sinh viên sau này có thể nắm giữ được những vị trí chủ chốt trong nền kinh tế toàn cầu. Trường đại học cung cấp cho sinh viên không chỉ kiến thức chuyên ngành chuyên sâu, tầm nhìn chiến lược, kỹ năng phân tích mà còn cả những kỹ năng mềm cần thiết để sinh viên có đủ hành trang cho bản thân vững tin bước vào cuộc sống. Chính vì thế mà trường đại học Dongguk thu hút đông đảo du học sinh trên toàn thế giới với nền giáo dục toàn diện. Để đáp ứng đầy đủ các nhu cầu của sinh viên và thu hút thêm nhiều sinh viên quốc tế trường đại học Dongguk không ngừng cải tiến cơ sơ vật chất hiện đại như: bảo tàng, trung tâm thể hình, phòng học ngoại ngữ, phòng học đa phương tiện, café internet, sân bóng rổ. Theo những khảo sát gần đây, trường đại học Dongguk cũng góp mặt vào danh sách 20 trường đại học tốt nhất Hàn Quốc.</p>\n<p><strong>*Chuyên ngành đào tạo:</strong></p>\n<ul>\n<li><strong>Nhập học thẳng </strong></li>\n</ul>\n<table width=\"672\" align=\"center\">\n<tbody>\n<tr>\n<td width=\"126\"><strong>Đại học thành viên</strong></td>\n<td width=\"126\"><strong>Lĩnh vực</strong></td>\n<td width=\"420\"><strong>Khoa</strong></td>\n</tr>\n<tr>\n<td rowspan=\"3\" width=\"126\"><strong>Phật học và Văn hóa</strong></td>\n<td rowspan=\"2\" width=\"126\"><strong>Nhân học</strong></td>\n<td width=\"420\">Nghiên cứu Phật giáo</td>\n</tr>\n<tr>\n<td width=\"420\">Giáo dục và chăm sóc trẻ em trong Phật giáo</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Nghệ thuật</strong></td>\n<td width=\"420\">Âm nhạc truyền thống Hàn Quốc</td>\n</tr>\n<tr>\n<td rowspan=\"8\" width=\"126\"><strong>Nhân học</strong></td>\n<td rowspan=\"6\" width=\"126\"><strong>Nhân học</strong></td>\n<td width=\"420\">Ngôn ngữ và văn học Hàn Quốc</td>\n</tr>\n<tr>\n<td width=\"420\">Lịch sử Hàn Quốc</td>\n</tr>\n<tr>\n<td width=\"420\">Lịch sử ngành nghệ thuật và khảo cổ học</td>\n</tr>\n<tr>\n<td width=\"420\">Ngôn ngữ và văn học Anh</td>\n</tr>\n<tr>\n<td width=\"420\">Ngôn ngữ và văn học Nhật Bản</td>\n</tr>\n<tr>\n<td width=\"420\">Ngôn ngữ và văn học Trung Quốc</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Nghệ thuật</strong></td>\n<td width=\"420\">Nghệ thuật</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Thể dục</strong></td>\n<td width=\"420\">Giáo dục thể chất</td>\n</tr>\n<tr>\n<td rowspan=\"9\" width=\"126\"><strong>Khoa học tự nhiên</strong></td>\n<td rowspan=\"3\" width=\"126\"><strong>Khoa học tự nhiên</strong></td>\n<td width=\"420\">Nghiên cứu sản phẩm – hóa học</td>\n</tr>\n<tr>\n<td width=\"420\">Nghiên cứu dược vi sinh (Medical Bioscience)</td>\n</tr>\n<tr>\n<td width=\"420\">Ứng dụng thống kê</td>\n</tr>\n<tr>\n<td rowspan=\"5\" width=\"126\"><strong>Kỹ thuật</strong></td>\n<td width=\"420\">Kỹ thuật máy tính</td>\n</tr>\n<tr>\n<td width=\"420\">Kỹ thuật thông tin điện tử</td>\n</tr>\n<tr>\n<td width=\"420\">Nghiên cứu năng lượng hạt nhân</td>\n</tr>\n<tr>\n<td width=\"420\">Kỹ thuật cơ khí</td>\n</tr>\n<tr>\n<td width=\"420\">Kỹ thuật an toàn</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Khoa học tự nhiên</strong></td>\n<td width=\"420\">Thiết kế quy hoạch</td>\n</tr>\n<tr>\n<td rowspan=\"4\" width=\"126\"><strong>Khoa học xã hội</strong></td>\n<td rowspan=\"4\" width=\"126\"><strong>Khoa học xã hội</strong></td>\n<td width=\"420\">Vấn đề quần chúng và sự quản lý của cảnh sát</td>\n</tr>\n<tr>\n<td width=\"420\">Phúc lợi xã hội</td>\n</tr>\n<tr>\n<td width=\"420\">Kinh tế và thương mại toàn cầu</td>\n</tr>\n<tr>\n<td width=\"420\">Quản lý khách sạn và du lịch</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Quản lý</strong></td>\n<td width=\"126\"><strong>Khoa học xã hội</strong></td>\n<td width=\"420\">Quản lý kinh doanh</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Đại học PARAMITA</strong></td>\n<td width=\"126\"><strong>Nhân học</strong></td>\n<td width=\"420\">Không chọn được chuyên ngành</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: justify;\"><em>*Học sinh mới đăng ký vào tất cả khóa học và ngành học chính không lien quan đến Âm nhạc truyền thống Hàn Quốc, nghệ thuật, giáo dục thể chất bắt buộc phải tham gia khóa hướng nghiệp để tìm kiếm đam mê và sẽ đăng ký vào chuyên ngành khi sang năm hai.</em></p>\n<ul>\n<li><strong>Chuyển tiếp</strong><strong>:</strong></li>\n</ul>\n<table width=\"678\" align=\"center\">\n<tbody>\n<tr>\n<td width=\"120\"><strong>Đại học thành viên</strong></td>\n<td width=\"119\"><strong>Lĩnh vực</strong></td>\n<td width=\"439\"><strong>Khoa (chuyên ngành)</strong></td>\n</tr>\n<tr>\n<td rowspan=\"4\" width=\"120\"><strong>Phật học và văn hóa</strong></td>\n<td rowspan=\"2\" width=\"119\"><strong>Nhân học</strong></td>\n<td width=\"439\">Nghiên cứu Phật giáo và Seon</td>\n</tr>\n<tr>\n<td width=\"439\">Nghiên cứu trẻ em trong Phật giáo</td>\n</tr>\n<tr>\n<td rowspan=\"2\" width=\"119\"><strong>Nghệ thuật</strong></td>\n<td width=\"439\">Âm nhạc truyền thống Hàn Quốc</td>\n</tr>\n<tr>\n<td width=\"439\">Vẽ, Thiết kế (formative design), Kiến trúc truyền thống Hàn Quốc *</td>\n</tr>\n<tr>\n<td rowspan=\"6\" width=\"120\"><strong>Nhân học</strong></td>\n<td rowspan=\"4\" width=\"119\"><strong>Nhân học</strong></td>\n<td width=\"439\">Ngôn ngữ và văn học Hàn quốc, Văn học Trung Quốc, Lịch sử Hàn Quốc, Lịch sử nghệ thuật và khảo cổ học, Xu hướng văn hóa và nghệ thuật *</td>\n</tr>\n<tr>\n<td width=\"439\">Ngôn ngữ và văn học Anh</td>\n</tr>\n<tr>\n<td width=\"439\">Ngôn ngữ và văn học Nhật Bản</td>\n</tr>\n<tr>\n<td width=\"439\">Ngôn ngữ và văn học Trung Quốc</td>\n</tr>\n<tr>\n<td width=\"119\"><strong>Nghệ thuật</strong></td>\n<td width=\"439\">Nghệ thuật vẽ, thiết kễ mẫu và hình ảnh</td>\n</tr>\n<tr>\n<td width=\"119\"><strong>Thể dục</strong></td>\n<td width=\"439\">Vận động viên thể thao</td>\n</tr>\n<tr>\n<td rowspan=\"5\" width=\"120\"><strong>Khoa học và công nghệ</strong></td>\n<td width=\"119\"><strong>Khoa học xã hội</strong></td>\n<td width=\"439\">Khoa học cuộc sống và công nghệ sinh học</td>\n</tr>\n<tr>\n<td width=\"119\"><strong>Khoa học xã hội/Kỹ thuật</strong></td>\n<td width=\"439\">Công nghệ mới – Hóa học , biểu diễn thống kê, Kỹ thuật đảm bảo an toàn</td>\n</tr>\n<tr>\n<td rowspan=\"2\" width=\"119\"><strong>Kỹ thuật</strong></td>\n<td width=\"439\">Kỹ thuật thông tin điện tử</td>\n</tr>\n<tr>\n<td width=\"439\">Kỹ thuật máy tính</td>\n</tr>\n<tr>\n<td width=\"119\"><strong>Khoa học tự nhiên</strong></td>\n<td width=\"439\">Thiết kế quy hoạch</td>\n</tr>\n<tr>\n<td width=\"120\"><strong>Năng lượng – Môi trường</strong></td>\n<td width=\"119\"><strong>Kỹ thuật</strong></td>\n<td width=\"439\">Năng lượng hạt nhân – Kỹ thuật năng lượng</td>\n</tr>\n<tr>\n<td rowspan=\"2\" width=\"120\"><strong>Xã hội học</strong></td>\n<td rowspan=\"2\" width=\"119\"><strong>Khoa học xã hội</strong></td>\n<td width=\"439\">Quản lý xã hội, chính trị, ngoại giao, công an*</td>\n</tr>\n<tr>\n<td width=\"439\">Phúc lợi xã hội</td>\n</tr>\n<tr>\n<td rowspan=\"2\" width=\"120\"><strong>Quản lý du lịch</strong></td>\n<td rowspan=\"2\" width=\"119\"><strong>Khoa học xã hội</strong></td>\n<td width=\"439\">Kinh tế, thương mại quốc tế, quản lý, kế toán, quản lý thông tin</td>\n</tr>\n<tr>\n<td width=\"439\">Du lịch và giải trí, Du lịch và quy tắc quản lý, Quản lý thực phẩm và đồ uống</td>\n</tr>\n</tbody>\n</table>\n<p><em>Lưu ý: Chuyên ngành với dấu * không dành cho học sinh chuyển tiếp</em><strong><br />\n</strong></p>\n<p><strong>2.Học phí</strong></p>\n<ul>\n<li>Chương trình học tiếng Hàn: $2.000/ 1 học kỳ (20 tuần)</li>\n<li>Đại học: $3.000 &#8211; $4.000/ học kỳ (16 tuần)</li>\n<li>Cao học: $4.000 – 5.000 / học kỳ (16 tuần)</li>\n</ul>\n<p><strong>3.Kí túc xá</strong></p>\n<table align=\"center\">\n<tbody>\n<tr>\n<td width=\"121\"><strong>Chương trình</strong></td>\n<td width=\"84\"><strong>Loại</strong></td>\n<td width=\"264\"><strong>Trang thiết bị</strong></td>\n<td width=\"191\"><strong>Chi phí</strong></td>\n</tr>\n<tr>\n<td width=\"121\"><strong>Học tiếng Hàn</strong></td>\n<td width=\"84\"><strong>Phòng 3</strong></td>\n<td width=\"264\">Giường, bàn học, ghế, tử sách, tủ áo quần (riêng), điện thoại bàn, phòng tắm, phòng vệ sinh (chung), điện nước, internet.</td>\n<td width=\"191\">$ 1.300/ học kỳ bao gồm 3 bữa ăn trong ngày ngoại trừ cuối tuần</td>\n</tr>\n<tr>\n<td width=\"121\"><strong>Đại học và Cao học</strong></td>\n<td width=\"84\"><strong>Phòng đôi</strong></td>\n<td width=\"264\">Giường, bàn học, ghế, tử sách, tủ áo quần, phòng tắm, phòng vệ sinh (riêng), điện thoại bàn</td>\n<td width=\"191\">$ 1.000 &#8211; 1.300/ học kỳ bao gồm 3 bữa ăn trong ngày ngoại trừ cuối tuần</td>\n</tr>\n<tr>\n<td width=\"121\"><strong> </strong></td>\n<td width=\"84\"><strong>Phòng ba</strong></td>\n<td width=\"264\">Điện, nước, Internet</p>\n<p>Giường, bàn học, ghế, tử sách, tủ áo quần (riềng)</td>\n<td width=\"191\">$ 1.000/ học kỳ bao gồm 3 bữa ăn trong ngày ngoại trừ cuối tuần.</td>\n</tr>\n</tbody>\n</table>\n<p>&nbsp;</p>\n<p><strong>4.Chương trình tiếng Hàn</strong><strong> </strong></p>\n<table width=\"642\" align=\"center\">\n<tbody>\n<tr>\n<td width=\"298\"><strong>Thời gian</strong></td>\n<td width=\"345\">2 kỳ/ năm ; 1 học kỳ (20 tuần)</td>\n</tr>\n<tr>\n<td width=\"298\"><strong>Phí ghi danh</strong></td>\n<td width=\"345\"> 50 USD</td>\n</tr>\n<tr>\n<td width=\"298\"><strong>Chương trình học</strong></td>\n<td width=\"345\">Trình độ 1 (bắt đầu) – trình độ 6 (nâng cao)</td>\n</tr>\n<tr>\n<td width=\"298\"><strong>Kỳ nhập học tháng</strong></td>\n<td width=\"345\">3,6,9,12</td>\n</tr>\n<tr>\n<td width=\"298\"><strong>Số lượng học viên</strong></td>\n<td width=\"345\">15 học viên/lớp</td>\n</tr>\n<tr>\n<td width=\"298\"><strong>Học phí</strong></td>\n<td width=\"345\">Học phí:  khoảng 4000 USD/ năm</td>\n</tr>\n</tbody>\n</table>\n<p><strong><em> </em></strong></p>\n<p><strong>5. Chi phí phải nộp trước khi xuất cảnh: </strong><em>(tham khảo kỳ trước, số liệu này có thể thay đổi tuỳ từng kỳ nhập học).</em><strong><em> </em></strong></p>\n<table align=\"center\">\n<tbody>\n<tr>\n<td width=\"241\"><strong>CÁC KHOẢN TIỀN</strong></td>\n<td width=\"436\"><strong>SỐ TIỀN (USD)</strong></td>\n</tr>\n<tr>\n<td width=\"241\"><strong>Phí ghi danh</strong></td>\n<td width=\"436\">50</td>\n</tr>\n<tr>\n<td width=\"241\"><strong>Học phí( 1 năm )</strong></td>\n<td width=\"436\">4000</td>\n</tr>\n<tr>\n<td width=\"241\"><strong>Kí túc xá + ăn  ( 1 kỳ)</strong></td>\n<td width=\"436\">1300 USD</td>\n</tr>\n<tr>\n<td width=\"241\"><strong>Bảo hiểm y tế 1 năm</strong></td>\n<td width=\"436\">200 USD</td>\n</tr>\n<tr>\n<td width=\"241\"><strong>Tổng</strong></td>\n<td width=\"436\"><strong>5550</strong></td>\n</tr>\n</tbody>\n</table>','<p><strong>1.Giới thiệu về Trường<img class=\" wp-image-3117 aligncenter\" src=\"http://duhocico.edu.vn/wp-content/uploads/2016/01/du-hoc-han-quoc-Dongguk-1.jpg\" alt=\"Du học Hàn Quốc đại học Dongguk\" width=\"316\" height=\"87\" /></strong></p>\n<p style=\"text-align: justify;\"><em><strong>Trường Đại học Dongguk</strong></em> là một trường đại học tư thục lớn tại Hàn Quốc. Trường có cơ sở đào tạo ở Seoul, thành phố Gyeongju, tỉnh bắc Gyeongsang và đặc biệt tại Los Angeles – Hoa Kỳ. Ngoài ra trường còn đang hoạt động hai bệnh viện Tây y và bốn bệnh viện Đông y trong đó bao gồm Y học Hàn Quốc truyền thống.</p>\n<table style=\"height: 104px;\" width=\"361\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"background-color: #dbd0b4;\">\n<p style=\"text-align: center;\"><strong>TRƯỜNG ĐẠI HỌC DONGGUK (GYEONGJU)</strong></p>\n<p style=\"text-align: justify;\"><strong>Địa chỉ:</strong> Dongguk University Gyeongju Campus 123, Dongdae-ro, Gyeongju-si, Gyeongsangbuk-do, Korea 780-714 Tel. 82.54.770.2114.</p>\n<p><strong>Web:</strong> dongguk.ac.kr.</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: justify;\">Được thành lập vào năm 1906, trường đại học Dongguk không chỉ là một trong những trường đại học lâu đời nhất Hàn Quốc mà còn là một trong số ít các trường đại học có bản sắc riêng đó là tín ngưỡng Phật giáo không trộn lẫn. Trải qua thế kỉ 20 đầy biến động, sự tàn phá ác liệt của chiến tranh dường như càng tô đậm thêm bản sắc của trường. Con voi được chọn là linh vật của trường, đây là con vật tượng trưng cho trí tuệ và vận may và cũng bởi lẽ đây là con vật biểu trưng cho sự hiện đại, tiến bộ và năng động của sinh viên trường đại học Dongguk bây giờ và trong tương lai. <img class=\"size-medium wp-image-3118 aligncenter\" src=\"http://duhocico.edu.vn/wp-content/uploads/2016/01/du-hoc-han-quoc-Dongguk-2-350x136.jpg\" alt=\"du-hoc-han-quoc-Dongguk (2)\" width=\"350\" height=\"136\" /></p>\n<p style=\"text-align: justify;\"> Mục tiêu của trường đại học Dongguk là giúp sinh viên sau này có thể nắm giữ được những vị trí chủ chốt trong nền kinh tế toàn cầu. Trường đại học cung cấp cho sinh viên không chỉ kiến thức chuyên ngành chuyên sâu, tầm nhìn chiến lược, kỹ năng phân tích mà còn cả những kỹ năng mềm cần thiết để sinh viên có đủ hành trang cho bản thân vững tin bước vào cuộc sống. Chính vì thế mà trường đại học Dongguk thu hút đông đảo du học sinh trên toàn thế giới với nền giáo dục toàn diện. Để đáp ứng đầy đủ các nhu cầu của sinh viên và thu hút thêm nhiều sinh viên quốc tế trường đại học Dongguk không ngừng cải tiến cơ sơ vật chất hiện đại như: bảo tàng, trung tâm thể hình, phòng học ngoại ngữ, phòng học đa phương tiện, café internet, sân bóng rổ. Theo những khảo sát gần đây, trường đại học Dongguk cũng góp mặt vào danh sách 20 trường đại học tốt nhất Hàn Quốc.</p>\n<p><strong>*Chuyên ngành đào tạo:</strong></p>\n<ul>\n<li><strong>Nhập học thẳng </strong></li>\n</ul>\n<table width=\"672\" align=\"center\">\n<tbody>\n<tr>\n<td width=\"126\"><strong>Đại học thành viên</strong></td>\n<td width=\"126\"><strong>Lĩnh vực</strong></td>\n<td width=\"420\"><strong>Khoa</strong></td>\n</tr>\n<tr>\n<td rowspan=\"3\" width=\"126\"><strong>Phật học và Văn hóa</strong></td>\n<td rowspan=\"2\" width=\"126\"><strong>Nhân học</strong></td>\n<td width=\"420\">Nghiên cứu Phật giáo</td>\n</tr>\n<tr>\n<td width=\"420\">Giáo dục và chăm sóc trẻ em trong Phật giáo</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Nghệ thuật</strong></td>\n<td width=\"420\">Âm nhạc truyền thống Hàn Quốc</td>\n</tr>\n<tr>\n<td rowspan=\"8\" width=\"126\"><strong>Nhân học</strong></td>\n<td rowspan=\"6\" width=\"126\"><strong>Nhân học</strong></td>\n<td width=\"420\">Ngôn ngữ và văn học Hàn Quốc</td>\n</tr>\n<tr>\n<td width=\"420\">Lịch sử Hàn Quốc</td>\n</tr>\n<tr>\n<td width=\"420\">Lịch sử ngành nghệ thuật và khảo cổ học</td>\n</tr>\n<tr>\n<td width=\"420\">Ngôn ngữ và văn học Anh</td>\n</tr>\n<tr>\n<td width=\"420\">Ngôn ngữ và văn học Nhật Bản</td>\n</tr>\n<tr>\n<td width=\"420\">Ngôn ngữ và văn học Trung Quốc</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Nghệ thuật</strong></td>\n<td width=\"420\">Nghệ thuật</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Thể dục</strong></td>\n<td width=\"420\">Giáo dục thể chất</td>\n</tr>\n<tr>\n<td rowspan=\"9\" width=\"126\"><strong>Khoa học tự nhiên</strong></td>\n<td rowspan=\"3\" width=\"126\"><strong>Khoa học tự nhiên</strong></td>\n<td width=\"420\">Nghiên cứu sản phẩm – hóa học</td>\n</tr>\n<tr>\n<td width=\"420\">Nghiên cứu dược vi sinh (Medical Bioscience)</td>\n</tr>\n<tr>\n<td width=\"420\">Ứng dụng thống kê</td>\n</tr>\n<tr>\n<td rowspan=\"5\" width=\"126\"><strong>Kỹ thuật</strong></td>\n<td width=\"420\">Kỹ thuật máy tính</td>\n</tr>\n<tr>\n<td width=\"420\">Kỹ thuật thông tin điện tử</td>\n</tr>\n<tr>\n<td width=\"420\">Nghiên cứu năng lượng hạt nhân</td>\n</tr>\n<tr>\n<td width=\"420\">Kỹ thuật cơ khí</td>\n</tr>\n<tr>\n<td width=\"420\">Kỹ thuật an toàn</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Khoa học tự nhiên</strong></td>\n<td width=\"420\">Thiết kế quy hoạch</td>\n</tr>\n<tr>\n<td rowspan=\"4\" width=\"126\"><strong>Khoa học xã hội</strong></td>\n<td rowspan=\"4\" width=\"126\"><strong>Khoa học xã hội</strong></td>\n<td width=\"420\">Vấn đề quần chúng và sự quản lý của cảnh sát</td>\n</tr>\n<tr>\n<td width=\"420\">Phúc lợi xã hội</td>\n</tr>\n<tr>\n<td width=\"420\">Kinh tế và thương mại toàn cầu</td>\n</tr>\n<tr>\n<td width=\"420\">Quản lý khách sạn và du lịch</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Quản lý</strong></td>\n<td width=\"126\"><strong>Khoa học xã hội</strong></td>\n<td width=\"420\">Quản lý kinh doanh</td>\n</tr>\n<tr>\n<td width=\"126\"><strong>Đại học PARAMITA</strong></td>\n<td width=\"126\"><strong>Nhân học</strong></td>\n<td width=\"420\">Không chọn được chuyên ngành</td>\n</tr>\n</tbody>\n</table>\n<p style=\"text-align: justify;\"><em>*Học sinh mới đăng ký vào tất cả khóa học và ngành học chính không lien quan đến Âm nhạc truyền thống Hàn Quốc, nghệ thuật, giáo dục thể chất bắt buộc phải tham gia khóa hướng nghiệp để tìm kiếm đam mê và sẽ đăng ký vào chuyên ngành khi sang năm hai.</em></p>\n<ul>\n<li><strong>Chuyển tiếp</strong><strong>:</strong></li>\n</ul>\n<table width=\"678\" align=\"center\">\n<tbody>\n<tr>\n<td width=\"120\"><strong>Đại học thành viên</strong></td>\n<td width=\"119\"><strong>Lĩnh vực</strong></td>\n<td width=\"439\"><strong>Khoa (chuyên ngành)</strong></td>\n</tr>\n<tr>\n<td rowspan=\"4\" width=\"120\"><strong>Phật học và văn hóa</strong></td>\n<td rowspan=\"2\" width=\"119\"><strong>Nhân học</strong></td>\n<td width=\"439\">Nghiên cứu Phật giáo và Seon</td>\n</tr>\n<tr>\n<td width=\"439\">Nghiên cứu trẻ em trong Phật giáo</td>\n</tr>\n<tr>\n<td rowspan=\"2\" width=\"119\"><strong>Nghệ thuật</strong></td>\n<td width=\"439\">Âm nhạc truyền thống Hàn Quốc</td>\n</tr>\n<tr>\n<td width=\"439\">Vẽ, Thiết kế (formative design), Kiến trúc truyền thống Hàn Quốc *</td>\n</tr>\n<tr>\n<td rowspan=\"6\" width=\"120\"><strong>Nhân học</strong></td>\n<td rowspan=\"4\" width=\"119\"><strong>Nhân học</strong></td>\n<td width=\"439\">Ngôn ngữ và văn học Hàn quốc, Văn học Trung Quốc, Lịch sử Hàn Quốc, Lịch sử nghệ thuật và khảo cổ học, Xu hướng văn hóa và nghệ thuật *</td>\n</tr>\n<tr>\n<td width=\"439\">Ngôn ngữ và văn học Anh</td>\n</tr>\n<tr>\n<td width=\"439\">Ngôn ngữ và văn học Nhật Bản</td>\n</tr>\n<tr>\n<td width=\"439\">Ngôn ngữ và văn học Trung Quốc</td>\n</tr>\n<tr>\n<td width=\"119\"><strong>Nghệ thuật</strong></td>\n<td width=\"439\">Nghệ thuật vẽ, thiết kễ mẫu và hình ảnh</td>\n</tr>\n<tr>\n<td width=\"119\"><strong>Thể dục</strong></td>\n<td width=\"439\">Vận động viên thể thao</td>\n</tr>\n<tr>\n<td rowspan=\"5\" width=\"120\"><strong>Khoa học và công nghệ</strong></td>\n<td width=\"119\"><strong>Khoa học xã hội</strong></td>\n<td width=\"439\">Khoa học cuộc sống và công nghệ sinh học</td>\n</tr>\n<tr>\n<td width=\"119\"><strong>Khoa học xã hội/Kỹ thuật</strong></td>\n<td width=\"439\">Công nghệ mới – Hóa học , biểu diễn thống kê, Kỹ thuật đảm bảo an toàn</td>\n</tr>\n<tr>\n<td rowspan=\"2\" width=\"119\"><strong>Kỹ thuật</strong></td>\n<td width=\"439\">Kỹ thuật thông tin điện tử</td>\n</tr>\n<tr>\n<td width=\"439\">Kỹ thuật máy tính</td>\n</tr>\n<tr>\n<td width=\"119\"><strong>Khoa học tự nhiên</strong></td>\n<td width=\"439\">Thiết kế quy hoạch</td>\n</tr>\n<tr>\n<td width=\"120\"><strong>Năng lượng – Môi trường</strong></td>\n<td width=\"119\"><strong>Kỹ thuật</strong></td>\n<td width=\"439\">Năng lượng hạt nhân – Kỹ thuật năng lượng</td>\n</tr>\n<tr>\n<td rowspan=\"2\" width=\"120\"><strong>Xã hội học</strong></td>\n<td rowspan=\"2\" width=\"119\"><strong>Khoa học xã hội</strong></td>\n<td width=\"439\">Quản lý xã hội, chính trị, ngoại giao, công an*</td>\n</tr>\n<tr>\n<td width=\"439\">Phúc lợi xã hội</td>\n</tr>\n<tr>\n<td rowspan=\"2\" width=\"120\"><strong>Quản lý du lịch</strong></td>\n<td rowspan=\"2\" width=\"119\"><strong>Khoa học xã hội</strong></td>\n<td width=\"439\">Kinh tế, thương mại quốc tế, quản lý, kế toán, quản lý thông tin</td>\n</tr>\n<tr>\n<td width=\"439\">Du lịch và giải trí, Du lịch và quy tắc quản lý, Quản lý thực phẩm và đồ uống</td>\n</tr>\n</tbody>\n</table>\n<p><em>Lưu ý: Chuyên ngành với dấu * không dành cho học sinh chuyển tiếp</em><strong><br />\n</strong></p>\n<p><strong>2.Học phí</strong></p>\n<ul>\n<li>Chương trình học tiếng Hàn: $2.000/ 1 học kỳ (20 tuần)</li>\n<li>Đại học: $3.000 &#8211; $4.000/ học kỳ (16 tuần)</li>\n<li>Cao học: $4.000 – 5.000 / học kỳ (16 tuần)</li>\n</ul>\n<p><strong>3.Kí túc xá</strong></p>\n<table align=\"center\">\n<tbody>\n<tr>\n<td width=\"121\"><strong>Chương trình</strong></td>\n<td width=\"84\"><strong>Loại</strong></td>\n<td width=\"264\"><strong>Trang thiết bị</strong></td>\n<td width=\"191\"><strong>Chi phí</strong></td>\n</tr>\n<tr>\n<td width=\"121\"><strong>Học tiếng Hàn</strong></td>\n<td width=\"84\"><strong>Phòng 3</strong></td>\n<td width=\"264\">Giường, bàn học, ghế, tử sách, tủ áo quần (riêng), điện thoại bàn, phòng tắm, phòng vệ sinh (chung), điện nước, internet.</td>\n<td width=\"191\">$ 1.300/ học kỳ bao gồm 3 bữa ăn trong ngày ngoại trừ cuối tuần</td>\n</tr>\n<tr>\n<td width=\"121\"><strong>Đại học và Cao học</strong></td>\n<td width=\"84\"><strong>Phòng đôi</strong></td>\n<td width=\"264\">Giường, bàn học, ghế, tử sách, tủ áo quần, phòng tắm, phòng vệ sinh (riêng), điện thoại bàn</td>\n<td width=\"191\">$ 1.000 &#8211; 1.300/ học kỳ bao gồm 3 bữa ăn trong ngày ngoại trừ cuối tuần</td>\n</tr>\n<tr>\n<td width=\"121\"><strong> </strong></td>\n<td width=\"84\"><strong>Phòng ba</strong></td>\n<td width=\"264\">Điện, nước, Internet</p>\n<p>Giường, bàn học, ghế, tử sách, tủ áo quần (riềng)</td>\n<td width=\"191\">$ 1.000/ học kỳ bao gồm 3 bữa ăn trong ngày ngoại trừ cuối tuần.</td>\n</tr>\n</tbody>\n</table>\n<p>&nbsp;</p>\n<p><strong>4.Chương trình tiếng Hàn</strong><strong> </strong></p>\n<table width=\"642\" align=\"center\">\n<tbody>\n<tr>\n<td width=\"298\"><strong>Thời gian</strong></td>\n<td width=\"345\">2 kỳ/ năm ; 1 học kỳ (20 tuần)</td>\n</tr>\n<tr>\n<td width=\"298\"><strong>Phí ghi danh</strong></td>\n<td width=\"345\"> 50 USD</td>\n</tr>\n<tr>\n<td width=\"298\"><strong>Chương trình học</strong></td>\n<td width=\"345\">Trình độ 1 (bắt đầu) – trình độ 6 (nâng cao)</td>\n</tr>\n<tr>\n<td width=\"298\"><strong>Kỳ nhập học tháng</strong></td>\n<td width=\"345\">3,6,9,12</td>\n</tr>\n<tr>\n<td width=\"298\"><strong>Số lượng học viên</strong></td>\n<td width=\"345\">15 học viên/lớp</td>\n</tr>\n<tr>\n<td width=\"298\"><strong>Học phí</strong></td>\n<td width=\"345\">Học phí:  khoảng 4000 USD/ năm</td>\n</tr>\n</tbody>\n</table>\n<p><strong><em> </em></strong></p>\n<p><strong>5. Chi phí phải nộp trước khi xuất cảnh: </strong><em>(tham khảo kỳ trước, số liệu này có thể thay đổi tuỳ từng kỳ nhập học).</em><strong><em> </em></strong></p>\n<table align=\"center\">\n<tbody>\n<tr>\n<td width=\"241\"><strong>CÁC KHOẢN TIỀN</strong></td>\n<td width=\"436\"><strong>SỐ TIỀN (USD)</strong></td>\n</tr>\n<tr>\n<td width=\"241\"><strong>Phí ghi danh</strong></td>\n<td width=\"436\">50</td>\n</tr>\n<tr>\n<td width=\"241\"><strong>Học phí( 1 năm )</strong></td>\n<td width=\"436\">4000</td>\n</tr>\n<tr>\n<td width=\"241\"><strong>Kí túc xá + ăn  ( 1 kỳ)</strong></td>\n<td width=\"436\">1300 USD</td>\n</tr>\n<tr>\n<td width=\"241\"><strong>Bảo hiểm y tế 1 năm</strong></td>\n<td width=\"436\">200 USD</td>\n</tr>\n<tr>\n<td width=\"241\"><strong>Tổng</strong></td>\n<td width=\"436\"><strong>5550</strong></td>\n</tr>\n</tbody>\n</table>','2016-04-26 15:55:06',NULL);

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;

INSERT INTO `slider` (`id`, `img_src`, `url`, `en_content`, `vi_content`, `created_date`, `updated_date`)
VALUES
	(1,'../assets/upload/images/slider/slider1.jpg',NULL,NULL,NULL,'2016-04-26 15:49:31',NULL),
	(2,'../assets/upload/images/slider/slider2.jpg',NULL,NULL,NULL,'2016-04-26 15:49:36',NULL),
	(3,'../assets/upload/images/slider/slider3.jpg',NULL,NULL,NULL,'2016-04-26 15:49:39','2016-04-26 15:49:46'),
	(4,'../assets/upload/images/slider/slider4.jpg',NULL,NULL,NULL,'2016-04-26 15:49:49','2016-04-26 15:49:54'),
	(5,'../assets/upload/images/slider/slider5.jpg',NULL,NULL,NULL,'2016-04-26 15:49:51','2016-04-26 15:49:59');

/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;

INSERT INTO `tag` (`id`, `name`)
VALUES
	(1,'Du hoc'),
	(2,'Du hoc han quoc'),
	(3,'Du học'),
	(4,'Du học hàn quốc'),
	(5,'Hàn quốc'),
	(6,'trường đại học'),
	(7,'môi trường du học'),
	(8,'DONGGUK'),
	(9,'GYEONGJU');

/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `tagnews` WRITE;
/*!40000 ALTER TABLE `tagnews` DISABLE KEYS */;

INSERT INTO `tagnews` (`id`, `tag_id`, `news_id`)
VALUES
	(1,1,1),
	(2,2,1),
	(3,3,1),
	(4,4,1),
	(5,5,1),
	(6,6,1),
	(7,7,1),
	(8,8,1),
	(9,9,1);

/*!40000 ALTER TABLE `tagnews` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `university` WRITE;
/*!40000 ALTER TABLE `university` DISABLE KEYS */;

INSERT INTO `university` (`id`, `en_title`, `vi_title`, `en_description`, `vi_description`, `url`)
VALUES
	(1,'Koguryeo University','Đại học Koguryeo','Xây dựng một nền tảng giáo dục vững chắc cùng đội ngũ giáo viên tâm\n                                                huyết. Chúng tôi cố gắng mang đến cho bạn một tương lai tươi sáng và\n                                                chắc chắn nhất.','Xây dựng một nền tảng giáo dục vững chắc cùng đội ngũ giáo viên tâm\n                                                huyết. Chúng tôi cố gắng mang đến cho bạn một tương lai tươi sáng và\n                                                chắc chắn nhất.','http://www.koguryeo.com'),
	(2,'Busan University','Đại học Busan','Một trong những lựa chọn tốt nhất của sinh viên việt nam.','Một trong những lựa chọn tốt nhất của sinh viên việt nam.','http://www.busanuniversity.com'),
	(3,'Yonsei University','Đại học Yonsei','Một trong những trường đại học uy tín nhất tại Hàn Quốc.','Một trong những trường đại học uy tín nhất tại Hàn Quốc.','http://www.yonsei.com');

/*!40000 ALTER TABLE `university` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `universityimages` WRITE;
/*!40000 ALTER TABLE `universityimages` DISABLE KEYS */;

INSERT INTO `universityimages` (`id`, `university_id`, `image_id`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,1,3),
	(4,1,4),
	(5,1,5),
	(6,2,6),
	(7,2,7),
	(8,2,8),
	(9,2,9),
	(10,2,10),
	(11,3,11),
	(12,3,12),
	(13,3,13);

/*!40000 ALTER TABLE `universityimages` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `universitynews` WRITE;
/*!40000 ALTER TABLE `universitynews` DISABLE KEYS */;

INSERT INTO `universitynews` (`id`, `university_id`, `news_id`)
VALUES
	(1,1,1),
	(2,2,1),
	(3,3,1);

/*!40000 ALTER TABLE `universitynews` ENABLE KEYS */;
UNLOCK TABLES;


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
