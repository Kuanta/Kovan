-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Eyl 2016, 15:34:03
-- Sunucu sürümü: 5.6.21
-- PHP Sürümü: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `kuantaria`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `follows`
--

CREATE TABLE IF NOT EXISTS `follows` (
`id` int(11) NOT NULL,
  `who` int(11) NOT NULL,
  `whom` int(11) NOT NULL,
  `follow_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `reg_date`) VALUES
(3, 'Kilimci', '$2y$10$CQdzikohLDiAYG7wtsyKt.3XPlo4XnqO7IK5ESTDpqg', 'kilimcihasan@gmail.com', '2016-09-18 14:38:38'),
(4, 'TestUser', '$2y$10$hivgNFxW/bNox5qTo0KJ6uT9zz0adKJnOn.RI6SjWQS', 'test@gmail.com', '2016-09-18 14:44:25'),
(5, 'Random', '123456', 'random@gmail.com', '2016-09-18 14:48:30'),
(6, 'TestUser2', '$2y$10$fyKGwaBgrbAtkNk6iSgI7eEw11D/KxJohy8KM2ilD/6', 'sasdasd@gmail.com', '2016-09-18 14:58:20'),
(7, 'AnotherUser', '$2y$10$WB3KimJNbw3s25cOKVyw0uxUOJEyYx5c/MG9WxZWm8fnIqdzpMlQC', 'dasdasd@gmail.com', '2016-09-18 15:00:45'),
(8, 'Kuanta', '$2y$10$qXzqqyH3/cjWMkukNxApceUkeXCzNjkgAvYaoHAb2JtS8O8azILqG', 'kuanta@gmail.com', '2016-09-20 14:36:51');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `follows`
--
ALTER TABLE `follows`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `follows`
--
ALTER TABLE `follows`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
