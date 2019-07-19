-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 19, 2019 lúc 04:46 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `example`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fullname` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `address`, `phone`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'nghial1003', 'abc@gmail.com', '$2y$10$Or0GwZq9IXUaK9.Ka8AkuOZtNPaE7HcYt1Qlt1A/yql834Pxyqap2', 'Nguyễn Văn A', '04 Lê Duẩn - Thanh Khê - Đà nẵng', 392807140, 0, NULL, '2019-07-18 06:27:19', '2019-07-18 06:27:19', NULL),
(2, 'nghial1003', 'lenghiak13ctt02@gmail.com', '$2y$10$nQNHOCcs5pIXl5WqoVt3u.iu288wgJhcu1OJIFCW1SpqKgoUsi/BK', 'Long hoang', '04 Ngô Thì Nhậm', 1692807140, 0, NULL, '2019-07-18 06:29:23', '2019-07-18 06:29:23', NULL),
(3, 'admin', 'nghia.dev95@gmail.com', '$2y$10$Fr6CggtWRw0Q41CiYzyFlO7FbjTuFe0hJXuhsowKIMR2GvY8gBwP6', 'Nguyễn Văn A', 'dsadsadsadas', 392807140, 1, NULL, '2019-07-18 06:30:13', '2019-07-18 19:35:20', NULL),
(4, 'nghial10031', 'lenghia.aquathar@gmail.com', '$2y$10$Z180xdEqV1HHX6BS/pQtrutfLBNDm5uULEeLX.8qFctEsCg9D2EFO', 'Nguyễn Văn A', '04 Ngô Thì Nhậm', 827460579, 0, NULL, '2019-07-18 06:32:06', '2019-07-18 06:32:06', NULL),
(5, 'admin', 'longht1.vinaenter@gmail.com', '$2y$10$DulaWndWVpTdc4uZivNHVueVW5iOLpllYttlNcHexmzXPwvlZxPfy', 'Nguyễn Văn A', 'vcxzvzx', 827460579, 0, NULL, '2019-07-18 06:32:42', '2019-07-18 06:32:42', NULL),
(6, 'admin', 'admin@localhost.com', '$2y$10$wEY2z9wBYaH2NEw55QuqLexKbsJQ9jPGIuGhI4t4j6uW/zXGEzzs.', 'dsadas', '04 Lê Duẩn - Thanh Khê - Đà nẵng', 909887652, 0, NULL, '2019-07-18 06:35:17', '2019-07-18 06:35:17', NULL),
(13, 'nghial1003', 'ngdsahia.dev95@gmail.com', '$2y$10$daZ8nBEV8rITvJl5JOXuHO9QILoxns.ra12uQ5/l1Ugl2W1MpKNYC', 'Nguyễn Văn A', '', 1692807140, 1, NULL, '2019-07-18 08:40:39', '2019-07-18 18:33:20', NULL),
(15, 'nghial10030', 'nghia@gmail.com', '$2y$10$prlH3LNUIPcN7x3GvjJ9yum8SiBgyNX2QDkTcBnedzBBT8pRYB6KO', 'Lê Nghĩa', '04 Ngô Thì Nhậm', 1692807140, 0, NULL, '2019-07-18 18:04:25', '2019-07-18 19:35:03', NULL),
(16, 'nghial1003', 'len1ghia.aquathar@gmail.com', '$2y$10$ncvEkLJ6izXtqWwb0IXYQeuzQ/7lcEsH4szgTBvDI1U/c62Z7TLXq', 'Nguyễn Văn A', '04 Ngô Thì Nhậm', 392807140, 1, NULL, '2019-07-18 18:12:47', '2019-07-18 19:29:31', NULL),
(17, 'nghial1003', 'nghadia.dev95@gmail.com', '$2y$10$bdw/hiDW1NjEjG3roO32W.Fx4vmFJRswcwogRAuJeR.DIqZV9gioi', '1231321', '04 Ngô Thì Nhậm', 1692807140, 1, NULL, '2019-07-18 19:03:40', '2019-07-18 19:03:40', NULL),
(18, 'nghial1003', 'admadin@localhost.com', '$2y$10$tYl65IF6I3HHezK.YtCdk.n.Gr7vh1..b3gPixhcJmiLYsn115Adi', 'Nguyễn Văn A', '04 Ngô Thì Nhậm', 392807140, 1, NULL, '2019-07-18 19:25:35', '2019-07-18 19:25:35', NULL),
(20, 'alert(\'nghia\')', 'nghadadasia.dev95@gmail.com', '$2y$10$0D464.7kQOC.IjwcPgIu2eHFm/ofJZNNvPWOzuILEtkTfIveFIKAK', 'Nguyễn Văn A', '04 Ngô Thì Nhậm', 392807140, 1, NULL, '2019-07-18 19:44:29', '2019-07-18 19:44:29', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
