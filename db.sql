-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 03. jun 2020 ob 02.05
-- Različica strežnika: 10.4.11-MariaDB
-- Različica PHP: 7.4.4

drop database if exists taksimeter;
create database taksimeter;
use taksimeter;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `taksimeter`
--

-- --------------------------------------------------------

--
-- Struktura tabele `voznje`
--

CREATE TABLE `voznje` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `priimek` varchar(100) NOT NULL,
  `cakanje` int(11) NOT NULL,
  `razdalja` float(10,2) NOT NULL,
  `cena` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Odloži podatke za tabelo `voznje`
--

INSERT INTO `voznje` (`id`, `username`, `ime`, `priimek`, `cakanje`, `razdalja`, `cena`) VALUES
(1, 'admin', 'Janez', 'Novak', 1, 20.00, 34.79),
(2, 'admin', 'Marija', 'Novak', 0, 30.00, 29.70),
(3, 'admin', 'Simon', 'Babnik', 0, 10.00, 9.90),
(4, 'simon', 'Franc', 'Novak', 1, 40.00, 54.59),
(5, 'simon', 'Matic', 'Zupančič', 0, 5.00, 4.95),
(6, 'user', 'Žiga', 'Rapuš', 2, 20.00, 49.78),
(7, 'user', 'Lan', 'Zavašnik', 1, 20.00, 34.79);

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'simon', 'simon@simon', 'b30bd351371c686298d32281b337e8e9'),
(3, 'user', 'user@user', 'ee11cbb19052e40b07aac0ca060c23ee');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `voznje`
--
ALTER TABLE `voznje`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `voznje`
--
ALTER TABLE `voznje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
