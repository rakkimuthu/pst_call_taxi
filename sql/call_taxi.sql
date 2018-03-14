-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `customer` (`id`, `customer_name`, `phone_number`) VALUES
(13,	'Ragupathi',	'a:2:{i:0;s:10:\"8526462226\";i:1;s:10:\"8526462229\";}');

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE `drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `vehicle_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicle_id` (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `drivers` (`id`, `driver_name`, `phone_number`, `vehicle_id`) VALUES
(4,	'Ragupathi',	'8526462226',	'4');

DROP TABLE IF EXISTS `pricing_master`;
CREATE TABLE `pricing_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vechicle_id` int(11) DEFAULT NULL,
  `1|20` varchar(255) DEFAULT NULL,
  `2|20` varchar(255) DEFAULT NULL,
  `3|20` varchar(255) DEFAULT NULL,
  `4|20` varchar(255) DEFAULT NULL,
  `5|20` varchar(255) DEFAULT NULL,
  `6|20` varchar(255) DEFAULT NULL,
  `7|20` varchar(255) DEFAULT NULL,
  `8|20` varchar(255) DEFAULT NULL,
  `9|20` varchar(255) DEFAULT NULL,
  `10|20` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pricing_master` (`id`, `vechicle_id`, `1|20`, `2|20`, `3|20`, `4|20`, `5|20`, `6|20`, `7|20`, `8|20`, `9|20`, `10|20`) VALUES
(1,	2,	'10',	'15',	'20',	'406',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(2,	3,	'10',	'20',	'30',	'40',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(3,	4,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'');

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_number` varchar(50) DEFAULT NULL,
  `model_number` varchar(50) DEFAULT NULL,
  `insurance` varchar(50) DEFAULT NULL,
  `fc_renewal` varchar(50) DEFAULT NULL,
  `tax_date` varchar(50) DEFAULT NULL,
  `rc_date` varchar(50) DEFAULT NULL,
  `remain_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `vehicles` (`id`, `vehicle_number`, `model_number`, `insurance`, `fc_renewal`, `tax_date`, `rc_date`, `remain_date`) VALUES
(4,	'TN 27 D3091',	'TVS',	'2019-06-20',	'2018-06-20',	'2018-06-20',	'2018-06-20',	'10');

-- 2018-03-14 09:50:09
