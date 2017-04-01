-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2015 at 04:05 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `voting`
--
CREATE DATABASE `voting` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `voting`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_member_account`
--

CREATE TABLE IF NOT EXISTS `admin_member_account` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(100) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL,
  `admin_firstname` varchar(100) DEFAULT NULL,
  `admin_lastname` varchar(100) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_website` varchar(100) DEFAULT NULL,
  `admin_gender` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_member_account`
--

INSERT INTO `admin_member_account` (`admin_id`, `admin_username`, `admin_password`, `admin_firstname`, `admin_lastname`, `admin_email`, `admin_website`, `admin_gender`) VALUES
(1, 'john', '527bd5b5d689e2c32ae974c6229ff785', 'John Robert', 'Jerodiaz', 'johnrobertjerodiaz@gmail.com', 'www.codefight.com', 'male'),
(2, 'lorenzo', '3334703c735bd09f54c377b4dfaac1c3', 'Lorenzo', 'Jerodiaz', 'lorenzojerodiaz@gmail.com', 'www.codefight.com', 'male'),
(3, 'idiotflakes', '66a69d43bde75ed160176c02e26b3171', 'Michael', 'Larrubis', 'idiotflakes@gmail.com', 'www.idiot.com', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `admin_member_information`
--

CREATE TABLE IF NOT EXISTS `admin_member_information` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `admin_u_id` int(3) DEFAULT NULL,
  `admin_role` int(3) DEFAULT NULL,
  `admin_status` int(3) DEFAULT NULL,
  `admin_access` int(3) DEFAULT NULL,
  `admin_last_login` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_member_information`
--

INSERT INTO `admin_member_information` (`id`, `admin_u_id`, `admin_role`, `admin_status`, `admin_access`, `admin_last_login`) VALUES
(1, 1, 1, 1, 1, '02:30:20am | Friday 2015-03-20'),
(2, 2, 2, 0, 1, '02:11:42am | Friday 2015-03-20'),
(3, 3, 2, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_message`
--

CREATE TABLE IF NOT EXISTS `admin_message` (
  `message_id` int(3) NOT NULL AUTO_INCREMENT,
  `message_content` longtext,
  `message_recipient_id` int(3) DEFAULT NULL,
  `message_sender_id` int(3) DEFAULT NULL,
  `message_date_sent` varchar(100) DEFAULT NULL,
  `message_time_sent` varchar(100) DEFAULT NULL,
  `message_status` int(3) DEFAULT NULL,
  `message_source_status` int(3) DEFAULT NULL,
  `message_receiver_status` int(3) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin_message`
--

INSERT INTO `admin_message` (`message_id`, `message_content`, `message_recipient_id`, `message_sender_id`, `message_date_sent`, `message_time_sent`, `message_status`, `message_source_status`, `message_receiver_status`) VALUES
(1, 'hi', 2, 1, '2015-03-18 Wednesday', '05:37:17pm', 1, 0, 1),
(2, '                    hi                    ', 2, 1, '2015-03-18 Wednesday', '09:55:40pm', 0, 1, 1),
(3, 'hello', 1, 2, '2015-03-19 Thursday', '04:49:01pm', 0, 1, 1),
(4, 'Test message', 1, 2, '2015-03-20 Friday', '09:12:23am', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_request`
--

CREATE TABLE IF NOT EXISTS `admin_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contributor_id` int(11) NOT NULL,
  `request` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_member`
--

CREATE TABLE IF NOT EXISTS `candidate_member` (
  `candidate_id` int(3) NOT NULL AUTO_INCREMENT,
  `candidate_voters_u_id` int(3) DEFAULT NULL,
  `candidate_election_id` int(3) DEFAULT NULL,
  `candidate_position_id` int(3) DEFAULT NULL,
  `candidate_team_id` int(3) DEFAULT NULL,
  `candidate_registered_by` int(3) DEFAULT NULL,
  PRIMARY KEY (`candidate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `candidate_member`
--

INSERT INTO `candidate_member` (`candidate_id`, `candidate_voters_u_id`, `candidate_election_id`, `candidate_position_id`, `candidate_team_id`, `candidate_registered_by`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 3, 1, 2, 0, 1),
(4, 2, 1, 2, 1, 1),
(5, 7, 1, 1, 2, 1),
(6, 8, 1, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `costumer_message`
--

CREATE TABLE IF NOT EXISTS `costumer_message` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `costumer_firstname` varchar(100) DEFAULT NULL,
  `costumer_lastname` varchar(100) DEFAULT NULL,
  `costumer_email` varchar(100) DEFAULT NULL,
  `costumer_message` longtext,
  `default_reciever` int(3) DEFAULT NULL,
  `costumer_message_status` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `costumer_message`
--

INSERT INTO `costumer_message` (`id`, `costumer_firstname`, `costumer_lastname`, `costumer_email`, `costumer_message`, `default_reciever`, `costumer_message_status`) VALUES
(2, 'jordan', 'salandron', 'jordan@gmail.com', 'hi to the admin of the site\r\n                    ', 1, 1),
(3, 'John Andrew', 'Gempayan', 'john@gmail.com', 'This is the second testing\r\n                    ', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
  `election_id` bigint(100) NOT NULL AUTO_INCREMENT,
  `election_name` varchar(200) DEFAULT NULL,
  `election_description` longtext,
  `election_date_created` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`election_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`election_id`, `election_name`, `election_description`, `election_date_created`) VALUES
(1, 'SSG ELECTION 2015', 'This is the ssg election 2015', '10:34:59am | Wednesday 2015-03-18'),
(2, 'SSG ELECTION 2016', 'This is the ssge election  2016', '10:40:16am | Wednesday 2015-03-18'),
(3, 'last eleciton crasdfds', 'last eleciton crasdfdslast eleciton crasdfdslast eleciton crasdfds', '09:55:27am | Thursday 2015-03-19'),
(4, 'last eleciton crasdfdslast eleciton crasdfds', 'last eleciton crasdfdslast eleciton crasdfdslast eleciton crasdfds', '09:56:07am | Thursday 2015-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `election_info`
--

CREATE TABLE IF NOT EXISTS `election_info` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `election_u_id` int(3) DEFAULT NULL,
  `election_created_by` int(3) DEFAULT NULL,
  `election_started_by` int(3) DEFAULT NULL,
  `election_stoped_by` int(3) DEFAULT NULL,
  `election_status` int(3) DEFAULT NULL,
  `election_screening` int(3) DEFAULT NULL,
  `election_notify` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `election_info`
--

INSERT INTO `election_info` (`id`, `election_u_id`, `election_created_by`, `election_started_by`, `election_stoped_by`, `election_status`, `election_screening`, `election_notify`) VALUES
(1, 1, 1, 1, 1, 1, 1, NULL),
(2, 2, 1, NULL, NULL, 0, 1, NULL),
(3, 3, 1, NULL, NULL, 0, 1, NULL),
(4, 4, 2, NULL, NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `election_result`
--

CREATE TABLE IF NOT EXISTS `election_result` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `voters` varchar(100) DEFAULT NULL,
  `election_id` int(3) DEFAULT NULL,
  `position_id` int(3) DEFAULT NULL,
  `candidate_id` int(3) DEFAULT NULL,
  `date_voted` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `election_result`
--

INSERT INTO `election_result` (`id`, `voters`, `election_id`, `position_id`, `candidate_id`, `date_voted`) VALUES
(1, 'J8L4HG79AZ', 1, 1, 1, '04:39:11pm | Wednesday 2015-03-18'),
(2, 'J8L4HG79AZ', 1, 2, 6, '04:39:11pm | Wednesday 2015-03-18'),
(3, '3TJ9CYZKPW', 1, 1, 5, '08:50:23am | Thursday 2015-03-19'),
(4, '3TJ9CYZKPW', 1, 2, 2, '08:50:23am | Thursday 2015-03-19'),
(5, 'YAPMQ48GFN', 1, 1, 1, '08:52:13am | Thursday 2015-03-19'),
(6, 'YAPMQ48GFN', 1, 2, 4, '08:52:13am | Thursday 2015-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `election_voter_management`
--

CREATE TABLE IF NOT EXISTS `election_voter_management` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `manage_election_id` int(3) DEFAULT NULL,
  `bs_ed` int(3) DEFAULT NULL,
  `be_ed` int(3) DEFAULT NULL,
  `bs_crim` int(3) DEFAULT NULL,
  `bs_mare` int(3) DEFAULT NULL,
  `bs_mt` int(3) DEFAULT NULL,
  `bs_ce` int(3) DEFAULT NULL,
  `bs_ee` int(3) DEFAULT NULL,
  `bs_me` int(3) DEFAULT NULL,
  `bs_it` int(3) DEFAULT NULL,
  `bs_ba` int(3) DEFAULT NULL,
  `bs_hrm` int(3) DEFAULT NULL,
  `bs_n` int(3) DEFAULT NULL,
  `a_hrm` int(3) DEFAULT NULL,
  `a_ct` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `election_voter_management`
--

INSERT INTO `election_voter_management` (`id`, `manage_election_id`, `bs_ed`, `be_ed`, `bs_crim`, `bs_mare`, `bs_mt`, `bs_ce`, `bs_ee`, `bs_me`, `bs_it`, `bs_ba`, `bs_hrm`, `bs_n`, `a_hrm`, `a_ct`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `eposition`
--

CREATE TABLE IF NOT EXISTS `eposition` (
  `position_id` bigint(100) NOT NULL AUTO_INCREMENT,
  `position_election_id` int(100) DEFAULT NULL,
  `position_name` varchar(200) DEFAULT NULL,
  `position_screening` int(3) DEFAULT NULL,
  `position_created_by` int(3) DEFAULT NULL,
  `position_notify` int(3) DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `eposition`
--

INSERT INTO `eposition` (`position_id`, `position_election_id`, `position_name`, `position_screening`, `position_created_by`, `position_notify`) VALUES
(1, 1, 'President', 1, 1, NULL),
(2, 1, 'Vice Presedent', 1, 1, NULL),
(4, 2, 'President', 1, 2, 0),
(5, 2, 'Vice President', 1, 2, 0),
(6, 2, 'Secretary', 0, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registered_voter`
--

CREATE TABLE IF NOT EXISTS `registered_voter` (
  `registered_id` int(3) NOT NULL AUTO_INCREMENT,
  `registered_voters_u_id` int(3) DEFAULT NULL,
  `registered_voters_password` varchar(100) DEFAULT NULL,
  `registered_voters_code` varchar(100) DEFAULT NULL,
  `registered_voters_username` varchar(100) DEFAULT NULL,
  `registered_voters_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`registered_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `registered_voter`
--

INSERT INTO `registered_voter` (`registered_id`, `registered_voters_u_id`, `registered_voters_password`, `registered_voters_code`, `registered_voters_username`, `registered_voters_date`) VALUES
(1, 1, 'password', 'J8L4HG79AZ', 'john', '04:38:41am | Wednesday 2015-03-04'),
(2, 3, 'Mesael123', '3TJ9CYZKPW', 'Mesael', '03:40:16am | Saturday 2015-03-07'),
(4, 2, 'idiotflakes', 'YAPMQ48GFN', 'idiotflakes', '04:32:56am | Wednesday 2015-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `team_id` bigint(100) NOT NULL AUTO_INCREMENT,
  `team_election_id` int(3) DEFAULT NULL,
  `team_name` varchar(100) DEFAULT NULL,
  `team_created_by` int(3) DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_election_id`, `team_name`, `team_created_by`) VALUES
(1, 1, 'MYA-UT', 1),
(2, 1, 'TAG-AS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voter_member`
--

CREATE TABLE IF NOT EXISTS `voter_member` (
  `voters_id` int(3) NOT NULL AUTO_INCREMENT,
  `voters_schoolid` varchar(100) DEFAULT NULL,
  `voters_firstname` varchar(100) DEFAULT NULL,
  `voters_middlename` varchar(100) DEFAULT NULL,
  `voters_lastname` varchar(100) DEFAULT NULL,
  `voters_birthday` varchar(100) DEFAULT NULL,
  `voters_birthmonth` varchar(100) DEFAULT NULL,
  `voters_birthyear` varchar(100) DEFAULT NULL,
  `voters_civilstatus` varchar(100) DEFAULT NULL,
  `voters_citizenship` varchar(100) DEFAULT NULL,
  `voters_address` varchar(100) DEFAULT NULL,
  `voters_course` varchar(100) DEFAULT NULL,
  `voters_fatherfirstname` varchar(100) DEFAULT NULL,
  `voters_fatherlastname` varchar(100) DEFAULT NULL,
  `voters_motherfirstname` varchar(100) DEFAULT NULL,
  `voters_motherlastname` varchar(100) DEFAULT NULL,
  `voters_gender` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`voters_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `voter_member`
--

INSERT INTO `voter_member` (`voters_id`, `voters_schoolid`, `voters_firstname`, `voters_middlename`, `voters_lastname`, `voters_birthday`, `voters_birthmonth`, `voters_birthyear`, `voters_civilstatus`, `voters_citizenship`, `voters_address`, `voters_course`, `voters_fatherfirstname`, `voters_fatherlastname`, `voters_motherfirstname`, `voters_motherlastname`, `voters_gender`) VALUES
(1, '000-001', 'John Robert', 'Pahayahay', 'Jerodiaz', '13', 'December', '1993', 'Single', 'Filipino', 'Johnrobertjerodiaz@gmail.com', 'BSIT - Bachelor of Science in Information Technology', 'Lorenzo', 'Jerodiaz', 'Emelia', 'Jerodiaz', 'male'),
(2, '000-002', 'Michael Angelo', 'Prahinog', 'Larubis', '7', 'November', '2014', 'Single', 'Filipino', 'Prahinog@yahoo.com', 'BSIT - Bachelor of Science in Information Technology', 'Gwapo', 'Larubis', 'Gwapa', 'Larubis', 'male'),
(3, '000-003', 'Mesael', 'Gwapohon', 'Belucora', '1', 'January', '2014', 'Single', 'Filipino', 'Belocura@gmail.com', 'BSIT - Bachelor of Science in Information Technology', 'Gwapo', 'Belocura', 'Gwapa', 'Belocura', 'male'),
(7, '222222', 'Mary Joy', 'Gwapa', 'Magalso', '16', 'April', '2001', 'Single', 'Filipino', 'Hello', 'BSHRM - Bachelor of Science in Hotel and Restaurant Management', 'Haha', 'Haha', 'Hoho', 'Hoho', 'female'),
(8, '99999', 'Brian', 'Pahayahay', 'Jerodiaz', '1', 'January', '2014', 'Single', 'filipino', 'tabok mandaue city', 'BSIT - Bachelor of Science in Information Technology', 'Lore', 'Jerodiaz', 'Lorna', 'Jerodiaz', 'male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
