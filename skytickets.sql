-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2026 at 05:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skytickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `aeroporti`
--

CREATE TABLE `aeroporti` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `citta` varchar(100) DEFAULT NULL,
  `paese` varchar(100) DEFAULT NULL,
  `codice` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aeroporti`
--

INSERT INTO `aeroporti` (`id`, `nome`, `citta`, `paese`, `codice`) VALUES
(1, 'Torino Caselle', 'Torino', 'Italia', 'TRN'),
(2, 'Milano Malpensa', 'Milano', 'Italia', 'MXP'),
(3, 'Stockholm Arlanda', 'Stoccolma', 'Svezia', 'ARN'),
(4, 'Paris Charles de Gaulle', 'Parigi', 'Francia', 'CDG'),
(5, 'Frankfurt Airport', 'Francoforte', 'Germania', 'FRA');

-- --------------------------------------------------------

--
-- Table structure for table `compagnie`
--

CREATE TABLE `compagnie` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `paese` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compagnie`
--

INSERT INTO `compagnie` (`id`, `nome`, `paese`) VALUES
(1, 'Lufthansa', 'Germania'),
(2, 'Ryanair', 'Irlanda'),
(3, 'SAS', 'Svezia'),
(4, 'Air France', 'Francia'),
(5, 'ITA Airways', 'Italia');

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cognome` varchar(50) DEFAULT NULL,
  `ruolo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`, `nome`, `cognome`, `ruolo`) VALUES
(1, 'admin', 'admin123', 'Francesco', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `voli`
--

CREATE TABLE `voli` (
  `id` int(11) NOT NULL,
  `compagnia_id` int(11) DEFAULT NULL,
  `aeroporto_partenza` int(11) DEFAULT NULL,
  `aeroporto_arrivo` int(11) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `data_volo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voli`
--

INSERT INTO `voli` (`id`, `compagnia_id`, `aeroporto_partenza`, `aeroporto_arrivo`, `prezzo`, `data_volo`) VALUES
(1, 1, 1, 5, 189.99, '2026-06-15'),
(2, 2, 1, 3, 79.99, '2026-06-18'),
(3, 3, 3, 1, 120.5, '2026-06-20'),
(5, 5, 2, 4, 95.5, '2026-06-25'),
(6, 1, 2, 5, 150, '2026-07-10'),
(7, 4, 4, 2, 109.99, '2026-06-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aeroporti`
--
ALTER TABLE `aeroporti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compagnie`
--
ALTER TABLE `compagnie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `voli`
--
ALTER TABLE `voli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compagnia_id` (`compagnia_id`),
  ADD KEY `aeroporto_partenza` (`aeroporto_partenza`),
  ADD KEY `aeroporto_arrivo` (`aeroporto_arrivo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aeroporti`
--
ALTER TABLE `aeroporti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `compagnie`
--
ALTER TABLE `compagnie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voli`
--
ALTER TABLE `voli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `voli`
--
ALTER TABLE `voli`
  ADD CONSTRAINT `voli_ibfk_1` FOREIGN KEY (`compagnia_id`) REFERENCES `compagnie` (`id`),
  ADD CONSTRAINT `voli_ibfk_2` FOREIGN KEY (`aeroporto_partenza`) REFERENCES `aeroporti` (`id`),
  ADD CONSTRAINT `voli_ibfk_3` FOREIGN KEY (`aeroporto_arrivo`) REFERENCES `aeroporti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
