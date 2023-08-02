-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 06:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `approve_orders`
--

CREATE TABLE `approve_orders` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `package` varchar(255) NOT NULL,
  `reservation_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approve_orders`
--

INSERT INTO `approve_orders` (`id`, `email`, `name`, `order_id`, `package`, `reservation_date`, `quantity`, `phone_number`, `location`) VALUES
(28, 'nadia@gmail.com', 'Nadia', '681210', 'Set A', '2023-08-03', 50, '0123456789', 'PSP'),
(29, 'nadia@gmail.com', 'Nadia', '681210', 'Set A', '2023-08-03', 50, '0123456789', 'PSP'),
(30, 'nadia@gmail.com', 'Nadia', '978102', 'Set A', '2023-08-02', 40, '0123456789', 'PSP'),
(31, 'nadia@gmail.com', 'Nadia', '978102', 'Set A', '2023-08-02', 40, '0123456789', 'PSP'),
(32, 'khadijah@gmail.com', 'Khadijah', '422612', 'Set A', '2023-08-03', 40, '0123456789', 'PSP'),
(33, 'khadijah@gmail.com', 'Khadijah', '422612', 'Set A', '2023-08-03', 40, '0123456789', 'PSP');

-- --------------------------------------------------------

--
-- Table structure for table `custlogin`
--

CREATE TABLE `custlogin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custlogin`
--

INSERT INTO `custlogin` (`id`, `email`, `password`) VALUES
(1, 'nurkhadijah192@gmail.com', '456123'),
(2, 'nurkhadijah192@gmail.com', '456123'),
(3, 'nurkhadijah192@gmail.com', '456123'),
(4, 'zulaikha@gmail.com', '123456'),
(5, 'nurkhadijah192@gmail.com', '456123'),
(6, 'nadia@gmail.com', '123456'),
(7, 'nurkhadijah192@gmail.com', '456123'),
(8, 'nurkhadijah192@gmail.com', '456123'),
(9, 'nurkhadijah192@gmail.com', '456123'),
(10, 'zulaikha@gmail.com', '123456'),
(11, 'zulaikha@gmail.com', '123456'),
(12, 'nurkhadijah192@gmail.com', '456123'),
(13, 'zulaikha@gmail.com', '123456'),
(14, 'nurkhadijah192@gmail.com', '456123'),
(15, 'nurkhadijah192@gmail.com', '456123'),
(16, 'farisya@gmail.com', '123456'),
(17, 'nurkhadijah192@gmail.com', '456123'),
(18, 'amani@gmail.com', '456123'),
(19, 'nurkhadijah192@gmail.com', '456123'),
(20, 'aina@gmail.com', '123456'),
(21, 'nurkhadijah192@gmail.com', '456123'),
(22, 'nurkhadijah192@gmail.com', '456123'),
(23, 'nadia@gmail.com', '123456'),
(24, 'nadia@gmail.com', '123456'),
(25, 'nadia@gmail.com', '123456'),
(26, 'nurkhadijah192@gmail.com', '456123'),
(27, 'nurkhadijah192@gmail.com', '456123'),
(28, 'nurkhadijah192@gmail.com', '456123'),
(29, 'nurkhadijah192@gmail.com', '456123'),
(30, 'zulaikha@gmail.com', '123456'),
(31, 'siti@gmail.com', '123456'),
(32, 'zulaikha@gmail.com', '123456'),
(33, 'zulaikha@gmail.com', '123456'),
(34, 'nadia@gmail.com', '123456'),
(35, 'farisya@gmail.com', '123456'),
(36, 'zulaikha@gmail.com', '123456'),
(37, 'zulaikha@gmail.com', '123456'),
(38, 'nadia@gmail.com', '123456'),
(39, 'siti@gmail.com', '123456'),
(40, 'siti@gmail.com', '123456'),
(41, 'zulaikha@gmail.com', '123456'),
(42, 'zulaikha@gmail.com', '123456'),
(43, 'nadia@gmail.com', '123456'),
(44, 'nadia@gmail.com', '123456'),
(45, 'nadia@gmail.com', '123456'),
(46, 'nadia@gmail.com', '123456'),
(47, 'nadia@gmail.com', '123456'),
(48, 'nadia@gmail.com', '123456'),
(49, 'nadia@gmail.com', '123456'),
(50, 'nadia@gmail.com', '123456'),
(51, 'nadia@gmail.com', '123456'),
(52, 'nadia@gmail.com', '123456'),
(53, 'nadia@gmail.com', '123456'),
(54, 'nadia@gmail.com', '123456'),
(55, 'zulaikha@gmail.com', '123456'),
(56, 'nadia@gmail.com', '123456'),
(57, 'nadia@gmail.com', '123456'),
(58, 'nadia@gmail.com', '123456'),
(59, 'nadia@gmail.com', '123456'),
(60, 'siti@gmail.com', '123456'),
(61, 'siti@gmail.com', '123456'),
(62, 'siti@gmail.com', '123456'),
(63, 'siti@gmail.com', '123456'),
(64, 'nadia@gmail.com', '123456'),
(65, 'farisya@gmail.com', '123456'),
(66, 'farisya@gmail.com', '123456'),
(67, 'zulaikha@gmail.com', '123456'),
(68, 'farisya@gmail.com', '123456'),
(69, 'farisya@gmail.com', '123456'),
(70, 'nadia@gmail.com', '123456'),
(71, 'nadia@gmail.com', '123456'),
(72, 'nadia@gmail.com', '123456'),
(73, 'nadia@gmail.com', '123456'),
(74, 'nadia@gmail.com', '123456'),
(75, 'nadia@gmail.com', '123456'),
(76, 'nadia@gmail.com', '123456'),
(77, 'siti@gmail.com', '123456'),
(78, 'siti@gmail.com', '123456'),
(79, 'nadia@gmail.com', '123456'),
(80, 'nadia@gmail.com', '123456'),
(81, 'nadia@gmail.com', '123456'),
(82, 'nadia@gmail.com', '123456'),
(83, 'zulaikha@gmail.com', '123456'),
(84, 'zulaikha@gmail.com', '123456'),
(85, 'zulaikha@gmail.com', '123456'),
(86, 'nadia@gmail.com', '123456'),
(87, 'nadia@gmail.com', '123456'),
(88, 'nadia@gmail.com', '123456'),
(89, 'zulaikha@gmail.com', '123456'),
(90, 'zulaikha@gmail.com', '123456'),
(91, 'nadia@gmail.com', '123456'),
(92, 'zulaikha@gmail.com', '123456'),
(93, 'nadia@gmail.com', '123456'),
(94, 'nadia@gmail.com', '123456'),
(95, 'zulaikha@gmail.com', '123456'),
(96, 'siti@gmail.com', '123456'),
(97, 'farisya@gmail.com', '123456'),
(98, 'nadia@gmail.com', '123456'),
(99, 'nadia@gmail.com', '123456'),
(100, 'khadijah@gmail.com', '123456'),
(101, 'khadijah@gmail.com', '123456'),
(102, 'khadijah@gmail.com', '123456'),
(103, 'nadia@gmail.com', '123456'),
(104, 'nadia@gmail.com', '123456'),
(105, 'siti@gmail.com', '123456'),
(106, 'nadia@gmail.com', '123456'),
(107, 'siti@gmail.com', '123456'),
(108, 'khadijah@gmail.com', '123456'),
(109, 'khadijah@gmail.com', '123456'),
(110, 'khadijah@gmail.com', '123456'),
(111, 'zulaikha@gmail.com', '123456'),
(112, 'nadia@gmail.com', '123456'),
(113, 'nadia@gmail.com', '123456'),
(114, 'nadia@gmail.com', '123456'),
(115, 'nadia@gmail.com', '123456'),
(116, 'zulaikha@gmail.com', '123456'),
(117, 'zulaikha@gmail.com', '123456'),
(118, 'zulaikha@gmail.com', '123456'),
(119, 'nadia@gmail.com', '123456'),
(120, 'nadia@gmail.com', '123456'),
(121, 'nadia@gmail.com', '123456'),
(122, 'nadia@gmail.com', '123456'),
(123, 'nadia@gmail.com', '123456'),
(124, 'nadia@gmail.com', '123456'),
(125, 'nadia@gmail.com', '123456'),
(126, 'nadia@gmail.com', '123456'),
(127, 'nadia@gmail.com', '123456'),
(128, 'nadia@gmail.com', '123456'),
(129, 'nadia@gmail.com', '123456'),
(130, 'zulaikha@gmail.com', '123456'),
(131, 'zulaikha@gmail.com', '123456'),
(132, 'zulaikha@gmail.com', '123456'),
(133, 'zulaikha@gmail.com', '123456'),
(134, 'zulaikha@gmail.com', '123456'),
(135, 'zulaikha@gmail.com', '123456'),
(136, 'zulaikha@gmail.com', '123456'),
(137, 'zulaikha@gmail.com', '123456'),
(138, 'zulaikha@gmail.com', '123456'),
(139, 'zulaikha@gmail.com', '123456'),
(140, 'zulaikha@gmail.com', '123456'),
(141, 'nadia@gmail.com', '123456'),
(142, 'zulaikha@gmail.com', '123456'),
(143, 'zulaikha@gmail.com', '123456'),
(144, 'zulaikha@gmail.com', '123456'),
(145, 'nadia@gmail.com', '123456'),
(146, 'nadia@gmail.com', '123456'),
(147, 'khadijah@gmail.com', '123456'),
(148, 'nadia@gmail.com', '123456'),
(149, 'siti@gmail.com', '123456'),
(150, 'amani@gmail.com', '123456'),
(151, 'nadia@gmail.com', '123456'),
(152, 'nadia@gmail.com', '123456'),
(153, 'nadia@gmail.com', '123456'),
(154, 'nadia@gmail.com', '123456'),
(155, 'nadia@gmail.com', '123456'),
(156, 'khadijah@gmail.com', '123456'),
(157, 'khadijah@gmail.com', '123456'),
(158, 'khadijah@gmail.com', '123456'),
(159, 'nadia@gmail.com', '123456'),
(160, 'nadia@gmail.com', '123456'),
(161, 'zulaikha@gmail.com', '123456'),
(162, 'farisya@gmail.com', '123456'),
(163, 'siti@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `custregistration`
--

CREATE TABLE `custregistration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custregistration`
--

INSERT INTO `custregistration` (`id`, `name`, `email`, `password`, `confirm_password`) VALUES
(1, 'Zulaikha Nadia', 'zulaikha@gmail.com', '123456', '123456'),
(2, 'Siti Nurkhadijah', 'khadijah@gmail.com', '123456', '123456'),
(3, 'Farisya Amani', 'farisya@gmail.com', '123456', '123456'),
(4, 'Nadia', 'nadia@gmail.com', '123456', '123456'),
(5, 'Siti', 'siti@gmail.com', '123456', '123456'),
(6, 'Amani', 'amani@gmail.com', '123456', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `orderforma`
--

CREATE TABLE `orderforma` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `reservation_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `location` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderforma`
--

INSERT INTO `orderforma` (`id`, `order_id`, `name`, `package`, `reservation_date`, `quantity`, `phone_number`, `location`, `email`) VALUES
(1, 338960, 'Zulaikha', 'Set A', '2023-08-09', 50, '0123456789', 'PSP', 'zulaikha@gmail.com'),
(2, 681210, 'Nadia', 'Set A', '2023-08-03', 50, '0123456789', 'PSP', 'nadia@gmail.com'),
(3, 978102, 'Nadia', 'Set A', '2023-08-02', 40, '0123456789', 'PSP', 'nadia@gmail.com'),
(4, 422612, 'Khadijah', 'Set A', '2023-08-03', 40, '0123456789', 'PSP', 'khadijah@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orderformb`
--

CREATE TABLE `orderformb` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `reservation_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `location` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderformb`
--

INSERT INTO `orderformb` (`id`, `order_id`, `name`, `package`, `reservation_date`, `quantity`, `phone_number`, `location`, `email`) VALUES
(1, 652892, 'Zulaikha', 'Set B', '2023-08-10', 100, '0123456789', 'PSP', 'zulaikha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orderformc`
--

CREATE TABLE `orderformc` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `reservation_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `location` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderformc`
--

INSERT INTO `orderformc` (`id`, `order_id`, `name`, `package`, `reservation_date`, `quantity`, `phone_number`, `location`, `email`) VALUES
(1, 980979, 'Zulaikha', 'Set C', '2023-08-17', 150, '0123456789', 'PSP', 'zulaikha@gmail.com'),
(2, 870530, 'Farisya', 'Set C', '2023-08-03', 130, '0123456789', 'PSP', 'farisya@gmail.com'),
(3, 374257, 'Siti', 'Set C', '2023-08-05', 120, '0123456789', 'PSP', 'siti@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(6) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `order_id`, `email`, `file_path`) VALUES
(7, 652892, 'zulaikha@gmail.com', 'C:/xampp/htdocs/FYP/FYP/upload-filehome.jpg'),
(8, 681210, 'nadia@gmail.com', 'C:/xampp/htdocs/FYP/FYP/upload-file10DDT21F1018 LAB TASK 2.pdf'),
(9, 681210, 'nadia@gmail.com', 'C:/xampp/htdocs/FYP/FYP/upload-file');

-- --------------------------------------------------------

--
-- Table structure for table `reject_orders`
--

CREATE TABLE `reject_orders` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `package` varchar(255) NOT NULL,
  `reservation_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reject_orders`
--

INSERT INTO `reject_orders` (`id`, `email`, `name`, `order_id`, `package`, `reservation_date`, `quantity`, `phone_number`, `location`) VALUES
(8, 'zulaikha@gmail.com', 'Zulaikha', '338960', 'Set A', '2023-08-09', 50, '0123456789', 'PSP'),
(9, 'zulaikha@gmail.com', 'Zulaikha', '338960', 'Set A', '2023-08-09', 50, '0123456789', 'PSP'),
(10, 'khadijah@gmail.com', 'Khadijah', '422612', 'Set A', '2023-08-03', 40, '0123456789', 'PSP'),
(11, 'khadijah@gmail.com', 'Khadijah', '422612', 'Set A', '2023-08-03', 40, '0123456789', 'PSP'),
(12, 'khadijah@gmail.com', 'Khadijah', '422612', 'Set A', '2023-08-03', 40, '0123456789', 'PSP'),
(13, 'khadijah@gmail.com', 'Khadijah', '422612', 'Set A', '2023-08-03', 40, '0123456789', 'PSP'),
(14, 'khadijah@gmail.com', 'Khadijah', '422612', 'Set A', '2023-08-03', 40, '0123456789', 'PSP'),
(15, 'khadijah@gmail.com', 'Khadijah', '422612', 'Set A', '2023-08-03', 40, '0123456789', 'PSP');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `email`, `content`, `date_created`) VALUES
(11, 'nadia@gmail.com', 'reasonable price ', '2023-08-02 12:13:55'),
(12, 'siti@gmail.com', 'makanan sedap dan harga berpatutan', '2023-08-02 12:14:37'),
(13, 'amani@gmail.com', 'service bagus', '2023-08-02 12:15:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approve_orders`
--
ALTER TABLE `approve_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custlogin`
--
ALTER TABLE `custlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custregistration`
--
ALTER TABLE `custregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderforma`
--
ALTER TABLE `orderforma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderformb`
--
ALTER TABLE `orderformb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderformc`
--
ALTER TABLE `orderformc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reject_orders`
--
ALTER TABLE `reject_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approve_orders`
--
ALTER TABLE `approve_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `custlogin`
--
ALTER TABLE `custlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `custregistration`
--
ALTER TABLE `custregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orderforma`
--
ALTER TABLE `orderforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderformb`
--
ALTER TABLE `orderformb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderformc`
--
ALTER TABLE `orderformc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reject_orders`
--
ALTER TABLE `reject_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
