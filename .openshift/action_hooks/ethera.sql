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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `articles` (`id`, `title`, `content`, `published_state`, `system_user_id`) VALUES
(1, 'Career Guidance and Counseling', '<div><img style="display: block; margin-left: auto; margin-right: auto;" src="http://contextualfeed.com/wp-content/uploads/2013/06/CareerGuidance.jpg" alt="" width="369" height="262" /></div>\r\n<ul>\r\n<li>In the traditional way of thinking, Vocational Education and Training (VET) programmes tended to be downgraded and considered as a default option for &ldquo;dropouts&rdquo; from and &ldquo;failures&rdquo; of the academically oriented formal educational system. There is the need to bring VET programmes into &ldquo;preferred options&rdquo; available for the youth. This requires proper and effective career guidance programmes, focused on attributes, abilities and aptitudes of the youth, identified at early stages, even before they appear for formal examinations like the GCE O-level. Proper &ldquo;branding&rdquo; and correct &ldquo;positioning&rdquo; of VET programmes are essential to attract and divert youth to acquire employable skills and competencies leading to gainful and productive occupations in the VET sector. Competent well trained Career Guidance Counsellors, supported by a centralised computerised database of all Tertiary and Vocational Education and Training opportunities available throughout the island are required.</li>\r\n<li>The following comments are in order regarding Career Guidance services that are available today:&nbsp;        \r\n<ul>\r\n<li>Career guidance services at Secondary Schools provided by the Ministry of Education through Career Guidance Units have over 600 teachers trained in career guidance providing services. These numbers are insufficient to serve the needs of over 3 million students at secondary schools. It is also observed that the school career guidance teachers lack contact and understanding of the world of work to be successful in guidance. As a result career guidance is not available to the bulk of the students during their school careers. They follow mostly the advice of parents who promote their offspring to follow academic courses leading to university.</li>\r\n<li>The emphasis of career guidance services at universities is on placement at employment, generally relevant to the area of study and the specific skills acquired. The students in the general degree programs in Arts, Sciences requires to be exposed to further study / training in specific fields or common career options. The Units headed by internal academic staff may lack understanding of industry / world of work.</li>\r\n<li>Independent career guidance centers established by the Ministry of Labour &amp; Labour Relations, Provincial Councils etc. are independent of specific career focus and are providing services of a general nature. The skills and abilities of the career guidance officers are to create awareness of those coming for their advice. Without exposure to or experience of the world of work, they are usually unable to provide guidance in regard to specific career paths.</li>\r\n<li>Career Guidance Units in various training institutions like NYSC, NAITA, VTA and so on focus on specific careers associated with these Institutes in contrast to an overall guidance based on the attributes of the guidance seekers.</li>\r\n</ul>\r\n</li>\r\n<li>T<strong>he above brief analysis provides a general picture of the status of Career Guidance at present. The basic weaknesses are the compartmentalization of the services, inconsistency in approach, poor communications leading to failure to reach the target audience, lack of knowledge of options even at Counselor level and total unavailability of reliable data on future job demands.</strong></li>\r\n</ul>', 1, 7),
(2, 'Test', '<p>this is just a test</p>', 0, 7),
(3, 'Finding the Right Career', '<div><img style="display: block; margin-left: auto; margin-right: auto;" src="http://www.helpguide.org/images/work_career/right_career_225.jpg" alt="" width="225" height="169" /></div>\r\n<ul>\r\n<li>Whether you&rsquo;re just leaving school, finding opportunities limited in your current position or, like many in this economy, facing unemployment, it may be time to consider your career path. Regardless of your reasons, the right career is out there for everyone. By learning how to research options, realize your strengths, and acquire new skills, as well as muster the courage to make a change, you can discover the career that&rsquo;s right for you. You may have fallen into the trap of thinking the sole point of work is to bring home enough money to live comfortably. While adequate compensation is important in any job, it&rsquo;s not the whole story. If you are unsatisfied with what you do every day, it takes a toll on your physical and mental health. You may feel burned out and frustrated, anxious, depressed, or unable to enjoy time at home knowing another workday is ahead. What&rsquo;s more, if you don&rsquo;t find your work meaningful and rewarding, it&rsquo;s hard to keep the momentum going to advance in your career. You are more likely to be successful in a career that you feel passionate about. Whether you&rsquo;re looking to enter the work force for the first time or contemplating a career change, the first step to choosing a fulfilling career is to uncover the activities that get you excited and bring you joy.</li>\r\n</ul>', 0, 8),
(4, 'This my new article', '<p>Hi guys</p>', 0, 7);

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interested_area_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `priority` int(1) NOT NULL,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

INSERT INTO `assignments` (`id`, `interested_area_id`, `organization_id`, `student_id`, `priority`, `state`) VALUES
(13, 4, 1, 8, 1, 2),
(14, 4, 2, 8, 2, 2),
(15, 1, 1, 8, 3, 2),
(16, 2, 2, 13, 1, 2),
(17, 3, 2, 13, 2, 2),
(18, 1, 1, 13, 3, 2),
(19, 2, 2, 10, 1, 2),
(20, 2, 2, 10, 2, 2),
(21, 3, 2, 10, 3, 2),
(22, 4, 3, 9, 1, 2),
(23, 6, 0, 9, 2, 1),
(24, 2, 2, 9, 3, 2),
(25, 4, 1, 12, 1, 2),
(26, 4, 2, 12, 2, 2),
(27, 4, 3, 12, 3, 2),
(28, 1, 1, 11, 1, 2),
(29, 4, 3, 11, 2, 2),
(30, 3, 2, 11, 3, 2);

DROP TABLE IF EXISTS `batches`;
CREATE TABLE IF NOT EXISTS `batches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_year` varchar(10) NOT NULL,
  `registration_state` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `academic_year` (`academic_year`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

INSERT INTO `batches` (`id`, `academic_year`, `registration_state`) VALUES
(9, '2008/2009', 1),
(10, '2009/2010', 1),
(11, '2010/2011', 1);

DROP TABLE IF EXISTS `batches_study_programs`;
CREATE TABLE IF NOT EXISTS `batches_study_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_id` int(11) NOT NULL,
  `study_program_id` int(11) NOT NULL,
  `freeze_state` int(1) NOT NULL,
  `industry_ready` int(1) NOT NULL,
  `approval_phase` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

INSERT INTO `batches_study_programs` (`id`, `batch_id`, `study_program_id`, `freeze_state`, `industry_ready`, `approval_phase`) VALUES
(12, 9, 1, 1, 1, 2),
(13, 9, 2, 0, 0, 0),
(14, 9, 3, 0, 0, 0),
(15, 9, 4, 0, 0, 0),
(16, 10, 1, 0, 0, 0),
(17, 10, 2, 0, 0, 0),
(18, 10, 3, 0, 0, 0),
(19, 10, 4, 0, 0, 0),
(20, 11, 1, 0, 0, 0),
(21, 11, 2, 0, 0, 0),
(22, 11, 3, 0, 0, 0),
(23, 11, 4, 0, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `course_units` (`id`, `code`, `name`, `credits`, `level`, `syllabus`, `subject_id`) VALUES
(1, 'ICT1402', 'Introduction to Programming', 4, 1, 'Techniques of Problem solving: Algorithm, Flowchart and Pseudo codes. Introduction of C++\r\nProgramming, Fundamentals of C++ Programming, Structure of a C++ Program, Input / out put ', 14),
(2, 'ICT1404', 'Mathematics for Computing', 4, 1, 'Differential Calculus: Limits and Continuity, differential coefficients, Mean Value Theorem, \r\nTaylor’s Theorem, Integration, Definite integrals, Polynomial interpolation. Linear Algebra: \r\nMatrices, Matrix operations, system of equations. Coordinate Geometry: Coordinates, 2D and \r\n3D coordinate transformation Equation of line, circle, etc. Basic Statistics: Analysis and \r\npresentation data, Probability Distribution, Regression, Correlation. ', 14),
(3, 'ICT1308', 'Operating Systems', 3, 1, 'Introduction to operating systems.', 14),
(4, 'ICT2042', 'Software Engineering', 4, 2, 'Scope of Software Engineering: Software crisis, Software engineering objectives, \r\nObject – oriented paradigm. \r\nSoftware Life Cycle Models: Build-and-Fix model, Water fall model, Object-oriented life \r\ncycle model, Comparison of life-Cycle models, \r\nTesting: Quality issues, Non execution - based testing, Execution - based testing, Correctness \r\nproofs', 14),
(5, 'ICT3301', 'Human Computer Interaction', 3, 3, 'About HCI', 14),
(6, 'ICT1305', 'Data Structures', 3, 1, 'Design of Data Structures.', 14),
(7, 'ICT3411', 'Third Year Project', 4, 3, 'This is the third year project', 14),
(8, 'CMP2201', 'Ethnic and Social Haromony', 2, 2, 'Ethnic and social harmony', 16),
(9, 'CMP1201', 'English ', 2, 1, 'Managment', 16);

DROP TABLE IF EXISTS `cvs`;
CREATE TABLE IF NOT EXISTS `cvs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `current` int(1) NOT NULL,
  `upload_time` datetime NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

INSERT INTO `cvs` (`id`, `student_id`, `current`, `upload_time`, `file_name`, `file_size`) VALUES
(8, 8, 1, '2013-11-16 23:21:43', '5287fe07-6984-415c-ba0e-4677740d37dd.pdf', 136401),
(9, 13, 1, '2013-11-16 23:23:28', '5287fe70-14b8-4884-965c-46e1740d37dd.pdf', 136401),
(10, 10, 1, '2013-11-16 23:25:32', '5287feec-5c18-41ce-87f9-4675740d37dd.pdf', 136401),
(11, 9, 1, '2013-11-16 23:26:34', '5287ff2a-d2c0-46cf-9722-46de740d37dd.pdf', 136401),
(12, 12, 1, '2013-11-16 23:28:00', '5287ff80-b6b0-40f9-92b7-4679740d37dd.pdf', 136401),
(13, 11, 1, '2013-11-16 23:29:44', '5287ffe8-359c-4b6d-9558-46e1740d37dd.pdf', 136401);

DROP TABLE IF EXISTS `enrollments`;
CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_unit_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

INSERT INTO `enrollments` (`id`, `course_unit_id`, `student_id`, `grade`) VALUES
(24, 1, 8, 'A+'),
(25, 2, 8, 'A+'),
(26, 3, 8, 'A-'),
(27, 4, 8, 'A'),
(28, 5, 8, 'A'),
(29, 1, 9, 'A+'),
(30, 2, 9, 'A'),
(31, 3, 9, 'A'),
(32, 4, 9, 'B+'),
(33, 5, 9, 'A-'),
(34, 1, 10, 'A-'),
(35, 2, 10, 'B'),
(36, 3, 10, 'C+'),
(37, 4, 10, 'C'),
(38, 5, 10, 'C'),
(39, 1, 11, 'C+'),
(40, 2, 11, 'B'),
(41, 3, 11, 'B'),
(42, 4, 11, 'B+'),
(43, 5, 11, 'A-'),
(44, 1, 12, 'A'),
(45, 2, 12, 'A-'),
(46, 3, 12, 'B+'),
(47, 4, 12, 'B-'),
(48, 5, 12, 'B'),
(49, 1, 13, 'C'),
(50, 2, 13, 'C+'),
(51, 3, 13, 'A'),
(52, 4, 13, 'A'),
(53, 5, 13, 'C');

DROP TABLE IF EXISTS `extra_activities`;
CREATE TABLE IF NOT EXISTS `extra_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `act_category_description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `extra_activities` (`id`, `name`, `act_category_description`) VALUES
(1, 'Sports', 'Add details about sports\r\n'),
(2, 'Positions', 'Positions hold.'),
(3, 'Certifications and Awards', 'Any Certifications & Awards received.'),
(4, 'Other', 'Other extra activites.');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admins', '2013-07-14 00:00:00', '2013-07-14 00:00:00'),
(2, 'Career Guidance Unit ', '2013-07-14 00:00:00', '2013-07-14 00:00:00'),
(4, 'Student', '2013-07-14 00:00:00', '2013-07-14 00:00:00'),
(5, 'Organization', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

DROP TABLE IF EXISTS `interested_areas`;
CREATE TABLE IF NOT EXISTS `interested_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `interested_areas` (`id`, `name`, `description`) VALUES
(1, 'Linux System Engineering', 'Redhat 6.0'),
(2, 'Networking', 'CISCO'),
(3, 'Business Analysis', 'BA'),
(4, 'Software Engineering', 'SDLC, Design Patterns'),
(5, 'Fisheries', 'Aqua Culture'),
(6, 'Android Developer/Software Engineer ', 'A person who develop android apps.');

DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `description` text NOT NULL,
  `published_state` int(11) NOT NULL,
  `published_to_cal` int(11) NOT NULL,
  `system_user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `event_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

INSERT INTO `notices` (`id`, `title`, `date_start`, `date_end`, `description`, `published_state`, `published_to_cal`, `system_user_id`, `article_id`, `event_id`) VALUES
(45, 'Bravoooo it is completed', '2013-10-22 02:16:00', '2013-10-27 02:16:00', '', 0, 1, 7, 2, 'kfi6bpkeabn6ltjn4rdi06utro'),
(47, 'Notice Demi', '2013-10-21 06:26:00', '2013-10-29 06:26:00', '', 0, 1, 7, 1, '66654hljdrq26a0cv0odc88i4s'),
(48, 'Demo Event', '2013-12-10 09:00:00', '2013-12-10 14:00:00', 'This is a demo event', 1, 1, 7, 0, 'bmd7jr4r46hgo0ras2vmi0mhnk');

DROP TABLE IF EXISTS `opportunities`;
CREATE TABLE IF NOT EXISTS `opportunities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interested_area_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `study_program_id` int(11) NOT NULL,
  `slots` int(3) NOT NULL,
  `consumed_slots` int(3) NOT NULL,
  `special_request` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

INSERT INTO `opportunities` (`id`, `interested_area_id`, `organization_id`, `batch_id`, `study_program_id`, `slots`, `consumed_slots`, `special_request`) VALUES
(7, 4, 1, 9, 1, 2, 0, ''),
(8, 2, 2, 9, 1, 1, 0, ''),
(9, 4, 3, 9, 1, 2, 0, ''),
(10, 4, 2, 9, 1, 1, 0, ''),
(11, 3, 2, 9, 1, 1, 0, ''),
(12, 1, 1, 9, 1, 2, 0, '');

DROP TABLE IF EXISTS `organizations`;
CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `profile` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `organizations` (`id`, `organization_user_id`, `name`, `address`, `email`, `logo`, `profile`) VALUES
(1, 5, 'WSO2', 'Kollupitiya', 'info@wso2.com', '', 'Founded in August 2005, WSO2 is a global enterprise middleware corporation with offices in USA, UK and Sri Lanka. Providing the only complete open source middleware platform, WSO2 is revolutionizing the industry by putting traditional middleware on a diet and introducing lean, powerful and flexible solutions to address the 21st century enterprise challenges.'),
(2, 5, 'Virtusa', 'Dematagoda', 'info@virtusa.com', '', 'Virtusa provides a broad range of IT consulting, systems implementation and application outsourcing services through an optimized global delivery model. Through our industry leading platforming process, Virtusa focuses on delivering business results by modernizing, rationalizing and consolidating the critical applications that support our clients'' core business processes. We employ advanced processes like Agile to insure the right system is delivered the first time. This approach enables Virtusa to serve industry leaders as they seek to improve their customers'' experience, expand market reach, improve time to market and lower costs.'),
(3, 5, 'IFS', 'Wellawaththa', 'info@ifsworld.com', '', 'IFS AB is a global enterprise software company headquartered in Linköping, Sweden with 50 offices around the world. IFS provides a component-based extended ERP suite built on SOA technology.');

DROP TABLE IF EXISTS `registration_num_headers`;
CREATE TABLE IF NOT EXISTS `registration_num_headers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `registration_num_headers` (`id`, `name`) VALUES
(1, 'ICT'),
(2, 'AS'),
(3, 'HPT');

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_home` varchar(20) NOT NULL,
  `phone_mob` varchar(20) NOT NULL,
  `bio` text NOT NULL,
  `sms_num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reset_password_token` varchar(255) NOT NULL,
  `token_created_at` datetime NOT NULL,
  `photo` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `reg_number` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `freeze_state` int(1) NOT NULL,
  `industry_ready` int(1) NOT NULL,
  `approved_state` int(1) NOT NULL,
  `approval_phase` int(1) NOT NULL,
  `linkedin_ref` varchar(255) NOT NULL,
  `study_program_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `registration_num_header_id` int(11) NOT NULL,
  `final_mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `first_name` (`first_name`,`last_name`,`reg_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

INSERT INTO `students` (`id`, `first_name`, `middle_name`, `last_name`, `phone_home`, `phone_mob`, `bio`, `sms_num`, `email`, `password`, `reset_password_token`, `token_created_at`, `photo`, `group_id`, `reg_number`, `gender`, `date_of_birth`, `address1`, `address2`, `city`, `freeze_state`, `industry_ready`, `approved_state`, `approval_phase`, `linkedin_ref`, `study_program_id`, `batch_id`, `registration_num_header_id`, `final_mark`) VALUES
(8, 'Uditha', 'Bandara', 'Wijerathna', '0372243234', '0772315516', '', '', 'udinnet@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '5287f5fe-0bb8-4818-ac03-4675740d37dd', 4, '047', 'M', '1988-04-08', 'No21', 'Keselwathugoda', 'Dewalegama', 1, 1, 4, 2, 'udithawijerathna', 1, 9, 1, 0),
(9, 'Yohani', 'Shayamindi', 'Ranasinghe', '0372250520', '0718371272', '', '', 'yohani.ysr@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '5287f6cf-94d4-4240-8844-4677740d37dd', 4, '019', 'F', '1988-11-01', 'N.01', 'Dehelgamuwa', 'Ibbagamuwa', 1, 1, 4, 2, 'yohani', 1, 9, 1, 0),
(10, 'Sameera', 'Lakmal', 'Hokandara', '0342243222', '0779951123', '', '', 'cham.lakmal@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '5287f86e-23d0-4c12-b8cb-46de740d37dd', 4, '056', 'M', '1987-11-11', 'No.23', 'Aradhana Kanda', 'Avissawella', 1, 1, 4, 2, '', 1, 9, 1, 0),
(11, 'Shayamali', 'Dulangika', 'Bamunuarachchi', '', '', '', '', 'shayamalidulz@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '5287f9de-0358-4932-b49b-46e0740d37dd', 4, '007', 'M', '1988-05-11', 'No. 22/5', 'Hospital Road', 'Wathupitiwala', 1, 1, 4, 2, 'shayamali', 1, 9, 1, 0),
(12, 'Ishani', 'Thilanka', 'Gunawardhana', '', '', '', '', 'ishanigunawardhana@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '5287fb46-c364-4ee2-8d74-46e2740d37dd', 4, '032', 'F', '1988-05-11', 'Udahagedara', 'Vilayaya', 'Dampahala', 1, 1, 4, 2, 'igunawardhana', 1, 9, 1, 0),
(13, 'Krishantha', 'Madhusanka', 'Jayasinghe', '', '', '', '', 'krishmadusanka1988@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '5287fbe1-563c-41ae-a811-4679740d37dd', 4, '029', 'M', '1988-03-16', 'No. 255/44', 'Makola North', 'Makola', 1, 1, 4, 2, '', 1, 9, 1, 0);

DROP TABLE IF EXISTS `students_extra_activities`;
CREATE TABLE IF NOT EXISTS `students_extra_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extra_activity_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `mark` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

INSERT INTO `students_extra_activities` (`id`, `extra_activity_id`, `student_id`, `comment`, `mark`) VALUES
(4, 1, 8, 'Soccer', 3.3),
(5, 2, 8, 'ARICT', 3.7),
(6, 3, 8, 'RHCE,RHCSA', 3.7),
(7, 1, 13, 'Cricket\r\nChess', 3.7),
(8, 3, 13, 'OCJP', 2.3),
(9, 1, 10, 'Badminton', 3.7),
(10, 1, 9, 'Elle', 3),
(11, 2, 9, 'ARICT', 3.7),
(12, 3, 9, 'OCJP', 1.7),
(13, 1, 12, 'Carom\r\nAthletics', 2.3),
(14, 1, 11, 'Hocky', 2.7),
(15, 2, 11, 'ARICT', 3.3),
(16, 4, 11, 'All-Island Champion', 3.7);

DROP TABLE IF EXISTS `study_programs`;
CREATE TABLE IF NOT EXISTS `study_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_code` varchar(255) NOT NULL,
  `registration_num_header_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `study_programs` (`id`, `program_code`, `registration_num_header_id`) VALUES
(1, 'Information & Communication Technology', 1),
(2, 'Biological Science', 2),
(3, 'Physical Science', 2),
(4, 'Health Promotion', 3);

DROP TABLE IF EXISTS `study_programs_course_units`;
CREATE TABLE IF NOT EXISTS `study_programs_course_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `study_program_id` int(11) NOT NULL,
  `course_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

INSERT INTO `study_programs_course_units` (`id`, `study_program_id`, `course_unit_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 2, 8),
(10, 3, 8),
(11, 4, 8),
(12, 1, 9),
(13, 2, 9),
(14, 3, 9),
(15, 4, 9);

DROP TABLE IF EXISTS `study_programs_interested_areas`;
CREATE TABLE IF NOT EXISTS `study_programs_interested_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `study_program_id` int(11) NOT NULL,
  `interested_area_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `study_programs_interested_areas` (`id`, `study_program_id`, `interested_area_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 5),
(6, 1, 6);

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

INSERT INTO `subjects` (`id`, `name`, `description`) VALUES
(14, 'ICT', 'Information & Communication Technology '),
(15, 'MAA', 'Mathematics Applied'),
(16, 'CMP', 'Compulsory');

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
  `reset_password_token` varchar(255) NOT NULL,
  `token_created_at` datetime NOT NULL,
  `photo` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `biography` text NOT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `first_name` (`first_name`,`last_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

INSERT INTO `system_users` (`id`, `first_name`, `middle_name`, `last_name`, `phone_home`, `phone_mobile`, `email`, `password`, `reset_password_token`, `token_created_at`, `photo`, `group_id`, `biography`, `designation`) VALUES
(7, 'Uditha', 'Bandara', 'Wijerathna', '0372243234', '0772315516', 'udithabnd@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '5203508f-dc5c-4d78-9cd3-245e740d37dd', 1, 'Hii', 'Students'),
(8, 'Yohani', 'Shayamindi', 'Ranasinghe', '', '', 'yohani.ysr@gmail.com', '5c4c6b7e3ccd612e84576cbc4f68a3ffe5e16ab9', '', '0000-00-00 00:00:00', '52035055-5c04-47b9-b283-0689740d37dd', 1, 'This is yohani', 'Student'),
(9, 'WSO2', '', 'Inc', '', '', 'info@wso2.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '526b6b3e-1404-4c81-9f0d-0452740d37dd', 5, '', 'Organization'),
(10, 'Virtusa', '', '(pvt) Limited', '', '', 'info@virtusa.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '52864a64-b128-4f3b-8aff-103f740d37dd', 5, '', 'Company'),
(11, 'IFS', '', 'Inc', '', '', 'info@ifsworld.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '52865fa8-8e34-46bc-9177-685d740d37dd', 5, 'IFS AB is a global enterprise software company headquartered in Linköping, Sweden with 50 offices around the world. IFS provides a component-based extended ERP suite built on SOA technology.', 'Company');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
