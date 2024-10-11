-- Adminer 4.8.1 MySQL 10.4.34-MariaDB-1:10.4.34+maria~ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `appionments`;
CREATE TABLE `appionments` (
  `appionment_id` int(50) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `center_id` int(50) NOT NULL,
  PRIMARY KEY (`appionment_id`),
  KEY `medicalcenter_appionments` (`center_id`),
  CONSTRAINT `medicalcenter_appionments` FOREIGN KEY (`center_id`) REFERENCES `medicalcenter` (`center_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `drug`;
CREATE TABLE `drug` (
  `drug_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantityonhand` varchar(100) NOT NULL,
  `reorderlevel` varchar(100) NOT NULL,
  `perunitvalue` varchar(100) NOT NULL,
  `totalvalue` varchar(100) NOT NULL,
  `center_id` int(50) NOT NULL,
  PRIMARY KEY (`drug_id`),
  KEY `medicalcenter_drug` (`center_id`),
  CONSTRAINT `medicalcenter_drug` FOREIGN KEY (`center_id`) REFERENCES `medicalcenter` (`center_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `drugorder`;
CREATE TABLE `drugorder` (
  `order_id` int(50) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) NOT NULL,
  `center_id` int(50) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `medicalcenter_drugorder` (`center_id`),
  CONSTRAINT `medicalcenter_drugorder` FOREIGN KEY (`center_id`) REFERENCES `medicalcenter` (`center_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `medicalcenter`;
CREATE TABLE `medicalcenter` (
  `center_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`center_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `medicalcenter` (`center_id`, `name`, `location`) VALUES
(1,	'First Care Medical Center',	'Pagadian City, Zamboanga Peninsula, Philippines'),
(2,	'St. John Hospital',	'Manila, Metro Manila, Philippines'),
(3,	'Makati Medical Center',	'Makati, Metro Manila, Philippines'),
(4,	'Cebu Doctors University Hospital',	'Cebu City, Cebu, Philippines');

DROP TABLE IF EXISTS `medicalpersonnel`;
CREATE TABLE `medicalpersonnel` (
  `medicalpersonnel_id` int(50) NOT NULL AUTO_INCREMENT,
  `personnel_id` int(50) NOT NULL,
  `center_id` int(50) NOT NULL,
  PRIMARY KEY (`medicalpersonnel_id`),
  KEY `personnel_medicalpersonnel` (`personnel_id`),
  KEY `medicalcenter_medicalpersonnel` (`center_id`),
  CONSTRAINT `medicalcenter_medicalpersonnel` FOREIGN KEY (`center_id`) REFERENCES `medicalcenter` (`center_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `personnel_medicalpersonnel` FOREIGN KEY (`personnel_id`) REFERENCES `personnel` (`personnel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients` (
  `patient_id` int(50) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dateofbirth` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `appionment_id` int(50) NOT NULL,
  PRIMARY KEY (`patient_id`),
  KEY `appionments_patients` (`appionment_id`),
  CONSTRAINT `appionments_patients` FOREIGN KEY (`appionment_id`) REFERENCES `appionments` (`appionment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `personnel`;
CREATE TABLE `personnel` (
  `personnel_id` int(50) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `specialty` varchar(100) NOT NULL,
  PRIMARY KEY (`personnel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `personnel` (`personnel_id`, `lastname`, `firstname`, `role`, `specialty`) VALUES
(1,	'Doe',	'John',	'Doctor',	'General Medicine'),
(2,	'Smith',	'Jane',	'Nurse',	'Pediatrics'),
(3,	'Lee',	'David',	'Pharmacist',	'Pharmacy'),
(4,	'Brown',	'Emily',	'Lab Technician',	'Laboratory'),
(5,	'Johnson',	'Michael',	'Radiologist',	'Radiology'),
(6,	'Williams',	'Sarah',	'Surgeon',	'General Surgery'),
(7,	'Jones',	'Christopher',	'Therapist',	'Physical Therapy'),
(8,	'Taylor',	'Ashley',	'Administrator',	'Administration'),
(9,	'Clark',	'Matthew',	'Receptionist',	'Reception'),
(10,	'Harris',	'Jennifer',	'Dental Hygienist',	'Dentistry'),
(11,	'Wilson',	'Thomas',	'Medical Assistant',	'Medical Assistance'),
(12,	'Baker',	'Nicole',	'Dietician',	'Nutrition'),
(13,	'Carter',	'Daniel',	'Anesthesiologist',	'Anesthesiology'),
(14,	'Rogers',	'Elizabeth',	'Cardiologist',	'Cardiology'),
(15,	'Hill',	'Joshua',	'Neurologist',	'Neurology');

DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE `prescriptions` (
  `prescription_id` int(50) NOT NULL AUTO_INCREMENT,
  `quantity` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `appionment_id` int(50) NOT NULL,
  PRIMARY KEY (`prescription_id`),
  KEY `appionments_prescriptions` (`appionment_id`),
  CONSTRAINT `appionments_prescriptions` FOREIGN KEY (`appionment_id`) REFERENCES `appionments` (`appionment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `vendor`;
CREATE TABLE `vendor` (
  `vendor_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `order_id` int(50) NOT NULL,
  PRIMARY KEY (`vendor_id`),
  KEY `drugorder_vendor` (`order_id`),
  CONSTRAINT `drugorder_vendor` FOREIGN KEY (`order_id`) REFERENCES `drugorder` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- 2024-10-11 08:47:29
