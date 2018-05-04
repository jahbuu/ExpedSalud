-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2018 at 05:09 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expedsalud_`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
CREATE TABLE IF NOT EXISTS `consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `tipo_form` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`id`, `id_persona`, `tipo_form`, `id_form`, `fecha`) VALUES
(1, 1, 1, 1, '2018-02-01'),
(2, 1, 2, 2, '2018-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `idCurso` int(9) NOT NULL AUTO_INCREMENT,
  `nombreCurso` varchar(150) NOT NULL,
  `CantidadVideos` int(9) NOT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`idCurso`, `nombreCurso`, `CantidadVideos`) VALUES
(1, 'Jim[enez', 50);

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Departamento 1');

-- --------------------------------------------------------

--
-- Table structure for table `directorio_telefonico`
--

DROP TABLE IF EXISTS `directorio_telefonico`;
CREATE TABLE IF NOT EXISTS `directorio_telefonico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directorio_telefonico`
--

INSERT INTO `directorio_telefonico` (`id`, `id_persona`, `numero`, `tipo`) VALUES
(1, 1, '22222222', 1),
(2, 2, '11111111', 1),
(3, 3, '33333333', 1);

-- --------------------------------------------------------

--
-- Table structure for table `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
CREATE TABLE IF NOT EXISTS `domicilio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `direccion` varchar(750) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domicilio`
--

INSERT INTO `domicilio` (`id`, `id_persona`, `direccion`, `tipo`) VALUES
(1, 1, 'Costa Rica, San José, Escazú, Bello Horizonte, Urbanización Nuevo Horizonte casa n°57', 1),
(2, 2, 'Costa Rica, San José', 1),
(3, 3, 'Costa Rica, San José', 1);

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`) VALUES
(1, 'Empresa 1');

-- --------------------------------------------------------

--
-- Table structure for table `form_examenes`
--

DROP TABLE IF EXISTS `form_examenes`;
CREATE TABLE IF NOT EXISTS `form_examenes` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `tipo` int(3) NOT NULL,
  `id_persona` int(9) NOT NULL,
  `referencia` varchar(500) NOT NULL,
  `descripcion` text NOT NULL,
  `enlace` text NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_modificado` int(9) DEFAULT NULL,
  `id_medico` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`,`referencia`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_examenes`
--

INSERT INTO `form_examenes` (`id`, `tipo`, `id_persona`, `referencia`, `descripcion`, `enlace`, `fecha`, `fecha_modificado`, `id_modificado`, `id_medico`) VALUES
(32, 1, 3, '', '', '1524539610---Gon.PNG', '2018-04-16 03:13:33', '2018-04-24 03:13:33', 1, 1),
(28, 1, 3, '', 'Examen de Lab 24', '', '2018-04-24 03:05:00', '2018-04-24 03:05:00', NULL, 1),
(29, 1, 3, '', '', '1524539121---ee604d014ab1187134c4fb62b62cc5cd.jpg', '2018-04-26 03:05:24', '2018-04-24 03:05:24', NULL, 1),
(30, 2, 3, '', 'Examen de Gab 24', '', '2018-04-24 03:05:46', '2018-04-24 03:05:46', NULL, 1),
(31, 3, 3, '', '', '1524539154---maxresdefault (1).jpg', '2018-04-24 03:05:59', '2018-04-24 03:05:59', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_examen_fisico`
--

DROP TABLE IF EXISTS `form_examen_fisico`;
CREATE TABLE IF NOT EXISTS `form_examen_fisico` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `presion_arterial` varchar(500) NOT NULL,
  `frecuencia_cardiaca` varchar(500) NOT NULL,
  `frecuencia_respiratoria` varchar(500) NOT NULL,
  `temperatura` varchar(500) NOT NULL,
  `apariencia` varchar(500) NOT NULL,
  `cabeza` varchar(500) NOT NULL,
  `ojos` varchar(500) NOT NULL,
  `ORL` varchar(500) NOT NULL,
  `cardiopulmonar` varchar(500) NOT NULL,
  `abdomen` varchar(500) NOT NULL,
  `extremidades` varchar(500) NOT NULL,
  `osteomuscular` varchar(500) NOT NULL,
  `SNC` varchar(500) NOT NULL,
  `genitales` varchar(500) NOT NULL,
  `piel` varchar(500) NOT NULL,
  `peso` text NOT NULL,
  `talla` text NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_persona` int(9) NOT NULL,
  `fecha_modificado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_modificado` int(9) DEFAULT NULL,
  `id_medico` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_persona`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_examen_fisico`
--

INSERT INTO `form_examen_fisico` (`id`, `presion_arterial`, `frecuencia_cardiaca`, `frecuencia_respiratoria`, `temperatura`, `apariencia`, `cabeza`, `ojos`, `ORL`, `cardiopulmonar`, `abdomen`, `extremidades`, `osteomuscular`, `SNC`, `genitales`, `piel`, `peso`, `talla`, `fecha`, `id_persona`, `fecha_modificado`, `id_modificado`, `id_medico`) VALUES
(7, 'poi', 'poi', 'pio', 'ip', 'ip', 'p', 'oiop', 'ip', 'poi', 'poi', 'poi', 'pio', 'piopo', 'ipio', 'pio', 'poi', 'poi', '2018-04-21 21:30:13', 3, '2018-04-21 21:30:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_historia_clinica`
--

DROP TABLE IF EXISTS `form_historia_clinica`;
CREATE TABLE IF NOT EXISTS `form_historia_clinica` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `ahf` varchar(500) NOT NULL,
  `pnp_tabaquismo` text NOT NULL,
  `pnp_etilismo` text NOT NULL,
  `app_medicos` varchar(500) NOT NULL,
  `app_traumaticos` varchar(500) NOT NULL,
  `app_quirurjicos` varchar(500) NOT NULL,
  `alergia_medicamentos` varchar(500) NOT NULL,
  `ago` varchar(500) NOT NULL,
  `id_persona` int(9) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_modificado` int(9) DEFAULT NULL,
  `id_medico` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_persona`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_historia_clinica`
--

INSERT INTO `form_historia_clinica` (`id`, `ahf`, `pnp_tabaquismo`, `pnp_etilismo`, `app_medicos`, `app_traumaticos`, `app_quirurjicos`, `alergia_medicamentos`, `ago`, `id_persona`, `fecha`, `fecha_modificado`, `id_modificado`, `id_medico`) VALUES
(33, '3434', '34', '34', '3434', '334', '34', '34', '34', 3, '2018-04-21 21:29:59', '2018-04-21 21:29:59', 1, 1),
(34, '', '', '', '', '', '', '', '', 3, '2018-04-24 03:41:41', '2018-04-24 03:41:41', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_problemas`
--

DROP TABLE IF EXISTS `form_problemas`;
CREATE TABLE IF NOT EXISTS `form_problemas` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `fecha_diagnostico` date NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha_resolucion` date NOT NULL,
  `id_persona` int(9) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_modificado` int(9) DEFAULT NULL,
  `id_medico` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_persona`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_problemas`
--

INSERT INTO `form_problemas` (`id`, `fecha_diagnostico`, `descripcion`, `fecha_resolucion`, `id_persona`, `tipo`, `fecha`, `fecha_modificado`, `id_modificado`, `id_medico`) VALUES
(60, '2018-04-02', 'b', '2018-04-03', 3, 1, '2018-04-24 06:00:00', '2018-04-24 03:36:50', 1, 1),
(59, '2018-04-01', 'a', '2018-04-02', 3, 1, '2018-04-24 06:00:00', '2018-04-24 03:36:50', 1, 1),
(58, '2018-04-02', '2', '2018-04-03', 3, 0, '2018-04-24 06:00:00', '2018-04-24 03:36:50', 1, 1),
(57, '2018-04-01', '1', '2018-04-02', 3, 0, '2018-04-24 06:00:00', '2018-04-24 03:36:50', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ocupacion`
--

DROP TABLE IF EXISTS `ocupacion`;
CREATE TABLE IF NOT EXISTS `ocupacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ocupacion`
--

INSERT INTO `ocupacion` (`id`, `id_persona`, `nombre`) VALUES
(1, 1, 'Ingeniero en Sistemas'),
(2, 2, 'Estudiante'),
(3, 3, 'Estudiante');

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `cedula` varchar(15) DEFAULT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `apellido` varchar(75) DEFAULT NULL,
  `apellido_2` varchar(75) DEFAULT NULL,
  `nacionalidad` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `estado_civil` int(3) DEFAULT NULL,
  `ingreso` varchar(10) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL,
  `departamento` int(11) DEFAULT NULL,
  `trabajos_adicionales` varchar(500) DEFAULT NULL,
  `role` varchar(3) DEFAULT NULL,
  `titulo` varchar(500) NOT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`id`, `email`, `cedula`, `nombre`, `apellido`, `apellido_2`, `nacionalidad`, `fecha_nacimiento`, `username`, `password`, `categoria`, `sexo`, `estado_civil`, `ingreso`, `empresa`, `departamento`, `trabajos_adicionales`, `role`, `titulo`) VALUES
(1, 'royjiqu@gmail.com', '12341234', 'Roy ', 'Jiménez', 'Quirós', 'CRC', '1991-03-06', 'redgemini', '1q2w3e4r5t', NULL, 'M', 1, NULL, 1, 1, NULL, 'med', 'Ingeniero de TI'),
(2, 'javigomez9876@gmail.com', '12341235', 'Javier', 'Gómez', 'Gómez', 'CRC', '1995-01-01', 'jgomez', '1q2w3e4r5t', NULL, 'M', 1, '', 1, 1, NULL, 'pac', 'Estudiante'),
(3, 'julianbarzuna@gmail.com', '12341236', 'Julian', 'Barzuna', 'Barzuna', 'CRC', '1996-01-01', 'jbarzuna', '1q2w3e4r5t', NULL, 'M', 1, NULL, 1, 1, NULL, 'pac', 'Estudiante');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
