-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2021 at 04:50 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18069696_carcourier`
--

-- --------------------------------------------------------

--
-- Table structure for table `comenzi`
--

CREATE TABLE `comenzi` (
  `id_comanda` int(10) UNSIGNED NOT NULL COMMENT 'id-ul unic al comenzii',
  `id_user` int(10) UNSIGNED NOT NULL COMMENT 'id-ul clientului',
  `id_sofer` int(11) NOT NULL COMMENT 'id-ul soferului',
  `vin_vehicul_trans` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'vin-ul vehiculului transportat',
  `id_loc1` int(11) NOT NULL COMMENT 'id-ul locatiei de preluare',
  `id_loc2` int(11) NOT NULL COMMENT 'id-ul locatiei de livrare'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Lista comenzilor efectuate. Tabel asociativ ce rezolva cardinalitatea many to many ce s-ar genera intre users, soferi si vehicule_trans. Relatii: one to many vehicule_trans si comenzi (o comanda poate contine o singura masina, dar o masina poate fi transportata de mai multe ori); one to many intre users si comenzi (un utilizator poate avea mai multe comenzi, dar o comanda apartine unui singur utilizator);  one to many intre soferi si comenzi (un sofer poate avea mai multe comenzi, o comanda e atribuita unui singur sofer).';

-- --------------------------------------------------------

--
-- Table structure for table `locatii`
--

CREATE TABLE `locatii` (
  `id_locatie` int(11) NOT NULL COMMENT 'id-ul unic al locatiei',
  `nume_locatie` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'numele locatiei',
  `cod_postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Orase';

-- --------------------------------------------------------

--
-- Table structure for table `soferi`
--

CREATE TABLE `soferi` (
  `id_sofer` int(11) NOT NULL COMMENT 'id-ul unic al soferului',
  `nume` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Numele de familie al soferului (last name).',
  `prenume` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Prenumele soferului (first name)',
  `salariu_unitar` float(4,2) DEFAULT NULL COMMENT 'salariul per km al soferului.',
  `vin_vehicul` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabelul memoreaza soferii companiei. Un sofer poate lucra pe o singura masina, iar o masina poate fi a unui singur sofer (in sensul ca nu pot lucra 2 oameni pe o masina), deci relatie one to one intre soferi si masini (foreign key catre vehicule_comp, vin_vehicul). Salariul unitar reprezinta castigul per kilometru parcurs al soferului (aplicatia calculeaza la sfarsitul lunii numarul total de km parcursi si astfel genereaza salariul).';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL COMMENT 'id unic utilizator',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email utilizator',
  `nume` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Numele de familie al utilizatorului (last name).',
  `prenume` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Prenumele utilizatorului (first name).',
  `parola` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nrtel` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Numar telefon utilizator',
  `adresa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Adresa utilizatorului',
  `id_locatie` int(11) DEFAULT NULL COMMENT 'id locatie user (a orasului)',
  `data_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabel utilizatori';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `nume`, `prenume`, `parola`, `nrtel`, `adresa`, `id_locatie`, `data_reg`) VALUES
(1, 'petrovici.francesco@gmail.com', 'Petrovici', 'Francesco', 'daw123', '0741111111', NULL, NULL, '2021-12-06 16:14:57'),
(2, 'petrovici.francesco@gmail.com', 'Petrovici', 'Francesco', 'daw123', '0741111111', NULL, NULL, '2021-12-06 16:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `vehicule_comp`
--

CREATE TABLE `vehicule_comp` (
  `vin_vehicul` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'VIN-ul vehiculului',
  `marca` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Marca vehiculului',
  `model` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Modelul vehiculului',
  `an_fab` year(4) DEFAULT NULL COMMENT 'anul fabricatiei',
  `id_sofer` int(11) DEFAULT NULL COMMENT 'id-ul soferului vehiculului',
  `consum_carburant` float(3,2) DEFAULT NULL COMMENT 'consumul mediu de carburant al vehiculului'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Vehiculele companiei. Consumul mediu de carburant are rol in calcularea pretului unei comenzi. Aplicatia va extrage pretul combustibilului in fiecare zi (de pe un site al vreunui lant de statii de alimentare).';

-- --------------------------------------------------------

--
-- Table structure for table `vehicule_trans`
--

CREATE TABLE `vehicule_trans` (
  `vin_vehicul_trans` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'VIN-ul vehiculului este unic (si in baza noastra de date si in realitate, nu ar trebui sa existe doua vehicule pe glob cu acelasi vin, dar au mai fost cazuri).',
  `marca` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Marca vehiculului.',
  `model` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Modelul vehiculului',
  `an_fab` year(4) DEFAULT NULL COMMENT 'Anul de fabricatie al vehiculului',
  `masa` int(11) DEFAULT NULL COMMENT 'masa in kg a vehiculului'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='datele vehiculelor transportate';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`id_comanda`),
  ADD KEY `fk_comenzi_soferi` (`id_sofer`),
  ADD KEY `fk_comenzi_users` (`id_user`),
  ADD KEY `fk_comenzi_vehicule_trans` (`vin_vehicul_trans`);

--
-- Indexes for table `locatii`
--
ALTER TABLE `locatii`
  ADD PRIMARY KEY (`id_locatie`);

--
-- Indexes for table `soferi`
--
ALTER TABLE `soferi`
  ADD PRIMARY KEY (`id_sofer`),
  ADD KEY `fk_soferi_vehicule_comp` (`vin_vehicul`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `data_reg` (`data_reg`),
  ADD KEY `email` (`email`),
  ADD KEY `fk_users_locatii` (`id_locatie`);

--
-- Indexes for table `vehicule_comp`
--
ALTER TABLE `vehicule_comp`
  ADD PRIMARY KEY (`vin_vehicul`),
  ADD KEY `fk_vehicule_comp_soferi` (`id_sofer`);

--
-- Indexes for table `vehicule_trans`
--
ALTER TABLE `vehicule_trans`
  ADD PRIMARY KEY (`vin_vehicul_trans`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `id_comanda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id-ul unic al comenzii';

--
-- AUTO_INCREMENT for table `locatii`
--
ALTER TABLE `locatii`
  MODIFY `id_locatie` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id-ul unic al locatiei';

--
-- AUTO_INCREMENT for table `soferi`
--
ALTER TABLE `soferi`
  MODIFY `id_sofer` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id-ul unic al soferului';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id unic utilizator', AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `fk_comenzi_soferi` FOREIGN KEY (`id_sofer`) REFERENCES `soferi` (`id_sofer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
