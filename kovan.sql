-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Eyl 2016, 15:19:13
-- Sunucu sürümü: 5.6.21
-- PHP Sürümü: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `kovan`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `follows`
--

CREATE TABLE IF NOT EXISTS `follows` (
`id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL,
  `follow_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `follows`
--

INSERT INTO `follows` (`id`, `follower_id`, `followed_id`, `follow_date`) VALUES
(7, 2, 1, '2016-09-25 11:26:04'),
(8, 1, 2, '2016-09-25 12:26:23'),
(9, 3, 2, '2016-09-25 12:43:20'),
(10, 3, 1, '2016-09-25 13:00:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `post_date`, `views`) VALUES
(1, 1, 'First Post', 'Kuanta''s first post!', '2016-09-24 13:09:17', 0),
(2, 1, 'Second Post', 'Kuanta''s second post', '2016-09-24 13:46:35', 0),
(3, 2, 'Hasan''s Diary', 'Kilimcinin ilk postu', '2016-09-24 19:25:42', 0),
(4, 2, 'Hasan''s Diary #2', 'Kilimcinin ikinci postu', '2016-09-24 19:26:08', 0),
(5, 2, 'Hasan''s Diary #3', 'Kilimcinin ucuncu postu\r\n', '2016-09-24 19:27:21', 0),
(6, 2, 'Hasan''s Diary #4', 'Kilimcini dordüncü postu\r\n', '2016-09-24 19:27:35', 0),
(7, 2, 'Hasan''s Diary #5', 'Kilimcinin bilmem kaçıncı postu', '2016-09-24 19:27:58', 0),
(8, 2, 'sdsadasddasd', 'sadasdasdasdasdasdasd', '2016-09-25 10:39:46', 0),
(9, 3, 'Koyun''un Defteri', 'Meeeeeeeeeeeee', '2016-09-25 12:43:01', 0),
(10, 3, 'Koyun''un Defteri #2', 'MEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEe', '2016-09-25 12:46:20', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `reg_date`) VALUES
(1, 'Kuanta', '$2y$10$gE67p6N3z.DjDyd1omCHB.Z86V1cYZAAFtqvDES9rNG2HZkmBOIM.', 'kuanta@gmail.com', '2016-09-24 13:08:55'),
(2, 'Kilimci', '$2y$10$/HETtxVtHgjEAtSU5Ps9KunxceKYisDH0Mn6O/V4H4gCR2PMAFnH2', 'kilimcihasan@gmail.com', '2016-09-24 19:25:18'),
(3, 'Koyun666', '$2y$10$DPOigQQAZOaW6U3hY9SMju9uzGk3FDNmbPStJUaq3eIAvCXEQ4M2.', 'koyun@gmail.com', '2016-09-25 12:42:32');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
