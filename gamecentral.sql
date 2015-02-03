-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 03 feb 2015 kl 09:05
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `gamecentral`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `matchmaking`
--

CREATE TABLE IF NOT EXISTS `matchmaking` (
`matchmaking_id` int(11) NOT NULL,
  `matchmaking_user` int(11) NOT NULL,
  `matchmaking_node` int(11) NOT NULL,
  `matchmaking_last_seen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `matchmaking_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `matchmaking_key` char(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumpning av Data i tabell `matchmaking`
--

INSERT INTO `matchmaking` (`matchmaking_id`, `matchmaking_user`, `matchmaking_node`, `matchmaking_last_seen`, `matchmaking_status`, `matchmaking_key`) VALUES
(11, 3, 3, '2015-02-03 08:05:03', 'inactive', '3c3cf15a1f520e71cc4e4692c5085fcf57c7df9658479dada8a5afe31fdf0d60a679ef880c16d37ee2b038375c49b9c3d557f0e206b38f12e9fdbc3105e2e3b0'),
(12, 6, 3, '2015-01-28 12:20:54', 'inactive', '20affb451c7cc052f6308015046ecd6d57e39de0608010556984da25446f1cab84b72d791abee90153e913b7439da2bd446394cbc16e9356bfb79630482f5c71'),
(13, 7, 3, '2015-02-03 08:05:04', 'inactive', 'c959d742f1100b07f3f825f50c415c02689916b79d6fe1e42b96ae951b1bf07143d2c925ce61d9c57da17b76129603a03f2bae50fb9b3d95b36b29778aae5db6');

-- --------------------------------------------------------

--
-- Tabellstruktur `nodes`
--

CREATE TABLE IF NOT EXISTS `nodes` (
`game_id` int(11) NOT NULL,
  `game_post_url` varchar(128) NOT NULL,
  `game_play_url` varchar(128) NOT NULL,
  `game_name` varchar(64) NOT NULL,
  `game_players` int(11) NOT NULL,
  `game_creator` int(11) NOT NULL,
  `game_unique_hash` char(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `nodes`
--

INSERT INTO `nodes` (`game_id`, `game_post_url`, `game_play_url`, `game_name`, `game_players`, `game_creator`, `game_unique_hash`) VALUES
(3, 'http://localhost/QuestGame/server.php', 'http://localhost/Game/www/index.php', 'Quest Game', 2, 6, 'e250d120077889ede5a2a099cf0883438e550ede39b8364d77c063888df01ce2679e02f9978b17cadbf9680f126d7969c6617fbb6a01433e207c60d569aedf50');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_pass` char(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`) VALUES
(3, 'gang', '0f3cf259f034bcf961de3b5dae48b1156355187e6f2fa3a08385b4b05ebb6bcf4a0e4c0a4a4127be94b17add71ef45ecff2177c7f98afbeabcf8d94a9de2cb7c'),
(5, 'fetgang', '020b1924156e53f72909bbbedcf2f127e54a9e0b45776864bb8e5dcfc965ad91b2dacc2ae765e789e65cf69ff8a040df6ae135775ba578861a12b7e53404722c'),
(6, 'test', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff'),
(7, 'superhd', '0f3cf259f034bcf961de3b5dae48b1156355187e6f2fa3a08385b4b05ebb6bcf4a0e4c0a4a4127be94b17add71ef45ecff2177c7f98afbeabcf8d94a9de2cb7c');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `matchmaking`
--
ALTER TABLE `matchmaking`
 ADD PRIMARY KEY (`matchmaking_id`);

--
-- Index för tabell `nodes`
--
ALTER TABLE `nodes`
 ADD PRIMARY KEY (`game_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `matchmaking`
--
ALTER TABLE `matchmaking`
MODIFY `matchmaking_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT för tabell `nodes`
--
ALTER TABLE `nodes`
MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
