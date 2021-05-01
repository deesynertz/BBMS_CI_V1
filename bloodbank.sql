-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2019 at 01:52 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `bg_id` int(100) NOT NULL,
  `bg_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`bg_id`, `bg_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'O'),
(4, 'AB+'),
(6, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `camp`
--

CREATE TABLE `camp` (
  `camp_id` int(100) NOT NULL,
  `camp_title` varchar(500) NOT NULL,
  `organised_by` varchar(500) NOT NULL,
  `district_id` int(100) NOT NULL,
  `pic` varchar(900) NOT NULL,
  `detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camp`
--

INSERT INTO `camp` (`camp_id`, `camp_title`, `organised_by`, `district_id`, `pic`, `detail`) VALUES
(1, 'Eastern Zone', 'National Blood Zonal Offices', 1, 'EZ_one.png', 'Msimbazi Center, Email: info@nbts.go.'),
(2, ' Lake zone Mwanza', 'The Lake Zone Office', 5, 'LZm_one.png', 'Bugando Hopsital,from 7.30AM to 3.30 24/7'),
(3, 'Mzumbe University', 'The National Blood Transfusion', 31, 'Mu_one.png', 'welcome'),
(4, 'Northern Zone Center', 'Institute of Public Health', 14, 'NZC_one.png', ' P.O. Box 823, Moshi, Tanzania'),
(5, 'Mzinga center', 'The National Blood Transfusion', 7, 'ourmission.png', 'P.box.4375, Tanga ');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(100) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Dar es salaam'),
(4, 'Kilimanjaro'),
(5, 'Lindi'),
(6, 'Mbeya'),
(7, 'Mwanza'),
(8, 'Moshi'),
(9, 'Tanga'),
(10, 'Kagera'),
(11, 'Shinyanga'),
(12, 'Mara'),
(13, 'Simiyu'),
(14, 'Arusha'),
(15, 'Katavi'),
(16, 'Njombe'),
(17, 'Ruvuma'),
(18, 'Pwani'),
(19, 'Singida'),
(20, 'Dodoma'),
(21, 'Kigoma'),
(22, 'Rukwa'),
(23, 'Iringa'),
(24, 'Geita'),
(25, 'Tabora'),
(26, 'Kilimanjaro'),
(27, 'Manyara'),
(28, 'Morogoro'),
(29, 'Mtwara'),
(30, 'kyerwa');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `row_id` int(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `subj` varchar(700) NOT NULL,
  `mdate` datetime NOT NULL DEFAULT current_timestamp(),
  `kind_id` int(11) NOT NULL,
  `approval` varchar(12) NOT NULL DEFAULT 'Pending',
  `replay` varchar(9000) NOT NULL,
  `rep_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`row_id`, `full_name`, `email`, `mobile`, `subj`, `mdate`, `kind_id`, `approval`, `replay`, `rep_date`) VALUES
(1, 'Deogratias Alison', 'dealison16@mustudent.ac.tz', '0744004897', 'I need to Know how can i change my user Email from the system', '2018-06-13 00:00:00', 0, 'Pending', '', '0000-00-00 00:00:00'),
(2, 'Deodratias Alison', 'dealison16@gmail.com', '0744004897', 'password', '2018-06-29 00:00:00', 0, 'Seen', 'resert your account', '2018-06-29 21:00:00'),
(3, 'Deodratias Alison', 'dealison16@gmail.com', '0744004897', 'jgljjggggilgjgjgju', '2018-06-29 00:00:00', 1, 'Pending', '', '0000-00-00 00:00:00'),
(4, 'Deodratias Alison', 'dealison16@gmail.com', '0744004897', 'ndsjvhvbcijxbj', '2018-07-07 00:00:00', 0, 'Pending', '', '0000-00-00 00:00:00'),
(5, 'Deodratias Alison', 'dealison16@gmail.com', '0744004897', 'how can i proct my pasword', '2018-07-21 00:00:00', 0, 'Pending', '', '0000-00-00 00:00:00'),
(6, 'Deodratias Alison', 'dealison16@gmail.com', '0744004897', 'how can i proct my pasword', '2018-07-21 00:00:00', 0, 'Pending', '', '0000-00-00 00:00:00'),
(7, 'Deodratias Alison', 'dealison16@gmail.com', '0879898765', 'am fine', '2018-07-21 00:00:00', 1, 'Pending', '', '0000-00-00 00:00:00'),
(8, 'Deodratias Alison', 'dealison16@gmail.com', '0879898765', 'am fine', '2018-07-21 00:00:00', 0, 'Pending', '', '0000-00-00 00:00:00'),
(9, ' nkoczn', 'dealison16@gmail.com', '0879898765', 'who are you', '2018-07-21 00:00:00', 0, 'Pending', '', '0000-00-00 00:00:00'),
(10, 'Deogratias', 'fsdfdtfddf@gmail.com', '087989787', 'hghguygu', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00'),
(11, 'newdeo', 'newdeo@gmail.com', '80980989', 'dhjhluud', '0000-00-00 00:00:00', 0, 'Pending', '', '0000-00-00 00:00:00'),
(12, 'dttttfty', 'fgcgcg@gmail.com', '8789789789', 'yututuiyouyui', '0000-00-00 00:00:00', 0, 'Pending', '', '0000-00-00 00:00:00'),
(13, 'asgfruglfuir', 'dhgjkhdkjh@gmail.com', '58678459', 'dgihtiuguergjhuith', '0000-00-00 00:00:00', 1, 'Pending', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `tell` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(900) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_us_id`, `category_id`, `title`, `tell`, `fax`, `email`, `address`, `facebook`, `instagram`, `twitter`) VALUES
(1, 4, 'MINISTRY OF HEALTH AND SOCIAL WELFARE,', '+255 181 872', '+255 2218 1872', 'info@bbms.go.tz', 'P.o.Box 65019 Temeke,Dar es Salaam.', 'www.facebook/bbms.com', 'www.instagram/bbms.com', 'www.twitter/bbms.com');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(100) NOT NULL,
  `city_id` int(100) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `city_id`, `district_name`) VALUES
(1, 1, 'Temeke'),
(2, 1, 'Msimbaz'),
(3, 1, 'Ilala'),
(4, 1, 'Kigambon'),
(5, 7, 'Ilemela'),
(6, 7, 'Nyamagana'),
(7, 9, 'Handen'),
(8, 10, 'Missenyi'),
(9, 10, 'Muleba'),
(10, 10, 'Karagwe'),
(11, 11, 'Tinde'),
(12, 10, 'Biharamoro'),
(13, 4, 'manicipal'),
(14, 4, 'Moshi'),
(15, 1, 'Kinondoni'),
(16, 24, 'Geita District'),
(17, 7, 'Sengerema'),
(18, 25, 'Nzega'),
(19, 9, 'Lushoto'),
(20, 4, 'Moshi District'),
(21, 14, 'Arusha District'),
(22, 20, 'Dodoma Manicipal'),
(23, 20, 'Mpwapwa'),
(24, 20, 'Kondoa'),
(25, 23, 'Kilolo District'),
(26, 5, 'Nachingwea'),
(27, 27, 'Kiteto'),
(28, 6, 'Chunya'),
(29, 28, 'Gairo'),
(30, 29, 'Masasi'),
(31, 28, 'Mvomero');

-- --------------------------------------------------------

--
-- Table structure for table `donarregistration`
--

CREATE TABLE `donarregistration` (
  `donar_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `b_id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `pic` varchar(1000) NOT NULL,
  `ddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donarregistration`
--

INSERT INTO `donarregistration` (`donar_id`, `name`, `gender`, `age`, `mobile`, `b_id`, `email`, `pwd`, `pic`, `ddate`) VALUES
(1, 'Deogtatias Alison', 'M', '22', '0744004897', 3, 'deo@gmail.com', '123456', 'Nyabaturi.jpg', '2018-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(100) NOT NULL,
  `camp_id` int(100) NOT NULL,
  `ddate` date NOT NULL,
  `units` int(100) NOT NULL,
  `detail` varchar(800) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galley`
--

CREATE TABLE `galley` (
  `galley_id` int(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `pammision` int(2) NOT NULL,
  `pic` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galley`
--

INSERT INTO `galley` (`galley_id`, `category_id`, `pammision`, `pic`) VALUES
(1, 2, 0, 'aside_three.png'),
(2, 2, 1, 'aside_one.png'),
(3, 6, 1, 'ourmission.png'),
(4, 1, 1, 'deesynertzx980.jpg'),
(5, 1, 1, 'extrax980.jpg'),
(6, 1, 1, 'jamirax980.png'),
(7, 1, 1, 'lotionx980.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kind_of_contact`
--

CREATE TABLE `kind_of_contact` (
  `kind_id` int(11) NOT NULL,
  `kind_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kind_of_contact`
--

INSERT INTO `kind_of_contact` (`kind_id`, `kind_type`) VALUES
(0, 'Techical'),
(1, 'Hearth');

-- --------------------------------------------------------

--
-- Table structure for table `pages_content`
--

CREATE TABLE `pages_content` (
  `page_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(900) NOT NULL,
  `details` varchar(9000) NOT NULL,
  `pic` varchar(900) NOT NULL,
  `posted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages_content`
--

INSERT INTO `pages_content` (`page_id`, `category_id`, `title`, `details`, `pic`, `posted_date`) VALUES
(4, 1, 'welcome.png\r\n', '<p style=\"text-align:justify\"><span style=\"font-size:14px\">The National Blood Transfusion Service (NBTS) has expressed optimism it will meet this year&rsquo;s target to collect 300,000 liters of blood because of the increase in the number of voluntary donors.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">NBTS&rsquo; target still falls short of the 450,000 liters of blood the country needs annually but will be a significant rise from the 160,000 liters collected last year, if it&rsquo;s met.Tanzania faces acute shortages in the national blood bank due to poor collection. National statistics indicate that 80% of the 432 deaths in every 100,000 Tanzanian mothers that occur every year are caused by lack of blood.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">We positively believe this tool can overcome most of these challenges by effectively connecting the blood donors with the blood recipients.</span></p>\r\n', 'welcome.png', '2018-08-18'),
(7, 5, 'Blood Bank Management System:', '<p style=\"text-align:justify\"><span style=\"font-size:14px\">We welcome you to in our WebSite. If you are a donor , This blood donor list is hosted on behalf of &quot;National Blood Transfusion Service (NBTS) &quot;as a public service without any profit motive.This is a free service. While the Organisers have taken all steps to obtain accurate and up-to-date information of potential blood donors.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">We request donors to update contact details regularly.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">Our mission is to create awareness in the science of blood, blood donation and blood transfusion.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">Our objective is to Increase the number of persons who consistently donate blood by motivating individuals, target groups and the community at large by enhancing, facilitating and promoting the bilateral relationship between voluntary blood donors and the National Transfusion Service (NTBS) and thus strengthen the blood program in Tanzania.</span></p>\r\n', 'camps.png', '2018-08-18'),
(11, 6, 'Our mission is to create awareness in the science of blood, blood donation and blood transfusion.', 'Life Saver Blood Bank</strong>&#39; is the Our objective is to Increase the number of persons who consistently donate blood by motivating individuals, target groups and the community at large by enhancing, facilitating and promoting the bilateral relationship between voluntary blood donors and the National Transfusion Service <strong>(NTBS)</strong> and thus strengthen the blood program in Tanzania.<br>Educate the general public on issues connected with safe blood donation and the vital role which blood has in saving lives<br>Motivate young generation, especially secondary school students; colleges, universities and postgraduate level students, to donate blood on voluntary basis regularly and promote the concept of blood donation to pupils who will be future donors.To take necessary steps for growing consciousness among people about blood donation and also for eradicating any obstacle to voluntary blood donation through informing people about blood donation related facts, free blood group testing, workshop, protest trading of professional blood donors and commercial blood banks etc.\r\n\r\n<br>Be a hero, donate blood and save lives today\r\n', 'ourmission.png', '2018-08-18'),
(12, 2, 'Notes', '<p style=\"text-align:justify\"><span style=\"font-size:14px\"><strong>Who Can Give Blood?</strong><br />\r\nMost people can give blood. If you are generally in good health, age 17 to 65 (if it&#39;s your first time) and weigh at least 7st 12Ib you can donate. You can give blood every 16 weeks, that&#39;s approximately every four months.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\"><strong>What happens when I give blood?</strong><br />\r\nA tiny drop of blood is taken from your fingertip. This allows us to check your haemoglobin levels and ensure that giving blood won&#39;t make you anaemic. If all is well, you will be able to donate blood. You will donate about 470ml of blood - this amount of blood is quickly replaced by your body. Once you have given blood, you should have a short rest before being given some refreshments usually a drink and biscuits. All in all giving blood shouldn&#39;t take more than an hour.Please remember to have something to eat and drink before you give blood.</span></p>\r\n', '', '2018-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `page_category`
--

CREATE TABLE `page_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_category`
--

INSERT INTO `page_category` (`category_id`, `category_name`) VALUES
(1, 'welcome'),
(2, 'note'),
(3, 'contact'),
(4, 'contact us'),
(5, 'description'),
(6, 'about');

-- --------------------------------------------------------

--
-- Table structure for table `requestes`
--

CREATE TABLE `requestes` (
  `req_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bgroup` int(100) NOT NULL,
  `units` int(100) NOT NULL,
  `reqdate` date NOT NULL,
  `status` varchar(12) NOT NULL,
  `detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestes`
--

INSERT INTO `requestes` (`req_id`, `name`, `gender`, `age`, `mobile`, `email`, `bgroup`, `units`, `reqdate`, `status`, `detail`) VALUES
(1, 'deogratias', 'male', '22', '0744004897', 'dealison16@mustudent.ac.tz', 4, 2, '2018-05-11', 'approved', 'dsbijhdsvzilizdzblijvbvj'),
(2, 'Anna chacha', 'female', '32', '0744004897', 'anna@gmail.com', 3, 3, '2018-05-14', 'received', 'bdsugshcckghbj bhxbcjbjxcbj'),
(4, 'Anna chacha', 'female', '34', '0987654321', 'anna@gmail.com', 2, 1, '2018-05-14', 'received', 'cucKHAK VHUVKAH KvHZXVh'),
(5, 'franco', 'male', '34', '0989876789', 'frer@ftggyy.com', 1, 3, '2018-05-15', 'request', 'bjidsigiugdsibv jgxckjzbj xc'),
(6, 'Anna chacha', 'female', '32', '947834086348', 'anna@gmail.com', 3, 2, '2018-05-20', 'request', 'kjdsbugjd zubjdb zhdbjb'),
(7, 'Anna chacha', 'female', '32', '947834086348', 'anna@gmail.com', 3, 3, '2018-05-29', 'approved', 'bjidfjg vusbdhkvxuzhvjdxbc jhxb'),
(11, 'Ester Franco ', 'female', '22', '0759890897', 'ester@gmail.com', 2, 2, '2018-05-28', 'request', 'This is my doughter please help me');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `first_name`, `sname`) VALUES
(1, 'deo', 'hary'),
(2, 'kery', 'bary');

-- --------------------------------------------------------

--
-- Table structure for table `total_visitor`
--

CREATE TABLE `total_visitor` (
  `MIMI` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_visitor`
--

INSERT INTO `total_visitor` (`MIMI`, `id`, `session`, `ip`, `status`, `time`) VALUES
(0, 0, 'dealison16@mustudent.ac.tz', '::1', 1, 1525957206),
(0, 0, 'deogbad995@gmail.com', '::1', 1, 1525957574),
(0, 0, '', '192.168.43.1', 1, 1525965439),
(0, 0, 'cyper@gmail.com', '::1', 1, 1525967191),
(0, 0, 'guest', '::1', 1, 1525998717),
(0, 0, 'guest', '::1', 1, 1526026311),
(0, 0, 'anna@gmail.com', '::1', 1, 1526079443),
(0, 0, 'franco@gmail.com', '::1', 1, 1526176969),
(0, 0, 'guest', '::1', 1, 1526194901);

-- --------------------------------------------------------

--
-- Table structure for table `typeofuser`
--

CREATE TABLE `typeofuser` (
  `tou_id` int(1) NOT NULL,
  `tou_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeofuser`
--

INSERT INTO `typeofuser` (`tou_id`, `tou_name`) VALUES
(0, 'Admin'),
(1, 'Doctor'),
(2, 'Nurse'),
(3, 'labTech');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `row_id` int(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `tou_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`row_id`, `username`, `pwd`, `tou_id`) VALUES
(14, 'dealison16', 'f2b3a5d48d7f3f4d5360425c752e53f8', 0),
(24, 'dealison18', '52eab4fdc9fe58575bba1326d6dcc8b9', 1),
(25, 'dealison19', '38ffc428af259532d6529d95960dd79b', 2),
(29, 'dealison17', 'b5ae4a6ebf64071be8d0fdad80276204', 3),
(30, 'Ester', '2003', 0),
(31, 'Kervin', '3251dc033d4f84c336d05c56cf1ed450', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`bg_id`);

--
-- Indexes for table `camp`
--
ALTER TABLE `camp`
  ADD PRIMARY KEY (`camp_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `kind_id` (`kind_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_us_id`),
  ADD KEY `page_categor_contact_us` (`category_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `donarregistration`
--
ALTER TABLE `donarregistration`
  ADD PRIMARY KEY (`donar_id`),
  ADD KEY `d_id` (`b_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `camp_id` (`camp_id`);

--
-- Indexes for table `galley`
--
ALTER TABLE `galley`
  ADD PRIMARY KEY (`galley_id`),
  ADD KEY `page_categor_galley` (`category_id`);

--
-- Indexes for table `kind_of_contact`
--
ALTER TABLE `kind_of_contact`
  ADD PRIMARY KEY (`kind_id`);

--
-- Indexes for table `pages_content`
--
ALTER TABLE `pages_content`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `category_id` (`category_id`) USING BTREE;

--
-- Indexes for table `page_category`
--
ALTER TABLE `page_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `requestes`
--
ALTER TABLE `requestes`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `bgroup` (`bgroup`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeofuser`
--
ALTER TABLE `typeofuser`
  ADD PRIMARY KEY (`tou_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`row_id`),
  ADD KEY `tou_id` (`tou_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `bg_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `camp`
--
ALTER TABLE `camp`
  MODIFY `camp_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `row_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `donarregistration`
--
ALTER TABLE `donarregistration`
  MODIFY `donar_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `galley`
--
ALTER TABLE `galley`
  MODIFY `galley_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages_content`
--
ALTER TABLE `pages_content`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `page_category`
--
ALTER TABLE `page_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requestes`
--
ALTER TABLE `requestes`
  MODIFY `req_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `typeofuser`
--
ALTER TABLE `typeofuser`
  MODIFY `tou_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `row_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `camp`
--
ALTER TABLE `camp`
  ADD CONSTRAINT `district_id` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `kind_id` FOREIGN KEY (`kind_id`) REFERENCES `kind_of_contact` (`kind_id`);

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `page_categor_contact_us` FOREIGN KEY (`category_id`) REFERENCES `page_category` (`category_id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `donarregistration`
--
ALTER TABLE `donarregistration`
  ADD CONSTRAINT `d_id` FOREIGN KEY (`b_id`) REFERENCES `bloodgroup` (`bg_id`);

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `camp_id` FOREIGN KEY (`camp_id`) REFERENCES `camp` (`camp_id`);

--
-- Constraints for table `galley`
--
ALTER TABLE `galley`
  ADD CONSTRAINT `page_categor_galley` FOREIGN KEY (`category_id`) REFERENCES `page_category` (`category_id`);

--
-- Constraints for table `pages_content`
--
ALTER TABLE `pages_content`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `page_category` (`category_id`);

--
-- Constraints for table `requestes`
--
ALTER TABLE `requestes`
  ADD CONSTRAINT `bgroup` FOREIGN KEY (`bgroup`) REFERENCES `bloodgroup` (`bg_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `tou_id` FOREIGN KEY (`tou_id`) REFERENCES `typeofuser` (`tou_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
