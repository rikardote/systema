-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-09-2015 a las 20:40:49
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.6.10-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adscipciones`
--

CREATE TABLE IF NOT EXISTS `adscipciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adscripcion` int(5) unsigned zerofill NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `adscripcion` (`adscripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `adscipciones`
--

INSERT INTO `adscipciones` (`id`, `adscripcion`, `descripcion`) VALUES
(1, 00053, 'SUBDELEGACION MEDICA'),
(2, 00054, 'HOSPITAL GENERAL 5 DE DICIEMBRE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captura_incidencias`
--

CREATE TABLE IF NOT EXISTS `captura_incidencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qna_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `incidencia_cod` int(3) NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `token` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `num_empleado` (`empleado_id`,`incidencia_cod`),
  KEY `incidencia_cod` (`incidencia_cod`),
  KEY `qna` (`qna_id`),
  KEY `qna_id` (`qna_id`),
  KEY `qna_id_2` (`qna_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `captura_incidencias`
--

INSERT INTO `captura_incidencias` (`id`, `qna_id`, `empleado_id`, `incidencia_cod`, `fecha_inicial`, `fecha_final`, `token`, `created_at`, `updated_at`) VALUES
(19, 5, 2, 3, '2015-09-12', '2015-09-12', '', '2015-09-29 16:30:18', '2015-09-29 23:30:18'),
(20, 10, 3, 4, '2015-09-12', '2015-09-12', '39eeb9460e20c857ad7d9da92d1df98f9000b917', '2015-09-29 17:15:55', '2015-09-30 00:15:55'),
(21, 5, 2, 1, '2015-09-12', '2015-09-12', 'bb1b4e424dc7cf89436b73927a5f7fb4ed69842e', '2015-09-29 17:18:53', '2015-09-30 00:18:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_empleado` int(6) unsigned zerofill NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellido_pat` varchar(20) NOT NULL,
  `apellido_mat` varchar(20) NOT NULL,
  `adscripcion` int(5) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `num_empleado_2` (`num_empleado`),
  KEY `num_empleado` (`num_empleado`,`adscripcion`),
  KEY `adscripcion` (`adscripcion`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `num_empleado`, `nombres`, `apellido_pat`, `apellido_mat`, `adscripcion`) VALUES
(2, 332618, 'HECTOR RICARDO', 'FUENTES', 'ARMENTA', 00054),
(3, 125259, 'MONICA', 'GUTIERREZ', 'SAMANIEGO', 00053);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE IF NOT EXISTS `incidencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `incidencia_cod` int(2) unsigned zerofill NOT NULL,
  `inc_descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incidencia_cod` (`incidencia_cod`),
  KEY `incidencia_cod_2` (`incidencia_cod`),
  KEY `incidencia_cod_3` (`incidencia_cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `incidencia_cod`, `inc_descripcion`) VALUES
(1, 01, 'RETARDO DE 11 A 29 MINUTOS'),
(2, 02, 'RETARDO DE 30 A 59 MIN'),
(3, 10, 'FALTA'),
(4, 18, 'OMISION DE ENTRADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qnas`
--

CREATE TABLE IF NOT EXISTS `qnas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qna_mes` int(2) unsigned zerofill NOT NULL,
  `qna_year` int(4) NOT NULL,
  `qna_descripcion` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_5` (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`),
  KEY `id_4` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `qnas`
--

INSERT INTO `qnas` (`id`, `qna_mes`, `qna_year`, `qna_descripcion`, `created_at`) VALUES
(4, 01, 2015, '1ERA DE ENERO', '0000-00-00 00:00:00'),
(5, 02, 2015, '2DA DE ENERO', '0000-00-00 00:00:00'),
(6, 03, 2015, '1ERA DE FEBRERO', '2015-09-29 05:33:07'),
(7, 04, 2015, '2DA DE FEBRERO', '2015-09-29 05:35:07'),
(9, 05, 2015, '1ERA DE MARZO', '2015-09-29 05:49:51'),
(10, 06, 2015, '2DA DE MARZO', '2015-09-29 18:05:00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `captura_incidencias`
--
ALTER TABLE `captura_incidencias`
  ADD CONSTRAINT `captura_incidencias_ibfk_2` FOREIGN KEY (`incidencia_cod`) REFERENCES `incidencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `captura_incidencias_ibfk_3` FOREIGN KEY (`qna_id`) REFERENCES `qnas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `captura_incidencias_ibfk_4` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`adscripcion`) REFERENCES `adscipciones` (`adscripcion`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
