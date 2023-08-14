-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 26, 2022 lúc 06:16 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom13`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id_pr` int(11) NOT NULL,
  `sugar` bit(1) NOT NULL DEFAULT b'1',
  `size` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

-- INSERT INTO `carts` (`id_pr`, `sugar`, `size`, `id_user`, `amount`, `price`) VALUES
-- (4, b'1', 's', 2, 1, 35000),
-- (8, b'1', 's', 2, 1, 35000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `price` float NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id_order` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_lists`
--

CREATE TABLE `order_lists` (
  `id_order` int(11) DEFAULT NULL,
  `id_pr` int(11) NOT NULL,
  `sugar` bit(1) DEFAULT b'1',
  `size` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `price_s` float NOT NULL,
  `price_m` float NOT NULL,
  `price_l` float NOT NULL,
  `amount` int(11) DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price_s`, `price_m`, `price_l`, `amount`) VALUES
(4, 'Đồng hồ Gucci YA136209A', 'https://product.hstatic.net/1000269795/product/ya136209a_4670ad3d7a4b48e4aff44e87de0d5610_fe9b144dec7a49138630c8fbca39fe7c.jpg', 30888000,34580000 , 39900000, 5),
(5, 'Đồng hồ Maurice Lacroix AI1018-TT030-130-K', 'https://product.hstatic.net/1000269795/product/ai1018-tt030-130-k_bd0da2722be94c56adc6c88a90032824_f46de8cf828d461aaa0ac2fb7b3b71b2.jpg', 42315000, 45002000, 49570000, 6),
(7, 'Đồng hồ Maurice Lacroix AI1018-SS002-330-1', 'https://product.hstatic.net/1000269795/product/ai1018-ss002-330-1_99d79fe8d324493e8161a96e94d23137_6f44095eb3544ab6a955aa2e82c0c8ae.jpg', 35490000, 40198000, 460205000, 9),
(8, 'Đồng hồ Gucci YA136201', 'https://product.hstatic.net/1000269795/product/ya136201_82830a40123d4a49b60ba4f2aecbb00a.jpg', 198000000, 220000000, 232508000, 1),
(9, 'Đồng hồ Maurice Lacroix AI6098-SS001-091-2', 'https://product.hstatic.net/1000269795/product/ai6098-ss001-091-2_3e4d4b2f547c4588af50de1e6b5acb4c_ab2d1b02c4df4deb8397f38c605816b7.jpg', 210210000, 235210000, 250810000, 1),
(13, 'Đồng hồ Longines L2.773.4.92.6', 'https://product.hstatic.net/1000269795/product/l2.773.4.92.6_233e5d0e8f164e3192cde663a23b37f2.jpg', 90210000, 135210000, 150810000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `name`, `phone`, `address`, `level`) VALUES
(2, 'admin@gmail.com', 'admin123', 'toi là admin', '', '', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id_pr`,`id_user`) USING BTREE,
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `order_lists`
--
ALTER TABLE `order_lists`
  ADD KEY `id_pr` (`id_pr`),
  ADD KEY `id_order` (`id_order`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`id_pr`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `order_lists`
--
ALTER TABLE `order_lists`
  ADD CONSTRAINT `order_lists_ibfk_1` FOREIGN KEY (`id_pr`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_lists_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
