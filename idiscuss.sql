-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 02:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catagory_id` int(8) NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `catagory_descr` varchar(255) NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catagory_id`, `catagory_name`, `catagory_descr`, `tstamp`) VALUES
(1, 'Python', 'Python is an interpreted, high-level and general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python\'s design philosophy emphasizes code readability with its notable use of significant whitespace', '2020-10-29 18:17:52'),
(2, 'javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-or', '2020-10-29 18:18:44'),
(3, 'Django', 'Django is a Python-based free and open-source web framework that follows the model-template-views architectural pattern. It is maintained by the Django Software Foundation, an American independent organization established as a 501 non-profit.', '2020-10-30 08:35:25'),
(4, 'C', 'C is a general-purpose, procedural computer programming language supporting structured programming, lexical variable scope, and recursion, with a static type system. By design, C provides constructs that map efficiently to typical machine instructions.', '2020-10-30 08:36:12'),
(5, 'c++', 'C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\".', '2020-10-30 08:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `commented_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `commented_by`, `comment_time`) VALUES
(1, 'this is a comment', 1, 1, '2020-10-30 17:09:07'),
(2, 'this is 2nd comment', 1, 2, '2020-10-30 19:18:51'),
(3, 'solution to list python', 2, 3, '2020-10-30 19:31:36'),
(4, 'class in python are the object type', 11, 6, '2020-10-31 09:01:19'),
(6, 'this is reply to inheritence', 12, 3, '2020-10-31 15:52:50'),
(7, 'this is reply to the encaptulations', 13, 2, '2020-10-31 15:59:14'),
(8, 'The thing which i know about js is javascript', 14, 2, '2020-10-31 16:07:26'),
(9, 'C++ is the extended version of C. It way better than c', 10, 7, '2020-11-01 08:17:50'),
(10, 'Django is a framework where you can built you website very resposive...\r\n', 15, 11, '2021-01-06 10:24:43'),
(11, 'List is a iterable form', 2, 12, '2021-01-28 22:08:16'),
(12, 'Pychar is a interpreter\r\n', 1, 13, '2021-01-29 09:45:46'),
(13, 'what is list in py\r\n', 1, 13, '2021-01-29 09:47:34'),
(14, 'list are made as sqare bracket in python', 2, 16, '2021-08-10 11:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(8) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_descr` text NOT NULL,
  `thread_cat_id` int(8) NOT NULL,
  `thread_user_id` int(8) NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_descr`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'Unable to install pycharm', 'I have watched youtube tutorials to install pycharm but still not able to install to pycharm plz help me guys.....', 1, 1, '2020-10-30 09:40:45'),
(2, 'List in python', 'Please tell me something about python list', 1, 2, '2020-10-30 09:55:33'),
(3, 'Instalation of node.js', 'Please tell me some idea about the instalation of node.js', 2, 3, '2020-10-30 14:24:20'),
(4, 'fade in fade out in js', 'Tell me something about the fade in and fade out', 2, 6, '2020-10-30 16:04:52'),
(10, 'c++', 'What is c++?', 5, 6, '2020-10-30 19:44:37'),
(11, 'class in python', 'Please tell me about classes in python', 1, 2, '2020-10-31 09:00:59'),
(12, 'inheritence', 'what is inheritence', 1, 6, '2020-10-31 15:33:27'),
(13, 'Encapsulation in python', 'Please help me ', 1, 2, '2020-10-31 15:53:33'),
(14, 'what is js', 'Plz explain me ', 2, 2, '2020-10-31 16:06:57'),
(15, 'Django', 'Please tell me something about django\r\n', 3, 10, '2021-01-06 10:22:47'),
(16, 'what is list in java script', 'jdfhjkgfh', 2, 1, '2021-01-29 12:23:38'),
(17, 'Django', 'explai django url path', 3, 16, '2021-08-10 11:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'aj@gmail.com', 'aj11', '2020-10-30 22:38:23'),
(2, 'laxman@gmail.com', 'k', '2020-10-30 23:31:30'),
(3, 'thundar@gmail.com', 't', '2020-10-30 23:34:59'),
(6, 'radhe@gmail.com', 'r', '2020-10-30 23:57:57'),
(7, 'amit@gmail.com', 'aa', '2020-11-01 08:16:30'),
(8, 'vanjesumit@gmail.com', 'v', '2020-11-04 12:38:48'),
(9, 'abisek@gmail.com', 'ab', '2020-12-27 12:26:57'),
(10, 'bolt@gmail.com', 'b', '2021-01-06 10:20:09'),
(11, 'amitt@gmail.com', 'q', '2021-01-06 10:23:25'),
(12, 'Sahani@gmail.com', '1', '2021-01-28 22:06:11'),
(13, 'sait@gmail.com', '1', '2021-01-29 09:44:06'),
(14, 'tt@gmail.com', 'tt', '2021-03-30 15:03:21'),
(15, 'pratima@gmail.com', 'p', '2021-07-16 23:40:36'),
(16, 'saitt@gmail.com', '1234', '2021-08-10 11:22:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catagory_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_descr`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catagory_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
