-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-05-2014 a las 05:26:05
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `panta`
--
CREATE DATABASE IF NOT EXISTS `panta` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `panta`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `referencia` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` smallint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` bigint(15) NOT NULL,
  `placa` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `pasajeros` int(11) NOT NULL DEFAULT '0',
  `viajes` int(11) NOT NULL DEFAULT '0',
  `clave` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigo`, `nombre`, `apellido`, `correo`, `foto`, `telefono`, `placa`, `pasajeros`, `viajes`, `clave`) VALUES
(1, 'Jorge', 'Hernandez', 'ja.hernandez13', '1.png', 2147483647, 'RBQ388', 0, 0, 'mexico'),
(2, 'Santiago', 'Rojas', 's.rojas963', '2.png', 2147483647, 'VZZ203', 0, 0, '123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE IF NOT EXISTS `viaje` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` int(4) NOT NULL,
  `sillas` tinyint(2) NOT NULL DEFAULT '0',
  `id_conductor` int(6) NOT NULL,
  `destino` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `conductor_viaje` (`id_conductor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id`, `descripcion`, `fecha`, `hora`, `sillas`, `id_conductor`, `destino`) VALUES
(1, 'Salgo por la #7 hasta la #140', '2014-03-04', 1700, 2, 1, 0),
(6, 'Cojo por la #Circunvalar, luego la #7 hasta la #127', '2014-03-06', 1530, 0, 1, 1),
(23, 'Salgo para #cedritos', '2014-03-06', 1600, 3, 1, 1),
(24, 'Ruta alejandria', '2014-03-07', 1930, 3, 1, 1),
(25, 'Ruta alejandria', '2014-03-10', 1930, 3, 1, 1),
(28, 'voy hoy domingo a la universidad desde #cedritos', '2014-03-24', 2300, 0, 1, 1),
(29, 'voy hoy domingo a la universidad desde #cedritos', '2014-03-24', 2300, 0, 1, 1),
(37, 'Salgo para #Palatino por la #7ma', '2014-03-26', 2330, 2, 2, 1),
(38, 'Salgo para #Palatino por la #7ma', '2014-03-26', 2330, 0, 2, 1),
(39, 'Salgo para #Palatino por la #7ma', '2014-03-26', 2330, 0, 2, 1),
(40, 'Salgo para #Palatino por la #7ma', '2014-03-28', 2330, 0, 2, 1),
(41, 'viaje destino', '2014-04-07', 2300, 0, 2, 1),
(42, 'viaje destino', '2014-04-07', 2300, 0, 2, 0),
(43, 'viaje destino', '2014-04-09', 2300, 0, 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `FK_Usuarios_Codigo` FOREIGN KEY (`id_conductor`) REFERENCES `usuario` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
