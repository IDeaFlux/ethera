SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `ethera` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ethera`;

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

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interested_area_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `priority` int(1) NOT NULL,
  `state` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `batches`;
CREATE TABLE IF NOT EXISTS `batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_year` varchar(10) NOT NULL,
  `registration_state` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `academic_year` (`academic_year`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `batches` (`id`, `academic_year`, `registration_state`) VALUES
(1, '2008/2009', 1);

DROP TABLE IF EXISTS `batches_study_programs`;
CREATE TABLE IF NOT EXISTS `batches_study_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_id` int(11) NOT NULL,
  `study_program_id` int(11) NOT NULL,
  `freez_state` int(1) NOT NULL,
  `industry_ready` int(1) NOT NULL,
  `approval_phase` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `course_units`;
CREATE TABLE IF NOT EXISTS `course_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credits` int(2) NOT NULL,
  `level` int(2) NOT NULL,
  `syllabus` text NOT NULL,
  `subject_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `course_units` (`id`, `code`, `name`, `credits`, `level`, `syllabus`, `subject_id`) VALUES
(1, 'ICT1402', 'Introduction to Programming', 4, 1, 'Techniques of Problem solving: Algorithm, Flowchart and Pseudo codes. Introduction of C++\r\nProgramming, Fundamentals of C++ Programming, Structure of a C++ Program, Input / out put \r\nStreams, Variable declaration, Arithmetic Operations, Relational Operations, Logical \r\nOperations, Control Structures: If / Else, While repetition, For repetition, Switch multiple \r\nselection, Do / while, Break and Continue, Functions, scope of variable and Parameters, \r\nRecursion, Arrays, Records. Object Oriented Concepts: Classes and Objects, Inheritance, \r\nEncapsulation, Polymorphism, Linked list Class, String class etc. ', 14),
(2, 'ICT1404', 'Mathematics for Computing', 4, 1, 'Differential Calculus: Limits and Continuity, differential coefficients, Mean Value Theorem, \r\nTaylor’s Theorem, Integration, Definite integrals, Polynomial interpolation. Linear Algebra: \r\nMatrices, Matrix operations, system of equations. Coordinate Geometry: Coordinates, 2D and \r\n3D coordinate transformation Equation of line, circle, etc. Basic Statistics: Analysis and \r\npresentation data, Probability Distribution, Regression, Correlation. ', 14);

DROP TABLE IF EXISTS `cvs`;
CREATE TABLE IF NOT EXISTS `cvs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `reviewed_state` varchar(255) NOT NULL,
  `upload_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `enrollments`;
CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_unit_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `extra_activities`;
CREATE TABLE IF NOT EXISTS `extra_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `act_category_description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admins', '2013-07-14 00:00:00', '2013-07-14 00:00:00'),
(2, 'Career Guidance Unit ', '2013-07-14 00:00:00', '2013-07-14 00:00:00'),
(4, 'Student', '2013-07-14 00:00:00', '2013-07-14 00:00:00');

DROP TABLE IF EXISTS `interested_areas`;
CREATE TABLE IF NOT EXISTS `interested_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

DROP TABLE IF EXISTS `opportunies`;
CREATE TABLE IF NOT EXISTS `opportunies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interested_area_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `slots` int(3) NOT NULL,
  `special_request` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `organizations`;
CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `profile` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

DROP TABLE IF EXISTS `students_extra_activities`;
CREATE TABLE IF NOT EXISTS `students_extra_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extra_activity_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `mark` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `study_programs`;
CREATE TABLE IF NOT EXISTS `study_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `study_programs` (`id`, `program_code`) VALUES
(1, 'Information & Communication Technology');

DROP TABLE IF EXISTS `study_programs_course_units`;
CREATE TABLE IF NOT EXISTS `study_programs_course_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `study_program_id` int(11) NOT NULL,
  `course_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `study_programs_course_units` (`id`, `study_program_id`, `course_unit_id`) VALUES
(1, 1, 1),
(2, 1, 2);

DROP TABLE IF EXISTS `study_programs_interested_areas`;
CREATE TABLE IF NOT EXISTS `study_programs_interested_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `study_program_id` int(11) NOT NULL,
  `interested_area_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

INSERT INTO `subjects` (`id`, `name`, `description`) VALUES
(14, 'ICT', 'Information & Communication Technology'),
(15, 'MAA', 'Mathematics Applied');

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
  UNIQUE KEY `email` (`email`),
  KEY `first_name` (`first_name`,`last_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

INSERT INTO `system_users` (`id`, `first_name`, `middle_name`, `last_name`, `phone_home`, `phone_mobile`, `email`, `password`, `photo`, `group_id`, `biography`, `designation`) VALUES
(7, 'Uditha', 'Bandara', 'Wijerathna', '0372243234', '0772315516', 'udithabnd@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '51e1f7a0-b408-4404-8b95-08ac740d37dd', 1, 'Hii', 'Student');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
