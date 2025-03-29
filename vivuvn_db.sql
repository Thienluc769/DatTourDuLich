-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 29, 2025 lúc 03:54 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vivuvn_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int UNSIGNED NOT NULL,
  `account_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year_of_birth` int NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_detail`
--

CREATE TABLE `customer_detail` (
  `id` int UNSIGNED NOT NULL,
  `customer_id` int NOT NULL,
  `adult` int NOT NULL,
  `children` int NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `enterprise`
--

CREATE TABLE `enterprise` (
  `id` int NOT NULL,
  `username` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_id` int NOT NULL,
  `id_info` int NOT NULL,
  `approved_by` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `enterprise`
--

INSERT INTO `enterprise` (`id`, `username`, `password`, `status_id`, `id_info`, `approved_by`, `create_at`, `update_at`) VALUES
(13, 'quang.nvm.574@gmail.com', '$2y$12$rTeiEOULn47Iw1ioSj/8VutL7c4AxDVMVZ3yblFxucaSxSVPA1hhK', 2, 15, NULL, '2024-12-18 21:28:51', '2024-12-18 21:28:59'),
(14, 'quang.nvm.0205@gmail.com', '$2y$12$qDOmKqVBWxGkxdiKDW7/meABsf6UVVQDk.kaMWK0JcILhdPmzp4YO', 1, 16, NULL, '2024-12-19 00:12:21', '2024-12-19 00:12:21'),
(15, 'nguoisudungthu20@gmail.com', '$2y$12$UQHtIcgRE1IqWx5jpJvYo.O0hqlKGMSJVE5.sGB9V5TyuUkXSp.LK', 1, 17, NULL, '2024-12-19 00:15:31', '2024-12-19 00:15:31'),
(16, 'nguoisudungthu19@gmail.com', '$2y$12$JgzZ/EqWe4lrWWr87U7N3ul/5WOpU1DIpei0i7tPL43UoGRbhOOuu', 1, 18, NULL, '2024-12-19 00:17:16', '2024-12-19 00:17:16'),
(17, 'nguoisudungthu18@gmail.com', '$2y$12$En3yNvINV0Nr7MeBDmue8.Sss4awtZBIKb5WSqss3Uxra4GjqNfkO', 1, 19, NULL, '2024-12-19 00:18:45', '2024-12-19 00:18:45'),
(18, 'nguoisudungthu17@gmail.com', '$2y$12$U5.Ni57A7CdLjJOUBLX5g.4iDCeiNbr6Ka13IZXOxNgmCh6pkNGX2', 1, 20, NULL, '2024-12-19 00:20:58', '2024-12-19 00:20:58'),
(19, 'nguoisudungthu16@gmail.com', '$2y$12$Wj34JVlgI1GT5rP0b4d7xeONQJazITeU14MU.QcIKITYI6pEtJHzu', 2, 21, NULL, '2024-12-19 00:22:32', '2024-12-27 18:15:01'),
(20, 'nguoisudungthu15@gmail.com', '$2y$12$Ut0DBHcHPvTBXSdhXkz2uOrRq1Xn3c85a0YqxL5Blx2XsaPraDaHS', 2, 23, NULL, '2024-12-19 00:25:18', '2024-12-19 01:05:28'),
(21, 'nguoisudungthu14@gmail.com', '$2y$12$Aq5KxIFMGOCysQuBblhgpeg50uqZjAEyNnZNtGgVY/c8CwbUJAoo6', 2, 24, NULL, '2024-12-19 00:27:02', '2024-12-19 00:27:37'),
(23, 'nguyenbuiquoclam052003@gmail.com', '$2y$12$b3uAeuVpkWTrabXefQwxtOdrGwv4fu/yL.ZiBGlefVG2LAWUN5L4i', 2, 26, NULL, '2024-12-26 01:35:14', '2024-12-26 01:35:52'),
(25, 'riotgame05122003@gmail.com', '$2y$12$Gu42jWiOVXVwBPz7ZlcBEuPeG1fyphpq02dQ7Oi4UJ/7n8Msga0g2', 2, 29, NULL, '2025-01-01 23:36:38', '2025-01-01 23:36:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `enterprise_info`
--

CREATE TABLE `enterprise_info` (
  `id` int NOT NULL,
  `id_repre` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tax_code` bigint NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `landline` int NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `enterprise_info`
--

INSERT INTO `enterprise_info` (`id`, `id_repre`, `name`, `tax_code`, `address`, `landline`, `email`, `create_at`, `update_at`) VALUES
(15, 21, 'CÔNG TY TNHH ĐẦU TƯ DU LỊCH KỲ NGHỈ VIỆT', 110200555, 'Số 27, Phố Bát Đàn, Phường Hàng Bồ, Quận Hoàn Kiếm, Thành phố Hà Nội, Việt Nam', 236987542, 'quang.nvm.574@gmail.com', '2024-12-18 21:28:51', '2024-12-18 21:28:51'),
(16, 22, 'CÔNG TY DÃ NGOẠI LỬA VIỆT', 301659981, 'số 35-37 Tràng Thi, Phường Trần Hưng Đạo, Quận Hoàn Kiếm, Thành phố Hà Nội', 369541256, 'quang.nvm.0205@gmail.com', '2024-12-19 00:12:21', '2024-12-19 00:12:21'),
(17, 23, 'CÔNG TY TNHH DỊCH VỤ DU LỊCH NAM SÀI GÒN', 310368153, '219 Võ Văn Tần, Phuờng 05, Quận 3, Thành phố Hồ Chí Minh, Việt Nam', 596418236, 'nguoisudungthu20@gmail.com', '2024-12-19 00:15:31', '2024-12-19 00:15:31'),
(18, 24, 'CÔNG TY TNHH THƯƠNG MẠI VÀ DỊCH VỤ DU LỊCH TƯ TÙNG', 310654517, 'Số 9Y, Đường Tô Hiệu, Phường Tân Thới Hoà, Quận Tân Phú, Thành phố Hồ Chí Minh', 526957159, 'nguoisudungthu19@gmail.com', '2024-12-19 00:17:16', '2024-12-19 00:17:16'),
(19, 25, 'CÔNG TY TNHH DỊCH VỤ DU LỊCH PHÚ SĨ', 311186163, '28B Tự Do, Phường Tân Sơn Nhì, Quận Tân Phú, Thành phố Hồ Chí Minh', 289562147, 'nguoisudungthu18@gmail.com', '2024-12-19 00:18:45', '2024-12-19 00:18:45'),
(20, 26, 'CÔNG TY TNHH MỘT THÀNH VIÊN DỊCH VỤ DU LỊCH VÀ TƯ VẤN THÙY VÂN', 311501859, 'Tòa nhà Indochina Park Tower, Số 4 Nguyễn Đình Chiểu, Phường Đa Kao, Quận 1, Thành phố Hồ Chí Minh, Việt Nam', 358954156, 'nguoisudungthu17@gmail.com', '2024-12-19 00:20:58', '2024-12-19 00:20:58'),
(21, 27, 'CÔNG TY CỔ PHẦN DỊCH VỤ DU LỊCH VÀ TRUYỀN THÔNG ISVN20', 102633918, '50B- Nguyễn Du, Phường Thạch Thang, Quận Hải Châu, Thành phố Đà Nẵng', 698417529, 'nguoisudungthu16@gmail.com', '2024-12-19 00:22:32', '2024-12-19 00:22:32'),
(22, 28, 'CÔNG TY TNHH THƯƠNG MẠI VÀ DU LỊCH NEW SKY TOUR', 105034207, 'số 120, đường Biên Hòa, tổ 10, Phường Minh Khai, Thành phố Phủ Lý, Tỉnh Hà Nam', 639396412, 'nguoisudungthu16@gmail.com', '2024-12-19 00:24:04', '2024-12-19 00:24:04'),
(23, 29, 'CÔNG TY TNHH THƯƠNG MẠI VÀ DU LỊCH NEW SKY TOUR', 105034207, 'số 120, đường Biên Hòa, tổ 10, Phường Minh Khai, Thành phố Phủ Lý, Tỉnh Hà Nam', 697152972, 'nguoisudungthu15@gmail.com', '2024-12-19 00:25:18', '2024-12-19 00:25:18'),
(24, 30, 'CÔNG TY TNHH VIỆT LONG TRAVEL', 1101398283, 'Số 122, lộ 827, Phường 7, Thành phố Tân An, Tỉnh Long An', 896574152, 'nguoisudungthu14@gmail.com', '2024-12-19 00:27:01', '2024-12-19 00:27:01'),
(26, 32, 'CÔNG TY CỔ PHẦN PREMIER TRAVEL VIỆT NAM', 105768342, 'Số nhà 43B, ngõ 94, phố Ngọc Hà, Phường Đội Cấn, Quận Ba Đình, Thành phố Hà Nội', 962172596, 'nguyenbuiquoclam052003@gmail.com', '2024-12-26 01:35:13', '2024-12-26 01:35:13'),
(28, 34, 'công ty abc', 1231589634, 'Số nhà 43B, ngõ 94, phố Ngọc Hà, Phường Đội Cấn, Quận Ba Đình, Thành phố Hà Nội', 236987542, 'nguyenbuiquoclam052003@gmail.com', '2025-01-01 23:32:33', '2025-01-01 23:32:33'),
(29, 35, 'công ty du lịch mq', 1231589698, 'thành phố HCM', 236987542, 'riotgame05122003@gmail.com', '2025-01-01 23:36:38', '2025-01-01 23:36:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gender`
--

CREATE TABLE `gender` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gender`
--

INSERT INTO `gender` (`id`, `name`, `create_at`, `update_at`) VALUES
(1, 'Nam', '2024-05-21 03:09:19', '2024-05-21 03:09:19'),
(2, 'Nữ', '2024-05-21 03:09:19', '2024-05-21 03:09:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotel`
--

CREATE TABLE `hotel` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `star_rating` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hotel`
--

INSERT INTO `hotel` (`id`, `category_id`, `name`, `star_rating`, `deleted_at`, `create_at`, `update_at`) VALUES
(31, 4, 'MÂY TRẮNG VILLA', '4', NULL, '2024-12-18 23:11:45', '2024-12-18 23:11:45'),
(32, 4, 'Khách sạn DaLat Peach Valley', '4.5', NULL, '2024-12-18 23:12:09', '2024-12-18 23:12:09'),
(33, 5, 'Mường Hoa View Hotel', '3.5', NULL, '2024-12-18 23:13:28', '2024-12-18 23:13:28'),
(34, 5, 'Khách sạn Galerie d\'Ar', '4', NULL, '2024-12-18 23:14:05', '2024-12-18 23:14:05'),
(35, 6, 'Balcony Nha Trang Hotel', '3', NULL, '2024-12-18 23:14:58', '2024-12-18 23:14:58'),
(36, 6, 'Aqua Seaview', '3.5', NULL, '2024-12-18 23:15:17', '2024-12-18 23:15:17'),
(37, 7, 'La Belle Vie Boutique Hotel', '5', NULL, '2024-12-18 23:16:10', '2024-12-18 23:16:10'),
(38, 7, 'Gold Hotel Da Nang By Haviland', '4.5', NULL, '2024-12-18 23:16:30', '2024-12-18 23:16:30'),
(39, 8, 'The Watson Premium Halong Hotel', '3', NULL, '2024-12-18 23:17:34', '2024-12-18 23:17:34'),
(40, 8, 'Halong Lavender Hotel', '3.5', NULL, '2024-12-18 23:17:50', '2024-12-18 23:17:50'),
(41, 9, 'Annata Beach Hotel', '3', NULL, '2024-12-18 23:18:18', '2024-12-18 23:18:18'),
(42, 9, 'Aloha Hotel Vũng Tàu', '4', NULL, '2024-12-18 23:18:33', '2024-12-18 23:18:33'),
(43, 10, 'Grand Hyams Hotel - Quy Nhon Beach', '5', NULL, '2024-12-18 23:19:10', '2024-12-18 23:19:10'),
(44, 10, 'The Kila Boutique Hotel Quy Nhon', '4.5', NULL, '2024-12-18 23:19:25', '2024-12-18 23:19:25'),
(45, 11, 'Khách sạn  Mekong Mỹ Tho', '4.5', NULL, '2024-12-18 23:20:08', '2024-12-18 23:20:08'),
(46, 11, 'The World Hotel', '4', NULL, '2024-12-18 23:20:21', '2024-12-18 23:20:21'),
(47, 12, 'Khách sạn The Mystery', '3.5', NULL, '2024-12-18 23:20:48', '2024-12-18 23:20:48'),
(48, 12, 'Marina Bay Côn Đảo Hotel', '4', NULL, '2024-12-18 23:21:03', '2024-12-18 23:21:03'),
(49, 13, 'Highlands Hotel Cao Bằng', '4', NULL, '2024-12-18 23:21:52', '2024-12-18 23:21:52'),
(50, 13, 'Los Angeles Hotel', '5', NULL, '2024-12-18 23:22:08', '2024-12-18 23:22:08'),
(51, 14, 'The Luxe Hotel - Châu Đốc', '4.5', NULL, '2024-12-18 23:22:37', '2024-12-18 23:22:37'),
(52, 14, 'Hera Boutique Inn', '4', '2024-12-19 02:14:43', '2024-12-18 23:22:49', '2024-12-19 02:14:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotel_category`
--

CREATE TABLE `hotel_category` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hotel_category`
--

INSERT INTO `hotel_category` (`id`, `name`, `create_at`, `update_at`) VALUES
(4, 'Đà Lạt', '2024-12-18 23:11:23', '2024-12-18 23:11:23'),
(5, 'SaPa', '2024-12-18 23:13:08', '2024-12-18 23:13:08'),
(6, 'Nha Trang', '2024-12-18 23:14:33', '2024-12-18 23:14:33'),
(7, 'Đà Nẵng', '2024-12-18 23:15:31', '2024-12-18 23:15:31'),
(8, 'Hạ Long', '2024-12-18 23:16:41', '2024-12-18 23:16:41'),
(9, 'Vũng Tàu', '2024-12-18 23:18:03', '2024-12-18 23:18:03'),
(10, 'Quy Nhơn', '2024-12-18 23:18:53', '2024-12-18 23:18:53'),
(11, 'Mỹ Tho', '2024-12-18 23:19:42', '2024-12-18 23:19:42'),
(12, 'Côn Đảo', '2024-12-18 23:20:39', '2024-12-18 23:20:39'),
(13, 'Cao Bằng', '2024-12-18 23:21:16', '2024-12-18 23:21:16'),
(14, 'Châu Đốc', '2024-12-18 23:22:21', '2024-12-18 23:22:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `product_id`, `name`, `create_at`, `update_at`) VALUES
(225, 69, '9.jpg', '2024-12-18 23:35:47', '2024-12-18 23:35:47'),
(226, 69, '1.jpg', '2024-12-18 23:35:47', '2024-12-18 23:35:47'),
(227, 69, '2.jpg', '2024-12-18 23:35:47', '2024-12-18 23:35:47'),
(228, 69, '3.jpg', '2024-12-18 23:35:47', '2024-12-18 23:35:47'),
(229, 69, '4.jpg', '2024-12-18 23:35:47', '2024-12-18 23:35:47'),
(230, 70, 'sp (4).jpg', '2024-12-18 23:54:45', '2024-12-18 23:54:45'),
(231, 70, 'sp (1).jpg', '2024-12-18 23:54:45', '2024-12-18 23:54:45'),
(232, 70, 'sp (5).jpg', '2024-12-18 23:54:45', '2024-12-18 23:54:45'),
(233, 70, 'sp (6).jpg', '2024-12-18 23:54:45', '2024-12-18 23:54:45'),
(234, 71, 'nt (1).jpg', '2024-12-18 23:58:54', '2024-12-18 23:58:54'),
(235, 71, 'nt (3).jpg', '2024-12-18 23:58:54', '2024-12-18 23:58:54'),
(236, 71, 'nt (4).jpg', '2024-12-18 23:58:54', '2024-12-18 23:58:54'),
(237, 71, 'nt (5).jpg', '2024-12-18 23:58:54', '2024-12-18 23:58:54'),
(238, 72, 'dn (3).jpg', '2024-12-19 00:03:40', '2024-12-19 00:03:40'),
(239, 72, 'dn (6).jpg', '2024-12-19 00:03:40', '2024-12-19 00:03:40'),
(240, 72, 'dn (7).jpg', '2024-12-19 00:03:40', '2024-12-19 00:03:40'),
(241, 72, 'dn (8).jpg', '2024-12-19 00:03:40', '2024-12-19 00:03:40'),
(242, 73, 'hl (2).jpg', '2024-12-19 00:07:02', '2024-12-19 00:07:02'),
(243, 73, 'hl (1).jpg', '2024-12-19 00:07:02', '2024-12-19 00:07:02'),
(244, 73, 'hl (3).jpg', '2024-12-19 00:07:02', '2024-12-19 00:07:02'),
(245, 73, 'hl (4).jpg', '2024-12-19 00:07:02', '2024-12-19 00:07:02'),
(246, 73, 'hl (7).jpg', '2024-12-19 00:07:02', '2024-12-19 00:07:02'),
(247, 74, 'vt (2).jpg', '2024-12-19 00:43:57', '2024-12-19 00:43:57'),
(248, 74, 'vt (3).jpg', '2024-12-19 00:43:57', '2024-12-19 00:43:57'),
(249, 74, 'vt (4).jpg', '2024-12-19 00:43:57', '2024-12-19 00:43:57'),
(250, 74, 'vt (5).jpg', '2024-12-19 00:43:57', '2024-12-19 00:43:57'),
(251, 75, 'qn (2).jpg', '2024-12-19 00:47:43', '2024-12-19 00:47:43'),
(252, 75, 'qn (8).jpg', '2024-12-19 00:47:43', '2024-12-19 00:47:43'),
(253, 75, 'qn (5).jpg', '2024-12-19 00:47:43', '2024-12-19 00:47:43'),
(254, 75, 'qn (6).jpg', '2024-12-19 00:47:43', '2024-12-19 00:47:43'),
(255, 75, 'qn (7).jpg', '2024-12-19 00:47:43', '2024-12-19 00:47:43'),
(256, 76, 'mt (3).jpg', '2024-12-19 00:51:41', '2024-12-19 00:51:41'),
(257, 76, 'mt (2).jpg', '2024-12-19 00:51:41', '2024-12-19 00:51:41'),
(258, 76, 'mt (6).jpg', '2024-12-19 00:51:41', '2024-12-19 00:51:41'),
(259, 77, 'cđ (1).jpg', '2024-12-19 00:54:33', '2024-12-19 00:54:33'),
(260, 77, 'cđ (4).jpg', '2024-12-19 00:54:33', '2024-12-19 00:54:33'),
(261, 77, 'cđ (5).jpg', '2024-12-19 00:54:33', '2024-12-19 00:54:33'),
(262, 77, 'cđ (6).jpg', '2024-12-19 00:54:33', '2024-12-19 00:54:33'),
(263, 78, 'chđ (4).jpg', '2024-12-19 00:57:45', '2024-12-19 00:57:45'),
(264, 78, 'chđ (5).jpg', '2024-12-19 00:57:45', '2024-12-19 00:57:45'),
(265, 78, 'chđ (6).jpg', '2024-12-19 00:57:45', '2024-12-19 00:57:45'),
(266, 78, 'chđ (7).jpg', '2024-12-19 00:57:45', '2024-12-19 00:57:45'),
(267, 79, 'nt (4).jpg', '2024-12-19 01:10:55', '2024-12-19 01:10:55'),
(268, 79, 'nt (6).jpg', '2024-12-19 01:10:55', '2024-12-19 01:10:55'),
(269, 79, 'nt (7).jpg', '2024-12-19 01:10:55', '2024-12-19 01:10:55'),
(270, 79, 'nt (8).jpg', '2024-12-19 01:10:55', '2024-12-19 01:10:55'),
(271, 80, 'dn (6).jpg', '2024-12-19 01:14:26', '2024-12-19 01:14:26'),
(272, 80, 'dn (2).jpg', '2024-12-19 01:14:26', '2024-12-19 01:14:26'),
(273, 80, 'dn (4).jpg', '2024-12-19 01:14:26', '2024-12-19 01:14:26'),
(274, 80, 'dn (8).jpg', '2024-12-19 01:14:26', '2024-12-19 01:14:26'),
(275, 81, 'qn (8).jpg', '2024-12-19 01:17:57', '2024-12-19 01:17:57'),
(276, 81, 'qn (4).jpg', '2024-12-19 01:17:57', '2024-12-19 01:17:57'),
(277, 81, 'qn (5).jpg', '2024-12-19 01:17:57', '2024-12-19 01:17:57'),
(278, 81, 'qn (7).jpg', '2024-12-19 01:17:57', '2024-12-19 01:17:57'),
(279, 81, 'qn (3).jpg', '2024-12-19 01:17:57', '2024-12-19 01:17:57'),
(280, 82, 'cb (2).jpg', '2024-12-19 01:22:01', '2024-12-19 01:22:01'),
(281, 82, 'cb (3).jpg', '2024-12-19 01:22:01', '2024-12-19 01:22:01'),
(282, 82, 'cb (4).jpg', '2024-12-19 01:22:01', '2024-12-19 01:22:01'),
(283, 82, 'cb (5).jpg', '2024-12-19 01:22:01', '2024-12-19 01:22:01'),
(284, 82, 'cb (6).jpg', '2024-12-19 01:22:01', '2024-12-19 01:22:01'),
(285, 82, 'cb (7).jpg', '2024-12-19 01:22:02', '2024-12-19 01:22:02'),
(286, 82, 'cb (8).jpg', '2024-12-19 01:22:02', '2024-12-19 01:22:02'),
(287, 83, 'dl (7).jpg', '2024-12-19 01:25:08', '2024-12-19 01:25:08'),
(288, 83, 'dl (2).jpg', '2024-12-19 01:25:08', '2024-12-19 01:25:08'),
(289, 83, 'dl (6).jpg', '2024-12-19 01:25:08', '2024-12-19 01:25:08'),
(290, 83, 'dl (9).jpg', '2024-12-19 01:25:08', '2024-12-19 01:25:08'),
(291, 84, '324408018_5897015660385846_5423058383310973113_n.jpg', '2024-12-25 22:47:40', '2024-12-25 22:47:40'),
(292, 84, '327291045_746025583620403_7893712353454467498_n.png', '2024-12-25 22:47:40', '2024-12-25 22:47:40'),
(293, 84, '339582385_765565825095252_4287339178575951158_n.jpg', '2024-12-25 22:47:40', '2024-12-25 22:47:40'),
(294, 84, '342496291_1084807849713322_5252044656100865228_n.jpg', '2024-12-25 22:47:40', '2024-12-25 22:47:40'),
(295, 85, 'sapa (1).jpg', '2024-12-26 01:40:24', '2024-12-26 01:40:24'),
(296, 85, 'sapa (5).jpg', '2024-12-26 01:40:24', '2024-12-26 01:40:24'),
(297, 85, 'sapa (2).jpg', '2024-12-26 01:40:24', '2024-12-26 01:40:24'),
(298, 85, 'sapa (3).jpg', '2024-12-26 01:40:24', '2024-12-26 01:40:24'),
(299, 85, 'sapa (4).jpg', '2024-12-26 01:40:24', '2024-12-26 01:40:24'),
(300, 86, 'Screenshot (55).png', '2025-01-01 23:42:55', '2025-01-01 23:42:55'),
(301, 86, 'Screenshot 2024-12-04 064250 - Copy.png', '2025-01-01 23:42:55', '2025-01-01 23:42:55'),
(302, 86, 'Screenshot 2024-12-04 084221.png', '2025-01-01 23:42:55', '2025-01-01 23:42:55'),
(303, 86, 'Screenshot 2024-12-04 084234.png', '2025-01-01 23:42:55', '2025-01-01 23:42:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_15_075318_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int UNSIGNED NOT NULL,
  `payment_method_id` int NOT NULL,
  `booking_date` date NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `status_id` int NOT NULL,
  `tourGuide_id` int DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `payment_method_id`, `booking_date`, `total_price`, `status_id`, `tourGuide_id`, `create_at`, `update_at`) VALUES
(21, 2, '2024-12-25', 6000000, 2, 30, '2024-12-25 04:39:48', '2024-12-25 21:12:28'),
(22, 1, '2024-12-26', 4900000, 1, NULL, '2024-12-25 23:38:23', '2024-12-25 23:38:23'),
(23, 2, '2024-12-26', 10900000, 1, NULL, '2024-12-25 23:39:23', '2024-12-25 23:39:23'),
(24, 1, '2024-12-26', 4399000, 2, 28, '2024-12-25 23:55:28', '2024-12-25 23:55:48'),
(25, 1, '2024-12-26', 8000000, 2, 31, '2024-12-26 00:31:30', '2024-12-26 00:31:45'),
(26, 2, '2024-12-26', 29997000, 2, 32, '2024-12-26 01:45:53', '2024-12-26 01:47:03'),
(27, 1, '2024-12-28', 15000000, 2, 31, '2024-12-27 18:20:27', '2024-12-27 18:20:43'),
(28, 2, '2025-01-02', 13197000, 2, 31, '2025-01-01 23:52:57', '2025-01-01 23:53:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `tour_id` int NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `customer_id`, `tour_id`, `create_at`, `update_at`) VALUES
(21, 21, 38, 80, '2024-12-25 04:39:48', '2024-12-25 04:39:48'),
(22, 22, 43, 76, '2024-12-25 23:38:23', '2024-12-25 23:38:23'),
(23, 23, 44, 75, '2024-12-25 23:39:23', '2024-12-25 23:39:23'),
(24, 24, 45, 69, '2024-12-25 23:55:28', '2024-12-25 23:55:28'),
(25, 25, 46, 72, '2024-12-26 00:31:30', '2024-12-26 00:31:30'),
(26, 26, 47, 85, '2024-12-26 01:45:53', '2024-12-26 01:45:53'),
(27, 27, 48, 70, '2024-12-27 18:20:27', '2024-12-27 18:20:27'),
(28, 28, 49, 69, '2025-01-01 23:52:57', '2025-01-01 23:52:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int UNSIGNED NOT NULL,
  `method` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_method`
--

INSERT INTO `payment_method` (`id`, `method`, `create_at`, `update_at`) VALUES
(1, 'Thanh Toán Trực Tuyến', NULL, NULL),
(2, 'Thanh Toán Trực Tiếp', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `representative`
--

CREATE TABLE `representative` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `representative`
--

INSERT INTO `representative` (`id`, `name`, `position`, `phone_number`, `email`, `create_at`, `update_at`) VALUES
(21, 'TRƯƠNG ANH BẢY', 'COO', 352478060, 'anhbaytruong@gmail.com', '2024-12-18 21:28:51', '2024-12-18 21:28:51'),
(22, 'NGUYỄN THỊ KIM KHÁNH', 'CMO', 976208355, 'kimkhanh@gmail.com', '2024-12-19 00:12:21', '2024-12-19 00:12:21'),
(23, 'HOÀNG MẠNH DŨNG', 'COO', 157964218, 'manhdung@gmail.com', '2024-12-19 00:15:31', '2024-12-19 00:15:31'),
(24, 'LÝ THỊ CẨM', 'Quản lý', 369841259, 'thicam@gmail.com', '2024-12-19 00:17:16', '2024-12-19 00:17:16'),
(25, 'PHẠM THÀNH ĐƯỢC', 'CFO', 129741258, 'thanhduoc@gmail.com', '2024-12-19 00:18:45', '2024-12-19 00:18:45'),
(26, 'Nguyễn Thị Vân Thùy', 'CLO', 968415286, 'vanthuy@gmail.com', '2024-12-19 00:20:58', '2024-12-19 00:20:58'),
(27, 'NGUYỄN CẢNH NHƠN', 'CEO', 321785963, 'canhnhon@gmail.com', '2024-12-19 00:22:32', '2024-12-19 00:22:32'),
(28, 'DƯƠNG HỒNG NHUNG', 'CMO', 397148526, 'hongnhung@gmail.com', '2024-12-19 00:24:04', '2024-12-19 00:24:04'),
(29, 'DƯƠNG HỒNG NHUNG', 'CMO', 967178952, 'hongnhung@gmail.com', '2024-12-19 00:25:18', '2024-12-19 00:25:18'),
(30, 'NGUYỄN QUỐC CƯỜNG', 'CCO', 397145896, 'quoccuong@gmail.com', '2024-12-19 00:27:01', '2024-12-19 00:27:01'),
(31, 'NGUYỄN THỊ KIM OANH', 'COO', 674128963, 'kimoanh@gmail.com', '2024-12-26 01:28:22', '2024-12-26 01:28:22'),
(32, 'NGUYỄN THỊ KIM OANH', 'COO', 674128963, 'kimoanh@gmail.com', '2024-12-26 01:35:13', '2024-12-26 01:35:13'),
(33, 'nguyễn văn a', 'COO', 793016997, 'anhbaytruong@gmail.com', '2024-12-26 02:21:49', '2024-12-26 02:21:49'),
(34, 'nguyễn văn a', 'IT', 793016997, 'anhbaytruong@gmail.com', '2025-01-01 23:32:33', '2025-01-01 23:32:33'),
(35, 'Nguyễn Tuấn Vũ', 'COO', 793016997, 'tuanvu@gmail.com', '2025-01-01 23:36:38', '2025-01-01 23:36:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedule`
--

CREATE TABLE `schedule` (
  `id` int NOT NULL,
  `title1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title4` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title5` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title6` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title7` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `day1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `day2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `day3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `day4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `day5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `day6` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `day7` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `schedule`
--

INSERT INTO `schedule` (`id`, `title1`, `title2`, `title3`, `title4`, `title5`, `title6`, `title7`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `create_at`, `update_at`) VALUES
(6, 'NGÀY 1 |TP.HCM – THIỀN VIỆN TRÚC LÂM - ĐÀ LẠT', 'NGÀY 2 |ĐỒI CHÈ CẦU ĐẤT – ĐÀ LẠT VIEW', 'NGÀY 3 |ĐÀ LẠT – TP.HCM', NULL, NULL, NULL, NULL, 'Sáng:  Xe và Hướng Dẫn Viên đón Quý khách tại điểm hẹn khởi hành đi Đà Lạt. \r\n•	Đoàn dùng bữa sáng tại Ngã Ba Dầu Dây. Đoàn tiếp tục khởi hành đến TP. Đà Lạt.\r\nTrưa:  Dùng cơm trưa tại nhà hàng.\r\n•	Tham quan Thiền Viện Trúc Lâm, đi cáp treo qua đồi Rôbin (chi phí tự túc), ngắm cảnh rừng thông, hồ Tuyền Lâm, núi Phượng Hoàng từ trên cao.\r\nTối:    Dùng cơm tối, nhận phòng nghỉ ngơi\r\n•	Quý khách tự túc dạo thành phố Đà Lạt về đêm, ngắm cảnh Hồ Xuân Hương, thưởng thức hương vị cà phê phố núi (chi phí tự túc). Nghỉ đêm khách sạn tại Đà Lạt.', 'Sáng: Dùng bữa sáng.\r\n   Tham quan Đồi Chè Cầu Đất (Cầu Đất Farm) với độ cao trên 1.650 m so với mặt nước biển nên khi hậu mát mẻ, khung cảnh vừa yên bình vừa hung vĩ với bạt ngàn đồi chè hiện ngay trước mắt. Diện tích rộng trên 220 ha, đồi chè Cầu Đất được đánh giá là địa điểm check-in hoành tráng và chất hàng đầu tại Đà Lạt, với điểm nhấn là những chiếc “tua bin điện gió” trắng mới toanh hòa mình vào thảm trà xanh tươi tắn.\r\n   Dừng chân tại Phindeli Cầu Đất Farm, điểm check-in view điện gió – đồi trà, nổi bật với những toa tàu đỏ mang những nét cổ điển hoặc nhâm nhi một ly cà phê, thưởng ngoạn cảnh ngọn đồi xanh mát. (chi phí tự túc)\r\n	Viếng thăm chùa Linh Phước (Chùa Ve Chai) là một công trình kiến trúc khảm sành đặc sắc của thành phố Đà Lạt với hình ảnh con rồng dài 49 m được làm bằng 12.000 vỏ chai bia.\r\nTrưa: Dùng bữa trưa.\r\n•	Tham quan nhà thờ Don Bosco với nét kiến trúc đậm chất Châu Âu cổ điển, dễ thấy nhất là những cột trụ khổng lồ, dãy hành lang trải dài, đường nét trạm khắc tinh xảo, mái chóp nhọn,…\r\n•	Ga Đà Lạt, nhà ga cổ nhất Đông Dương còn sót lại ở Việt Nam. Quý khách tự do chiêm ngưỡng những đầu máy xe lửa cổ cùng những kiến trúc độc đáo đến từ thập niên 90.\r\n•	Quảng trường Lâm Viên với tuyệt tác kiến trúc bằng kính: Bông Hoa Dã Quỳ và Nụ Hoa Atiso. \r\nTối: Dùng cơm tối. \r\n•	Tự do dạo phố núi, và mua sắm đặc sản tại chợ đêm Đà Lạt. Nghỉ đêm tại Đà Lạt.', 'Sáng: Dùng bữa sáng, trả phòng.\r\n•	Khởi hành đến Mê Linh coffee Garden, một không gian được thiết kế mở. Quý khách có thể vừa thưởng thức hương vị cà phê chồn đặc trưng (chi phí tự túc), vừa có một tầm nhìn trọn vẹn về cảnh sắc Đà Lạt 360 độ.\r\nTrưa: Khởi hành về TP.HCM, đến Bảo Lộc dùng cơm trưa.', NULL, NULL, NULL, NULL, '2024-12-19 07:00:09', '2024-12-19 07:00:09'),
(7, 'NGÀY 1 |TP.HCM – HÀ NỘI – CÁT CÁT – SAPA', 'NGÀY 2 |SAPA – FANSIPAN', 'NGÀY 3 |LÀO CAI – HÀ NỘI – TP.HCM', NULL, NULL, NULL, NULL, 'Sáng: Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất hai tiếng.\r\n•	Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý Khách làm thủ tục đón chuyến bay đi Hà Nội. Đến sân bay Nội Bài, Hướng dẫn viên đón đoàn khởi hành đến Lào Cai trên con đường cao tốc dài nhất Việt Nam - mạch nối liền giữa Hà Nội và các tỉnh Tây Bắc.\r\nTrưa: Dùng bữa trưa.\r\n•	Đoàn tiếp tục đến thị trấn vùng cao Sapa, tận hưởng cảnh sắc núi rừng như tranh vẽ và khám phá cuộc sống của đồng bào dân tộc ít người miền Tây Bắc.\r\n•	Thăm bản Cát Cát, tìm hiểu nghề dệt nhuộm của dân tộc H’Mông và trạm thủy điện Cát Cát thời Pháp – nơi có 3 dòng nước hợp nhau thành dòng suối Mường Hoa.\r\nChiều: Dùng bữa chiều. Nghỉ đêm tại Sapa.\r\n•	Quý khách có thể dạo phố đêm Sapa, tham dự đêm chợ Tình (nếu đi vào tối thứ 7).', 'Sáng: Dùng buffet sáng tại khách sạn.\r\n•	Đoàn khởi hành tham quan chinh phục Fansipan, ngọn núi cao nhất Việt Nam (3.143 m) thuộc dãy núi Hoàng Liên Sơn, cách thị trấn Sa Pa khoảng 9 km về phía tây nam. Du khách chinh phục \"Nóc nhà Đông Dương\" với hệ thống cáp treo Fansipan Sa Pa dài 6,2km đạt 2 kỷ lục Guinness thế giới: Cáp treo ba dây có độ chênh giữa ga đi và ga đến lớn nhất thế giới: 1410m và Cáp treo ba dây dài nhất thế giới: 6292.5m. Từ tuyến cáp treo, du khách có thể cảm nhận được thiên nhiên hùng vĩ, chiêm ngưỡng khung cảnh thung lũng Mường Hoa và rừng quốc gia Hoàng Liên từ trên cao. Ngoài ra, du khách còn có thể đến hành hương tại Khu du lịch tâm linh – Chùa Trình, Chùa Hạ tại ga đến (chi phí cáp treo tự túc).\r\n•	Trưa: Dùng bữa trưa.\r\n•	Quý khách tự do dạo phố, tham quan nhà thờ đá Sapa, \r\nChiều: Dùng bữa chiều. Nghỉ đêm tại Sapa.\r\n•	Đoàn tự do dạo phố đêm Sapa, thưởng thức đặc sản vùng cao như: thịt lợn cắp nách nướng, trứng nướng, rượu táo mèo, giao lưu với người dân tộc vùng cao…', 'Sáng: Dùng buffet sáng tại khách sạn.\r\n•	Quý khách tự do nghỉ ngơi tại khách sạn.\r\n•	Đoàn trở về Lào Cai, mua sắm đặc sản tại chợ Cốc Lếu.\r\nTrưa: Dùng bữa trưa.\r\n•	Đoàn khởi hành về Hà Nội.\r\n•	Hướng dẫn viên tiễn đoàn ra sân bay Nội Bài đón chuyến bay về  TP.HCM.\r\n•	Kết thúc chương trình tham quan, chia tay và hẹn gặp lại.', NULL, NULL, NULL, NULL, '2024-12-19 07:00:30', '2024-12-19 07:00:30'),
(8, 'NGÀY 1 | TP.HCM – NHA TRANG - DU THUYỀN 5 SAO EMPERO', 'NGÀY 2 | NHA TRANG – VINWONDERS/ BÙN KHOÁNG NÓNG', 'NGÀY 3 | NHA TRANG – NINH CHỮ – TP.HCM', NULL, NULL, NULL, NULL, 'Sáng: Xe và Hướng Dẫn Viên Du Lịch Việt đón Quý khách tại điểm hẹn.\r\n- 05h30 Sáng tại Công Ty Du Lịch Việt – Số 217 Bis Nguyễn Thị Minh Khai, Quận 1. \r\n- 06h00 Nhà Văn Hóa Thanh Niên – Số 4 Phạm Ngọc Thạch, Quận 1 \r\n- 07h00 Ngã 4 Thủ Đức – Xa Lộ Hà Nội, TP Hồ Chí Minh (không có điểm gửi xe máy)\r\n– Ngã 4 Amata – Biên Hòa, Đồng Nai\r\nKhởi hành đi Nha Trang. Dùng bữa sáng tại ngã ba Dầu Giây.\r\nĐoàn tiếp tục lộ trình đến Phan Thiết.\r\nHành trình trên quốc lộ 1A, khi đến đoạn giáp ranh Bình Thuận - Ninh Thuận, Quý khách chiêm ngưỡng cảnh đẹp mê hồn của biển Cà Nà với làn nước trong xanh, những bãi cát trải dài quanh co uốn lượn.\r\nTrưa: Dùng cơm trưa\r\nĐoàn đến Nha Trang nhận phòng nghỉ ngơi.\r\nĐoàn dùng bữa tối với tiệc cocktail trên du thuyền 5 sao và ngắm mặt trời lặn: \r\n15:15 - 16:00 Xe của du thuyền đón khách tại khách sạn trong trung tâm thành phố và đưa tới cảng Vĩnh Trường (Bến Tàu du lịch Nha Trang – Mới)\r\n16:10 - 16:15 Nhân viên Emperor sẽ đón quý khách tại Cảng Vĩnh Trường, quý khách sẽ trung chuyển bằng tàu nhỏ sang tàu lớn Emperor và bắt đầu chuyến du ngoạn với du thuyền Emperor Cruises. \r\n16:15 - 18:00 Quý khách lên tàu với sự chào đón của giám đốc trải nghiệm và đội ngũ nhân viên cùng với một ly cocktail tuyệt ngon và mát lạnh. Sau đó giám đốc trải nghiệm sẽ giới thiệu về Vịnh Nha Trang, về hành trình, về văn hóa, ẩm thực, về những chỉ dẫn an toàn, và về tàu hoàng đế. Tàu bắt đầu di chuyển và quý khách sẽ được ngắm phong cảnh tuyệt vời của Vịnh Nha Trang vào lúc mặt trời lặn.\r\n18:00 - 19:30 Khám phá vịnh Nha Trang vào ban đêm với cocktails và các loại rượu ngon, các loại đồ uống không hạn chế và và nghệ sỹ ghita và vĩ cầm chơi những bản nhạc du dương trong một khung cảnh lãng mạn dưới trời sao, ánh trăng và ánh đèn rực rỡ của thành phố. Trải nghiệm cảm giác dễ chịu khi thưởng thức bữa tối thịnh soạn với âm nhạc và sự phục vụ ân cần của đội ngũ nhân viên Emperor Cruises.\r\nMiễn phí không giới hạn các đồ uống trên tàu:\r\n•	Đồ uống có cồn: Bia các loại (Heniken, tiger…), Rượu mạnh (Vodka, Whisky, Tequila, Rum…), Rượu vang (Pháp, Ý, Chile), Cocktail vs Mocktail các loại\r\n•	Đồ uống không cồn: Nước trái cây các loại, đồ uống có ga, trà, café, nước suối\r\n•	Tiệc canape 7 món trên boong tàu trong quá trình ngắm hoàng hôn\r\n•	Bữa tối thịnh soạn 6 món, món chính với lựa chọn Bò Úc/ Tôm Hùm/ Cá Hồi.\r\n20:00 Kết thúc bữa tối lãng mạn và tiếp tục thưởng thức các loại đồ uống, cocktails ở phòng chờ hoặc trên boong tàu trước khi tàu di chuyển quay trở về cảng và xe ô tô sẽ đưa quý khách về khách sạn.. \r\nTối: Tự do dạo biển, nghỉ đêm khách sạn tại Nha Trang.', 'Sáng: Dùng bữa sáng. \r\n•	Tháp Bà Ponagar: một công trình có quy mô lớn nhất và có vai trò quan trọng trong lịch sử nghệ thuật kiến trúc tôn giáo Chăm.\r\n•	Đoàn tham quan Mô hình nuôi chim yến, Quý khách sẽ được tận mắt chứng kiến quy trình nuôi, thu hoạch và chế biến tổ yến. Quý khách sẽ thưởng thức trà yến miễn phí \r\nTrưa: Dùng cơm trưa.\r\nQuý khách có thể tự do chọn một trong hai lựa chọn sau:\r\n•	Lựa chọn 1: KDL Suối Khoáng Nha Trang I.resort – Massage cơ thể với hệ thống thủy lưc zaccuzi, ngâm mình trong Hồ Khoáng Nóng, Tắm Bùn… (chi phí tự túc).\r\n•	Lựa chọn 2:  Quý khách khởi hành tham quan Vinpearl Harbour, tại đây du khách có thể tham gia vào những sự kiện, lễ hội Quốc tế bùng nổ suốt ngày đêm với sự xuất hiện của nhiều siêu sao thế giới và Việt Nam.\r\n•	Lựa chọn 3: Quý khách khởi hành tham quan Vinwonders (chi phí tự túc).\r\n•	Trò chơi ngoài trời: đu quay cảm giác mạnh, đu quay dây văng, đu quay thú nhún, đu quay con voi, tàu lượn siêu tốc, đu quay vòng xoay, xe đạp bay, tàu hải tặc, thành phố vui nhộn, thú nhún, xiếc thú (3 xuất/ngày).\r\n•	Trò chơi trong nhà: phim bốn chiều, xe đụng, vườn cổ tích, thiên đường trẻ em, siêu thị game, phòng karaoke…\r\n•	Khu thuỷ cung Vinpearlland với diện tích trên 3,400m2, là đại dương thu nhỏ với hơn 300 loài cá đẹp, quý hiếm và lạ mắt.\r\n•	Khu công viên nước với các trò chơi cảm giác mạnh: khu trò chơi mạo hiểm, khu trò chơi dành cho trẻ em, hồ tạo sóng, dòng sông lười, khu trò chơi gia đình mạo hiểm…\r\nTối: Quý khách TỰ TÚC ĂN TỐI.\r\nNghỉ đêm tại Nha Trang. Quý khách tự do dạo phố, chợ đêm hoặc thưởng thức Hải sản tại Khu Tháp Bà (chi phí tự túc).', 'Sáng: Dùng bữa sáng. \r\n•	Đoàn làm thủ tục trả phòng khởi hành về Ninh Chữ. \r\n•	Đoàn đến Đồng Cừu dạo bước đến đồng cừu bạn sẽ có cảm giác như lạc vào nông trại cừu cổ tích ở Châu Âu. Không gian đồng cừu trải rộng mênh mông, bạt ngàn với màu xanh tươi mới của cỏ cây và trên nền xanh ấy điểm xuyến nhiều chấm trắng nhỏ xinh của những chú cừu thân thiện. \r\n•	Quý khách tham quan Vườn Nho tại Phan Rang. Đoàn thoải mái chụp ảnh và check – in tại vườn nho. Trải nghiệm hái nho tại vườn chọn những quả nho ngon về làm quà cho ngườithân, quý khách tự do mua sắm đặc sản tại Phan Rang\r\nTrưa: Dùng cơm trưa. \r\n•	Đoàn khởi hành về Sài Gòn. \r\n•	Về đến TP.HCM – Chia tay và hẹn gặp lại Quý khách.', NULL, NULL, NULL, NULL, '2024-12-18 23:58:54', '2024-12-18 23:58:54'),
(9, 'NGÀY 1 | TP.HCM – NGŨ HÀNH SƠN – HỘI AN', 'NGÀY 2 | ĐÀ NẴNG – BÀ NÀ', 'NGÀY 3 | ĐÀ NẴNG – BÁN ĐẢO SƠN TRÀ - TP.HCM', NULL, NULL, NULL, NULL, 'Sáng: Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất hai tiếng .\r\n•	Đại diện công ty đón và hỗ trợ Quý Khách làm thủ tục đón chuyến bay đi Đà Nẵng.\r\n•	Đến sân bay Đà Nẵng, Hướng dẫn viên đón đoàn tham khởi hành tham quan Ngũ Hành Sơn - đỉnh Kim Sơn, với dáng núi trông như một quả chuông úp sấp. Đoàn ghé thăm Chùa Quan Thế Âm, động Quan Âm, Bảo tàng văn hóa Phật Giáo… ghé thăm và mua sắm quà lưu niệm tại làng nghề điêu khắc đá Non Nước.\r\nTrưa: Dùng bữa trưa tại nhà hàng.\r\n•	Tham quan Phố Cổ Hội An - di sản văn hoá thế giới với Chùa Cầu Nhật Bản, Hội Quán Phúc Kiến, Nhà Cổ Phùng Hưng...\r\nChiều: Dùng cơm chiều tại nhà hàng.\r\n•	Trải nghiệm Show diễn “Ký Ức Hội An”, chương trình văn hóa nghệ thuật ngoài trời độc đáo, với sự tổng hòa tinh tế của âm nhạc, thơ ca, ánh sáng, nghệ thuật trình diễn 3D, tạo hình, múa… Vở diễn là câu chuyện tái hiện lại những nét văn hóa đặc trưng của Hội An 400 năm lịch sử với cuộc sống thôn quê bình dị, tới những nét hoàng kim của một thương cảng sầm uất một thời. (chi phí tự túc). Đoàn trở về, nghỉ đêm tại Đà Nẵng', 'Sáng: Quý khách dùng bửa sáng tại khách sạn.\r\n•	Đoàn tham khởi hành đến với cao nguyên Bà Nà nơi có khí hậu Châu Âu độc đáo và nổi tiếng với tuyến cáp treo kỷ lục mới của thế giới - Ngắm toàn cảnh thành phố Đà Nẵng từ trên cáp treo (chi phí cáp treo tự túc). \r\n•	Quý khách tự do tham quan, vui chơi giải trí tại Bà Nà với Công Viên Fantasy, Rạp chiếu phim 3D Mega 360 độ với công nghệ hiện đại nhất và duy nhất có ở Viêt Nam, Hai rạp chiếu phim 4D và 5Di, Xe Trượt Ống, Hầm rượu, Vườn hoa tình yêu, Bảo Tàng Sáp, chụp hình tại Cầu Vàng điểm tham quan mới siêu hot tại Bà Nà.\r\n\r\nTrưa: Quý khách vui lòng tự túc bữa ăn trưa.\r\n•	Du khách có thể tìm thấy những biểu tượng mang tính tâm linh như chùa chiền, đền đài hay tượng các đức Phật. Chắc hẳn sẽ là điểm dừng chân cho những ai mong cầu bình an và sức khỏe cho gia đình: Chùa Linh Ứng, Đền Lĩnh Chúa Linh Từ, Tháp Linh Phong Tự, Tượng Thích Ca Mâu Ni, Lầu Chuông, Nhà Bia, Miếu Bà, Trú Vũ Trà Quán.\r\nChiều: Dùng cơm chiều tại nhà hàng.Nghỉ đêm tại Đà Nẵng.\r\nTối : Qúy khách tự do tham quan khám phá Đà Nẵng về đêm như cầu Sông Hàn, Cầu Rồng…', 'Sáng: Dùng buffet sáng tại khách sạn.\r\n•	Đoàn tự do tắm biển Mỹ Khê hoặc đi chợ mua sắm đặc sản về làm quà.\r\n•	Tham quan một vòng bán đảo Sơn Trà…viếng Linh Ứng Tự và thưởng ngoạn vẻ đẹp của biển Mỹ Khê (được đánh giá là một trong những bãi biển quyến rũ nhất hành tinh).\r\nTrưa:   Dùng cơm trưa.\r\n•	Hướng dẫn viên tiễn đoàn ra sân bay Đà Nẵng đón chuyến bay về  TP.HCM.\r\n•	Kết thúc chương trình tham quan, chia tay và hẹn gặp lại Quý khách', NULL, NULL, NULL, NULL, '2024-12-19 00:03:40', '2024-12-19 00:03:40'),
(10, 'NGÀY 1 | TP.HCM – HÀ NỘI – CHÙA TAM CHÚC', 'NGÀY 2 | TRÀNG AN – TUYỆT TÌNH CỐC – HANG MÚA', 'NGÀY 3 | HẠ LONG – TRẢI NGHIỆM BUFFET 5 SAO TRÊN VỊNH HẠ LONG', 'NGÀY 4 | HẠ LONG- YÊN TỬ – HÀ NỘI – HỒ CHÍ MINH', NULL, NULL, NULL, 'Sáng: Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay hai tiếng.\r\n•	Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý Khách làm thủ tục đáp chuyến bay đi Hà Nội. \r\n•	Đến sân bay Nội Bài, Hướng dẫn viên đón đoàn khởi hành đến HÀ NAM, Thăm quan Chùa Tam Chúc. \r\nTrưa: Dùng cơm trưa.\r\n•	Thăm Chùa Tam Chúc, ngôi chùa lớn nhất thế giới. Với diện tích quần thể lên tới 5.000 ha, được tạc 1.200 bức tượng bằng dung nham núi lửa và sở hữu nhiều báu vật trên thế giới.\r\n•	Quần thể Tam Chúc với cảnh quan hùng vĩ, phía trước, giữa lòng hồ là 6 quả núi với hình dạng quả chuông, phía sau là 7 ngọn núi có thể phát sáng khi có ánh trăng ban đêm tạo nên thế tiền lục nhạc, hậu thất tinh. \r\nTối: Dùng bữa tối. Nghỉ đêm tại Ninh Bình.\r\n•	Quý khách có thể tự do dạo phố, thưởng thức các món đặc sản Ninh Binh như thịt dê núi, ốc núi, nem Yên Mạc, cơm cháy, ...', 'Sáng: Dùng buffet sáng tại khách sạn. \r\n•	Đoàn xuôi thuyền đi dọc theo suối giữa cánh đồng lúa thăm Khu du lịch Tràng An nơi những dải đá vôi, thung lũng và những sông ngòi đan xen tạo nên một không gian huyền ảo, kỳ bí, quý khách đi đò thăm Hang sáng, Hang tối, Hang nấu rượu và tìm hiểu văn hóa lịch sử nơi đây.\r\nTrưa: Dùng cơm trưa. \r\n•	Quý khách đến Hang Múa – được mệnh danh là Vạn Lý Trường Thành thu nhỏ. Quý khách có thể chinh phục hơn 400 bậc đá để ngắm toàn bộ khung cảnh Tam Cốc (Một Hạ Long Trên Cạn) từ trên cao. Đây là điểm đến thu hút hàng trăm nghìn các bạn trẻ khắp nơi thường xuyên đến đây để chụp ảnh, check in…\r\n•	Khởi hành đến Hạ Long, \r\nTối: Dùng bữa tối. Nghỉ đêm tại Hạ Long.\r\n•	Quý khách tự do dạo phố, mua sắm tại chợ đêm hoặc tham gia khu Sunworld Hạ Long Park (chi phí tự túc).', 'Sáng: Dùng buffet sáng tại khách sạn. \r\n•	9: 00: Đoàn khởi hành tham quan Bảo Tàng Quảng Ninh . \r\n•	10:30: Đoàn di chuyển tới Cảng Quốc Tế Hạ Long và làm thủ tục checkin trên tàu.\r\n•	11:00: Đội ngũ nhân viên của du thuyền nồng hậu chào đón Quý khách lên tàu với màn Múa Lân Rồng đặc trưng của văn hóa VN. Du khách thưởng thức đồ uống chào mừng và nghe tóm tắt về lịch trình và các quy định an toàn trên du thuyền.Tàu khởi hành và đưa Quý khách khám phá những điểm đẹp nhất trên Vịnh Hạ Long như:\r\n•	Hòn Đầu Người là tác phẩm tự nhiên mọc lên từ nước biển, hoàn chỉnh với đầy đủ các chi tiết của một khuôn mặt. Du thuyền sẽ di chuyển chậm để khách hàng có thể chụp ảnh lưu giữ những khoảnh khắc đẹp tại nơi đây.\r\n•	12:00: Du khách thưởng thức bữa trưa Buffet cao cấp với những món ăn Hải sản tươi ngon đặc sắc của vùng biển Hạ Long cũng như các món ăn truyền thống của Việt Nam. (Nếu tàu chạy dưới 20 khách, Quý khách sẽ được phục vụ ăn trưa theo Set Menu)\r\n•	13:00: Hướng dẫn viên sẽ đưa Quý khách đến thăm quan hang Sửng Sốt - hang động đẹp và rộng nhất vịnh Hạ Long với vẻ đẹp huyền ảo, kỳ vĩ được tạo nên từ vô vàn khối thạch nhũ, măng đá lung linh hóa thân vào những hình thù kỳ lạ, độc đáo.\r\n•	14:00: Tại khu vực Hang Luồn, du khách có thể chèo kayak/thuyền nan - môn thể thao được yêu thích nhất của giới trẻ hoặc lựa chọn nghỉ lại trên tàu, vui chơi tự do và sử dụng bể sục Jacuzzi.\r\n•	15:00: Thăm đảo Titop là nơi bạn có thể bơi lội hay tắm nắng trên bãi cát trắng mịn hoặc bạn cũng có thể leo lên đỉnh Titov để ngắm toàn cảnh vịnh Hạ Long với hàng ngàn mỏm núi đã vôi nhô lên từ mặt nước xanh biếc.(Quý khách sẽ được phục vụ khăn tắm miễn phí của du thuyền)\r\n•	16:00: Du khách trở lại tàu để tham gia hai hoạt động Sunset Party. Du khách sẽ được tận hưởng những giây phút thư giãn nhâm nhi đồ uống cùng snack và trái cây tươi trên sundeck và thư giãn trong bể sục jacuzzi không gian thiên nhiên tuyệt vời và cùng ngắm hoàng hôn buông xuống thật dịu dàng và yên bình.\r\n•	17:30 -18:00 Tàu cập bến. Nhân viên chào tạm biệt Quý khách, kết thúc hải trình 7 tiếng tham quan trên vịnh.\r\nTối: Dùng bữa tối. Nghỉ đêm tại Hạ Long.\r\n•	Quý khách tự do dạo phố, mua sắm tại chợ đêm hoặc tham gia khu Sunworld Hạ Long Park (chi phí tự túc).', 'Sáng: Dùng buffet sáng tại khách sạn. \r\n•	Đoàn khởi hành đi  tham quan núi Yên Tử - ngọn núi cao 1068 m so với mực nước biển, một thắng cảnh thiên nhiên còn lưu giữ hệ thống các di tích lịch sử văn hóa gắn với sự ra đời, hình thành và phát triển của thiền phái Trúc Lâm Yên Tử, được mệnh danh là “đất tổ Phật giáo Việt Nam”.\r\n•	Quý khách lên núi bằng cáp treo (chi phí cáp treo tự túc), tham quan chùa Hoa Yên, Bảo Tháp, Trúc Lâm Tam Tổ, Hàng Tùng 700 tuổi…xuống núi tham quan Thiền Viện Trúc Lâm với quả cầu Như Ý nặng 6 tấn được xếp kỷ lục guiness Việt Nam.\r\nTrưa: Dùng bữa trưa. \r\n•	Đoàn trở về Hà Nội.\r\n•	Hướng dẫn viên tiễn đoàn ra sân bay Nội Bài đón chuyến bay về TP.HCM.\r\n•	Kết thúc chương trình tham quan, chia tay và hẹn gặp lại.', NULL, NULL, NULL, '2024-12-19 00:07:02', '2024-12-19 00:07:02'),
(11, 'Ngày 1 | TP.HCM – Vũng Tàu – Đồi Cừu Suối Nghệ – Tượng Chúa Kitô Vua', 'Ngày 2 | KDL Hồ Mây –  Bạch Dinh', 'Ngày 3: Đức Bãi Dâu – Chùa Đại Tòng Lâm – TP.HCM', NULL, NULL, NULL, NULL, '•	Xe và HDV của Bà Rịa Vũng Tàu Tourist đón quý khách tại những điểm đã hẹn trước, khởi hành đi Vũng tàu. Trên đường đi, HDV sẽ thuyết minh về những địa danh mà quý khách sẽ đi qua, tổ chức các trò chơi, hát hò trên xe…\r\n•	Đoàn dừng chân dừng điểm tâm sáng.\r\n•	Đoàn tham quan đồi cừu Suối Nghệ (đồi cừu Vũng Tàu). Tại đây quý khách có thể thoải mái vui chơi với những chú cừu siêu dễ thương và chụp những bức hình “sống ảo”.\r\n•	Xe đưa quý khách chinh phục tượng chúa Kitô Vua nằm trên đỉnh Núi Nhỏ. Từ đây có thể ngắm nhìn toàn cảnh thành phố Vũng tàu.\r\n•	Đoàn dùng cơm trưa tại nhà hàng. Sau đó về khách sạn nhận phòng nghỉ ngơi.\r\n•	Tiếp tục chương trình tour Vũng Tàu 3 ngày 2 đêm, quý khách sẽ tham quan Niết Bàn Tịnh Xá. Đây là ngôi chùa nằm bên triền Núi Nhỏ, được xem là một trog những ngôi chùa đẹp nhất Vũng Tàu.\r\n•	Đoàn tự do tắm biển trong làn nước trong xanh mát lạnh của biển Bãi Sau hoặc tổ chức các trò chơi teambuilding.\r\n•	Quý khách dùng bữa tối tại nhà hàng. Sau đó tự do khám phá thành phố biển Vũng Tàu về đêm.', ': KDL Hồ Mây –  Bạch Dinh\r\n•	Đoàn dùng điểm tâm sáng tại khách sạn.\r\n•	Xe và HDV đón quý khách tại khách sạn khởi hành đến với KDL Hồ Mây – điểm đến được mong chờ nhất trong tour Vũng Tàu 3 ngày 2 đêm.\r\n•	Quý khách lên cáp treo di chuyển đến với KDL Hồ Mây. Vừa đi vừa được ngắm cảnh biển trời bao la và thành phố Vũng Tàu từ trên cao.\r\n\r\n•	Đoàn bắt đầu tham quan khu tâm linh Phật giáo, khu tâm linh Thiên Chúa giáo , khu văn hóa với các địa điểm như: Lô cốt thời Pháp, đài Ra Đa Viba hay khu dân gian với cổ xe ngựa, tấm cám, vườn yêu…\r\n•	Quý khách thưởng thức chương trình văn hóa nghệ thuật, xem xiếc, ca múa nhạc.\r\n•	Đoàn trải nghiệm các trò chơi cảm giác mạnh như đua xe, leo núi, xe trượt đốc, zipline, siêu nhún. Vui chơi ở công viên nước và khu trò chơi dành cho trẻ em, xem phim 5D,…\r\n•	Đoàn dùng cơm trưa tại nhà hàng trong KDL Hồ Mây với những món hải sản và đặc sản thơm ngon. Sau đó tự do nghỉ ngơi, vui chơi.\r\n•	Quý khách đi cáp treo rời KDL Hồ Mây.\r\n•	Đoàn tham quan Bạch Dinh – một dinh thự tuyệt đẹp màu trắng với mái ngói màu đỏ. Nơi đây đang trưng bày các hiện vật và cổ vật ở Côn Đảo. Ngoài ra, quý khách có thể nhìn bao quát được cảnh Núi Nhỏ, Núi Lớn. Sau đó về khách sạn nghỉ ngơi.\r\n•	Xe đón đoàn đi dùng cơm tối tại nhà hàng rồi tự do khám phá đêm cuối của tour Vũng Tàu 3 ngày 2 đêm.', '•	Quý khách dậy sớm dạo biển, ngắm bình minh và dùng bữa sáng tại nhà hàng khách sạn.\r\n•	Xe và HDV đưa quý khách tham quan Đức Mẹ Bãi Dâu nằm ở Núi Lớn mang kiểu kiến trúc giống như một chiếc thuyền buồm đang đón gió.\r\n•	Đoàn tiếp tục tham quan bến du thuyền Marina trên sông Dinh – một địa điểm chụp hình đẹp tựa trời Âu. Sau đó tự do mua sắm.\r\n•	Quý khách dùng cơm trưa tại nhà hàng. Sau đó trở về khách sạn làm thủ tục trả phòng.\r\n•	Quý khách lên xe khởi hành về lại Sài Gòn. Trên đường về đoàn sẽ có dịp tham quan chùa Đại Tòng Lâm – Ngôi đại tự có quy mô và thiết kế hiện đại với nhiều tượng Phật kỷ lục Việt Nam. Mua sắm đặc sản làm quà tại cơ sở Bò sữa Long Thành.\r\n•	Xe về đến Sài Gòn. Trả quý khách tại điểm đón ban đầu. kết thúc tour đi Vũng Tàu 3 ngày 2 đêm. HDV chào tạm biệt và hẹn gặp lại quý khách.', NULL, NULL, NULL, NULL, '2024-12-19 00:43:57', '2024-12-19 00:43:57'),
(12, 'NGÀY 1 | TP.HCM – TUY HÒA – MŨI ĐIỆN', 'NGÀY 2 | TUY HÒA - QUY NHƠN', 'NGÀY 3 | QUY NHƠN - KỲ CO – EO GIÓ', 'NGÀY 4 | QUY NHƠN – TP.HCM', NULL, NULL, NULL, 'Sáng: Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất hai tiếng. \r\n•	Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý Khách làm thủ tục đón chuyến bay đi Tuy Hòa. \r\n•	Đến sân bay Tuy Hòa, Hướng dẫn viên đón đoàn khởi hành đi Mũi Điện  điểm cực đông – nơi đón bình minh đầu tiên trên đất liền của Tổ Quốc.\r\n•	Mũi Điện có núi, có biển, từ xa là ngọn đèn hải đăng đứng sừng sững quay mặt ra biển, bên dưới chân núi là Bãi Môn được nhiều người yêu thích bởi sự yên tĩnh, thanh vắng mà bãi biển này mang lại. Trên đường khời hành ra mũi điện quý khách co dip chiêm ngưỡng cung đường ven biển Phước Tân – Bãi Ngà tuyệt đẹp. \r\nTrưa: đoàn dùng cơm trưa tại vè nổi trên vịnh Vũng Rô.\r\n•	Sau bữa trưa quý khách có thể đi cano ra Hòn Nưa một hòn đảo hoang sơ nhưng thật quyến rũ tữ do tắm biển và ngắm san hô (chi phí tự túc).\r\nChiều: Dùng cơm chiều. Nghỉ đêm tại Tuy Hoà.\r\n•	Quý khách tự do mua sắm các đặc sản Phú Yên như: khô cá ngừ đại dương, bò một nắng hai sương, muối kiến vàng lá then leng…', 'Sáng: Dùng bữa sáng.\r\n•	Đoàn trả phòng tham quan nhà thờ Mằng Lăng - một trong những nhà thờ cổ nhất Việt Nam mang đậm dấu ấn kiến trúc thế kỷ XIX. Đây cũng là nơi lưu giữ cuốn sách chữ quốc ngữ đầu tiên - Phép giảng tám ngày của linh mục Alexandre de Rhodes in năm 1651 tại Roma, Ý. \r\n•	Tham quan Gành Đá Dĩa, một danh thắng thiên nhiên kỳ thú về cảnh quan và độc đáo về địa chất ở Việt Nam (danh thắng quốc gia) những khối đá đen huyền hình lăng trụ độc đáo, trông xa như một tổ ong khổng lồ nằm bình yên bên bờ biển.\r\n•	Đoàn đến đầm Ô Loan ngắm vẻ đẹp thanh bình với không gian thoáng đãng, khí hậu trong lành, mát mẻ và thưởng thức những món hải sản đậm đà hương vị miền Trung, du khách mới có thể cảm nhận hết được vẻ đẹp của vùng đất Phú Yên thơ mộng.\r\nTrưa: Dùng cơm trưa.\r\n•	Chiều khởi hành đến Quy Nhơn, quý khách nhận phòng nghỉ ngơi , tư do tắm biển.\r\nTối: Dùng cơm chiều. Nghỉ đêm tại Quy Nhơn.', 'Sáng:   Dùng bữa sáng.\r\n•	Tham quan cầu Thị Nại – cây cầu vượt biển dài nhất Việt Nam nối liền thành phố Quy Nhơn với khu kinh tế Nhơn Hội, đoàn có dịp nhìn ngắm đồi cát  Nhơn Lý – được cho là đồi cát lớn nhất Việt Nam, mệnh danh là sa mạc giữa long biển xanh.\r\n•	Đoàn khởi hành tới Kỳ Co, nơi được thiên nhiên ưu ái cho dải cát vàng ôm lấy biển, bọc thành một hình cung, mềm mại như dải lụa uốn lượn, ôm trọn lấy làn nước trong xanh tận đáy. Bạn có thể thả mình vào làn nước mát, vui đùa với từng con sóng hoặc ngâm mình trong những hồ nước tự nhiên ngay sát bãi biển do nước biển đánh vào những vách đá lõm tạo thành. Du khách sẽ hoàn toàn bị choáng ngợp bởi vẻ đẹp hoang sơ, trong trẻo, kỳ vĩ mà tạo hóa ban tặng cho nơi đây. \r\nTrưa: Dùng cơm trưa với những món hải sản đặc trưng. \r\n•	Đoàn tiếp tục tham quan Eo gió - điểm check-in tuyệt đẹp tại Quy Nhơn, được mệnh danh là nơi ngắm hoàng hôn đẹp nhất Việt Nam, kì vĩ bởi những rặng núi cao và có hình thù kì lạ vươn ra biển lớn, ôm trọn một vòng tạo thành eo biển hút gió. Đứng từ trên cao nhìn xuống Eo gió như một bức tranh sơn thủy hữu tình vừa gởi cảm vừa hoang sơ đầy quyến rũ.\r\n•	Tham quan Tịnh xá Ngọc Hòa – chiêm ngưỡng tượng Phật đôi cao nhất Việt Nam, cao 30 mét, xoay về 2 hướng Nam Bắc với 2 màu vàng và bạc. \r\nChiều: Dùng cơm chiều. Nghỉ đêm tại Quy Nhơn\r\n•	Quý khách tự do nghỉ ngơi tại khách sạn hoặc dạo một vòng quanh thành phố Quy Nhơn thưởng thức các món ăn đặc sản: món nem nướng, bánh tráng trứng, bánh canh, bánh xèo tôm nhảy, hải sản,…', 'Sáng: Dùng bữa sáng. \r\n•	Xe đưa quý khách đến KDL Ghềnh Ráng – Tiên Sa – một thiên đường của vẻ đẹp tự nhiên và nền văn hóa đậm đà tại miền biển xinh đẹp Quy Nhơn. Tại đây, quý khách có dịp viếng thăm mộ của thi sĩ Hàn Mặc Tử – một tài hoa văn chương bạc mệnh, để hiểu thêm về cuộc đời và tác phẩm nghệ thuật của ông. Tiếp theo, quý khách sẽ được ngắm nhìn nghệ thuật bút lửa của Dzũ Kha, một di sản văn hóa độc đáo của người dân địa phương. Khám phá Bãi Trứng, hay còn được biết đến với cái tên bãi tắm Hoàng Hậu, nơi những viên đá nhẵn như trứng được xếp đầy bãi cát trắng mịn, tạo nên một khung cảnh tuyệt đẹp không giống bất kỳ nơi nào khác.\r\nTrưa:  Dùng cơm trưa.\r\n•	Quý khách tự do mua sắm đặc sản địa phương về làm quà cho gia đình\r\n•	Hướng dẫn viên tiễn đoàn ra sân bay Phù Cát đón chuyến bay về thành phố Hồ Chí Minh\r\n•	Kết thúc chương trình tham quan, chia tay và hẹn gặp', NULL, NULL, NULL, '2024-12-19 00:47:43', '2024-12-19 00:47:43'),
(13, 'NGÀY 1 | TP. HCM – TIỀN GIANG – MỸ THO – CẦN THƠ', 'NGÀY 2 | CHỢ NỔI CÁI RĂNG – THIỀN VIỆN TRÚC LÂM – TP. HCM', NULL, NULL, NULL, NULL, NULL, '06h30: Xe và HDV đón quý khách tại điểm hẹn.\r\n07h45: Đoàn dừng chân, dùng điểm tâm sáng tại Mekong/ Trung Lương Rest Stop.\r\n•	Sau đó di chuyển đến Chùa Vĩnh Tràng – Một trong những ngôi chùa cổ nổi tiếng  nhất Miền Tây. Năm 1984, Chùa Vĩnh Tràng đã được Bộ Văn hóa Thông tin (nay là Bộ Văn hóa Thể thao và Du lịch) xếp hạng di tích cấp Quốc gia.\r\n09h00: Quý Khách đến bến tàu 30/4 TP.Mỹ Tho, thuyền lớn và HDV bản địa đón quý khách thưởng ngoạn sông nước miền Tây Nam bộ. \r\n•	Tham quan tứ linh miệt vườn - 4 cồn Long, Lân, Quy, Phụng.\r\n•	Tìm hiểu cách nuôi cá bè trên sông Tiền.\r\n•	Đoàn trải nghiệm thuyền chèo 3 lá len lỏi trong rạch dừa nước thiên nhiên.\r\n•	Tham quan trang trại nuôi ong mật, uống trà mật ong chanh miễn phí.\r\n10h30: Đoàn trở ra thuyền lớn đến với tỉnh Bến Tre.\r\n•	Tham quan, tìm hiểu quy trình sản xuất kẹo dừa và làng nghề bánh tráng tại xã Tân Thạnh. \r\n•	Quý khách có trải nghiệm thú vị đi xe ngựa trên đường làng tham quan vườn trái cây, thưởng thức trái cây miễn phí và giao lưu đờn ca tài tử Nam bộ.\r\n•	Công ty mời quý khách mỗi người 1 trái dừa ba nhát đặc sản Bến Tre. \r\n11h30: Quý khách dùng bữa trưa, quý khách thưởng thức các món ăn Nam bộ đặc trưng và nghỉ ngơi.\r\nSau đó lên tàu trở về bến tàu Mỹ Tho. Trên đường nghe giới thiệu về Cồn Phụng - tìm hiểu di tích Ông Đạo Dừa và các công trình kiến trúc của ông trên cồn...\r\nSau đó, đoàn di chuyển đến Cần Thơ để nhận phòng khách sạn.\r\n18h30: Đoàn ăn tối tại Du thuyền Ninh Kiều 5*. Quý khách tham quan tự do TP.Cần Thơ về đêm', '05h30: Đoàn khởi hành tham quan Chợ nổi Cái Răng – một trải nghiệm thú vị ở miền Tây sông nước. Thuyền ghé Làng hủ tiếu truyền thống, quý khách thưởng thức món “pizza hủ tiếu”.\r\n07h00: Quý khách trở về khách sạn để dùng buffet sáng và  sắp xếp hành lý trả phòng. \r\n08h00: Đoàn tham quan Làng du lịch Mỹ Khánh : tại đây, quý khách tìm hiểu về ngôi nhà cổ 3 gian truyền thống văn hoá miền Nam,quý khách  xem chương trình đua chó, đua heo,tham quan vườn thú,vườn trái cây và tham gia các trò chơi tại Mỹ Khánh hoặc có thể thử câu cá sấu tại làng du lịch Mỹ Khánh.\r\n11h30: Quý khách dùng bữa trưa tại nhà hàng với món đặc sản miền tây. \r\n13h00: Đoàn tham quan: Thiền Viện trúc lâm Phương Nam quý khách viếng Thiền Viện lớn nhất miền Tây. Quý khách được chiêm ngưỡng công trình kiến túc phật giáo mang vẻ đẹp của thời Lý – Trần.\r\n17h00: Về tới TP.HCM, xe và HDV tiễn quý khách. Kết thúc chuyến đi. Chào tạm biệt và hẹn gặp lại.', NULL, NULL, NULL, NULL, NULL, '2024-12-19 00:51:41', '2024-12-19 00:51:41'),
(14, 'NGÀY 1 | TP. HCM – CÔN ĐẢO', 'NGÀY 2 | KHÁM PHÁ CÔN ĐẢO', 'NGÀY 3 | CÔN ĐẢO - TPHCM', NULL, NULL, NULL, NULL, 'Sáng: Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất một tiếng ba mươi phút.\r\n•	Đại diện công ty Du Lịch Việt đón và hỗ trợ làm thủ tục. Đáp máy bay đi Côn Đảo.\r\n•	Xe và hướng dẫn Côn Đảo Resort, đón quý khách tại sân bay Côn Sơn. Đưa về Resort, trên đường về quý khách đi qua các địa danh: làng Cỏ Ống, Lò Vôi, nghĩa địa Hàng Keo…. Đến Resort, dùng cơm trưa, làm thủ tục nhận phòng theo quy định của Resort, nghỉ ngơi.\r\n14h00: Quý khách thăm quan: (Thuyết minh viên: Bảo tàng).\r\n•	Bảo tàng Côn Đảo\r\n•	Trại tù Phú Hải\r\n•	Tham quan chuồng cọ p Pháp.\r\n•	Chuồng cọp Mỹ\r\n•	Viếng nghĩa trang Hàng Dương thắp hương tại đài tưởng niệm chung cho gần\r\n20h00 ngôi mộ của các chiến sỹ yêu nước.\r\n•	Đồng chí Lê Hồng Phong, Cụ Nguyễn An Ninh\r\n•	Thắp hương tại mộ nữ anh hùng Võ Thị Sáu\r\n•	Khu biệt lập chuồng bò\r\n•	Viếng miếu Bà Phi Yến – thứ phi vua Nguyễn Ánh.\r\n17h30: Trở về resort, nghỉ ngơi.\r\n18h00: Quý khách dùng cơm chiều.\r\n•	Quý khách viếng mộ nữ anh hùng Võ Thị Sáu (chi phí tự túc)', 'Sáng: Dùng bữa sáng. \r\n•	Quý khách tham quan bãi biển Đầm Trầu – một trong những bãi tắm hoang sơ và đẹp nhất Côn Đảo. Từ đường chính, Quý khách đi bộ theo  đường mòn khoảng 1,5km đến bãi tắm. Trên đường đi, quý khách dừng chân thắp nhang tại Miếu Cậu - nơi thờ hoàng tử Cải, con trai của chúa Nguyễn Ánh và bà Hoàng Phi Yến. Đến bãi Đầm Trầu, tắm biển, chụp hình, tham gia các trò chơi trên biển do Hướng dẫn Côn Đảo Resort tổ chức.\r\n•	Trở về Resort dùng cơm trưa.\r\n14h00:  Khởi hành tham quan cảng Bến Đầm Cảng lớn nhất Côn Đảo \r\n•	Mũi Cá Mập.\r\n•	Bãi Nhất.\r\n•	Ngắm đỉnh Tình Yêu, tìm hiểu tập quán của ngư dân Côn Đảo.\r\n•	Mua hải sản tại cảng Bến Đầm.\r\n•	Quý khách thăm quan Chùa Núi Một, ngồi chùa duy nhất đã được xây dự ng lại mới, với kiến trúc mang đậm phong cách phật giáo Phương Đông, nằm trên một ngọn núi. Từ đây quý khách có thể quan sát toàn cảnh thị trấn Côn Đảo. Quý khách tiếp tục thăm quan Chợ Côn Đảo, mua hải sản và quà lưu niệm tặng người thân.\r\n17h00: Trở về Resort, tự do tắm biển,chèo thuyền Kajak,chơi golf hay tennis,…(chi phí tự túc)\r\n18h00: Quý khách  dùng cơm chiều.\r\n•	Tối: Quý khách tự do dạo phố biển, ngắm biển lúc về đêm.', '•	06h30: Quý khách dùng bữa sáng.\r\n•	10h00: Làm thủ tục trả phòng, xe đưa đoàn ra sân bay làm thủ tục hàng không. \r\n•	Khởi hành về TP.HCM chia tay và hẹn gặp lại.', NULL, NULL, NULL, NULL, '2024-12-19 00:54:33', '2024-12-19 00:54:33'),
(15, 'NGÀY 1 | TP. HCM – MỸ THO - CHÂU ĐỐC', 'NGÀY 2 | CHÂU ĐỐC – CẦN THƠ', 'NGÀY 3 | CẦN THƠ – CHỢ NỔI – TP. HCM', NULL, NULL, NULL, NULL, '06h30: Xe và HDV đón quý khách tại điểm hẹn.Đoàn di chuyển trên cao tốc Sài Gòn- Trung Lương, hướng dẫn viên sẽ  giới thiệu với quý khách về bản sắc văn hóa của người dân Miền Tây Nam bộ.\r\n07h45: Quý khách dùng điểm tâm sáng tại nhà hàng Trung lương, sau đó đoàn di chuyển đến chùa Vĩnh Tràng, ngôi chùa mang lối kiến trúc kết hợp châu âu và châu Á và đã được xếp hạng di tích cấp Quốc Gia năm 1984.\r\n09h15: Đoàn đến bến tàu 30/4 TP. Mỹ Tho, thưởng ngoạn sông nước miền Tây:\r\n•	Tham quan tứ linh miệt vườn tham quan cồn Long, Lân, Quy,Phụng.\r\n•	Đoàn ngắm nhìn những ngôi nhà bè trên sông tiền của cư dân địa phương.\r\n•	Đoàn trải nghiệm thuyền chèo 3 lá len lỏi trong rạch dừa nước quý khách sẽ có những bức ảnh thật là đẹp mang dấu ấn miền sông nước Miền Tây.\r\n•	Tham quan trang trại nuôi ong mật, quý khách uống trà mật ong chanh\r\n10h00: Đoàn trở ra thuyền lớn di chuyển đến tỉnh Bến Tre.\r\n•	Đoàn tham quan và tìm hiểu quy trình sản xuất kẹo dừa và làng nghề bánh tráng tại xã Tân Thạnh.\r\n•	Quý khách có trải nghiệm thú vị đi xe ngựa trên đường làng, tham quan vườn trái cây, thưởng thức trái cây miễn phí và giao lưu đờn ca tài tử Nam bộ.\r\n•	Công ty mời quý khách mỗi người 1 trái dừa ba nhát đặc sản Bến Tre. \r\n11h30: Đoàn tiếp tục đến nhà hàng miệt vườn dùng cơm trưa, nằm võng nghỉ ngơi, tham quan hồ cá sấu, đi cầu khỉ, cầu dừa…Sau đó lên tàu trở về bến tàu Mỹ Tho. Trên đường nghe giới thiệu về Cồn Phụng - tìm hiểu di tích Ông Đạo Dừa và các công trình kiến trúc của ông trên cồn...sau đó quý khách trở về Mỹ Tho, xe đưa quý khách về Châu Đốc.\r\n18h30: HDV đưa Quý khách dùng bữa tối tại nhà hàng, sau đó quý khách tự do khám phá TP.Châu Đốc về đêm.\r\n•	Nghỉ đêm khách sạn tại Châu Đốc.', 'Sáng: Dùng bữa sáng\r\n•	Sau đó trả phòng khởi hành đến KDL rừng tràm Trà Sư, trên đường đi quý khách tham quan : di tích miếu Bà Chúa Xứ một di tích lịch sử, kiến trúc và tâm linh quan trọng của tỉnh An Giang. Ðược lập vào năm 1820, kiến trúc theo kiểu chữ \"quốc\".,\r\n•	Viếng Tây An Cổ Tự (Chùa Tây An Núi Sam) - ngôi chùa có kiến trúc kết hợp phong cách nghệ thuật Ấn Độ và kiến trúc cổ dân tộc đầu tiên tại Việt Nam\r\n•	Viếng Lăng Thoại Ngọc Hầu, đền thờ ông Thoại Ngọc Hầu, mộ ông cùng hai phu nhân được xây vào thập niên 30 của thế kỷ 20\r\n09h30: Đoàn đến KDL rừng tràm Trà Sư là hệ sinh thái rừng tràm ngập nước đẹp nhất Đông Nam Á.Đi xuồng máy hay còn gọi là Tắc Ráng - phương tiện đường thủy.\r\n•	Checkin cầu tre vạn bước.\r\n•	Tham quan Đài quan sát cao 32m, thấy toàn cảnh rừng tràm.\r\n•	Đoàn chụp hình lưu niệm với Cầu Kiều vô cùng đẹp mắt.\r\n•	Tham quan cầu tre dài 2km đạt kỷ lục Guinness của Việt Nam \r\n12h00: Đoàn dùng cơm trưa tại nhà hàng Trà Sư, sau đó khởi hành về lại Thành Phố Cần Thơ.\r\n18h30: Đoàn dùng cơm tối tại nhà hàng.\r\nNghỉ đêm khách sạn tại Cần Thơ.', '05h30: Quý khách tham quan Chợ Nổi Cái Răng – một trải nghiệm văn hóa sông nước miền tây.\r\n•	Thuyền ghé tham quan lò hủ tiếu, quý khách trải nghiệm thưởng thức điểm tâm trên sông: Hủ Tiếu, Bún Riêu, Bún Mắm,... (Chí phí tự túc) \r\n07h00: Quý khách trở về lại khách sạn để dùng buffet sáng, sau đó trả phòng tiếp tục chương trình:\r\n08h00: Đoàn tham quan Làng du lịch Mỹ Khánh : tại đây, quý khách tìm hiểu về ngôi nhà cổ 3 gian truyền thống văn hoá miền Nam,quý khách  xem chương trình đua chó, đua heo,tham quan vườn thú,vườn trái cây và tham gia các trò chơi tại Mỹ Khánh hoặc có thể thử câu cá sấu tại làng du lịch Mỹ Khánh.\r\n11h30: Quý khách dùng bữa trưa tại nhà hàng với món đặc sản miền tây. \r\n13h00: Đoàn tham quan Căn nhà màu tím không gian thơ mộng với các tiểu cảnh màu tím giúp cho quý khách có những bức ảnh thật đẹp (chi phí tự túc). Sau đó, xe đưa đoàn khởi hành về lại TP.HCM. Kết thúc hành trình tour, Chào tạm biệt và hẹn gặp lại.', NULL, NULL, NULL, NULL, '2024-12-19 00:57:45', '2024-12-19 00:57:45'),
(16, 'NGÀY 1 | TP.HCM – PHAN THIẾT – NHA TRANG', 'NGÀY 2 | DU NGOẠN 4 ĐẢO – VINPEARLAND', 'NGÀY 3 | THÁP BÀ PONAGAR – NHÀ THỜ ĐÁ– TP.HCM', 'NGÀY 4 | NHA TRANG – TP.HCM', NULL, NULL, NULL, 'Sáng: Xe và Hướng Dẫn Viên Du Lịch Việt đón Quý khách tạ i điểm hẹn. Khởi hành đi Nha Trang. Dùng bữa sáng tại ngã ba Dầu Giây. Đoàn tiếp tục lộ trình đến Phan Thiết, tham quan bãi biển Đồi Dương.\r\nTrưa: Dùng cơm trưa Hành trình trên quốc lộ 1A, khi đến đoạn giáp ranh Bình Thuận - Ninh Thuận, Quý khách chiêm ngưỡng cảnh đẹp mê hồn của biển Cà Nà với làn nước trong xanh, những bãi cát trải dài quanh co uốn lượn.\r\nChiều: Đến Nha Trang, nhận phòng. Dùng cơm chiều.\r\nTối: Tự do dạo biển, nghỉ đêm khách sạn tại Nha Trang.', 'NGÀY 2 | DU NGOẠN 4 ĐẢO – VINPEARLAND(Ăn sáng, trưa, tối tự túc)\r\nSáng: Dùng bữa sáng. Đoàn xuống tàu khởi hành chuyến du ngoạn 4 đảo, khám phá nét đẹp lộng lẫy của Hòn Ngọc Việt và góc nhìn đẹp nhất toàn cảnh thành phố biển Nha Trang từ biển khơi .\r\nQuý khách có thể đi tàu đáy kính trải nghiệm những cảnh quan tuyệt vời dưới đáy biển- cảnh thuỷ cung với những loài san hô đủ các hình thù và nhiều màu sắc, từng đàn cá cảnh loại nhỏ cùng nhiều loại sinh vật biển khác đang bơi lượn, len lỏi ra vào những hang động san hô...(chi phí tàu đáy kính tự túc).\r\nTrưa: Dùng cơm trưa. \r\n \r\nQuý khách có thể chọn một trong hai lựa chọn sau:\r\nLựa chọn 1: KDL Suối Khoáng Nha Trang – Massage cơ thể với hệ thống thủy lưc zaccuzi, ngâm mình trong Hồ Khoáng Nóng, Tắm Bùn… (chi phí tự túc).\r\nLựa chọn 2: Quý khách khởi hành tham quan Vinpearl (chi phí tự túc).\r\n•	Trò chơi ngoài trời: đu quay cảm giác mạnh, đu quay dây văng, đu quay thú nhún, đu quay con voi, tàu lượn siêu tốc, đu quay vòng xoay, xe đạp bay, tàu hải tặc, thành phố vui nhộn, thú nhún, xiếc thú (3 xuất/ngày).\r\n•	Trò chơi trong nhà: phim bốn chiều, xe đụng, vườn cổ tích, thiên đường trẻ em, siêu thị game, phòng karaoke…\r\n•	Khu thuỷ cung Vinpearlland với diện tích trên 3,400m2, là đại dương thu nhỏ với hơn 300 loài cá đẹp, quý hiếm và lạ mắt.\r\n•	Khu công viên nước với các trò chơi cảm giác mạnh: khu trò chơi mạo hiểm, khu trò chơi dành cho trẻ em, hồ tạo sóng, dòng sông lười, khu trò chơi gia đình mạo hiểm…\r\nTối: Quý khách TỰ TÚC ĂN TỐI. Nghỉ đêm tại Nha Trang. Quý khách tự do dạo phố, chợ đêm hoặc thưởng thức Hải sản tại Khu Tháp Bà (chi phí tự túc).', 'Sáng: Dùng điểm tâm. Quý khách tham quan thành phố Nha Trang:\r\n•	Tháp Bà Ponagar: một công trình có quy mô lớn nhất và có vai trò quan trọng trong lịch sử nghệ thuật kiến trúc tôn giáo Chăm.\r\n•	Chùa Long Sơn: ngôi chùa nổi tiếng nhất Nha Trang. Đỉnh đồi là bức tượng Kim Thân Phật tổ (còn gọi là tượng Phật trắng) ngồi thuyết pháp, tượng cao 21m, đài sen làm đế cao 7m.\r\n•	Nhà thờ đá (Nhà thờ Chánh tòa Kitô Vua) với nét kiến trúc độc đáo mang đậm phong cách Pháp.\r\nTrưa: Dùng cơm trưa. Tham quan, mua sắm đặc sản tại trung tâm thương mại Chợ Đầm. Quý khách tự do tắm biên.\r\nChiều: Dùng cơm chiều. Nghỉ đêm tại Nha Trang.', 'Sáng: Dùng điểm tâm. Khởi hành về TP.HCM, tiếp tục đến Phan Thiết.\r\nDùng cơm trưa. Về đến TP.HCM – Chia tay và hẹn gặp lại Quý khách.', NULL, NULL, NULL, '2024-12-19 01:10:55', '2024-12-19 01:10:55'),
(17, 'NGÀY 01: TP. HỒ CHÍ MINH – ĐÀ NẴNG – HỘI AN – TẶNG SHOW KÝ ỨC HỘI AN', 'NGÀY 02: ĐÀ NẴNG – KDL BÀ NÀ (CẦU VÀNG)', 'NGÀY 03: ĐÀ NẴNG – BẢO TÀNG TRANH 3D – TPHCM', NULL, NULL, NULL, NULL, 'Buổi sáng, quý khách tập trung tại Cổng D2, Ga đi trong nước, sân bay Tân Sơn Nhất. Hướng dẫn viên Lữ hành Saigontourist đón quý khách, hỗ trợ làm thủ tục. Khởi hành ra Đà Nẵng trên chuyến bay VN110 lúc 07h00. Đến Đà Nẵng, tham quan bán đảo Sơn Trà, ngắm cảng Tiên Sa, viếng chùa Linh Ứng Bãi Bụt - ngôi chùa lớn nhất ở thành phố Đà Nẵng, chiêm bái tượng Phật Quan Thế Âm cao nhất Việt Nam. Buổi chiều, khởi hành vào Hội An. Tham quan Ngũ Hành Sơn và làng nghề điêu khắc đá Hòa Hải. Tiếp tục đến Phố cổ Hội An với các công trình tiêu biểu: Chùa Cầu Nhật Bản, chùa Ông, hội quán Phúc Kiến, khu phố đèn lồng. Công Viên Ấn Tượng Hội An - Tái hiện Hội An của quá khứ, một cảng thị quốc tế sầm uất với sự hiện diện của các nền văn hóa Á, Âu với rất nhiều mini shows tương tác …. Đặc biệt xem Show “Ký Ức Hội An” - vở diễn thực cảnh ngoài trời với số lượng diễn viên đạt kỷ lục Việt Nam, tái hiện nhịp nhàng sinh động miền ký ức Faifo đa văn hóa: Champa, Bồ Đào Nha, Nhật, Trung… chứng kiến cuộc sống thôn quê bình dị bên dòng sông Hoài, khoảnh khắc hùng tráng trong lịch sử, nét hoàng kim của cảng thị một thời hay phố Hội nhộn nhịp của hiện tại. Sau khi xem show đoàn trở về và nghỉ đêm tại Đà Nẵng.', 'Sau bữa sáng, quý khách sẽ được tự do tham quan hoàn toàn. Lữ hành Saigontourist xin phép gợi ý 3 chương trình để quý khách tham khảo:\r\n- Lựa chọn 1 (Tự túc ăn trưa) Tự do để khám phá TP.Đà Nẵng. Quý khách có thể ra sông Hàn ngắm cầu Rồng - một trong những con rồng thép lớn nhất thế giới, cầu Trần Thị Lý - với kiến trúc tựa con thuyền căng buồm vươn ra biển lớn, tượng Cá chép hóa rồng - một biểu tượng mang đậm tính nghệ thuật và tín ngưỡng dân gian, cầu Tình Yêu - cây cầu trái tim với những ổ khóa dễ thương trên thành cầu rất thú vị và lãng mạn. Hoặc đến chợ Hàn (hoặc chợ Cồn), mua sắm đặc sản địa phương. Quý khách tự túc ăn trưa, trải nghiệm phong vị ẩm thực độc đáo của Đà Nẵng.\r\n- Lựa chọn 2 (Cáp treo Bà Nà Hills & tự túc ăn trưa): Xe đưa quý khách đến Ga cáp treo của KDL Bà Nà Hills. Lên Bà Nà bằng cáp treo, dạo bước trên Cầu Vàng tọa lạc tại Vườn Thiên Thai. Viếng chùa Linh Ứng, khám phá Fantasy Park - khu vui chơi giải trí trong nhà và trò chơi Hiệp sĩ Thần thoại (Máng trượt). Dạo bộ giữa Khu làng Pháp một không gian kiến trúc tái hiện sinh động nước Pháp thời cận đại đầy lãng mạn, sang trọng và lịch lãm. Trải nghiệm Tàu hỏa leo núi, tham quan vườn hoa, Hầm rượu cổ Debay (không bao gồm thưởng thức rượu vang). Trải nghiệm Tàu hỏa leo núi số 2 qua Lâu Đài công trình mới tại KDL Bà Nà được đưa vào hoạt động năm 2022. Tự túc chi phí khám phá Khu trưng bày tượng sáp - duy nhất tại Việt Nam. Ăn trưa tự túc tại Bà Nà. Xe đưa quý khách về lại TP.Đà Nẵng.\r\n- Lựa chọn 3 (Combo cáp treo + buffet trưa tại Bà Nà Hills): Xe đưa quý khách đến Ga cáp treo KDL Bà Nà Hills. Đoàn tự do tham quan như lựa chọn 2. Đến trưa, ăn buffet trưa tại Bà Nà Hills. Xe đưa quý khách về lại TP.Đà Nẵng.\r\nNghỉ đêm tại Đà Nẵng.', 'Buổi sáng, đoàn tự do nghỉ ngơi. Sau khi làm thủ tục trả phòng, xe đưa quý khách đi tham quan Bảo tàng tranh 3D Art In Paradise Đà Nẵng, du khách sẽ hóa thân và diễn xuất thành các nhân vật trong những tác phẩm 3D đầy thú vị. Ra sân bay Đà Nẵng để về TPHCM trên chuyến bay VN135 lúc 17h30. Kết thúc chương trình. Quý khách tự túc phương tiện từ sân bay TSN về nhà.', NULL, NULL, NULL, NULL, '2024-12-19 01:14:26', '2024-12-19 01:14:26'),
(18, 'NGÀY 1 | TP.HCM – TUY HÒA – GÀNH ĐÁ DĨA', 'NGÀY 2 | PHÚ YÊN – QUY NHƠN – KDL. HẦM HÔ', 'NGÀY 3 | QUY NHƠN – KỲ CO – EO GIÓ', 'NGÀY 4 | QUY NHƠN – TP.HCM', NULL, NULL, NULL, 'Sáng:  Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất ba tiếng.\r\n•	Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý Khách làm thủ tục đón chuyến bay đi Tuy Hòa. \r\n•	Đến sân bay Tuy Hòa, Hướng dẫn viên đón đoàn viếng nhà thờ Mằng Lăng - một trong những nhà thờ cổ nhất Việt Nam mang đậm dấu ấn kiến trúc thế kỷ XIX. Đây cũng là nơi lưu giữ cuốn sách chữ quốc ngữ đầu tiên - Phép giảng tám ngày của linh mục Alexandre de Rhodes in năm 1651 tại Roma, Ý.\r\n•	Tham quan Gành Đá Dĩa, một danh thắng thiên nhiên kỳ thú về cảnh quan và độc đáo về địa chất ở Việt Nam (danh thắng quốc gia) những khối đá đen huyền hình lăng trụ độc đáo, trông xa như một tổ ong khổng lồ nằm bình yên bên bờ biển.\r\n•	Đoàn đến đầm Ô Loan ngắm vẻ đẹp thanh bình với không gian thoáng đãng, khí hậu trong lành, mát mẻ và thưởng thức những món hải sản đậm đà hương vị miền Trung, du khách mới có thể cảm nhận hết được vẻ đẹp của vùng đất Phú Yên thơ mộng.\r\nTrưa: Dùng cơm trưa.\r\n•	Đoàn khởi hành đến Bãi Xép (Gành Xép) một bãi cát vàng óng kéo dài giữa hai mũi đá lớn nhô ra biển, bãi như một thiên đường hoang sơ với cảnh quan rất đẹp phía Bắc thành phố Tuy Hòa, vẫn giữ được nguyên vẹn vẻ hoang sơ, bãi cát màu hồng, kéo dài hơn 1km từ Gành Xép. Ấn tượng hơn cả là bãi cỏ rộng mênh mông trên đỉnh Gành Xép xuất hiện đầy thơ mộng trong bộ phim Tôi thấy hoa vàng trên cỏ xanh, Gành Xép với vẻ đẹp tổng hòa của biển, đá, đồng cỏ, phi lao và mây trời đang trở thành điểm đến thu hút du khách khi đến Phú Yên. \r\n•	Tại đây du khách có thể lưu lại những bức hình kỉ niệm với các bãi đá đen, cát vàng óng, bãi cỏ rộng mênh mông hoặc tắm biển tận hưởng bãi biển đẹp hoang sơ.\r\nChiều: Dùng cơm chiều. Nghỉ đêm tại Tuy Hoà.\r\n•	Quý khách tự do mua sắm các đặc sản Phú Yên như: khô cá ngừ đại dương, bò một nắng hai sương, muối kiến vàng lá then leng…', 'Sáng: Dùng bữa sáng.\r\n•	Đoàn khởi hành đến Quy Nhơn, tham quan Bảo Tàng Quang Trung nơi trưng bày những di vật quan trọng liên quan đến phong trào khởi nghĩa Tây Sơn, viếng Điện Thờ Vua Quang Trung và các danh tướng thời Tây Sơn cùng với các di tích còn sót lại như cây me cổ thụ, giếng nước xưa, 9 pho tượng dát vàng, …đoàn có dịp thưởng thức chương trình biểu diễn võ thuật và trống trận Tây Sơn (trừ thứ 3 hoặc ngày đoàn biểu diễn đi công tác; chi phí tự túc). \r\nTrưa: Dùng cơm trưa.\r\n•	Đoàn khởi hành tham quan Khu du lịch Hầm Hô được mệnh danh là “Vịnh Ha Long thu nhỏ”, đến đây đoàn như được trở về với thiên nhiên hùng vĩ, đắm mình trong thế giới bồng lai tiên cảnh giữa ngút ngàn rừng xanh dưới chân dãy Trương Sơn. Đoàn tham gia hoạt động du thuyền trên sông Kut hòa mình với thiên nhiên hoang dã, tự do tắm suối hoặc tham gia các hoạt động vui chơi giải trí như bơi thuyền Kayak, đạp vịt, câu cá thư giãn, …(chi phí tự túc).\r\nChiều: Dùng cơm chiều, nhận phòng. Nghỉ đêm tại Quy Nhơn.', 'Sáng: Dùng bữa sáng.\r\n•	Tham quan cầu Thị Nại – cây cầu vượt biển dài nhất Việt Nam nối liền thành phố Quy Nhơn với khu kinh tế Nhơn Hội, đoàn có dịp nhìn ngắm đồi cát  Nhơn Lý – được cho là đồi cát lớn nhất Việt Nam, mệnh danh là sa mạc giữa long biển xanh.\r\n•	Đoàn tiếp tục khởi hành tới Kỳ Co, nơi được thiên nhiên ưu ái cho dải cát vàng ôm lấy biển, bọc thành một hình cung, mềm mại như dải lụa uốn lượn, ôm trọn lấy làn nước trong xanh tận đáy. Bạn có thể thả mình vào làn nước mát, vui đùa với từng con sóng hoặc ngâm mình trong những hồ nước tự nhiên ngay sát bãi biển do nước biển đánh vào những vách đá lõm tạo thành. Du khách sẽ hoàn toàn bị choáng ngợp bởi vẻ đẹp hoang sơ, trong trẻo, kỳ vĩ mà tạo hóa ban tặng cho nơi đây.\r\nTrưa:   Dùng cơm trưa với những món hải sản đặc trưng.\r\n•	Đoàn tiếp tục tham quan Eo gió - điểm check-in tuyệt đẹp tại Quy Nhơn, được mệnh danh là nơi ngắm hoàng hôn đẹp nhất Việt Nam, kì vĩ bởi những rặng núi cao và có hình thù kì lạ vươn ra biển lớn, ôm trọn một vòng tạo thành eo biển hút gió. Đứng từ trên cao nhìn xuống Eo gió như một bức tranh sơn thủy hữu tình vừa gởi cảm vừa hoang sơ đầy quyến rũ.\r\n•	Tham quan Tịnh xá Ngọc Hòa – chiêm ngưỡng tượng Phật đôi cao nhất Việt Nam, cao 30 mét, xoay về 2 hướng Nam Bắc với 2 màu vàng và bạc.\r\nChiều:  Dùng cơm chiều. Nghỉ đêm tại Quy Nhơn\r\n•	Quý khách tự do nghỉ ngơi tại khách sạn hoặc dạo một vòng quanh thành phố Quy Nhơn thưởng thức các món ăn đặc sản: món nem nướng, bánh tráng trứng, bánh canh, bánh xèo tôm nhảy, hải sản,…', 'Sáng: Dùng bữa sáng. \r\n•	Đoàn tham quan Tháp Đôi – cụm 2 ngọn tháp cổ xinh đẹp có lối kiến trúc Angkor, được xây dựng từ thế kỷ thứ XII.\r\n•	Quý khách tự do mua sắm đặc sản địa phương về làm quà cho gia đình.\r\nTrưa: Dùng cơm trưa.\r\n•	Khởi hành tham quan Chùa Thiên Hưng: Vẻ đẹp của “Phượng Hoàng cổ trấn” phiên bản Việt, là một trong những nơi không thể bỏ qua khi đến Quy Nhơn – Bình Định.\r\n•	Hướng dẫn viên tiễn đoàn ra sân bay Phù Cát đón chuyến bay về thành phố Hồ Chí Minh\r\n•	Kết thúc chương trình tham quan, chia tay và hẹn gặp lại.', NULL, NULL, NULL, '2024-12-19 01:17:57', '2024-12-19 01:17:57');
INSERT INTO `schedule` (`id`, `title1`, `title2`, `title3`, `title4`, `title5`, `title6`, `title7`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `create_at`, `update_at`) VALUES
(19, 'NGÀY 1 | TP.HCM – HÀ NỘI – PHÚ THỌ – HÀ GIANG', 'NGÀY 2 | HÀ GIANG – CỔNG TRỜI QUẢN BẠ – DINH VUA MÈO', 'NGÀY 3 | ĐỒNG VĂN – MÈO VẠC – CAO BẰNG', 'NGÀY 4 | CAO BẰNG – THÁC BẢN GIỐC – ĐỘNG NGƯỜM NGAO', 'NGÀY 5 | CAO BẰNG – PẮC PÓ – BẮC KẠN – BA BỂ', 'NGÀY 6 | KHU DU LỊCH HỒ BA BỂ – HÀ NỘI – TP.HCM', NULL, 'Sáng: Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất ba tiếng.\r\n•	Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý khách làm thủ tục đón chuyến bay đi Hà Nội.\r\n•	Đến sân bay Nội Bài, Hướng dẫn viên đón Quý khách khởi hành đến Hà Giang.\r\nTrưa: Dừng chân, dùng cơm trưa.\r\n•	Đoàn tiếp tục khởi hành đến Hà Giang – nơi có những con đường đèo, cứ nối nhau quanh co uốn lượn, nơi có những con người dân tộc chân chất, mặc dù cuộc sống nghèo khổ nhưng trên môi luôn nở nụ cười.\r\n•	Tham quan Làng văn hóa du lịch sinh thái Hạ Thành, được bao quanh bởi những thửa ruộng bậc thang xếp nối nhau. Đến với Hạ Thành là đến với những ngôi nhà sàn truyền thống nguyên sơ, đến với những câu hát lượn, hát cọi, hát then ngọt ngào, những điệu múa dân gian, múa tín ngưỡng, những lễ hội truyền thống huyền bí, tạo cho bạn một cảm giác như trở về nơi cội nguồn của dân tộc.\r\nTối: Dùng cơm tối. Nghỉ đêm Hà Giang.', 'Sáng: Dùng bữa sáng.\r\n•	Rời thành phố Hà Giang, đường lên Quản Bạ mở ra giữa hai bên vách núi cao chất ngất, vượt vòng cua khúc khuỷu, đi lên đèo Pắc Sum. Đoàn dừng chân ngắm cảnh và chụp ảnh tại dốc Bắc Sum.\r\n•	Lên đến Cổng Trời Quản Bạ, Quý khách có thể ngắm nhìn thị trấn Tam Sơn thơ mộng.\r\n•	Núi đôi Quản Bạ hiện lên giữa những núi đá trùng điệp và ruộng bậc thang với hình dáng, thế đứng ngồ ngộ khiến du khách không khỏi ngỡ ngàng trước vẻ đẹp kỳ vĩ của tạo hoá. Hai trái núi gắn với truyền thuyết “Núi Cô Tiên” rất thi vị.\r\n•	Ghé thăm Phố Cáo, với những ngôi nhà tường màu đất vàng đặc trưng, cổng gỗ nằm trong hàng rào đá – nét đặc trưng của vùng cao nguyên đá với bốn dân tộc Mông, Hán, Dao, Pu Péo.\r\n•	Từ hướng Yên Minh lên thị trấn Đồng Văn, đến ngã ba Phó Bảng, khi đến đỉnh đèo nơi ngã ba đi về Phó Bảng, du khách có thể nhìn thấy toàn cảnh Sủng Là phía dưới thung lũng. Từ trên con đường vắt vẻo lưng chừng trời nhìn xuống, quý khách được dịp chiêm ngưỡng một bức tranh thiên nhiên thanh bình, xinh đẹp. Đến Sủng Là thăm nhà cổ H’mong nơi quay bộ phim \"Chuyện của Pao\".\r\nTrưa: Dùng cơm trưa.\r\n•	Đoàn đến khu di tích nhà vua mèo Vương Chí Sình một dinh thự của bậc đế vương xưa, là một công trình có kiến trúc đẹp, hiếm có và rất độc đáo của Hà Giang..\r\n•	Quý khách đến tham quan cột cờ Lũng Cú, mảnh đất địa đầu Tổ quốc. Đứng trên đỉnh cột cờ, Quý khách sẽ thấy toàn bộ làng văn hóa Lô Lô, phóng xa tầm mắt sẽ thấy những con đường nhỏ xíu, uốn lượn quanh những cánh đồng lúa, những ngôi nhà nhà lọt thỏm giữa màu xanh của cây cối.\r\nTối: Dùng cơm tối. Nghỉ đêm tại Đồng Văn.', 'Sáng: Dùng bữa sáng.\r\n•	Đoàn tiếp tục khởi hành đến Mèo Vạc, trên đường dừng chân ngắm cảnh đèo Mã Phì Lèng, một trong \"tứ đại đỉnh đèo\" tại vùng núi phía Bắc Việt Nam, Mã Phì Lèng nằm giữa cao nguyên đá Đồng Văn, một bên là vách núi Mã Pí Lèng cao dựng đứng và một bên là sông Nho Quế thơ mộng.\r\n•	Đoàn lên thuyền, du thuyền trên Hẻm Tu sản – Sông Nho Quế. Sông Nho Quế chảy vào Việt Nam từ địa phận thôn Séo Lủng, xã Lũng Cú, huyện Đồng Văn đi qua Hẻm núi Tu Sản rồi chảy dọc đèo Mã Pì Lèng, khi đến Mèo Vạc thì chảy theo hướng Đông vào địa phận Cao Bằng rồi đổ vào Sông Gâm.\r\n•	Hẻm vực Tu Sản được coi là hẻm vực sâu nhất Đông Nam Á và nằm trong thung lũng có kiến tạo địa chất độc nhất vô nhị ở Việt Nam. Hẻm vực mang vẻ đẹp nên thơ, kỳ bí như sợi chỉ màu ngọc bích huyền ảo, ẩn hiện giữa núi rừng Đông Bắc hiểm trở (chi phí xe ôm và thuyền tự túc).\r\nTrưa: Dùng cơm trưa.\r\n•	Đến thị trấn Mèo Vạc, nếu vào đúng dịp chợ phiên (được mở vào chủ nhật hàng tuần), là nơi hội tụ tinh hoa văn hoá của các dân tộc thiểu số vùng cao nguyên đá của Hà Giang, chợ phiên Mèo Vạc ẩn chứa trong đó những nét độc đáo khó trộn lẫn với bất cứ chợ nào. Ngoài ra, Mèo Vạc còn hấp dẫn du khách nhờ những món đặc sản như: thịt bò khô, đậu xi, chè xanh Tát Ngà, rượu ngô Ha Ía và các loại thuốc dân gian truyền thống các dân tộc.\r\nTối: Đoàn đến Cao Bằng dùng cơm tối. Nghỉ đêm tại Cao Bằng', 'Sáng: Dùng bữa sáng.\r\n•	Đoàn tiếp tục đến tham quan thác Bản Giốc – nằm tại biên giới giữa Việt Nam và Trung Quốc, Quý khách cảm nhận được thiên nhiên hùng vĩ cảnh đẹp hữu tình, thác Bản Giốc là một trong ba thác nước tự nhiên 3 tầng đẹp nhất Đông Nam Á\r\nTrưa: Dùng cơm trưa.\r\n•	Đoàn khởi hành tham quan Động Ngườm Ngao, động đá vôi được hình thành cách đây 300 triệu năm trước Công Nguyên. Cùng với thời gian, những nhũ đá và măng đá đã tạo nên những khung cảnh thật sinh động, kì thú khiến con người phải thán phục, kinh ngạc.\r\nTối: Dùng cơm tối. Nghỉ đêm tại Cao Bằng.', 'Sáng: Dùng bữa sáng.\r\n•	Tham quan di tích Pắc Pó, nơi Chủ tịch Hồ Chí Minh chọn làm chỗ ở sau hơn 30 năm bôn ba ở nước ngoài trở về Tổ quốc (08/02/1941) để trực tiếp lãnh đạo cách mạng Việt Nam với hang Bo Bam, bãi Cò Rạc, hang Cốc Pó, suối Lê-nin, núi Các Mác, suối Nậm.\r\n•	Đoàn ghé thăm Khu di tích anh hùng liệt sỹ Kim Đồng, thuộc Cụm di tích lịch sử cách mạng, nơi ghi nhớ công lao của người Anh hùng và khắc ghi nơi thành lập Đội nhi đồng cứu quốc đầu tiên. \r\nTrưa: Dùng cơm trưa.\r\n•	Đoàn tiếp tục đến Khu du lịch Hồ Ba Bể.\r\nTối: Dùng cơm tối. Nghỉ đêm tại Khu du lịch Ba Bể.', 'Sáng: Dùng bữa sáng.\r\n•	Đoàn xuống thuyền khám phá phong cảnh thiên nhiên kỳ thú của hồ Ba Bể - được ví như Vịnh Hạ Long thu nhỏ của tỉnh Bắc Kạn và được người xưa phong tặng \"Thiên nhiên đệ nhất Ba Hồ\". Quý khách đi thuyền tham quan động Puông, Ao Tiên,… tìm hiểu đời sống của người dân tộc Tày, Nùng.\r\n•	Dừng chân tại Đảo Bà Góa, một hòn đảo nhỏ xinh xắn nằm ngay vị trí trong tâm của Hồ, gắn liền với sự tích hình thành của Hồ. \r\nTrưa: Dùng cơm trưa.\r\n•	Đoàn khởi hành về Hà Nội.\r\n•	Hướng dẫn viên tiễn đoàn ra sân bay Nội Bài đón chuyến bay về TP.HCM.\r\n•	Kết thúc chuyến tham quan, chia tay đoàn và hẹn gặp lại.', NULL, '2024-12-19 01:22:01', '2024-12-19 01:22:01'),
(20, 'NGÀY 1 | TP.HCM – ĐÀ LẠT', 'NGÀY 2 | MONGOLAND – CHÙA THIÊN VƯƠNG CỔ SÁT', 'NGÀY 3 | ĐÀ LẠT – TP.HCM', NULL, NULL, NULL, NULL, 'Sáng: Xe và Hướng Dẫn Viên Du Lịch Việt đón Quý khách tại điểm hẹn khởi hành đi Đà Lạt. \r\n- 5h30 Sáng tại Công Ty Du Lịch Việt – Số 217 Bis Nguyễn Thị Minh Khai , Quận 1 . \r\n- 6h00 : Nhà Văn Hóa Thanh Niên – Số 4 Phạm Ngọc Thạch, Quận 1 \r\n-7h00 Ngã 4 Thủ Đức – Xa Lộ Hà Nội, TP Hồ Chí Minh (không có điểm gửi xe máy) \r\n– Ngã 4 Amata – Biên Hòa, Đồng Nai\r\nĐoàn dùng bữa sáng tại Ngã Ba Dầu Dây. Đoàn tiếp tục khởi hành đến TP. Đà Lạt. Sau đó tiếp tục hành trình đến với Đà Lạt, xe đi theo đường QL20 trên đường đi HDV sẽ giới thiệu về các thắng cảnh nổi tiếng, Cầu La Ngà, Đá Ba Chồng.\r\nTrưa: Dùng cơm trưa tại nhà hàng.\r\nTham quan Thác Pongour: Nét quyến rũ hoang sơ, dữ dội nhưng cũng không kém phần thơ mộng, của thác Pongour đã khắc hoạ một khía cạnh đặc trưng của Đà Lạt nguyên bản.\r\n– Sau đó xe và HDV đưa khách đi trên cung đường đèo Mimosa – một trong những trục đường chính dẫn vào thành phố Đà Lạt. So với đèo Ngoạn Mục đầy thách thức, đèo Prenn hiểm trở. Thì đèo Mimosa lại mang vẻ đẹp nữ tính, hiền hòa và quyến rũ du khách gần xa. \r\nSau đó đoàn về khách sạn nhận phòng nghỉ ngơi và thư giãn. \r\nTối : Quý khách dùng bữa tối tự túc, tự do khám phá chợ Đà Lạt, Thưởng thức những món ngon như: sữa đậu nành nóng, bánh ướt lòng gà, bánh căn Đà Lạt, bánh tráng nướng, món nướng (Hướng dẫn viên chia sẻ quán ngon gửi đến quý khách).\r\nQuý khách tự túc dạo thành phố Đà Lạt về đêm, ngắm cảnh Hồ Xuân Hương, thưởng thức hương vị cà phê phố núi', 'Sáng: Dùng bữa sáng.\r\n07h30: Xe đưa quý khách đến với khu du lịch MongoLand. Mongo Land: mang vẻ đẹp hoàn toàn mới lạ – một “tiểu Mông Cổ thu nhỏ” trong lòng Đà Lạt được thiết kế như một nông trại với những chiếc lều đủ màu sắc. Tất cả đều được bài trí độc đáo, bắt mắt theo phong cách Mông Cổ đặc trưng. Đến đây, ngoài việc tận hưởng bầu không khí trong lành và chiêm ngưỡng vẻ đẹp của thiên nhiên hùng vĩ, Quý khách sẽ được trải nghiệm:\r\n•	Thỏa thích chụp ảnh tại lều mông cổ, xích đu, nông trại âu, thảm cỏ, sa mạc xương rồng,…\r\n•	Hòa mình vào thế giới của động vật: hươu sao, dê mini, cừu, thỏ Việt, thỏ Holland Lop Hà Lan, thỏ Sư Tử, chim Yến, Chinchilla, sóc Chipmunk,… và tự tay cho thú ăn (thức ăn sẽ được Mongo Land chuẩn bị sẵn cho quý khách). \r\n•	Tham gia các hoạt động vui chơi như: trượt cỏ, bắn cung\r\n•	Trở thành những cô nàng, chàng trai du mục thực thụ khi diện trên mình trang phục người Mông Cổ. (Chi phí thuê trang phục tự túc).\r\nTrưa: Dùng bữa trưa.\r\n•	Tham quan nhà thờ Domaine \r\n•	Chùa Thiên Vương Cổ Sát thu hút nhiều du khách ghé thăm nhờ nét cổ kính và kiến trúc khác biệt. Chùa chỉ cách trung tâm thành phố Đà Lạt 5km về hướng Đông Bắc và nằm bình yên bên ngọn đồi Rồng, có cây cối bao quanh. Nhờ không gian tĩnh lặng tách biệt mà du khách khi đến nơi đây sẽ có cảm giác như tâm bình lặng, thanh thản, trốn khỏi những gánh nặng thường nhật. Chùa Tàu Đà Lạt thuộc dòng Hoa Nghiêm Tông Trung Quốc với tôn chỉ là vạn vật bình đẳng và đều liên hệ nhau. \r\n•	Quảng trường Lâm Viên với tuyệt tác kiến trúc bằng kính: Bông Hoa Dã Quỳ và Nụ Hoa Atiso.    \r\n \r\nTối: Quý khách dùng bữa tối tự túc, tự do khám phá chợ Đà Lạt, Thưởng thức những món ngon như: sữa đậu nành nóng, bánh ướt lòng gà, bánh căn Đà Lạt, bánh tráng nướng, món nướng (Hướng dẫn viên chia sẻ quán ngon gửi đến quý khách).\r\nQuý khách tự túc dạo thành phố Đà Lạt về đêm.', 'Sáng: Dùng bữa sáng, trả phòng.\r\n•	Ghé chợ Đà Lạt tự do mua sắm các sản phẩm lưu niệm, đặc sản và rau củ quả về làm quà cho gia đình và người thân.\r\n•	Tham quan vườn cà phê chồn và cà phê voi Phú An – Vườn cà phê chồn và cà phê voi Phú An đã hoàn thiện mô hình phức hợp nhà hàng, điểm dừng chân tham quan có quần thể voi, chồn lớn nhất Việt Nam gồm hơn 2000 chú chồn Hương, 09 chú voi Châu Á & dây chuyền sản xuất cà phê thủ công cho sản lượng 12 tấn cà phê chồn & 15 tấn cà phê voi thành phẩm mỗi năm.\r\nTrưa: Khởi hành về TP.HCM, đến Bảo Lộc dùng cơm trưa. \r\nĐoàn khởi hành về HCM . \r\nTrên đường về xe có ghé 1 hoặc 2 điểm để quý khách có thể vệ sinh cá nhân và nghỉ ngơi.\r\nĐến TP.HCM. Kết thúc chuyến đi, chia tay đoàn và hẹn gặp lại Quý khách', NULL, NULL, NULL, NULL, '2024-12-19 01:25:08', '2024-12-19 01:25:08'),
(21, 'sgsg', 'sdgsgs', 'dhdh', NULL, NULL, NULL, NULL, 'sgsgsg', 'sdgsgs', 'dfhdhdf', NULL, NULL, NULL, NULL, '2024-12-25 22:47:38', '2024-12-25 22:47:38'),
(22, 'NGÀY 01| TP.HCM – HÀ NỘI', 'NGÀY 02| HÀ NỘI – SAPA', 'NGÀY 03| SAPA – FANSIPAN – LÀO CAI', 'NGÀY 04| LÀO CAI – NỘI BÀI – TPHCM', NULL, NULL, NULL, 'Buổi sáng, quý khách tập trung tại Cổng D2 – Ga đi trong nước – SB.Tân Sơn Nhất. Hướng dẫn viên Lữ hành Saigontourist đón quý khách và hỗ trợ làm thủ tục. Khởi hành ra Hà Nội trên chuyến bay VN206 lúc 06h00. Đáp xuống sân bay Nội Bài. Xe đưa đoàn đi tham quan hồ Tây, viếng Chùa Trấn Quốc. Buổi chiều, đoàn tham quan Hoàng Thành Thăng Long – ngắm cột cờ Hà Nội. Buổi tối, đoàn tự do dạo quanh phố đi bộ Hồ Gươm, khám phá “36 phố phường” – khu phố cổ với những ngành nghề đặc trưng và truyền thống của cư dân Thủ Đô, tự túc trải nghiệm chương trình đêm tại Văn Miếu Quốc Tử Giám với chủ đề “Tinh Hoa Đạo Học” trong khung 19h – 22h thứ 4, thứ 7 & CN hàng tuần. Nghỉ đêm tại Hà Nội.', 'Buổi sáng, đoàn trải nghiệm hệ thống thuyết minh tự động (audioguide), tham quan và tìm hiểu về di tích nhà tù Hỏa Lò giữa lòng Thủ Đô. Khởi hành đến Lào Cai theo tuyến đường cao tốc Nội Bài – Lào Cai, ngang qua các tỉnh Vĩnh Phúc, Phú Thọ, Yên Bái. Đến Lào Cai tiếp tục lên Sapa. Chiêm ngưỡng dãy Hoàng Liên Sơn trên đường đi. Buổi tối, đoàn tự do ngắm nhà thờ đá, dạo chợ Sapa. Nghỉ đêm tại Sapa.', 'Sau bữa sáng, đoàn trải nghiệm tàu hỏa leo núi ngắm cảnh thung lũng Mường Hoa trên cung đường đến ga cáp treo Fansipan, quý khách tự túc chi phí trải nghiệm cáp treo, chinh phục đỉnh Fansipan với hệ thống cáp treo 3 dây hiện đại cảm giác đi giữa biển mây. Viếng khu tâm linh Fansipan, vượt gần 600 bậc thang, chinh phục “Nóc nhà Đông Dương” – đỉnh Fansipan 3,143m. Buổi chiều, đoàn tham quan bản Cát Cát. Xe đón đoàn về Lào Cai. Nghỉ đêm tại Lào Cai.', 'Sau bữa sáng, đoàn tham quan cột mốc biên giới và cửa khẩu quốc tế Lào Cai, mua sắm tại chợ Cốc Lếu. Khởi hành về Hà Nội. Trên hành trình, đoàn dừng chân tại Phú Thọ, thăm đình cổ, làng cổ Hùng Lô. Xe đưa đoàn ra sân bay Nội Bài để về TPHCM trên chuyến bay VN265 lúc 20h30. Kết thúc chương trình.', NULL, NULL, NULL, '2024-12-26 01:40:23', '2024-12-26 01:40:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'approved'),
(3, 'rejected');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id` int UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `enterprise_id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tour_time` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `departure_date` date NOT NULL,
  `schedule_id` int NOT NULL,
  `hotel_id` int NOT NULL,
  `vehicle_id` int NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `status_id` int NOT NULL,
  `approved_by` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`id`, `category_id`, `enterprise_id`, `name`, `description`, `tour_time`, `departure_date`, `schedule_id`, `hotel_id`, `vehicle_id`, `price`, `status_id`, `approved_by`, `deleted_at`, `create_at`, `update_at`) VALUES
(69, 15, 13, 'Tour du lịch Đà Lạt', 'Du lịch Đà Lạt sẽ đưa quý khách đến với thành phố nổi tiếng bậc nhất Việt Nam với sự thơ mộng và lãng mạn đặc trưng của mình. Đà Lạt được ví như một Paris thu nhỏ với view đẹp, thu hút lượng khách du lịch lớn mỗi năm trải nghiệm, khám phá. Du lịch Đà Lạt hẳn là ai cũng muốn tìm và ngắm những địa điểm view đẹp. Đà Lạt là một địa điểm du lịch, nghỉ dưỡng lý tưởng được đông đảo lượng khách du lịch đổ về hằng năm. Được thiên nhiên ưu ái ban cho Đà Lạt cảnh quan thơ mộng trữ tình với rừng núi hùng vỹ, xanh bạt ngàn. Còn gì tuyệt vời hơn khi vừa có chuyến nghỉ dưỡng đúng nghĩa vừa lưu lại được những kỉ niệm của cả chuyến đi khám phá vùng đất cũ mà lại mới này.', '3 ngày 2 đêm', '2024-12-22', 6, 32, 2, 4399000, 2, NULL, NULL, '2024-12-18 23:35:47', '2025-01-01 23:55:54'),
(70, 14, 13, 'Tour du lịch Sapa', 'Sapa là một trong những điểm đến có phong cảnh và nét đẹp văn hóa độc đáo ở phía Bắc Việt Nam, với độ cao khoảng 1500- 1650m so mực nước biển. Sapa là vùng đất của sự giản dị yên bình nhưng ẩn giấu vô số những cảnh sắc thiên nhiên tuyệt vời và Sapa cũng là nơi sinh sống của các dân tộc trên núi như: H’Mong đen, Dao Đỏ, Tày, Dáy... Du lịch Sapa du khách như quên đi tất cả, chỉ tận hưởng bầu không khí trong lành, những đám mây, bầu trời, khung cảnh lãng mạn, những thửa ruộng bậc thang kzỳ vĩ, những điểm du lịch đầy thú vị. Với nhiệt độ trung bình từ 14 đến 17 độ C sẽ thuận tiện hơn cho những chuyến thăm đến các làng bản cũng như việc chinh phục đỉnh Phan Xi Păng.', '3 ngày 2 đêm', '2024-12-25', 7, 33, 4, 15000000, 2, NULL, NULL, '2024-12-18 23:54:45', '2024-12-19 01:41:02'),
(71, 15, 13, 'Tour du lịch Nha Trang', 'Du lịch Nha Trang.Thành phố biển Nha Trang nổi tiếng với những cảnh quan thiên nhiên đẹp “mê hoặc” lòng người, hàng năm thu hút hàng trăm ngàn du khách cả trong và ngoài nước đến thăm quan nghỉ dưỡng. Nếu bạn đang tìm kiếm một chuyến du lịch đúng nghĩa nghỉ dưỡng thì Tour du lịch Nha Trang là sự lựa chọn tuyệt vời dành cho bạn.Đến với Thành phố biển Nha Trang bạn sẽ được thăm quan ngắm cảnh với rất nhiều những danh lam thắng cảnh nổi tiếng, được thử trải nghiệm câu tôm trên thuyền khi mặt trời đã ngả bóng,... Được thưởng thức nhiều món ăn hấp dẫn, cùng khí hậu mát mẻ,... Hứa hẹn đây sẽ là một kỳ nghỉ đầy thú vị và ý nghĩa dành cho bạn.', '3 ngày 2 đêm', '2024-12-29', 8, 35, 3, 6599000, 1, NULL, NULL, '2024-12-18 23:58:54', '2024-12-18 23:58:54'),
(72, 15, 13, 'Tour du lịch Đà Nẵng', 'Du lịch Đà Nẵng. Thành phố  Đà Nẵng là một trong những điểm du lịch nghỉ dưỡng lý tưởng cho du khách với nhiều danh thắng tuyệt đẹp làm say lòng người như Ngũ Hành Sơn, Bà Nà, bán đảo Sơn Trà, đèo Hải Vân, sông Hàn thơ mộng và biển Mỹ Khê đẹp nhất hành tinh', '3 ngày 2 đêm', '2024-12-26', 9, 37, 2, 4000000, 2, NULL, NULL, '2024-12-19 00:03:40', '2024-12-19 02:17:28'),
(73, 14, 13, 'Tour du lịch Hạ Long', 'Tour du lịch Hạ Long mang đến trải nghiệm khám phá Vịnh Hạ Long – di sản thiên nhiên thế giới với hàng ngàn hòn đảo đá vôi kỳ vĩ, hang động huyền ảo và nước biển trong xanh. Du khách sẽ tham quan các địa danh nổi tiếng như Động Thiên Cung, Hang Sửng Sốt, hòn Trống Mái, và trải nghiệm các hoạt động như chèo thuyền kayak, tắm biển hoặc ngắm hoàng hôn trên du thuyền. Đây là hành trình lý tưởng để thư giãn, hòa mình vào thiên nhiên và thưởng thức hải sản tươi ngon.', '4 ngày 3 đêm', '2025-01-05', 10, 39, 4, 15299000, 2, NULL, NULL, '2024-12-19 00:07:02', '2024-12-26 01:14:55'),
(74, 16, 21, 'Tour du lịch Vũng Tàu', 'Vũng Tàu là một thành phố biển xinh đẹp, nằm cách trung tâm TP.Hồ Chí Minh khoảng 125 km về phía Đông Nam. Đây là một trong những điểm du lịch nổi tiếng tại miền Nam Việt Nam, thu hút du khách nhờ bờ biển trải dài, cảnh quan thiên nhiên tươi đẹp và khí hậu mát mẻ quanh năm.', '3 ngày 2 đêm', '2024-12-25', 11, 42, 2, 1420000, 1, NULL, NULL, '2024-12-19 00:43:57', '2024-12-19 00:43:57'),
(75, 15, 21, 'Tour du lịch Quy Nhơn', 'Du lịch Quy Nhơn Là một trong những thiên đường du lịch hấp dẫn nhất hiện nay. Quy Nhơn có sự kết hợp hài hòa giữa núi và biển cùng khí hậu ôn hòa hứa hẹn sẽ mang đến cho du khách một kỳ nghỉ ấn tượng. Đến với tour du lịch Quy Nhơn du khách không những được chiêm ngưỡng vẻ đẹp hoang sơ, hiếm có của những bãi biển xanh, những bờ cát trắng trải dài như: Bãi Dứa, Eo Gió Kỳ Co...Mà còn được tận hưởng nắng gió miền Trung và tham quan những địa điểm nổi tiếng như khu du lịch Hầm Hô, Tháp Đôi...', '4 ngày 3 đêm', '2024-12-24', 12, 43, 4, 10900000, 2, NULL, NULL, '2024-12-19 00:47:43', '2024-12-19 01:41:36'),
(76, 16, 21, 'Tour du lịch Mỹ Tho', 'Mỹ Tho, thành phố thuộc Tiền Giang, nổi tiếng với vẻ đẹp sông nước và văn hóa miệt vườn đặc sắc. Du khách có thể chèo thuyền trên sông Tiền, tham quan các cồn như Cồn Thới Sơn và Cồn Phụng để thưởng thức trái cây tươi, trà mật ong, xem làm kẹo dừa và nghe đờn ca tài tử. Chùa Vĩnh Tràng với kiến trúc độc đáo là điểm đến thanh tịnh không thể bỏ qua. Ngoài ra, du khách còn được thưởng thức đặc sản như hủ tiếu Mỹ Tho, cá tai tượng chiên xù và trải nghiệm cuộc sống miệt vườn bình dị của miền Tây.', '2 ngày 1 đêm', '2024-12-28', 13, 45, 2, 4900000, 2, NULL, NULL, '2024-12-19 00:51:41', '2024-12-19 01:41:28'),
(77, 16, 21, 'Tour du lịch Côn Đảo', 'Nhắc đến Côn Đảo người am hiểu lịch sử sẽ nghĩ ngay đến một trong những nhà tù thực dân gây ám ảnh nhất Đông Dương - nơi gắn liền với dãy \"chuồng cọp\" tứ bề kẽm gai hay phòng biệt giam không nhìn thấy ánh sáng mặt trời. Chiến tranh đã qua đi, trả lại cho Côn Đảo diện mạo hiền hoà và đầy sức sống vốn có. Du khách đến đây chẳng những được hoà mình cùng vùng nước biển ấm áp, trong lành mà có thể thoả mãn niềm đam mê ăn uống với vô số món hải sản tươi sống, giá rẻ. Thiên nhiên trù phú và thơ mộng là điểm cộng nhưng Côn Đảo vốn dĩ là địa điểm du lịch tâm linh nổi tiếng Việt Nam, với vô số đền, chùa, miếu cùng những giai thoại huyền bí được lưu truyền trong dân gian. Tham gia mang đến cho bạn cái nhìn trực diện về vùng đất đã trải quá quá nhiều thương đau trong quá khứ; đồng thời, tìm hiểu về đời sống tinh thần rất đặc biệt của người dân bản địa.', '3 ngày 2 đêm', '2024-12-30', 14, 48, 3, 7550000, 1, NULL, NULL, '2024-12-19 00:54:33', '2024-12-19 00:54:33'),
(78, 16, 21, 'Tour du lịch Châu Đốc', 'Châu Đốc, thành phố thuộc tỉnh An Giang, nổi tiếng với cảnh sắc sông nước miền Tây và văn hóa tâm linh đặc sắc. Nằm bên sông Hậu, Châu Đốc thu hút du khách với Miếu Bà Chúa Xứ Núi Sam, điểm hành hương linh thiêng bậc nhất miền Nam. Ngoài ra, du khách có thể tham quan Lăng Thoại Ngọc Hầu, Tây An Cổ Tự và chùa Hang mang đậm nét kiến trúc độc đáo. Chợ nổi Châu Đốc và làng Chăm ven sông cũng là những địa điểm hấp dẫn để trải nghiệm cuộc sống địa phương. Đến Châu Đốc, đừng quên thưởng thức đặc sản như mắm cá linh, bún cá và các món ăn đậm chất miền Tây sông nước.', '3 ngày 2 đêm', '2024-12-29', 15, 51, 2, 4000000, 2, NULL, NULL, '2024-12-19 00:57:45', '2024-12-19 01:40:49'),
(79, 15, 20, 'Tour du lịch Nha Trang', 'Du lịch Nha Trang.Thành phố biển Nha Trang nổi tiếng với những cảnh quan thiên nhiên đẹp “mê hoặc” lòng người, hàng năm thu hút hàng trăm ngàn du khách cả trong và ngoài nước đến thăm quan nghỉ dưỡng. Nếu bạn đang tìm kiếm một chuyến du lịch đúng nghĩa nghỉ dưỡng thì Tour du lịch Nha Trang là sự lựa chọn tuyệt vời dành cho bạn.Đến với Thành phố biển Nha Trang bạn sẽ được thăm quan ngắm cảnh với rất nhiều những danh lam thắng cảnh nổi tiếng, được thử trải nghiệm câu tôm trên thuyền khi mặt trời đã ngả bóng,... Được thưởng thức nhiều món ăn hấp dẫn, cùng khí hậu mát mẻ,... Hứa hẹn đây sẽ là một kỳ nghỉ đầy thú vị và ý nghĩa dành cho bạn.', '4 ngày 3 đêm', '2024-12-29', 16, 36, 3, 6000000, 2, NULL, NULL, '2024-12-19 01:10:55', '2024-12-19 01:40:52'),
(80, 15, 20, 'Tour du lịch Đà Nẵng', 'Du lịch Đà Nẵng. Thành phố  Đà Nẵng là một trong những điểm du lịch nghỉ dưỡng lý tưởng cho du khách với nhiều danh thắng tuyệt đẹp làm say lòng người như Ngũ Hành Sơn, Bà Nà, bán đảo Sơn Trà, đèo Hải Vân, sông Hàn thơ mộng và biển Mỹ Khê đẹp nhất hành tinh', '3 ngày 2 đêm', '2024-12-26', 17, 38, 2, 6000000, 2, NULL, NULL, '2024-12-19 01:14:26', '2024-12-19 01:41:17'),
(81, 15, 20, 'Tour du lịch Quy Nhơn', 'Du lịch Quy Nhơn Là một trong những thiên đường du lịch hấp dẫn nhất hiện nay. Quy Nhơn có sự kết hợp hài hòa giữa núi và biển cùng khí hậu ôn hòa hứa hẹn sẽ mang đến cho du khách một kỳ nghỉ ấn tượng. Đến với tour du lịch Quy Nhơn du khách không những được chiêm ngưỡng vẻ đẹp hoang sơ, hiếm có của những bãi biển xanh, những bờ cát trắng trải dài như: Bãi Dứa, Eo Gió Kỳ Co...Mà còn được tận hưởng nắng gió miền Trung và tham quan những địa điểm nổi tiếng như khu du lịch Hầm Hô, Tháp Đôi...', '4 ngày 3 đêm', '2024-12-29', 18, 44, 3, 8000000, 2, NULL, NULL, '2024-12-19 01:17:57', '2024-12-27 18:16:02'),
(82, 14, 20, 'Tour du lịch Cao Bằng', 'Cao Bằng, tỉnh miền núi phía Đông Bắc Việt Nam, nổi tiếng với cảnh quan thiên nhiên hùng vĩ và lịch sử hào hùng. Du khách đến Cao Bằng không thể bỏ qua thác Bản Giốc, một trong những thác nước đẹp nhất Việt Nam, với làn nước trong xanh đổ xuống từ độ cao ấn tượng. Động Ngườm Ngao kỳ vĩ với những khối thạch nhũ độc đáo cũng là điểm đến hấp dẫn. Ngoài ra, suối Lê-nin và hang Pác Bó là di tích lịch sử gắn liền với hoạt động cách mạng của Chủ tịch Hồ Chí Minh. Cao Bằng còn thu hút du khách bởi ẩm thực đặc sắc như phở chua, bánh cuốn trứng và hương vị ấm áp của vùng núi cao.', '6 ngày 5 đêm', '2024-12-29', 19, 50, 4, 10000000, 2, NULL, NULL, '2024-12-19 01:22:01', '2024-12-19 01:41:30'),
(83, 15, 20, 'Tour du lịch Đà Lạt', 'Du lịch Đà Lạt sẽ đưa quý khách đến với thành phố nổi tiếng bậc nhất Việt Nam với sự thơ mộng và lãng mạn đặc trưng của mình. Đà Lạt được ví như một Paris thu nhỏ với view đẹp, thu hút lượng khách du lịch lớn mỗi năm trải nghiệm, khám phá. Du lịch Đà Lạt hẳn là ai cũng muốn tìm và ngắm những địa điểm view đẹp. Đà Lạt là một địa điểm du lịch, nghỉ dưỡng lý tưởng được đông đảo lượng khách du lịch đổ về hằng năm. Được thiên nhiên ưu ái ban cho Đà Lạt cảnh quan thơ mộng trữ tình với rừng núi hùng vỹ, xanh bạt ngàn. Còn gì tuyệt vời hơn khi vừa có chuyến nghỉ dưỡng đúng nghĩa vừa lưu lại được những kỉ niệm của cả chuyến đi khám phá vùng đất cũ mà lại mới này.', '3 ngày 2 đêm', '2025-01-04', 20, 32, 3, 3000000, 2, NULL, NULL, '2024-12-19 01:25:08', '2024-12-19 01:40:44'),
(84, 16, 13, 'Du lịch Cao Bằng 123', 'dbgdhd', '3 ngày 2 đêm', '2024-12-29', 21, 46, 2, 5899000, 3, NULL, NULL, '2024-12-25 22:47:38', '2024-12-25 22:49:15'),
(85, 14, 23, 'Tour du lịch SaPa', 'Sapa là một trong những điểm đến có phong cảnh và nét đẹp văn hóa độc đáo ở phía Bắc Việt Nam, với độ cao khoảng 1500- 1650m so mực nước biển. Sapa là vùng đất của sự giản dị yên bình nhưng ẩn giấu vô số những cảnh sắc thiên nhiên tuyệt vời và Sapa cũng là nơi sinh sống của các dân tộc trên núi như: H’Mong đen, Dao Đỏ, Tày, Dáy... Du lịch Sapa du khách như quên đi tất cả, chỉ tận hưởng bầu không khí trong lành, những đám mây, bầu trời, khung cảnh lãng mạn, những thửa ruộng bậc thang kzỳ vĩ, những điểm du lịch đầy thú vị. Với nhiệt độ trung bình từ 14 đến 17 độ C sẽ thuận tiện hơn cho những chuyến thăm đến các làng bản cũng như việc chinh phục đỉnh Phan Xi Păng', '4 ngày 3 đêm', '2024-12-30', 22, 34, 4, 9999000, 2, NULL, NULL, '2024-12-26 01:40:23', '2024-12-26 01:42:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_category`
--

CREATE TABLE `tour_category` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tour_category`
--

INSERT INTO `tour_category` (`id`, `name`, `create_at`, `update_at`) VALUES
(14, 'Du Lịch Miền Bắc', NULL, NULL),
(15, 'Du Lịch Miền Trung', NULL, NULL),
(16, 'Du Lịch Miền Nam', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_guide`
--

CREATE TABLE `tour_guide` (
  `id` int UNSIGNED NOT NULL,
  `enterprise_id` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender_id` int NOT NULL,
  `year_of_birth` int NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tour_guide`
--

INSERT INTO `tour_guide` (`id`, `enterprise_id`, `name`, `gender_id`, `year_of_birth`, `phone`, `deleted_at`, `create_at`, `update_at`) VALUES
(28, 13, 'Nguyễn Bùi Quốc Lâm', 1, 2000, '0346021604', NULL, '2024-12-25 19:57:15', '2024-12-25 19:57:15'),
(29, 13, 'Nguyễn Viết Minh Quang', 1, 2003, '0346021604', NULL, '2024-12-25 19:57:30', '2024-12-25 19:57:30'),
(30, 13, 'Nguyễn Ngọc Linh', 2, 2002, '0933230018', NULL, '2024-12-25 19:57:43', '2024-12-25 19:57:43'),
(31, 13, 'Trịnh Trần Phương Tuấn', 1, 1997, '0798405872', NULL, '2024-12-25 19:58:07', '2024-12-25 19:58:07'),
(32, 23, 'Trương Văn Bảo Anh', 1, 2000, '0987415236', NULL, '2024-12-26 01:46:50', '2024-12-26 01:46:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@localhost', '2024-05-30 05:49:29', '$2y$12$DDS8S/BUeAdFJnZLyRyAJOrvFz/lzLTDOIJnw/7wF6F3JFPZmxUy2', NULL, '2024-05-30 05:49:29', '2024-05-30 05:49:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `seat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`, `seat`) VALUES
(1, 'xe khách(16)', 16),
(2, 'xe khách(24)', 24),
(3, 'xe khách(35)', 35),
(4, 'máy bay', 100);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `enterprise`
--
ALTER TABLE `enterprise`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `enterprise_info`
--
ALTER TABLE `enterprise_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hotel_category`
--
ALTER TABLE `hotel_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `representative`
--
ALTER TABLE `representative`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tour_category`
--
ALTER TABLE `tour_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tour_guide`
--
ALTER TABLE `tour_guide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `enterprise`
--
ALTER TABLE `enterprise`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `enterprise_info`
--
ALTER TABLE `enterprise_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `hotel_category`
--
ALTER TABLE `hotel_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `representative`
--
ALTER TABLE `representative`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `tour_category`
--
ALTER TABLE `tour_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tour_guide`
--
ALTER TABLE `tour_guide`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
