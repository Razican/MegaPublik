-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-08-2010 a las 14:03:10
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

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
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `alerts`;
CREATE TABLE IF NOT EXISTS `alerts` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `alert_type` tinyint(1) unsigned NOT NULL,
  `user_id` int(9) unsigned NOT NULL,
  `received` tinyint(1) NOT NULL DEFAULT '0',
  `friend_id` int(9) unsigned DEFAULT NULL,
  `new_level` tinyint(3) unsigned DEFAULT NULL,
  `company_id` int(9) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `alerts`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL,
  `newspaper_id` int(9) unsigned NOT NULL,
  `owner_id` int(9) unsigned NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `articles`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_comments`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `article_comments`;
CREATE TABLE IF NOT EXISTS `article_comments` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(9) unsigned NOT NULL,
  `article_id` int(9) unsigned NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `article_comments`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_votes`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `article_votes`;
CREATE TABLE IF NOT EXISTS `article_votes` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(9) unsigned NOT NULL,
  `user_id` int(9) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `article_votes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `borders`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `borders`;
CREATE TABLE IF NOT EXISTS `borders` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `state_1_id` int(9) unsigned NOT NULL,
  `state_2_id` int(9) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `borders`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `owner_id` int(9) unsigned NOT NULL,
  `type` tinyint(2) unsigned NOT NULL,
  `non_stock` int(11) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `raw_materials` bigint(20) unsigned NOT NULL DEFAULT '0',
  `quality` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `localization` int(9) unsigned NOT NULL,
  `money_mp` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ARS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ATS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `AUD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BAM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BEF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BGN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BOB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BRL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CAD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CHF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CLP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CNY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `COP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CZK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `DEM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `DKK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `EEK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ESP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FIM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FRF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `GBP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `GRD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `HRK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `HUF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IDR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IEP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `INR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IRR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ITL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `JPY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `KPW` bigint(20) unsigned NOT NULL DEFAULT '0',
  `KRW` bigint(20) unsigned NOT NULL DEFAULT '0',
  `LTL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `LVL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MDL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MXN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MYR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NIS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NLG` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NOK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PEN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PHP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PKR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PLN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PTE` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PYG` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RON` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RSD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RUB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SEK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SGD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SIT` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SKK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `THB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `TRY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `UAH` bigint(20) unsigned NOT NULL DEFAULT '0',
  `USD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `UYU` bigint(20) unsigned NOT NULL DEFAULT '0',
  `VEB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ZAR` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `companies`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--
-- Creación: 06-08-2010 a las 14:00:01
-- Última actualización: 06-08-2010 a las 14:00:46
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `currency` tinyint(3) unsigned NOT NULL,
  `president_id` int(9) unsigned NOT NULL,
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
  `money_mp` bigint(20) unsigned NOT NULL DEFAULT '1000000',
  `ARS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ATS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `AUD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BAM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BEF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BGN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BOB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BRL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CAD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CHF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CLP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CNY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `COP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CZK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `DEM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `DKK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `EEK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ESP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FIM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FRF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `GBP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `GRD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `HRK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `HUF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IDR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IEP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `INR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IRR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ITL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `JPY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `KPW` bigint(20) unsigned NOT NULL DEFAULT '0',
  `KRW` bigint(20) unsigned NOT NULL DEFAULT '0',
  `LTL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `LVL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MDL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MXN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MYR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NIS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NLG` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NOK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PEN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PHP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PKR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PLN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PTE` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PYG` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RON` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RSD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RUB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SEK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SGD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SIT` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SKK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `THB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `TRY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `UAH` bigint(20) unsigned NOT NULL DEFAULT '0',
  `USD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `UYU` bigint(20) unsigned NOT NULL DEFAULT '0',
  `VEB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ZAR` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `currency`, `president_id`, `food_income_tax`, `food_import_tax`, `food_vat_tax`, `gift_income_tax`, `gift_import_tax`, `gift_vat_tax`, `weapon_income_tax`, `weapon_import_tax`, `weapon_vat_tax`, `tickets_income_tax`, `tickets_import_tax`, `tickets_vat_tax`, `grain_income_tax`, `grain_import_tax`, `diamonds_income_tax`, `diamonds_import_tax`, `iron_income_tax`, `iron_import_tax`, `oil_income_tax`, `oil_import_tax`, `wood_income_tax`, `wood_import_tax`, `house_income_tax`, `house_import_tax`, `house_vat_tax`, `hospital_income_tax`, `hospital_import_tax`, `hospital_vat_tax`, `defense_system_income_tax`, `defense_system_import_tax`, `defense_system_vat_tax`, `money_mp`, `ARS`, `ATS`, `AUD`, `BAM`, `BEF`, `BGN`, `BOB`, `BRL`, `CAD`, `CHF`, `CLP`, `CNY`, `COP`, `CZK`, `DEM`, `DKK`, `EEK`, `ESP`, `FIM`, `FRF`, `GBP`, `GRD`, `HRK`, `HUF`, `IDR`, `IEP`, `INR`, `IRR`, `ITL`, `JPY`, `KPW`, `KRW`, `LTL`, `LVL`, `MDL`, `MXN`, `MYR`, `NIS`, `NLG`, `NOK`, `PEN`, `PHP`, `PKR`, `PLN`, `PTE`, `PYG`, `RON`, `RSD`, `RUB`, `SEK`, `SGD`, `SIT`, `SKK`, `THB`, `TRY`, `UAH`, `USD`, `UYU`, `VEB`, `ZAR`) VALUES
(1, 'MegaPublik 1', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'MegaPublik 2', 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decisions`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `decisions`;
CREATE TABLE IF NOT EXISTS `decisions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `country_involved` int(11) DEFAULT NULL,
  `money_to` int(11) DEFAULT NULL,
  `how_much_money` int(11) DEFAULT NULL,
  `object_type` int(11) DEFAULT NULL,
  `new_income_tax` int(11) DEFAULT NULL,
  `new_import_tax` int(11) DEFAULT NULL,
  `new_vat_tax` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `decisions`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friendships`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `friendships`;
CREATE TABLE IF NOT EXISTS `friendships` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_1_id` int(11) NOT NULL,
  `user_2_id` int(11) NOT NULL,
  `acepted` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `friendships`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventories`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `inventories`;
CREATE TABLE IF NOT EXISTS `inventories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `food_1_amount` int(11) NOT NULL DEFAULT '0',
  `food_2_amount` int(11) NOT NULL DEFAULT '0',
  `food_3_amount` int(11) NOT NULL DEFAULT '0',
  `food_4_amount` int(11) NOT NULL DEFAULT '0',
  `food_5_amount` int(11) NOT NULL DEFAULT '0',
  `gift_1_amount` int(11) NOT NULL DEFAULT '0',
  `gift_2_amount` int(11) NOT NULL DEFAULT '0',
  `gift_3_amount` int(11) NOT NULL DEFAULT '0',
  `gift_4_amount` int(11) NOT NULL DEFAULT '0',
  `gift_5_amount` int(11) NOT NULL DEFAULT '0',
  `weapon_1_amount` int(11) NOT NULL DEFAULT '0',
  `weapon_2_amount` int(11) NOT NULL DEFAULT '0',
  `weapon_3_amount` int(11) NOT NULL DEFAULT '0',
  `weapon_4_amount` int(11) NOT NULL DEFAULT '0',
  `weapon_5_amount` int(11) NOT NULL DEFAULT '0',
  `tickets_1_amount` int(11) NOT NULL DEFAULT '0',
  `tickets_2_amount` int(11) NOT NULL DEFAULT '0',
  `tickets_3_amount` int(11) NOT NULL DEFAULT '0',
  `tickets_4_amount` int(11) NOT NULL DEFAULT '0',
  `tickets_5_amount` int(11) NOT NULL DEFAULT '0',
  `grain_1_amount` int(11) NOT NULL DEFAULT '0',
  `grain_2_amount` int(11) NOT NULL DEFAULT '0',
  `grain_3_amount` int(11) NOT NULL DEFAULT '0',
  `grain_4_amount` int(11) NOT NULL DEFAULT '0',
  `grain_5_amount` int(11) NOT NULL DEFAULT '0',
  `diamonds_1_amount` int(11) NOT NULL DEFAULT '0',
  `diamonds_2_amount` int(11) NOT NULL DEFAULT '0',
  `diamonds_3_amount` int(11) NOT NULL DEFAULT '0',
  `diamonds_4_amount` int(11) NOT NULL DEFAULT '0',
  `diamonds_5_amount` int(11) NOT NULL DEFAULT '0',
  `iron_1_amount` int(11) NOT NULL DEFAULT '0',
  `iron_2_amount` int(11) NOT NULL DEFAULT '0',
  `iron_3_amount` int(11) NOT NULL DEFAULT '0',
  `iron_4_amount` int(11) NOT NULL DEFAULT '0',
  `iron_5_amount` int(11) NOT NULL DEFAULT '0',
  `oil_1_amount` int(11) NOT NULL DEFAULT '0',
  `oil_2_amount` int(11) NOT NULL DEFAULT '0',
  `oil_3_amount` int(11) NOT NULL DEFAULT '0',
  `oil_4_amount` int(11) NOT NULL DEFAULT '0',
  `oil_5_amount` int(11) NOT NULL DEFAULT '0',
  `wood_1_amount` int(11) NOT NULL DEFAULT '0',
  `wood_2_amount` int(11) NOT NULL DEFAULT '0',
  `wood_3_amount` int(11) NOT NULL DEFAULT '0',
  `wood_4_amount` int(11) NOT NULL DEFAULT '0',
  `wood_5_amount` int(11) NOT NULL DEFAULT '0',
  `house_1_amount` int(11) NOT NULL DEFAULT '0',
  `house_2_amount` int(11) NOT NULL DEFAULT '0',
  `house_3_amount` int(11) NOT NULL DEFAULT '0',
  `house_4_amount` int(11) NOT NULL DEFAULT '0',
  `house_5_amount` int(11) NOT NULL DEFAULT '0',
  `hospital_1_amount` int(11) NOT NULL DEFAULT '0',
  `hospital_2_amount` int(11) NOT NULL DEFAULT '0',
  `hospital_3_amount` int(11) NOT NULL DEFAULT '0',
  `hospital_4_amount` int(11) NOT NULL DEFAULT '0',
  `hospital_5_amount` int(11) NOT NULL DEFAULT '0',
  `defense_system_1_amount` int(11) NOT NULL DEFAULT '0',
  `defense_system_2_amount` int(11) NOT NULL DEFAULT '0',
  `defense_system_3_amount` int(11) NOT NULL DEFAULT '0',
  `defense_system_4_amount` int(11) NOT NULL DEFAULT '0',
  `defense_system_5_amount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `inventories`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `market`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `market`;
CREATE TABLE IF NOT EXISTS `market` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `market`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `subject` text CHARACTER SET ucs2 COLLATE ucs2_spanish_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `received` int(11) NOT NULL DEFAULT '0',
  `sent_time` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `messages`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newspapers`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `newspapers`;
CREATE TABLE IF NOT EXISTS `newspapers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `founder_id` int(11) NOT NULL,
  `localization` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `newspapers`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parties`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `parties`;
CREATE TABLE IF NOT EXISTS `parties` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `founder_id` int(11) NOT NULL,
  `president_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `orientation` int(11) NOT NULL,
  `Gold` int(11) NOT NULL DEFAULT '0',
  `ARS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ATS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `AUD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BAM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BEF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BGN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BOB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BRL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CAD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CHF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CLP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CNY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `COP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CZK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `DEM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `DKK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `EEK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ESP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FIM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FRF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `GBP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `GRD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `HRK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `HUF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IDR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IEP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `INR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IRR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ITL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `JPY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `KPW` bigint(20) unsigned NOT NULL DEFAULT '0',
  `KRW` bigint(20) unsigned NOT NULL DEFAULT '0',
  `LTL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `LVL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MDL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MXN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MYR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NIS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NLG` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NOK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PEN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PHP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PKR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PLN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PTE` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PYG` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RON` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RSD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RUB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SEK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SGD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SIT` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SKK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `THB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `TRY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `UAH` bigint(20) unsigned NOT NULL DEFAULT '0',
  `USD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `UYU` bigint(20) unsigned NOT NULL DEFAULT '0',
  `VEB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ZAR` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `parties`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shouts`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `shouts`;
CREATE TABLE IF NOT EXISTS `shouts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `shouts`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `defense_sistem` int(11) NOT NULL DEFAULT '0',
  `hospital` int(11) NOT NULL DEFAULT '0',
  `hierro_production` int(11) NOT NULL DEFAULT '0',
  `grano_production` int(11) NOT NULL DEFAULT '0',
  `diamonds_production` int(11) NOT NULL DEFAULT '0',
  `petroleo_production` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `states`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptions`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `suscriptions`;
CREATE TABLE IF NOT EXISTS `suscriptions` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `newspaper_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `suscriptions`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 06-08-2010 a las 13:07:39
-- Última actualización: 06-08-2010 a las 13:07:39
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `reg_IP` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `last_IP` varchar(15) NOT NULL,
  `location` int(9) NOT NULL,
  `ref_id` int(9) unsigned DEFAULT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  `validation_str` char(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `hard_worker` int(11) NOT NULL DEFAULT '0',
  `worked_days` int(11) NOT NULL DEFAULT '0',
  `congress_member` int(11) NOT NULL DEFAULT '0',
  `country_president` int(11) NOT NULL DEFAULT '0',
  `media_mogul` int(11) NOT NULL DEFAULT '0',
  `battle_hero` int(11) NOT NULL DEFAULT '0',
  `resistance_hero` int(11) NOT NULL DEFAULT '0',
  `super_soldier` int(11) NOT NULL DEFAULT '0',
  `society_builder` int(11) NOT NULL DEFAULT '0',
  `invited_people` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) DEFAULT NULL,
  `company_internal_level` int(11) DEFAULT '0',
  `party_id` int(11) DEFAULT NULL,
  `party_internal_level` int(11) DEFAULT '0',
  `fights` int(11) NOT NULL DEFAULT '0',
  `total_damage` int(11) NOT NULL DEFAULT '0',
  `militar_rank` int(11) NOT NULL DEFAULT '1',
  `wellness` int(11) NOT NULL DEFAULT '50',
  `experience` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  `manufacturing` int(11) NOT NULL DEFAULT '0',
  `land` int(11) NOT NULL DEFAULT '0',
  `constructions` int(11) NOT NULL DEFAULT '0',
  `strength` int(11) NOT NULL DEFAULT '0',
  `birthday` int(11) NOT NULL,
  `forfeit_points` int(11) NOT NULL DEFAULT '0',
  `congress_nr` int(11) NOT NULL DEFAULT '0',
  `congress_country_id` int(11) NOT NULL,
  `citizenship` int(11) NOT NULL,
  `salary_amount` int(11) NOT NULL DEFAULT '0',
  `salary_currency` tinyint(3) unsigned NOT NULL,
  `money_mp` bigint(20) unsigned NOT NULL DEFAULT '50000',
  `ARS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ATS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `AUD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BAM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BEF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BGN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BOB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `BRL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CAD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CHF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CLP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CNY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `COP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `CZK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `DEM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `DKK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `EEK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ESP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FIM` bigint(20) unsigned NOT NULL DEFAULT '0',
  `FRF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `GBP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `GRD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `HRK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `HUF` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IDR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IEP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `INR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `IRR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ITL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `JPY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `KPW` bigint(20) unsigned NOT NULL DEFAULT '0',
  `KRW` bigint(20) unsigned NOT NULL DEFAULT '0',
  `LTL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `LVL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MDL` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MXN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `MYR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NIS` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NLG` bigint(20) unsigned NOT NULL DEFAULT '0',
  `NOK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PEN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PHP` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PKR` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PLN` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PTE` bigint(20) unsigned NOT NULL DEFAULT '0',
  `PYG` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RON` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RSD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `RUB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SEK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SGD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SIT` bigint(20) unsigned NOT NULL DEFAULT '0',
  `SKK` bigint(20) unsigned NOT NULL DEFAULT '0',
  `THB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `TRY` bigint(20) unsigned NOT NULL DEFAULT '0',
  `UAH` bigint(20) unsigned NOT NULL DEFAULT '0',
  `USD` bigint(20) unsigned NOT NULL DEFAULT '0',
  `UYU` bigint(20) unsigned NOT NULL DEFAULT '0',
  `VEB` bigint(20) unsigned NOT NULL DEFAULT '0',
  `ZAR` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Volcar la base de datos para la tabla `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
