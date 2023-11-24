-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 02:15 PM
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('OnCart','Cancelled','Delivered','InTransit','PickUpAvailable','OrderProblem','Processing','Returned','Completed') NOT NULL DEFAULT 'OnCart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `quantity`, `user_id`, `status`) VALUES
(78, 28, 3, 1, 'Processing'),
(79, 7, 4, 1, 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `brand_model` varchar(255) DEFAULT NULL,
  `imagePath` varchar(255) NOT NULL,
  `product_type` enum('Set Product Type','Phone','Case','Peripheral','Console','Mousepad','Tablet','Laptop','Personal Computer') DEFAULT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `itemName`, `brand_model`, `imagePath`, `product_type`, `description`, `price`, `stock`) VALUES
(1, 'Beer Themed Xbox Series X Skin', 'Microsoft Xbox Series X', '../assets/Images/Microsoft Xbox Series X-Beer Themed Xbox Series X Skin.png', 'Console', 'This is a custom beer-themed skin for the Microsoft Xbox Series X console. The skin features a close-up image of a glass of beer with condensation on the outside, giving your console a cool and refreshing look. This skin is perfect for gamers who appreciate a fun and unique aesthetic for their console. It’s easy to apply and remove, providing a stylish look without permanently altering your console.', 1500.00, 83),
(2, 'Silver Aluminum MacBook Skin', 'Apple MacBook', '../assets/Images/Apple MacBook-Silver Aluminum MacBook Skin.png', 'Laptop', 'This is a custom skin for Apple MacBooks, featuring a sleek silver aluminum design. The skin is designed to fit perfectly on your MacBook, providing a stylish look without compromising the laptop’s functionality. It’s easy to apply and remove, allowing you to customize your MacBook’s appearance as often as you like. This skin is perfect for MacBook users who want to protect their device while adding a touch of elegance.', 1200.00, 45),
(3, 'Orange Apple iPad Skin', 'Apple iPad', '../assets/Images/Apple iPad-Orange Apple iPad Skin.png', 'Tablet', 'This is a custom skin for Apple iPads, featuring a vibrant orange design. The skin is designed to fit perfectly on your iPad, providing a stylish look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your iPad’s appearance as often as you like. This skin is perfect for iPad users who want to protect their device while adding a touch of color.', 1000.00, 32),
(4, 'Green Google Pixel Phone Skin', 'Google Pixel Phone', '../assets/Images/Google Pixel Phone-Green Google Pixel Phone Skin.png', 'Phone', 'This is a custom skin for Google Pixel phones, featuring a vibrant green design. The skin is designed to fit perfectly on your Pixel phone, providing a stylish look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your Pixel phone’s appearance as often as you like. This skin is perfect for Pixel phone users who want to protect their device while adding a touch of color.', 485.00, 76),
(5, 'Volcanic Lava Magma Glowing PS5 Skin', 'Sony PlayStation PS5 Standard', '../assets/Images/Sony PlayStation PS5 Standard-Volcanic Lava Magma Glowing PS5 Skin.png', 'Console', 'This is a custom skin for PlayStation 5 consoles, featuring a vibrant volcanic lava magma glowing design. The skin is designed to fit perfectly on your PS5 console and controller, providing a stylish look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your PS5’s appearance as often as you like. This skin is perfect for PS5 users who want to protect their device while adding a touch of fiery intensity.', 1000.00, 89),
(6, 'Rubik’s Cube Xbox Series X Skin', 'Microsoft Xbox Series X', '../assets/Images/Microsoft Xbox Series X-Rubik’s Cube Xbox Series X Skin.png', 'Console', 'This is a custom skin for Xbox Series X consoles, featuring a vibrant Rubik’s Cube design. The skin is designed to fit perfectly on your Xbox Series X console, providing a stylish look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your Xbox Series X’s appearance as often as you like. This skin is perfect for Xbox Series X users who want to protect their device while adding a touch of color and fun.', 1000.00, 91),
(7, 'Black Camo PS5 Skin', 'Sony PlayStation PS5 Standard', '../assets/Images/Sony PlayStation PS5 Standard-Black Camo PS5 Skin.png', 'Console', 'This is a custom skin for PlayStation 5 consoles, featuring a stylish black camouflage design. The skin is designed to fit perfectly on your PS5 console and controller, providing a sleek and modern look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your PS5’s appearance as often as you like. This skin is perfect for PS5 users who want to protect their device while adding a touch of sophistication.', 2250.00, 52),
(8, 'Special Edition Marble iPhone Skin', 'Apple iPhone 15', '../assets/Images/Apple iPhone 15-Special Edition Marble iPhone Skin.png', 'Phone', ' This is a custom skin for iPhones, featuring a stylish black, white, and gold marble design. The skin is designed to fit perfectly on your iPhone, providing a sleek and modern look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your iPhone’s appearance as often as you like. This skin is perfect for iPhone users who want to protect their device while adding a touch of sophistication.', 475.00, 64),
(9, ' Black Hexagon iPad Skin', 'Apple iPad', '../assets/Images/Apple iPad- Black Hexagon iPad Skin.png', 'Tablet', ' This is a custom skin for iPads, featuring a stylish black hexagon design. The skin is designed to fit perfectly on your iPad, providing a sleek and modern look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your iPad’s appearance as often as you like. This skin is perfect for iPad users who want to protect their device while adding a touch of sophistication.', 1500.00, 72),
(10, 'Oil Paint Style Google Pixel Skin', 'Google Pixel Phone', '../assets/Images/Google Pixel Phone-Oil Paint Style Google Pixel Skin.png', 'Phone', ' This is a custom skin for Google Pixel phones, featuring a stylish oil paint style design. The skin is designed to fit perfectly on your Pixel phone, providing a sleek and modern look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your Pixel phone’s appearance as often as you like. This skin is perfect for Pixel phone users who want to protect their device while adding a touch of artistic flair.', 500.00, 88),
(11, 'Graffiti PS5 Skin', 'Sony PlayStation PS5 Standard', '../assets/Images/Sony PlayStation PS5 Standard-Graffiti PS5 Skin.png', 'Console', 'This is a custom skin for PlayStation 5 consoles, featuring a vibrant graffiti design. The skin is designed to fit perfectly on your PS5 console and controller, providing a stylish look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your PS5’s appearance as often as you like. This skin is perfect for PS5 users who want to protect their device while adding a touch of street art aesthetic.', 1500.00, 46),
(12, 'Kintsugi iPad Skin', 'Apple iPad', '../assets/Images/Apple iPad-Kintsugi iPad Skin.png', 'Tablet', 'This is a custom skin for iPads, featuring a stylish Kintsugi design. Kintsugi is the Japanese art of repairing broken pottery by mending the areas of breakage with lacquer dusted or mixed with powdered gold. The skin is designed to fit perfectly on your iPad, providing a sleek and modern look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your iPad’s appearance as often as you like. This skin is perfect for iPad users who want to protect their device while adding a touch of sophistication.', 1500.00, 60),
(13, 'Graffiti MacBook Skin', 'Apple MacBook', '../assets/Images/Apple MacBook-Graffiti MacBook Skin.png', 'Laptop', 'This is a custom skin for MacBooks, featuring a vibrant graffiti design. The skin is designed to fit perfectly on your MacBook, providing a stylish look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your MacBook’s appearance as often as you like. This skin is perfect for MacBook users who want to protect their device while adding a touch of street art aesthetic.', 1500.00, 34),
(14, 'Graffiti Google Pixel Skin', 'Google Pixel Phone', '../assets/Images/Google Pixel Phone-Graffiti Google Pixel Skin.png', 'Phone', 'This is a custom skin for Google Pixel phones, featuring a vibrant graffiti design. The skin is designed to fit perfectly on your Pixel phone, providing a stylish look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your Pixel phone’s appearance as often as you like. This skin is perfect for Pixel phone users who want to protect their device while adding a touch of street art aesthetic.', 1000.00, 77),
(15, 'Doodle Graffiti iPhone Skin', 'Apple iPhone 15', '../assets/Images/Apple iPhone 15-Doodle Graffiti iPhone Skin.png', 'Phone', 'This is a custom skin for iPhones, featuring a stylish black and white doodle graffiti design. The skin is designed to fit perfectly on your iPhone, providing a sleek and modern look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your iPhone’s appearance as often as you like. This skin is perfect for iPhone users who want to protect their device while adding a touch of street art aesthetic.', 475.00, 53),
(16, 'Special Ocean Marble iPhone Skin', 'Apple iPhone 15', '../assets/Images/Apple iPhone 15-Special Ocean Marble iPhone Skin.png', 'Phone', 'This is a custom skin for iPhones, featuring a stylish ocean marble design. The skin is designed to fit perfectly on your iPhone, providing a sleek and modern look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your iPhone’s appearance as often as you like. This skin is perfect for iPhone users who want to protect their device while adding a touch of sophistication.', 1000.00, 85),
(17, 'Green Painting Nintendo Switch Skin', 'Nintendo Switch V1', '../assets/Images/Nintendo Switch V1-Green Painting Nintendo Switch Skin.png', 'Console', 'This is a custom skin for Nintendo Switch consoles, featuring a stylish green painting design. The skin is designed to fit perfectly on your Switch console and Joy-Con controllers, providing a stylish look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your Switch’s appearance as often as you like. This skin is perfect for Switch users who want to protect their device while adding a touch of artistic flair.', 1000.00, 44),
(18, 'Colorful Abstract MacBook Skin', 'Apple MacBook', '../assets/Images/Apple MacBook-Colorful Abstract MacBook Skin.png', 'Laptop', 'This is a custom skin for MacBooks, featuring a vibrant colorful abstract design. The skin is designed to fit perfectly on your MacBook, providing a stylish look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your MacBook’s appearance as often as you like. This skin is perfect for MacBook users who want to protect their device while adding a touch of artistic flair.', 1500.00, 78),
(19, 'Graphic Artwork PC Case Skin', 'PC Case', '../assets/Images/PC Case-Graphic Artwork PC Case Skin.png', 'Personal Computer', 'This is a custom skin for PC cases, featuring a vibrant graphic artwork design. The skin is designed to fit perfectly on your PC case, providing a stylish look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your PC case’s appearance as often as you like. This skin is perfect for PC users who want to protect their device while adding a touch of artistic flair.', 2500.00, 70),
(20, 'Special Cyberpunk 2077 PC Skin', 'PC Case', '../assets/Images/PC Case-Special Cyberpunk 2077 PC Skin.png', 'Personal Computer', 'This is a custom skin for PC cases, featuring a stylish Cyberpunk design. The skin is designed to fit perfectly on your PC case, providing a sleek and modern look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your PC case’s appearance as often as you like. This skin is perfect for PC users who want to protect their device while adding a touch of futuristic aesthetic.', 4500.00, 16),
(21, 'Sky Blue Pastel Xbox Series X Skin', 'Microsoft Xbox Series X', '../assets/Images/Microsoft Xbox Series X-Sky Blue Pastel Xbox Series X Skin.png', 'Console', 'This is a custom skin for Xbox Series X consoles, featuring a stylish sky blue pastel design. The skin is designed to fit perfectly on your Xbox Series X console, providing a sleek and modern look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your Xbox Series X’s appearance as often as you like. This skin is perfect for Xbox Series X users who want to protect their device while adding a touch of sophistication.', 1500.00, 99),
(22, 'Pearl White Nintendo Switch Skin', 'Nintendo Switch V1', '../assets/Images/Nintendo Switch V1-Pearl White Nintendo Switch Skin.png', 'Console', 'This is a custom skin for Nintendo Switch consoles, featuring a stylish pearl white design. The skin is designed to fit perfectly on your Switch console and Joy-Con controllers, providing a sleek and modern look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your Switch’s appearance as often as you like. This skin is perfect for Switch users who want to protect their device while adding a touch of sophistication.', 380.00, 41),
(23, 'Pink iPad Skin', 'Apple iPad', '../assets/Images/Apple iPad-Pink iPad Skin.png', 'Tablet', ' This is a custom skin for iPads, featuring a stylish pink design. The skin is designed to fit perfectly on your iPad, providing a sleek and modern look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your iPad’s appearance as often as you like. This skin is perfect for iPad users who want to protect their device while adding a touch of sophistication.', 1050.00, 99),
(24, 'Metallic Cyan DualSense Skin', 'Sony PlayStation DualSense', '../assets/Images/Sony PlayStation DualSense-Metallic Cyan DualSense Skin.png', 'Peripheral', 'Metallic Cyan DualSense Skin easy to install', 1500.00, 34),
(25, 'Cyan Steam Deck Skin', 'Valve Steam Deck', '../assets/Images/Valve Steam Deck-Cyan Steam Deck Skin.png', 'Console', 'Steam Deck na maangas', 1489.00, 33),
(26, 'Special Edition Sparkling Pink PS5', 'Sony PlayStation PS5 Standard', '../assets/Images/Sony PlayStation PS5 Standard-Special Edition Sparkling Pink PS5.png', 'Console', 'Cute na pink', 1500.00, 12),
(27, 'Red DualSense Controller Skin', 'Sony PlayStation DualSense', '../assets/Images/Sony PlayStation DualSense-Red DualSense Controller Skin.png', 'Peripheral', 'Red DualSense Controller Skin Easy to sinatll', 1488.00, 52),
(28, 'Pastel Paint Nintendo Switch Skin', 'Nintendo Switch V1', '../assets/Images/Nintendo Switch V1-Pastel Paint Nintendo Switch Skin.png', 'Console', 'This is a custom skin for Nintendo Switch consoles, featuring a stylish green painting design. The skin is designed to fit perfectly on your Switch console and Joy-Con controllers, providing a stylish look without compromising the device’s functionality. It’s easy to apply and remove, allowing you to customize your Switch’s appearance as often as you like. This skin is perfect for Switch users who want to protect their device while adding a touch of artistic flair.', 800.00, 32),
(29, 'Special Edition Gradient DualSense Skin', 'Sony PlayStation DualSense', '../assets/Images/Sony PlayStation DualSense-Special Edition Gradient DualSense Skin.png', 'Peripheral', 'Special Edition Cyan to Purple Gradient DualSense Skin', 7888.00, 1),
(30, 'Special Edition Gradient Xbox Series X', 'Microsoft Xbox Series X', '../assets/Images/Microsoft Xbox Series X-Special Edition Gradient Xbox Series X.png', 'Console', 'SPECIAL Cyan to Purple Gradient', 8599.00, 1),
(31, 'Special Edition Gradient Steam Deck', 'Valve Steam Deck', '../assets/Images/Valve Steam Deck-Special Edition Gradient Steam Deck.png', 'Console', 'SPECIAL Cyan to Purple Gradient', 9999.00, 1);

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
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `profile` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
