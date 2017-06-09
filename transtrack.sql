-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Haz 2017, 22:14:49
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `transtrack`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CarrierName` varchar(60) NOT NULL,
  `CarrierType` varchar(30) NOT NULL,
  `Captain` varchar(60) NOT NULL,
  `Fleet` varchar(60) NOT NULL,
  `Location` varchar(60) NOT NULL,
  `Lat` float(10,6) NOT NULL,
  `Lng` float(10,6) NOT NULL,
  `Nationality` varchar(60) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Factory` varchar(60) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Alarms` varchar(60) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Tablo döküm verisi `markers`
--

INSERT INTO `markers` (`id`, `CarrierName`, `CarrierType`, `Captain`, `Fleet`, `Location`, `Lat`, `Lng`, `Nationality`, `Factory`, `Alarms`) VALUES
(1, 'asas', '', 'asas', '', 'asa', 39.639538, 27.745514, '', '', ''),
(2, 'assa', 'Film', 'assa', '', 'asasas', 39.044785, 28.580475, '', '', ''),
(3, 'aas', 'Film', 'aas', '', 'asdasd', 39.876019, 33.809967, '', '', ''),
(4, 'qqq', 'Set', 'qqq', '', 'qqq', 41.195190, 33.318558, '', '', ''),
(5, 'a', 'Film', 'a', 'a', 'c', 39.588757, 29.854889, '', '', ''),
(6, 'x', 'Film', 'x', 'x', 'x', 39.181175, 28.404694, '', '', ''),
(18, 'nnnnn', 'Highway', 'nnnnn', 'nnnnn', 'nnnnn', 40.228985, 35.893555, 'nnnnn', 'nnnnn', 'nnnnn'),
(8, 'w', 'Film', 'w', 'w', 'w', 39.504040, 29.459381, 'w', 'w', ''),
(9, 'w', 'Film', 'w', 'w', 'w', 40.145290, 33.326569, 'w', 'w', 'w'),
(10, 'A', 'Highway', 'A', 'A', 'A', 41.294315, 32.951660, 'A', 'A', 'A'),
(11, 'hjhh', 'Highway', 'hjhh', 'hjhh', 'hjhh', 41.294315, 36.467285, 'hjhh', 'hjhh', 'hjhh'),
(12, 'rrr', 'Highway', 'rrr', 'rrr', 'rrr', 39.215233, 32.288818, 'rrr', 'rrr', 'rrr'),
(13, 'dÃ¼ldÃ¼l', 'Highway', 'dÃ¼ldÃ¼l', 'dÃ¼ldÃ¼l', 'dÃ¼ldÃ¼l', 37.782383, 29.096045, 'dÃ¼ldÃ¼l', 'dÃ¼ldÃ¼l', 'dÃ¼ldÃ¼l'),
(14, 'vvv', 'Highway', 'vvv', 'vvv', 'vvv', 38.548164, 32.200928, 'vvv', 'vvv', 'vvv'),
(15, 'a', 'Highway', 'a', 'a', 'a', 39.010647, 30.618896, 'a', 'a', 'a'),
(16, 'we', 'Highway', 'we', 'we', 'we', 40.145290, 32.687988, 'we', 'we', 'we'),
(17, 'asd', 'Highway', 'ddd', 'ddd', 'rg', 39.215233, 30.534668, 'jjj', 'kkk', 'ppp'),
(19, 'batman', 'Seaway', 'batman', 'batman', 'batman', 38.324421, 36.928711, 'batman', 'batman', 'batman'),
(20, 'qqq', 'Railway', 'qqq', 'qqq', 'qqq', 40.797176, 33.940430, 'qqq', 'qqq', 'qqq'),
(21, 'aasdasda', 'Highway', 'aasdasda', 'aasdasda', 'aasdasda', 37.614231, 33.215332, 'aasdasda', 'aasdasda', 'aasdasda'),
(22, 'thy', 'Airway', 'thy', 'thy', 'thy', 40.212440, 37.653809, 'thy', 'thy', 'thy'),
(23, 'qqqq', 'Highway', 'qqqq', 'qqqq', 'qqqq', 41.705727, 34.713135, 'qqqq', 'qqqq', 'qqqq');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
