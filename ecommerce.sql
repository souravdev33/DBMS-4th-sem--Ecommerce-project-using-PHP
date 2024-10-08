-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 04:49 PM
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
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `AdminID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`AdminID`, `FirstName`, `LastName`, `Address`, `PhoneNumber`, `Email`, `Password`, `DateOfBirth`, `Gender`) VALUES
(1, 'Bidhan', 'Nath', 'Noajishpur', '01835272050', 'bidhannath2001@gmail.com', '11', '2001-12-01', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Shirt'),
(2, 'Panjabi'),
(3, 'Hoodie'),
(4, 'Polo'),
(5, 'Suits'),
(6, 'Belt'),
(7, ' chair'),
(8, ' Bike');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Bidhan', 'bidhannath2001@gmail.com', 'hello', 'sdffsdfsdf', '2024-07-07 19:01:04'),
(2, 'Bidhan', 'bidhannath2001@gmail.com', 'hello', 'sdffsdfsdf', '2024-07-07 19:02:44'),
(4, 'Bidhan Nath', 'bidhannath2001@gmail.com', 'hello', 'bla', '2024-08-28 18:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `customerprofile`
--

CREATE TABLE `customerprofile` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerprofile`
--

INSERT INTO `customerprofile` (`CustomerID`, `FirstName`, `LastName`, `Address`, `PhoneNumber`, `Email`, `Password`, `DateOfBirth`, `Gender`) VALUES
(1, 'Imti', 'uddin', 'noakhali', '423423423', 'imtiazuddin420@gmail.com', '111', '1970-01-01', 'Male'),
(5, 'Bidhan', 'Nath', 'Noajishpur', '01835272050', 'bidhannath2001@gmail.com', '111', '2002-01-14', 'Male'),
(6, 'Rafi', 'Tahsin', 'Halishahor', '01835504343', 'tahsinrafi1017@gmail.com', '123', '2001-01-01', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `image`, `quantity`, `user_email`, `order_date`) VALUES
(22, 7, 'f6.jpg', 1, 'bidhannath2001@gmail.com', '2024-08-22 21:30:16'),
(23, 15, '5.png', 1, 'bidhannath2001@gmail.com', '2024-08-22 21:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Description` text NOT NULL,
  `Stock` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Price`, `Description`, `Stock`, `CategoryID`, `Image`) VALUES
(7, 'shirt4', 20.00, 'new shirt', 50, 1, 'f6.jpg'),
(9, 'Shirt', 10.00, 'New collection', 100, 1, 'f2.jpg'),
(10, 'shirt', 20.00, 'new shirt', 50, 1, 'f5.jpg'),
(12, 'chair', 30.00, 'Chair', 100, 7, '2.png'),
(15, 'chair', 30.00, 'Chair', 100, 7, '5.png'),
(16, 'chair', 50.00, 'Chair', 100, 7, '6.png'),
(18, 'bike', 1800.00, 'Bike', 10, 8, 'bike2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ProductID` int(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`ProductID`, `Email`, `rating`, `comment`, `created_at`) VALUES
(8, 'bidhannath2001@gmail.com', 3.0, 'awesome', '2024-07-07 19:04:45'),
(5, 'bidhannath2001@gmail.com', 2.0, 'ok', '2024-07-08 03:27:17'),
(5, 'bidhannath2001@gmail.com', 2.0, 'ok ok ok', '2024-07-08 03:27:36'),
(20, 'bidhannath2001@gmail.com', 5.0, 'awesome', '2024-08-18 11:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `sold`
--

CREATE TABLE `sold` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sold`
--

INSERT INTO `sold` (`id`, `product_id`, `image`, `quantity`, `user_email`, `order_date`) VALUES
(4, 18, 'bike2.jpg', 1, 'bidhannath2001@gmail.com', '2024-08-18 20:00:15'),
(7, 7, 'f6.jpg', 1, 'imtiazuddin420@gmail.com', '2024-08-16 11:02:46'),
(10, 12, '2.png', 1, 'bidhannath2001@gmail.com', '2024-08-22 17:56:23'),
(15, 15, '5.png', 1, 'bidhannath2001@gmail.com', '2024-08-17 07:38:46'),
(18, 10, 'f5.jpg', 2, 'bidhannath2001@gmail.com', '2024-08-16 10:59:28'),
(21, 9, 'f2.jpg', 1, 'bidhannath2001@gmail.com', '2024-08-22 21:28:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerprofile`
--
ALTER TABLE `customerprofile`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `sold`
--
ALTER TABLE `sold`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customerprofile`
--
ALTER TABLE `customerprofile`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sold`
--
ALTER TABLE `sold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `sold`
--
ALTER TABLE `sold`
  ADD CONSTRAINT `sold_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
