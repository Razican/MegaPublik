-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2012 a las 19:00:41
-- Versión del servidor: 5.5.24
-- Versión de PHP: 5.3.10-1ubuntu3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `megapublik`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--
-- Creación: 12-06-2012 a las 09:29:34
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `owner_id` int(11) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `non_stock` bigint(20) unsigned NOT NULL DEFAULT '0',
  `stock` bigint(20) unsigned NOT NULL DEFAULT '0',
  `raw_materials` bigint(20) unsigned NOT NULL DEFAULT '0',
  `quality` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `localization` int(11) unsigned NOT NULL,
  `money` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`id`, `name`, `owner_id`, `type`, `non_stock`, `stock`, `raw_materials`, `quality`, `localization`, `money`) VALUES
(1, 'Compañía 1', 1, 1, 2500, 250, 3460, 1, 1, 'a:2:{s:2:"MP";i:0;s:3:"ESP";d:11.85;}'),
(2, 'Compañía 2', 2, 1, 345, 100, 400, 1, 1, 'a:2:{s:2:"MP";i:0;s:3:"ESP";d:11.85;}'),
(3, 'Compañía 3', 3, 5, 1205, 1412, 25432, 5, 2, 'a:1:{s:2:"MP";i:0;}'),
(4, 'Compañía 4', 4, 5, 2556, 234, 7134, 2, 2, 'a:1:{s:2:"MP";i:0;}'),
(5, 'Compañía 5', 7, 1, 2764, 145, 1795, 1, 2, ''),
(6, 'Compañía 6', 6, 1, 1387, 125, 975, 1, 1, ''),
(7, 'Compañía 7', 8, 1, 3458, 45, 4385, 1, 1, ''),
(8, 'Compañía 8', 9, 1, 7537, 785, 78586, 1, 1, ''),
(9, 'Compañía 9', 10, 1, 75, 124, 5788, 1, 1, ''),
(10, 'Compañía 10', 11, 5, 785, 578, 254, 1, 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--
-- Creación: 18-06-2012 a las 16:59:53
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `currency` char(3) NOT NULL,
  `states` text NOT NULL,
  `congress` text NOT NULL,
  `president_id` int(11) unsigned NOT NULL,
  `taxes` text NOT NULL,
  `money` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `currency`, `states`, `congress`, `president_id`, `taxes`, `money`) VALUES
(1, 'España', 'ESP', 'a:19:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;i:15;i:16;i:16;i:17;i:17;i:18;i:18;i:19;}', '', 1, '0', 'a:1:{s:2:"MP";i:0;}'),
(2, 'United Kingdom', 'GBP', 'a:12:{i:0;i:20;i:1;i:21;i:2;i:22;i:3;i:23;i:4;i:24;i:5;i:25;i:6;i:26;i:7;i:27;i:8;i:28;i:9;i:29;i:10;i:30;i:11;i:31;}', '', 2, '0', 'a:1:{s:2:"MP";i:0;}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `market`
--
-- Creación: 12-06-2012 a las 09:29:34
--

DROP TABLE IF EXISTS `market`;
CREATE TABLE IF NOT EXISTS `market` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `amount` bigint(20) unsigned NOT NULL,
  `price` decimal(20,2) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `company_id` int(11) unsigned NOT NULL,
  `currency` char(3) NOT NULL,
  `country` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `market`
--

INSERT INTO `market` (`id`, `amount`, `price`, `type`, `time`, `company_id`, `currency`, `country`) VALUES
(1, 573, 2.37, 1, 1288634400, 1, 'ESP', 1),
(2, 200, 2.37, 1, 1288630800, 2, 'ESP', 1),
(3, 263, 5.97, 5, 1288650000, 3, 'GBP', 2),
(4, 2436, 5.95, 5, 1288650045, 4, 'GBP', 2),
(5, 257, 2.38, 1, 1311421924, 5, 'ESP', 1),
(6, 3589, 2.36, 1, 1310297944, 6, 'ESP', 1),
(7, 3, 2.38, 1, 1310290024, 7, 'ESP', 1),
(8, 467, 2.39, 1, 1310034897, 8, 'ESP', 1),
(9, 546, 2.38, 1, 1310290578, 9, 'ESP', 1),
(10, 134, 5.97, 5, 1311421997, 10, 'GBP', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--
-- Creación: 18-06-2012 a las 16:57:02
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 12-06-2012 a las 09:29:34
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` char(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `reg_IP` varchar(15) NOT NULL,
  `last_IP` varchar(15) NOT NULL,
  `avatar` varchar(20) NOT NULL DEFAULT 'default',
  `location` int(11) unsigned NOT NULL,
  `ref_id` int(11) unsigned DEFAULT NULL,
  `validated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `validation_str` char(15) NOT NULL,
  `hard_worker` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `worked_days` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `country_president` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `media_mogul` smallint(3) unsigned NOT NULL DEFAULT '0',
  `battle_hero` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `resistance_hero` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `super_soldier` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `society_builder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `invited_people` int(11) unsigned NOT NULL DEFAULT '0',
  `party_id` int(11) unsigned DEFAULT NULL,
  `house_id` int(11) unsigned DEFAULT NULL,
  `banned` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `fights` bigint(20) unsigned NOT NULL DEFAULT '0',
  `total_damage` bigint(20) unsigned NOT NULL DEFAULT '0',
  `militar_rank` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `wellness` tinyint(3) unsigned NOT NULL DEFAULT '50',
  `happiness` tinyint(3) unsigned NOT NULL DEFAULT '50',
  `productivity` tinyint(3) unsigned NOT NULL DEFAULT '50',
  `experience` bigint(20) unsigned NOT NULL DEFAULT '0',
  `manufacturing` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `land` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `constructions` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `strength` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `birthday` int(11) unsigned NOT NULL,
  `forfeit_points` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `citizenship` int(11) unsigned NOT NULL,
  `money` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
