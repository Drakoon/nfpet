-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2016 a las 16:53:11
-- Versión del servidor: 5.5.19
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistemaveterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cedula_profecional`
--

CREATE TABLE IF NOT EXISTS `cedula_profecional` (
  `id_Cedula` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` int(10) NOT NULL DEFAULT '0',
  `cedula` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_Cedula`),
  KEY `FK_cedula_profecional_user` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_medico`
--

CREATE TABLE IF NOT EXISTS `historial_medico` (
  `id_Historial` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mascota` int(10) unsigned NOT NULL,
  `problema` longtext CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_Consulta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `receta` longtext CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_Historial`),
  KEY `FK_historial_medico_mascotas` (`mascota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE IF NOT EXISTS `mascotas` (
  `id_Mascotas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT '0',
  `edad` int(10) DEFAULT '0',
  `propietario` int(11) NOT NULL DEFAULT '0',
  `tipo_De_Mascota` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  `Ciudad` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_Mascotas`),
  KEY `FK_mascotas_user` (`propietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, '', '', 'Test', 'nGbhMD2I3pNUVhF3oLA9mWRmoK80iyyL', '$2y$13$dFSRmPvQqRzdEfk3AtMSD.ycqT5lSPzXWm.0wsqAG7AC6sxv1s0Aq', NULL, 'test@estudillo.com', 10, 1475283788, 1475283788),
(2, '', '', 'jackllaca', '_wm-HrJghTwcl2C4Zg5p65h7WcrtZ5C7', '$2y$13$vzdn9MBASqSSGGWGqt7G0e/cP5C0DzehJObPWTFmtrL1C7TRmxdAu', NULL, 'fer_llaca_1994@hotmail.com', 10, 1475283818, 1475283818),
(3, '', '', 'Papitas', 'EJ4Vw4sReY-e6Gby7n5U-fUM9dIok4UW', '$2y$13$AJdCIoVIdockdYiV7ycapOt3LKEMhue9HB.sT.V9GVIIvpAGq2RHi', NULL, 'joge@selacome.com', 10, 1475765177, 1475765177);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE IF NOT EXISTS `vacunas` (
  `id_Vacunas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `veterinario` int(10) NOT NULL,
  `mascota` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Vacunas`),
  KEY `FK_vacunas_user` (`veterinario`),
  KEY `FK_vacunas_mascotas` (`mascota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cedula_profecional`
--
ALTER TABLE `cedula_profecional`
  ADD CONSTRAINT `FK_cedula_profecional_user` FOREIGN KEY (`usuario`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  ADD CONSTRAINT `FK_historial_medico_mascotas` FOREIGN KEY (`mascota`) REFERENCES `mascotas` (`id_Mascotas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `FK_mascotas_user` FOREIGN KEY (`propietario`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD CONSTRAINT `FK_vacunas_mascotas` FOREIGN KEY (`mascota`) REFERENCES `mascotas` (`id_Mascotas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_vacunas_user` FOREIGN KEY (`veterinario`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
