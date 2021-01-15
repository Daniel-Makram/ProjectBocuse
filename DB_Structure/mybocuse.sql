-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2021 at 11:40 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybocuse`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingrédients`
--

DROP TABLE IF EXISTS `ingrédients`;
CREATE TABLE IF NOT EXISTS `ingrédients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(128) NOT NULL,
  `Type` enum('Viande Rouge','Légumes','Fruits','Pates','Creme','Poisson','Poulet','Fruits de Mer','Chocolat') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingrédients`
--

INSERT INTO `ingrédients` (`id`, `Nom`, `Type`) VALUES
(1, 'Boeuf', 'Viande Rouge'),
(2, 'Patates', 'Légumes'),
(3, 'Aucun', 'Viande Rouge'),
(4, 'Porc', 'Viande Rouge'),
(5, 'Carottes', 'Légumes'),
(6, 'Courgettes', 'Légumes'),
(7, 'Asperges', 'Légumes'),
(8, 'Citron', 'Fruits'),
(9, 'Pomme', 'Fruits'),
(10, 'Mangue', 'Fruits'),
(11, 'Crevettes', 'Fruits de Mer'),
(12, 'Crabe', 'Fruits de Mer'),
(13, 'Saumon', 'Poisson'),
(14, 'Thon', 'Poisson'),
(15, 'Brochet', 'Poisson'),
(16, 'Espadon', 'Poisson'),
(17, 'Agneau', 'Viande Rouge'),
(18, 'Aubergines', 'Légumes'),
(19, 'Orange', 'Fruits'),
(20, 'Tomates', 'Fruits'),
(21, 'Baleine', 'Poisson'),
(22, 'Linguine', 'Pates'),
(23, 'Penne', 'Pates'),
(24, 'Fettucine', 'Pates'),
(25, 'Spaghetti', 'Pates'),
(26, 'Crème fraiche', 'Creme'),
(27, 'Parmesan', 'Creme'),
(28, 'Cheddar', 'Creme'),
(29, 'Mozzarella', 'Creme'),
(30, 'Pecorino', 'Creme'),
(31, 'Beurre', 'Creme');

-- --------------------------------------------------------

--
-- Table structure for table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `auteur_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `ingredients_Id` int(11) NOT NULL DEFAULT '3',
  `ingredients_B_Id` int(11) NOT NULL DEFAULT '3',
  `ingredients_C_Id` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `ingredients` (`ingredients_Id`),
  KEY `ingredientsSec` (`ingredients_B_Id`),
  KEY `ingredientsThird` (`ingredients_C_Id`),
  KEY `ingredient-user` (`auteur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recettes`
--

INSERT INTO `recettes` (`id`, `sujet`, `auteur_id`, `date`, `image`, `lien`, `ingredients_Id`, `ingredients_B_Id`, `ingredients_C_Id`) VALUES
(1, 'Pates Ã  la crÃ¨me et aux lardons', 20, '2021-01-11', './images/PastaCreamBacon.jpg', 'https://www.marmiton.org/recettes/recette_pates-a-la-carbonara_80453.aspx', 22, 4, 27),
(2, 'Pates Carbonara', 20, '2021-01-10', './images/pasta-carbonara.jpg', 'https://www.750g.com/pates-carbonara-r200273.htm', 22, 4, 27),
(3, 'Poulet au citron', 3, '2021-01-09', './images/lemon-butter-chicken-18.jpg', 'https://themodernproper.com/lemon-chicken', 1, 2, 8),
(4, 'Saumon Au four', 1, '2021-01-08', './images/SaumonAuFour.jpg', 'https://www.papillesetpupilles.fr/2018/05/saumon-au-four.html/', 13, 7, 3),
(5, 'Mac-N-Cheese', 3, '2021-01-12', './images/MacNCheese.jpg', 'https://themodernproper.com/instant-pot-mac-and-cheese', 23, 26, 28),
(6, 'Scampis aux asperges', 2, '2021-01-13', './images/ShrimpPan.jpg', 'https://themodernproper.com/old-bay-shrimp-and-sausage-sheet-pan-dinner', 11, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
CREATE TABLE IF NOT EXISTS `time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL DEFAULT '00:00:00',
  `time_left` time NOT NULL DEFAULT '00:00:00',
  `date` date NOT NULL DEFAULT '2021-01-01',
  `user_id` int(21) NOT NULL,
  PRIMARY KEY (`time_id`),
  KEY `time_ibfk_1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `time`, `time_left`, `date`, `user_id`) VALUES
(1, '12:10:40', '17:00:00', '2021-01-13', 1),
(2, '08:00:00', '15:42:00', '2021-01-01', 9),
(3, '19:45:39', '12:45:39', '2021-01-04', 9),
(4, '14:45:39', '08:45:39', '2021-01-09', 1),
(5, '05:48:25', '17:48:25', '2021-01-03', 9),
(6, '14:45:39', '19:48:25', '2021-01-05', 9),
(7, '04:48:57', '15:48:57', '2021-01-06', 2),
(8, '11:48:57', '19:48:57', '2021-01-08', 2),
(10, '05:10:15', '10:10:15', '2021-01-02', 9),
(11, '15:40:23', '15:40:23', '2021-01-04', 9),
(12, '15:40:23', '15:40:23', '2021-01-04', 9),
(13, '15:40:23', '15:40:23', '2021-01-04', 9),
(14, '15:40:23', '15:40:23', '2021-01-04', 9),
(18, '00:00:00', '00:00:00', '2021-01-01', 11),
(19, '15:01:01', '00:00:00', '2021-01-01', 1),
(33, '00:00:00', '00:00:00', '2021-01-01', 6),
(34, '00:00:00', '00:00:00', '2021-01-01', 16),
(77, '02:06:03', '00:00:00', '2021-01-15', 20),
(78, '02:09:48', '00:00:00', '2021-01-15', 20),
(82, '02:12:32', '00:00:00', '2021-01-15', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usersId` int(11) NOT NULL AUTO_INCREMENT,
  `usersFirstName` varchar(128) NOT NULL,
  `usersLastName` varchar(128) NOT NULL,
  `userAccountType` enum('chef','student') NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `Picture` varchar(128) NOT NULL DEFAULT 'Users/img/Boomer.jpg',
  PRIMARY KEY (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersFirstName`, `usersLastName`, `userAccountType`, `usersEmail`, `usersPwd`, `Picture`) VALUES
(1, 'James', 'Bond', 'chef', 'james@bond.com', 'jamesbond', 'Users/img/Boomer.jpg'),
(2, 'John', 'Doe', 'student', 'john@doe.com', 'johndoe', 'Users/img/Boomer.jpg'),
(3, 'Derek', 'Bond', 'student', 'bond@james.com', 'bondjames', 'Users/img/Boomer.jpg'),
(4, 'dan', 'dani', 'student', 'dan@mail.com', '$2y$10$y35dT.YW3NENcx62LC5TSOl7BDYXjw3.If2ZLZvwfZGt01MVqshr.', 'Users/img/Boomer.jpg'),
(5, 'dan', 'dani', 'student', 'dane@mail.com', '$2y$10$p87vY1ntcowK0UOU4.pBH.e/iRAjC00LVitL53HQjQ6AOoWAGwBcS', 'Users/img/Boomer.jpg'),
(6, 'dan', 'dani', 'student', 'dan@mail.com', '$2y$10$0EJbM0.o4T0hDjXvVhHaW.lY7msxO.taOIhk75HZ2PTVSZNSe4kka', 'Users/img/Boomer.jpg'),
(7, 'dan', 'dani', 'student', 'dan@mail.com', '$2y$10$nMtZd7aBCsIsgKmI.3vr9OYxAfKtTzP1MVrSoaNICPAtVeyuiH93G', 'Users/img/Boomer.jpg'),
(8, 'dan', 'dani', 'student', 'dan@mail.com', '$2y$10$fs0HowbNbiHIQ1FPydnsKesBaks4oJiJ.h5DRNV8XiN3YPTv6h1qC', 'Users/img/Boomer.jpg'),
(9, 'daz', 'daz', 'student', 'dan@mail.com', '$2y$10$i6jPyfKYXvWtP6MNl8Vv7OLvJJt6s7SSjxTq1070yWoUkTbm1ucy6', 'Users/img/Generic_User.jpg'),
(11, 'alex', 'alex', 'student', 'alex@albelice.com', '$2y$10$9p/8009Sx5KawuPzvhkpx.x.z3XGEYDtO11yXBA1CG3qTDab83mXm', 'Users/img/Generic_User.jpg'),
(13, 'a', 'a', 'chef', 'a@a.com', 'a', 'Users/img/Boomer.jpg'),
(14, 'b', 'a', 'chef', 'a@a.com', 'a', 'Users/img/Boomer.jpg'),
(15, 'b', 'a', 'chef', 'a@a.com', 'a', 'Users/img/Boomer.jpg'),
(16, 'da', 'da', 'student', 'ddadaan@mail.com', '$2y$10$/Y8pq/81XUSmdcH0lEY/sufZjS/k/Tf2LyaEe56JUIfgFohWctkcS', 'Users/img/Boomer.jpg'),
(17, 'da', 'da', 'student', 'ddadaan@mail.com', '$2y$10$/Y8pq/81XUSmdcH0lEY/sufZjS/k/Tf2LyaEe56JUIfgFohWctkcS', 'Users/img/Boomer.jpg'),
(18, 'za', 'za', 'student', 'dazazan@mail.com', '$2y$10$pe33DH1UK7GDJrM9hraf.eNu1zEHJxCm7UWny69UtReE/npocB.iO', 'Users/img/Boomer.jpg'),
(19, 'za', 'za', 'student', 'dazazan@mail.com', '$2y$10$pe33DH1UK7GDJrM9hraf.eNu1zEHJxCm7UWny69UtReE/npocB.iO', 'Users/img/Boomer.jpg'),
(20, 'gerard', 'depardieux', 'chef', 'gerard@depardieu.com', '$2y$10$Jypa6LokSStf/6e6V38E2e0tAhyTSgqu.H3kL.AiaTfzht.7tcirG', 'Users/img/Boomer.jpg'),
(21, 'test', 'test', 'student', 'test@test.test', '$2y$10$SRh/zHl/f/hZUDVBUyZ9BO/o5TgLZBpuI.3Zm76wZyUBAnbz8LeJa', 'Users/img/Boomer.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `ingredient-user` FOREIGN KEY (`auteur_id`) REFERENCES `users` (`usersId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredients` FOREIGN KEY (`ingredients_Id`) REFERENCES `ingrédients` (`id`),
  ADD CONSTRAINT `ingredientsSec` FOREIGN KEY (`ingredients_B_Id`) REFERENCES `ingrédients` (`id`),
  ADD CONSTRAINT `ingredientsThird` FOREIGN KEY (`ingredients_C_Id`) REFERENCES `ingrédients` (`id`);

--
-- Constraints for table `time`
--
ALTER TABLE `time`
  ADD CONSTRAINT `time_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`usersId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
