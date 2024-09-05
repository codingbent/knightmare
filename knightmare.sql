-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 01:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `house_no` int(5) NOT NULL,
  `house_name` varchar(40) NOT NULL,
  `line1` varchar(50) NOT NULL,
  `line2` varchar(50) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `house_no`, `house_name`, `line1`, `line2`, `city`, `state`, `country`, `pincode`) VALUES
(24, 1, 94, 'Ram Sindhu', 'Nehru park colony', 'Near soodh dharam kanta prem nagar ', 'Bareilly', 'Uttar Pradesh', 'India', 243122);

-- --------------------------------------------------------

--
-- Table structure for table `alternate_category`
--

CREATE TABLE `alternate_category` (
  `alt_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `alternate_names` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternate_category`
--

INSERT INTO `alternate_category` (`alt_id`, `c_id`, `alternate_names`) VALUES
(1, 1, 'Mobile Phones & Accessories/Cell Phones/Smartphones/iPhones'),
(2, 2, 'Personal Computers/Laptops/Notebooks'),
(3, 3, 'Portable Computers/Tablets/iPads'),
(4, 4, 'Photography Equipment/Cameras/Digital Cameras'),
(5, 5, 'Home Entertainment Systems/Televisions/TVs');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'Microsoft'),
(4, 'Canon'),
(5, 'Sony'),
(6, 'LG'),
(7, 'Dell'),
(8, 'Lenovo'),
(9, 'Nikon'),
(10, 'Panasonic'),
(11, 'Huawei'),
(12, 'HP'),
(13, 'Amazon'),
(14, 'Fujifilm'),
(15, 'Sharp'),
(16, 'Google'),
(17, 'Acer'),
(18, 'Asus'),
(19, 'Olympus'),
(20, 'TCL'),
(21, 'Motorola'),
(22, 'MSI'),
(23, 'Xiaomi'),
(24, 'Leica'),
(25, 'Vizio'),
(26, 'OnePlus'),
(27, 'Razer'),
(28, 'Wacom'),
(29, 'Pentax'),
(30, 'Hisense'),
(35, 'HTC'),
(38, 'GoPro'),
(40, 'Nokia'),
(43, 'Phase One'),
(44, 'Philips'),
(45, 'BlackBerry'),
(48, 'Ricoh');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `image`, `category_name`) VALUES
(1, 'images/iphone15_1.jpg', 'Smartphones'),
(2, 'images/dell laptop.webp', 'Laptops'),
(3, 'images/microsoft tablet.jfif', 'Tablets'),
(4, 'images/canon camera.jfif', 'Cameras'),
(5, 'images/panasonic tv.jpg', 'Televisions');

-- --------------------------------------------------------

--
-- Table structure for table `category_brand`
--

CREATE TABLE `category_brand` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_brand`
--

INSERT INTO `category_brand` (`id`, `p_id`, `c_id`, `brand_id`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2),
(3, 3, 3, 3),
(4, 4, 4, 4),
(5, 5, 5, 5),
(6, 6, 1, 6),
(7, 7, 2, 7),
(8, 8, 3, 8),
(9, 9, 4, 9),
(10, 10, 5, 10),
(11, 11, 1, 11),
(12, 12, 2, 12),
(13, 13, 3, 13),
(14, 14, 4, 14),
(15, 15, 5, 15),
(16, 16, 1, 16),
(17, 17, 2, 17),
(18, 18, 3, 18),
(19, 19, 4, 19),
(20, 20, 5, 20),
(21, 21, 1, 21),
(22, 22, 2, 22),
(23, 23, 3, 23),
(24, 24, 4, 24),
(25, 25, 5, 25),
(26, 26, 1, 26),
(27, 27, 2, 27),
(28, 28, 3, 28),
(29, 29, 4, 29),
(30, 30, 5, 30),
(31, 31, 1, 5),
(32, 32, 2, 22),
(33, 33, 3, 8),
(34, 34, 4, 5),
(35, 35, 5, 1),
(36, 36, 1, 35),
(37, 37, 2, 17),
(38, 38, 3, 13),
(39, 39, 4, 38),
(40, 40, 5, 6),
(41, 41, 1, 40),
(42, 42, 2, 7),
(43, 43, 3, 1),
(44, 44, 4, 43),
(45, 45, 5, 44),
(46, 46, 1, 45),
(47, 47, 2, 22),
(48, 48, 3, 2),
(49, 49, 4, 48),
(50, 50, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `firstname`, `lastname`, `email`, `pass`, `role`) VALUES
(1, 'abhed', 'agarwal', 'abhed@gmail.com', '1234567890', 2),
(2, 'Sandeep', 'Sharma', 'sandeep@gmail.com', '12345', 0),
(3, 'Nitesh', 'kumar', 'nitesh@gmail.com', 'asdfghjkl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `sales` int(11) NOT NULL,
  `orders` int(11) NOT NULL,
  `product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `user_id`, `product_id`) VALUES
(13, 1, 12),
(14, 1, 2),
(15, 1, 7),
(16, 1, 16),
(28, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `status`, `product_id`, `quantity`) VALUES
(7, 1, '2024-07-17 13:19:46', 'Pending', 11, 1),
(8, 1, '2024-07-18 08:00:06', 'Pending', 1, 1),
(9, 1, '2024-07-18 08:02:22', 'Pending', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `label` varchar(200) NOT NULL,
  `price` int(5) NOT NULL,
  `image` varchar(250) NOT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `image3` varchar(250) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `title`, `label`, `price`, `image`, `image2`, `image3`, `c_id`, `brand_id`) VALUES
(1, 'Samsung Galaxy A-34', 'Advanced smartphone with latest features.', 25000, 'images/samsung-galaxy-a34.webp', NULL, '0', 1, 1),
(2, 'Apple Laptop', 'High-performance laptop for productivity.', 120000, 'images/mac.jpg', NULL, NULL, 2, 2),
(3, 'Microsoft Tablet', 'Versatile tablet for work and play.', 60000, 'images/microsoft tablet.jfif', NULL, NULL, 3, 3),
(4, 'Canon Camera', 'Professional camera for photography enthusiasts.', 95000, 'images/canon camera.jfif', NULL, NULL, 4, 4),
(5, 'Sony Television', 'Smart television with immersive experience.', 90000, 'images/sonytv.jfif', NULL, NULL, 5, 5),
(6, 'LG Smartphone', 'Feature-rich smartphone with AI capabilities.', 85000, 'images/lg-phone.jpg', NULL, NULL, 1, 6),
(7, 'Dell Laptop', 'Reliable laptop for business and personal use.', 110000, 'images/dell laptop.webp', NULL, NULL, 2, 7),
(8, 'Lenovo Tablet', 'Affordable tablet for everyday tasks.', 65000, 'images/lenevo tablet.webp', NULL, NULL, 3, 8),
(9, 'Nikon Camera', 'Compact camera with high-resolution sensor.', 120000, 'images/nikon camera.webp', NULL, NULL, 4, 9),
(10, 'Panasonic Television', 'Ultra HD television with cinematic sound.', 80000, 'images/panasonic tv.jpg', NULL, NULL, 5, 10),
(11, 'Huawei Smartphone', 'Flagship smartphone with cutting-edge technology.', 100000, 'images/huawei phone.png', NULL, NULL, 1, 11),
(12, 'HP Laptop', 'Sleek laptop with fast processing power.', 80000, 'images/hp laptop.webp', NULL, NULL, 2, 12),
(13, 'Amazon Kindle', 'E-reader tablet for avid readers.', 3000, 'images/amazon kindel.jpg', NULL, NULL, 3, 13),
(14, 'Fujifilm Camera', 'Mirrorless camera for creative photography.', 110000, 'images/fujifilm camera.jpg', NULL, NULL, 4, 14),
(15, 'Sharp Television', 'LED TV with vivid colors and smart features.', 45000, 'images/sharp tv.jpeg', NULL, NULL, 5, 15),
(16, 'Google Pixel 8 pro', 'Pixel smartphone with AI-driven camera features.', 100000, 'images/google pixel.jfif', NULL, NULL, 1, 16),
(17, 'Acer Laptop', 'Budget-friendly laptop with good performance.', 120000, 'images/acer laptop.webp', NULL, NULL, 2, 17),
(18, 'Asus Tablet', 'Gaming tablet for mobile gamers.', 20000, 'images/asus tablet.jfif', NULL, NULL, 3, 18),
(19, 'Olympus Camera', 'Weather-sealed camera for outdoor photography.', 92000, 'images/Olympus Camera.webp', NULL, NULL, 4, 19),
(20, 'TCL Television', 'Affordable smart TV with Roku integration.', 71000, 'images/tcl tv.webp', NULL, NULL, 5, 20),
(21, 'Motorola Smartphone', 'Durable smartphone with long battery life.', 70000, 'images/Motorola Smartphone.webp', NULL, NULL, 1, 21),
(22, 'MSI Laptop', 'Gaming laptop with powerful graphics.', 80000, 'images/msi laptop.webp', NULL, NULL, 2, 22),
(23, 'Xiaomi Tablet', 'Budget tablet with high-resolution display.', 25000, 'images/Xiaomi Tablet.webp', NULL, NULL, 3, 23),
(24, 'Leica Camera', 'Premium camera with exceptional lens quality.', 500000, 'images/Leica Camera.webp', NULL, NULL, 4, 24),
(25, 'Vizio Television', 'Smart TV with built-in streaming apps.', 40000, 'images/Vizio Television.webp', NULL, NULL, 5, 25),
(26, 'OnePlus Smartphone', 'Flagship killer smartphone with OxygenOS.', 70000, 'images/oneplus phone.webp', NULL, NULL, 1, 26),
(27, 'Razer Laptop', 'Ultra-thin laptop for gaming enthusiasts.', 220000, 'images/razer laptop.jfif', NULL, NULL, 2, 27),
(28, 'Wacom Tablet', 'Graphic tablet for digital artists.', 64000, 'images/wacom.jpg', NULL, NULL, 3, 28),
(29, 'Pentax Camera', 'DSLR camera for professional photographers.', 270000, 'images/pentax camera.webp', NULL, NULL, 4, 29),
(30, 'Hisense Television', 'Affordable 4K TV with HDR support.', 70000, 'images/Hisense Television.jfif', NULL, NULL, 5, 30),
(31, 'Sony Xperia Pro', 'Premium smartphone with 5G connectivity.', 110000, 'images/Sony Xperia Smartphone.jpg', NULL, NULL, 1, 5),
(32, 'MSI Gaming Laptop', 'High-performance gaming laptop.', 110000, 'images/msi latop@2.jfif', NULL, NULL, 2, 22),
(33, 'Lenovo Yoga Tablet', 'Versatile tablet with flexible design.', 20000, 'images/lenvo yoga tablet.jpg', NULL, NULL, 3, 8),
(34, 'Sony Alpha Camera', 'Mirrorless camera with fast autofocus.', 120000, 'images/Sony Alpha Camera.jpg', NULL, NULL, 4, 5),
(35, 'Samsung QLED Televis', 'QLED TV with Quantum Dot technology.', 120000, 'images/Samsung QLED Televis.jpg', NULL, NULL, 5, 1),
(36, 'HTC Smartphone', 'Elegant smartphone with BoomSound audio.', 60000, 'images/HTC Smartphone.jpg', NULL, NULL, 1, 35),
(37, 'Acer Predator Laptop', 'Powerful gaming laptop for hardcore gamers.', 125000, 'images/Acer Predator Laptop.jpg', NULL, NULL, 2, 17),
(38, 'Amazon Fire Tablet', 'Affordable tablet with Alexa integration.', 12000, 'images/Amazon Fire Tablet.jpg', NULL, NULL, 3, 13),
(39, 'GoPro Camera', 'Action camera for capturing adventurous moments.', 75000, 'images/GoPro Camera.jpg', NULL, NULL, 4, 38),
(40, 'LG OLED Television', 'OLED TV with deep blacks and vibrant colors.', 170000, 'images/LG OLED Television.jpg', NULL, NULL, 5, 6),
(41, 'Nokia Smartphone', 'Reliable smartphone with durable design.', 20000, 'images/Nokia smartphone.jpg', NULL, NULL, 1, 40),
(42, 'Alienware Laptop', 'Gaming laptop with AlienFX lighting.', 180000, 'images/Alienware Laptop.jpg', NULL, NULL, 2, 7),
(43, 'Samsung Galaxy Tab', 'Premium tablet for productivity.', 60000, 'images/Samsung Galaxy Tab.jfif', NULL, NULL, 3, 1),
(44, 'Phase One Camera', 'Medium format camera for professional photography.', 400000, 'images/Phase One Camera.jpg', NULL, NULL, 4, 43),
(45, 'Philips Television', 'Smart TV with Ambilight technology.', 47000, 'images/Philips Television.jpg', NULL, NULL, 5, 44),
(46, 'BlackBerry Smartphon', 'Secure smartphone with BlackBerry Hub.', 38000, 'images/BlackBerry Smartphon.jfif', NULL, NULL, 1, 45),
(47, 'MSI Prestige Laptop', 'Stylish laptop for business professionals.', 130000, '', NULL, NULL, 2, 22),
(48, 'Apple iPad', 'Iconic tablet with Retina display.', 72000, 'images/ipad.jpg', NULL, NULL, 3, 2),
(49, 'Ricoh Camera', 'Compact camera for street photography.', 40000, '', NULL, NULL, 4, 48),
(50, 'Sharp Aquos Televisi', 'Aquos TV with Quattron Pro technology.', 45000, '', NULL, NULL, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `features` text DEFAULT NULL,
  `storage_tips` text DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `seller` varchar(100) DEFAULT NULL,
  `disclaimer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `p_id`, `features`, `storage_tips`, `unit`, `seller`, `disclaimer`) VALUES
(1, 1, 'Advanced smartphone with latest features.', 'Keep away from extreme temperatures.', '1 unit', 'DMart Pvt. LTD', 'Please read the user manual before using the product.'),
(2, 2, 'High-performance laptop for productivity.', 'Store in a cool, dry place.', '1 unit', 'DMart Pvt. LTD', 'Check warranty terms before purchase.'),
(3, 3, 'Versatile tablet for work and play.', 'Keep away from direct sunlight.', '1 unit', 'DMart Pvt. LTD', 'Handle with care.'),
(4, 4, 'Professional camera for photography enthusiasts.', 'Store in a camera bag when not in use.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user guide for detailed instructions.'),
(5, 5, 'Smart television with immersive experience.', 'Avoid placing near magnetic devices.', '1 unit', 'DMart Pvt. LTD', 'Read installation guidelines.'),
(6, 6, 'Feature-rich smartphone with AI capabilities.', 'Store in a protective case.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user manual for proper usage.'),
(7, 7, 'Reliable laptop for business and personal use.', 'Keep away from liquids.', '1 unit', 'DMart Pvt. LTD', 'Check warranty terms before purchase.'),
(8, 8, 'Affordable tablet for everyday tasks.', 'Store in a dry place.', '1 unit', 'DMart Pvt. LTD', 'Handle with care.'),
(9, 9, 'Compact camera with high-resolution sensor.', 'Store in a camera bag.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user guide for detailed instructions.'),
(10, 10, 'Ultra HD television with cinematic sound.', 'Avoid placing near magnetic devices.', '1 unit', 'DMart Pvt. LTD', 'Read installation guidelines.'),
(11, 11, 'Flagship smartphone with cutting-edge technology.', 'Store in a protective case.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user manual for proper usage.'),
(12, 12, 'Sleek laptop with fast processing power.', 'Keep away from liquids.', '1 unit', 'DMart Pvt. LTD', 'Check warranty terms before purchase.'),
(13, 13, 'E-reader tablet for avid readers.', 'Store in a cool, dry place.', '1 unit', 'DMart Pvt. LTD', 'Handle with care.'),
(14, 14, 'Mirrorless camera for creative photography.', 'Store in a camera bag.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user guide for detailed instructions.'),
(15, 15, 'LED TV with vivid colors and smart features.', 'Avoid placing near magnetic devices.', '1 unit', 'DMart Pvt. LTD', 'Read installation guidelines.'),
(16, 16, 'Pixel smartphone with AI-driven camera features.', 'Store in a protective case.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user manual for proper usage.'),
(17, 17, 'Budget-friendly laptop with good performance.', 'Keep away from liquids.', '1 unit', 'DMart Pvt. LTD', 'Check warranty terms before purchase.'),
(18, 18, 'Gaming tablet for mobile gamers.', 'Store in a dry place.', '1 unit', 'DMart Pvt. LTD', 'Handle with care.'),
(19, 19, 'Weather-sealed camera for outdoor photography.', 'Store in a camera bag.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user guide for detailed instructions.'),
(20, 20, 'Affordable smart TV with Roku integration.', 'Avoid placing near magnetic devices.', '1 unit', 'DMart Pvt. LTD', 'Read installation guidelines.'),
(21, 21, 'Durable smartphone with long battery life.', 'Store in a protective case.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user manual for proper usage.'),
(22, 22, 'Gaming laptop with powerful graphics.', 'Keep away from liquids.', '1 unit', 'DMart Pvt. LTD', 'Check warranty terms before purchase.'),
(23, 23, 'Budget tablet with high-resolution display.', 'Store in a dry place.', '1 unit', 'DMart Pvt. LTD', 'Handle with care.'),
(24, 24, 'Premium camera with exceptional lens quality.', 'Store in a camera bag.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user guide for detailed instructions.'),
(25, 25, 'Smart TV with built-in streaming apps.', 'Avoid placing near magnetic devices.', '1 unit', 'DMart Pvt. LTD', 'Read installation guidelines.'),
(26, 26, 'Flagship killer smartphone with OxygenOS.', 'Store in a protective case.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user manual for proper usage.'),
(27, 27, 'Ultra-thin laptop for gaming enthusiasts.', 'Keep away from liquids.', '1 unit', 'DMart Pvt. LTD', 'Check warranty terms before purchase.'),
(28, 28, 'Graphic tablet for digital artists.', 'Store in a dry place.', '1 unit', 'DMart Pvt. LTD', 'Handle with care.'),
(29, 29, 'DSLR camera for professional photographers.', 'Store in a camera bag.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user guide for detailed instructions.'),
(30, 30, 'Affordable 4K TV with HDR support.', 'Avoid placing near magnetic devices.', '1 unit', 'DMart Pvt. LTD', 'Read installation guidelines.'),
(31, 31, 'Premium smartphone with 5G connectivity.', 'Store in a protective case.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user manual for proper usage.'),
(32, 32, 'High-performance gaming laptop.', 'Keep away from liquids.', '1 unit', 'DMart Pvt. LTD', 'Check warranty terms before purchase.'),
(33, 33, 'Versatile tablet with flexible design.', 'Store in a dry place.', '1 unit', 'DMart Pvt. LTD', 'Handle with care.'),
(34, 34, 'Mirrorless camera with fast autofocus.', 'Store in a camera bag.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user guide for detailed instructions.'),
(35, 35, 'QLED TV with Quantum Dot technology.', 'Avoid placing near magnetic devices.', '1 unit', 'DMart Pvt. LTD', 'Read installation guidelines.'),
(36, 36, 'Elegant smartphone with BoomSound audio.', 'Store in a protective case.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user manual for proper usage.'),
(37, 37, 'Powerful gaming laptop for hardcore gamers.', 'Keep away from liquids.', '1 unit', 'DMart Pvt. LTD', 'Check warranty terms before purchase.'),
(38, 38, 'Affordable tablet with Alexa integration.', 'Store in a dry place.', '1 unit', 'DMart Pvt. LTD', 'Handle with care.'),
(39, 39, 'Action camera for capturing adventurous moments.', 'Store in a camera bag.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user guide for detailed instructions.'),
(40, 40, 'OLED TV with deep blacks and vibrant colors.', 'Avoid placing near magnetic devices.', '1 unit', 'DMart Pvt. LTD', 'Read installation guidelines.'),
(41, 41, 'Reliable smartphone with durable design.', 'Store in a protective case.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user manual for proper usage.'),
(42, 42, 'Gaming laptop with AlienFX lighting.', 'Keep away from liquids.', '1 unit', 'DMart Pvt. LTD', 'Check warranty terms before purchase.'),
(43, 43, 'Premium tablet for productivity.', 'Store in a dry place.', '1 unit', 'DMart Pvt. LTD', 'Handle with care.'),
(44, 44, 'Medium format camera for professional photography.', 'Store in a camera bag.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user guide for detailed instructions.'),
(45, 45, 'Smart TV with Ambilight technology.', 'Avoid placing near magnetic devices.', '1 unit', 'DMart Pvt. LTD', 'Read installation guidelines.'),
(46, 46, 'Secure smartphone with BlackBerry Hub.', 'Store in a protective case.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user manual for proper usage.'),
(47, 47, 'Stylish laptop for business professionals.', 'Keep away from liquids.', '1 unit', 'DMart Pvt. LTD', 'Check warranty terms before purchase.'),
(48, 48, 'Iconic tablet with Retina display.', 'Store in a dry place.', '1 unit', 'DMart Pvt. LTD', 'Handle with care.'),
(49, 49, 'Compact camera for street photography.', 'Store in a camera bag.', '1 unit', 'DMart Pvt. LTD', 'Refer to the user guide for detailed instructions.'),
(50, 50, 'Aquos TV with Quattron Pro technology.', 'Avoid placing near magnetic devices.', '1 unit', 'DMart Pvt. LTD', 'Read installation guidelines.');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `alternate_category`
--
ALTER TABLE `alternate_category`
  ADD PRIMARY KEY (`alt_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `category_brand`
--
ALTER TABLE `category_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `fk_product_category` (`c_id`),
  ADD KEY `fk_product_brand` (`brand_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `alternate_category`
--
ALTER TABLE `alternate_category`
  MODIFY `alt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_brand`
--
ALTER TABLE `category_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `alternate_category`
--
ALTER TABLE `alternate_category`
  ADD CONSTRAINT `alternate_category_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `category_brand`
--
ALTER TABLE `category_brand`
  ADD CONSTRAINT `category_brand_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`),
  ADD CONSTRAINT `category_brand_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `category_brand_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`);

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `c_id` FOREIGN KEY (`c_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `sales_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
