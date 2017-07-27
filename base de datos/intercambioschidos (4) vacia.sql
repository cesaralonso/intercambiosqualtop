-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-12-2016 a las 19:01:01
-- Versión del servidor: 5.5.47-MariaDB-1ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `intercambioschidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `idarticulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `categoria_idcategoria` int(11) DEFAULT NULL,
  `precio_min` float DEFAULT NULL,
  `precio_max` float DEFAULT NULL,
  PRIMARY KEY (`idarticulo`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `nombre`, `categoria_idcategoria`, `precio_min`, `precio_max`) VALUES
(71, 'playeras', NULL, 200, 250),
(72, 'tazas', NULL, 200, 240),
(73, 'X', NULL, 220, 230);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `precio_min` float DEFAULT NULL,
  `precio_max` float DEFAULT NULL,
  `intercambio_idintercambio` int(11) NOT NULL,
  `code` varchar(12) NOT NULL,
  `articulos_max` int(2) DEFAULT NULL,
  PRIMARY KEY (`idequipo`),
  KEY `fk_equipo_intercambio1_idx` (`intercambio_idintercambio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `nombre`, `precio_min`, `precio_max`, `intercambio_idintercambio`, `code`, `articulos_max`) VALUES
(18, 'Intercambio Guadalajara', 200, 250, 11, 'csw', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercambiando`
--

CREATE TABLE IF NOT EXISTS `intercambiando` (
  `idintercambiando` int(11) NOT NULL AUTO_INCREMENT,
  `articulo_idarticulo` int(11) NOT NULL,
  `idusuario_has_equipo_da` int(11) NOT NULL,
  `idusuario_has_equipo_recibe` int(11) NOT NULL,
  PRIMARY KEY (`idintercambiando`) USING BTREE,
  UNIQUE KEY `i0usuarios` (`idusuario_has_equipo_recibe`,`idusuario_has_equipo_da`),
  KEY `fk_intercambiando_articulo1_idx` (`articulo_idarticulo`),
  KEY `fk_intercambiando_usuario_has_equipo1_idx` (`idusuario_has_equipo_da`),
  KEY `fk_intercambiando_usuario_has_equipo2_idx` (`idusuario_has_equipo_recibe`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Volcado de datos para la tabla `intercambiando`
--

INSERT INTO `intercambiando` (`idintercambiando`, `articulo_idarticulo`, `idusuario_has_equipo_da`, `idusuario_has_equipo_recibe`) VALUES
(50, 72, 32, 31),
(51, 73, 31, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercambio`
--

CREATE TABLE IF NOT EXISTS `intercambio` (
  `idintercambio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `fecha_ini` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `estatus` varchar(45) NOT NULL COMMENT 'CREADO\nINICIALIZADO\nPAUSADO\nFINALIZADO\nELIMINADO',
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idintercambio`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `fk_intercambio_usuario1_idx` (`usuario_idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `intercambio`
--

INSERT INTO `intercambio` (`idintercambio`, `nombre`, `fecha_ini`, `fecha_fin`, `estatus`, `usuario_idusuario`) VALUES
(11, 'Qualtop Group 2016', '2016-12-01 00:00:00', '2016-12-16 00:00:00', 'CREADO', 71);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` varchar(45) NOT NULL COMMENT 'LIDER\nMIEMBRO',
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`) VALUES
('LIDER'),
('MIEMBRO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `avatar` varchar(45) DEFAULT NULL,
  `rol_idrol` varchar(45) NOT NULL,
  `estatus` varchar(45) DEFAULT NULL COMMENT 'CREADO\nVALIDADO\nACTIVO\nINACTIVO',
  `participa` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_usuario_rol_idx` (`rol_idrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `email`, `password`, `nombres`, `apellidos`, `avatar`, `rol_idrol`, `estatus`, `participa`) VALUES
(71, 'aide@gmail.com', 'csw', 'Aide', NULL, NULL, 'LIDER', 'CREADO', 1),
(72, 'aagredano@syesoftware.com', '7348711852', 'Carlos Alejandro Agredano Martinez', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(73, 'cesar_alonso_m_g@hotmail.com', '8746713689', 'cesar alonso ', NULL, NULL, 'MIEMBRO', 'CREADO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_articulo`
--

CREATE TABLE IF NOT EXISTS `usuario_has_articulo` (
  `idusuario_has_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_idusuario` int(11) NOT NULL,
  `articulo_idarticulo` int(11) NOT NULL,
  `promedio` float DEFAULT NULL,
  PRIMARY KEY (`idusuario_has_articulo`),
  KEY `fk_usuario_has_articulo_articulo1_idx` (`articulo_idarticulo`),
  KEY `fk_usuario_has_articulo_usuario1_idx` (`usuario_idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `usuario_has_articulo`
--

INSERT INTO `usuario_has_articulo` (`idusuario_has_articulo`, `usuario_idusuario`, `articulo_idarticulo`, `promedio`) VALUES
(50, 72, 71, 5),
(51, 72, 72, 5),
(52, 73, 73, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_equipo`
--

CREATE TABLE IF NOT EXISTS `usuario_has_equipo` (
  `idusuario_has_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_idusuario` int(11) NOT NULL,
  `equipo_idequipo` int(11) NOT NULL,
  `estatus_encuesta` varchar(45) DEFAULT NULL COMMENT 'INICIALIZADA\nFINALIZADA',
  PRIMARY KEY (`idusuario_has_equipo`),
  KEY `fk_usuario_has_equipo_equipo1_idx` (`equipo_idequipo`),
  KEY `fk_usuario_has_equipo_usuario1_idx` (`usuario_idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `usuario_has_equipo`
--

INSERT INTO `usuario_has_equipo` (`idusuario_has_equipo`, `usuario_idusuario`, `equipo_idequipo`, `estatus_encuesta`) VALUES
(31, 72, 18, 'CREADO'),
(32, 73, 18, 'CREADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_like_usuario_articulo`
--

CREATE TABLE IF NOT EXISTS `usuario_like_usuario_articulo` (
  `idusuario_like_usuario_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_idusuario_vota` int(11) NOT NULL,
  `usuario_idusuario_votado` int(11) NOT NULL,
  `articulo_idarticulo` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusuario_like_usuario_articulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `usuario_like_usuario_articulo`
--

INSERT INTO `usuario_like_usuario_articulo` (`idusuario_like_usuario_articulo`, `usuario_idusuario_vota`, `usuario_idusuario_votado`, `articulo_idarticulo`, `created_at`) VALUES
(68, 72, 72, 72, '2016-12-01 18:02:53'),
(69, 72, 73, 73, '2016-12-01 18:02:53'),
(70, 73, 72, 72, '2016-12-01 18:02:56'),
(71, 73, 73, 73, '2016-12-01 18:02:57');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `fk_equipo_intercambio1` FOREIGN KEY (`intercambio_idintercambio`) REFERENCES `intercambio` (`idintercambio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `intercambiando`
--
ALTER TABLE `intercambiando`
  ADD CONSTRAINT `fk_intercambiando_articulo1` FOREIGN KEY (`articulo_idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_intercambiando_usuario_has_equipo1` FOREIGN KEY (`idusuario_has_equipo_da`) REFERENCES `usuario_has_equipo` (`idusuario_has_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_intercambiando_usuario_has_equipo2` FOREIGN KEY (`idusuario_has_equipo_recibe`) REFERENCES `usuario_has_equipo` (`idusuario_has_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `intercambio`
--
ALTER TABLE `intercambio`
  ADD CONSTRAINT `fk_intercambio_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_has_articulo`
--
ALTER TABLE `usuario_has_articulo`
  ADD CONSTRAINT `fk_usuario_has_articulo_articulo1` FOREIGN KEY (`articulo_idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_articulo_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_has_equipo`
--
ALTER TABLE `usuario_has_equipo`
  ADD CONSTRAINT `fk_usuario_has_equipo_equipo1` FOREIGN KEY (`equipo_idequipo`) REFERENCES `equipo` (`idequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_equipo_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
