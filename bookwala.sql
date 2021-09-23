-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 02:07 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookwala`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(30) NOT NULL,
  `admin_first_name` varchar(30) DEFAULT NULL,
  `admin_last_name` varchar(30) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_phone` varchar(10) DEFAULT NULL,
  `admin_country` varchar(15) DEFAULT NULL,
  `admin_date_of_birth` date DEFAULT NULL,
  `admin_degination` varchar(20) DEFAULT NULL,
  `admin_password` varchar(60) DEFAULT NULL,
  `admin_verifyed` int(11) DEFAULT NULL,
  `admin_verify` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_first_name`, `admin_last_name`, `admin_email`, `admin_phone`, `admin_country`, `admin_date_of_birth`, `admin_degination`, `admin_password`, `admin_verifyed`, `admin_verify`) VALUES
('admin##Krishna1630053739', 'Krishna', 'Krishna', 'manishkumar620350@gmail.com', '9661205085', 'India', '2021-08-07', 'admin', 'd4b3e6686542176eec5966b37719decab1b9b4c4', 1, 'dc7a49140f6cfb25f43004d9b57ed757626a8962'),
('admin##Krishna1632310915', 'Krishna', 'Krishna', 'krishna966120@gmail.com', '9661205085', 'India', '2021-09-02', 'manager', 'd4b3e6686542176eec5966b37719decab1b9b4c4', 0, '35bfaec549ec89184dd4fcb5675e7062f9619e39');

-- --------------------------------------------------------

--
-- Table structure for table `book_image`
--

CREATE TABLE `book_image` (
  `image_id` int(11) NOT NULL,
  `folder_name` varchar(50) DEFAULT NULL,
  `image_front` varchar(50) DEFAULT NULL,
  `image_back` varchar(50) DEFAULT NULL,
  `image_mrp` varchar(50) DEFAULT NULL,
  `image_edition` varchar(50) DEFAULT NULL,
  `image_middle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_image`
--

INSERT INTO `book_image` (`image_id`, `folder_name`, `image_front`, `image_back`, `image_mrp`, `image_edition`, `image_middle`) VALUES
(9, 'compurt engg-1630220744', '1632364774-front-tourchlight.png', '1630220744-insideder.png', '1630220744-random.png', '1630220744-tourchlight.png', '1630220744-Untitled (2).png'),
(24, 'dfsvfdsbvdfb-1631888177', '1631888177-front-Untitled (2).png', '1631888177-back-tourchlight.png', '1631888177-mrp-Untitled (2).png', '1631888177-edition-tourchlight.png', '1631888177-mid-tourchlight.png'),
(25, 'dfsvfdsbvdfb-1631888285', '1631888285-front-Untitled.png', '1631888285-back-Untitled.png', '1631888285-mrp-random.png', '1631888285-edition-insideder.png', '1631888285-mid-adminLayout.png'),
(26, 'dfsvfdsbvdfbfgnhfgn-1631942905', '1631942905-front-insideder.png', '1631942905-back-adminLayout.png', '1631942905-mrp-tourchlight.png', '1631942905-edition-Untitled.png', '1631942905-mid-random.png'),
(1632054640, 'vashant-1632054775', '1632057081-front-tourchlight.png', '1632309415-back-adminLayout.png', '1632056448-mrp-tourchlight.png', '1632057959-edition-insideder.png', '1632056885-middle-tourchlight.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'school'),
(2, 'collage');

-- --------------------------------------------------------

--
-- Table structure for table `customber`
--

CREATE TABLE `customber` (
  `customer_id` varchar(30) NOT NULL,
  `customer_first_name` varchar(30) DEFAULT NULL,
  `customer_last_name` varchar(30) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_phone` varchar(10) DEFAULT NULL,
  `customer_country` varchar(15) DEFAULT NULL,
  `customer_state` varchar(15) DEFAULT NULL,
  `customer_address` varchar(200) DEFAULT NULL,
  `customer_pin` varchar(10) DEFAULT NULL,
  `customer_city` varchar(30) DEFAULT NULL,
  `customer_password` varchar(60) DEFAULT NULL,
  `customer_verifyed` int(11) DEFAULT NULL,
  `customer_verification` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customber`
--

INSERT INTO `customber` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_email`, `customer_phone`, `customer_country`, `customer_state`, `customer_address`, `customer_pin`, `customer_city`, `customer_password`, `customer_verifyed`, `customer_verification`) VALUES
('customber##123456789', 'krishna', 'krishna', 'krishna@gmail.com', '1234567890', 'india', 'bihar', 'ganganagar gali no 1', '813203', 'kahalgaon', 'qwedsfrgc2345gh6tu87yhgb', 0, 'qdfgt5rdefu75ljnvb4yfdb765dsjfbudc');

-- --------------------------------------------------------

--
-- Table structure for table `degination`
--

CREATE TABLE `degination` (
  `deg_id` int(11) NOT NULL,
  `deg_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `degination`
--

INSERT INTO `degination` (`deg_id`, `deg_name`) VALUES
(1, 'manager'),
(2, 'accountant'),
(3, 'store manager'),
(4, 'inventory manager'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `order_manage`
--

CREATE TABLE `order_manage` (
  `order_id` varchar(30) NOT NULL,
  `customer_id` varchar(30) DEFAULT NULL,
  `customer_name` varchar(30) DEFAULT NULL,
  `dilevery_address` varchar(70) DEFAULT NULL,
  `date_of_delivery` date DEFAULT NULL,
  `date_of_order` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `book_id` varchar(30) NOT NULL,
  `book_title` varchar(100) DEFAULT NULL,
  `book_author` varchar(50) DEFAULT NULL,
  `book_description` varchar(300) DEFAULT NULL,
  `book_publisher` varchar(100) DEFAULT NULL,
  `book_edition` int(11) DEFAULT NULL,
  `book_pages` int(11) DEFAULT NULL,
  `book_category` int(11) DEFAULT NULL,
  `book_subcategory` int(11) DEFAULT NULL,
  `book_subject_name` int(11) DEFAULT NULL,
  `book_MRP` int(11) DEFAULT NULL,
  `book_cost_price` int(11) DEFAULT NULL,
  `book_sell_price` int(11) DEFAULT NULL,
  `book_image` varchar(60) DEFAULT NULL,
  `book_status` int(11) DEFAULT NULL,
  `book_approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`book_id`, `book_title`, `book_author`, `book_description`, `book_publisher`, `book_edition`, `book_pages`, `book_category`, `book_subcategory`, `book_subject_name`, `book_MRP`, `book_cost_price`, `book_sell_price`, `book_image`, `book_status`, `book_approval`) VALUES
('book-##-1630220744', 'compurt engg', 'krishna', 'kumar', 'krishna publication', 1, 1300, 2, 3, 5, 432, 324, 132, 'compurt engg-1630220744', 1, 1),
('book-##-1631888177', 'dfsvfdsbvdfb', 'krishna', 'esfgvsergv', 'sdxfbdbdb', 544, 54654, 1, 1, 1, 6546, 456, 4567, 'dfsvfdsbvdfb-1631888177', 1, 1),
('book-##-1631888285', 'dfsvfdsbvdfb', 'krishna', 'fdgbhfgn', 'sdxfbdbdb', 4564, 456546, 1, 1, 1, 54654, 57657, 456, 'dfsvfdsbvdfb-1631888285', 1, 1),
('book-##-1631942905', 'dfsvfdsbvdfbfgnhfgn', 'fdsbvfdbfdb', 'fdsxbfdbfdb', 'fdbfdbfdbd', 3543, 456, 1, 1, 1, 6456, 65467, 46546, 'dfsvfdsbvdfbfgnhfgn-1631942905', 1, 1),
('book-##-1632054775', 'vashant', 'krish', 'sdvfgsfdbv', 'krishna pub', 435, 453654, 1, 2, 1, 56546, 56457, 7567, 'vashant-1632054775', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(30) DEFAULT NULL,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategory_name`, `category`) VALUES
(1, 'NCERT', 1),
(2, 'PRIVATE', 1),
(3, 'BTECH', 2),
(4, 'BSC', 2),
(5, 'BA', 2),
(6, 'BCOM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subject_book`
--

CREATE TABLE `subject_book` (
  `sub_book_id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `sub_book_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_book`
--

INSERT INTO `subject_book` (`sub_book_id`, `category`, `subcategory`, `sub_book_name`) VALUES
(1, 1, 1, 'physic'),
(2, 1, 1, 'chemistry'),
(3, 1, 1, 'biology'),
(4, 1, 1, 'mathmatics'),
(5, 1, 1, 'english'),
(6, 1, 1, 'physical education'),
(7, 1, 1, 'science'),
(8, 1, 1, 'social science'),
(9, 1, 1, 'hindi');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book_image`
--
ALTER TABLE `book_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customber`
--
ALTER TABLE `customber`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `degination`
--
ALTER TABLE `degination`
  ADD PRIMARY KEY (`deg_id`);

--
-- Indexes for table `order_manage`
--
ALTER TABLE `order_manage`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_category` (`book_category`),
  ADD KEY `book_subcategory` (`book_subcategory`),
  ADD KEY `book_subject_name` (`book_subject_name`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `subject_book`
--
ALTER TABLE `subject_book`
  ADD PRIMARY KEY (`sub_book_id`),
  ADD KEY `category` (`category`),
  ADD KEY `subcategory` (`subcategory`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_image`
--
ALTER TABLE `book_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1632054641;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `degination`
--
ALTER TABLE `degination`
  MODIFY `deg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject_book`
--
ALTER TABLE `subject_book`
  MODIFY `sub_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_manage`
--
ALTER TABLE `order_manage`
  ADD CONSTRAINT `order_manage_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customber` (`customer_id`);

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`book_category`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `store_ibfk_2` FOREIGN KEY (`book_subcategory`) REFERENCES `subcategory` (`subcategory_id`),
  ADD CONSTRAINT `store_ibfk_3` FOREIGN KEY (`book_subject_name`) REFERENCES `subject_book` (`sub_book_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `subject_book`
--
ALTER TABLE `subject_book`
  ADD CONSTRAINT `subject_book_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `subject_book_ibfk_2` FOREIGN KEY (`subcategory`) REFERENCES `subcategory` (`subcategory_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
