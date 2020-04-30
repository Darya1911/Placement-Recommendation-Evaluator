-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 07:40 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streamanalysis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(50) NOT NULL,
  `adminpassword` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminpassword`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `aptitude`
--

CREATE TABLE `aptitude` (
  `aid` int(50) NOT NULL,
  `aname` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(50) NOT NULL,
  `cname` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`) VALUES
(101, 'Physics'),
(102, 'Chemistry'),
(103, 'Database Administrator'),
(104, 'Networking Expert'),
(105, 'Software Development');

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `did` int(50) NOT NULL,
  `cgpi` varchar(250) NOT NULL,
  `backlogs` varchar(250) NOT NULL,
  `aggregate` varchar(250) NOT NULL,
  `skill` tinytext NOT NULL,
  `aptiscore` varchar(50) NOT NULL,
  `coursescore` varchar(50) NOT NULL,
  `coursename` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`did`, `cgpi`, `backlogs`, `aggregate`, `skill`, `aptiscore`, `coursescore`, `coursename`) VALUES
(9, '7', '2', '75', 'C, Java, CCNA', '10', '12', 'Networking Domain'),
(12, '7.4', '1', '74', 'C, Java, HTML, CSS', '6', '4', 'Better Try Again !! or Startups will be a good opt'),
(8, '7.5', '1', '75', 'Core Java, C, Web Development', '10', '8', 'TCS'),
(10, '6.98', '2', '79', 'Reading, C, Java, HTML, CSS', '14', '10', 'Accenture !! or Web Development as Carrier Domain'),
(11, '9.4', '3', '80', 'Java, Python, Writing, Communication Skills, PHP', '12', '11', 'Cabgemini !! or Application Development '),
(13, '6.5', '1', '68', 'Java, Coding, HTML, Communication Skills', '12', '9', 'ECW or Suport'),
(14, '8.3', '4', '76', 'Programming, Java, Analysis, Presentation, Reading', '13', '10', 'Atos or Zeus'),
(15, '7.7', '0', '80', 'Programming, Web development, Java ', '9', '11', 'Good to go ahead in this domain !!');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(50) NOT NULL,
  `qname` tinytext NOT NULL,
  `qlevel` varchar(50) NOT NULL,
  `option1` varchar(250) NOT NULL,
  `option2` varchar(250) NOT NULL,
  `option3` varchar(250) NOT NULL,
  `option4` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `qtype` varchar(250) NOT NULL,
  `typename` varchar(250) NOT NULL,
  `marks` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `qname`, `qlevel`, `option1`, `option2`, `option3`, `option4`, `answer`, `qtype`, `typename`, `marks`) VALUES
(3, 'The Centre for Cellular and Molecular Biology is situated at', 'Level 1', 'Patna', 'Jaipur', 'Hyderabad', 'New Delhi', 'Hyderabad', 'aptitude', 'G.K.', 1),
(4, 'Where is the Railway Staff College located?', 'Level 1', 'Pune', 'Allahabad', 'Vadodara', 'Delhi', 'Vadodara', 'aptitude', 'G.K.', 1),
(5, 'The famous Dilwara Temples are situated in', 'Level 1', 'Uttar Pradesh', 'Rajasthan ', 'Maharashtra', 'Madhya Pradesh', 'Rajasthan', 'aptitude', 'G.K.', 1),
(6, ' \nWadia Institute of Himalayan Geology is located at', 'Level 1', 'Delhi', 'Shimla', 'Dehradun', 'Kulu', 'Dehradun', 'aptitude', 'G.K.', 1),
(7, 'Bijapur is known for its', 'Level 1', 'severe drought condition', 'Gol Gumbaz', 'heavy rainfall', 'statue of Gomateswara', 'Gol Gumbaz', 'aptitude', 'G.K.', 1),
(8, 'The headquarters of the National Power Training institute is located in', 'Level 1', 'Pune', 'Bhopal', 'Faridabad', 'Lucknow', 'Faridabad', 'aptitude', 'G.K.', 1),
(9, ' \nTo make clean breast of', 'Level 1', 'To gain prominence', 'To praise oneself', 'To confess without of reserve', 'To destroy before it blooms', 'To confess without of reserve', 'aptitude', 'English', 1),
(10, ' \nTo keeps one\'s temper', 'Level 1', 'To become hungry', 'To be in good mood', 'To preserve ones energy', 'To be aloof from', 'To be in good mood', 'aptitude', 'English', 1),
(11, ' \nTo catch a tartar', 'Level 1', 'To trap wanted criminal with great difficulty', 'To catch a dangerous person', 'To meet with disaster', 'To deal with a person who is more than one\'s match', 'To catch a dangerous person', 'aptitude', 'English', 1),
(12, 'To drive home', 'Level 1', 'To find one\'s roots', 'To return to place of rest', 'Back to original position', 'To emphasise', 'To emphasise', 'aptitude', 'English', 1),
(13, 'To have an axe to grind', 'Level 1', 'A private end to serve', 'To fail to arouse interest', 'To have no result', 'To work for both sides', 'A private end to serve', 'aptitude', 'English', 1),
(14, 'To cry wolf', 'Level 1', 'To listen eagerly', 'To give false alarm', 'To turn pale', 'To keep off starvation', 'To give false alarm', 'aptitude', 'English', 1),
(15, ' \nFind the greatest number that will divide 43, 91 and 183 so as to leave the same remainder in each case.', 'Level 1', '4', '7', '9', '13', '4', 'aptitude', 'Maths', 1),
(16, ' \nThe H.C.F. of two numbers is 23 and the other two factors of their L.C.M. are 13 and 14. The larger of the two numbers is:', 'Level 1', '276', '299', '322', '345', '322', 'aptitude', 'Maths', 1),
(17, ' \nSix bells commence tolling together and toll at intervals of 2, 4, 6, 8 10 and 12 seconds respectively. In 30 minutes, how many times do they toll together ?', 'Level 1', '4', '10', '15', '16', '16', 'aptitude', 'Maths', 1),
(18, 'Let N be the greatest number that will divide 1305, 4665 and 6905, leaving the same remainder in each case. Then sum of the digits in N is:', 'Level 1', '4', '5', '6', '8', '4', 'aptitude', 'Maths', 1),
(19, 'The greatest number of four digits which is divisible by 15, 25, 40 and 75 is:', 'Level 1', '9000', '9400', '9600', '9800', '9600', 'aptitude', 'Maths', 1),
(20, 'The product of two numbers is 4107. If the H.C.F. of these numbers is 37, then the greater number is:', 'Level 1', '101', '111', '107', '185', '111', 'aptitude', 'Maths', 1),
(21, 'Radiocarbon is produced in the atmosphere as a result of', 'Level 1', 'collision between fast neutrons and nitrogen nuclei present in the atmosphere', 'action of ultraviolet light from the sun on atmospheric oxygen', 'action of solar radiations particularly cosmic rays on carbon dioxide present in the atmosphere', 'lightning discharge in atmosphere', 'collision between fast neutrons and nitrogen nuclei present in the atmosphere', 'course', 'Physics', 1),
(22, ' \nIt is easier to roll a stone up a sloping road than to lift it vertical upwards because', 'Level 1', 'work done in rolling is more than in lifting', 'work done in lifting the stone is equal to rolling it', 'work done in both is same but the rate of doing work is less in rolling', 'work done in rolling a stone is less than in lifting it', 'work done in rolling a stone is less than in lifting it', 'course', 'Physics', 1),
(23, ' \nThe absorption of ink by blotting paper involves', 'Level 1', 'viscosity of ink', 'capillary action phenomenon', 'diffusion of ink through the blotting', 'siphon action', 'capillary action phenomenon', 'course', 'Physics', 1),
(24, 'Siphon will fail to work if', 'Level 1', 'the densities of the liquid in the two vessels are equal', 'the level of the liquid in the two vessels are at the same height', 'both its limbs are of unequal length', 'the temperature of the liquids in the two vessels are the same', 'the level of the liquid in the two vessels are at the same height', 'course', 'Physics', 1),
(25, 'Large transformers, when used for some time, become very hot and are cooled by circulating oil. The heating of the transformer is due to', 'Level 1', 'the heating effect of current alone', 'hysteresis loss alone', 'both the heating effect of current and hysteresis loss', 'intense sunlight at noon', 'both the heating effect of current and hysteresis loss', 'course', 'Physics', 1),
(26, 'Nuclear sizes are expressed in a unit named', 'Level 1', 'Fermi', 'angstrom', 'newton', 'tesla', 'Fermi', 'course', 'Physics', 1),
(27, ' \nLight year is a unit of', 'Level 1', 'Time', 'Distance ', 'Light', 'intensity of light', 'Distance', 'course', 'Physics', 1),
(28, 'Mirage is due to', 'Level 1', 'unequal heating of different parts of the atmosphere', 'magnetic disturbances in the atmosphere', 'depletion of ozone layer in the atmosphere', 'equal heating of different parts of the atmosphere', 'unequal heating of different parts of the atmosphere', 'course', 'Physics', 1),
(29, 'Light from the Sun reaches us in nearly', 'Level 1', '2 minutes', '4 minutes', '8 minutes', '16 minutes', '8 minutes', 'course', 'Physics', 1),
(30, 'Stars appears to move from east to west because', 'Level 1', 'all stars move from east to west', 'the earth rotates from west to east', 'the earth rotates from east to west', 'the background of the stars moves from west to east', 'the earth rotates from west to east', 'course', 'Physics', 1),
(31, ' \nPa(Pascal) is the unit for', 'Level 1', 'thrust', 'pressure', 'frequency', 'conductivity', 'pressure', 'course', 'Physics', 1),
(32, 'Planets do not twinkle because', 'Level 1', 'they emit light of a constant intensity', 'their distance from the earth does not change with time', 'they are very far away from the earth resulting in decrease in intensity of light', 'they are nearer to earth and hence we receive a greater amount of light and, therefore minor variations in the intensity are not noticeable', 'they are nearer to earth and hence we receive a greater amount of light and, therefore minor variations in the intensity are not noticeable', 'course', 'Physics', 1),
(33, ' \nMetals are good conductors of electricity because', 'Level 1', 'they contain free electrons', 'the atoms are lightly packed', 'they have high melting point', 'All of the above', 'they contain free electrons', 'course', 'Physics', 1),
(34, 'Let a thin capillary tube be replaced with another tube of insufficient length then, we find water', 'Level 1', 'will overflow', 'will not rise', 'depressed', 'change its meniscus', 'will not rise', 'course', 'Physics', 1),
(35, 'Out of the following pairs, choose the pair in which the physical quantities do not have identical dimension?', 'Level 1', 'Pressure and Young\'s modules', 'Planck\'s constant and Angular momentum', 'Impulse and moment of force', 'Force and rate of change of linear momentum', 'Impulse and moment of force', 'course', 'Physics', 1),
(36, ' \nIf two bodies of different masses, initially at rest, are acted upon by the same force for the same time, then the both bodies acquire the same', 'Level 1', 'velocity', 'momentum', 'acceleration', 'kinetic energy', 'momentum', 'course', 'Physics', 1),
(37, 'Pick out the scalar quantity', 'Level 2', 'force', 'pressure', 'Velocity', 'Accelration', 'pressure', 'course', 'Physics', 1),
(38, 'Rectifiers are used to convert', 'Level 2', 'Direct current to Alternating current', 'Alternating current to Direct current', 'high voltage to low voltage', 'low voltage to high voltage', 'Alternating current to Direct current', 'course', 'Physics', 1),
(39, 'out of the following, which is not emitted by radioactive substance?', 'Level 2', 'Electrons', 'Electromagnetic radiations', 'Alpha particles', 'Neutrons', 'Neutrons', 'course', 'Physics', 1),
(40, 'Sound waves in air are', 'Level 2', 'transverse', 'longitudinal', 'electromagnetic', 'polarised', 'longitudinal', 'course', 'Physics', 1),
(41, 'Magnetism at the centre of a bar magnet is', 'Level 2', 'minimum', 'maximum', 'zero', 'minimum or maximum', 'zero', 'course', 'Physics', 1),
(42, 'It is more difficult to walk on a sandy road than on a concrete road because', 'Level 2', 'sand is soft and concreter is hard', 'the friction between sand and feet is less than that between concrete and feet', 'the friction between sand and feet is more than that between concrete and feet', 'the sand is grainy but concrete is smooth', 'the friction between sand and feet is less than that between concrete and feet', 'course', 'Physics', 1),
(43, 'Find the maximum velocity for the overturn of a car moving on a circular track of radius 100 m. The co-efficient of friction between the road and tyre is 0.2', 'Level 2', '0.14 m/s', '140 m/s', '1.4 km/s', '14 m/s', '14 m/s', 'course', 'Physics', 1),
(44, 'Of the following properties of a wave, the one that is independent of the other is its', 'Level 2', 'amplitude', 'velocity', 'wavelength', 'frequency', 'amplitude', 'course', 'Physics', 1),
(45, 'Lux is the SI unit of', 'Level 2', 'intensity of illumination', 'luminous efficiency', 'luminous flux', 'luminous intensity', 'intensity of illumination', 'course', 'Physics', 1),
(46, 'On a rainy day, small oil films on water show brilliant colours. This is due to', 'Level 2', 'dispersion', 'interface', 'diffraction', 'polarization', 'interface', 'course', 'Physics', 1),
(47, 'Point A is at a lower electrical potential than point B. An electron between them on the line joining them will', 'Level 2', 'move towards A', 'move towards B', 'move at right angles to the line joining A and B', 'remain at rest', 'move towards B', 'course', 'Physics', 1),
(48, 'Materials for rain-proof coats and tents owe their water-proof properties to', 'Level 2', 'surface tension', 'viscosity', 'specific gravity', 'elasticity', 'surface tension', 'course', 'Physics', 1),
(49, 'RADAR is used for', 'Level 2', 'locating submerged submarines', 'receiving a signals in a radio receiver', 'locating geostationary satellites', 'detecting and locating the position of objects such as aeroplanes', 'detecting and locating the position of objects such as aeroplanes', 'course', 'Physics', 1),
(50, 'Sound of frequency below 20 Hz is called', 'Level 2', 'audio sounds', 'infrasonic', 'ultrasonic', 'supersonics', 'infrasonic', 'course', 'Physics', 1),
(51, 'On a clean glass plate a drop of water spreads to form a thin layer whereas a drop of mercury remains almost spherical because', 'Level 2', 'mercury is a metal', 'density of mercury is greater than that of water', 'cohesion of mercury is greater than its adhesion with glass', 'cohesion of water is greater than its adhesion with glass', 'cohesion of mercury is greater than its adhesion with glass', 'course', 'Physics', 1),
(52, 'Suitable impurities are added to a semiconductor depending on its use. This is done in order to', 'Level 2', 'increase its life', 'enable it to withstand higher voltages', 'increase its electrical conductivity', 'increase its electrical resistivity', 'increase its electrical conductivity', 'course', 'Physics', 1),
(53, 'The DBMS acts as an interface between what two components of an enterprise-class database system?', 'Level 1', 'Database application and the database.', 'Data and the database.', 'The user and the database application.', 'Database application and SQL.', 'Database application and the database.', 'course', 'Database Administrator', 1),
(54, 'Which of the following products was an early implementation of the relational model developed by E.F. Codd of IBM?', 'Level 1', 'IDMS', 'DB2', 'dBase-II', 'R:base', 'DB2', 'course', 'Database Administrator', 1),
(55, 'The following are components of a database except ________ .', 'Level 1', 'user data', 'metadata', 'reports', 'indexes', 'reports', 'course', 'Database Administrator', 1),
(56, 'An application where only one user accesses the database at a given time is an example of a(n) ________ .', 'Level 1', 'single-user database application', 'multiuser database application', 'e-commerce database application', 'data mining database application', 'single-user database application', 'course', 'Database Administrator', 1),
(57, 'An on-line commercial site such as Amazon.com is an example of a(n) ________ .', 'Level 1', 'single-user database application', 'multiuser database application', 'e-commerce database application', 'data mining database application', 'e-commerce database application', 'course', 'Database Administrator', 1),
(58, 'Which of the following products was the first to implement true relational algebra in a PC DBMS?', 'Level 1', 'IDMS', 'Oracle', 'dBase-II', 'R:base', 'R:base', 'course', 'Database Administrator', 1),
(59, 'SQL stands for ________ .', 'Level 1', 'Structured Query Language', 'Sequential Query Language', 'Structured Question Language', 'Sequential Question Language', 'Structured Query Language', 'course', 'Database Administrator', 1),
(60, 'Because it contains a description of its own structure, a database is considered to be ________ .', 'Level 1', 'described', 'metadata compatible', 'self-describing', 'an application program', 'self-describing', 'course', 'Database Administrator', 1),
(61, 'The following are functions of a DBMS except ________ .', 'Level 1', 'creating and processing forms', 'creating databases', 'processing data', 'administrating databases', 'creating and processing forms', 'course', 'Database Administrator', 1),
(62, 'Helping people keep track of things is the purpose of a(n) ________ .', 'Level 1', 'database', 'table', 'instance', 'relationship', 'database', 'course', 'Database Administrator', 1),
(63, 'Which of the following products implemented the CODASYL DBTG model ?', 'Level 1', 'IDMS', 'DB2', 'dBase-II', 'R:base', 'IDMS', 'course', 'Database Administrator', 1),
(64, 'An Enterprise Resource Planning application is an example of a(n) ________ .', 'Level 1', 'single-user database application', 'multiuser database application', 'e-commerce database application', 'data mining database application', 'multiuser database application', 'course', 'Database Administrator', 1),
(65, 'A DBMS that combines a DBMS and an application generator is ________ .', 'Level 1', 'Microsoft\'s SQL Server', 'Microsoft\'s Access', 'IBM\'s DB2', 'Oracle Corporation\'s Oracle', 'Microsoft\'s Access', 'course', 'Database Administrator', 1),
(66, 'You have run an SQL statement that asked the DBMS to display data in a table named USER_TABLES. The results include columns of data labeled \"TableName,\" \"NumberOfColumns\" and \"PrimaryKey.\" You are looking at ________ .', 'Level 1', 'user data', 'metadata', 'A report', 'indexes', 'metadata', 'course', 'Database Administrator', 1),
(67, 'Which of the following is not considered to be a basic element of an enterprise-class database system?', 'Level 1', 'Users', 'Database applications', 'DBMS', 'COBOL programs', 'COBOL programs', 'course', 'Database Administrator', 1),
(68, 'The DBMS that is most difficult to use is ________ .', 'Level 1', 'Microsoft\'s SQL Server', 'Microsoft\'s Access', 'IBM\'s DB2', 'Oracle Corporation\'s Oracle', 'Oracle Corporation\'s Oracle', 'course', 'Database Administrator', 1),
(69, 'You can add a row using SQL in a database with which of the following?', 'Level 1', 'ADD', 'CREATE', 'INSERT', 'MAKE', 'INSERT', 'course', 'Database Administrator', 1),
(70, 'The command to remove rows from a table \'CUSTOMER\' is :', 'Level 1', 'REMOVE FROM CUSTOMER ...', 'DROP FROM CUSTOMER ...', 'DELETE FROM CUSTOMER WHERE ...', 'UPDATE FROM CUSTOMER ...', 'DELETE FROM CUSTOMER WHERE ...', 'course', 'Database Administrator', 1),
(71, 'The SQL WHERE clause :', 'Level 1', 'limits the column data that are returned', 'limits the row data are returned', 'Both A and B are correct', 'Neither A nor B are correct', 'limits the row data are returned', 'course', 'Database Administrator', 1),
(72, 'Which of the following is the original purpose of SQL ?', 'Level 1', 'To specify the syntax and semantics of SQL data definition language', 'To specify the syntax and semantics of SQL manipulation language', 'To define the data structures', 'All of the above.', 'All of the above.', 'course', 'Database Administrator', 1),
(73, 'How long is an IPv6 address ?', 'Level 1', '32 bits', '128 bytes', '64 bits', '128 bits', '128 bits', 'course', 'Networking Expert', 1),
(74, 'What flavor of Network Address Translation can be used to have one IP address allow many users to connect to the global Internet ?', 'Level 1', 'NAT', 'Static', 'Dynamic', 'PAT', 'PAT', 'course', 'Networking Expert', 1),
(75, 'What are the two main types of access control lists (ACLs) ?\r\nStandard\r\nIEEE\r\nExtended\r\nSpecialized\r\n', 'Level 1', '1 and 3', '2 and 4', '3 and 4', '1 and 2', '1 and 3', 'course', 'Networking Expert', 1),
(76, 'What command is used to create a backup configuration ?', 'Level 1', 'copy running backup', 'copy running-config startup-config', 'config mem', 'wr mem', 'copy running-config startup-config', 'course', 'Networking Expert', 1),
(77, 'You have 10 users plugged into a hub running 10Mbps half-duplex. There is a server connected to the switch running 10Mbps half-duplex as well. How much bandwidth does each host have to the server ?', 'Level 1', '100 kbps', '1 Mbps', '2 Mbps', '10 Mbps', '10 Mbps', 'course', 'Networking Expert', 1),
(78, 'Which WLAN IEEE specification allows up to 54Mbps at 2.4GHz ?', 'Level 1', 'A', 'B', 'G', 'N', 'G', 'course', 'Networking Expert', 1),
(79, 'Which of the following is the valid host range for the subnet on which the IP address 192.168.168.188 255.255.255.192 resides ?', 'Level 1', '192.168.168.129-190', '192.168.168.129-191', '192.168.168.128-190', '192.168.168.128-192', '192.168.168.129-190', 'course', 'Networking Expert', 1),
(80, 'To back up an IOS, what command will you use ?', 'Level 1', 'backup IOS disk', 'copy ios tftp', 'copy tftp flash', 'copy flash tftp', 'copy flash tftp', 'course', 'Networking Expert', 1),
(81, 'What protocol does PPP use to identify the Network layer protocol ?', 'Level 1', 'NCP', 'ISDN', 'HDLC', 'LCP', 'NCP', 'course', 'Networking Expert', 1),
(82, 'Which of the following commands will allow you to set your Telnet password on a Cisco router ?', 'Level 1', 'line telnet 0 4', 'line aux 0 4', 'line vty 0 4', 'line con 0', 'line vty 0 4', 'course', 'Networking Expert', 1),
(83, 'Which protocol does DHCP use at the Transport layer ?', 'Level 1', 'IP', 'TCP', 'UDP', 'ARP', 'UDP', 'course', 'Networking Expert', 1),
(84, 'Which command is used to determine if an IP access list is enabled on a particular interface ?', 'Level 1', 'show access-lists', 'show interface', 'show ip interface', 'show interface access-lists', 'show ip interface', 'course', 'Networking Expert', 1),
(85, 'Where is a hub specified in the OSI model ?', 'Level 1', 'Session layer', 'Physical layer', 'Data Link layer', 'Application layer', 'Physical layer', 'course', 'Networking Expert', 1),
(86, 'What does the passive command provide to dynamic routing protocols ?', 'Level 1', 'Stops an interface from sending or receiving periodic dynamic updates.', 'Stops an interface from sending periodic dynamic updates but not from receiving updates.', 'Stops the router from receiving any dynamic updates', 'Stops the router from sending any dynamic updates', 'Stops an interface from sending periodic dynamic updates but not from receiving updates.', 'course', 'Networking Expert', 1),
(87, 'Which protocol is used to send a destination network unknown message back to originating hosts ?', 'Level 1', 'TCP', 'ARP', 'ICMP', 'BootP', 'ICMP', 'course', 'Networking Expert', 1),
(88, 'How often are BPDUs sent from a layer 2 device ?', 'Level 1', 'Never', 'Every 2 seconds', 'Every 10 minutes', 'Every 30 seconds', 'Every 2 seconds', 'course', 'Networking Expert', 1),
(89, 'Which of the following statements should be used to obtain a remainder after dividing 3.14 by 2.1 ?', 'Level 1', 'rem = 3.14 % 2.1;', 'rem = modf(3.14, 2.1);', 'rem = fmod(3.14, 2.1);', 'Remainder cannot be obtain in floating point division.', 'rem = fmod(3.14, 2.1);', 'course', 'Software Development', 1),
(90, 'What are the types of linkages ?', 'Level 1', 'Internal and External', 'External, Internal and None', 'External and None', 'Internal', 'External, Internal and None', 'course', 'Software Development', 1),
(91, 'Which of the following special symbol allowed in a variable name ?', 'Level 1', '* (asterisk)', '| (pipeline)', '- (hyphen)', '_ (underscore)', '_ (underscore)', 'course', 'Software Development', 1),
(92, 'Is there any difference between following declarations?\r\n1 :	extern int fun();\r\n2 :	int fun();\r\n', 'Level 1', 'Both are identical', 'No difference, except extern int fun(); is probably in another file', 'int fun(); is overrided with extern int fun();', 'None of these', 'No difference, except extern int fun(); is probably in another file', 'course', 'Software Development', 1),
(93, 'How would you round off a value from 1.66 to 2.0 ?', 'Level 1', 'ceil(1.66)', 'floor(1.66)', 'roundup(1.66)', 'roundto(1.66)', 'ceil(1.66)', 'course', 'Software Development', 1),
(94, 'By default a real number is treated as a', 'Level 1', 'float', 'double', 'long double', 'far double', 'double', 'course', 'Software Development', 1),
(95, 'Which of the following is not user defined data type?\r\n1 :	\r\nstruct book\r\n{\r\n    char name[10];\r\n    float price;\r\n    int pages;\r\n};\r\n2 :	\r\nlong int l = 2.35;\r\n3 :	\r\nenum day {Sun, Mon, Tue, Wed};\r\n', 'Level 1', '1', '2', '3', 'Both 1 and 2', '2', 'course', 'Software Development', 1),
(96, 'Is the following statement a declaration or definition?\r\nextern int i;\r\n', 'Level 1', 'Declaration', 'Definition', 'Function', 'Error', 'Declaration', 'course', 'Software Development', 1),
(97, 'Identify which of the following are declarations\r\n1 :	extern int x;\r\n2 :	float square ( float x ) { ... }\r\n3 :	double pow(double, double);\r\n', 'Level 1', '1', '2', '1 and 3', '3', '1 and 3', 'course', 'Software Development', 1),
(98, 'In the following program where is the variable a getting defined and where it is getting declared?\r\n\r\n#include<stdio.h>\r\nint main()\r\n{\r\n    extern int a;\r\n    printf(\"%d\\n\", a);\r\n    return 0;\r\n}\r\nint a=20;\r\n', 'Level 1', 'extern int a is declaration, int a = 20 is the definition', 'int a = 20 is declaration, extern int a is the definition', 'int a = 20 is definition, a is not defined', 'a is declared, a is not defined', 'extern int a is declaration, int a = 20 is the definition', 'course', 'Software Development', 1),
(99, 'When we mention the prototype of a function ?', 'Level 1', 'Defining', 'Declaring', 'Prototyping', 'Calling', 'Declaring', 'course', 'Software Development', 1),
(100, 'Which of the following is the correct order of evaluation for the below expression?\r\nz = x + y * z / 4 % 2 - 1\r\n', 'Level 1', '* / % + - =', '= * / % + -', '/ * % - + =', '* % / - + =', '* / % + - =', 'course', 'Software Development', 1),
(101, 'Which of the following correctly shows the hierarchy of arithmetic operations in C ?', 'Level 1', '/ + * -', '* - / +', '+ - / *', '/ * + -', '/ * + -', 'course', 'Software Development', 1),
(102, 'Which of the following is the correct usage of conditional operators used in C ?', 'Level 1', 'a>b ? c=30 : c=40;', 'a>b ? c=30;', 'max = a>b ? a>c?a:c:b>c?b:c', 'return (a>b)?(a:b)', 'max = a>b ? a>c?a:c:b>c?b:c', 'course', 'Software Development', 1),
(103, 'Which of the following is the correct order if calling functions in the below code?\r\na = f1(23, 14) * f2(12/4) + f3();\r\n', 'Level 1', 'f1, f2, f3', 'f3, f2, f1', 'Order may vary from compiler to compiler', 'None of above', 'Order may vary from compiler to compiler', 'course', 'Software Development', 1),
(104, 'Which of the following are unary operators in C?\r\n1.	!\r\n2.	sizeof\r\n3.	~\r\n4.	&&\r\n', 'Level 1', '1, 2', '1, 3', '2, 4', '1, 2, 3', '1, 2, 3', 'course', 'Software Development', 1),
(105, 'In which order do the following gets evaluate,\r\n1.	Relational\r\n2.	Arithmetic\r\n3.	Logical\r\n4.	Assignment\r\n', 'Level 1', '2134', '1234', '4321', '3214', '2134', 'course', 'Software Development', 1),
(106, 'The keyword used to transfer control from a function back to the calling function is\r\n\r\n', 'Level 1', 'switch', 'goto', 'go back', 'return', 'return', 'course', 'Software Development', 1),
(107, 'What is the notation for following functions?\r\n\r\n1.  int f(int a, float b)\r\n    {\r\n        /* Some code */\r\n    }\r\n\r\n2.  int f(a, b)\r\n    int a; float b;\r\n    {\r\n        /* Some code */\r\n    }\r\n', 'Level 1', '1. KR Notation                  2. ANSI Notation', '1. Pre ANSI C Notation                  2. KR Notation', '1. ANSI Notation                  2. KR Notation', '1. ANSI Notation                  2. Pre ANSI Notation', '1. ANSI Notation                  2. KR Notation', 'course', 'Software Development', 1),
(108, 'How many times the program will print \"IndiaBIX\" ?\r\n\r\n#include<stdio.h>\r\n\r\nint main()\r\n{\r\n    printf(\"IndiaBIX\");\r\n    main();\r\n    return 0;\r\n}\r\n', 'Level 1', 'Infinite times', '32767 times', '65535 times', 'Till stack overflows', 'Till stack overflows', 'course', 'Software Development', 1),
(109, 'The wildcard in a WHERE clause is useful when ?', 'Level 1', 'An exact match is necessary in a SELECT statement', 'An exact match is not possible in a SELECT statement', 'An exact match is necessary in a CREATE statement', 'An exact match is not possible in a CREATE statement', 'An exact match is not possible in a SELECT statement', 'course', 'Database Administrator', 1),
(110, 'A view is which of the following ?', 'Level 1', 'A virtual table that can be accessed via SQL commands', 'A virtual table that cannot be accessed via SQL commands', 'A base table that can be accessed via SQL commands', 'A base table that cannot be accessed via SQL commands', 'A virtual table that can be accessed via SQL commands', 'course', 'Database Administrator', 1),
(111, 'The command to eliminate a table from a database is :', 'Level 1', 'REMOVE TABLE CUSTOMER;', 'DROP TABLE CUSTOMER;', 'DELETE TABLE CUSTOMER;', 'UPDATE TABLE CUSTOMER;', 'DROP TABLE CUSTOMER;', 'course', 'Database Administrator', 1),
(112, 'ON UPDATE CASCADE ensures which of the following ?', 'Level 1', 'Normalization', 'Data Integrity', 'Materialized Views', 'All of the above.', 'Data Integrity', 'course', 'Database Administrator', 1),
(113, 'SQL data definition commands make up a(n) ________ .', 'Level 1', 'DDL', 'DML', 'HTML', 'XML', 'DDL', 'course', 'Database Administrator', 1),
(114, 'Which of the following is valid SQL for an Index ?', 'Level 1', 'CREATE INDEX ID;', 'CHANGE INDEX ID;', 'ADD INDEX ID;', 'REMOVE INDEX ID;', 'CREATE INDEX ID;', 'course', 'Database Administrator', 1),
(115, 'The SQL keyword(s) ________ is used with wildcards.', 'Level 1', 'LIKE only', 'IN only', 'NOT IN only', 'IN and NOT IN', 'LIKE only', 'course', 'Database Administrator', 1),
(116, 'Which of the following is the correct order of keywords for SQL SELECT statements ?', 'Level 1', 'SELECT, FROM, WHERE', 'FROM, WHERE, SELECT', 'WHERE, FROM,SELECT', 'WHERE, FROM,SELECT', 'SELECT, FROM, WHERE', 'course', 'Database Administrator', 1),
(117, 'A subquery in an SQL SELECT statement is enclosed in :', 'Level 1', 'braces -- {...}', 'CAPITAL LETTERS', 'parenthesis -- (...) ', 'brackets -- [...]', 'parenthesis -- (...) ', 'course', 'Database Administrator', 1),
(118, 'The result of a SQL SELECT statement is a(n) ________ .', 'Level 1', 'report', 'form', 'file', 'table', 'table', 'course', 'Database Administrator', 1),
(119, 'In a one-to-many relationship, the entity that is on the many side of the relationship is called a(n) ________ entity.', 'Level 2', 'parent', 'child', 'instance', 'subtype', 'child', 'course', 'Database Administrator', 1),
(120, 'Which type of entity represents a logical generalization whose actual occurrence is represented by a second, associated entity ?', 'Level 2', 'Supertype entity', 'Subtype entity', 'Archetype entity', 'Instance entity', 'Archetype entity', 'course', 'Database Administrator', 1),
(121, 'Which type of entity has its relationship to another entity determined by an attribute in that other entity called a discriminator ?', 'Level 2', 'Supertype entity', 'Subtype entity', 'Archetype entity', 'Instance entity', 'Subtype entity', 'course', 'Database Administrator', 1),
(122, 'Entities can be associated with one another in which of the following ?', 'Level 2', 'Entities', 'Attributes', 'Identifiers', 'Relationships', 'Relationships', 'course', 'Database Administrator', 1),
(123, 'In which of the following is a single-entity instance of one type of related to a single-entity instance of another type ?', 'Level 2', 'One-to-One Relationship', 'One-to-One Relationship', 'Many-to-Many Relationship', 'Composite Relationship', 'One-to-One Relationship', 'course', 'Database Administrator', 1),
(124, 'How many broadcast domains are created when you segment a network with a 12-port switch ?', 'Level 1', '1', '2', '5', '12', '1', 'course', 'Networking Expert', 1),
(125, 'What does the command routerA(config)#line cons 0 allow you to perform next ?', 'Level 1', 'Set the Telnet password', 'Shut down the router', 'Set your console password', 'Disable console connections', 'Set your console password', 'course', 'Networking Expert', 1),
(126, 'What does the command routerA(config)#line cons 0 allow you to perform next ?', 'Level 1', 'Set the Telnet password', 'Shut down the router', 'Set your console password', 'Disable console connections', 'Set your console password', 'course', 'Networking Expert', 1),
(127, 'Which router command allows you to view the entire contents of all access lists ?', 'Level 1', 'show all access-lists', 'show access-lists', 'show ip interface', 'show interface', 'show access-lists', 'course', 'Networking Expert', 1),
(128, 'Which class of IP address has the most host addresses available by default ?', 'Level 1', 'A', 'B', 'C', 'A and B', 'A', 'course', 'Networking Expert', 1),
(129, 'In a network with dozens of switches, how many root bridges would you have ?', 'Level 1', '1', '2', '5', '12', '1', 'course', 'Networking Expert', 1),
(130, 'What PPP protocol provides dynamic addressing, authentication, and multilink ?', 'Level 1', 'NCP', 'HDLC', 'LCP', 'X.25', 'LCP', 'course', 'Networking Expert', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `rid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `cgpi` varchar(50) NOT NULL,
  `backlogs` varchar(50) NOT NULL,
  `aggregate` varchar(50) NOT NULL,
  `skill` tinytext NOT NULL,
  `aptiscore` varchar(50) DEFAULT NULL,
  `coursescore` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`rid`, `uid`, `cgpi`, `backlogs`, `aggregate`, `skill`, `aptiscore`, `coursescore`) VALUES
(2, 1001, '6', '2', '60', 'C, OOPS, C++', '5, 0, 0', '3'),
(3, 1002, '9', '0', '77', 'C++', NULL, NULL),
(4, 1003, '8.0', '0', '85', 'Java ', '5, 1, 3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `ucontact` varchar(50) NOT NULL,
  `uaddress` text NOT NULL,
  `upassword` varchar(50) NOT NULL,
  `ugender` varchar(50) NOT NULL,
  `uage` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `ucontact`, `uaddress`, `upassword`, `ugender`, `uage`) VALUES
(1001, 'Test', 'test@gmail.com', '1234567890', 'Goregaon\'s, Mumbai', '1234', 'male', '12'),
(1002, 'Test1', 'test1@gmail.com', '9876543210', 'Goregaon', '1234', 'male', '24'),
(1003, 'Darshan Yadav', 'darshanyadav67@gmail.com', '8879055848', 'Mumbai', '123456', 'male', '21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aptitude`
--
ALTER TABLE `aptitude`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aptitude`
--
ALTER TABLE `aptitude`
  MODIFY `aid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `did` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `rid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
