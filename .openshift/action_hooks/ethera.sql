-- phpMyAdmin SQL Dump
-- version 4.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2014 at 08:35 PM
-- Server version: 5.5.33a-MariaDB
-- PHP Version: 5.5.7

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `published_state`, `system_user_id`) VALUES
(1, 'Career Guidance and Counseling', '<div><img style="display: block; margin-left: auto; margin-right: auto;" src="http://contextualfeed.com/wp-content/uploads/2013/06/CareerGuidance.jpg" alt="" width="369" height="262" /></div>\n<ul>\n<li>In the traditional way of thinking, Vocational Education and Training (VET) programmes tended to be downgraded and considered as a default option for &ldquo;dropouts&rdquo; from and &ldquo;failures&rdquo; of the academically oriented formal educational system. There is the need to bring VET programmes into &ldquo;preferred options&rdquo; available for the youth. This requires proper and effective career guidance programmes, focused on attributes, abilities and aptitudes of the youth, identified at early stages, even before they appear for formal examinations like the GCE O-level. Proper &ldquo;branding&rdquo; and correct &ldquo;positioning&rdquo; of VET programmes are essential to attract and divert youth to acquire employable skills and competencies leading to gainful and productive occupations in the VET sector. Competent well trained Career Guidance Counsellors, supported by a centralised computerised database of all Tertiary and Vocational Education and Training opportunities available throughout the island are required.</li>\n<li>The following comments are in order regarding Career Guidance services that are available today:&nbsp;        \n<ul>\n<li>Career guidance services at Secondary Schools provided by the Ministry of Education through Career Guidance Units have over 600 teachers trained in career guidance providing services. These numbers are insufficient to serve the needs of over 3 million students at secondary schools. It is also observed that the school career guidance teachers lack contact and understanding of the world of work to be successful in guidance. As a result career guidance is not available to the bulk of the students during their school careers. They follow mostly the advice of parents who promote their offspring to follow academic courses leading to university.</li>\n<li>The emphasis of career guidance services at universities is on placement at employment, generally relevant to the area of study and the specific skills acquired. The students in the general degree programs in Arts, Sciences requires to be exposed to further study / training in specific fields or common career options. The Units headed by internal academic staff may lack understanding of industry / world of work.</li>\n<li>Independent career guidance centers established by the Ministry of Labour &amp; Labour Relations, Provincial Councils etc. are independent of specific career focus and are providing services of a general nature. The skills and abilities of the career guidance officers are to create awareness of those coming for their advice. Without exposure to or experience of the world of work, they are usually unable to provide guidance in regard to specific career paths.</li>\n<li>Career Guidance Units in various training institutions like NYSC, NAITA, VTA and so on focus on specific careers associated with these Institutes in contrast to an overall guidance based on the attributes of the guidance seekers.</li>\n</ul>\n</li>\n<li>T<strong>he above brief analysis provides a general picture of the status of Career Guidance at present. The basic weaknesses are the compartmentalization of the services, inconsistency in approach, poor communications leading to failure to reach the target audience, lack of knowledge of options even at Counselor level and total unavailability of reliable data on future job demands.</strong></li>\n</ul>', 1, 7),
(2, 'Test', '<p>this is just a test</p>', 0, 7),
(3, 'Finding the Right Career', '<div><img style="display: block; margin-left: auto; margin-right: auto;" src="http://www.helpguide.org/images/work_career/right_career_225.jpg" alt="" width="225" height="169" /></div>\r\n<ul>\r\n<li>Whether you&rsquo;re just leaving school, finding opportunities limited in your current position or, like many in this economy, facing unemployment, it may be time to consider your career path. Regardless of your reasons, the right career is out there for everyone. By learning how to research options, realize your strengths, and acquire new skills, as well as muster the courage to make a change, you can discover the career that&rsquo;s right for you. You may have fallen into the trap of thinking the sole point of work is to bring home enough money to live comfortably. While adequate compensation is important in any job, it&rsquo;s not the whole story. If you are unsatisfied with what you do every day, it takes a toll on your physical and mental health. You may feel burned out and frustrated, anxious, depressed, or unable to enjoy time at home knowing another workday is ahead. What&rsquo;s more, if you don&rsquo;t find your work meaningful and rewarding, it&rsquo;s hard to keep the momentum going to advance in your career. You are more likely to be successful in a career that you feel passionate about. Whether you&rsquo;re looking to enter the work force for the first time or contemplating a career change, the first step to choosing a fulfilling career is to uncover the activities that get you excited and bring you joy.</li>\r\n</ul>', 1, 8),
(4, 'This my new article', '<p>Hi guys</p>', 0, 7),
(5, 'Show Enthusiasm and Be Yourself', '<p>Trademark recruiter Judy Simon of Sage Legal Search admits that &ldquo;fit&rdquo; is the intangible that everyone wants. She has a guideline for determining whether there is a &ldquo;fit&rdquo; based on what is discussed during the interview. &ldquo;If you are not beyond discussing the substantive aspects of the job for at least 50 percent of the interview, it may not be a good fit,&rdquo; she advised.</p>\r\n<p>Judy also emphasized that a candidate is looking for a place where the candidate can work happily. After all, the &ldquo;fit&rdquo; must also be good for the candidate. The 50 percent guideline can be used to gauge how well both the interviewer and the candidate communicate with and feel about each other. According to Judy, the only way to do this is to speak honestly.</p>\r\n<p>Judy&rsquo;s advice to candidates is, &ldquo;show enthusiasm and be yourself.&rdquo;</p>\r\n<p>Others seem to agree that credentials are not always what interest people during the interview. &ldquo;The best person (I interviewed recently) was very open, genuine and believable. Those things sometimes sell better than your credentials,&rdquo; said Jay Hines, partner at Baker &amp; Hostetler in Washington D.C. He acknowledged that &ldquo;you don&rsquo;t know what you are getting until after they work for you. You must determine how they are going to perform based on the feeling you get from the way they conduct themselves. This can be as important as what they put on their resume.&rdquo;</p>\r\n<p>Jay&rsquo;s advice to candidates is, &ldquo;have your story and be confident about yourself.&rdquo;</p>', 1, 7),
(6, 'Explore your Interests', '<p>You can also ask yourself what it is you normally really like to do? What do you do when you can do anything at all? What do you really look forward to? Do you doodle all day wonderful caricatures in the margins while the other accountants are crunching numbers? Perhaps you are a budding artist. Do you look forward to weekends just so you can practice your French language skills at the French restaurant or teach the kids or write haiku or take visitors on a tour of the town? Perhaps you always wanted to be a language scholar or teacher or professor or poet or tour guide or travel agent or traveler. Whatever it is you love to do, don&rsquo;t consider it unimportant; and if you don&rsquo;t think you do it too well because you haven&rsquo;t studied it, remember most people excel most at those things they love to do, and it&rsquo;s never too late to learn. It also helps to close your eyes and envision yourself where you want to be in a few years time or a few months time; what does it look like and feel like; what are you doing in that picture and what did you do to get there? Don&rsquo;t be afraid to dream big and to think outside the box as you map your interests and aspirations to possible careers.</p>', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interested_area_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `priority` int(1) NOT NULL,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `academic_year`, `registration_state`) VALUES
(9, '2008/2009', 1),
(10, '2009/2010', 1),
(11, '2010/2011', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batches_study_programs`
--

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

--
-- Dumping data for table `batches_study_programs`
--

INSERT INTO `batches_study_programs` (`id`, `batch_id`, `study_program_id`, `freeze_state`, `industry_ready`, `approval_phase`) VALUES
(12, 9, 1, 0, 0, 0),
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

-- --------------------------------------------------------

--
-- Table structure for table `course_units`
--

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

--
-- Dumping data for table `course_units`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

DROP TABLE IF EXISTS `cvs`;
CREATE TABLE IF NOT EXISTS `cvs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `current` int(1) NOT NULL,
  `upload_time` datetime NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_unit_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `course_unit_id`, `student_id`, `grade`) VALUES
(1, 1, 9, 'A+'),
(2, 2, 9, 'A-'),
(3, 3, 9, 'B+'),
(4, 4, 9, 'A-'),
(5, 1, 10, 'B'),
(6, 2, 10, 'B-'),
(7, 3, 10, 'B'),
(8, 4, 10, 'B+'),
(9, 1, 11, 'B-'),
(10, 2, 11, 'C+'),
(11, 3, 11, 'C'),
(12, 4, 11, 'C'),
(13, 1, 12, 'B'),
(14, 2, 12, 'B+'),
(15, 3, 12, 'A'),
(16, 4, 12, 'B+'),
(17, 1, 13, 'A+'),
(18, 2, 13, 'C'),
(19, 3, 13, 'C'),
(20, 4, 13, 'C');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `extra_activities`
--

INSERT INTO `extra_activities` (`id`, `name`, `act_category_description`) VALUES
(1, 'Sports', 'Add details about sports\r\n'),
(2, 'Positions', 'Positions hold.'),
(3, 'Certifications and Awards', 'Any Certifications & Awards received.'),
(4, 'Other', 'Other extra activites.');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admins', '2013-07-14 00:00:00', '2013-07-14 00:00:00'),
(2, 'Career Guidance Unit ', '2013-07-14 00:00:00', '2013-07-14 00:00:00'),
(4, 'Student', '2013-07-14 00:00:00', '2013-07-14 00:00:00'),
(5, 'Organization', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'AR Office', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `interested_areas`
--

INSERT INTO `interested_areas` (`id`, `name`, `description`) VALUES
(1, 'Linux System Engineering', 'Redhat 6.0'),
(2, 'Networking', 'CISCO'),
(3, 'Business Analysis', 'BA'),
(4, 'Software Engineering', 'SDLC, Design Patterns'),
(5, 'Fisheries', 'Aqua Culture'),
(6, 'Android Developer/Software Engineer ', 'A person who develop android apps.');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `date_start`, `date_end`, `description`, `published_state`, `published_to_cal`, `system_user_id`, `article_id`, `event_id`) VALUES
(49, 'Final Project Presentation', '2013-11-20 16:00:00', '2013-11-20 17:30:00', 'Final Project Presentation of IDeaFlux''s project ETHERA(එතෙර)', 1, 1, 7, 0, 'n3vr75mqk778c6cimkfqhu8hek');

-- --------------------------------------------------------

--
-- Table structure for table `opportunities`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

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

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `organization_user_id`, `name`, `address`, `email`, `logo`, `profile`) VALUES
(1, 9, 'WSO2', 'Kollupitiya', 'info@wso2.com', '528ab0aa-1920-48e8-8ff9-4d84740d37dd', 'Founded in August 2005, WSO2 is a global enterprise middleware corporation with offices in USA, UK and Sri Lanka. Providing the only complete open source middleware platform, WSO2 is revolutionizing the industry by putting traditional middleware on a diet and introducing lean, powerful and flexible solutions to address the 21st century enterprise challenges.'),
(2, 10, 'Virtusa', 'Dematagoda', 'info@virtusa.com', '', 'Virtusa provides a broad range of IT consulting, systems implementation and application outsourcing services through an optimized global delivery model. Through our industry leading platforming process, Virtusa focuses on delivering business results by modernizing, rationalizing and consolidating the critical applications that support our clients'' core business processes. We employ advanced processes like Agile to insure the right system is delivered the first time. This approach enables Virtusa to serve industry leaders as they seek to improve their customers'' experience, expand market reach, improve time to market and lower costs.'),
(3, 11, 'IFS', 'Wellawaththa', 'info@ifsworld.com', '', 'IFS AB is a global enterprise software company headquartered in Linköping, Sweden with 50 offices around the world. IFS provides a component-based extended ERP suite built on SOA technology.');

-- --------------------------------------------------------

--
-- Table structure for table `registration_num_headers`
--

DROP TABLE IF EXISTS `registration_num_headers`;
CREATE TABLE IF NOT EXISTS `registration_num_headers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `registration_num_headers`
--

INSERT INTO `registration_num_headers` (`id`, `name`) VALUES
(1, 'ICT'),
(2, 'AS'),
(3, 'HPT');

-- --------------------------------------------------------

--
-- Table structure for table `special_opportunities`
--

DROP TABLE IF EXISTS `special_opportunities`;
CREATE TABLE IF NOT EXISTS `special_opportunities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
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
  `full_name` varchar(255) NOT NULL,
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
  `processing_state` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `first_name` (`first_name`,`last_name`,`reg_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `middle_name`, `last_name`, `full_name`, `phone_home`, `phone_mob`, `bio`, `sms_num`, `email`, `password`, `reset_password_token`, `token_created_at`, `photo`, `group_id`, `reg_number`, `gender`, `date_of_birth`, `address1`, `address2`, `city`, `freeze_state`, `industry_ready`, `approved_state`, `approval_phase`, `linkedin_ref`, `study_program_id`, `batch_id`, `registration_num_header_id`, `processing_state`) VALUES
(8, 'Uditha', 'Bandara', 'Wijerathna', 'P.W.N.P.W.B.U.B WIJERATHNA', '0372243234', '0772315516', '', '', 'udinnet@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '528a147f-cae0-44ef-bb6c-1756740d37dd', 4, '047', 'M', '1988-04-08', 'No21', 'Keselwathugoda', 'Dewalegama', 0, 0, 0, 0, 'udithawijerathna', 1, 9, 1, 0),
(9, 'Yohani', 'Shayamindi', 'Ranasinghe', '', '0372250520', '0718371272', '', '', 'yohani.ysr@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '528a53b7-1a14-4278-bc46-0c8e740d37dd', 4, '019', 'F', '1988-11-01', 'N.01', 'Dehelgamuwa', 'Ibbagamuwa', 0, 0, 1, 0, 'yohani', 1, 9, 1, 0),
(10, 'Sameera', 'Lakmal', 'Hokandara', '', '0342243222', '0779951123', '', 'tel:AZ110wuH3dKJk9Xjx7w93dJCCeXGtVdHYUfOt', 'cham.lakmal@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '528a5425-3c2c-44af-9852-0391740d37dd', 4, '056', 'M', '1987-11-11', 'No.23', 'Aradhana Kanda', 'Avissawella', 0, 0, 1, 0, '', 1, 9, 1, 0),
(11, 'Shayamali', 'Dulangika', 'Bamunuarachchi', '', '', '', '', '', 'shayamalidulz@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '528a53f3-98a0-4989-b7b9-0c7d740d37dd', 4, '007', 'M', '1988-05-11', 'No. 22/5', 'Hospital Road', 'Wathupitiwala', 0, 0, 1, 0, 'shayamali', 1, 9, 1, 0),
(12, 'Ishani', 'Thilanka', 'Gunawardhana', '', '', '', '', '', 'ishanigunawardhana@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '528a53ce-d090-41e3-ada0-0c7b740d37dd', 4, '032', 'F', '1988-05-11', 'Udahagedara', 'Vilayaya', 'Dampahala', 0, 0, 1, 0, 'igunawardhana', 1, 9, 1, 0),
(13, 'Krishantha', 'Madhusanka', 'Jayasinghe', '', '', '', '', '', 'krishmadusanka1988@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '528a5409-ced0-4a6a-9de3-0c8f740d37dd', 4, '029', 'M', '1988-03-16', 'No. 255/44', 'Makola North', 'Makola', 0, 0, 1, 0, '', 1, 9, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students_extra_activities`
--

DROP TABLE IF EXISTS `students_extra_activities`;
CREATE TABLE IF NOT EXISTS `students_extra_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extra_activity_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `mark` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `study_programs`
--

DROP TABLE IF EXISTS `study_programs`;
CREATE TABLE IF NOT EXISTS `study_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_code` varchar(255) NOT NULL,
  `registration_num_header_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `study_programs`
--

INSERT INTO `study_programs` (`id`, `program_code`, `registration_num_header_id`) VALUES
(1, 'Information & Communication Technology', 1),
(2, 'Biological Science', 2),
(3, 'Physical Science', 2),
(4, 'Health Promotion', 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `study_programs_course_units`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `study_programs_interested_areas`
--

DROP TABLE IF EXISTS `study_programs_interested_areas`;
CREATE TABLE IF NOT EXISTS `study_programs_interested_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `study_program_id` int(11) NOT NULL,
  `interested_area_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `study_programs_interested_areas`
--

INSERT INTO `study_programs_interested_areas` (`id`, `study_program_id`, `interested_area_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 5),
(6, 1, 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `description`) VALUES
(14, 'ICT', 'Information & Communication Technology '),
(15, 'MAA', 'Mathematics Applied'),
(16, 'CMP', 'Compulsory');

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
  `reset_password_token` varchar(255) NOT NULL,
  `token_created_at` datetime NOT NULL,
  `photo` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `biography` text NOT NULL,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `first_name` (`first_name`,`last_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `first_name`, `middle_name`, `last_name`, `phone_home`, `phone_mobile`, `email`, `password`, `reset_password_token`, `token_created_at`, `photo`, `group_id`, `biography`, `designation`) VALUES
(7, 'Uditha', 'Bandara', 'Wijerathna', '0372243234', '0772315516', 'udithabnd@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '5203508f-dc5c-4d78-9cd3-245e740d37dd', 1, 'Hii', 'Students'),
(8, 'Yohani', 'Shayamindi', 'Ranasinghe', '', '', 'yohani.ysr@gmail.com', '5c4c6b7e3ccd612e84576cbc4f68a3ffe5e16ab9', '', '0000-00-00 00:00:00', '52035055-5c04-47b9-b283-0689740d37dd', 1, 'This is yohani', 'Student'),
(9, 'WSO2', '', 'Inc', '', '', 'info@wso2.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '526b6b3e-1404-4c81-9f0d-0452740d37dd', 5, '', 'Organization'),
(10, 'Virtusa', '', '(pvt) Limited', '', '', 'info@virtusa.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '52864a64-b128-4f3b-8aff-103f740d37dd', 5, '', 'Company'),
(11, 'IFS', '', 'Inc', '', '', 'info@ifsworld.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '52865fa8-8e34-46bc-9177-685d740d37dd', 5, 'IFS AB is a global enterprise software company headquartered in Linköping, Sweden with 50 offices around the world. IFS provides a component-based extended ERP suite built on SOA technology.', 'Company'),
(12, 'AR', '', 'Officer', '', '', 'ar@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '528bce51-3784-453b-ae6e-2bad740d37dd', 6, '', 'Assistant Registrar');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
