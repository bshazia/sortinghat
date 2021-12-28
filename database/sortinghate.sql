
drop DATABASE if exists `sorting_hat`;
CREATE DATABASE `sorting_hat`;
use sorting_hat;

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
     `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(30) NOT NULL UNIQUE,
    `hobby` text NOT NULL,
  PRIMARY KEY (`id`)
  
) ;

CREATE TABLE IF NOT EXISTS `house` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ;
INSERT INTO `house` (`id`, `house`) VALUES
(1, 'gryffindor'),
(2, 'slytherin'),
(3, 'ravenclaw'),
(4, 'hufflepuff');


DROP TABLE IF EXISTS `pols`;
CREATE TABLE IF NOT EXISTS `pols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house_id`int NOT NULL,
    `profile_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ;

ALTER TABLE pols ADD COLUMN score INT DEFAULT 0;
