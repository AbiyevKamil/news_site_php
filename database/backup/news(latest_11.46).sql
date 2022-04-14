-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2022 at 07:46 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id` int(1) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `expire_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`id`, `user_id`, `code`, `expire_date`) VALUES
(1, '6258078da997a7.97809030', '687775', '2022-05-14 17:05:27'),
(2, '625831a304db44.18070403', '540531', '2022-05-14 18:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Daily', '2022-04-07 20:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(5) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(100) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(5) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `news_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(5) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `banner` varchar(150) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0',
  `is_approved` bit(1) NOT NULL DEFAULT b'0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` varchar(100) NOT NULL,
  `category_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `banner`, `is_deleted`, `is_approved`, `created_at`, `updated_at`, `user_id`, `category_id`) VALUES
(1, 'Türkiyə Prezident Administrasiyası: Ərdoğan Putin və Zelenski ilə dialoqu davam etdirir', '\"Türkiyə beynəlxalq arenada sülh və sabitliyə töhfə verməkdə davam edir, münaqişə zonalarında zorakılıq səviyyəsini azaltmaq üçün səy göstərir\".\r\n\r\n\"Report\" \"Anadolu\"ya istinadən xəbər verir ki, bunu Türkiyə Prezident Administrasiyasının Kommunikasiya İdarəsinin rəisi Fəxrəddin Altun deyib.\r\n\r\nF.Altun Türkiyənin Ukraynadakı müharibəyə son qoymaq üçün sülh təşəbbüslərinə diqqət çəkib.\r\n\r\n“Rəcəb Tayyib Ərdoğan həm Rusiya Prezidenti Vladimir Putin, həm də Ukrayna lideri Volodimir Zelenski ilə yaxın dialoqu davam etdirir. Fevralın sonundan indiyədək Ərdoğan hər iki ölkənin liderləri ilə dəfələrlə telefonla danışıb”, - Altun bildirib.\r\n\r\nİdarə rəisi Ukraynada baş verənlərin mövcud dünya nizamının ədalətsizliyini bir daha göstərdiyini vurğulayıb.\r\n\r\n“İkinci Dünya Müharibəsindən sonra formalaşmış hazırkı dünya sistemi öz səmərəsizliyini dəfələrlə sübut edib. BMT problemləri qanunun aliliyi çərçivəsində həll etmək əvəzinə, yalnız fikir ayrılıqlarının həllini gecikdirir. Müharibə iştirakçılarından biri BMT Təhlükəsizlik Şurasının daimi üzvü olan kimi təşkilatın işi dayanır. BMT Təhlükəsizlik Şurası hüququ pozulan dövləti deyil, beş gücün maraqlarını dəstəkləyir”, - Altun qeyd edib.\r\n\r\nPrezident Administrasiyası nümayəndəsinin sözlərinə görə, Ankaranın planına görə, BMT Təhlükəsizlik Şurasında beş deyil, 20 dövlət təmsil olunmalıdır.', '6251e0ea91688react.png', b'0', b'1', '2022-04-09 23:39:22', '2022-04-14 15:30:17', '60423032-ad08-11ec-ba09-002b67e478b5', 1),
(3, 'Türkiyə Prezident Administrasiyası: Ərdoğan Putin və Zelenski ilə dialoqu davam etdirir', '\"Türkiyə beynəlxalq arenada sülh və sabitliyə töhfə verməkdə davam edir, münaqişə zonalarında zorakılıq səviyyəsini azaltmaq üçün səy göstərir\".\r\n\r\n\"Report\" \"Anadolu\"ya istinadən xəbər verir ki, bunu Türkiyə Prezident Administrasiyasının Kommunikasiya İdarəsinin rəisi Fəxrəddin Altun deyib.\r\n\r\nF.Altun Türkiyənin Ukraynadakı müharibəyə son qoymaq üçün sülh təşəbbüslərinə diqqət çəkib.\r\n\r\n“Rəcəb Tayyib Ərdoğan həm Rusiya Prezidenti Vladimir Putin, həm də Ukrayna lideri Volodimir Zelenski ilə yaxın dialoqu davam etdirir. Fevralın sonundan indiyədək Ərdoğan hər iki ölkənin liderləri ilə dəfələrlə telefonla danışıb”, - Altun bildirib.\r\n\r\nİdarə rəisi Ukraynada baş verənlərin mövcud dünya nizamının ədalətsizliyini bir daha göstərdiyini vurğulayıb.\r\n\r\n“İkinci Dünya Müharibəsindən sonra formalaşmış hazırkı dünya sistemi öz səmərəsizliyini dəfələrlə sübut edib. BMT problemləri qanunun aliliyi çərçivəsində həll etmək əvəzinə, yalnız fikir ayrılıqlarının həllini gecikdirir. Müharibə iştirakçılarından biri BMT Təhlükəsizlik Şurasının daimi üzvü olan kimi təşkilatın işi dayanır. BMT Təhlükəsizlik Şurası hüququ pozulan dövləti deyil, beş gücün maraqlarını dəstəkləyir”, - Altun qeyd edib.\r\n\r\nPrezident Administrasiyası nümayəndəsinin sözlərinə görə, Ankaranın planına görə, BMT Təhlükəsizlik Şurasında beş deyil, 20 dövlət təmsil olunmalıdır.', '6251e1bced28creact.png', b'0', b'0', '2022-04-09 23:42:53', NULL, '6245ca0a284823.59340905', 1),
(4, 'title', 'title', '6251e1bced28creact.png', b'0', b'0', '2022-04-09 23:42:53', '2022-04-14 14:54:33', '6251cf6a30c823.60987771', 0),
(8, 'Türkiyə Prezident Administrasiyası: Ərdoğan Putin və Zelenski ilə dialoqu davam etdirir', '\"Türkiyə beynəlxalq arenada sülh və sabitliyə töhfə verməkdə davam edir, münaqişə zonalarında zorakılıq səviyyəsini azaltmaq üçün səy göstərir\".\r\n\r\n\"Report\" \"Anadolu\"ya istinadən xəbər verir ki, bunu Türkiyə Prezident Administrasiyasının Kommunikasiya İdarəsinin rəisi Fəxrəddin Altun deyib.\r\n\r\nF.Altun Türkiyənin Ukraynadakı müharibəyə son qoymaq üçün sülh təşəbbüslərinə diqqət çəkib.\r\n\r\n“Rəcəb Tayyib Ərdoğan həm Rusiya Prezidenti Vladimir Putin, həm də Ukrayna lideri Volodimir Zelenski ilə yaxın dialoqu davam etdirir. Fevralın sonundan indiyədək Ərdoğan hər iki ölkənin liderləri ilə dəfələrlə telefonla danışıb”, - Altun bildirib.\r\n\r\nİdarə rəisi Ukraynada baş verənlərin mövcud dünya nizamının ədalətsizliyini bir daha göstərdiyini vurğulayıb.\r\n\r\n“İkinci Dünya Müharibəsindən sonra formalaşmış hazırkı dünya sistemi öz səmərəsizliyini dəfələrlə sübut edib. BMT problemləri qanunun aliliyi çərçivəsində həll etmək əvəzinə, yalnız fikir ayrılıqlarının həllini gecikdirir. Müharibə iştirakçılarından biri BMT Təhlükəsizlik Şurasının daimi üzvü olan kimi təşkilatın işi dayanır. BMT Təhlükəsizlik Şurası hüququ pozulan dövləti deyil, beş gücün maraqlarını dəstəkləyir”, - Altun qeyd edib.\r\n\r\nPrezident Administrasiyası nümayəndəsinin sözlərinə görə, Ankaranın planına görə, BMT Təhlükəsizlik Şurasında beş deyil, 20 dövlət təmsil olunmalıdır.', '6251e1bced28creact.png', b'1', b'0', '2022-04-09 23:42:53', '2022-04-10 17:24:39', '6251cf6a30c823.60987771', 1),
(10, 'Hello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello World', 'Hello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello World', '6258484df1f45react.png', b'0', b'0', '2022-04-14 20:14:06', NULL, 'b7c916ca-b68c-11ec-83ff-002b67e478b5', 0),
(11, ' WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WHello WorldHello WorldHello WorldorldHello World', 'Hello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello World', '62584921792ecreact.png', b'0', b'1', '2022-04-14 20:17:37', '2022-04-14 20:21:25', '625831a304db44.18070403', 1),
(12, 'Hello WorldHello World', 'Hello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello WorldHello World', '625849a3a97a7react.png', b'0', b'1', '2022-04-14 20:19:47', '2022-04-14 20:21:27', '625831a304db44.18070403', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `code_id` int(10) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `expire_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recovery`
--

INSERT INTO `recovery` (`code_id`, `user_id`, `code`) VALUES
(19, '6245c8c004a590.59994200', '684170'),
(20, '625090990bfda6.27809311', '636215'),
(21, '625831a304db44.18070403', '512333');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `profile_picture` varchar(100) NOT NULL DEFAULT 'default_picture.png',
  `is_approved` bit(1) NOT NULL DEFAULT b'0',
  `is_admin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `full_name`, `user_name`, `password`, `profile_picture`, `is_approved`, `is_admin`) VALUES
('60423032-ad08-11ec-ba09-002b67e478b5', 'report@gmail.com', 'Report Az', 'report.az', 'e10adc3949ba59abbe56e057f20f883e', 'default_picture.png', b'1', b'0'),
('624392e36e9ab4.75835697', 'admin@gmail.com', 'admin', 'admin', '$2y$10$B7B9GZ8m/zuXklzLCsg.f.TWX8Ndh8kZPdwi4KEnt1e343DOxklb6', 'default_picture.png', b'1', b'1'),
('6245ca0a284823.59340905', 'test1@gmail.com', 'test one', 'test1', '$2y$10$.Jq5EdY0GKA49UUTRtxK2efrmGVVZOj4c3lCyTdXckIu.rXbuOsMm', 'default_picture.png', b'1', b'0'),
('6250ab13bad5a9.10652503', 'hashimlisahil@gmail.com', 'Sahil Hashimli', 'hashimlijr', '$2y$10$mjy9f8XMtQ.hEHPXLQ4o8ejsmFwbVoIxdeuYd6QEdLPn6pJT0YVte', 'default_picture.png', b'1', b'0'),
('6258078da997a7.97809030', 'ruhiddadash@gmail.com', 'Ruhid Dadash', 'ruhid', '$2y$10$xDBzh06fP0TVadjrFY0bQedhXW8/BlOPEA77pyHue0.COzu8MA5Da', 'default_picture.png', b'1', b'0'),
('625831a304db44.18070403', 'kabiyev@std.beu.edu.az', 'Kamil Abiyev', 'kamil', '$2y$10$EQOY6P4NCv5NCi7qSBWsDuD24EXbRnxVA44JtR1Yih2VTSYJ6wxWy', 'default_picture.png', b'1', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `code_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
