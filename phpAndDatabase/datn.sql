-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 02, 2020 lúc 11:52 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datn`
--
CREATE DATABASE IF NOT EXISTS `datn` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `datn`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sensorval`
--

DROP TABLE IF EXISTS `sensorval`;
CREATE TABLE IF NOT EXISTS `sensorval` (
  `date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `temperature` float NOT NULL,
  `humidity` float NOT NULL,
  `solidiMoisture` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sensorval`
--

INSERT INTO `sensorval` (`date`, `temperature`, `humidity`, `solidiMoisture`) VALUES
('2020-04-17 12:53:34', 30.01, 60, 20),
('2020-04-17 13:40:05', 30.2, 60, 20),
('2020-04-17 13:40:28', 29.8, 61, 20),
('2020-04-17 16:11:19', 30.04, 60, 20.11),
('2020-04-17 17:39:30', 33.2, 61, 10),
('2020-04-17 17:40:23', 33.2, 61, 10),
('2020-04-30 19:40:36', 30.2, 60, 20),
('2020-04-30 19:40:37', 30.2, 60, 20),
('2020-04-30 19:40:38', 30.2, 60, 20),
('2020-04-30 19:40:39', 30.2, 60, 20),
('2020-04-30 19:40:40', 30.2, 60, 20),
('2020-04-30 19:40:40', 30.2, 60, 20),
('2020-04-30 19:40:41', 30.2, 60, 20),
('2020-04-30 19:40:42', 30.2, 60, 20),
('2020-04-30 19:40:42', 30.2, 60, 20),
('2020-04-30 19:40:43', 30.2, 60, 20),
('2020-04-30 19:40:47', 30.2, 60, 20),
('2020-04-30 19:40:47', 30.2, 60, 20),
('2020-04-30 19:40:48', 30.2, 60, 20),
('2020-04-30 19:40:48', 30.2, 60, 20),
('2020-04-30 19:40:49', 30.2, 60, 20),
('2020-04-30 19:40:49', 30.2, 60, 20),
('2020-04-30 19:40:50', 30.2, 60, 20),
('2020-04-30 19:40:50', 30.2, 60, 20),
('2020-05-01 19:48:13', 29, 70, 15),
('2020-05-01 19:48:14', 29, 70, 15),
('2020-05-01 19:48:15', 29, 70, 15),
('2020-05-01 19:48:15', 29, 70, 15),
('2020-05-01 19:48:16', 29, 70, 15),
('2020-05-01 19:48:29', 28, 71, 18),
('2020-05-01 19:48:30', 28, 71, 18),
('2020-05-01 19:48:31', 28, 71, 18);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
