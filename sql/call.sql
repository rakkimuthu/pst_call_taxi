-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` char(100) NOT NULL,
  `phone_no` bigint(50) NOT NULL,
  `address` varchar(256) NOT NULL,
  `balance_amount` varchar(256) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `customer_income`;
CREATE TABLE `customer_income` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) DEFAULT NULL,
  `customer_id` int(20) DEFAULT NULL,
  `receiving_amount` int(10) DEFAULT NULL,
  `discount_amount` int(10) DEFAULT NULL,
  `income_id` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `expenses`;
CREATE TABLE `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `expense` (`expense`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `expense_entry`;
CREATE TABLE `expense_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `vehicle_number` int(11) DEFAULT NULL,
  `expense` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `expense` (`expense`),
  KEY `vehicle_number` (`vehicle_number`),
  CONSTRAINT `expense_entry_ibfk_1` FOREIGN KEY (`expense`) REFERENCES `expenses` (`id`),
  CONSTRAINT `expense_entry_ibfk_2` FOREIGN KEY (`vehicle_number`) REFERENCES `vehicles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `halt_entry`;
CREATE TABLE `halt_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(30) DEFAULT NULL,
  `vehicle_no` int(5) DEFAULT NULL,
  `manager_name` varchar(100) DEFAULT NULL,
  `operator_name` varchar(100) DEFAULT NULL,
  `helper_name` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `vehicle_no` (`vehicle_no`),
  CONSTRAINT `halt_entry_ibfk_1` FOREIGN KEY (`vehicle_no`) REFERENCES `vehicles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `income`;
CREATE TABLE `income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `vehicle_number` int(10) DEFAULT NULL,
  `receiving_amount` int(10) DEFAULT NULL,
  `discount_amount` int(10) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `monthly_running_entry`;
CREATE TABLE `monthly_running_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_date` varchar(50) DEFAULT NULL,
  `to_date` varchar(50) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `catagories` varchar(20) DEFAULT NULL,
  `loading` varchar(20) DEFAULT NULL,
  `staffs_id` varchar(10000) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `halt` varchar(1000) DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `total_amount_per_day` int(11) DEFAULT NULL,
  `batta_amount` int(11) DEFAULT NULL,
  `starting_time` varchar(10) DEFAULT NULL,
  `ending_time` varchar(10) DEFAULT NULL,
  `working_hours` varchar(10) DEFAULT NULL,
  `advance_payment` int(11) DEFAULT NULL,
  `bill_amount` int(11) DEFAULT NULL,
  `balance_amount` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `monthly_running_entry_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`),
  CONSTRAINT `monthly_running_entry_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `running_entry`;
CREATE TABLE `running_entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(30) DEFAULT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `vehicle_number` varchar(50) DEFAULT NULL,
  `operator_name` varchar(50) DEFAULT NULL,
  `helper_name` varchar(50) DEFAULT NULL,
  `manager_name` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `catagories` varchar(20) DEFAULT NULL,
  `loading` varchar(20) DEFAULT NULL,
  `working_time_known` varchar(10) DEFAULT '',
  `starting_time` varchar(10) DEFAULT NULL,
  `ending_time` varchar(10) DEFAULT NULL,
  `working_hour` varchar(10) DEFAULT NULL,
  `rate` varchar(10) DEFAULT NULL,
  `batta` varchar(10) DEFAULT NULL,
  `Shift_rent` varchar(10) DEFAULT NULL,
  `advance_payment` varchar(10) DEFAULT NULL,
  `bill_amount` varchar(10) DEFAULT NULL,
  `balance_amount` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `staffs`;
CREATE TABLE `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(100) DEFAULT NULL,
  `phone_no` bigint(50) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `catagory` varchar(100) DEFAULT NULL,
  `proof` varchar(100) DEFAULT NULL,
  `document` varchar(100) DEFAULT NULL,
  `joining_date` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `staff_salary`;
CREATE TABLE `staff_salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `vehicle_number` int(10) DEFAULT NULL,
  `salary_amount` int(10) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_number` varchar(50) DEFAULT NULL,
  `model_number` varchar(50) DEFAULT NULL,
  `insurance` varchar(50) DEFAULT NULL,
  `fc_renewal` varchar(50) DEFAULT NULL,
  `tax_date` varchar(50) DEFAULT NULL,
  `remain_date` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2018-03-05 15:20:23
