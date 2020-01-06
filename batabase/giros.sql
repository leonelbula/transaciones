-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-01-2020 a las 23:46:26
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `giros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

DROP TABLE IF EXISTS `bancos`;
CREATE TABLE IF NOT EXISTS `bancos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `nombre`, `tipo`) VALUES
(3, 'banco 1', 1),
(4, 'banco 2', 1),
(5, 'banco 3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_bancario`
--

DROP TABLE IF EXISTS `datos_bancario`;
CREATE TABLE IF NOT EXISTS `datos_bancario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `num_cuenta` int(11) NOT NULL,
  `titular` text COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cuenta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_banco` (`id_banco`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos_bancario`
--

INSERT INTO `datos_bancario` (`id`, `id_usuario`, `id_banco`, `num_cuenta`, `titular`, `cedula`, `tipo_cuenta`) VALUES
(1, 1, 4, 7845454, 'carlos peres', '454545', 'CUENTA DE AHORROS'),
(2, 1, 3, 455651124, 'pedros torres', '305458765', 'CUENTA DE AHORROS'),
(3, 1, 3, 455651124, 'pedros torres', '305458765', 'CUENTA DE AHORROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_empresa`
--

DROP TABLE IF EXISTS `datos_empresa`;
CREATE TABLE IF NOT EXISTS `datos_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_persona`
--

DROP TABLE IF EXISTS `datos_persona`;
CREATE TABLE IF NOT EXISTS `datos_persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nit` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `direcion` text COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` text COLLATE utf8_spanish_ci NOT NULL,
  `departamento` text COLLATE utf8_spanish_ci NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

DROP TABLE IF EXISTS `envios`;
CREATE TABLE IF NOT EXISTS `envios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_datosbancarios` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `valor` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `anexo_usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `anexo` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_datosbancarios` (`id_datosbancarios`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`id`, `id_usuario`, `id_datosbancarios`, `fecha`, `valor`, `estado`, `anexo_usuario`, `anexo`) VALUES
(1, 1, 1, '2020-01-06', 100000, 2, 'NULL', 'NULL'),
(2, 1, 1, '2020-01-06', 100000, 2, 'NULL', 'NULL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cuenta`
--

DROP TABLE IF EXISTS `tipo_cuenta`;
CREATE TABLE IF NOT EXISTS `tipo_cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_cuenta`
--

INSERT INTO `tipo_cuenta` (`id`, `nombre`) VALUES
(1, 'CUENTA DE AHORROS'),
(2, 'CUENTA CORRIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones_fallidad`
--

DROP TABLE IF EXISTS `transacciones_fallidad`;
CREATE TABLE IF NOT EXISTS `transacciones_fallidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `anexo` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `estado`) VALUES
(1, 'leonelbula@gmail.com', '$2y$04$xjnDLNprz/Gy83mw9TEbwuNX6.Y.rYtwCd/7K82l66j.Jr15u3xEW', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_bancario`
--
ALTER TABLE `datos_bancario`
  ADD CONSTRAINT `datos_bancario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `datos_bancario_ibfk_2` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`);

--
-- Filtros para la tabla `datos_persona`
--
ALTER TABLE `datos_persona`
  ADD CONSTRAINT `datos_persona_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`id_datosbancarios`) REFERENCES `datos_bancario` (`id`);

--
-- Filtros para la tabla `transacciones_fallidad`
--
ALTER TABLE `transacciones_fallidad`
  ADD CONSTRAINT `transacciones_fallidad_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
