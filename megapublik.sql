-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-07-2010 a las 21:22:07
-- Versión del servidor: 5.0.91
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `megapubl_game`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerts`
--
-- Creación: 08-05-2010 a las 22:21:12
-- Última actualización: 08-05-2010 a las 22:21:12
--

DROP TABLE IF EXISTS `alerts`;
CREATE TABLE IF NOT EXISTS `alerts` (
  `ID` int(11) NOT NULL auto_increment,
  `alert_type` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `received` int(11) NOT NULL default '0',
  `friend_id` int(11) default NULL,
  `new_level` int(11) default NULL,
  `company_id` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--
-- Creación: 08-05-2010 a las 22:21:12
-- Última actualización: 08-05-2010 a las 22:21:12
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `ID` int(11) NOT NULL auto_increment,
  `name` text character set utf8 collate utf8_spanish_ci NOT NULL,
  `content` text character set utf8 collate utf8_spanish_ci NOT NULL,
  `newspaper_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_comments`
--
-- Creación: 08-05-2010 a las 22:21:12
-- Última actualización: 08-05-2010 a las 22:21:12
--

DROP TABLE IF EXISTS `article_comments`;
CREATE TABLE IF NOT EXISTS `article_comments` (
  `ID` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text character set utf8 collate utf8_spanish_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article_votes`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `article_votes`;
CREATE TABLE IF NOT EXISTS `article_votes` (
  `ID` int(11) NOT NULL auto_increment,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `borders`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `borders`;
CREATE TABLE IF NOT EXISTS `borders` (
  `ID` int(11) NOT NULL auto_increment,
  `state_1_id` int(11) NOT NULL,
  `state_2_id` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `ID` int(11) NOT NULL auto_increment,
  `name` text character set utf8 collate utf8_spanish_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `non_stock` int(11) NOT NULL default '0',
  `stock` int(11) NOT NULL default '0',
  `raw_materials` int(11) NOT NULL default '0',
  `quality` int(11) NOT NULL default '1',
  `localization` int(11) NOT NULL,
  `Gold` int(11) NOT NULL default '0',
  `ARS` int(11) NOT NULL default '0',
  `ATS` int(11) NOT NULL default '0',
  `AUD` int(11) NOT NULL default '0',
  `BAM` int(11) NOT NULL default '0',
  `BEF` int(11) NOT NULL default '0',
  `BGN` int(11) NOT NULL default '0',
  `BOB` int(11) NOT NULL default '0',
  `BRL` int(11) NOT NULL default '0',
  `CAD` int(11) NOT NULL default '0',
  `CHF` int(11) NOT NULL default '0',
  `CLP` int(11) NOT NULL default '0',
  `CNY` int(11) NOT NULL default '0',
  `COP` int(11) NOT NULL default '0',
  `CZK` int(11) NOT NULL default '0',
  `DEM` int(11) NOT NULL default '0',
  `DKK` int(11) NOT NULL default '0',
  `EEK` int(11) NOT NULL default '0',
  `ESP` int(11) NOT NULL default '0',
  `FIM` int(11) NOT NULL default '0',
  `FRF` int(11) NOT NULL default '0',
  `GBP` int(11) NOT NULL default '0',
  `GRD` int(11) NOT NULL default '0',
  `HRK` int(11) NOT NULL default '0',
  `HUF` int(11) NOT NULL default '0',
  `IDR` int(11) NOT NULL default '0',
  `IEP` int(11) NOT NULL default '0',
  `INR` int(11) NOT NULL default '0',
  `IRR` int(11) NOT NULL default '0',
  `ITL` int(11) NOT NULL default '0',
  `JPY` int(11) NOT NULL default '0',
  `KPW` int(11) NOT NULL default '0',
  `KRW` int(11) NOT NULL default '0',
  `LTL` int(11) NOT NULL default '0',
  `LVL` int(11) NOT NULL default '0',
  `MDL` int(11) NOT NULL default '0',
  `MXN` int(11) NOT NULL default '0',
  `MYR` int(11) NOT NULL default '0',
  `NIS` int(11) NOT NULL default '0',
  `NLG` int(11) NOT NULL default '0',
  `NOK` int(11) NOT NULL default '0',
  `PEN` int(11) NOT NULL default '0',
  `PHP` int(11) NOT NULL default '0',
  `PKR` int(11) NOT NULL default '0',
  `PLN` int(11) NOT NULL default '0',
  `PTE` int(11) NOT NULL default '0',
  `PYG` int(11) NOT NULL default '0',
  `RON` int(11) NOT NULL default '0',
  `RSD` int(11) NOT NULL default '0',
  `RUB` int(11) NOT NULL default '0',
  `SEK` int(11) NOT NULL default '0',
  `SGD` int(11) NOT NULL default '0',
  `SIT` int(11) NOT NULL default '0',
  `SKK` int(11) NOT NULL default '0',
  `THB` int(11) NOT NULL default '0',
  `TRY` int(11) NOT NULL default '0',
  `UAH` int(11) NOT NULL default '0',
  `USD` int(11) NOT NULL default '0',
  `UYU` int(11) NOT NULL default '0',
  `VEB` int(11) NOT NULL default '0',
  `ZAR` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--
-- Creación: 20-07-2010 a las 18:31:10
-- Última actualización: 20-07-2010 a las 18:33:47
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `ID` int(11) NOT NULL auto_increment,
  `name` varchar(20) character set latin1 collate latin1_spanish_ci NOT NULL,
  `currency` int(11) NOT NULL,
  `president_id` int(11) NOT NULL,
  `food_income_tax` int(11) NOT NULL,
  `food_import_tax` int(11) NOT NULL,
  `food_vat_tax` int(11) NOT NULL,
  `gift_income_tax` int(11) NOT NULL,
  `gift_import_tax` int(11) NOT NULL,
  `gift_vat_tax` int(11) NOT NULL,
  `weapon_income_tax` int(11) NOT NULL,
  `weapon_import_tax` int(11) NOT NULL,
  `weapon_vat_tax` int(11) NOT NULL,
  `tickets_income_tax` int(11) NOT NULL,
  `tickets_import_tax` int(11) NOT NULL,
  `tickets_vat_tax` int(11) NOT NULL,
  `grain_income_tax` int(11) NOT NULL,
  `grain_import_tax` int(11) NOT NULL,
  `diamonds_income_tax` int(11) NOT NULL,
  `diamonds_import_tax` int(11) NOT NULL,
  `iron_income_tax` int(11) NOT NULL,
  `iron_import_tax` int(11) NOT NULL,
  `oil_income_tax` int(11) NOT NULL,
  `oil_import_tax` int(11) NOT NULL,
  `wood_income_tax` int(11) NOT NULL,
  `wood_import_tax` int(11) NOT NULL,
  `house_income_tax` int(11) NOT NULL,
  `house_import_tax` int(11) NOT NULL,
  `house_vat_tax` int(11) NOT NULL,
  `hospital_income_tax` int(11) NOT NULL,
  `hospital_import_tax` int(11) NOT NULL,
  `hospital_vat_tax` int(11) NOT NULL,
  `defense_system_income_tax` int(11) NOT NULL,
  `defense_system_import_tax` int(11) NOT NULL,
  `defense_system_vat_tax` int(11) NOT NULL,
  `Gold` int(11) NOT NULL default '0',
  `ARS` int(11) NOT NULL default '0',
  `ATS` int(11) NOT NULL default '0',
  `AUD` int(11) NOT NULL default '0',
  `BAM` int(11) NOT NULL default '0',
  `BEF` int(11) NOT NULL default '0',
  `BGN` int(11) NOT NULL default '0',
  `BOB` int(11) NOT NULL default '0',
  `BRL` int(11) NOT NULL default '0',
  `CAD` int(11) NOT NULL default '0',
  `CHF` int(11) NOT NULL default '0',
  `CLP` int(11) NOT NULL default '0',
  `CNY` int(11) NOT NULL default '0',
  `COP` int(11) NOT NULL default '0',
  `CZK` int(11) NOT NULL default '0',
  `DEM` int(11) NOT NULL default '0',
  `DKK` int(11) NOT NULL default '0',
  `EEK` int(11) NOT NULL default '0',
  `ESP` int(11) NOT NULL default '0',
  `FIM` int(11) NOT NULL default '0',
  `FRF` int(11) NOT NULL default '0',
  `GBP` int(11) NOT NULL default '0',
  `GRD` int(11) NOT NULL default '0',
  `HRK` int(11) NOT NULL default '0',
  `HUF` int(11) NOT NULL default '0',
  `IDR` int(11) NOT NULL default '0',
  `IEP` int(11) NOT NULL default '0',
  `INR` int(11) NOT NULL default '0',
  `IRR` int(11) NOT NULL default '0',
  `ITL` int(11) NOT NULL default '0',
  `JPY` int(11) NOT NULL default '0',
  `KPW` int(11) NOT NULL default '0',
  `KRW` int(11) NOT NULL default '0',
  `LTL` int(11) NOT NULL default '0',
  `LVL` int(11) NOT NULL default '0',
  `MDL` int(11) NOT NULL default '0',
  `MXN` int(11) NOT NULL default '0',
  `MYR` int(11) NOT NULL default '0',
  `NIS` int(11) NOT NULL default '0',
  `NLG` int(11) NOT NULL default '0',
  `NOK` int(11) NOT NULL default '0',
  `PEN` int(11) NOT NULL default '0',
  `PHP` int(11) NOT NULL default '0',
  `PKR` int(11) NOT NULL default '0',
  `PLN` int(11) NOT NULL default '0',
  `PTE` int(11) NOT NULL default '0',
  `PYG` int(11) NOT NULL default '0',
  `RON` int(11) NOT NULL default '0',
  `RSD` int(11) NOT NULL default '0',
  `RUB` int(11) NOT NULL default '0',
  `SEK` int(11) NOT NULL default '0',
  `SGD` int(11) NOT NULL default '0',
  `SIT` int(11) NOT NULL default '0',
  `SKK` int(11) NOT NULL default '0',
  `THB` int(11) NOT NULL default '0',
  `TRY` int(11) NOT NULL default '0',
  `UAH` int(11) NOT NULL default '0',
  `USD` int(11) NOT NULL default '0',
  `UYU` int(11) NOT NULL default '0',
  `VEB` int(11) NOT NULL default '0',
  `ZAR` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decisions`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `decisions`;
CREATE TABLE IF NOT EXISTS `decisions` (
  `ID` int(11) NOT NULL auto_increment,
  `type` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `country_involved` int(11) default NULL,
  `money_to` int(11) default NULL,
  `how_much_money` int(11) default NULL,
  `object_type` int(11) default NULL,
  `new_income_tax` int(11) default NULL,
  `new_import_tax` int(11) default NULL,
  `new_vat_tax` int(11) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friendships`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `friendships`;
CREATE TABLE IF NOT EXISTS `friendships` (
  `ID` int(11) NOT NULL auto_increment,
  `user_1_id` int(11) NOT NULL,
  `user_2_id` int(11) NOT NULL,
  `acepted` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventories`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `inventories`;
CREATE TABLE IF NOT EXISTS `inventories` (
  `ID` int(11) NOT NULL auto_increment,
  `food_1_amount` int(11) NOT NULL default '0',
  `food_2_amount` int(11) NOT NULL default '0',
  `food_3_amount` int(11) NOT NULL default '0',
  `food_4_amount` int(11) NOT NULL default '0',
  `food_5_amount` int(11) NOT NULL default '0',
  `gift_1_amount` int(11) NOT NULL default '0',
  `gift_2_amount` int(11) NOT NULL default '0',
  `gift_3_amount` int(11) NOT NULL default '0',
  `gift_4_amount` int(11) NOT NULL default '0',
  `gift_5_amount` int(11) NOT NULL default '0',
  `weapon_1_amount` int(11) NOT NULL default '0',
  `weapon_2_amount` int(11) NOT NULL default '0',
  `weapon_3_amount` int(11) NOT NULL default '0',
  `weapon_4_amount` int(11) NOT NULL default '0',
  `weapon_5_amount` int(11) NOT NULL default '0',
  `tickets_1_amount` int(11) NOT NULL default '0',
  `tickets_2_amount` int(11) NOT NULL default '0',
  `tickets_3_amount` int(11) NOT NULL default '0',
  `tickets_4_amount` int(11) NOT NULL default '0',
  `tickets_5_amount` int(11) NOT NULL default '0',
  `grain_1_amount` int(11) NOT NULL default '0',
  `grain_2_amount` int(11) NOT NULL default '0',
  `grain_3_amount` int(11) NOT NULL default '0',
  `grain_4_amount` int(11) NOT NULL default '0',
  `grain_5_amount` int(11) NOT NULL default '0',
  `diamonds_1_amount` int(11) NOT NULL default '0',
  `diamonds_2_amount` int(11) NOT NULL default '0',
  `diamonds_3_amount` int(11) NOT NULL default '0',
  `diamonds_4_amount` int(11) NOT NULL default '0',
  `diamonds_5_amount` int(11) NOT NULL default '0',
  `iron_1_amount` int(11) NOT NULL default '0',
  `iron_2_amount` int(11) NOT NULL default '0',
  `iron_3_amount` int(11) NOT NULL default '0',
  `iron_4_amount` int(11) NOT NULL default '0',
  `iron_5_amount` int(11) NOT NULL default '0',
  `oil_1_amount` int(11) NOT NULL default '0',
  `oil_2_amount` int(11) NOT NULL default '0',
  `oil_3_amount` int(11) NOT NULL default '0',
  `oil_4_amount` int(11) NOT NULL default '0',
  `oil_5_amount` int(11) NOT NULL default '0',
  `wood_1_amount` int(11) NOT NULL default '0',
  `wood_2_amount` int(11) NOT NULL default '0',
  `wood_3_amount` int(11) NOT NULL default '0',
  `wood_4_amount` int(11) NOT NULL default '0',
  `wood_5_amount` int(11) NOT NULL default '0',
  `house_1_amount` int(11) NOT NULL default '0',
  `house_2_amount` int(11) NOT NULL default '0',
  `house_3_amount` int(11) NOT NULL default '0',
  `house_4_amount` int(11) NOT NULL default '0',
  `house_5_amount` int(11) NOT NULL default '0',
  `hospital_1_amount` int(11) NOT NULL default '0',
  `hospital_2_amount` int(11) NOT NULL default '0',
  `hospital_3_amount` int(11) NOT NULL default '0',
  `hospital_4_amount` int(11) NOT NULL default '0',
  `hospital_5_amount` int(11) NOT NULL default '0',
  `defense_system_1_amount` int(11) NOT NULL default '0',
  `defense_system_2_amount` int(11) NOT NULL default '0',
  `defense_system_3_amount` int(11) NOT NULL default '0',
  `defense_system_4_amount` int(11) NOT NULL default '0',
  `defense_system_5_amount` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `market`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `market`;
CREATE TABLE IF NOT EXISTS `market` (
  `ID` int(11) NOT NULL auto_increment,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL auto_increment,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `subject` text character set ucs2 collate ucs2_spanish_ci NOT NULL,
  `content` text character set utf8 collate utf8_spanish_ci NOT NULL,
  `received` int(11) NOT NULL default '0',
  `sent_time` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newspapers`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `newspapers`;
CREATE TABLE IF NOT EXISTS `newspapers` (
  `ID` int(11) NOT NULL auto_increment,
  `name` text character set utf8 collate utf8_spanish_ci NOT NULL,
  `founder_id` int(11) NOT NULL,
  `localization` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parties`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `parties`;
CREATE TABLE IF NOT EXISTS `parties` (
  `ID` int(11) NOT NULL auto_increment,
  `name` text character set utf8 collate utf8_spanish_ci NOT NULL,
  `founder_id` int(11) NOT NULL,
  `president_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `orientation` int(11) NOT NULL,
  `Gold` int(11) NOT NULL default '0',
  `ARS` int(11) NOT NULL default '0',
  `ATS` int(11) NOT NULL default '0',
  `AUD` int(11) NOT NULL default '0',
  `BAM` int(11) NOT NULL default '0',
  `BEF` int(11) NOT NULL default '0',
  `BGN` int(11) NOT NULL default '0',
  `BOB` int(11) NOT NULL default '0',
  `BRL` int(11) NOT NULL default '0',
  `CAD` int(11) NOT NULL default '0',
  `CHF` int(11) NOT NULL default '0',
  `CLP` int(11) NOT NULL default '0',
  `CNY` int(11) NOT NULL default '0',
  `COP` int(11) NOT NULL default '0',
  `CZK` int(11) NOT NULL default '0',
  `DEM` int(11) NOT NULL default '0',
  `DKK` int(11) NOT NULL default '0',
  `EEK` int(11) NOT NULL default '0',
  `ESP` int(11) NOT NULL default '0',
  `FIM` int(11) NOT NULL default '0',
  `FRF` int(11) NOT NULL default '0',
  `GBP` int(11) NOT NULL default '0',
  `GRD` int(11) NOT NULL default '0',
  `HRK` int(11) NOT NULL default '0',
  `HUF` int(11) NOT NULL default '0',
  `IDR` int(11) NOT NULL default '0',
  `IEP` int(11) NOT NULL default '0',
  `INR` int(11) NOT NULL default '0',
  `IRR` int(11) NOT NULL default '0',
  `ITL` int(11) NOT NULL default '0',
  `JPY` int(11) NOT NULL default '0',
  `KPW` int(11) NOT NULL default '0',
  `KRW` int(11) NOT NULL default '0',
  `LTL` int(11) NOT NULL default '0',
  `LVL` int(11) NOT NULL default '0',
  `MDL` int(11) NOT NULL default '0',
  `MXN` int(11) NOT NULL default '0',
  `MYR` int(11) NOT NULL default '0',
  `NIS` int(11) NOT NULL default '0',
  `NLG` int(11) NOT NULL default '0',
  `NOK` int(11) NOT NULL default '0',
  `PEN` int(11) NOT NULL default '0',
  `PHP` int(11) NOT NULL default '0',
  `PKR` int(11) NOT NULL default '0',
  `PLN` int(11) NOT NULL default '0',
  `PTE` int(11) NOT NULL default '0',
  `PYG` int(11) NOT NULL default '0',
  `RON` int(11) NOT NULL default '0',
  `RSD` int(11) NOT NULL default '0',
  `RUB` int(11) NOT NULL default '0',
  `SEK` int(11) NOT NULL default '0',
  `SGD` int(11) NOT NULL default '0',
  `SIT` int(11) NOT NULL default '0',
  `SKK` int(11) NOT NULL default '0',
  `THB` int(11) NOT NULL default '0',
  `TRY` int(11) NOT NULL default '0',
  `UAH` int(11) NOT NULL default '0',
  `USD` int(11) NOT NULL default '0',
  `UYU` int(11) NOT NULL default '0',
  `VEB` int(11) NOT NULL default '0',
  `ZAR` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shouts`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `shouts`;
CREATE TABLE IF NOT EXISTS `shouts` (
  `ID` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `content` text character set utf8 collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `ID` int(11) NOT NULL auto_increment,
  `name` text character set utf8 collate utf8_spanish_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `defense_sistem` int(11) NOT NULL default '0',
  `hospital` int(11) NOT NULL default '0',
  `hierro_production` int(11) NOT NULL default '0',
  `grano_production` int(11) NOT NULL default '0',
  `diamonds_production` int(11) NOT NULL default '0',
  `petroleo_production` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptions`
--
-- Creación: 08-05-2010 a las 22:21:13
-- Última actualización: 08-05-2010 a las 22:21:13
--

DROP TABLE IF EXISTS `suscriptions`;
CREATE TABLE IF NOT EXISTS `suscriptions` (
  `ID` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `newspaper_id` int(11) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 21-07-2010 a las 14:11:26
-- Última actualización: 26-07-2010 a las 20:15:36
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` mediumint(8) unsigned NOT NULL auto_increment,
  `username` varchar(15) character set utf8 collate utf8_spanish_ci NOT NULL,
  `password` char(40) character set utf8 collate utf8_unicode_ci NOT NULL,
  `email` varchar(30) character set utf8 collate utf8_spanish_ci NOT NULL,
  `reg_IP` varchar(15) character set utf8 collate utf8_spanish_ci NOT NULL,
  `last_IP` varchar(15) NOT NULL,
  `location` int(11) NOT NULL,
  `ref_id` mediumint(8) default NULL,
  `validated` tinyint(1) NOT NULL default '0',
  `validation_str` char(15) character set latin1 collate latin1_spanish_ci NOT NULL,
  `hard_worker` int(11) NOT NULL default '0',
  `worked_days` int(11) NOT NULL default '0',
  `congress_member` int(11) NOT NULL default '0',
  `country_president` int(11) NOT NULL default '0',
  `media_mogul` int(11) NOT NULL default '0',
  `battle_hero` int(11) NOT NULL default '0',
  `resistance_hero` int(11) NOT NULL default '0',
  `super_soldier` int(11) NOT NULL default '0',
  `society_builder` int(11) NOT NULL default '0',
  `invited_people` int(11) NOT NULL default '0',
  `company_id` int(11) default NULL,
  `company_internal_level` int(11) default '0',
  `party_id` int(11) default NULL,
  `party_internal_level` int(11) default '0',
  `fights` int(11) NOT NULL default '0',
  `total_damage` int(11) NOT NULL default '0',
  `militar_rank` int(11) NOT NULL default '1',
  `wellness` int(11) NOT NULL default '50',
  `experience` int(11) NOT NULL default '0',
  `level` int(11) NOT NULL default '1',
  `manufacturing` int(11) NOT NULL default '0',
  `land` int(11) NOT NULL default '0',
  `constructions` int(11) NOT NULL default '0',
  `strength` int(11) NOT NULL default '0',
  `birthday` int(11) NOT NULL,
  `forfeit_points` int(11) NOT NULL default '0',
  `congress_nr` int(11) NOT NULL default '0',
  `congress_country_id` int(11) NOT NULL,
  `citizenship` int(11) NOT NULL,
  `salary_amount` int(11) NOT NULL default '0',
  `salary_currency` int(11) NOT NULL,
  `money_MP` int(11) NOT NULL default '50000',
  `money_1` int(11) NOT NULL default '0',
  `money_2` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;
