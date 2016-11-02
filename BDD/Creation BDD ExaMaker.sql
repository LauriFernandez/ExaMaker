-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2016 at 12:09 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `examens`
--

CREATE TABLE `examens` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `DateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModification` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examens`
--

INSERT INTO `examens` (`ID`, `Nom`, `Slug`, `DateCreation`, `DateModification`) VALUES
(1, 'Cryptologie', 'Crypto', '2016-11-01 22:49:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exercices`
--

CREATE TABLE `exercices` (
  `ID` int(11) NOT NULL,
  `ExamenID` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Points` int(10) UNSIGNED NOT NULL,
  `DateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModification` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exercices`
--

INSERT INTO `exercices` (`ID`, `ExamenID`, `Nom`, `Points`, `DateCreation`, `DateModification`) VALUES
(1, 1, 'César', 5, '2016-11-01 23:01:29', NULL),
(2, 1, 'Affine', 5, '2016-11-01 23:01:29', NULL),
(3, 1, 'Hill', 5, '2016-11-01 23:04:15', NULL),
(4, 1, 'RSA', 5, '2016-11-01 23:04:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ID` int(11) NOT NULL,
  `ExerciceID` int(11) NOT NULL,
  `Question` longtext NOT NULL,
  `Points` int(10) UNSIGNED NOT NULL,
  `DateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateModification` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `ExerciceID`, `Question`, `Points`, `DateCreation`, `DateModification`) VALUES
(1, 1, 'La clef (421, 11) est-elle une clef de chiffrement affine par paquet de 2 ?Justifier. ', 2, '2016-11-01 23:07:57', NULL),
(2, 1, 'On a utilisé un chiffrement de César par paquet de 2 avec 2222 comme clef et on a obtenu 119-2234. Quel était le message non chiffré ? Détailler les étapes.', 3, '2016-11-01 23:07:57', NULL),
(3, 2, 'On a utilisé un chiffrement de affine par paquet de 1 avec (5, 25) comme clef et on a obtenu YNM. Quel était le message non chiffré ? Détailler les étapes.', 2, '2016-11-01 23:12:33', NULL),
(4, 2, 'Donner la fonction de déchiffrement du cryptosystème affine par paquet de 2 de clef (5, 0).', 3, '2016-11-01 23:12:33', NULL),
(5, 3, 'On considère la matrice M =\r\n\r\n(3 −4)\r\n(1  5)\r\n\r\nmodulo 26.\r\n\r\nCalculer le déterminant de M.\r\n\r\n', 2, '2016-11-01 23:21:32', NULL),
(6, 3, 'Avec la méthode Hill de clef M, on a obtenue le message CUMUBL. Décrypter ce message.', 2, '2016-11-01 23:21:32', NULL),
(11, 3, 'En déduire M−1 la matrice inverse de M modulo 26. ', 1, '2016-11-01 23:36:31', NULL),
(7, 4, 'Vous interceptez un message codé en RSA\r\n768 − 3285 − 1267 − 1519\r\nVous savez que la clef publique utilisée pour chiffrer ce message est (3977, 2033).\r\n\r\nDéterminer deux nombres premiers p et q tels que p < q et pq = 3977.', 1, '2016-11-01 23:29:13', NULL),
(8, 4, 'En déduire la valeur de ϕ = (p − 1)(q − 1).', 1, '2016-11-01 23:29:13', NULL),
(9, 4, 'Appliquer l’algorithme d’Euclide étendu pour déterminer l’inverse de 2033 modulo ϕ. \r\n', 1, '2016-11-01 23:30:38', NULL),
(10, 4, 'Déchiffrer le message.', 2, '2016-11-01 23:30:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Type` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Login`, `Password`, `Type`) VALUES
(1, 'David', 'Hébert', 1),
(2, 'Yanis', 'Kacher', 2),
(3, 'Assan', 'Diomande', 2),
(4, 'Brian', 'Bourdon', 3),
(5, 'Loic', 'Danjean', 4),
(6, 'Laurie', 'Fernandez', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examens`
--
ALTER TABLE `examens`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nom_UNIQUE` (`Nom`);

--
-- Indexes for table `exercices`
--
ALTER TABLE `exercices`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nom_UNIQUE` (`Nom`),
  ADD KEY `fk_Exercices_Examens1_idx` (`ExamenID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Questions_Exercices_idx` (`ExerciceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Login_UNIQUE` (`Login`),
  ADD UNIQUE KEY `Password_UNIQUE` (`Password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examens`
--
ALTER TABLE `examens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `exercices`
--
ALTER TABLE `exercices`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
