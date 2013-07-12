-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2013 at 12:16 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ethera`
--
CREATE DATABASE IF NOT EXISTS `ethera` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ethera`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `published_state` int(1) NOT NULL,
  `system_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
CREATE TABLE IF NOT EXISTS `assignment` (
  `interested_area_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `priority` int(1) NOT NULL,
  `state` varchar(5) NOT NULL,
  PRIMARY KEY (`interested_area_id`,`organization_id`,`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
CREATE TABLE IF NOT EXISTS `batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_year` varchar(10) NOT NULL,
  `registration_state` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `academic_year` (`academic_year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `batches_study_programs`
--

DROP TABLE IF EXISTS `batches_study_programs`;
CREATE TABLE IF NOT EXISTS `batches_study_programs` (
  `batch_id` int(11) NOT NULL,
  `study_program_id` int(11) NOT NULL,
  `freez_state` int(1) NOT NULL,
  `industry_ready` int(1) NOT NULL,
  `approval_phase` int(1) NOT NULL,
  PRIMARY KEY (`batch_id`,`study_program_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course_units`
--

DROP TABLE IF EXISTS `course_units`;
CREATE TABLE IF NOT EXISTS `course_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `credits` int(2) NOT NULL,
  `level` int(2) NOT NULL,
  `syllabus` text NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

DROP TABLE IF EXISTS `cvs`;
CREATE TABLE IF NOT EXISTS `cvs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `reviewed_state` varchar(255) NOT NULL,
  `upload_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `extra_activities`
--

DROP TABLE IF EXISTS `extra_activities`;
CREATE TABLE IF NOT EXISTS `extra_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `act_category_description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `course_unit_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(2) NOT NULL,
  PRIMARY KEY (`course_unit_id`,`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `interested_areas`
--

DROP TABLE IF EXISTS `interested_areas`;
CREATE TABLE IF NOT EXISTS `interested_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `description` text NOT NULL,
  `published_state` int(11) NOT NULL,
  `system_user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

DROP TABLE IF EXISTS `opportunity`;
CREATE TABLE IF NOT EXISTS `opportunity` (
  `interested_area_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `slots` int(3) NOT NULL,
  `special_request` text NOT NULL,
  PRIMARY KEY (`interested_area_id`,`organization_id`,`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `profile` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_home` varchar(20) NOT NULL,
  `phone_mob` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `reg_number` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `freez_state` int(1) NOT NULL,
  `industry_ready` int(1) NOT NULL,
  `approved_state` int(1) NOT NULL,
  `linkedin_ref` varchar(255) NOT NULL,
  `study_program_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `first_name` (`first_name`,`last_name`,`reg_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students_extra_activities`
--

DROP TABLE IF EXISTS `students_extra_activities`;
CREATE TABLE IF NOT EXISTS `students_extra_activities` (
  `extra_activity_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `mark` int(3) NOT NULL,
  PRIMARY KEY (`extra_activity_id`,`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `study_programs`
--

DROP TABLE IF EXISTS `study_programs`;
CREATE TABLE IF NOT EXISTS `study_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `study_programs_course_units`
--

DROP TABLE IF EXISTS `study_programs_course_units`;
CREATE TABLE IF NOT EXISTS `study_programs_course_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `study_program_id` int(11) NOT NULL,
  `course_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `study_programs_interested_areas`
--

DROP TABLE IF EXISTS `study_programs_interested_areas`;
CREATE TABLE IF NOT EXISTS `study_programs_interested_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `study_program_id` int(11) NOT NULL,
  `interested_area` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

DROP TABLE IF EXISTS `system_users`;
CREATE TABLE IF NOT EXISTS `system_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_home` varchar(20) NOT NULL,
  `phone_mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `biography` text NOT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `first_name` (`first_name`,`last_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
