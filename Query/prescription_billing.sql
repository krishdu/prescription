-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `patient_payment`;
CREATE TABLE `patient_payment` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `pay_dt` date NOT NULL,
  `payment_ref` varchar(30) DEFAULT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `doc_id` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `patient_payment` (`row_id`, `patient_id`, `payment_mode`, `amount`, `pay_dt`, `payment_ref`, `descr`, `chamber_id`, `doc_id`, `created`) VALUES
(1,	6378,	'Cash',	555,	'2020-02-10',	'',	'',	'1',	'1',	'2020-02-15 01:35:37'),
(2,	6378,	'E-Payment',	222,	'2020-02-02',	'rrrrr',	'hhjj',	'1',	'1',	'2020-02-15 01:35:37'),
(3,	6378,	'Cash',	100,	'2020-02-10',	'',	'',	'1',	'1',	'2020-02-15 01:35:37'),
(4,	6378,	'Cash',	111,	'2020-02-10',	'',	'',	'1',	'1',	'2020-02-15 01:35:37');

DROP TABLE IF EXISTS `patient_proc`;
CREATE TABLE `patient_proc` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `proc_name` varchar(100) NOT NULL,
  `proc_details` varchar(100) DEFAULT NULL,
  `proc_charge` int(10) NOT NULL,
  `discount` int(10) NOT NULL DEFAULT '0',
  `chamber_id` varchar(50) DEFAULT NULL,
  `doc_id` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`row_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `patient_proc` (`row_id`, `patient_id`, `proc_name`, `proc_details`, `proc_charge`, `discount`, `chamber_id`, `doc_id`, `created`) VALUES
(1,	6378,	'Consultation',	NULL,	0,	0,	'1',	'1',	'2020-02-15 01:35:58'),
(2,	6378,	'OT-Surgery',	NULL,	100,	1,	'1',	'1',	'2020-02-15 01:35:58'),
(3,	6378,	'Surgery',	'',	1000,	100,	'1',	'1',	'2020-02-15 01:35:58'),
(4,	6378,	'Surgery',	'',	1000,	100,	'1',	'1',	'2020-02-15 01:35:58'),
(5,	6378,	'Consultation',	'test',	100,	1,	'1',	'1',	'2020-02-15 01:35:58'),
(6,	6378,	'OT-Surgery',	'testing',	1000,	100,	'1',	'1',	'2020-02-15 01:35:58'),
(7,	6378,	'Consultation',	'2222222',	876,	7,	'1',	'1',	'2020-02-15 01:35:58'),
(8,	6378,	'Consultation',	'gvg',	555,	0,	'1',	'1',	'2020-02-15 01:35:58'),
(9,	6378,	'Consultation',	'gfx',	555,	88,	'1',	'1',	'2020-02-15 01:35:58'),
(10,	6378,	'Consultation',	'nnnn',	999,	0,	'1',	'1',	'2020-02-15 01:35:58'),
(11,	6378,	'Consultation',	'tesd',	455,	4,	'1',	'1',	'2020-02-15 01:35:58'),
(12,	6378,	'Consultation',	'ghh',	100,	0,	'1',	'1',	'2020-02-15 01:35:58'),
(13,	6378,	'Consultation',	'',	666,	0,	'1',	'1',	'2020-02-15 01:35:58');

-- 2020-02-25 19:11:44
