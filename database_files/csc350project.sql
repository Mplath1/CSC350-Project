-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 06:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csc350project`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `genre_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`) VALUES
(1, 'action'),
(2, 'adventure'),
(3, 'fighting'),
(4, 'roleplaying'),
(5, 'sports'),
(6, 'racing'),
(7, 'puzzle');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `imagelink` varchar(50) NOT NULL,
  `description` tinytext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `system` enum('any','dc','genesis','saturn','snes') NOT NULL,
  `genre` enum('action','adventure','fighting','roleplaying','sports') NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `imagelink`, `description`, `price`, `system`, `genre`, `registration_date`) VALUES
(1, 'Earthbound', 'snes_earthbound.jpg', 'A satire of 16-bit RPG tropes and Americana.', '499.99', 'snes', 'roleplaying', '2020-03-22 17:26:59'),
(2, 'Ikaruga', 'dc_ikaruga.jpg', 'Polarity based bullet-hell.', '89.99', 'dc', 'action', '2020-03-22 17:27:30'),
(3, 'FIFA 96 Soccer', 'snes_fifasoccer96.jpg', '1996 edition of the FIFA Soccer series.', '49.99', 'snes', 'sports', '2020-03-22 17:27:54'),
(4, 'Final Fantasy III', 'snes_finalfantasy3.jpg', 'Steampunk Square RPG originally sold as III but now known as VI.', '129.99', 'snes', 'roleplaying', '2020-04-14 01:43:14'),
(5, 'WeaponLord', 'snes_weaponlord_2.jpg', 'Robert E. Howard-esque fighting game with weapons and graphic violence.', '19.99', 'snes', 'fighting', '2020-04-14 01:43:49'),
(6, 'Street Fighter III: Third Strike', 'dc_sfiii3rdstrike_5.jpg', 'Third revision of the third Street Fighter game.', '299.99', 'dc', 'fighting', '2020-04-14 01:45:51'),
(7, 'TMNT IV: Turtles in Time', 'snes_tmnt4turtlesintime.jpg', 'Ninja Turtles licensed beat-em\'-up through the ages.', '39.99', 'snes', 'action', '2020-04-14 01:46:38'),
(8, 'Chrono Trigger', 'snes_chronotrigger.jpg', 'Time-traveling RPG masterpiece with multiple endings.', '139.99', 'snes', 'roleplaying', '2020-05-04 02:02:22'),
(9, 'ChuChu Rocket!', 'dc_chuchurocket_3.jpg', 'Manic puzzle/party game for up to 4 players.', '24.99', 'dc', 'action', '2020-05-04 02:05:01'),
(10, 'Grandia 2', 'dc_grandia2.jpg', 'Linear RPG with a unique battle system.', '69.99', 'dc', 'roleplaying', '2020-05-04 02:07:28'),
(11, 'Soul Calibur', 'dc_soulcalibur_6.jpg', 'Fighting game in 3-D with unique characters, tons of depth, extra modes, and unlockables.', '39.99', 'dc', 'fighting', '2020-05-04 02:09:35'),
(12, 'Virtual On: Oratorio Tangram', 'dc_virtualon_5.jpg', 'Arcade-style 1-on-1 giant robot fighting in arenas.', '99.99', 'dc', 'action', '2020-05-04 02:13:39'),
(13, 'Radiant Silvergun', 'saturn_radiantsilvergun_jp.jpg', 'Japanese Import of highly regarded bullet-hell shooter.', '89.99', 'saturn', 'action', '2020-05-04 02:34:25'),
(14, 'X-Men vs Street Fighter', 'saturn_xmenvsstreetfighter_jp.jpg', 'Japanese Import of Arcade Perfect fighting game mashup.', '149.99', 'saturn', 'fighting', '2020-05-04 02:37:37'),
(16, 'Contra: Hard Corps', 'genesis_contrahardcorps.jpg', 'Select from one of 4 unique commandos and strap in for an adrenaline pumping run-and-gun that puts ANY action movie you\'ve ever seen to shame.', '74.99', 'genesis', 'action', '2020-05-04 02:43:34'),
(17, 'NBA Jam', 'genesis_nbajam.jpg', 'Catch fire and ball like never before in this 2-vs-2 arcade classic.', '34.99', 'genesis', 'sports', '2020-05-04 02:46:55'),
(18, 'NHL 94', 'genesis_nhl94.jpg', 'Check players, slap shots, and bring home the Stanley Cup in the definitive hockey game of the 16-bit era.', '24.99', 'genesis', 'sports', '2020-05-04 02:49:52'),
(19, 'Phantasy Star II', 'genesis_phantasystar2.jpg', 'Explore three planets and fight through one of the most celebrated RPGs of all time.', '19.99', 'genesis', 'roleplaying', '2020-05-04 02:51:33'),
(20, 'ToeJam and Earl', 'genesis_toejamandearl_2.jpg', 'Help two dancing/partying aliens repair their spaceship on Earth so they can return to their home planet of Funkotron', '39.99', 'genesis', 'adventure', '2020-05-04 02:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

CREATE TABLE `systems` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `system_intials` varchar(40) NOT NULL,
  `system_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`id`, `system_intials`, `system_name`) VALUES
(1, 'dc', 'Dreamcast'),
(2, 'snes', 'Super Nintendo'),
(3, 'saturn', 'Saturn'),
(4, 'genesis', 'Genesis'),
(5, 'n64', 'Nintendo 64'),
(6, 'tg16', 'TurboGrafx-16'),
(7, 'ps', 'Playstation'),
(8, 'ps2', 'Playstation 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `registration_date`) VALUES
(1, 'mplath', '9e4a0e085179a3f06b0e5710887d80911ad089fc', 'mikeaplath@gmail.com', '2020-03-15 19:28:59'),
(4, 'admin', '8cb2237d0679ca88db6464eac60da96345513964', 'none', '2020-04-04 21:21:26'),
(9, 'stef', 'c8e848fb136f19347ef0e30ebca8454075207918', 'none', '2020-04-07 01:41:38'),
(10, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'none', '2020-04-13 23:16:16'),
(11, 'abc', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'none', '2020-05-11 23:28:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `systems`
--
ALTER TABLE `systems`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
