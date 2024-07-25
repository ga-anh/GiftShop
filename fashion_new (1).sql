-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 17, 2024 lúc 09:04 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashion_new`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sp` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `id_user` int(11) NOT NULL COMMENT 'Người bình luận',
  `noi_dung` text NOT NULL COMMENT 'Nội dung bình luận',
  `thoi_diem` datetime NOT NULL COMMENT 'Thời điểm bình luận',
  `an_hien` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 là ẩn 1 là hiện',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `id_sp`, `id_user`, `noi_dung`, `thoi_diem`, `an_hien`, `created_at`, `updated_at`) VALUES
(1, 24, 1, 'Sản phẩm vừa đẹp vừa giá cả phải chăng ai gặp cũng khen mang trang sức gì mà lấp lánh vậy', '2024-06-10 06:46:21', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `thoi_diem_mua_hang` datetime NOT NULL COMMENT 'Thời điểm mua hàng',
  `ten_nguoi_nhan` varchar(255) NOT NULL COMMENT 'Họ tên người nhận',
  `dien_thoai` varchar(100) NOT NULL COMMENT 'Điện thoại người nhận hàng',
  `dia_chi_giao` varchar(100) NOT NULL COMMENT 'Địa chỉ giao hàng',
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Trạng thái đơn hàng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang_chi_tiet`
--

CREATE TABLE `don_hang_chi_tiet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dh` int(11) NOT NULL COMMENT 'Mã đơn hàng',
  `id_sp` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `so_luong` int(11) NOT NULL DEFAULT 1 COMMENT 'Số lượng mua',
  `gia` int(11) NOT NULL COMMENT 'Giá mua sản phẩm',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_loai` varchar(100) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `thu_tu` int(11) NOT NULL DEFAULT 0,
  `an_hien` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`id`, `ten_loai`, `slug`, `thu_tu`, `an_hien`, `created_at`, `updated_at`) VALUES
(1, 'Trang sức nam', 'trang-suc-nam-1', 0, 1, NULL, NULL),
(2, 'Trang sức nữ', 'trang-suc-nu-2', 1, 1, NULL, NULL),
(3, 'Gấu bông', 'gau-bong-3', 2, 1, NULL, NULL),
(4, 'Hoa', 'hoa-4', 3, 1, NULL, NULL),
(5, 'Bình đựng nước', 'binh-dung-nuoc-5', 4, 1, NULL, NULL),
(6, 'Móc chìa khóa', 'moc-chia-khoa-6', 5, 1, NULL, NULL),
(7, 'Tranh', 'tranh-7', 6, 1, NULL, NULL),
(8, 'Đồ thủ công mỹ nghệ', 'do-thu-cong-my-nghe-8', 7, 1, NULL, NULL),
(10, 'Ly', 'ly', 9, 1, '2024-06-10 03:08:40', '2024-06-10 03:08:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(30, '0001_01_01_000000_create_users_table', 1),
(31, '0001_01_01_000001_create_cache_table', 1),
(32, '0001_01_01_000002_create_jobs_table', 1),
(33, '2024_05_20_202616_tao_table_loai_s_p', 1),
(34, '2024_05_20_205433_tao_table_san_pham', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_sp` varchar(200) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `gia` int(11) NOT NULL,
  `gia_km` int(11) DEFAULT NULL,
  `id_loai` bigint(20) UNSIGNED NOT NULL,
  `ngay` date DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `hot` tinyint(1) NOT NULL DEFAULT 0,
  `luot_xem` int(11) NOT NULL DEFAULT 0,
  `tinh_chat` tinyint(1) DEFAULT NULL COMMENT '0:bình thường;1:giá rẻ;2:giảm sốc;3:cao cấp',
  `an_hien` tinyint(1) NOT NULL DEFAULT 0,
  `mo_ta` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_sp`, `slug`, `gia`, `gia_km`, `id_loai`, `ngay`, `hinh`, `hot`, `luot_xem`, `tinh_chat`, `an_hien`, `mo_ta`, `created_at`, `updated_at`) VALUES
(1, 'Vòng tay', NULL, 200000, NULL, 2, NULL, 'images/p1.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(2, 'Đồng hồ', NULL, 300000, NULL, 1, NULL, 'images/p2.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(3, 'Gấu Teddy', NULL, 110000, NULL, 3, NULL, 'images/p3.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(4, 'Bó hoa hồng', NULL, 45000, NULL, 4, NULL, 'images/p4.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(5, 'Gấu nâu Teddy ', NULL, 95000, NULL, 3, NULL, 'images/p5.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(6, 'Bó hoa trắng', NULL, 70000, NULL, 4, NULL, 'images/p6.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(7, 'Đồng hồ Roblex', NULL, 400000, NULL, 1, NULL, 'images/p7.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(8, 'Nhẫn', NULL, 450000, NULL, 2, NULL, 'images/p8.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(9, 'Bình đựng nước', NULL, 200000, NULL, 5, NULL, 'images/p9.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(10, 'Bình đựng nước 2', NULL, 300000, NULL, 5, NULL, 'images/p10.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(11, 'Móc chìa khóa mini', NULL, 110000, NULL, 6, NULL, 'images/p11.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(12, 'Móc chìa khóa gấu', NULL, 45000, NULL, 6, NULL, 'images/p12.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(13, 'Tranh phong cảnh', NULL, 95000, NULL, 7, NULL, 'images/p13.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(14, 'Tranh treo tường', NULL, 70000, NULL, 7, NULL, 'images/p14.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(15, 'Quả cầu thủy tinh', NULL, 400000, NULL, 8, NULL, 'images/p15.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(16, 'Mô hình', NULL, 450000, NULL, 8, NULL, 'images/p16.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(17, 'Vòng tay 2', NULL, 200000, NULL, 2, NULL, 'images/p17.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(18, 'Đồng hồ 2', NULL, 300000, NULL, 1, NULL, 'images/p18.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(19, 'Gấu Teddy 2', NULL, 110000, NULL, 3, NULL, 'images/p19.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(20, 'Bó hoa hồng 2', NULL, 45000, NULL, 4, NULL, 'images/p20.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(21, 'Gấu nâu Teddy 2', NULL, 95000, NULL, 3, NULL, 'images/p21.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(22, 'Bó hoa trắng 2', NULL, 70000, NULL, 4, NULL, 'images/p22.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(23, 'Đồng hồ Roblex 2', NULL, 400000, NULL, 1, NULL, 'images/p23.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(24, 'Nhẫn 2', NULL, 450000, NULL, 2, NULL, 'images/p24.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(25, 'Bình đựng nước 3', NULL, 200000, NULL, 5, NULL, 'images/p25.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(26, 'Bình đựng nước 4', NULL, 300000, NULL, 5, NULL, 'images/p26.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(27, 'Móc chìa khóa mini 2', NULL, 110000, NULL, 6, NULL, 'images/p27.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(28, 'Móc chìa khóa gấu 2', NULL, 45000, NULL, 6, NULL, 'images/p28.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(29, 'Tranh phong cảnh 2', NULL, 95000, NULL, 7, NULL, 'images/p29.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(30, 'Tranh treo tường 2', NULL, 70000, NULL, 7, NULL, 'images/p30.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(31, 'Quả cầu thủy tinh 2', NULL, 400000, NULL, 8, NULL, 'images/p31.jpg', 0, 0, NULL, 0, NULL, NULL, NULL),
(32, 'Mô hình 2', NULL, 450000, NULL, 8, NULL, 'images/p32.jpg', 0, 0, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('t4gX3KtpD2nzdg5Ve0bVD2zgFq3xrpQziWQxDBhp', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiN1BFMGppS1NMcUlqajhDdkc2M0cyWk9ZaHVublU3OG5FV2ZBMmFwViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2FpP3BhZ2U9MiI7fXM6NDoiY2FydCI7YToxOntpOjA7YTo2OntzOjU6ImlkX3NwIjtzOjE6IjEiO3M6Nzoic29sdW9uZyI7czoxOiIxIjtzOjY6InRlbl9zcCI7czo5OiJWw7JuZyB0YXkiO3M6MzoiZ2lhIjtpOjIwMDAwMDtzOjQ6ImhpbmgiO3M6MTM6ImltYWdlcy9wMS5qcGciO3M6OToidGhhbmh0aWVuIjtpOjIwMDAwMDt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjExO3M6NzoicHJldnVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2xvYWkiO3M6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1718014149);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ',
  `dien_thoai` varchar(255) DEFAULT NULL COMMENT 'Điện thoại',
  `hinh` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ file hình',
  `role` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 là bình thường, 1 là admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `dia_chi`, `dien_thoai`, `hinh`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kailey Schmeler', 'brent.hodkiewicz@example.com', '2024-06-09 06:57:50', '$2y$12$YvHSU16.zpU65JUDkCxqY.Lnax3PDRn6vV5A9ulrI2ZrjesNFK/16', NULL, NULL, NULL, 0, 'J8W2JH0N2F', '2024-06-09 06:57:51', '2024-06-09 06:57:51'),
(2, 'Đỗ Đạt Cao', 'dodatcao@gmail.com', NULL, '$2y$12$24vP2KpLY9XyZc1Ys5Sn8ufKFd/slmRcxRFQsKI.hHUOnlDB/Uv4S', '', '0918765238', '', 1, NULL, NULL, NULL),
(3, 'Mai Anh Tới', 'maianhtoi@gmail.com', NULL, '$2y$12$K/vixMMkN.B0CJSiJ105wuT7pN3o1GHd6UDJb/c3KemeoczHXo1Y6', '', '098532482', '', 0, NULL, NULL, NULL),
(4, 'Đào Kho Báu', 'daokhobau@gmail.com', NULL, '$2y$12$Z2WEpjz6cBVfou1f6sjBTePvz.d1IGeO3fpQ/PB37hmV1n009DI9G', '', '097397392', '', 1, NULL, NULL, NULL),
(6, 'Mũ rơm', 'tuanh703lap@gmail.com', '2024-06-09 10:25:35', '$2y$12$e7vT8cNnvpuspASUUWgxgONYc2Z5Dh4PmXy/UsHdsy/BItGkxNEJK', 'le go vap', '0369904066', NULL, 1, 'ATWGWgmnEQsv7PEmN2pndouCAA6mvi9735MKNnvsWnWF9dJcZyTzJHXgwwIj', '2024-06-09 10:24:53', '2024-06-10 03:05:54'),
(7, 'Cao Chót Vót', 'caochotvot@gmail.com', NULL, '$2y$12$bOY1GokzcUguZT5MzMPQXeHuTjQ6XeSurG.IUkA00CFm53S6oyTCy', '', '0918765238', '', 1, NULL, NULL, NULL),
(8, 'Mai Nhớ Em', 'mainhoem@gmail.com', NULL, '$2y$12$mFHlSTQaL0yOMZta4BCoGeEzRKeUBSu1cUFVN7DZGnXKZZAKmnY3S', '', '098532482', '', 0, NULL, NULL, NULL),
(9, 'Vi Na Phôn', 'vinaphone@gmail.com', NULL, '$2y$12$AVkHMo3d8nu.GY34YQOyuOs0/wepfdvv4HesDMQ6fQs1Y4oMwkpEi', '', '097397392', '', 1, NULL, NULL, NULL),
(11, 'Anh Tú', 'anhtukid2007@gmail.com', NULL, '$2y$12$0UdBll284wJLYcWpw1uNBugEXeHlnR6iQx5jEQVTNh.Rbzte0kjPi', 'Quan 12', '091576241', NULL, 0, NULL, '2024-06-10 03:07:50', '2024-06-10 03:07:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id_loai_index` (`id_loai`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `don_hang_chi_tiet`
--
ALTER TABLE `don_hang_chi_tiet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_id_loai_foreign` FOREIGN KEY (`id_loai`) REFERENCES `loai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
