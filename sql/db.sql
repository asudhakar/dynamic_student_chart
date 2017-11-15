-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `marks`;
CREATE TABLE `marks` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` int(255) DEFAULT NULL,
  `maths` int(255) DEFAULT NULL,
  `physics` int(255) DEFAULT NULL,
  `chemistry` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `marks` (`id`, `student_id`, `maths`, `physics`, `chemistry`) VALUES
(1,	1,	50,	60,	70),
(2,	2,	100,	90,	99);

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `students` (`id`, `student_name`, `class`, `phonenumber`) VALUES
(1,	'Sudhakar',	'I',	'9842972047'),
(2,	'Saravanan',	'I',	'9042909287'),
(3,	'mohan',	'II',	'9092473334');

-- 2017-11-15 16:57:21