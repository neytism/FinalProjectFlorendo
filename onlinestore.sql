-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 03:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`order_id`, `product_id`, `quantity`, `user_id`) VALUES
(34, 1, 7, 1),
(35, 3, 6, 1),
(36, 2, 6, 1),
(37, 5, 6, 1),
(38, 4, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inquiry_id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `inquiry` text DEFAULT NULL,
  `timeDate` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`inquiry_id`, `firstName`, `lastName`, `email`, `contact`, `inquiry`, `timeDate`) VALUES
(1, 'Nate', 'Florendo', 'nate.florendo@ciit.edu.ph', '09121212121', 'Hello Gizmoverse! I think your webpages need improvments, i really could use a buy function where I can but actual products from your website. It would really help me for making my devices good and cool.', '2023-11-11 22:02:37'),
(2, 'John', 'Doe', 'JohnDoe@gmail.com', '09123456781', 'Hello Gizmoverse! I love your products and I would like to see more variety.', '2023-11-11 22:03:00'),
(3, 'Jane', 'Smith', 'JaneSmith@gmail.com', '09123456782', 'Hello Gizmoverse! Your website is very user-friendly.', '2023-11-11 22:04:00'),
(4, 'Robert', 'Johnson', 'RobertJohnson@gmail.com', '09123456783', 'Hello Gizmoverse! I am interested in your upcoming products.', '2023-11-11 22:05:00'),
(5, 'Michael', 'Brown', 'MichaelBrown@gmail.com', '09123456784', 'Hello Gizmoverse! Can you provide more information about your services?', '2023-11-11 22:06:00'),
(6, 'Emily', 'Davis', 'EmilyDavis@gmail.com', '09123456785', 'Hello Gizmoverse! I am impressed with the quality of your products.', '2023-11-11 22:07:00'),
(7, 'Sarah', 'Miller', 'SarahMiller@gmail.com', '09123456786', 'Hello Gizmoverse! I would like to know more about your warranty policy.', '2023-11-11 22:08:00'),
(8, 'James', 'Wilson', 'JamesWilson@gmail.com', '09123456787', 'Hello Gizmoverse! I am looking forward to your new releases.', '2023-11-11 22:09:00'),
(9, 'Patricia', 'Moore', 'PatriciaMoore@gmail.com', '09123456788', 'Hello Gizmoverse! I appreciate your prompt customer service.', '2023-11-11 22:10:00'),
(10, 'Richard', 'Taylor', 'RichardTaylor@gmail.com', '09123456789', 'Hello Gizmoverse! I am happy with my recent purchase.', '2023-11-11 22:11:00'),
(11, 'Linda', 'Anderson', 'LindaAnderson@gmail.com', '09123456790', 'Hello Gizmoverse! I would like to suggest a few features for your products.', '2023-11-11 22:12:00'),
(12, 'William', 'Thomas', 'WilliamThomas@gmail.com', '09123456791', 'Hello Gizmoverse! I am interested in collaborating with your team.', '2023-11-11 22:13:00'),
(13, 'Elizabeth', 'Jackson', 'ElizabethJackson@gmail.com', '09123456792', 'Hello Gizmoverse! I am curious about your product development process.', '2023-11-11 22:14:00'),
(14, 'David', 'White', 'DavidWhite@gmail.com', '09123456793', 'Hello Gizmoverse! I am excited about your upcoming sale.', '2023-11-11 22:15:00'),
(15, 'Jennifer', 'Harris', 'JenniferHarris@gmail.com', '09123456794', 'Hello Gizmoverse! I am a big fan of your brand.', '2023-11-11 22:16:00'),
(16, 'Charles', 'Martin', 'CharlesMartin@gmail.com', '09123456795', 'Hello Gizmoverse! I am interested in your affiliate program.', '2023-11-11 22:17:00'),
(17, 'Susan', 'Thompson', 'SusanThompson@gmail.com', '09123456796', 'Hello Gizmoverse! I am looking for a product that can meet my specific needs.', '2023-11-11 22:18:00'),
(18, 'Joseph', 'Garcia', 'JosephGarcia@gmail.com', '09123456797', 'Hello Gizmoverse! I am impressed with your commitment to quality.', '2023-11-11 22:19:00'),
(19, 'Margaret', 'Martinez', 'MargaretMartinez@gmail.com', '09123456798', 'Hello Gizmoverse! I am interested in learning more about your company.', '2023-11-11 22:20:00'),
(20, 'Josephine', 'Walker', 'JosephineWalker@gmail.com', '09123456799', 'Hello Gizmoverse! I am looking forward to your next product!', '2023-11-11 22:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `itemName`, `imagePath`, `description`, `price`, `stock`) VALUES
(1, 'iPad Titanium', '../assets/Images/iPad Titanium.png', 'Custom Titanium Gray back skin for iPad current Gen.', 99.99, 12),
(2, 'iPhone', '../assets/Images/iphone.png', 'custom iPhone skin.', 99.99, 21),
(3, 'Nintendo Switch', '../assets/Images/switch.png', 'custom Switch skins.', 69.99, 12),
(4, 'PS5 Skin', '../assets/Images/ps5.png', 'PS5 custom skin', 69.99, 3),
(5, 'Xbox Cool Metal', '../assets/Images/xbox.png', 'Xbox Series X Cool Metal that looks cool and will keep you console cool.', 99.99, 18),
(6, 'MacBook Brushed Aluminum', '../assets/Images/macbook.png', 'Custom MacBook Skin that is lighter and cooler.', 99.99, 3);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `username`, `password`, `firstName`, `lastName`, `email`, `mobile`, `address`, `role`) VALUES
(1, 'admin', 'asdfasdf', 'Nate', 'Florendo', 'nate.florendo@ciit.edu.ph', '09123456789', 'Antipolo City', 'admin'),
(2, 'DummyUser', 'asdfasdf', 'Dummy ', 'User', 'DummyUser@gmail.com', '09012345678', '123 Cherry Blossom Ave, Pasig City, Philippines', 'user'),
(3, 'JohnDoe', 'password3', 'John', 'Doe', 'JohnDoe@gmail.com', '09123456781', '456 Mango Street, Quezon City, Philippines', 'user'),
(4, 'JaneSmith', 'password4', 'Jane', 'Smith', 'JaneSmith@gmail.com', '09123456782', '789 Pineapple Drive, Makati City, Philippines', 'user'),
(5, 'RobertJohnson', 'password5', 'Robert', 'Johnson', 'RobertJohnson@gmail.com', '09123456783', '321 Banana Blvd, Mandaluyong City, Philippines', 'user'),
(6, 'MichaelBrown', 'password6', 'Michael', 'Brown', 'MichaelBrown@gmail.com', '09123456784', '654 Coconut Lane, Marikina City, Philippines', 'user'),
(7, 'EmilyDavis', 'password7', 'Emily', 'Davis', 'EmilyDavis@gmail.com', '09123456785', '987 Papaya Place, Manila City, Philippines', 'user'),
(8, 'SarahMiller', 'password8', 'Sarah', 'Miller', 'SarahMiller@gmail.com', '09123456786', '135 Apple Court, Caloocan City, Philippines', 'user'),
(9, 'JamesWilson', 'password9', 'James', 'Wilson', 'JamesWilson@gmail.com', '09123456787', '246 Orange Circle, Las Pinas City, Philippines', 'user'),
(10, 'PatriciaMoore', 'password10', 'Patricia', 'Moore', 'PatriciaMoore@gmail.com', '09123456788', '369 Pear Parkway, Muntinlupa City, Philippines', 'user'),
(11, 'RichardTaylor', 'password11', 'Richard', 'Taylor', 'RichardTaylor@gmail.com', '09123456789', '753 Grape Grove, Paranaque City, Philippines', 'user'),
(12, 'LindaAnderson', 'password12', 'Linda', 'Anderson', 'LindaAnderson@gmail.com', '09123456790', '159 Peach Path, San Juan City, Philippines', 'user'),
(13, 'WilliamThomas', 'password13', 'William', 'Thomas', 'WilliamThomas@gmail.com', '09123456791', '864 Watermelon Way, Taguig City, Philippines', 'user'),
(14, 'ElizabethJackson', 'password14', 'Elizabeth', 'Jackson', 'ElizabethJackson@gmail.com', '09123456792', '951 Lemon Loop, Valenzuela City, Philippines', 'user'),
(15, 'DavidWhite', 'password15', 'David', 'White', 'DavidWhite@gmail.com', '09123456793', '357 Lime Line, Malabon City, Philippines', 'user'),
(16, 'JenniferHarris', 'password16', 'Jennifer', 'Harris', 'JenniferHarris@gmail.com', '09123456794', '468 Strawberry Street, Navotas City, Philippines', 'user'),
(17, 'CharlesMartin', 'password17', 'Charles', 'Martin', 'CharlesMartin@gmail.com', '09123456795', '579 Raspberry Road, Pateros City, Philippines', 'user'),
(18, 'SusanThompson', 'password18', 'Susan', 'Thompson', 'SusanThompson@gmail.com', '09123456796', '684 Blueberry Blvd, Antipolo City, Philippines', 'user'),
(19, 'JosephGarcia', 'password19', 'Joseph', 'Garcia', 'JosephGarcia@gmail.com', '09123456797', '793 Blackberry Bend, Cainta City, Philippines', 'user'),
(20, 'MargaretMartinez', 'password20', 'Margaret', 'Martinez', 'MargaretMartinez@gmail.com', '09123456798', '816 Cherry Circle, Taytay City, Philippines', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `profile` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
