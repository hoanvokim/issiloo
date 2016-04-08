create database `issiloo`;
use `issiloo`;
CREATE TABLE  `issiloo`.`menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `en_name` varchar(500) NOT NULL DEFAULT '',
  `vn_name` varchar(500) NOT NULL DEFAULT '',
  `parent` int(11) DEFAULT NULL,
  `slug` varchar(30) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE  `issiloo`.`university` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `en_name` varchar(500) DEFAULT NULL,
  `vi_name` varchar(500) DEFAULT NULL,
  `en_desc` varchar(5000) DEFAULT NULL,
  `vn_desc` varchar(5000) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE  `issiloo`.`user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `email` varchar(5000) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE  `issiloo`.`student` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE  `issiloo`.`message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL DEFAULT '',
  `message` varchar(10000) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `issiloo`.`post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `en_name` varchar(1000) NOT NULL DEFAULT '',
  `vi_name` varchar(1000) NOT NULL DEFAULT '',
  `en_content` varchar(9000) DEFAULT NULL,
  `vi_content` varchar(9000) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `issiloo`.`tag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(500) NOT NULL DEFAULT '',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `issiloo`.`taguniversity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `issiloo`.`tagpost` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
