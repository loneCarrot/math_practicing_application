-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Sze 27. 23:01
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `math_app`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL,
  `num1` int(11) NOT NULL,
  `num2` int(11) NOT NULL,
  `operation` varchar(11) COLLATE utf8_hungarian_ci NOT NULL,
  `result` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `exercises`
--

INSERT INTO `exercises` (`id`, `num1`, `num2`, `operation`, `result`) VALUES
(1, 9, 6, '*', 54),
(2, 0, 11, '*', 0),
(3, 4, 5, '*', 20),
(4, 9, 10, '*', 90),
(5, 8, 5, '+', 13),
(6, 10, 1, '*', 10),
(7, 41, 24, '+', 65),
(8, 11, 23, '+', 34),
(9, 2, 8, '*', 16),
(10, 27, 35, '+', 62);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
