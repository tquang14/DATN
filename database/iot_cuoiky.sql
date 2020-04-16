-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2020 lúc 03:38 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `iot_cuoiky`
--
CREATE DATABASE IF NOT EXISTS `iot_cuoiky` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `iot_cuoiky`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaicay`
--

CREATE TABLE `loaicay` (
  `tenCay` varchar(100) NOT NULL,
  `nhietDo` varchar(10) NOT NULL,
  `doAmKK` varchar(10) NOT NULL,
  `doAmDat` varchar(10) NOT NULL,
  `anhSang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loaicay`
--

INSERT INTO `loaicay` (`tenCay`, `nhietDo`, `doAmKK`, `doAmDat`, `anhSang`) VALUES
('caRot', '32.50', '60.50', '20.50', '220'),
('bapCai', '29.69', '50.00', '25.00', '230'),
('bongCai', '23.00', '50.00', '30.00', '200'),
('caiThia', '28.00', '55.00', '28.00', '200'),
('khoaiTay', '22.00', '40.00', '28.00', '200'),
('caChua', '25.52', '41.11', '28.08', '220');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(5, 'tquang14', '$2y$10$cPc4SQVqFqVSLiZA1LNBeu6TaSQBKBaQ0Y.sFV/Zi0uyNGTKWjVQG', '2020-01-04 15:59:20'),
(6, 'duy', '$2y$10$.lsvIfExXuwQx/K8yNd6sO2LFefqqlQUj4UKFilQzvdwANADeypua', '2020-01-07 14:55:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
