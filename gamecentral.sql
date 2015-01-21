-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 21 jan 2015 kl 13:33
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
-- Tabellstruktur `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `match_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `match_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `matchmaking`
--

CREATE TABLE IF NOT EXISTS `matchmaking` (
  `matchmaking_id` int(11) NOT NULL,
  `matchmaking_user` int(11) NOT NULL,
  `matchmaking_node` int(11) NOT NULL,
  `matchmaking_last_seen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `matchplayers`
--

CREATE TABLE IF NOT EXISTS `matchplayers` (
  `match_player_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `match_player_game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `nodes`
--

CREATE TABLE IF NOT EXISTS `nodes` (
`game_id` int(11) NOT NULL,
  `game_post_url` varchar(64) NOT NULL,
  `game_name` varchar(64) NOT NULL,
  `game_creator` int(11) NOT NULL,
  `game_unique_hash` char(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumpning av Data i tabell `nodes`
--

INSERT INTO `nodes` (`game_id`, `game_post_url`, `game_name`, `game_creator`, `game_unique_hash`) VALUES
(1, 'helloworld.com/gameurl', 'Super Mario', 1, '1133f031a68cd2b87e955791232a8161ea46f90fb0a988a72ca3dac65e056c6ac4b30708c7f4b787530bd2d971d3c07fba3960086cd6ef11f6986f33efe3089d');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_pass` char(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`) VALUES
(2, 'test', 'test');

--
-- Index för dumpade tabeller
--

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
-- AUTO_INCREMENT för tabell `nodes`
--
ALTER TABLE `nodes`
MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
