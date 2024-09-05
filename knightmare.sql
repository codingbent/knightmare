-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2024 at 09:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knightmare`
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
(24, 1, 94, 'Ram Sindhu', 'Nehru park colony', 'Near soodh dharam kanta prem nagar ', 'Bareilly', 'Uttar Pradesh', 'India', 243122),
(38, 2, 78, 'manipal', 'manipal jai[ur', '', 'jaipur', 'Rajasthan', 'India', 303333);

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
  `category_name` varchar(255) NOT NULL,
  `category image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category image`) VALUES
(1, 'Electronics', ''),
(2, 'Home Appliances', ''),
(3, 'Fashion', ''),
(4, 'Furniture', ''),
(5, 'Health & Beauty', ''),
(6, 'Sports & Outdoors', ''),
(7, 'Toys & Games', ''),
(8, 'Books & Media', ''),
(9, 'Automotive', ''),
(10, 'Food & Beverages', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
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
(3, 'Nitesh', 'kumar', 'nitesh@gmail.com', 'asdfghjkl', 1),
(5, 'John', 'Doe', 'john1@example.com', 'password123', 1),
(6, 'Jane', 'Doe', 'jane1@example.com', 'password123', 1),
(7, 'Robert', 'Smith', 'robert1@example.com', 'password123', 1),
(8, 'Emily', 'Clark', 'emily1@example.com', 'password123', 1),
(9, 'Michael', 'Johnson', 'michael1@example.com', 'password123', 1),
(52, 'John', 'Doe', 'john1@example.com', 'password123', 1),
(53, 'Jane', 'Doe', 'jane1@example.com', 'password123', 1),
(54, 'Robert', 'Smith', 'robert1@example.com', 'password123', 1),
(55, 'Emily', 'Clark', 'emily1@example.com', 'password123', 1),
(56, 'Michael', 'Johnson', 'michael1@example.com', 'password123', 1),
(57, 'Alice', 'White', 'alice1@example.com', 'password123', 2),
(58, 'Bob', 'Brown', 'bob1@example.com', 'password123', 2),
(59, 'David', 'Wilson', 'david1@example.com', 'password123', 0),
(60, 'Mary', 'Davis', 'mary1@example.com', 'password123', 0),
(61, 'James', 'Miller', 'james1@example.com', 'password123', 0),
(62, 'Linda', 'Taylor', 'linda1@example.com', 'password123', 0),
(63, 'William', 'Anderson', 'william1@example.com', 'password123', 0),
(64, 'Patricia', 'Thomas', 'patricia1@example.com', 'password123', 0),
(65, 'Richard', 'Jackson', 'richard1@example.com', 'password123', 0),
(66, 'Barbara', 'Moore', 'barbara1@example.com', 'password123', 0),
(67, 'Charles', 'Martin', 'charles1@example.com', 'password123', 0),
(68, 'Jennifer', 'Lee', 'jennifer1@example.com', 'password123', 0),
(69, 'Joseph', 'Harris', 'joseph1@example.com', 'password123', 0),
(70, 'Susan', 'Walker', 'susan1@example.com', 'password123', 0),
(71, 'Thomas', 'Hall', 'thomas1@example.com', 'password123', 0),
(72, 'Jessica', 'Allen', 'jessica1@example.com', 'password123', 0),
(73, 'Christopher', 'Young', 'christopher1@example.com', 'password123', 0),
(74, 'Sarah', 'King', 'sarah1@example.com', 'password123', 0),
(75, 'Daniel', 'Wright', 'daniel1@example.com', 'password123', 0),
(76, 'Karen', 'Scott', 'karen1@example.com', 'password123', 0),
(77, 'Matthew', 'Green', 'matthew1@example.com', 'password123', 0),
(78, 'Nancy', 'Adams', 'nancy1@example.com', 'password123', 0),
(79, 'Anthony', 'Baker', 'anthony1@example.com', 'password123', 0),
(80, 'Betty', 'Nelson', 'betty1@example.com', 'password123', 0),
(81, 'Mark', 'Carter', 'mark1@example.com', 'password123', 0),
(82, 'Lisa', 'Mitchell', 'lisa1@example.com', 'password123', 0),
(83, 'Donald', 'Perez', 'donald1@example.com', 'password123', 0),
(84, 'Dorothy', 'Roberts', 'dorothy1@example.com', 'password123', 0),
(85, 'George', 'Turner', 'george1@example.com', 'password123', 0),
(86, 'Sandra', 'Phillips', 'sandra1@example.com', 'password123', 0),
(87, 'Kenneth', 'Campbell', 'kenneth1@example.com', 'password123', 0),
(88, 'Carol', 'Parker', 'carol1@example.com', 'password123', 0),
(89, 'Steven', 'Evans', 'steven1@example.com', 'password123', 0),
(90, 'Michelle', 'Edwards', 'michelle1@example.com', 'password123', 0),
(91, 'Paul', 'Collins', 'paul1@example.com', 'password123', 0),
(92, 'Sharon', 'Stewart', 'sharon1@example.com', 'password123', 0),
(93, 'Andrew', 'Sanchez', 'andrew1@example.com', 'password123', 0),
(94, 'Laura', 'Morris', 'laura1@example.com', 'password123', 0),
(95, 'Joshua', 'Rogers', 'joshua1@example.com', 'password123', 0),
(96, 'Cynthia', 'Reed', 'cynthia1@example.com', 'password123', 0),
(97, 'Brian', 'Cook', 'brian1@example.com', 'password123', 0),
(98, 'Angela', 'Morgan', 'angela1@example.com', 'password123', 0),
(99, 'Kevin', 'Bell', 'kevin1@example.com', 'password123', 0),
(100, 'Helen', 'Murphy', 'helen1@example.com', 'password123', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `label` varchar(200) NOT NULL,
  `price` int(5) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `image3` varchar(250) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `sub_c_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `title`, `label`, `price`, `image`, `image2`, `image3`, `c_id`, `sub_c_id`) VALUES
(1, 'iPhone 13', 'Apple iPhone 13, 128GB, 5G', 999, 'images/iphone15_1.jpg', NULL, NULL, 1, 1),
(2, 'Samsung Galaxy S21', 'Samsung Galaxy S21, 128GB, 5G', 899, 'images/samsung-galaxy-a34.webp', NULL, NULL, 1, 1),
(3, 'MacBook Pro', 'Apple MacBook Pro 13-inch, M1 Chip', 1299, NULL, NULL, NULL, 1, 2),
(4, 'Dell XPS 13', 'Dell XPS 13, 11th Gen Intel Core', 1199, NULL, NULL, NULL, 1, 2),
(5, 'iPad Pro', 'Apple iPad Pro 12.9-inch, M1 Chip', 1099, NULL, NULL, NULL, 1, 3),
(6, 'Samsung Galaxy Tab S7', 'Samsung Galaxy Tab S7, 128GB', 699, NULL, NULL, NULL, 1, 3),
(7, 'Canon EOS R5', 'Canon EOS R5, Mirrorless Camera, 45MP', 3899, NULL, NULL, NULL, 1, 4),
(8, 'Sony Alpha A7 III', 'Sony Alpha A7 III, Full Frame Mirrorless', 1999, NULL, NULL, NULL, 1, 4),
(9, 'LG OLED C1', 'LG OLED C1, 55-inch 4K Smart TV', 1299, NULL, NULL, NULL, 1, 5),
(10, 'Samsung QLED Q80T', 'Samsung QLED Q80T, 65-inch 4K Smart TV', 1399, NULL, NULL, NULL, 1, 5),
(11, 'LG French Door', 'LG French Door Refrigerator, 28 cu. ft.', 1999, NULL, NULL, NULL, 2, 6),
(12, 'Samsung Family Hub', 'Samsung Family Hub Refrigerator, 26 cu. ft.', 2299, NULL, NULL, NULL, 2, 6),
(13, 'Bosch Front Load Washer', 'Bosch 500 Series Front Load Washing Machine', 999, NULL, NULL, NULL, 2, 7),
(14, 'LG TwinWash', 'LG TwinWash System, 27-inch', 1499, NULL, NULL, NULL, 2, 7),
(15, 'Daikin Inverter AC', 'Daikin 1.5 Ton 5 Star Inverter Split AC', 799, NULL, NULL, NULL, 2, 8),
(16, 'LG Dual Inverter AC', 'LG 1.5 Ton Dual Inverter Split AC', 749, NULL, NULL, NULL, 2, 8),
(17, 'Panasonic Microwave Oven', 'Panasonic Microwave Oven, 1.2 cu. ft.', 199, NULL, NULL, NULL, 2, 9),
(18, 'Samsung Convection Microwave', 'Samsung 1.1 cu. ft. Convection Microwave', 299, NULL, NULL, NULL, 2, 9),
(19, 'Dyson V11', 'Dyson V11 Torque Drive Cordless Vacuum', 599, NULL, NULL, NULL, 2, 10),
(20, 'Shark Navigator', 'Shark Navigator Lift-Away Upright Vacuum', 199, NULL, NULL, NULL, 2, 10),
(21, 'Levi\'s 501 Jeans', 'Levi\'s 501 Original Fit Jeans for Men', 59, NULL, NULL, NULL, 3, 11),
(22, 'Nike Air Max Hoodie', 'Nike Air Max Full-Zip Hoodie', 89, NULL, NULL, NULL, 3, 11),
(23, 'Zara Midi Dress', 'Zara Floral Midi Dress for Women', 79, NULL, NULL, NULL, 3, 12),
(24, 'H&M Blouse', 'H&M White Blouse for Women', 49, NULL, NULL, NULL, 3, 12),
(25, 'Nike Air Force 1', 'Nike Air Force 1 Low', 99, NULL, NULL, NULL, 3, 13),
(26, 'Adidas Ultraboost', 'Adidas Ultraboost Running Shoes', 139, NULL, NULL, NULL, 3, 13),
(27, 'Ray-Ban Aviators', 'Ray-Ban Aviator Sunglasses, Polarized', 159, NULL, NULL, NULL, 3, 14),
(28, 'Gucci Leather Belt', 'Gucci Black Leather Belt', 399, NULL, NULL, NULL, 3, 14),
(29, 'Apple Watch Series 7', 'Apple Watch Series 7, GPS, 41mm', 399, NULL, NULL, NULL, 3, 15),
(30, 'Rolex Submariner', 'Rolex Submariner Oyster Perpetual', 7999, NULL, NULL, NULL, 3, 15),
(31, 'IKEA Ektorp Sofa', 'IKEA Ektorp 3-seat Sofa, Beige', 499, NULL, NULL, NULL, 4, 16),
(32, 'West Elm Coffee Table', 'West Elm Industrial Coffee Table', 299, NULL, NULL, NULL, 4, 16),
(33, 'Tuft & Needle Mattress', 'Tuft & Needle Queen Mattress, Foam', 699, NULL, NULL, NULL, 4, 17),
(34, 'Wayfair Bed Frame', 'Wayfair Queen Bed Frame, Upholstered', 399, NULL, NULL, NULL, 4, 17),
(35, 'Herman Miller Aeron Chair', 'Herman Miller Aeron Ergonomic Office Chair', 1099, NULL, NULL, NULL, 4, 18),
(36, 'IKEA Bekant Desk', 'IKEA Bekant Adjustable Standing Desk', 299, NULL, NULL, NULL, 4, 18),
(37, 'Polywood Adirondack Chair', 'Polywood Classic Adirondack Chair', 199, NULL, NULL, NULL, 4, 19),
(38, 'Trex Outdoor Dining Set', 'Trex 5-piece Outdoor Dining Set', 1499, NULL, NULL, NULL, 4, 19),
(39, 'Rubbermaid Storage Bins', 'Rubbermaid 18-Gallon Storage Bins, Pack of 6', 79, NULL, NULL, NULL, 4, 20),
(40, 'ClosetMaid Shelving Unit', 'ClosetMaid 3-tier Storage Shelves', 49, NULL, NULL, NULL, 4, 20),
(41, 'CeraVe Moisturizing Cream', 'CeraVe Moisturizing Cream for Dry Skin, 16 oz', 17, NULL, NULL, NULL, 5, 21),
(42, 'The Ordinary Hyaluronic Acid', 'The Ordinary Hyaluronic Acid 2% + B5 Serum', 12, NULL, NULL, NULL, 5, 21),
(43, 'Olaplex Hair Perfector No. 3', 'Olaplex Hair Perfector No. 3, 3.3 oz', 28, NULL, NULL, NULL, 5, 22),
(44, 'Dyson Supersonic Hair Dryer', 'Dyson Supersonic Hair Dryer', 399, NULL, NULL, NULL, 5, 22),
(45, 'Maybelline Fit Me Foundation', 'Maybelline Fit Me Matte + Poreless Foundation', 7, NULL, NULL, NULL, 5, 23),
(46, 'MAC Lipstick', 'MAC Matte Lipstick in Ruby Woo', 19, NULL, NULL, NULL, 5, 23),
(47, 'Philips Electric Toothbrush', 'Philips Sonicare ProtectiveClean 6100', 99, NULL, NULL, NULL, 5, 24),
(48, 'Gillette Fusion ProGlide', 'Gillette Fusion ProGlide Razor with Flexball Technology', 15, NULL, NULL, NULL, 5, 24),
(49, 'Nature\'s Bounty Fish Oil', 'Nature\'s Bounty Fish Oil 1000mg Softgels', 18, NULL, NULL, NULL, 5, 25),
(50, 'Fitbit Charge 4', 'Fitbit Charge 4 Fitness and Activity Tracker', 149, NULL, NULL, NULL, 5, 25),
(51, 'Bowflex Dumbbells', 'Bowflex SelectTech 552 Adjustable Dumbbells', 399, NULL, NULL, NULL, 6, 26),
(52, 'NordicTrack Treadmill', 'NordicTrack T Series Treadmill', 899, NULL, NULL, NULL, 6, 26),
(53, 'Coleman Tent', 'Coleman Sundome Camping Tent, 4-person', 119, NULL, NULL, NULL, 6, 27),
(54, 'YETI Cooler', 'YETI Tundra 45 Cooler', 299, NULL, NULL, NULL, 6, 27),
(55, 'Nike Dri-FIT T-shirt', 'Nike Men\'s Dri-FIT Short Sleeve Training T-shirt', 35, NULL, NULL, NULL, 6, 28),
(56, 'Adidas Track Pants', 'Adidas Men\'s Tiro 21 Track Pants', 50, NULL, NULL, NULL, 6, 28),
(57, 'Schwinn Mountain Bike', 'Schwinn High Timber Youth/Adult Mountain Bike', 349, NULL, NULL, NULL, 6, 29),
(58, 'Bell Bicycle Helmet', 'Bell Adrenaline Bike Helmet', 45, NULL, NULL, NULL, 6, 29),
(59, 'Sleeping Bag', 'TETON Sports Celsius Sleeping Bag', 79, NULL, NULL, NULL, 6, 30),
(60, 'Camping Stove', 'Coleman Gas Camping Stove', 85, NULL, NULL, NULL, 6, 30),
(61, 'LEGO Classic Bricks', 'LEGO Classic Creative Brick Box', 49, NULL, NULL, NULL, 7, 31),
(62, 'Melissa & Doug Puzzle', 'Melissa & Doug Wooden Jigsaw Puzzle', 19, NULL, NULL, NULL, 7, 31),
(63, 'Marvel Avengers Action Figure', 'Marvel Avengers Thor Action Figure', 15, NULL, NULL, NULL, 7, 32),
(64, 'Transformers Bumblebee', 'Transformers Bumblebee Action Figure', 20, NULL, NULL, NULL, 7, 32),
(65, 'Monopoly', 'Monopoly Classic Board Game', 25, NULL, NULL, NULL, 7, 33),
(66, 'Catan', 'Catan The Board Game', 49, NULL, NULL, NULL, 7, 33),
(67, 'Ravensburger Puzzle', 'Ravensburger 1000 Piece Puzzle', 22, NULL, NULL, NULL, 7, 34),
(68, '3D Wooden Puzzle', '3D Wooden Mechanical Puzzle', 35, NULL, NULL, NULL, 7, 34),
(69, 'LEGO Mindstorms', 'Educational Robotics Kit', 300, NULL, NULL, NULL, 7, 31),
(70, 'Melissa & Doug Puzzle', 'Wooden Educational Puzzle', 50, NULL, NULL, NULL, 7, 31),
(71, 'Marvel Spider-Man Figure', 'Action Figure', 25, NULL, NULL, NULL, 7, 32),
(72, 'Star Wars Darth Vader Figure', 'Action Figure', 30, NULL, NULL, NULL, 7, 32),
(73, 'Monopoly Classic', 'Board Game', 35, NULL, NULL, NULL, 7, 33),
(74, 'Catan', 'Board Game', 40, NULL, NULL, NULL, 7, 33),
(75, 'Ravensburger Puzzle', '1000-Piece Puzzle', 20, NULL, NULL, NULL, 7, 34),
(76, 'Buffalo Games Puzzle', '500-Piece Puzzle', 15, NULL, NULL, NULL, 7, 34),
(77, 'Nerf Super Soaker', 'Outdoor Toy Water Gun', 25, NULL, NULL, NULL, 7, 35),
(78, 'Little Tikes Trampoline', 'Outdoor Trampoline', 150, NULL, NULL, NULL, 7, 35),
(79, 'The Great Gatsby', 'Fiction Novel by F. Scott Fitzgerald', 15, NULL, NULL, NULL, 8, 36),
(80, '1984', 'Fiction Novel by George Orwell', 12, NULL, NULL, NULL, 8, 36),
(81, 'Sapiens', 'Non-Fiction Book by Yuval Noah Harari', 20, NULL, NULL, NULL, 8, 37),
(82, 'Educated', 'Non-Fiction Memoir by Tara Westover', 18, NULL, NULL, NULL, 8, 37),
(83, 'The Very Hungry Caterpillar', 'Children\'s Educational Book', 10, NULL, NULL, NULL, 8, 38),
(84, 'Basic Economics', 'Educational Book by Thomas Sowell', 25, NULL, NULL, NULL, 8, 38),
(85, 'Abbey Road', 'Music Album by The Beatles', 30, NULL, NULL, NULL, 8, 39),
(86, 'Thriller', 'Music Album by Michael Jackson', 28, NULL, NULL, NULL, 8, 39),
(87, 'The Godfather', 'Classic Movie DVD', 20, NULL, NULL, NULL, 8, 40),
(88, 'Inception', 'Sci-Fi Movie Blu-Ray', 22, NULL, NULL, NULL, 8, 40),
(89, 'WeatherTech Floor Mats', 'Car Floor Mats', 80, NULL, NULL, NULL, 9, 41),
(90, 'Garmin GPS', 'Car Navigation System', 120, NULL, NULL, NULL, 9, 41),
(91, 'Bell Qualifier Helmet', 'Motorcycle Helmet', 150, NULL, NULL, NULL, 9, 42),
(92, 'Alpinestars Motorcycle Jacket', 'Riding Jacket', 200, NULL, NULL, NULL, 9, 42),
(93, 'DeWalt Power Drill', 'Cordless Power Drill', 100, NULL, NULL, NULL, 9, 43),
(94, 'Craftsman Tool Set', 'Mechanic Tool Set', 120, NULL, NULL, NULL, 9, 43),
(95, 'Pioneer Car Stereo', 'Car Audio System', 250, NULL, NULL, NULL, 9, 44),
(96, 'Kenwood Amplifier', 'Car Audio Amplifier', 200, NULL, NULL, NULL, 9, 44),
(97, 'Bosch Spark Plugs', 'Car Engine Spark Plugs', 20, NULL, NULL, NULL, 9, 45),
(98, 'K&N Air Filter', 'Car Engine Air Filter', 50, NULL, NULL, NULL, 9, 45),
(99, 'Doritos Nacho Cheese', 'Snack Pack', 5, NULL, NULL, NULL, 10, 46),
(100, 'KIND Bars', 'Healthy Snack Bars', 10, NULL, NULL, NULL, 10, 46),
(101, 'Coca-Cola', 'Beverage', 2, NULL, NULL, NULL, 10, 47),
(102, 'Red Bull', 'Energy Drink', 3, NULL, NULL, NULL, 10, 47),
(103, 'Kellogg\'s Corn Flakes', 'Breakfast Cereal', 4, NULL, NULL, NULL, 10, 48),
(104, 'Barilla Pasta', 'Pack of Spaghetti', 6, NULL, NULL, NULL, 10, 48),
(105, 'Organic Valley Milk', 'Organic Dairy Milk', 7, NULL, NULL, NULL, 10, 49);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL CHECK (`rating` between 1 and 5),
  `review_text` text DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_c_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `sub_category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_c_id`, `c_id`, `sub_category_name`) VALUES
(1, 1, 'Smartphones'),
(2, 1, 'Laptops'),
(3, 1, 'Tablets'),
(4, 1, 'Cameras'),
(5, 1, 'Televisions'),
(6, 2, 'Refrigerators'),
(7, 2, 'Washing Machines'),
(8, 2, 'Air Conditioners'),
(9, 2, 'Microwave Ovens'),
(10, 2, 'Vacuum Cleaners'),
(11, 3, 'Men\'s Clothing'),
(12, 3, 'Women\'s Clothing'),
(13, 3, 'Footwear'),
(14, 3, 'Accessories'),
(15, 3, 'Watches'),
(16, 4, 'Living Room'),
(17, 4, 'Bedroom'),
(18, 4, 'Office Furniture'),
(19, 4, 'Outdoor Furniture'),
(20, 4, 'Storage Solutions'),
(21, 5, 'Skincare'),
(22, 5, 'Haircare'),
(23, 5, 'Makeup'),
(24, 5, 'Personal Care'),
(25, 5, 'Wellness Products'),
(26, 6, 'Exercise Equipment'),
(27, 6, 'Outdoor Gear'),
(28, 6, 'Sports Apparel'),
(29, 6, 'Cycling'),
(30, 6, 'Camping Equipment'),
(31, 7, 'Educational Toys'),
(32, 7, 'Action Figures'),
(33, 7, 'Board Games'),
(34, 7, 'Puzzles'),
(35, 7, 'Outdoor Toys'),
(36, 8, 'Fiction'),
(37, 8, 'Non-Fiction'),
(38, 8, 'Educational'),
(39, 8, 'Music'),
(40, 8, 'Movies'),
(41, 9, 'Car Accessories'),
(42, 9, 'Motorcycle Gear'),
(43, 9, 'Tools & Equipment'),
(44, 9, 'Car Electronics'),
(45, 9, 'Parts & Components'),
(46, 10, 'Snacks'),
(47, 10, 'Beverages'),
(48, 10, 'Groceries'),
(49, 10, 'Organic Products'),
(50, 10, 'Gourmet Foods');

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
  ADD KEY `fk_category_id` (`c_id`),
  ADD KEY `fk_subcategory_id` (`sub_c_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_c_id`),
  ADD KEY `c_id` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_id`);

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
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`c_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `fk_subcategory_id` FOREIGN KEY (`sub_c_id`) REFERENCES `sub_category` (`sub_c_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `sales_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`user_id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
