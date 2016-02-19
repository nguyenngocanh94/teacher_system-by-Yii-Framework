-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2016 at 11:03 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachersystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id_content` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `time_create` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `kind_content` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id_content`, `title`, `content`, `time_create`, `user_id`, `kind_content`) VALUES
(17, 'Vietnamese culture may be still mysterious and unknown to most people outside the country', '<p>The&nbsp;<strong>culture of&nbsp;<a href="https://en.wikipedia.org/wiki/Vietnam">Vietnam</a></strong>&nbsp;is one of the oldest in&nbsp;<a href="https://en.wikipedia.org/wiki/Southeast_Asia">Southeast Asia</a>, with the ancient&nbsp;<a href="https://en.wikipedia.org/wiki/Bronze_age">Bronze age</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Dong_Son_Culture">Dong Son culture</a>&nbsp;being widely considered one of its most important progenitors.<a href="https://en.wikipedia.org/wiki/Culture_of_Vietnam#cite_note-vnembassy-1">[1]</a>&nbsp;Due to 1000 years of&nbsp;<a href="https://en.wikipedia.org/wiki/Chinese_domination_of_Vietnam">Chinese rule</a>, Vietnam was heavily influenced by Chinese culture in terms of politics, government,&nbsp;<a href="https://en.wikipedia.org/wiki/Confucianism">Confucian</a>&nbsp;social and moral ethics, and art. Vietnam is considered to be part of the&nbsp;<a href="https://en.wikipedia.org/wiki/East_Asian_cultural_sphere">East Asian cultural sphere</a>.<a href="https://en.wikipedia.org/wiki/Culture_of_Vietnam#cite_note-2">[2]</a></p>\r\n\r\n<p>Following independence from China in the 10th century, Vietnam began a southward expansion that saw the annexation of territories formerly belonging to the&nbsp;<a href="https://en.wikipedia.org/wiki/Champa">Champa</a>&nbsp;civilization (now&nbsp;<a href="https://en.wikipedia.org/wiki/Central_Vietnam">Central Vietnam</a>) and parts of the&nbsp;<a href="https://en.wikipedia.org/wiki/Khmer_Empire">Khmer</a>&nbsp;empire (modern southern Vietnam), which resulted in minor regional variances in Vietnam&#39;s culture due to exposure to these different groups.</p>\r\n\r\n<p>During the&nbsp;<a href="https://en.wikipedia.org/wiki/French_Indochina">French colonial</a>&nbsp;period, Vietnamese culture absorbed various influences from the Europeans, including the spread of&nbsp;<a href="https://en.wikipedia.org/wiki/Catholicism">Catholicism</a>&nbsp;and the adoption of the&nbsp;<a href="https://en.wikipedia.org/wiki/Latin_alphabet">Latin alphabet</a>. Prior to this, Vietnamese had used both&nbsp;<a href="https://en.wikipedia.org/wiki/H%C3%A1n_T%E1%BB%B1">Chinese characters</a>&nbsp;and a script called&nbsp;<a href="https://en.wikipedia.org/wiki/Ch%E1%BB%AF_n%C3%B4m">Chữ n&ocirc;m</a>&nbsp;which was based on Chinese but included newly invented characters meant to represent native Vietnamese words.</p>\r\n\r\n<p>In the socialist era, the cultural life of Vietnam has been deeply influenced by government-controlled media and the cultural influences of socialist programs. For many decades, foreign cultural influences were shunned and emphasis placed on appreciating and sharing the culture of communist nations such as the Soviet Union, China,&nbsp;<a href="https://en.wikipedia.org/wiki/Cuba">Cuba</a>&nbsp;and others. Since the 1990s, Vietnam has seen a greater re-exposure to Asian, European and American culture and media.</p>\r\n\r\n<p>Some elements generally considered to be characteristic of Vietnamese culture include&nbsp;<a href="https://en.wikipedia.org/wiki/Ancestor_veneration">ancestor veneration</a>, respect for community and family values, handicrafts and manual labour, and devotion to study. Important symbols present in Vietnamese culture include&nbsp;<a href="https://en.wikipedia.org/wiki/Vietnamese_dragon">dragons</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Turtle">turtles</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Padma_(attribute)">lotuses</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Bamboo">bamboo</a>.</p>\r\n', '2015-12-28 05:43:49', 4, 11),
(18, 'LICH THI HOC KY 20151', '<p>thay doi phong tu b1 sang tc</p>\r\n', '2015-12-28 08:28:27', 4, 13);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id_document` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `document_src` varchar(45) NOT NULL,
  `time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id_document`, `title`, `document_src`, `time_create`, `user_id`, `id_subject`) VALUES
(1, 'giao duc the chat', 'img/5030-bai_tap_4182.pdf', '2015-12-24 10:49:24', 4, 1),
(2, 'hahahaha', 'img/1672-YiiComplete.zip', '2015-12-24 10:49:25', 4, 1),
(4, 'sao cho a ?', 'img/4776-freeSearch.zip', '2015-12-26 14:35:00', 4, 1),
(5, 'aaaa', 'img/5173-ban quyen va sang che.pdf', '2015-12-26 14:38:29', 4, 1),
(6, 'ádsadsa', 'img/951-Bài giảng Lập trình mạng - Nguyễn Hoà', '2015-12-26 14:47:54', 4, 1),
(7, 'kokoro', 'img/3924-kaki8x.zip', '2015-12-26 14:48:08', 4, 1),
(8, 'asdf', 'img/5950-5030-bai_tap_4182.pdf', '2015-12-27 09:32:02', 4, 1),
(10, 'ikk', 'img/5155-ban quyen va sang che.pdf', '2016-01-02 04:28:36', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kind`
--

CREATE TABLE `kind` (
  `id_kind` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kind`
--

INSERT INTO `kind` (`id_kind`, `category`, `img_src`, `id_user`) VALUES
(11, 'Artistic and Literary', 'img/5709-art.jpg', 4),
(12, 'English', 'img/1838-english.jpg', 4),
(13, '3D and CAD', 'img/5154-autocard.jpg', 4),
(14, 'Big Data ', 'img/5163-database.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `title`, `description`, `status`, `user_id`) VALUES
(18, 'Vietnamese culture may be still mysterious and unknown ?', NULL, 1, 4),
(19, 'cac ban thich de dong hay mo', NULL, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `poll_choice`
--

CREATE TABLE `poll_choice` (
  `id` int(11) UNSIGNED NOT NULL,
  `poll_id` int(11) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL DEFAULT '',
  `votes` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poll_choice`
--

INSERT INTO `poll_choice` (`id`, `poll_id`, `label`, `votes`, `weight`) VALUES
(22, 18, 'yes', 0, 0),
(23, 18, 'no', 0, 0),
(24, 18, 'i dont care', 0, 0),
(25, 19, 'dong', 0, 1),
(26, 19, 'mo', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `poll_vote`
--

CREATE TABLE `poll_vote` (
  `id` int(11) UNSIGNED NOT NULL,
  `choice_id` int(11) UNSIGNED NOT NULL,
  `poll_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '',
  `timestamp` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poll_vote`
--

INSERT INTO `poll_vote` (`id`, `choice_id`, `poll_id`, `user_id`, `ip_address`, `timestamp`) VALUES
(1, 26, 19, 4, '::1', 1451291648);

-- --------------------------------------------------------

--
-- Table structure for table `qa`
--

CREATE TABLE `qa` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `auth` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa`
--

INSERT INTO `qa` (`id`, `question`, `answer`, `status`, `user_id`, `auth`) VALUES
(2, 'tao ', 'Vietnamese culture may be still mysterious and unknown to most people outside the country. Today, more and more people are going to Vietnam for traveling and doing business. Getting to know Vietnam and Vietnamese culture is interesting and fascinating. We hope with this website, you can find the most comprehensive information about culture of Vietnam and its traditions.', 1, 4, 'se'),
(3, 'tao ', NULL, 1, 4, 'se giet'),
(4, 'thi dep trai muon năm', NULL, 1, 4, 'th'),
(5, 'thay thich di xe gi', NULL, 0, 4, 'anh'),
(6, 'asd', 'ouitkjghyfcvx', 1, 4, 'anh'),
(7, 'fsgnfgds', NULL, 2, 4, 'sdfsfs'),
(8, 'asdasd', NULL, 2, 4, 'ewew'),
(9, 'asdasd', NULL, 2, 4, 'ewew'),
(10, 'asd', NULL, 2, 4, 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Had Been Answered'),
(2, 'Wait Answer');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id_subject` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id_subject`, `subject`, `id_user`) VALUES
(1, 'Advanced Database MAIN', 4),
(2, 'dao duc may tinh', 4),
(3, 'dao duc nghe nghiep', 4),
(5, 'SAO LZ', 17),
(6, 'sao cho', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`) VALUES
(0, 'anymous', '1', '1', '1'),
(1, 'tao', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'rr@gmail.co', 'member'),
(2, 'aaa', '5cb138284d431abd6a053a56625ec088bfb88912', 'ccc@gmail.com', 'member'),
(3, 'lamthi9x.hhtb', '852f3129fa6efe982f515324486fec7e824ab378', 'lamthi9x.hhtb@gmail.com', 'member'),
(4, 'thicongtu2', '852f3129fa6efe982f515324486fec7e824ab378', 'anhngocnguyen@fb.com', 'admin'),
(5, 'abc', '589c22335a381f122d129225f5c0ba3056ed5811', 'ght@fmiaocm.c', 'member'),
(6, 'anh', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'abc@asd.com', 'member'),
(7, 'thaygiao', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dd@gmai.com', 'member'),
(8, '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123@g.com', 'member'),
(9, '111', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'asd@12.com', 'member'),
(10, 'thicongtu', '852f3129fa6efe982f515324486fec7e824ab378', 'anh@1.co', 'member'),
(11, 'register', '8cb2237d0679ca88db6464eac60da96345513964', 'lamthi12@ymail.com', 'member'),
(12, 'anhngocnguyen', '8cb2237d0679ca88db6464eac60da96345513964', 'lamthi9x.hhtb@yahoo.com', 'member'),
(13, 'anhngocnguyen1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yyy@fff.com', 'member'),
(14, 'abcd', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'abcd@j.vn', 'member'),
(15, 'abc3', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '123@gmail.com', 'member'),
(16, '1111', '011c945f30ce2cbafc452f39840f025693339c42', 'adsd@fas.com', 'member'),
(17, 'haha1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'asd@fd.com', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `iduser_info` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `male` enum('Madam','Sir') NOT NULL,
  `position` enum('Assoc Prof','Professor','Masters','Doctor') NOT NULL,
  `prologue` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`iduser_info`, `username`, `fullname`, `male`, `position`, `prologue`, `user_id`, `address`, `telephone`) VALUES
(1, 'Thi', 'congtu2', 'Sir', 'Professor', 'ko thich noi nhieu dau ha', 1, 'pho hue,ha noi', 904700039),
(2, 'tao', 'la ', 'Madam', 'Professor', 'thich chet', 3, 'vo gia cu', 0),
(3, 'thicongtu2', 'Anh Ngoc Nguyen', 'Sir', 'Professor', '.... hahaha', 4, 'nha ngheo o tro', 1923412),
(4, 'ngai thi', 'sr thi', 'Sir', 'Masters', 'aa', 2, 'tai bach khoe', 987622),
(6, 'sau bo', 'kakakakak', 'Sir', 'Masters', 'sac', 5, '1234', 123413),
(7, 'register', 'Anh Ngoc Nguyen', 'Sir', 'Professor', 'hihihihi', 11, 'asdas sad', 914786534),
(9, 'anhngocnguyen', 'tao la thi', 'Sir', 'Masters', 'asd', 12, '334', 1234134),
(10, 'anhngocnguyen1', 'Nguyen ngoc anh', 'Sir', 'Masters', 'asdasdadsa', 13, 'bach khoa ha noi', 932323232),
(11, 'abcd', 'Anh Ngoc Nguyen', 'Sir', 'Professor', 'i am teacher', 14, 'bach khoa', 2147483647),
(12, 'haha1', 'jksdf', 'Sir', 'Masters', 'asdf', 17, 'wqerqrwr', 1234134);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`),
  ADD KEY `fk_content_user1_idx` (`user_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `fk_document_user1_idx` (`user_id`);

--
-- Indexes for table `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`id_kind`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_choice`
--
ALTER TABLE `poll_choice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `choice_poll` (`poll_id`);

--
-- Indexes for table `poll_vote`
--
ALTER TABLE `poll_vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vote_poll` (`poll_id`),
  ADD KEY `vote_choice` (`choice_id`),
  ADD KEY `vote_user` (`user_id`);

--
-- Indexes for table `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_qa_user_idx` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id_subject`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`iduser_info`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `fk_user_info_user1_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kind`
--
ALTER TABLE `kind`
  MODIFY `id_kind` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `poll_choice`
--
ALTER TABLE `poll_choice`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `poll_vote`
--
ALTER TABLE `poll_vote`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qa`
--
ALTER TABLE `qa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id_subject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `iduser_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
