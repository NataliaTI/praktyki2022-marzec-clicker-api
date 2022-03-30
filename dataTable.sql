-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Mar 2022, 10:37
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `clicker`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `datatable`
--

CREATE TABLE `datatable` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`status`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `datatable`
--

INSERT INTO `datatable` (`id`, `user_id`, `status`) VALUES
(1, 32, '{\"startDatetime\":\"2022-03-28 14:04:21\"}',
'{\"startDatetime\":\"2022-03-28 14:04:21\"}'
),
(2, 0, '{\"startDatetime\":\"2022-03-29 09:30:14\"}');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `datatable`
--
ALTER TABLE `datatable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `datatable`
--
ALTER TABLE `datatable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
