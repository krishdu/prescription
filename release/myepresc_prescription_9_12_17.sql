-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2017 at 08:07 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myepresc_prescription_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergy_master`
--

CREATE TABLE IF NOT EXISTS `allergy_master` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(50) NOT NULL,
  `chamber_id` varchar(50) NOT NULL,
  `created_by_user_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(4) NOT NULL DEFAULT '0',
  `ALLERGY_ID` int(10) NOT NULL DEFAULT '0',
  `ALLERGY_NAME` varchar(100) DEFAULT NULL,
  `ENTRY_DATE_TIME` timestamp NULL DEFAULT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`auto_id`),
  KEY `doc_id` (`doc_id`,`chamber_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `chamber_master`
--

CREATE TABLE IF NOT EXISTS `chamber_master` (
  `chamber_master_index_id` int(11) NOT NULL AUTO_INCREMENT,
  `chamber_id` varchar(50) NOT NULL DEFAULT 'anandaclinic',
  `chamber_name` varchar(200) NOT NULL,
  `related_doc_name` varchar(50) NOT NULL,
  `related_rec_name` varchar(50) NOT NULL,
  `chamber_address` varchar(200) NOT NULL,
  `primary_phone_number` varchar(20) NOT NULL,
  `secondary_phone_number` varchar(20) NOT NULL,
  `chamber_header` text NOT NULL,
  `chamber_footer` text NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`chamber_master_index_id`),
  UNIQUE KEY `chamber_id` (`chamber_id`,`related_doc_name`,`related_rec_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `chamber_owner`
--

CREATE TABLE IF NOT EXISTS `chamber_owner` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `chamber_id` varchar(50) NOT NULL,
  `owner_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`auto_id`),
  UNIQUE KEY `chamber_id` (`chamber_id`,`owner_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `clinical_impression`
--

CREATE TABLE IF NOT EXISTS `clinical_impression` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(11) NOT NULL,
  `TYPE` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `ID` (`ID`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4098 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_master`
--

CREATE TABLE IF NOT EXISTS `doctor_master` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `salutation` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `doctor_full_name` varchar(100) NOT NULL,
  `doctor_address` varchar(400) NOT NULL,
  `doctor_degree` text NOT NULL,
  `doctor_affiliation` text NOT NULL,
  `doctor_email` varchar(100) NOT NULL,
  `doctor_mobile` varchar(20) NOT NULL,
  `doctor_secondery_contact` varchar(20) NOT NULL,
  `doc_reg_num` varchar(100) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`doctor_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `dose_details_master`
--

CREATE TABLE IF NOT EXISTS `dose_details_master` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `DOSE_DETAILS_MASTER_ID` int(11) NOT NULL,
  `DOSE_DETAILS` varchar(150) NOT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1026 ;

-- --------------------------------------------------------

--
-- Table structure for table `dose_direction`
--

CREATE TABLE IF NOT EXISTS `dose_direction` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `DOSE_DIRECTION_ID` int(11) NOT NULL,
  `DIRECTION` varchar(30) NOT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `dose_timing_master`
--

CREATE TABLE IF NOT EXISTS `dose_timing_master` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `DOSE_TIMING_ID` int(11) NOT NULL,
  `TIMING` varchar(150) NOT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `investigation_master`
--

CREATE TABLE IF NOT EXISTS `investigation_master` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(11) NOT NULL,
  `investigation_name` varchar(200) NOT NULL,
  `investigation_type` varchar(200) NOT NULL DEFAULT 'TYPE1',
  `unit` varchar(20) NOT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2051 ;

-- --------------------------------------------------------

--
-- Table structure for table `lmp`
--

CREATE TABLE IF NOT EXISTS `lmp` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(50) NOT NULL,
  `chamber_id` varchar(50) NOT NULL,
  `created_by_user_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(4) NOT NULL DEFAULT '0',
  `PRESCRIPTION_ID` int(12) NOT NULL,
  `VISIT_ID` int(12) NOT NULL,
  `PATIENT_ID` int(12) NOT NULL,
  `LMP_DATE` date NOT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `doc_id` (`doc_id`,`chamber_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_master`
--

CREATE TABLE IF NOT EXISTS `medicine_master` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `MEDICINE_ID` int(10) NOT NULL,
  `MEDICINE_NAME` varchar(100) DEFAULT NULL,
  `MEDICINE_DIRECTION` varchar(50) DEFAULT NULL,
  `MEDICINE_ENTRY_DATE_TIME` datetime DEFAULT NULL,
  `MEDICINE_STATUS` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`),
  KEY `MEDICINE_ID` (`MEDICINE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8196 ;

-- --------------------------------------------------------

--
-- Table structure for table `past_medical_history_master`
--

CREATE TABLE IF NOT EXISTS `past_medical_history_master` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(50) NOT NULL,
  `chamber_id` varchar(50) NOT NULL,
  `created_by_user_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(4) NOT NULL DEFAULT '0',
  `ID` int(11) NOT NULL DEFAULT '0',
  `TYPE` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `STATUS` varchar(10) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`auto_id`),
  KEY `doc_id` (`doc_id`,`chamber_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id_auto_num` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) NOT NULL,
  `GENDER` varchar(6) NOT NULL,
  `patient_first_name` varchar(100) NOT NULL,
  `patient_last_name` varchar(100) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_address` varchar(500) DEFAULT NULL,
  `patient_city` varchar(100) DEFAULT NULL,
  `patient_dob` date DEFAULT NULL,
  `age` int(3) NOT NULL,
  `patient_cell_num` varchar(12) NOT NULL,
  `patient_alt_cell_num` varchar(12) DEFAULT NULL,
  `patient_email` varchar(100) DEFAULT NULL,
  `data_entry_date` datetime DEFAULT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`patient_id_auto_num`),
  UNIQUE KEY `patient_first_name` (`patient_first_name`,`patient_dob`,`patient_cell_num`,`chamber_id`,`doc_id`),
  KEY `patient_id` (`patient_id`),
  KEY `chamber_id` (`chamber_id`),
  KEY `doc_id` (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8194 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `patient_by_ci`
--
CREATE TABLE IF NOT EXISTS `patient_by_ci` (
`clinical_impression_id` int(11)
,`prescription_id` int(11)
,`visit_id` int(10)
,`patient_id` int(10)
,`GENDER` varchar(6)
,`patient_first_name` varchar(100)
,`patient_last_name` varchar(100)
,`patient_name` varchar(100)
,`patient_city` varchar(100)
,`patient_dob` date
,`age` int(3)
,`patient_cell_num` varchar(12)
,`data_entry_date` datetime
,`patient_address` varchar(500)
,`patient_email` varchar(100)
,`visit_date` datetime
);
-- --------------------------------------------------------

--
-- Table structure for table `patient_health_details`
--

CREATE TABLE IF NOT EXISTS `patient_health_details` (
  `PATIENT_HEALTH_DETAILS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(11) NOT NULL,
  `VALUE` varchar(50) NOT NULL,
  `VISIT_ID` int(11) NOT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PATIENT_HEALTH_DETAILS_ID`),
  UNIQUE KEY `ID` (`ID`,`VISIT_ID`,`chamber_id`,`doc_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`),
  KEY `ID_2` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131082 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_details_by_receptionist`
--

CREATE TABLE IF NOT EXISTS `patient_health_details_by_receptionist` (
  `patient_id` int(10) DEFAULT NULL,
  `VISIT_ID` int(10) DEFAULT NULL,
  `BP_UP` int(3) DEFAULT NULL,
  `BP_DOWN` int(3) DEFAULT NULL,
  `HEIGHT_IN_CM` int(3) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `BMI` decimal(4,2) DEFAULT NULL,
  `FBS` int(4) DEFAULT NULL,
  `PPBS_PRE_BREAKFAST` int(4) DEFAULT NULL,
  `PPBS_POST_BREAKFAST` int(4) DEFAULT NULL,
  `PPBS_PRE_LUNCH` int(4) DEFAULT NULL,
  `PPBS_POST_LUNCH` int(4) DEFAULT NULL,
  `PPBS_PRE_DINNER` int(4) DEFAULT NULL,
  `PPBS_POST_DINNER` int(4) DEFAULT NULL,
  `TSH` decimal(4,2) DEFAULT NULL,
  `T3` decimal(4,2) DEFAULT NULL,
  `T4` decimal(4,2) DEFAULT NULL,
  `OTHERS` varchar(200) DEFAULT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_health_details_master`
--

CREATE TABLE IF NOT EXISTS `patient_health_details_master` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `STATUS` varchar(40) NOT NULL DEFAULT 'ACTIVE',
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auto_id`),
  UNIQUE KEY `NAME` (`NAME`,`STATUS`,`chamber_id`,`doc_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=261 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_investigation`
--

CREATE TABLE IF NOT EXISTS `patient_investigation` (
  `patient_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `investigation_id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  UNIQUE KEY `patient_id` (`patient_id`,`visit_id`,`investigation_id`,`chamber_id`,`doc_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`),
  KEY `investigation_id` (`investigation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `precribed_medicine`
--

CREATE TABLE IF NOT EXISTS `precribed_medicine` (
  `prescribed_medicine_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `MEDICINE_ID` int(10) NOT NULL,
  `PRESCRIPTION_ID` int(10) DEFAULT NULL,
  `MEDICINE_NAME` varchar(100) DEFAULT NULL,
  `MEDICINE_DIRECTION` varchar(50) DEFAULT NULL,
  `MEDICINE_DOSE` varchar(200) DEFAULT NULL,
  `MEDICINE_TIMING` varchar(50) DEFAULT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`prescribed_medicine_auto_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131076 ;

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_allergy`
--

CREATE TABLE IF NOT EXISTS `prescribed_allergy` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(50) NOT NULL,
  `chamber_id` varchar(50) NOT NULL,
  `created_by_user_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(4) NOT NULL DEFAULT '0',
  `ID` int(11) NOT NULL DEFAULT '0',
  `ALLERGY_ID` int(11) NOT NULL,
  `PRESCRIPTION_ID` int(11) NOT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `doc_id` (`doc_id`,`chamber_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_cf`
--

CREATE TABLE IF NOT EXISTS `prescribed_cf` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `clinical_impression_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `clinical_impression_id` (`clinical_impression_id`),
  KEY `chamber_id` (`chamber_id`),
  KEY `doc_id` (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131075 ;

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_investigation`
--

CREATE TABLE IF NOT EXISTS `prescribed_investigation` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `PRESCRIBED_INVESTIGATION_ID` int(10) NOT NULL,
  `PRESCRIPTION_ID` int(10) DEFAULT NULL,
  `INVESTIGATION_TYPE` varchar(200) DEFAULT NULL,
  `INVESTIGATION_DESCRIPTION` varchar(500) DEFAULT NULL,
  `INVESTIGATION_ID` int(11) NOT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`),
  KEY `PRESCRIBED_INVESTIGATION_ID` (`PRESCRIBED_INVESTIGATION_ID`),
  KEY `PRESCRIPTION_ID` (`PRESCRIPTION_ID`),
  KEY `INVESTIGATION_ID` (`INVESTIGATION_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131073 ;

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_past_med_history`
--

CREATE TABLE IF NOT EXISTS `prescribed_past_med_history` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(50) NOT NULL,
  `chamber_id` varchar(50) NOT NULL,
  `created_by_user_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(4) NOT NULL DEFAULT '0',
  `clinical_impression_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `doc_id` (`doc_id`,`chamber_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_social_history`
--

CREATE TABLE IF NOT EXISTS `prescribed_social_history` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(50) NOT NULL,
  `chamber_id` varchar(50) NOT NULL,
  `created_by_user_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(4) NOT NULL DEFAULT '0',
  `ID` int(11) NOT NULL DEFAULT '0',
  `social_history_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `doc_id` (`doc_id`,`chamber_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `prescription_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `PRESCRIPTION_ID` int(10) NOT NULL,
  `VISIT_ID` int(10) DEFAULT NULL,
  `REFERRED_TO` varchar(100) DEFAULT NULL,
  `DIET` varchar(500) DEFAULT NULL,
  `NEXT_VISIT` varchar(50) DEFAULT NULL,
  `ANY_OTHER_DETAILS` varchar(500) DEFAULT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'DRAFT',
  `NEXT_VISIT_DAY` varchar(100) NOT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`prescription_auto_id`),
  UNIQUE KEY `PRESCRIPTION_ID` (`PRESCRIPTION_ID`,`chamber_id`,`doc_id`),
  KEY `chamber_id` (`chamber_id`),
  KEY `doc_id` (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32770 ;

-- --------------------------------------------------------

--
-- Table structure for table `reception_master`
--

CREATE TABLE IF NOT EXISTS `reception_master` (
  `reception_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `related_doctor_user_name` varchar(50) NOT NULL,
  `receptoin_full_name` varchar(200) NOT NULL,
  `reception_title` varchar(10) NOT NULL DEFAULT '',
  `reception_address` varchar(500) NOT NULL,
  `reception_degree` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reception_master_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `social_history_master`
--

CREATE TABLE IF NOT EXISTS `social_history_master` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(50) NOT NULL,
  `chamber_id` varchar(50) NOT NULL,
  `created_by_user_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(4) NOT NULL DEFAULT '0',
  `ID` int(11) NOT NULL DEFAULT '0',
  `TYPE` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `doc_id` (`doc_id`,`chamber_id`),
  KEY `chamber_id` (`chamber_id`,`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `table 18`
--

CREATE TABLE IF NOT EXISTS `table 18` (
  `COL 1` int(2) DEFAULT NULL,
  `COL 2` varchar(31) DEFAULT NULL,
  `COL 3` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) NOT NULL,
  `user_full_name` varchar(200) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `role` enum('DOCTOR','RECEPTIONIST','ADMIN','PATIENT','USER','CHEMIST') NOT NULL,
  `date_added` datetime NOT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `patient_id` int(10) NOT NULL AUTO_INCREMENT,
  `GENDER` varchar(6) NOT NULL,
  `user_first_name` varchar(100) NOT NULL,
  `user_last_name` varchar(100) NOT NULL,
  `user_address` varchar(500) DEFAULT NULL,
  `user_city` varchar(100) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `age` int(3) NOT NULL,
  `user_cell_num` varchar(12) NOT NULL,
  `user_alt_cell_num` varchar(12) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `visit_auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `VISIT_ID` int(10) NOT NULL,
  `PATIENT_ID` int(10) NOT NULL,
  `VISIT_DATE` datetime DEFAULT NULL,
  `APPOINTMENT_TO_DOC_NAME` varchar(100) DEFAULT NULL,
  `VISITED` enum('no','yes','cancel') NOT NULL,
  `chamber_id` varchar(50) DEFAULT NULL,
  `created_by_user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isSync` tinyint(1) NOT NULL DEFAULT '0',
  `doc_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`visit_auto_id`),
  UNIQUE KEY `VISIT_ID` (`VISIT_ID`,`PATIENT_ID`,`chamber_id`,`doc_id`),
  KEY `PATIENT_ID` (`PATIENT_ID`),
  KEY `VISITED` (`VISITED`),
  KEY `chamber_id` (`chamber_id`),
  KEY `doc_id` (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32771 ;

-- --------------------------------------------------------

--
-- Structure for view `patient_by_ci`
--
DROP TABLE IF EXISTS `patient_by_ci`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `patient_by_ci` AS select `a`.`clinical_impression_id` AS `clinical_impression_id`,`a`.`prescription_id` AS `prescription_id`,`b`.`VISIT_ID` AS `visit_id`,`c`.`PATIENT_ID` AS `patient_id`,`d`.`GENDER` AS `GENDER`,`d`.`patient_first_name` AS `patient_first_name`,`d`.`patient_last_name` AS `patient_last_name`,`d`.`patient_name` AS `patient_name`,`d`.`patient_city` AS `patient_city`,`d`.`patient_dob` AS `patient_dob`,`d`.`age` AS `age`,`d`.`patient_cell_num` AS `patient_cell_num`,`d`.`data_entry_date` AS `data_entry_date`,`d`.`patient_address` AS `patient_address`,`d`.`patient_email` AS `patient_email`,`c`.`VISIT_DATE` AS `visit_date` from ((((`prescribed_cf` `a` join `prescription` `b`) join `visit` `c`) join `patient` `d`) join `clinical_impression` `e`) where ((`e`.`ID` = `a`.`clinical_impression_id`) and (`a`.`prescription_id` = `b`.`PRESCRIPTION_ID`) and (`b`.`VISIT_ID` = `c`.`VISIT_ID`) and (`c`.`PATIENT_ID` = `d`.`patient_id`) and (`a`.`doc_id` = `e`.`doc_id`) and (`a`.`chamber_id` = `e`.`chamber_id`) and (`a`.`chamber_id` = 'anandaclinic') and (`a`.`doc_id` = 'dsanyal')) order by `d`.`patient_first_name`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chamber_owner`
--
ALTER TABLE `chamber_owner`
  ADD CONSTRAINT `chamber_owner_ibfk_1` FOREIGN KEY (`chamber_id`) REFERENCES `chamber_master` (`chamber_id`),
  ADD CONSTRAINT `chamber_owner_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_name`);

--
-- Constraints for table `doctor_master`
--
ALTER TABLE `doctor_master`
  ADD CONSTRAINT `doctor_master_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user` (`user_name`);
