-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2017 at 07:06 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laboratorio`
--

-- --------------------------------------------------------

--
-- Table structure for table `fichaAntropometrica`
--

CREATE TABLE IF NOT EXISTS `fichaAntropometrica` (
  `keyFA` int(11) NOT NULL AUTO_INCREMENT,
  `talla` float(2,2) NOT NULL COMMENT 'Talla',
  `peso` float(2,2) NOT NULL COMMENT 'Peso',
  `cMuneca` float(2,1) NOT NULL COMMENT 'Circunferencia Muneca',
  `cCadera` float(2,1) NOT NULL COMMENT 'Circunferencia Cadera',
  `matricula` varchar(30) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Matricula',
  `id_escuela` int(2) NOT NULL COMMENT 'Escuela',
  `fecha` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`keyFA`),
  KEY `matricula` (`matricula`),
  KEY `fecha` (`fecha`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `fichaBioquimica`
--

CREATE TABLE IF NOT EXISTS `fichaBioquimica` (
  `keyFB` int(11) NOT NULL AUTO_INCREMENT,
  `colesterol` float(3,2) NOT NULL COMMENT 'Colesterol',
  `trigliceridos` float(3,2) NOT NULL COMMENT 'Trigliceridos',
  `hdl` float(3,2) NOT NULL COMMENT 'HDL',
  `ldl` float(3,2) NOT NULL COMMENT 'LDL',
  `vdl` float(3,2) NOT NULL COMMENT 'VDL',
  `ldlvdl` float(3,2) NOT NULL COMMENT 'LDL/VDL',
  `insulinaBasal` float(3,2) NOT NULL COMMENT 'Insulina Basal',
  `glucosaBasal` float(3,2) NOT NULL COMMENT 'Insulina Glucosa',
  `matricula` varchar(15) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Matricula',
  `id_escuela` int(2) NOT NULL,
  PRIMARY KEY (`keyFB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fichaClinica`
--

CREATE TABLE IF NOT EXISTS `fichaClinica` (
  `keyFC` int(11) NOT NULL AUTO_INCREMENT,
  `toma1BrazoDerecho` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `toma1BrazoIzquierdo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `toma2BrazoDerecho` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `toma2BrazoIzquierdo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `matricula` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `id_escuela` int(2) NOT NULL,
  PRIMARY KEY (`keyFC`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `identificacionAlumno`
--

CREATE TABLE IF NOT EXISTS `identificacionAlumno` (
  `keyIA` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(15) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Codigo',
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre',
  `apellidoPaterno` varchar(100) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Apellido Paterno',
  `apellidoMaterno` varchar(100) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'ApellidoMaterno',
  `edad` int(2) NOT NULL DEFAULT '0' COMMENT 'Edad',
  `edadMeses` int(2) NOT NULL DEFAULT '0' COMMENT 'Meses de Edad',
  `id_escuela` int(2) NOT NULL COMMENT 'Escuela',
  `grado` int(1) NOT NULL COMMENT 'Grado',
  `fechaSistema` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`keyIA`),
  KEY `fecha` (`fechaSistema`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `listaEscuelas`
--

CREATE TABLE IF NOT EXISTS `listaEscuelas` (
  `id_escuela` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `referencia` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_escuela`),
  UNIQUE KEY `id_escuela` (`id_escuela`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=11 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
