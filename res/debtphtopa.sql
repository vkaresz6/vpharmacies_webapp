-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Jan 29. 18:47
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `vpharmacies_database`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `debtphtopa`
--

CREATE TABLE `debtphtopa` (
  `id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `OEP_TTT` int(11) NOT NULL,
  `from_ph_id` int(11) NOT NULL,
  `to_pa_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `exist` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `debtphtopa`
--

INSERT INTO `debtphtopa` (`id`, `actor_id`, `OEP_TTT`, `from_ph_id`, `to_pa_id`, `amount`, `exist`) VALUES
(2, 210134316, 210134316, 1, 21, 3, 1),
(5, 210638475, 210638475, 1, 21, 1, 1),
(10, 0, 110013666, 1, 22, 3, 0),
(11, 0, 110013666, 1, 22, 3, 0),
(12, 0, 110009950, 1, 22, 6, 0),
(13, 0, 110009950, 1, 22, 6, 0),
(15, 0, 110005485, 1, 16, 0, 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `debtphtopa`
--
ALTER TABLE `debtphtopa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actor_id_2` (`actor_id`),
  ADD KEY `OEP_TTT_2` (`OEP_TTT`),
  ADD KEY `OEP_TTT_3` (`OEP_TTT`),
  ADD KEY `to_pa_id_2` (`to_pa_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `debtphtopa`
--
ALTER TABLE `debtphtopa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
