-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2024 at 02:29 PM
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
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Electronics'),
(2, 'Home Appliances'),
(3, 'Fashion'),
(4, 'Furniture'),
(5, 'Health & Beauty'),
(6, 'Sports & Outdoors'),
(7, 'Toys & Games'),
(8, 'Books & Media'),
(9, 'Automotive'),
(10, 'Food & Beverages');

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
  `title` varchar(20) NOT NULL,
  `label` varchar(200) NOT NULL,
  `price` int(5) NOT NULL,
  `image` varchar(250) NOT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `image3` varchar(250) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `sub_c_id` int(11) DEFAULT NULL
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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
INSERT INTO `product` (`p_id`, `title`, `label`, `price`, `c_id`, `sub_c_id`) VALUES
-- Electronics - Smartphones
(1, 'iPhone 13', 'Apple iPhone 13, 128GB, 5G', 999, 1, 1),
(2, 'Samsung Galaxy S21', 'Samsung Galaxy S21, 128GB, 5G', 899, 1, 1),

-- Electronics - Laptops
(3, 'MacBook Pro', 'Apple MacBook Pro 13-inch, M1 Chip', 1299, 1, 2),
(4, 'Dell XPS 13', 'Dell XPS 13, 11th Gen Intel Core', 1199, 1, 2),

-- Electronics - Tablets
(5, 'iPad Pro', 'Apple iPad Pro 12.9-inch, M1 Chip', 1099, 1, 3),
(6, 'Samsung Galaxy Tab S7', 'Samsung Galaxy Tab S7, 128GB', 699, 1, 3),

-- Electronics - Cameras
(7, 'Canon EOS R5', 'Canon EOS R5, Mirrorless Camera, 45MP', 3899, 1, 4),
(8, 'Sony Alpha A7 III', 'Sony Alpha A7 III, Full Frame Mirrorless', 1999, 1, 4),

-- Electronics - Televisions
(9, 'LG OLED C1', 'LG OLED C1, 55-inch 4K Smart TV', 1299, 1, 5),
(10, 'Samsung QLED Q80T', 'Samsung QLED Q80T, 65-inch 4K Smart TV', 1399, 1, 5),

-- Home Appliances - Refrigerators
(11, 'LG French Door', 'LG French Door Refrigerator, 28 cu. ft.', 1999, 2, 6),
(12, 'Samsung Family Hub', 'Samsung Family Hub Refrigerator, 26 cu. ft.', 2299, 2, 6),

-- Home Appliances - Washing Machines
(13, 'Bosch Front Load Washer', 'Bosch 500 Series Front Load Washing Machine', 999, 2, 7),
(14, 'LG TwinWash', 'LG TwinWash System, 27-inch', 1499, 2, 7),

-- Home Appliances - Air Conditioners
(15, 'Daikin Inverter AC', 'Daikin 1.5 Ton 5 Star Inverter Split AC', 799, 2, 8),
(16, 'LG Dual Inverter AC', 'LG 1.5 Ton Dual Inverter Split AC', 749, 2, 8),

-- Home Appliances - Microwave Ovens
(17, 'Panasonic Microwave Oven', 'Panasonic Microwave Oven, 1.2 cu. ft.', 199, 2, 9),
(18, 'Samsung Convection Microwave', 'Samsung 1.1 cu. ft. Convection Microwave', 299, 2, 9),

-- Home Appliances - Vacuum Cleaners
(19, 'Dyson V11', 'Dyson V11 Torque Drive Cordless Vacuum', 599, 2, 10),
(20, 'Shark Navigator', 'Shark Navigator Lift-Away Upright Vacuum', 199, 2, 10),

-- Fashion - Men's Clothing
(21, 'Levi\'s 501 Jeans', 'Levi\'s 501 Original Fit Jeans for Men', 59, 3, 11),
(22, 'Nike Air Max Hoodie', 'Nike Air Max Full-Zip Hoodie', 89, 3, 11),

-- Fashion - Women's Clothing
(23, 'Zara Midi Dress', 'Zara Floral Midi Dress for Women', 79, 3, 12),
(24, 'H&M Blouse', 'H&M White Blouse for Women', 49, 3, 12),

-- Fashion - Footwear
(25, 'Nike Air Force 1', 'Nike Air Force 1 Low', 99, 3, 13),
(26, 'Adidas Ultraboost', 'Adidas Ultraboost Running Shoes', 139, 3, 13),

-- Fashion - Accessories
(27, 'Ray-Ban Aviators', 'Ray-Ban Aviator Sunglasses, Polarized', 159, 3, 14),
(28, 'Gucci Leather Belt', 'Gucci Black Leather Belt', 399, 3, 14),

-- Fashion - Watches
(29, 'Apple Watch Series 7', 'Apple Watch Series 7, GPS, 41mm', 399, 3, 15),
(30, 'Rolex Submariner', 'Rolex Submariner Oyster Perpetual', 7999, 3, 15),

-- Furniture - Living Room
(31, 'IKEA Ektorp Sofa', 'IKEA Ektorp 3-seat Sofa, Beige', 499, 4, 16),
(32, 'West Elm Coffee Table', 'West Elm Industrial Coffee Table', 299, 4, 16),

-- Furniture - Bedroom
(33, 'Tuft & Needle Mattress', 'Tuft & Needle Queen Mattress, Foam', 699, 4, 17),
(34, 'Wayfair Bed Frame', 'Wayfair Queen Bed Frame, Upholstered', 399, 4, 17),

-- Furniture - Office Furniture
(35, 'Herman Miller Aeron Chair', 'Herman Miller Aeron Ergonomic Office Chair', 1099, 4, 18),
(36, 'IKEA Bekant Desk', 'IKEA Bekant Adjustable Standing Desk', 299, 4, 18),

-- Furniture - Outdoor Furniture
(37, 'Polywood Adirondack Chair', 'Polywood Classic Adirondack Chair', 199, 4, 19),
(38, 'Trex Outdoor Dining Set', 'Trex 5-piece Outdoor Dining Set', 1499, 4, 19),

-- Furniture - Storage Solutions
(39, 'Rubbermaid Storage Bins', 'Rubbermaid 18-Gallon Storage Bins, Pack of 6', 79, 4, 20),
(40, 'ClosetMaid Shelving Unit', 'ClosetMaid 3-tier Storage Shelves', 49, 4, 20),

-- Health & Beauty - Skincare
(41, 'CeraVe Moisturizing Cream', 'CeraVe Moisturizing Cream for Dry Skin, 16 oz', 17, 5, 21),
(42, 'The Ordinary Hyaluronic Acid', 'The Ordinary Hyaluronic Acid 2% + B5 Serum', 12, 5, 21),

-- Health & Beauty - Haircare
(43, 'Olaplex Hair Perfector No. 3', 'Olaplex Hair Perfector No. 3, 3.3 oz', 28, 5, 22),
(44, 'Dyson Supersonic Hair Dryer', 'Dyson Supersonic Hair Dryer', 399, 5, 22),
(45, 'Maybelline Fit Me Foundation', 'Maybelline Fit Me Matte + Poreless Foundation', 7, 5, 23),
(46, 'MAC Lipstick', 'MAC Matte Lipstick in Ruby Woo', 19, 5, 23),

-- Health & Beauty - Personal Care
(47, 'Philips Electric Toothbrush', 'Philips Sonicare ProtectiveClean 6100', 99, 5, 24),
(48, 'Gillette Fusion ProGlide', 'Gillette Fusion ProGlide Razor with Flexball Technology', 15, 5, 24),

-- Health & Beauty - Wellness Products
(49, 'Nature\'s Bounty Fish Oil', 'Nature\'s Bounty Fish Oil 1000mg Softgels', 18, 5, 25),
(50, 'Fitbit Charge 4', 'Fitbit Charge 4 Fitness and Activity Tracker', 149, 5, 25),

-- Sports & Outdoors - Exercise Equipment
(51, 'Bowflex Dumbbells', 'Bowflex SelectTech 552 Adjustable Dumbbells', 399, 6, 26),
(52, 'NordicTrack Treadmill', 'NordicTrack T Series Treadmill', 899, 6, 26),

-- Sports & Outdoors - Outdoor Gear
(53, 'Coleman Tent', 'Coleman Sundome Camping Tent, 4-person', 119, 6, 27),
(54, 'YETI Cooler', 'YETI Tundra 45 Cooler', 299, 6, 27),

-- Sports & Outdoors - Sports Apparel
(55, 'Nike Dri-FIT T-shirt', 'Nike Men\'s Dri-FIT Short Sleeve Training T-shirt', 35, 6, 28),
(56, 'Adidas Track Pants', 'Adidas Men\'s Tiro 21 Track Pants', 50, 6, 28),

-- Sports & Outdoors - Cycling
(57, 'Schwinn Mountain Bike', 'Schwinn High Timber Youth/Adult Mountain Bike', 349, 6, 29),
(58, 'Bell Bicycle Helmet', 'Bell Adrenaline Bike Helmet', 45, 6, 29),

-- Sports & Outdoors - Camping Equipment
(59, 'Sleeping Bag', 'TETON Sports Celsius Sleeping Bag', 79, 6, 30),
(60, 'Camping Stove', 'Coleman Gas Camping Stove', 85, 6, 30),

-- Toys & Games - Educational Toys
(61, 'LEGO Classic Bricks', 'LEGO Classic Creative Brick Box', 49, 7, 31),
(62, 'Melissa & Doug Puzzle', 'Melissa & Doug Wooden Jigsaw Puzzle', 19, 7, 31),

-- Toys & Games - Action Figures
(63, 'Marvel Avengers Action Figure', 'Marvel Avengers Thor Action Figure', 15, 7, 32),
(64, 'Transformers Bumblebee', 'Transformers Bumblebee Action Figure', 20, 7, 32),

-- Toys & Games - Board Games
(65, 'Monopoly', 'Monopoly Classic Board Game', 25, 7, 33),
(66, 'Catan', 'Catan The Board Game', 49, 7, 33),

-- Toys & Games - Puzzles
(67, 'Ravensburger Puzzle', 'Ravensburger 1000 Piece Puzzle', 22, 7, 34),
(68, '3D Wooden Puzzle', '3D Wooden Mechanical Puzzle', 35, 7, 34),

-- Toys & Games - Outdoor Toys

(69, 'LEGO Mindstorms', 'Educational Robotics Kit', 300, 7, 31),
(70, 'Melissa & Doug Puzzle', 'Wooden Educational Puzzle', 50, 7, 31),
(71, 'Marvel Spider-Man Figure', 'Action Figure', 25, 7, 32),
(72, 'Star Wars Darth Vader Figure', 'Action Figure', 30, 7, 32),
(73, 'Monopoly Classic', 'Board Game', 35, 7, 33),
(74, 'Catan', 'Board Game', 40, 7, 33),
(75, 'Ravensburger Puzzle', '1000-Piece Puzzle', 20, 7, 34),
(76, 'Buffalo Games Puzzle', '500-Piece Puzzle', 15, 7, 34),
(77, 'Nerf Super Soaker', 'Outdoor Toy Water Gun', 25, 7, 35),
(78, 'Little Tikes Trampoline', 'Outdoor Trampoline', 150, 7, 35),

-- Books & Media
(79, 'The Great Gatsby', 'Fiction Novel by F. Scott Fitzgerald', 15, 8, 36),
(80, '1984', 'Fiction Novel by George Orwell', 12, 8, 36),
(81, 'Sapiens', 'Non-Fiction Book by Yuval Noah Harari', 20, 8, 37),
(82, 'Educated', 'Non-Fiction Memoir by Tara Westover', 18, 8, 37),
(83, 'The Very Hungry Caterpillar', 'Children\'s Educational Book', 10, 8, 38),
(84, 'Basic Economics', 'Educational Book by Thomas Sowell', 25, 8, 38),
(85, 'Abbey Road', 'Music Album by The Beatles', 30, 8, 39),
(86, 'Thriller', 'Music Album by Michael Jackson', 28, 8, 39),
(87, 'The Godfather', 'Classic Movie DVD', 20, 8, 40),
(88, 'Inception', 'Sci-Fi Movie Blu-Ray', 22, 8, 40),

-- Automotive
(89, 'WeatherTech Floor Mats', 'Car Floor Mats', 80, 9, 41),
(90, 'Garmin GPS', 'Car Navigation System', 120, 9, 41),
(91, 'Bell Qualifier Helmet', 'Motorcycle Helmet', 150, 9, 42),
(92, 'Alpinestars Motorcycle Jacket', 'Riding Jacket', 200, 9, 42),
(93, 'DeWalt Power Drill', 'Cordless Power Drill', 100, 9, 43),
(94, 'Craftsman Tool Set', 'Mechanic Tool Set', 120, 9, 43),
(95, 'Pioneer Car Stereo', 'Car Audio System', 250, 9, 44),
(96, 'Kenwood Amplifier', 'Car Audio Amplifier', 200, 9, 44),
(97, 'Bosch Spark Plugs', 'Car Engine Spark Plugs', 20, 9, 45),
(98, 'K&N Air Filter', 'Car Engine Air Filter', 50, 9, 45),

-- Food & Beverages
(99, 'Doritos Nacho Cheese', 'Snack Pack', 5, 10, 46),
(100, 'KIND Bars', 'Healthy Snack Bars', 10, 10, 46),
(101, 'Coca-Cola', 'Beverage', 2, 10, 47),
(102, 'Red Bull', 'Energy Drink', 3, 10, 47),
(103, 'Kellogg\'s Corn Flakes', 'Breakfast Cereal', 4, 10, 48),
(104, 'Barilla Pasta', 'Pack of Spaghetti', 6, 10, 48),
(105, 'Organic Valley Milk', 'Organic Dairy Milk', 7, 10, 49);

