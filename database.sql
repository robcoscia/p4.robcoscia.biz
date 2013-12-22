-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2013 at 12:46 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `robcosci_p4_robcoscia_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_type_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_by` varchar(80) NOT NULL,
  `created` int(11) NOT NULL,
  `modified_by` varchar(80) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`class_id`),
  KEY `class_type_id` (`class_type_id`,`day_id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `day_id` (`day_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_type_id`, `teacher_id`, `day_id`, `start_time`, `end_time`, `description`, `created_by`, `created`, `modified_by`, `modified`) VALUES
(3, 1, 3, 0, '18:00:00', '19:15:00', 'All levels Vinyasa', 'RJC', 1387721126, 'RJC', 1387721126),
(4, 1, 3, 1, '09:00:00', '10:00:00', 'All-levels Vinyasa', 'robcoscia@comcast.net', 1387727009, 'robcoscia@comcast.net', 1387727009),
(5, 1, 1, 1, '19:00:00', '20:00:00', 'Candlelight Flow', 'robcoscia@comcast.net', 1387727496, 'robcoscia@comcast.net', 1387727496),
(6, 1, 2, 2, '18:30:00', '19:40:00', 'Power Yoga', 'robcoscia@comcast.net', 1387727961, 'robcoscia@comcast.net', 1387727961),
(7, 1, 4, 3, '18:30:00', '19:30:00', 'All-levels Vinyasa', 'robcoscia@comcast.net', 1387728056, 'robcoscia@comcast.net', 1387728056),
(8, 1, 2, 4, '16:30:00', '17:30:00', 'All-levels Vinyasa', 'robcoscia@comcast.net', 1387728157, 'robcoscia@comcast.net', 1387728157),
(9, 1, 4, 5, '09:30:00', '10:30:00', 'All-levels Vinyasa', 'robcoscia@comcast.net', 1387728259, 'robcoscia@comcast.net', 1387728259),
(10, 1, 4, 5, '10:45:00', '11:45:00', 'Beginners / Gentle', 'robcoscia@comcast.net', 1387728376, 'robcoscia@comcast.net', 1387728376);

-- --------------------------------------------------------

--
-- Table structure for table `class_types`
--

CREATE TABLE `class_types` (
  `class_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(40) NOT NULL,
  `active_flg` char(1) NOT NULL DEFAULT 'Y',
  `created` int(11) NOT NULL,
  PRIMARY KEY (`class_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `class_types`
--

INSERT INTO `class_types` (`class_type_id`, `type`, `active_flg`, `created`) VALUES
(1, 'yoga', 'Y', 12),
(2, 'pilates', 'Y', 12);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `day_id` int(11) NOT NULL,
  `long_name` varchar(10) NOT NULL,
  `short_name` varchar(4) NOT NULL,
  `active_flg` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`day_id`, `long_name`, `short_name`, `active_flg`) VALUES
(0, 'Monday', 'Mon', 'Y'),
(1, 'Tuesday', 'Tue', 'Y'),
(2, 'Wednesday', 'Wed', 'Y'),
(3, 'Thursday', 'Thu', 'Y'),
(4, 'Friday', 'Fri', 'Y'),
(5, 'Saturday', 'Sat', 'Y'),
(6, 'Sunday', 'Sun', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `biography` text,
  `picture` varchar(255) DEFAULT NULL,
  `active_flg` char(1) NOT NULL DEFAULT 'Y',
  `created_by` varchar(80) NOT NULL,
  `created` int(11) NOT NULL,
  `modified_by` varchar(80) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `first_name`, `last_name`, `biography`, `picture`, `active_flg`, `created_by`, `created`, `modified_by`, `modified`) VALUES
(1, 'Chelsea', 'Schmidt', 'As an actor and a runner Chelsea sought out yoga as a means to nurture her body and mind. She approaches her teaching just as she approaches her life: playfully and enthusiastically! She has a passion for intelligent sequencing and fun flows that are suitable for students of all skill levels.\n\nCertification: 200hr Training — with Chelsea Schmidt.', NULL, 'Y', 'RJC', 1387140769, 'RJC', 1387140769),
(2, 'Stefanie', 'Finoccio', 'Stefanie found her yoga practice 9 years ago. From that first step into class until now has been an on-going journey and transformation. Stefanie focuses on breath, movement and total mind-body awareness. She not only instructs her students, but also gives them the tools and knowledge to bring their practice outside the studio – on or off the mat. Stefanie tries to instill honoring your body and loving one self and leaving what simply does not suit you at the door.\nCertifications: 200hr Training, Thai Yoga Massage\n\nCertifications: 200hr Training, Thai Yoga Massage', NULL, 'Y', 'RJC', 1387140970, 'RJC', 1387140970),
(3, 'Suzanne', 'Dufresne', 'Suzanne brings nearly a decade’s experience to her yoga practice. By attending various workshops and yoga classes, she continually explores the many layers and benefits of practicing yoga both on and off the mat. Suzanne imparts yoga as much more than a physical workout, encouraging students to find their inner strength. Witnessing her students’ transformations is one of her greatest joys in teaching.\n\n“I love sharing with others what my yoga practice has given to me.” \n Certification: 200 hr training', NULL, 'Y', 'RJC', 1387148151, 'RJC', 1387148151),
(4, 'Samantha', 'Harkin', 'After a life of classical ballet and modern dance training, Samantha was introduced to yoga and was instantly smitten. Initially drawn to Ashtanga for its physically dynamic and challenging nature, she soon became equally attracted to the practice’s more subtle qualities of breath control and meditation. \\r\\n\\r\\nRecently relocated from Donegal, Ireland, her home for seven years, we’re happy to welcome Samantha back to the states to impart the traditional Ashtanga yoga system in a way that makes it accessible to people of all levels of ability. Samantha will also be offering Prenatal and Mom & Baby Yoga series at Saanti. \\r\\n \nCertifications: 200hr Training, Yoga for Pregnancy', NULL, 'Y', 'RJC', 1387724777, 'RJC', 1387724777),
(5, 'Kayla', 'Grossman', 'With a professional background in nursing, Kayla has long been enchanted by the dynamic interplay of movement, breath and mindfulness in bringing about wellness and healing. In her work, she aspires to build an empowering framework that encourages full and joyful living. In each class, Kayla hopes to share a little something- a phrase, a pose, or a new piece of knowledge, however small- that inspires others in their unique creative expression. \n\nCertification: 200hr Training', NULL, 'Y', 'RJC', 1387724917, 'RJC', 1387724917);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'USER',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`, `role`) VALUES
(5, 1387658731, 1387658731, 'e77d69f86252668e3786ae28260c2c7debbb25ec', '8716c91a49635ccc7536068fb74b4e5f66932427', 0, 0, 'Robert', 'Coscia', 'robcoscia@comcast.net', 'ADMIN'),
(6, 1387661902, 1387661902, '9b055b5d3a84b5ad2472308380aaf637bb82858d', '4c5bda712896518f2fc96c424d9a0243ade94286', 0, 0, 'Chelsea', 'Schmidt', 'cschmidt@gmail.com', 'USER');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`class_type_id`) REFERENCES `class_types` (`class_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `classes_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `classes_ibfk_4` FOREIGN KEY (`day_id`) REFERENCES `days` (`day_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
