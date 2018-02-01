-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 06:56 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `businessmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `business` varchar(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `date`, `business`, `customer`, `amount`) VALUES
(1, '2018-04-12', 'Jia Enterpr', 201801271, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'ASUS'),
(2, 'LENOVO'),
(5, 'LG'),
(4, 'MI'),
(3, 'NOKIA');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `GSTIN` varchar(255) DEFAULT NULL,
  `PAN` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `name`, `address`, `owner`, `GSTIN`, `PAN`, `mobile`) VALUES
(1, 'Jia Enterprises', 'Balua, Motihari', '0', NULL, 'CTUPK7744L', '8109698905'),
(2, 'V3', 'Indra chok, main market,hoshangabad', 'vaishali', NULL, 'VAISH1609V', '9856324170'),
(3, 'Sharma''s', 'I.T.I road, shanti nagar,hoshangabad', 'vaibhav', NULL, 'VISHU0601S', '9827282946'),
(4, 'JIA ', 'agarwa motihari,Bihar', 'jiyakhan', NULL, 'JIYA1997J', '9584761100'),
(5, 'NAYAR''S', 'ayodhaya baipass,bhopal', 'vishal', NULL, 'VISH2009K', '9827546200'),
(6, 'Sai opticals', 'haosing board,gwalior', 'Karansingh', NULL, 'KARAN1820N', '7548623540');

-- --------------------------------------------------------

--
-- Table structure for table `businessbrandmapping`
--

CREATE TABLE `businessbrandmapping` (
  `id` int(11) NOT NULL,
  `business` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businesscategorymapping`
--

CREATE TABLE `businesscategorymapping` (
  `id` int(11) NOT NULL,
  `business` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businessmodelmapping`
--

CREATE TABLE `businessmodelmapping` (
  `id` int(11) NOT NULL,
  `business` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(6, 'All books'),
(4, 'Beauty,Health,Grocery'),
(1, 'electronics'),
(2, 'mobiles,computers'),
(5, 'Toys,Baby products'),
(3, 'TV,Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_id`, `name`, `email`, `mobile`, `address`) VALUES
(1, 201801271, 'hasan', 'hrajakhan@gmail.com', '7739856619', 'agarwa, motihari'),
(7, 201801301, 'Rajesh kumar', 'rajesh31@gmail.com', '9658745210', 'shayam nagar, gwalior.'),
(8, 201802161, 'kunal singh', 'kunal14@gmail.com', '7548963250', 'narayan nagar,bhopal'),
(9, 201813141, 'Smeer ', 'sam29@gamil.com', '7584963250', 'motihari, bihar'),
(10, 201804122, 'Narayani devi', 'narayni63@gmail.com', '8159632410', 'kali nagar,jhansi'),
(11, 201805192, 'laxmi nayar', 'laxmi08@gmail.com', '9568745231', 'kalika nagar,bihar');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`) VALUES
(1, 'edge s9'),
(2, 'K5+'),
(5, 'LUMIA360'),
(3, 'REDMI3Sprime'),
(4, 'SM-G313HU'),
(6, 'ZENPHONESELFEE');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_serial` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `bill` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_serial`, `customer_id`, `bill`) VALUES
(1, '65748', '201801271', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `name`, `email`, `username`, `password`, `mobile`, `address`) VALUES
(1, 'vaishali kahar', 'vaishalikahar63@gmail.com', 'vaishali', 'vaishu12345', '9770095397', 'kachde dabba k pichhe, bus adda, hoshangabad'),
(2, 'sameer', 'sameer@123.com', 'sameer', 'sameer123', '8109698905', 'agarwa, motihari'),
(3, 'Karan singh', 'karansingh18@gmail.com', 'Karansingh', '123456789', '9857764669', 'narayan nagar,bhanpur,gwalior.'),
(4, 'Vaibhav sharma', 'vaibhav96@gmail.com', 'vaibhav', '123456789', '9827282946', 'I.T.I road, shanti nagar, hoshangabad'),
(5, 'Vishal nayar', 'vishalnayar20@gmail.com', 'vishal', '123456789', '9584779650', 'haosing board colony,bhopal'),
(6, 'Kunal ajneriya', 'kunal63@gmail.com', 'kunal', '123456789', '7584996320', 'kolhar road,bhopal'),
(7, 'Vaishnavi jha', 'vaishnavijha06@gmail.com', 'vaishnavi', '987654321', '7895462309', 'arera colony, bhopal'),
(8, 'Jiya khan', 'jiyakhan20@gmail.com', 'jiyakhan', '98754321', '9584762510', 'manakchi road,jharkhand');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `business` varchar(255) NOT NULL,
  `CP` int(11) NOT NULL,
  `MP` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `status` enum('sold','available','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `serial_number`, `category`, `brand`, `model`, `business`, `CP`, `MP`, `tax`, `status`) VALUES
(1, '65748', 'electronics', 'samsung', 'edge s9', 'Jia Enterprises', 67800, 69800, 5, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `name` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `name`) VALUES
(1, 0),
(2, 5),
(3, 12),
(4, 18),
(5, 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `businessbrandmapping`
--
ALTER TABLE `businessbrandmapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesscategorymapping`
--
ALTER TABLE `businesscategorymapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businessmodelmapping`
--
ALTER TABLE `businessmodelmapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product` (`product_serial`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ni` (`serial_number`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `businessbrandmapping`
--
ALTER TABLE `businessbrandmapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `businesscategorymapping`
--
ALTER TABLE `businesscategorymapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `businessmodelmapping`
--
ALTER TABLE `businessmodelmapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
