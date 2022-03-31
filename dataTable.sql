-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 30 Mar 2022, 13:06
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

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
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` char(36) DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `datatable`
--

INSERT INTO `datatable` (`id`, `user_id`, `status`) VALUES
<<<<<<< HEAD
(1, '5d3e5fa7-3d35-47c5-908d-9f278160d28a', '{\"startDatetime\":\"2022-03-28 10:25:59\"}'),
(2, '07a54169-6585-480d-8108-9b41671acc8c', '{\"startDatetime\":\"2022-03-28 11:54:40\"}'),
(3, '3e05b51b-a749-46b7-b843-51209d32cbf3', '{\"startDatetime\":\"2022-03-28 11:55:01\"}'),
(4, '00815391-79b1-4170-9f8c-2bd0a3bc29f0', '{\"startDatetime\":\"2022-03-28 11:55:03\"}'),
(5, '20db14a2-30e5-46ad-aa5a-99bb6a295e27', '{\"startDatetime\":\"2022-03-28 12:00:55\"}'),
(6, 'fec422bd-4cba-438c-afec-6b5026800978', '{\"startDatetime\":\"2022-03-28 12:00:56\"}'),
(7, '3b84bf6d-8652-428a-bebb-7b40bf56191f', '{\"startDatetime\":\"2022-03-28 12:00:56\"}'),
(8, '632f3767-d197-428a-8a08-4fc040223b98', '{\"startDatetime\":\"2022-03-28 12:00:56\"}'),
(9, '03aec581-8543-48e5-87d0-86a05ad60d46', '{\"startDatetime\":\"2022-03-28 12:01:08\"}'),
(10, 'fa923d79-85fb-49a4-973d-e50fe23094c0', '{\"startDatetime\":\"2022-03-28 12:01:09\"}'),
(11, '24293ca6-467e-462d-84bc-a16a82280a84', '{\"startDatetime\":\"2022-03-28 12:03:01\"}'),
(12, '3612b5d3-6b41-4f45-a8e6-a9ea15d8bc8a', '{\"startDatetime\":\"2022-03-28 12:05:13\"}'),
(13, '4cb953d2-38ec-481f-9e8b-0765e5f544ab', '{\"startDatetime\":\"2022-03-28 12:12:52\"}'),
(14, 'deb2f845-b476-4af6-bed2-69dcc06916bf', '{\"startDatetime\":\"2022-03-28 12:13:31\"}'),
(15, '6b354c59-6c03-45b0-bad5-76441f6fdeba', '{\"startDatetime\":\"2022-03-28 12:13:39\"}'),
(16, 'e0c699f9-92d4-4858-aaec-7082843334e8', '{\"startDatetime\":\"2022-03-28 12:13:41\"}'),
(17, '859cceb9-3022-47a0-aadb-bdba53862a22', '{\"startDatetime\":\"2022-03-28 12:14:47\"}'),
(18, '8298e009-a7ef-41fb-bd51-9923d24fb78e', '{\"startDatetime\":\"2022-03-28 12:19:12\"}'),
(19, '36826ca8-1b44-4287-a7be-ae669df86b69', '{\"startDatetime\":\"2022-03-28 12:20:54\"}'),
(20, 'd22b7379-f6bd-4e1c-b8ab-24c4f17b92a1', '{\"startDatetime\":\"2022-03-28 12:21:46\"}'),
(21, '0b15aec5-48a6-438a-a1dc-4a109f42c7b0', '{\"startDatetime\":\"2022-03-28 12:22:00\"}'),
(22, '40d76e72-7a5c-467a-830d-140ef5bdcf0f', '{\"startDatetime\":\"2022-03-28 12:22:49\"}'),
(23, 'ea0cdaee-d19a-4b41-b624-ca7fa566eb88', '{\"startDatetime\":\"2022-03-28 12:25:36\"}'),
(24, 'cbc6dd0f-813b-4108-8221-e0e55e73c76d', '{\"startDatetime\":\"2022-03-28 12:25:37\"}'),
(25, '4a4cbc09-470e-41c4-b230-cb8f211527ca', '{\"startDatetime\":\"2022-03-28 12:28:14\"}'),
(26, '2d23d1b4-ea48-4ab5-9f94-bda0e4a8d79e', '{\"startDatetime\":\"2022-03-28 12:28:38\"}'),
(27, 'a9fd47bc-3a86-4045-a29f-a13ca375d3ad', '{\"startDatetime\":\"2022-03-28 12:30:14\"}'),
(28, '79753250-704f-41f4-b145-5a9e01197f48', '{\"startDatetime\":\"2022-03-28 12:31:29\"}'),
(29, 'bc6c1a72-31e0-4675-a4e4-1a08a00b774e', '{\"startDatetime\":\"2022-03-28 12:31:55\"}'),
(30, 'fe6adde4-9e36-4216-856a-71a450506336', '{\"startDatetime\":\"2022-03-28 12:32:10\"}'),
(31, '318520ea-d2da-439a-8152-924886f118c4', '{\"startDatetime\":\"2022-03-28 12:32:18\"}'),
(32, '01aa3b26-4e31-4aac-9dd5-d48ac4b4bce5', '{\"startDatetime\":\"2022-03-28 12:34:11\"}'),
(33, 'c83c0291-5402-409c-903e-2d420e341565', '{\"startDatetime\":\"2022-03-28 12:34:13\"}'),
(34, '6b4bdb02-d48f-4bff-bc3e-28c25bec9b30', '{\"startDatetime\":\"2022-03-28 12:34:14\"}'),
(35, '5c18ea4b-62a6-4e54-907f-2a140cdb22f4', '{\"startDatetime\":\"2022-03-28 12:34:14\"}'),
(36, '4f09854e-93ef-44f7-b02c-31c3d29de3ae', '{\"startDatetime\":\"2022-03-28 12:34:14\"}'),
(37, 'da74ba11-a74a-4920-87c5-47e00189e587', '{\"startDatetime\":\"2022-03-28 12:34:15\"}'),
(38, '93bd8cc8-a304-4889-8487-b5719c11ba97', '{\"startDatetime\":\"2022-03-28 12:34:15\"}'),
(39, 'ac81f1ab-fe07-4bb6-b396-10901d450317', '{\"startDatetime\":\"2022-03-28 12:34:15\"}'),
(40, 'fea3b1cd-fb8c-4d11-91e3-5b0d36f42817', '{\"startDatetime\":\"2022-03-28 12:34:15\"}'),
(41, '78cb5136-44ed-41c0-b727-f776653ba153', '{\"startDatetime\":\"2022-03-28 12:34:15\"}'),
(42, '80a841f2-3ee4-452c-a8f2-e8ae70998a5e', '{\"startDatetime\":\"2022-03-28 12:34:16\"}'),
(43, 'abc92308-be2a-4fa1-8180-f10f03611895', '{\"startDatetime\":\"2022-03-28 12:34:16\"}'),
(44, '335e6598-73f5-49d6-8c4c-06bf41a022f3', '{\"startDatetime\":\"2022-03-28 12:34:16\"}'),
(45, 'd93c7b91-df65-44f1-9d49-84592b724f89', '{\"startDatetime\":\"2022-03-28 12:34:16\"}'),
(46, '2bca366a-4724-4984-8d3e-e2d299d2574a', '{\"startDatetime\":\"2022-03-28 12:34:16\"}'),
(47, 'c597a533-0911-429f-b17e-c1fd7f0b3aa8', '{\"startDatetime\":\"2022-03-28 12:34:17\"}'),
(48, '41bc3da9-d9f9-4625-b913-6f9fca1a7f47', '{\"startDatetime\":\"2022-03-28 12:34:17\"}'),
(49, 'df2a2a48-485d-464a-9139-0faf9aad289e', '{\"startDatetime\":\"2022-03-28 12:34:17\"}'),
(50, 'e64e8246-d6f5-44cf-b87a-9c231e272542', '{\"startDatetime\":\"2022-03-28 12:34:17\"}'),
(51, '5fc63bab-1b2f-4cba-9d0b-75bb815c7824', '{\"startDatetime\":\"2022-03-28 12:34:17\"}'),
(52, 'e4ee4130-224e-473e-8ad8-cc4fc7696454', '{\"startDatetime\":\"2022-03-28 12:34:18\"}'),
(53, '3940ca3c-e04e-4b00-b157-40e86806e2f9', '{\"startDatetime\":\"2022-03-28 12:34:18\"}'),
(54, '61b44892-c0e5-42c7-b3c6-d79982463a4c', '{\"startDatetime\":\"2022-03-28 12:34:18\"}'),
(55, '8f3d09ec-962a-4c33-96e9-c7f03d96dfd1', '{\"startDatetime\":\"2022-03-28 12:34:18\"}'),
(56, '3bb56f46-af5e-4805-b9e2-a180cf090f1b', '{\"startDatetime\":\"2022-03-28 14:04:49\"}'),
(57, 'bcadcf99-0783-4ae4-8502-2df338f05865', '{\"startDatetime\":\"2022-03-28 14:05:15\"}'),
(58, 'f41fa9cc-15f2-4846-bc87-5e265886849d', '{\"startDatetime\":\"2022-03-28 14:05:15\"}'),
(59, '04826cdc-d048-4420-9822-0ec0be80706f', '{\"startDatetime\":\"2022-03-28 14:05:15\"}'),
(60, 'aeb7e5b2-80ef-4415-bd38-16dd2ad822d9', '{\"startDatetime\":\"2022-03-29 06:44:12\"}'),
(61, 'c4039075-9dee-411d-83fe-aebdfb5692c2', '{\"startDatetime\":\"2022-03-30 09:58:14\"}'),
(62, '36c54beb-f342-4da8-8b6a-3900894a0bab', '{\"startDatetime\":\"2022-03-30 09:58:39\"}'),
(63, '3bb3a5e2-ccc3-4c0b-b7db-1c449f69f49e', '{\"startDatetime\":\"2022-03-30 09:58:48\"}'),
(64, '3790de64-b83b-4253-b604-016a7aa02344', '{\"startDatetime\":\"2022-03-30 09:58:53\"}'),
(65, '5ccbf4f2-b6a8-4956-8342-b7920e96af8a', '{\"startDatetime\":\"2022-03-30 09:59:14\"}'),
(66, 'bd761d70-6dff-4c61-b204-42a4e0aa45ac', '{\"startDatetime\":\"2022-03-30 10:00:07\"}'),
(67, '4127a8a1-3cd2-44a7-9847-158ac3af949d', '{\"startDatetime\":\"2022-03-30 10:00:08\"}'),
(68, 'b91f3a26-f21e-4cee-b5c2-00fb1aac3296', '{\"startDatetime\":\"2022-03-30 10:00:08\"}'),
(69, '8232f611-d6b5-4d06-82d0-59ee17f5f535', '{\"startDatetime\":\"2022-03-30 10:00:08\"}'),
(70, '97b3bd6a-43e7-41a3-b254-fae2edcad5fb', '{\"startDatetime\":\"2022-03-30 10:00:08\"}'),
(71, '304499c8-4df5-44a9-aa5d-d372266ba1e2', '{\"startDatetime\":\"2022-03-30 10:00:08\"}'),
(72, '15705856-ab82-4f59-a54c-581460bbdfa5', '{\"startDatetime\":\"2022-03-30 10:00:09\"}'),
(73, '4a50d2df-71e7-4d33-ba70-bc6b08c31e53', '{\"startDatetime\":\"2022-03-30 10:00:09\"}'),
(74, '93a76a34-b97a-4726-9c1a-a3ce0e282374', '{\"startDatetime\":\"2022-03-30 10:00:09\"}'),
(75, '0da6effc-f76d-4638-950c-8fa003eaa72b', '{\"startDatetime\":\"2022-03-30 10:00:09\"}'),
(76, 'eb09ed7f-a8f9-47c6-8ad2-e189a37d1cc9', '{\"startDatetime\":\"2022-03-30 10:00:10\"}'),
(77, '4e9fa9d0-92f4-4157-a7be-57256b276915', '{\"startDatetime\":\"2022-03-30 10:00:10\"}'),
(78, '49aebd8b-69c1-4519-af28-770d533a3341', '{\"startDatetime\":\"2022-03-30 10:00:10\"}'),
(79, '683f7341-a05f-48db-b11e-4ae3b7c83e5d', '{\"startDatetime\":\"2022-03-30 10:00:10\"}'),
(80, 'dfaee90f-fb4b-425c-8480-e848f9e57659', '{\"startDatetime\":\"2022-03-30 10:00:10\"}'),
(81, '02683c66-292f-44cd-a888-980527531d2e', '{\"startDatetime\":\"2022-03-30 10:06:00\"}'),
(82, '91e66bb8-3390-4eeb-8068-0fa3d8a738d0', '{\"startDatetime\":\"2022-03-30 10:08:58\"}'),
(83, '666f2b42-0077-4aa9-a636-ec2789c93728', '{\"startDatetime\":\"2022-03-30 10:09:00\"}'),
(84, 'dce0958b-9d07-4c1e-946d-e49a939e8b83', '{\"startDatetime\":\"2022-03-30 10:10:09\"}'),
(85, 'da029ee5-5094-4f61-b1c5-073212834d13', '{\"startDatetime\":\"2022-03-30 10:10:10\"}'),
(86, 'e5689b2a-b4b2-49a7-886b-8e5eec612dc6', '{\"startDatetime\":\"2022-03-30 12:09:24\"}'),
(87, '6a065232-d9d7-4219-a80e-bddfead72da1', '{\"startDatetime\":\"2022-03-30 12:10:45\"}'),
(88, 'dca50ac4-c30b-42e7-bb78-b71664df89c1', '{\"startDatetime\":\"2022-03-30 12:11:07\"}'),
(89, 'a5485c53-1ea9-481a-a9a7-526968820639', '{\"startDatetime\":\"2022-03-30 12:11:33\"}'),
(90, '7917cbcd-2e93-496f-bec7-296970918186', '{\"startDatetime\":\"2022-03-30 12:11:41\"}'),
(91, '3fd3436a-fde9-44ac-92aa-b90b73495e05', '{\"startDatetime\":\"2022-03-30 12:12:10\"}'),
(92, '009141f8-a4a1-4de0-9a9e-d5e554c3ab4f', '{\"startDatetime\":\"2022-03-30 12:12:18\"}'),
(93, '74d9f050-8824-4c29-82b1-5d59cb663f27', '{\"startDatetime\":\"2022-03-30 12:12:25\"}'),
(94, '13208b5c-315f-4c69-9d3e-8b4c25c3c3b8', '{\"startDatetime\":\"2022-03-30 12:12:41\"}'),
(95, 'ca17f0b5-3e7b-4934-b982-93d4946b3ad7', '{\"startDatetime\":\"2022-03-30 12:12:52\"}'),
(96, '4e70ba38-44a8-42be-8ad8-e0ba25c4ffa0', '{\"startDatetime\":\"2022-03-30 12:13:02\"}'),
(97, '334d1643-a0ad-4aaf-8a18-434942c8df2d', '{\"startDatetime\":\"2022-03-30 12:13:09\"}'),
(98, '538786b1-e576-47a2-a8db-0da025afb73b', '{\"startDatetime\":\"2022-03-30 12:13:24\"}'),
(99, '408ddd60-22ca-42d8-9fbe-7a5ca6ee4885', '{\"startDatetime\":\"2022-03-30 12:13:42\"}'),
(100, 'c969dbd5-1f2d-4366-bfa7-888f34bfe717', '{\"startDatetime\":\"2022-03-30 12:13:48\"}'),
(101, '867f445c-f92d-495c-bcd9-a88afcfa03da', '{\"startDatetime\":\"2022-03-30 12:13:55\"}'),
(102, '048a9390-af9c-4b33-9000-861cab68da95', '{\"startDatetime\":\"2022-03-30 12:14:01\"}'),
(103, '08a72dca-5864-410d-8d9c-26da0773e327', '{\"startDatetime\":\"2022-03-30 12:14:09\"}'),
(104, 'b6ac1158-2cce-4c1e-afed-eec8daceee4e', '{\"startDatetime\":\"2022-03-30 12:14:16\"}'),
(105, '39e79714-fcaf-4151-8892-958d9b620045', '{\"startDatetime\":\"2022-03-30 12:14:22\"}'),
(106, 'd1e4a705-deec-4764-b2e4-af79b3fb1f6d', '{\"startDatetime\":\"2022-03-30 12:14:47\"}'),
(107, 'fc6377ce-1c43-46cf-98c5-c432a213e5cc', '{\"startDatetime\":\"2022-03-30 12:14:48\"}'),
(108, '79e0b65c-2a80-416d-9f45-0459af7dee28', '{\"startDatetime\":\"2022-03-30 12:14:48\"}'),
(109, '87e0b42a-49ee-48f3-9f1d-4e32f6de63fa', '{\"startDatetime\":\"2022-03-30 12:14:49\"}'),
(110, '645e0145-6a52-4c1b-997c-98fd3dd67511', '{\"startDatetime\":\"2022-03-30 12:14:55\"}'),
(111, '3df40a19-ed9a-45bc-ac66-8357a52c5927', '{\"startDatetime\":\"2022-03-30 12:14:56\"}'),
(112, '4eeb5e7b-ace6-45cc-9a7c-6db31085c2b7', '{\"startDatetime\":\"2022-03-30 12:14:56\"}'),
(113, '3ca65186-fe11-43e0-826c-9b245aa0d063', '{\"startDatetime\":\"2022-03-30 12:15:34\"}'),
(114, 'f9757881-57a5-4d23-89bf-1678f096379d', '{\"startDatetime\":\"2022-03-30 12:32:47\"}'),
(115, 'bf4cad9e-1778-463b-a629-57dcbbf4e7f2', '{\"startDatetime\":\"2022-03-30 12:33:12\"}'),
(116, 'fbf4514b-960a-4112-9ab4-72bb6856d3d7', '{\"startDatetime\":\"2022-03-30 12:48:07\"}'),
(117, 'feac8433-908d-444c-83cc-c581bf19dd15', '{\"startDatetime\":\"2022-03-30 12:49:06\"}'),
(118, 'fd9ff943-0884-4068-b972-6d9dc69e0b61', '{\"startDatetime\":\"2022-03-30 12:59:24\"}'),
(119, '3fe3f5be-6607-4623-a39f-e6087163c43b', '{\"startDatetime\":\"2022-03-30 13:05:42\"}'),
(120, '4e4c120d-c0d3-4463-83ad-44f81f62e4af', '{\"startDatetime\":\"2022-03-30 13:05:53\"}'),
(121, 'ec66d63c-97f3-4bd9-8e52-2d39c75e522c', '{\"startDatetime\":\"2022-03-30 13:05:54\"}'),
(122, '1541dda3-ca86-45df-a7e9-e6812386bfcd', '{\"startDatetime\":\"2022-03-30 13:05:54\"}'),
(123, 'fec9b24a-bb84-48f4-9be1-f9bb3eb048c8', '{\"startDatetime\":\"2022-03-30 13:05:54\"}'),
(124, '42d78e1d-7450-4043-9f93-4abf34217f8a', '{\"startDatetime\":\"2022-03-30 13:06:00\"}'),
(125, '28a2ad43-1d04-4ca1-8ec3-0e5b0d279cca', '{\"startDatetime\":\"2022-03-30 13:06:01\"}'),
(126, '337ad848-4644-4240-81eb-5a69c462d130', '{\"startDatetime\":\"2022-03-30 13:06:01\"}');
=======
(1, 32, '{\"startDatetime\":\"2022-03-28 14:04:21\"}'),
(2, 0, '{\"startDatetime\":\"2022-03-29 09:30:14\"}');
>>>>>>> develop

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
