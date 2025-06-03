-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 03, 2025 at 06:27 PM
-- Server version: 5.7.39
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nosaukums` varchar(50) NOT NULL,
  `apraksts` text NOT NULL,
  `cena` float NOT NULL,
  `attels` varchar(255) NOT NULL,
  `datums` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nosaukums`, `apraksts`, `cena`, `attels`, `datums`) VALUES
(1, 'Siers Gouda', 'Maigs, pussausais holandiešu siers ar dzeltenīgu garoziņu.', 5.49, 'siers_gouda.jpg', '2025-06-03 18:05:29'),
(2, 'Tomāti', 'Svaigi, sulīgi tomāti no vietējās saimniecības.', 2.29, 'tomati.jpg', '2025-06-03 18:05:29'),
(3, 'Piens 2%', 'Pastērizēts govs piens ar 2% tauku saturu.', 1.15, 'piens_2procenti.jpg', '2025-06-03 18:05:29'),
(4, 'Maize rudzu', 'Tradicionāla rupjmaize ar ķimenēm.', 1.89, 'maize_rudzu.jpg', '2025-06-03 18:05:29'),
(5, 'Olas (10 gab.)', 'Brīvos apstākļos dētas vistas olas.', 2.99, 'olas_10gab.jpg', '2025-06-03 18:05:29'),
(6, 'Āboli Granny Smith', 'Skābenie zaļie āboli, piemēroti gan ēšanai, gan cepšanai.', 2.49, 'aboli_granny_smith.jpg', '2025-06-03 18:05:29'),
(7, 'Burkāni', 'Svaigi un saldi burkāni iepakojumā (1kg).', 1.1, 'burkani.jpg', '2025-06-03 18:05:29'),
(8, 'Cukurs', 'Baltais cukurs cepšanai un saldināšanai (1kg).', 1.05, 'cukurs.jpg', '2025-06-03 18:05:29'),
(9, 'Kafija malta', 'Aromātiska malta kafija, vidējas grauzdēšanas (250g).', 3.99, 'kafija_malta.jpg', '2025-06-03 18:05:29'),
(10, 'Sviests', 'Svaigs Latvijas sviests ar 82% tauku.', 2.45, 'sviests.jpg', '2025-06-03 18:05:29'),
(11, 'Šokolāde tumšā', 'Tumšā šokolāde ar 70% kakao saturu.', 1.89, 'sokolade_tumsa.jpg', '2025-06-03 18:05:29'),
(12, 'Banāni', 'Gatavi ēšanai, dzelteni banāni no Ekvadoras.', 1.59, 'banani.jpg', '2025-06-03 18:05:29'),
(13, 'Jogurts zemeņu', 'Krēmīgs jogurts ar zemeņu gabaliņiem (150g).', 0.89, 'jogurts_zemenu.jpg', '2025-06-03 18:05:29'),
(14, 'Rīsi baltie', 'Ilgāk vārāmie baltie rīsi 1kg iepakojumā.', 1.35, 'risi_baltie.jpg', '2025-06-03 18:05:29'),
(15, 'Citrons', 'Svaigi citroni, bagāti ar C vitamīnu.', 0.75, 'citrons.jpg', '2025-06-03 18:05:29'),
(16, 'Cūkgaļas karbonāde', 'Atdzesēta karbonāde bez kaula, piemērota cepšanai.', 4.99, 'cukgala_karbonade.jpg', '2025-06-03 18:05:29'),
(17, 'Laša fileja', 'Svaiga norvēģu laša fileja bez ādas.', 7.95, 'lasa_fileja.jpg', '2025-06-03 18:05:29'),
(18, 'Sāls jūras', 'Smalki malta jūras sāls burciņā (500g).', 1.25, 'sals_juras.jpg', '2025-06-03 18:05:29'),
(19, 'Medus', 'Dabīgs Latvijas ziedu medus (400g).', 4.25, 'medus.jpg', '2025-06-03 18:05:29'),
(20, 'Minerālūdens gāzēts', 'Atspirdzinošs dzēriens ar ogļskābo gāzi (1.5L).', 0.99, 'mineraluudens_gazets.jpg', '2025-06-03 18:05:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
