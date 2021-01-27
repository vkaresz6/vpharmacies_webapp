-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Ápr 09. 14:32
-- Kiszolgáló verziója: 10.4.8-MariaDB
-- PHP verzió: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `php_beadando`
--
CREATE DATABASE IF NOT EXISTS `php_beadando` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `php_beadando`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `beosztas`
--

DROP TABLE IF EXISTS `beosztas`;
CREATE TABLE IF NOT EXISTS `beosztas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `kezdesido` datetime NOT NULL,
  `vegeido` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `beosztas`
--

INSERT INTO `beosztas` (`id`, `userid`, `kezdesido`, `vegeido`) VALUES
(1, 1, '2020-01-01 06:00:00', '2020-01-01 16:00:00'),
(2, 1, '2020-01-02 06:00:00', '2020-01-02 16:00:00'),
(3, 1, '2019-12-09 08:00:00', '2019-12-09 16:00:00'),
(4, 1, '2019-11-03 22:00:00', '2019-11-03 08:00:00'),
(5, 1, '2020-01-15 08:00:00', '2020-01-15 16:00:00'),
(6, 1, '2020-01-31 06:00:00', '2020-01-31 16:00:00'),
(7, 1, '2020-02-01 06:00:00', '2020-02-01 16:00:00'),
(8, 1, '2020-02-02 06:00:00', '2020-02-02 16:00:00'),
(9, 1, '2020-02-03 06:00:00', '2020-02-03 16:00:00'),
(10, 1, '2020-02-04 06:00:00', '2020-02-04 16:00:00'),
(11, 1, '2020-02-05 06:00:00', '2020-02-05 16:00:00'),
(12, 1, '2020-02-06 06:00:00', '2020-02-06 16:00:00'),
(13, 1, '2020-02-07 06:00:00', '2020-02-07 16:00:00'),
(14, 1, '2020-02-08 06:00:00', '2020-02-08 16:00:00'),
(15, 1, '2020-02-09 06:00:00', '2020-02-09 16:00:00'),
(16, 1, '2020-02-10 06:00:00', '2020-02-10 16:00:00'),
(17, 1, '2020-02-11 06:00:00', '2020-02-11 16:00:00'),
(18, 1, '2020-02-12 06:00:00', '2020-02-12 16:00:00'),
(19, 1, '2020-02-13 06:00:00', '2020-02-13 16:00:00'),
(20, 1, '2020-02-14 06:00:00', '2020-02-14 16:00:00'),
(21, 1, '2020-02-15 06:00:00', '2020-02-15 16:00:00'),
(22, 1, '2020-02-16 06:00:00', '2020-02-16 16:00:00'),
(23, 1, '2020-02-17 06:00:00', '2020-02-17 16:00:00'),
(24, 1, '2020-02-18 06:00:00', '2020-02-18 16:00:00'),
(25, 1, '2020-02-19 06:00:00', '2020-02-19 16:00:00'),
(26, 1, '2020-02-20 06:00:00', '2020-02-20 16:00:00'),
(27, 1, '2020-02-21 06:00:00', '2020-02-21 16:00:00'),
(28, 1, '2020-02-22 06:00:00', '2020-02-22 16:00:00'),
(29, 1, '2020-02-23 06:00:00', '2020-02-23 16:00:00'),
(30, 1, '2020-02-24 06:00:00', '2020-02-24 16:00:00'),
(31, 1, '2020-02-25 06:00:00', '2020-02-25 16:00:00'),
(32, 1, '2020-02-26 06:00:00', '2020-02-26 16:00:00'),
(33, 1, '2020-02-27 06:00:00', '2020-02-27 16:00:00'),
(34, 1, '2020-02-28 06:00:00', '2020-02-28 16:00:00'),
(35, 1, '2020-02-29 06:00:00', '2020-02-29 16:00:00'),
(36, 2, '2020-02-02 06:00:00', '2020-02-02 16:00:00'),
(37, 1, '2020-04-01 06:00:00', '2020-04-01 16:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `vezeteknev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `keresztnev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `utvonal` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `filenev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `vezeteknev`, `keresztnev`, `email`, `utvonal`, `filenev`) VALUES
(1, 'user', 'user', 'Első', 'Felhasználó', 'user@user.hu', 'images/', 'firstprofilimage.jpg'),
(2, 'Májadmin', 'detox', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
