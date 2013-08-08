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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `articles` (`id`, `title`, `content`, `published_state`, `system_user_id`) VALUES
(1, 'Career Guidance and Counseling', '<div><img style="display: block; margin-left: auto; margin-right: auto;" src="http://contextualfeed.com/wp-content/uploads/2013/06/CareerGuidance.jpg" alt="" width="369" height="262" /></div>\r\n<ul>\r\n<li>In the traditional way of thinking, Vocational Education and Training (VET) programmes tended to be downgraded and considered as a default option for &ldquo;dropouts&rdquo; from and &ldquo;failures&rdquo; of the academically oriented formal educational system. There is the need to bring VET programmes into &ldquo;preferred options&rdquo; available for the youth. This requires proper and effective career guidance programmes, focused on attributes, abilities and aptitudes of the youth, identified at early stages, even before they appear for formal examinations like the GCE O-level. Proper &ldquo;branding&rdquo; and correct &ldquo;positioning&rdquo; of VET programmes are essential to attract and divert youth to acquire employable skills and competencies leading to gainful and productive occupations in the VET sector. Competent well trained Career Guidance Counsellors, supported by a centralised computerised database of all Tertiary and Vocational Education and Training opportunities available throughout the island are required.</li>\r\n<li>The following comments are in order regarding Career Guidance services that are available today:&nbsp;        \r\n<ul>\r\n<li>Career guidance services at Secondary Schools provided by the Ministry of Education through Career Guidance Units have over 600 teachers trained in career guidance providing services. These numbers are insufficient to serve the needs of over 3 million students at secondary schools. It is also observed that the school career guidance teachers lack contact and understanding of the world of work to be successful in guidance. As a result career guidance is not available to the bulk of the students during their school careers. They follow mostly the advice of parents who promote their offspring to follow academic courses leading to university.</li>\r\n<li>The emphasis of career guidance services at universities is on placement at employment, generally relevant to the area of study and the specific skills acquired. The students in the general degree programs in Arts, Sciences requires to be exposed to further study / training in specific fields or common career options. The Units headed by internal academic staff may lack understanding of industry / world of work.</li>\r\n<li>Independent career guidance centers established by the Ministry of Labour &amp; Labour Relations, Provincial Councils etc. are independent of specific career focus and are providing services of a general nature. The skills and abilities of the career guidance officers are to create awareness of those coming for their advice. Without exposure to or experience of the world of work, they are usually unable to provide guidance in regard to specific career paths.</li>\r\n<li>Career Guidance Units in various training institutions like NYSC, NAITA, VTA and so on focus on specific careers associated with these Institutes in contrast to an overall guidance based on the attributes of the guidance seekers.</li>\r\n</ul>\r\n</li>\r\n<li>T<strong>he above brief analysis provides a general picture of the status of Career Guidance at present. The basic weaknesses are the compartmentalization of the services, inconsistency in approach, poor communications leading to failure to reach the target audience, lack of knowledge of options even at Counselor level and total unavailability of reliable data on future job demands.</strong></li>\r\n</ul>', 1, 7),
(2, 'Test', '<p>this is just a test</p>', 0, 7),
(3, 'Finding the Right Career', '<div><img style="display: block; margin-left: auto; margin-right: auto;" src="http://www.helpguide.org/images/work_career/right_career_225.jpg" alt="" width="225" height="169" /></div>\r\n<ul>\r\n<li>Whether you&rsquo;re just leaving school, finding opportunities limited in your current position or, like many in this economy, facing unemployment, it may be time to consider your career path. Regardless of your reasons, the right career is out there for everyone. By learning how to research options, realize your strengths, and acquire new skills, as well as muster the courage to make a change, you can discover the career that&rsquo;s right for you. You may have fallen into the trap of thinking the sole point of work is to bring home enough money to live comfortably. While adequate compensation is important in any job, it&rsquo;s not the whole story. If you are unsatisfied with what you do every day, it takes a toll on your physical and mental health. You may feel burned out and frustrated, anxious, depressed, or unable to enjoy time at home knowing another workday is ahead. What&rsquo;s more, if you don&rsquo;t find your work meaningful and rewarding, it&rsquo;s hard to keep the momentum going to advance in your career. You are more likely to be successful in a career that you feel passionate about. Whether you&rsquo;re looking to enter the work force for the first time or contemplating a career change, the first step to choosing a fulfilling career is to uncover the activities that get you excited and bring you joy.</li>\r\n</ul>', 0, 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `batches` (`id`, `academic_year`, `registration_state`) VALUES
(1, '2008/2009', 0),
(2, '2009/2010', 1);

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
  `registration_num_header_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `first_name` (`first_name`,`last_name`,`reg_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `students` (`id`, `first_name`, `middle_name`, `last_name`, `phone_home`, `phone_mob`, `email`, `password`, `photo`, `group_id`, `reg_number`, `gender`, `date_of_birth`, `address1`, `address2`, `city`, `freez_state`, `industry_ready`, `approved_state`, `linkedin_ref`, `study_program_id`, `batch_id`, `registration_num_header_id`) VALUES
(1, 'Uditha', 'Bandara', 'Wijerathna', '0372243234', '0772315516', 'udithabnd@gmail.com', '8463bd09bf1a6867ae282a101f52aab0ef650a47', '5203c1d1-36fc-42f3-9b07-0688740d37dd', 0, '047', 'M', '1988-04-08', 'aaa', 'sss', 'sss', 0, 0, 0, '', 1, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

INSERT INTO `subjects` (`id`, `name`, `description`) VALUES
(14, 'ICT', 'Information & Communication Technology'),
(15, 'MAA', 'Mathematics Applied'),
(17, 'ssss', 'jhjgytfu');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

INSERT INTO `system_users` (`id`, `first_name`, `middle_name`, `last_name`, `phone_home`, `phone_mobile`, `email`, `password`, `reset_password_token`, `token_created_at`, `photo`, `group_id`, `biography`, `designation`) VALUES
(7, 'Uditha', 'Bandara', 'Wijerathna', '0372243234', '0772315516', 'udithabnd@gmail.com', '371e1512a0435aed69de4619805784f47970d2c9', '', '0000-00-00 00:00:00', '5203508f-dc5c-4d78-9cd3-245e740d37dd', 1, 'Hii', 'Students'),
(8, 'Yohani', 'Shayamindi', 'Ranasinghe', '', '', 'yohani.ysr@gmail.com', '5c4c6b7e3ccd612e84576cbc4f68a3ffe5e16ab9', '', '0000-00-00 00:00:00', '52035055-5c04-47b9-b283-0689740d37dd', 1, 'This is yohani', 'Student');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
