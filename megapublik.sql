-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-07-2011 a las 23:01:41
-- Versión del servidor: 5.1.54
-- Versión de PHP: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `megapublik`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerts`
--
-- Creación: 21-07-2011 a las 00:50:32
--

DROP TABLE IF EXISTS `alerts`;
CREATE TABLE IF NOT EXISTS `alerts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `alert_type` tinyint(1) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `received` tinyint(1) NOT NULL DEFAULT '0',
  `friend_id` int(11) unsigned DEFAULT NULL,
  `new_level` tinyint(3) unsigned DEFAULT NULL,
  `company_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `alerts`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--
-- Creación: 21-07-2011 a las 00:50:33
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `newspaper_id` int(11) unsigned NOT NULL,
  `owner_id` int(11) unsigned NOT NULL,
  `time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `articles`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_comments`
--
-- Creación: 21-07-2011 a las 00:50:33
--

DROP TABLE IF EXISTS `article_comments`;
CREATE TABLE IF NOT EXISTS `article_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `article_id` int(11) unsigned NOT NULL,
  `content` text NOT NULL,
  `time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `article_comments`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_votes`
--
-- Creación: 21-07-2011 a las 00:50:33
--

DROP TABLE IF EXISTS `article_votes`;
CREATE TABLE IF NOT EXISTS `article_votes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `article_votes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--
-- Creación: 21-07-2011 a las 00:50:33
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
-- Volcar la base de datos para la tabla `companies`
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
-- Creación: 21-07-2011 a las 00:50:33
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `currency` char(3) NOT NULL,
  `states` text NOT NULL,
  `president_id` int(11) unsigned NOT NULL,
  `food_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `food_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `food_vat_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `gift_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `gift_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `gift_vat_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `weapon_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `weapon_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `weapon_vat_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `tickets_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `tickets_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `tickets_vat_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `grain_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `grain_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `diamonds_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `diamonds_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `iron_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `iron_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `oil_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `oil_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `wood_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `wood_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `house_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `house_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `house_vat_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `hospital_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `hospital_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `hospital_vat_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `defense_system_income_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `defense_system_import_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `defense_system_vat_tax` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `money` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `currency`, `states`, `president_id`, `food_income_tax`, `food_import_tax`, `food_vat_tax`, `gift_income_tax`, `gift_import_tax`, `gift_vat_tax`, `weapon_income_tax`, `weapon_import_tax`, `weapon_vat_tax`, `tickets_income_tax`, `tickets_import_tax`, `tickets_vat_tax`, `grain_income_tax`, `grain_import_tax`, `diamonds_income_tax`, `diamonds_import_tax`, `iron_income_tax`, `iron_import_tax`, `oil_income_tax`, `oil_import_tax`, `wood_income_tax`, `wood_import_tax`, `house_income_tax`, `house_import_tax`, `house_vat_tax`, `hospital_income_tax`, `hospital_import_tax`, `hospital_vat_tax`, `defense_system_income_tax`, `defense_system_import_tax`, `defense_system_vat_tax`, `money`) VALUES
(1, 'España', 'ESP', 'a:19:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;i:15;i:16;i:16;i:17;i:17;i:18;i:18;i:19;}', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'a:1:{s:2:"MP";i:0;}'),
(2, 'United Kingdom', 'GBP', 'a:12:{i:0;i:20;i:1;i:21;i:2;i:22;i:3;i:23;i:4;i:24;i:5;i:25;i:6;i:26;i:7;i:27;i:8;i:28;i:9;i:29;i:10;i:30;i:11;i:31;}', 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'a:1:{s:2:"MP";i:0;}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decisions`
--
-- Creación: 21-07-2011 a las 00:50:33
--

DROP TABLE IF EXISTS `decisions`;
CREATE TABLE IF NOT EXISTS `decisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `country_involved` int(11) unsigned DEFAULT NULL,
  `money_to` int(11) unsigned DEFAULT NULL,
  `how_much_money` bigint(20) unsigned DEFAULT NULL,
  `object_type` tinyint(3) unsigned DEFAULT NULL,
  `new_income_tax` tinyint(3) unsigned DEFAULT NULL,
  `new_import_tax` tinyint(3) unsigned DEFAULT NULL,
  `new_vat_tax` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `decisions`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friendships`
--
-- Creación: 21-07-2011 a las 00:50:33
--

DROP TABLE IF EXISTS `friendships`;
CREATE TABLE IF NOT EXISTS `friendships` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_1_id` int(11) unsigned NOT NULL,
  `user_2_id` int(11) unsigned NOT NULL,
  `acepted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `friendships`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `houses`
--
-- Creación: 21-07-2011 a las 00:50:33
--

DROP TABLE IF EXISTS `houses`;
CREATE TABLE IF NOT EXISTS `houses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int(11) unsigned NOT NULL,
  `quality` tinyint(3) NOT NULL,
  `TV` tinyint(3) NOT NULL DEFAULT '0',
  `computer` tinyint(3) NOT NULL DEFAULT '0',
  `refrigerator` tinyint(3) NOT NULL DEFAULT '0',
  `safe` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `houses`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventories`
--
-- Creación: 21-07-2011 a las 00:50:33
--

DROP TABLE IF EXISTS `inventories`;
CREATE TABLE IF NOT EXISTS `inventories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `food_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `food_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `food_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `food_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `food_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gift_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gift_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gift_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gift_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `gift_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weapon_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weapon_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weapon_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weapon_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `weapon_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tickets_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tickets_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tickets_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tickets_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tickets_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `grain_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `grain_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `grain_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `grain_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `grain_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `diamonds_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `diamonds_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `diamonds_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `diamonds_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `diamonds_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `iron_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `iron_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `iron_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `iron_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `iron_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `oil_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `oil_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `oil_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `oil_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `oil_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `wood_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `wood_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `wood_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `wood_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `wood_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `house_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `house_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `house_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `house_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `house_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hospital_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hospital_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hospital_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hospital_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hospital_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `defense_system_1_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `defense_system_2_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `defense_system_3_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `defense_system_4_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `defense_system_5_amount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `inventories`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `market`
--
-- Creación: 21-07-2011 a las 00:50:34
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
-- Volcar la base de datos para la tabla `market`
--

INSERT INTO `market` (`id`, `amount`, `price`, `type`, `time`, `company_id`, `currency`, `country`) VALUES
(1, 573, '2.37', 1, 1288634400, 1, 'ESP', 1),
(2, 200, '2.37', 1, 1288630800, 2, 'ESP', 1),
(3, 263, '5.97', 5, 1288650000, 3, 'GBP', 2),
(4, 2436, '5.95', 5, 1288650045, 4, 'GBP', 2),
(5, 257, '2.38', 1, 1311421924, 5, 'ESP', 1),
(6, 3589, '2.36', 1, 1310297944, 6, 'ESP', 1),
(7, 3, '2.38', 1, 1310290024, 7, 'ESP', 1),
(8, 467, '2.39', 1, 1310034897, 8, 'ESP', 1),
(9, 546, '2.38', 1, 1310290578, 9, 'ESP', 1),
(10, 134, '5.97', 5, 1311421997, 10, 'GBP', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--
-- Creación: 21-07-2011 a las 00:50:34
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` int(11) unsigned NOT NULL,
  `to_id` int(11) unsigned NOT NULL,
  `subject` varchar(50) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `received` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sent_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `messages`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newspapers`
--
-- Creación: 21-07-2011 a las 00:50:34
--

DROP TABLE IF EXISTS `newspapers`;
CREATE TABLE IF NOT EXISTS `newspapers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `founder_id` int(11) unsigned NOT NULL,
  `localization` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `newspapers`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parties`
--
-- Creación: 21-07-2011 a las 00:50:34
--

DROP TABLE IF EXISTS `parties`;
CREATE TABLE IF NOT EXISTS `parties` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `founder_id` int(11) unsigned NOT NULL,
  `president_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `orientation` varchar(25) NOT NULL,
  `money` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `parties`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--
-- Creación: 21-07-2011 a las 00:50:34
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `sessions`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shouts`
--
-- Creación: 21-07-2011 a las 00:50:35
--

DROP TABLE IF EXISTS `shouts`;
CREATE TABLE IF NOT EXISTS `shouts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `content` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `shouts`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptions`
--
-- Creación: 21-07-2011 a las 00:50:35
--

DROP TABLE IF EXISTS `suscriptions`;
CREATE TABLE IF NOT EXISTS `suscriptions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `newspaper_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `suscriptions`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 24-07-2011 a las 23:01:29
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
  `congress_member` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `country_president` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `media_mogul` smallint(3) unsigned NOT NULL DEFAULT '0',
  `battle_hero` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `resistance_hero` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `super_soldier` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `society_builder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `invited_people` int(11) unsigned NOT NULL DEFAULT '0',
  `company_id` int(11) unsigned DEFAULT NULL,
  `company_internal_level` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `party_id` int(11) unsigned DEFAULT NULL,
  `party_internal_level` tinyint(1) unsigned NOT NULL DEFAULT '0',
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
  `congress_nr` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `citizenship` int(11) unsigned NOT NULL,
  `salary_amount` bigint(20) unsigned NOT NULL DEFAULT '0',
  `money` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `users`
--

