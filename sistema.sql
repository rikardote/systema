-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-10-2015 a las 12:28:35
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
-- Estructura de tabla para la tabla `adscripciones`
--

CREATE TABLE IF NOT EXISTS `adscripciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adscripcion` int(5) unsigned zerofill NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `adscripcion` (`adscripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `adscripciones`
--

INSERT INTO `adscripciones` (`id`, `adscripcion`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 00053, 'SUBDELEGACION MEDICA', '0000-00-00 00:00:00', '2015-10-03 19:39:39'),
(2, 00054, 'HOSPITAL GENERAL 5 DE DICIEMBRE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 00055, 'HOSPITAL GENERAL FRAY JUNIPERO', '2015-09-30 17:19:44', '0000-00-00 00:00:00'),
(5, 00105, 'SUBDELEGACION DE ADMINISTRACION', '2015-09-30 15:00:38', '0000-00-00 00:00:00'),
(6, 00074, 'SUBDELEGACION DE PRESTACIONES', '2015-09-30 16:14:22', '0000-00-00 00:00:00'),
(7, 00052, 'OFICINA DEL C. DELEGADO', '2015-09-30 16:15:14', '2015-10-03 20:10:38'),
(11, 00056, 'CLINICA HOSPITAL ENSENADA', '2015-10-03 00:40:20', '2015-10-03 07:40:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captura_incidencias`
--

CREATE TABLE IF NOT EXISTS `captura_incidencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qna_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `incidencia_id` int(3) NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `token` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `num_empleado` (`empleado_id`,`incidencia_id`),
  KEY `incidencia_cod` (`incidencia_id`),
  KEY `qna` (`qna_id`),
  KEY `qna_id` (`qna_id`),
  KEY `qna_id_2` (`qna_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `captura_incidencias`
--

INSERT INTO `captura_incidencias` (`id`, `qna_id`, `empleado_id`, `incidencia_id`, `fecha_inicial`, `fecha_final`, `token`, `created_at`, `updated_at`) VALUES
(19, 5, 2, 3, '2015-09-12', '2015-09-12', '', '2015-09-29 16:30:18', '2015-09-29 23:30:18'),
(20, 10, 3, 4, '2015-09-12', '2015-09-12', '39eeb9460e20c857ad7d9da92d1df98f9000b917', '2015-09-29 17:15:55', '2015-09-30 00:15:55'),
(21, 5, 2, 1, '2015-09-12', '2015-09-12', 'bb1b4e424dc7cf89436b73927a5f7fb4ed69842e', '2015-09-29 17:18:53', '2015-09-30 00:18:53'),
(22, 9, 3, 3, '2015-09-12', '2015-09-12', '0a190fe0c474b17e298da11b30a71eab000cb200', '2015-09-30 16:12:53', '2015-09-30 16:12:53'),
(23, 6, 3, 2, '2015-09-12', '2015-09-12', '7e33133aeb343b61c307486d9df2ef1a0bf224d3', '2015-09-30 17:10:33', '2015-09-30 17:10:33'),
(28, 5, 10, 7, '2015-09-12', '2015-09-12', 'cbc98589531521389234b581637f1fe36394dd44', '2015-09-30 16:31:08', '2015-09-30 23:31:08'),
(29, 10, 10, 8, '2015-09-12', '2015-09-12', '2ceac954470f6d732de37018b671998bc0172d47', '2015-09-30 16:37:47', '2015-09-30 23:37:47'),
(30, 5, 3, 5, '2015-09-15', '2015-09-16', '0ec42d25deaa5f55c6c5cb192173b87743ef1a2d', '2015-09-30 22:10:42', '2015-10-01 05:10:42');

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
  `adscripcion_id` int(5) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `num_empleado_2` (`num_empleado`),
  KEY `num_empleado` (`num_empleado`,`adscripcion_id`),
  KEY `adscripcion` (`adscripcion_id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `num_empleado`, `nombres`, `apellido_pat`, `apellido_mat`, `adscripcion_id`, `activo`, `created_at`, `updated_at`) VALUES
(2, 332618, 'HECTOR RICARDO', 'FUENTES', 'ARMENTA', 1, 1, '0000-00-00 00:00:00', '2015-10-04 08:47:42'),
(3, 125259, 'MONICA', 'GUTIERREZ', 'SAMANIEGO', 7, 1, '0000-00-00 00:00:00', '2015-10-04 07:15:08'),
(10, 225225, 'JOSE MARIA', 'FUENTES', 'ARMENTA', 3, 1, '2015-09-30 16:12:07', '2015-10-04 08:49:14'),
(11, 147258, 'NANCY DANIXA', 'FUENTES', 'ARMENTA', 6, 1, '2015-09-30 16:58:34', '2015-10-04 05:44:35'),
(12, 258369, 'ALEJANDRO', 'PRADO', 'SALCIDO', 6, 1, '2015-09-30 16:59:56', '2015-10-04 05:44:35'),
(13, 159951, 'ALBERTO', 'AGUILAR', 'NEGRETE', 5, 1, '2015-10-01 17:08:53', '2015-10-04 05:44:35'),
(14, 346791, 'ALMA', 'MARIA', 'LAGOS', 5, 1, '2015-10-01 17:41:53', '2015-10-04 05:44:35'),
(15, 351252, 'FRANCISCO JAVIER', 'MERCADO', 'PEREZ', 2, 1, '2015-10-01 19:44:10', '2015-10-04 05:44:35'),
(16, 145874, 'JAVIER', 'HERNANDEZ', 'PALOMINO', 2, 1, '2015-10-01 20:29:57', '2015-10-04 05:44:35'),
(17, 254698, 'GUSTAVO', 'CERATI', 'ROMERO', 5, 1, '2015-10-01 20:30:43', '2015-10-04 05:44:35'),
(18, 246798, 'RAUL', 'ARAIZA', 'ARMENTA', 3, 1, '2015-10-02 15:03:41', '2015-10-04 05:44:35'),
(20, 036478, 'GUADALUPE', 'VICTORIA', 'REYES', 1, 1, '2015-10-03 15:39:03', '2015-10-04 05:44:35'),
(21, 045875, 'RUBEN', 'GARCIA', 'ROSALES', 5, 1, '2015-10-03 15:39:54', '2015-10-04 05:44:35'),
(22, 025478, 'MANUEL', 'SERRANO', 'ARIAS', 1, 1, '2015-10-03 17:38:50', '2015-10-04 07:14:54'),
(23, 336699, 'GILBERTO', 'GLESS', 'GUZMAN', 7, 1, '2015-10-04 00:21:03', '2015-10-04 07:21:03'),
(30, 456456, 'DFSGSDFGSD', 'FGDSFG', 'SDFGDSFG', 3, 1, '2015-10-04 00:36:12', '2015-10-04 07:36:12'),
(31, 067678, 'DFASDFSDF', 'ASDFASDFASDF', 'ASDFSADF', 6, 1, '2015-10-04 00:37:47', '2015-10-04 07:38:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE IF NOT EXISTS `incidencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `incidencia_cod` int(2) unsigned zerofill NOT NULL,
  `inc_descripcion` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `incidencia_cod` (`incidencia_cod`),
  KEY `incidencia_cod_2` (`incidencia_cod`),
  KEY `incidencia_cod_3` (`incidencia_cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `incidencia_cod`, `inc_descripcion`, `created_at`, `updated_at`) VALUES
(1, 01, 'RETARDO DE 11 A 29 MINUTOS', '0000-00-00 00:00:00', '2015-10-03 19:22:32'),
(2, 55, 'LICENCIA MEDICA / INCAPACIDAD', '0000-00-00 00:00:00', '2015-10-03 07:18:46'),
(3, 41, 'LICENCIA CON GOCE DE SUELDO', '0000-00-00 00:00:00', '2015-10-03 07:19:01'),
(4, 47, 'LICENCIA POR CUIDADOS MATERNOS / PATERNOS', '0000-00-00 00:00:00', '2015-10-03 07:19:13'),
(5, 54, 'LICENCIA MEDICA POR RIEGOS DE TRABAJO', '2015-09-30 10:36:29', '2015-10-03 07:20:07'),
(7, 18, 'OMISION DE ENTRADA', '2015-09-02 00:00:00', '2015-10-03 07:18:12'),
(8, 10, 'FALTA', '2015-09-30 16:35:27', '2015-10-03 07:17:52'),
(9, 07, 'RETARDO POR CONSULTA MEDICA', '2015-10-01 19:43:03', '2015-10-03 07:17:33'),
(10, 02, 'RETARDO DE 30 A 59 MINUTOS', '2015-10-01 21:39:21', '2015-10-03 07:16:16'),
(15, 19, 'OMISION DE SALIDA', '2015-10-03 00:04:17', '2015-10-03 07:18:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qnas`
--

CREATE TABLE IF NOT EXISTS `qnas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qna_mes` int(2) unsigned zerofill NOT NULL,
  `qna_year` int(4) NOT NULL,
  `qna_descripcion` varchar(40) NOT NULL,
  `activa` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_5` (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`),
  KEY `id_4` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `qnas`
--

INSERT INTO `qnas` (`id`, `qna_mes`, `qna_year`, `qna_descripcion`, `activa`, `created_at`, `updated_at`) VALUES
(5, 09, 2015, '1ERA DE MAYO', 0, '0000-00-00 00:00:00', '2015-10-03 23:45:19'),
(6, 02, 2015, '2DA DE ENERO', 0, '2015-09-29 05:33:07', '2015-10-03 23:51:07'),
(7, 03, 2015, '1ERA DE FEBRERO', 0, '2015-09-29 05:35:07', '2015-10-03 21:36:55'),
(9, 04, 2015, '2DA DE FEBRERO', 0, '2015-09-29 05:49:51', '2015-10-03 21:14:14'),
(10, 05, 2015, '1ERA DE MARZO', 0, '2015-09-29 18:05:00', '2015-10-03 21:18:26'),
(12, 06, 2015, '2DA DE MARZO', 0, '2015-09-30 17:17:54', '2015-10-03 21:35:48'),
(13, 07, 2015, '1ERA DE ABRIL', 0, '2015-10-01 21:33:56', '2015-10-04 06:55:03'),
(14, 08, 2015, '2DA DE ABRIL', 0, '2015-10-02 15:58:40', '2015-10-03 21:38:24'),
(36, 01, 2015, '1ERA DE ENERO', 0, '2015-10-03 00:39:58', '2015-10-03 21:28:17'),
(38, 10, 2015, '2DA DE MAYO', 0, '2015-10-03 14:20:55', '2015-10-03 23:50:10'),
(39, 11, 2015, '1ERA DE JUNIO', 1, '2015-10-03 16:42:09', '2015-10-04 08:04:02'),
(40, 12, 2015, '2DA DE JUNIO', 1, '2015-10-03 16:52:17', '2015-10-04 00:12:08');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `captura_incidencias`
--
ALTER TABLE `captura_incidencias`
  ADD CONSTRAINT `captura_incidencias_ibfk_3` FOREIGN KEY (`qna_id`) REFERENCES `qnas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `captura_incidencias_ibfk_4` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `captura_incidencias_ibfk_5` FOREIGN KEY (`incidencia_id`) REFERENCES `incidencias` (`id`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`adscripcion_id`) REFERENCES `adscripciones` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
