/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.28-MariaDB : Database - group_chat_application
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`group_chat_application` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `group_chat_application`;

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message_time` varchar(200) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `messages` */

insert  into `messages`(`message_id`,`message`,`user_id`,`message_time`,`status`) values 
(1,'Hello',1,'1692109553',NULL),
(2,'Hello World',1,'1692109563',NULL),
(3,'Hello Azhar',2,'1692111009',NULL),
(4,'hey',1,'1692112620',NULL),
(5,'hello friends',5,'1692115208',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `is_online` enum('0','1') DEFAULT '0',
  `img_name` varchar(200) DEFAULT NULL,
  `img_path` varchar(200) DEFAULT NULL,
  `log_time` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`user_id`,`first_name`,`last_name`,`email`,`password`,`is_online`,`img_name`,`img_path`,`log_time`) values 
(1,'Azhar','Ali','azhar12@gmail.com','azhar','0','3.png','Images/1692101023_3.png',NULL),
(2,'Roshan','Ahmed','roshan12@gmail.com','roshan','0','1.png','Images/1692110832_1.png',NULL),
(3,'Aleena','Qureshi','aleen12@gmail.com','aleena','0','4.png','Images/1692113160_4.png',NULL),
(4,'Iqra','Khan','iqra12@gmail.com','iqra','0','5.png','Images/1692113864_5.png',NULL),
(5,'Rowaiba','Ali','rowaiba@gmail.com','rowaiba','0','6.png','Images/1692113903_6.png',NULL),
(6,'Kashif','Shaikh','kashif12@gmail.com','kashif','0','2.png','Images/1692114133_2.png',NULL),
(7,'Ubaid','Soomro','ubaid12@gmail.com','ubaid','0','7.png','Images/1692114163_7.png',NULL),
(8,'Shahbaz','Shah','shahbaz12@gmail.com','shahbaz','1','8.png','Images/1692114185_8.png',NULL),
(9,'Javeria','Irfan','javeria12@gmail.com','javeria','0','4.png','Images/1692114264_4.png',NULL),
(10,'Sarim','Ali','sarim12@gmail.com','sarim','0','2.png','Images/1692114289_2.png',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
