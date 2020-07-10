-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 29, 2020 lúc 02:54 PM
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
-- Cấu trúc bảng cho bảng `device_status`
--

DROP TABLE IF EXISTS `device_status`;
CREATE TABLE IF NOT EXISTS `device_status` (
  `name` varchar(255) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `device_status`
--

INSERT INTO `device_status` (`name`, `status`) VALUES
('/bom/state', 'off'),
('/den/state', 'off'),
('/phunsuong/state', 'off'),
('curID', 'gwv88e3w'),
('/maiChe/state', 'off'),
('/sensor_doAmdat', '29'),
('/sensor_doAmkk', '80'),
('/sensor_nhietdo', '30.04'),
('/sensor_mua', 'khong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `optional_info`
--

DROP TABLE IF EXISTS `optional_info`;
CREATE TABLE IF NOT EXISTS `optional_info` (
  `date` datetime DEFAULT current_timestamp(),
  `type` varchar(255) DEFAULT NULL,
  `ID` char(8) DEFAULT NULL,
  `_index` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`_index`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `optional_info`
--

INSERT INTO `optional_info` (`date`, `type`, `ID`, `_index`) VALUES
('2020-05-15 17:10:00', 'kali', 'gwv88e3w', 1),
('2020-05-14 00:00:00', 'kali', 'gwv88e3w', 2),
('2020-04-01 00:00:00', 'apatit', 'gwv88e3w', 3),
('2020-05-20 19:39:00', 'tá»‰a lÃ¡', 'gwv88e3w', 4),
('2020-05-19 22:12:00', 'test', '8psrqt2o', 6),
('2020-05-29 19:43:00', 'BÃ³n phÃ¢n ASD', 'dn6fkotm', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pack`
--

DROP TABLE IF EXISTS `pack`;
CREATE TABLE IF NOT EXISTS `pack` (
  `ID` char(8) NOT NULL,
  `datePack` datetime DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `pack`
--

INSERT INTO `pack` (`ID`, `datePack`, `location`, `address`) VALUES
('gwv88e3w', '2020-05-29 17:41:00', 'ÄÃ  Láº¡t', '123/456 ABCXYZ, tp ÄÃ  Láº¡t');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sensorval`
--

DROP TABLE IF EXISTS `sensorval`;
CREATE TABLE IF NOT EXISTS `sensorval` (
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `temperature` float NOT NULL,
  `humidity` float NOT NULL,
  `solidiMoisture` float NOT NULL,
  `ID` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sensorval`
--

INSERT INTO `sensorval` (`date`, `temperature`, `humidity`, `solidiMoisture`, `ID`) VALUES
('2020-05-15 00:00:00', 32.6873, 45.4948, 75.1618, 'gwv88e3w'),
('2020-05-15 01:00:00', 21, 57.1616, 99.3902, 'gwv88e3w'),
('2020-05-15 02:00:00', 22.784, 67.95, 59.5001, 'gwv88e3w'),
('2020-05-15 03:00:00', 39.2, 56.4237, 15.7, 'gwv88e3w'),
('2020-05-15 04:00:00', 35.0637, 71.5711, 45.0834, 'gwv88e3w'),
('2020-05-15 05:00:00', 21.5, 55, 15, 'gwv88e3w'),
('2020-05-15 06:00:00', 29.2756, 50, 39.546, 'gwv88e3w'),
('2020-05-15 07:00:00', 23.5946, 71.636, 96, 'gwv88e3w'),
('2020-05-15 08:00:00', 21.5207, 88.6325, 69, 'gwv88e3w'),
('2020-05-15 09:00:00', 28.3, 87.8, 60.603, 'gwv88e3w'),
('2020-05-15 10:00:00', 31.0819, 62, 67.4, 'gwv88e3w'),
('2020-05-15 11:00:00', 32.9, 83.9858, 78.747, 'gwv88e3w'),
('2020-05-15 12:00:00', 22.1, 56.9844, 91.978, 'gwv88e3w'),
('2020-05-15 13:00:00', 22.92, 87, 58.6812, 'gwv88e3w'),
('2020-05-15 14:00:00', 20.768, 79.5413, 17.3, 'gwv88e3w'),
('2020-05-15 15:00:00', 24.7437, 31.43, 34.21, 'gwv88e3w'),
('2020-05-15 16:00:00', 21.0176, 42.74, 19.0129, 'gwv88e3w'),
('2020-05-15 17:00:00', 20.1961, 69.24, 59, 'gwv88e3w'),
('2020-05-15 18:00:00', 31.4573, 96.2646, 42.099, 'gwv88e3w'),
('2020-05-15 19:00:00', 37.081, 40, 7.152, 'gwv88e3w'),
('2020-05-15 20:00:00', 23.2098, 34.014, 60.1226, 'gwv88e3w'),
('2020-05-15 21:00:00', 22.2096, 99.2091, 29.55, 'gwv88e3w'),
('2020-05-15 22:00:00', 30.4022, 49, 59.153, 'gwv88e3w'),
('2020-05-15 23:00:00', 29.7552, 75.42, 98.2, 'gwv88e3w'),
('2020-05-14 00:00:00', 32.6873, 45.4948, 75.1618, 'gwv88e3w'),
('2020-05-14 01:00:00', 21, 57.1616, 99.3902, 'gwv88e3w'),
('2020-05-14 02:00:00', 22.784, 67.95, 59.5001, 'gwv88e3w'),
('2020-05-14 03:00:00', 39.2, 56.4237, 15.7, 'gwv88e3w'),
('2020-05-14 04:00:00', 35.0637, 71.5711, 45.0834, 'gwv88e3w'),
('2020-05-14 05:00:00', 21.5, 55, 15, 'gwv88e3w'),
('2020-05-14 06:00:00', 29.2756, 50, 39.546, 'gwv88e3w'),
('2020-05-14 07:00:00', 23.5946, 71.636, 96, 'gwv88e3w'),
('2020-05-14 08:00:00', 21.5207, 88.6325, 69, 'gwv88e3w'),
('2020-05-14 09:00:00', 28.3, 87.8, 60.603, 'gwv88e3w'),
('2020-05-14 10:00:00', 31.0819, 62, 67.4, 'gwv88e3w'),
('2020-05-14 11:00:00', 32.9, 83.9858, 78.747, 'gwv88e3w'),
('2020-05-14 12:00:00', 22.1, 56.9844, 91.978, 'gwv88e3w'),
('2020-05-14 13:00:00', 22.92, 87, 58.6812, 'gwv88e3w'),
('2020-05-14 14:00:00', 20.768, 79.5413, 17.3, 'gwv88e3w'),
('2020-05-14 15:00:00', 24.7437, 31.43, 34.21, 'gwv88e3w'),
('2020-05-14 16:00:00', 21.0176, 42.74, 19.0129, 'gwv88e3w'),
('2020-05-14 17:00:00', 20.1961, 69.24, 59, 'gwv88e3w'),
('2020-05-14 18:00:00', 31.4573, 96.2646, 42.099, 'gwv88e3w'),
('2020-05-14 19:00:00', 37.081, 40, 7.152, 'gwv88e3w'),
('2020-05-14 20:00:00', 23.2098, 34.014, 60.1226, 'gwv88e3w'),
('2020-05-14 21:00:00', 22.2096, 99.2091, 29.55, 'gwv88e3w'),
('2020-05-14 22:00:00', 30.4022, 49, 59.153, 'gwv88e3w'),
('2020-05-14 23:00:00', 29.7552, 75.42, 98.2, 'gwv88e3w'),
('2020-05-13 00:00:00', 32.6873, 45.4948, 75.1618, 'gwv88e3w'),
('2020-05-13 01:00:00', 21, 57.1616, 99.3902, 'gwv88e3w'),
('2020-05-13 02:00:00', 22.784, 67.95, 59.5001, 'gwv88e3w'),
('2020-05-13 03:00:00', 39.2, 56.4237, 15.7, 'gwv88e3w'),
('2020-05-13 04:00:00', 35.0637, 71.5711, 45.0834, 'gwv88e3w'),
('2020-05-13 05:00:00', 21.5, 55, 15, 'gwv88e3w'),
('2020-05-13 06:00:00', 29.2756, 50, 39.546, 'gwv88e3w'),
('2020-05-13 07:00:00', 23.5946, 71.636, 96, 'gwv88e3w'),
('2020-05-13 08:00:00', 21.5207, 88.6325, 69, 'gwv88e3w'),
('2020-05-13 09:00:00', 28.3, 87.8, 60.603, 'gwv88e3w'),
('2020-05-13 10:00:00', 31.0819, 62, 67.4, 'gwv88e3w'),
('2020-05-13 11:00:00', 32.9, 83.9858, 78.747, 'gwv88e3w'),
('2020-05-13 12:00:00', 22.1, 56.9844, 91.978, 'gwv88e3w'),
('2020-05-13 13:00:00', 22.92, 87, 58.6812, 'gwv88e3w'),
('2020-05-13 14:00:00', 20.768, 79.5413, 17.3, 'gwv88e3w'),
('2020-05-13 15:00:00', 24.7437, 31.43, 34.21, 'gwv88e3w'),
('2020-05-13 16:00:00', 21.0176, 42.74, 19.0129, 'gwv88e3w'),
('2020-05-13 17:00:00', 20.1961, 69.24, 59, 'gwv88e3w'),
('2020-05-13 18:00:00', 31.4573, 96.2646, 42.099, 'gwv88e3w'),
('2020-05-13 19:00:00', 37.081, 40, 7.152, 'gwv88e3w'),
('2020-05-13 20:00:00', 23.2098, 34.014, 60.1226, 'gwv88e3w'),
('2020-05-13 21:00:00', 22.2096, 99.2091, 29.55, 'gwv88e3w'),
('2020-05-13 22:00:00', 30.4022, 49, 59.153, 'gwv88e3w'),
('2020-05-13 23:00:00', 29.7552, 75.42, 98.2, 'gwv88e3w'),
('2020-05-12 00:00:00', 32.6873, 45.4948, 75.1618, 'gwv88e3w'),
('2020-05-12 01:00:00', 21, 57.1616, 99.3902, 'gwv88e3w'),
('2020-05-12 02:00:00', 22.784, 67.95, 59.5001, 'gwv88e3w'),
('2020-05-12 03:00:00', 39.2, 56.4237, 15.7, 'gwv88e3w'),
('2020-05-12 04:00:00', 35.0637, 71.5711, 45.0834, 'gwv88e3w'),
('2020-05-12 05:00:00', 21.5, 55, 15, 'gwv88e3w'),
('2020-05-12 06:00:00', 29.2756, 50, 39.546, 'gwv88e3w'),
('2020-05-12 07:00:00', 23.5946, 71.636, 96, 'gwv88e3w'),
('2020-05-12 08:00:00', 21.5207, 88.6325, 69, 'gwv88e3w'),
('2020-05-12 09:00:00', 28.3, 87.8, 60.603, 'gwv88e3w'),
('2020-05-12 10:00:00', 31.0819, 62, 67.4, 'gwv88e3w'),
('2020-05-12 11:00:00', 32.9, 83.9858, 78.747, 'gwv88e3w'),
('2020-05-12 12:00:00', 22.1, 56.9844, 91.978, 'gwv88e3w'),
('2020-05-12 13:00:00', 22.92, 87, 58.6812, 'gwv88e3w'),
('2020-05-12 14:00:00', 20.768, 79.5413, 17.3, 'gwv88e3w'),
('2020-05-12 15:00:00', 24.7437, 31.43, 34.21, 'gwv88e3w'),
('2020-05-12 16:00:00', 21.0176, 42.74, 19.0129, 'gwv88e3w'),
('2020-05-12 17:00:00', 20.1961, 69.24, 59, 'gwv88e3w'),
('2020-05-12 18:00:00', 31.4573, 96.2646, 42.099, 'gwv88e3w'),
('2020-05-12 19:00:00', 37.081, 40, 7.152, 'gwv88e3w'),
('2020-05-12 20:00:00', 23.2098, 34.014, 60.1226, 'gwv88e3w'),
('2020-05-12 21:00:00', 22.2096, 99.2091, 29.55, 'gwv88e3w'),
('2020-05-12 22:00:00', 30.4022, 49, 59.153, 'gwv88e3w'),
('2020-05-12 23:00:00', 29.7552, 75.42, 98.2, 'gwv88e3w'),
('2020-05-11 00:00:00', 32.6873, 45.4948, 75.1618, 'gwv88e3w'),
('2020-05-11 01:00:00', 21, 57.1616, 99.3902, 'gwv88e3w'),
('2020-05-11 02:00:00', 22.784, 67.95, 59.5001, 'gwv88e3w'),
('2020-05-11 03:00:00', 39.2, 56.4237, 15.7, 'gwv88e3w'),
('2020-05-11 04:00:00', 35.0637, 71.5711, 45.0834, 'gwv88e3w'),
('2020-05-11 05:00:00', 21.5, 55, 15, 'gwv88e3w'),
('2020-05-11 06:00:00', 29.2756, 50, 39.546, 'gwv88e3w'),
('2020-05-11 07:00:00', 23.5946, 71.636, 96, 'gwv88e3w'),
('2020-05-11 08:00:00', 21.5207, 88.6325, 69, 'gwv88e3w'),
('2020-05-11 09:00:00', 28.3, 87.8, 60.603, 'gwv88e3w'),
('2020-05-11 10:00:00', 31.0819, 62, 67.4, 'gwv88e3w'),
('2020-05-11 11:00:00', 32.9, 83.9858, 78.747, 'gwv88e3w'),
('2020-05-11 12:00:00', 22.1, 56.9844, 91.978, 'gwv88e3w'),
('2020-05-11 13:00:00', 22.92, 87, 58.6812, 'gwv88e3w'),
('2020-05-11 14:00:00', 20.768, 79.5413, 17.3, 'gwv88e3w'),
('2020-05-11 15:00:00', 24.7437, 31.43, 34.21, 'gwv88e3w'),
('2020-05-11 16:00:00', 21.0176, 42.74, 19.0129, 'gwv88e3w'),
('2020-05-11 17:00:00', 20.1961, 69.24, 59, 'gwv88e3w'),
('2020-05-11 18:00:00', 31.4573, 96.2646, 42.099, 'gwv88e3w'),
('2020-05-11 19:00:00', 37.081, 40, 7.152, 'gwv88e3w'),
('2020-05-11 20:00:00', 23.2098, 34.014, 60.1226, 'gwv88e3w'),
('2020-05-11 21:00:00', 22.2096, 99.2091, 29.55, 'gwv88e3w'),
('2020-05-11 22:00:00', 30.4022, 49, 59.153, 'gwv88e3w'),
('2020-05-11 23:00:00', 29.7552, 75.42, 98.2, 'gwv88e3w'),
('2020-05-10 00:00:00', 32.6873, 45.4948, 75.1618, 'gwv88e3w'),
('2020-05-10 01:00:00', 21, 57.1616, 99.3902, 'gwv88e3w'),
('2020-05-10 02:00:00', 22.784, 67.95, 59.5001, 'gwv88e3w'),
('2020-05-10 03:00:00', 39.2, 56.4237, 15.7, 'gwv88e3w'),
('2020-05-10 04:00:00', 35.0637, 71.5711, 45.0834, 'gwv88e3w'),
('2020-05-10 05:00:00', 21.5, 55, 15, 'gwv88e3w'),
('2020-05-10 06:00:00', 29.2756, 50, 39.546, 'gwv88e3w'),
('2020-05-10 07:00:00', 23.5946, 71.636, 96, 'gwv88e3w'),
('2020-05-10 08:00:00', 21.5207, 88.6325, 69, 'gwv88e3w'),
('2020-05-10 09:00:00', 28.3, 87.8, 60.603, 'gwv88e3w'),
('2020-05-10 10:00:00', 31.0819, 62, 67.4, 'gwv88e3w'),
('2020-05-10 11:00:00', 32.9, 83.9858, 78.747, 'gwv88e3w'),
('2020-05-10 12:00:00', 22.1, 56.9844, 91.978, 'gwv88e3w'),
('2020-05-10 13:00:00', 22.92, 87, 58.6812, 'gwv88e3w'),
('2020-05-10 14:00:00', 20.768, 79.5413, 17.3, 'gwv88e3w'),
('2020-05-10 15:00:00', 24.7437, 31.43, 34.21, 'gwv88e3w'),
('2020-05-10 16:00:00', 21.0176, 42.74, 19.0129, 'gwv88e3w'),
('2020-05-10 17:00:00', 20.1961, 69.24, 59, 'gwv88e3w'),
('2020-05-10 18:00:00', 31.4573, 96.2646, 42.099, 'gwv88e3w'),
('2020-05-10 19:00:00', 37.081, 40, 7.152, 'gwv88e3w'),
('2020-05-10 20:00:00', 23.2098, 34.014, 60.1226, 'gwv88e3w'),
('2020-05-10 21:00:00', 22.2096, 99.2091, 29.55, 'gwv88e3w'),
('2020-05-10 22:00:00', 30.4022, 49, 59.153, 'gwv88e3w'),
('2020-05-10 23:00:00', 29.7552, 75.42, 98.2, 'gwv88e3w'),
('2020-05-16 00:00:00', 32.6873, 45.4948, 75.1618, 'gwv88e3w'),
('2020-05-16 01:00:00', 21, 57.1616, 99.3902, 'gwv88e3w'),
('2020-05-16 02:00:00', 22.784, 67.95, 59.5001, 'gwv88e3w'),
('2020-05-16 03:00:00', 39.2, 56.4237, 15.7, 'gwv88e3w'),
('2020-05-16 04:00:00', 35.0637, 71.5711, 45.0834, 'gwv88e3w'),
('2020-05-16 05:00:00', 21.5, 55, 15, 'gwv88e3w'),
('2020-05-16 06:00:00', 29.2756, 50, 39.546, 'gwv88e3w'),
('2020-05-16 07:00:00', 23.5946, 71.636, 96, 'gwv88e3w'),
('2020-05-16 08:00:00', 21.5207, 88.6325, 69, 'gwv88e3w'),
('2020-05-16 09:00:00', 28.3, 87.8, 60.603, 'gwv88e3w'),
('2020-05-16 10:00:00', 31.0819, 62, 67.4, 'gwv88e3w'),
('2020-05-16 11:00:00', 32.9, 83.9858, 78.747, 'gwv88e3w'),
('2020-05-16 12:00:00', 22.1, 56.9844, 91.978, 'gwv88e3w'),
('2020-05-16 13:00:00', 22.92, 87, 58.6812, 'gwv88e3w'),
('2020-05-16 14:00:00', 20.768, 79.5413, 17.3, 'gwv88e3w'),
('2020-05-16 15:00:00', 24.7437, 31.43, 34.21, 'gwv88e3w'),
('2020-05-16 16:00:00', 21.0176, 42.74, 19.0129, 'gwv88e3w'),
('2020-05-16 17:00:00', 20.1961, 69.24, 59, 'gwv88e3w'),
('2020-05-16 18:00:00', 31.4573, 96.2646, 42.099, 'gwv88e3w'),
('2020-05-16 19:00:00', 37.081, 40, 7.152, 'gwv88e3w'),
('2020-05-16 20:00:00', 23.2098, 34.014, 60.1226, 'gwv88e3w'),
('2020-05-16 21:00:00', 22.2096, 99.2091, 29.55, 'gwv88e3w'),
('2020-05-16 22:00:00', 30.4022, 49, 59.153, 'gwv88e3w'),
('2020-05-16 23:00:00', 29.7552, 75.42, 98.2, 'gwv88e3w');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `dt` datetime DEFAULT current_timestamp(),
  `name` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `test`
--

INSERT INTO `test` (`dt`, `name`) VALUES
('2020-05-15 17:00:50', 'qwerty');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tree`
--

DROP TABLE IF EXISTS `tree`;
CREATE TABLE IF NOT EXISTS `tree` (
  `ID` char(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateStart` datetime DEFAULT NULL,
  `dateEnd` datetime DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tree`
--

INSERT INTO `tree` (`ID`, `name`, `dateStart`, `dateEnd`, `location`, `address`) VALUES
('8psrqt2o', 'CÃ  chua', '2020-05-19 21:58:00', '2020-08-19 09:58:00', 'SÃ i GÃ²n', '123/456 ABC, XYZ'),
('gl74r0mp', 'cÃ  chua', '2020-03-09 19:50:00', '2020-05-09 20:50:00', 'HÃ  Ná»™i', '123/456 ABC, XYZ'),
('gwv88e3w', 'cÃ  chua', '2020-05-10 00:00:00', '2020-08-10 00:00:00', 'ÄÃ  Láº¡t', '123/456 phÆ°á»ng ABC, quáº­n XYZ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
