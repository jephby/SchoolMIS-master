-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2016 at 09:28 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissionforms`
--

CREATE TABLE IF NOT EXISTS `admissionforms` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phoneNum` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `Fathers_Name` varchar(45) DEFAULT NULL,
  `Mothers_Name` varchar(45) DEFAULT NULL,
  `Date_Of_Birth` date DEFAULT NULL,
  `SO_Origin` varchar(45) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `lga` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `admissionforms`
--

INSERT INTO `admissionforms` (`idUser`, `firstname`, `lastname`, `address`, `phoneNum`, `email`, `Fathers_Name`, `Mothers_Name`, `Date_Of_Birth`, `SO_Origin`, `class`, `nationality`, `lga`, `image`) VALUES
(1, 'dljd', 'jkdjd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'dljd', 'jkdjd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 's', 'd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'kk', 'kk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'kk', 'kk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'nnn', 'jjj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'nnn', 'nn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'ubfubf', 'ubbfubf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'JEPHTHAH', 'BOBAI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'JEPHTHAH', 'YUSUF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'JEPHTHAH', 'BOBAI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'boby', 'cheng', 'No 8 Afezere Road Utan Jos Plateau State Nige', 2147483647, 'jephby@gmail.com', 'Sholy Usman Yusuf', 'Mercy Usman Yusuf', '0000-00-00', 'Kaduna', 5, 'chad', 'Kaura  ', '666106.jpg'),
(13, 'Yusuf', 'Shehu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contentmaneger`
--

CREATE TABLE IF NOT EXISTS `contentmaneger` (
  `idContentManeger` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(45) DEFAULT NULL,
  `article_content` varchar(2000) DEFAULT NULL,
  `article_timestamp` int(11) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idContentManeger`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `contentmaneger`
--

INSERT INTO `contentmaneger` (`idContentManeger`, `article_title`, `article_content`, `article_timestamp`, `image`) VALUES
(16, 'God with us', 'Strategic planning is key to school success. Schools lose money through manual work, employees and mishandling, therefore it is prudent to use SMS in school activities to minimize such occurrences. Data also is important to the school functions and being kept in an organized manner is also good for record keeping. The school should meet the expectations of the stakeholders. The School uses manual system of recording and storing student information, these includes the use of files, cabinet, white paper form, and files. Both staff and student information could easily get lost, spoilt or totally damaged. If fully implemented, the Web portal will be able to process most of the School activities and implement them with ease. Parent and guardian will have access to their wards progress and upcoming events organized by the school.', 1465061498, '79778.jpg'),
(19, 'EDDY AND HIS TEAM', 'Starting soon, Windows Holographic will be coming to devices of all shapes and sizes â€“ from fully immersive virtual reality to fully untethered holographic computing.\r\n\r\nImagine wearing a VR device and seeing your physical hands as you manipulate an object, working on the scanned 3D image of a real object, or bringing the holographic representation of another person into your virtual world so you can collaborate. This is what we mean by mixed reality â€“ where we break down the barriers between virtual and physical reality.\r\n\r\nWe are dramatically expanding the potential of these mixed reality experiences on Windows 10 by inviting our partners to build PCs, displays, accessories and mixed reality devices with the Windows Holographic platform', 1465061942, '368674.jpg'),
(20, 'Proposed school', 'These is what you should expect. ', 1465281516, '799091.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `contentmaneger_has_user`
--

CREATE TABLE IF NOT EXISTS `contentmaneger_has_user` (
  `ContentManeger_idContentManeger` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL,
  PRIMARY KEY (`ContentManeger_idContentManeger`,`User_idUser`),
  KEY `fk_ContentManeger_has_User_User1_idx` (`User_idUser`),
  KEY `fk_ContentManeger_has_User_ContentManeger1_idx` (`ContentManeger_idContentManeger`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `regpin`
--

CREATE TABLE IF NOT EXISTS `regpin` (
  `idRegPin` int(11) NOT NULL AUTO_INCREMENT,
  `pin` varchar(45) DEFAULT NULL,
  `usedBy` varchar(45) DEFAULT NULL,
  `AdmissionForms_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idRegPin`),
  KEY `fk_RegPin_AdmissionForms1_idx` (`AdmissionForms_idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `regpin`
--

INSERT INTO `regpin` (`idRegPin`, `pin`, `usedBy`, `AdmissionForms_idUser`) VALUES
(3, 'NUGUYKZs', 'JEPHTHAHBOBAI', 9),
(6, 'WmplLPFk', 'bobycheng', 12),
(7, 'WDKPMUio', 'YusufShehu', 13);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `idRoles` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRoles`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRoles`, `roleName`) VALUES
(1, 'ADMIN'),
(2, 'STAFF'),
(3, 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `idTransaction` int(11) NOT NULL AUTO_INCREMENT,
  `DateTime` int(11) DEFAULT NULL,
  `Person_That_logged` varchar(45) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Description` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`idTransaction`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`idTransaction`, `DateTime`, `Person_That_logged`, `Amount`, `Description`) VALUES
(1, 1461947787, 'hjkj', 1245, 'mmkjk'),
(2, 1461947879, 'jeph', 1000, 'income'),
(3, 1461948264, 'jeph', -10000, 'expense'),
(4, 1461949129, ' x  x', 0, ' xnbxn'),
(5, 1465149843, 'jephthah', -500000, 'Chizo'),
(6, 1465150010, 'Yusuf ', 2000000, 'Bus CASH');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_has_user`
--

CREATE TABLE IF NOT EXISTS `transaction_has_user` (
  `Transaction_idTransaction` int(11) NOT NULL,
  `User_idUser` int(11) NOT NULL,
  PRIMARY KEY (`Transaction_idTransaction`,`User_idUser`),
  KEY `fk_Transaction_has_User_User1_idx` (`User_idUser`),
  KEY `fk_Transaction_has_User_Transaction1_idx` (`Transaction_idTransaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `address` text,
  `phoneNum` varchar(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `Fathers_Name` varchar(45) DEFAULT NULL,
  `Mothers_Name` varchar(45) DEFAULT NULL,
  `Date_Of_Birth` date DEFAULT NULL,
  `SO_Origin` varchar(45) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `lga` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `Roles_idRolesfx` int(11) DEFAULT NULL,
  `Roles_idRoles` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `fk_User_Roles1_idx` (`Roles_idRolesfx`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `firstname`, `lastname`, `address`, `phoneNum`, `email`, `Fathers_Name`, `Mothers_Name`, `Date_Of_Birth`, `SO_Origin`, `class`, `nationality`, `lga`, `image`, `Roles_idRolesfx`, `Roles_idRoles`) VALUES
(1, 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '', NULL, 1, 1),
(2, 'yusufjeph', NULL, 'yusuf', 'jeph', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '', NULL, 2, 2),
(5, 'BOBYCHENG', '5f4dcc3b5aa765d61d8327deb882cf99', 'YUSUF', 'JEPHTHAH', 'no. 8 Afezere Road Utan Jos, Plateau State, Nigeria.', '07064771019', 'jephby@gmail.com', 'Sholly Usman Yusuf', 'Mercy Usman Yusuf', '2016-05-09', 'Kaduna', 1, '   Nigerian         ', '   Kaura         ', '', 2, 3),
(6, 'jep', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tamba', 'Ibrahim', 'no. 22 sream vile', '0999999999', 'jep@mail.com', 'danladi', 'felicia', '2016-06-14', 'niger', 3, ' nigeria   ', '  badbois  ', '324407.jpg', 2, 2),
(7, 'yusufjephby', '827ccb0eea8a706c4c34a16891f84e7b', 'jephby', 'yusuf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(8, 'CHIDERA', '827ccb0eea8a706c4c34a16891f84e7b', 'CHIDI', 'DERA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(10, 'yusuf', '827ccb0eea8a706c4c34a16891f84e7b', 'david', 'yusuf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 3),
(12, 'DavidAnda', '827ccb0eea8a706c4c34a16891f84e7b', 'David', 'Anda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 3),
(13, 'FrankDike', '827ccb0eea8a706c4c34a16891f84e7b', 'Frank', 'Dike', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
