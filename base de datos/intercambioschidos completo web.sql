-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-12-2016 a las 03:44:36
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `nombre`, `categoria_idcategoria`, `precio_min`, `precio_max`) VALUES
(71, 'Playeras', NULL, 250, 300),
(72, 'Tazas', NULL, 250, 300),
(73, 'Gorras', NULL, 250, 300),
(77, 'Carteras', NULL, 250, 300),
(78, 'Pashmina', NULL, 250, 300),
(79, 'Tarros para Chela', NULL, 250, 300),
(80, 'Suéter', NULL, 250, 300),
(81, 'Blusas', NULL, 250, 300),
(82, 'Audífonos Diadema', NULL, 250, 300),
(83, 'Cosas Frikis', NULL, 250, 300),
(84, 'algun articulo de pokémon(wobbuffet)', NULL, 250, 300),
(85, 'Audifonos Diadema Bluetooth Manos Libres ', NULL, 250, 300),
(86, 'Funko Pop star wars', NULL, 250, 300),
(87, 'Backpack', NULL, 250, 300),
(88, 'Mascara anti contaminación negra para bici ', NULL, 250, 250),
(90, 'Libro Véndele a la mente, no a la gente de Jü', NULL, 250, 300),
(91, 'Libro Padre Rico, Padre Pobre de Robert Kiyos', NULL, 250, 300),
(92, 'Cartera', NULL, 250, 300),
(93, 'Libro de Paco Ignacio Taibo II (cualquiera)', NULL, 250, 300),
(94, 'algun articulo de Princess Peach o Bowser', NULL, 250, 300),
(95, 'Backpack laptop', NULL, 250, 300),
(96, 'Fragancia de bath & body Works', NULL, 250, 300),
(97, 'pantunflas de hello kitty', NULL, 250, 300),
(100, 'body  de bath & body works', NULL, 250, 300),
(101, 'sudarera color negro', NULL, 250, 300),
(102, 'funko pop minion or tazmania or mickey', NULL, 250, 300),
(103, 'Tarjeta de Regalo Steam o PaysafeCard', NULL, 250, 300),
(104, 'Monedero electronico de Zara', NULL, 250, 300),
(105, 'Ventilador para Laptop Thermaltake', NULL, 250, 300),
(106, 'NFL - Steelers', NULL, 250, 300),
(107, 'Joyeria de Plata', NULL, 250, 300),
(108, 'Bolsa de mano', NULL, 250, 300),
(109, 'Camisa estilo polo (negra o roja)', NULL, 250, 300),
(110, 'Funda para celular (galaxy j7)', NULL, 250, 300),
(111, 'mouse inalambrico capitan america y usb capit', NULL, 250, 300),
(112, 'Gorra NFL (Raiders)', NULL, 250, 300),
(113, 'Pelicula (Deadpool)', NULL, 250, 300),
(114, 'Balon de futbol americano', NULL, 250, 300),
(115, 'Bolsa Negra Mediana ', NULL, 250, 300),
(116, 'Playera negra', NULL, 250, 300),
(118, 'Cartera negra con varios compartimientos', NULL, 250, 300),
(119, 'Termo para café fashion', NULL, 250, 300),
(120, 'bocinas bluetooth', NULL, 250, 300),
(121, 'libro LOS AÑOS DE PEREGRINACION DEL CHICO SIN', NULL, 280, 300),
(122, 'Tarjeta de Regalo Zara', NULL, 250, 300),
(123, 'Tarjeta de regalo Liverpool', NULL, 250, 300),
(124, 'Lonchera', NULL, 250, 300),
(125, 'Thermo Fresón', NULL, 250, 300),
(126, 'Tarro de madera para Cerveza', NULL, 250, 300),
(127, 'Tarro de madera estilo medieval para Cerveza', NULL, 250, 300),
(128, 'Cartera negra o cafe sin estampados ', NULL, 250, 300),
(129, 'Bolsa Blanca, Sin estampados', NULL, 250, 300),
(130, 'Bolsa blanca media, sin estampados ', NULL, 250, 300),
(131, 'Funko pop breaking bad (NO HEISENBERG ESE YA ', NULL, 250, 300),
(132, 'USB', NULL, 250, 300),
(133, 'Pashmina de color rojo larga sin brillos  ', NULL, 250, 300),
(134, 'Cartera de Dama grande con varios compartimen', NULL, 250, 300),
(135, 'sueter negro cuello V talla grande', NULL, 250, 300),
(136, 'Bolsa negra mediana (No estoperoles, No brill', NULL, 250, 300),
(141, 'Botella de WHISKEY JACK DANIEL`S HONEY', NULL, 250, 300),
(143, 'CD Korn - The serenity of suffering', NULL, 250, 300),
(144, 'Camisa deportiva Barcelona o Real Madrid', NULL, 250, 300),
(145, 'Botella tequila Corralejo', NULL, 250, 300),
(146, 'Reproductor de USB para Automovil (transmisió', NULL, 250, 300),
(147, 'Libro Pequeño Cerdo Capitalista de Sofía Mací', NULL, 250, 300),
(148, 'un libro', NULL, 250, 300),
(149, 'Pantunflas de animalito, de preferencia de pu', NULL, 250, 300),
(150, 'Bolsa  negra  mediana sin estampados', NULL, 280, 300),
(151, 'cobija', NULL, 250, 300),
(152, 'orejeras', NULL, 250, 300),
(153, 'Audifonos', NULL, 250, 300),
(154, 'Mouse Inalambrico', NULL, 250, 300),
(155, 'Rompecabezas de 1000 piezas ', NULL, 250, 300),
(156, 'Suéter sin estampados', NULL, 250, 300),
(157, 'licor de almendra frangelico', NULL, 250, 300),
(158, 'Ay muchas cosas... Wuuuuuuuuuuu!', NULL, 250, 300),
(159, 'Libro Artificial Intelligence: A Modern Appro', NULL, 250, 300),
(162, 'Libro de Inteligencia Artificial', NULL, 250, 300),
(167, 'Libro de Robert Kiyosaki (menos "El cuadrante', NULL, 250, 300),
(170, 'Pashminas de un color parejo café, roja o azu', NULL, 250, 300),
(171, 'Funko Pop Minion, Dragon Ball o Tazmania', NULL, 250, 300);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `nombre`, `precio_min`, `precio_max`, `intercambio_idintercambio`, `code`, `articulos_max`) VALUES
(18, 'Intercambio Guadalajara', 200, 250, 11, 'csw', 3),
(19, 'INTERCAMBIO GUADALAJARA', 250, 300, 12, 'QTP-SYE', 3),
(20, 'INTERCAMBIO CDMX', 250, 300, 13, 'THDO', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `intercambio`
--

INSERT INTO `intercambio` (`idintercambio`, `nombre`, `fecha_ini`, `fecha_fin`, `estatus`, `usuario_idusuario`) VALUES
(11, 'Qualtop Group 2016', '2016-12-01 00:00:00', '2016-12-16 00:00:00', 'CREADO', 71),
(12, 'QUALTOP GROUP 2016 GDL', '2016-12-01 00:00:00', '2016-12-16 00:00:00', 'CREADO', 74),
(13, 'INTERCAMBIO QUALTOP GROUP 2016 CDMX', '2016-12-16 00:00:00', '2016-12-27 00:00:00', 'CREADO', 74);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=212 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `email`, `password`, `nombres`, `apellidos`, `avatar`, `rol_idrol`, `estatus`, `participa`) VALUES
(71, 'aide@gmail.com', 'csw', 'Aide', NULL, NULL, 'LIDER', 'CREADO', 1),
(72, 'aagredano_@syesoftware.com', '7348711852', 'Carlos Alejandro Agredano Martinez', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 1),
(73, 'cesar_alonso_m_g@hotmail.com', '8746713689', 'cesar alonso ', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(74, 'aide.yunis@qualtop.com', 'yunisaide', 'AIDE CAROLINA YUNIS DÍAZ', NULL, NULL, 'LIDER', 'CREADO', 1),
(75, 'racosta@syesoftware.com', '1445740511', 'ACOSTA ASCENCIO RA ALBERTO', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(76, 'aagredano@syesoftware.com', '', 'AGREDANO MARTINEZ CARLOS ALEJANDRO', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 1),
(77, 'aaguiar@syesoftware.com', '5921746979', 'AGUIAR MOREIRA ANDREA LORENA', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(78, 'cmaguilera@syesoftware', '8711745187', 'AGUILERA SALAZAR CRUZ MARTIN', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(79, 'david-alv@hotmail.com', '9176745744', 'ALVAREZ DAVID', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(80, 'falvarez@qualtop.com', '6932743775', 'ALVAREZ LOMELI FELIPE DONALDO', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(81, 'aalvarez@syesoftware.com', '8975741838', 'ALVAREZ ZAVALA ANA LUISA', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(82, 'gamaro@qualtop.com', '7673743502', 'AMARO VALDEZ GILBERTO', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(83, 'kanguis@syesoftware.com', '3325749042', 'ANGUIS MURILLO KARLA VERONICA', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(84, 'raponte@syesoftware.com', '2190748941', 'APONTE MELCHOR RAUL IGNACIO ', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(85, 'marreola@qualtop.com', '1607741616', 'ARREOLA GONZALEZ MAURICIO RODOLFO', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(86, 'ebarba@syesoftware.com', '6731744823', 'BARBA PEREZ EDGAR GERMAN', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(87, 'dielmagluis.mb@gmail.com', '0567748832', 'BARCENA SANCHEZ LUIS MAGDIEL', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 1),
(88, 'mbarcena@qualtop.com', '7035743843', 'BARCENA SANCHEZ MIRIAM', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(89, 'berenice.barocio@qualtop.com', '8335744923', 'BAROCIO RAMÍREZ BERENICE ', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(90, 'rbonilla@qualtop.com', '2148743940', 'BONILLA GARAY ROSA MARIA', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(91, 'oborden@syesoftware.com', '8462747008', 'BORDEN ANGLES OSCAR', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(92, 'fcamacho@qualtop.com', '0475741886', 'CAMACHO TRUJILLO FATIMA GUADALUPE ', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 1),
(93, 'gabrielcarmona@masmedsolucion.com', '3626749828', 'CARMONA GABRIEL', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(94, 'guillermo59@hotmail.com', '9562746199', 'CARMONA GUILLERMO', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(95, 'jcarrillo@syesoftware.com', '9006748615', 'CARRILLO MORAN JOSE RAMON', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(96, 'german.castaneda@yahoo.com.mx', '8640744193', 'CASTAÑEDA GERMAN', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(97, 'icastro@syesoftware.com', '0801741999', 'CASTRO SÁNCHEZ ÍCARO RAMSES ', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(98, 'jchinchillas@syesoftware.com', '0148748721', 'CHINCHILLAS ESCARREGA JESUS FRANCISCO ', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(99, 'acontreras@qualtop.com', '0050742687', 'CONTRERAS CAMACHO DAN ALAN', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(100, 'hdelatorre@qualtop.com', '9052741288', 'DE LA TORRE ACEVEDO HARIM', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(101, 'efabian@syesoftware.com', '9264749594', 'FABIAN GARCIA ERICK ALFONSO', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(102, 'jflores@qualtop.com', '', 'FLORES DE LA CRUZ JOSÉ', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 1),
(103, 'eflores@syesoftware.com', '0125745533', 'FLORES GAYTAN ERNESTO', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(104, 'jgonzalo@syesoftware.com', '2154743117', 'FUENTES JESUS GONZALO', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(105, 'igallegos@redobra.com.mx', '4096747614', 'GALLEGOS HERNANDEZ ISRAEL', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(106, 'joel.garcia@qualtop.com', '6832745201', 'GARCÍA GARCÍA JOEL ALBERTO ', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(107, 'agarcia@qualtop.com', '6615745169', 'GARCÍA TRUJILLO ARMANDO', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(108, 'lgaribaldo@syesoftware.com', '3382744495', 'GARIBALDO TORRES NORMA LILIANA ', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(109, 'pgaytan@syesoftware.com', '7450748685', 'GAYTAN VALADEZ PEDRO HORACIO ', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(110, 'lgomezs@syesoftware.com', '2433740448', 'GOMEZ SANTOSCOY LEOPOLDO', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(111, 'mgonzalez@syesoftware.com', '5198749307', 'GONZALEZ ACEVEDO MARIA ESTELA', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(112, 'amgonzalez@syesoftware.com', '7620745433', 'GONZALEZ CASTAÑEDA AGAR MARGARITA	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(113, 'rgonzalez@syesoftware.com', '9166746840', 'GONZALEZ GOMEZ ROSALINDA	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(114, 'jagonzalezg@syesoftware.com', '0080747185', 'GONZALEZ GORDILLO JOSE ALBERTO	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(115, 'ggonzalez@qualtop.com', '3366746193', 'GONZALEZ RAMOS ANA GABRIELA	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(116, 'legracia@syesoftware.com', '', 'GRACIA ORTEGA LUZ ESTHELA ', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 0),
(117, 'sistemas@qualtop.com', '9078748730', 'GUTIERREZ CHAVIRA MARIO HERNAN', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(118, 'dgutierrez@qualtop.com', '4885745131', 'GUTIERREZ DOMINGO	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(119, 'agutierrez@syesoftware.com', '6994748355', 'GUTIERREZ GUTIERREZ MIGUEL ALEJANDRO', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 1),
(120, 'bgutierrez@syesoftware.com', '1452740830', 'GUTIERREZ PRADO LEONARDO	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(122, 'ghernandez@qualtop.com', '4953749611', 'HERNANDEZ CARRILLO MARIA GUADALUPE	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(123, 'jaherrera@syesoftware.com', '6038744304', 'HERRERA TRINIDAD JUAN ARTURO	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(124, 'ehuerta@syesoftware.com', '5993744034', 'HUERTA HERNANDEZ MARIA ELENA	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(125, 'adrie.jmz@gmail.com', '3971747029', 'JIMENEZ ADRIANA	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(126, 'fleanos@syesoftware.com', '5396746408', 'LEAÑOS HUERTA FERNANDO JESSE	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(127, 'clicea@syesoftware.com', '3390748957', 'LICEA CONTRERAS CESAR EDUARDO	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(128, 'rlopezg@qualtop.com', '8693747725', 'LOPEZ GUZMAN RAYMUNDO	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(129, 'dlopezm@syesoftware.com', '8852749290', 'LOPEZ MONTEON DANIEL	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(130, 'jmacedo@syesoftware.com', '1234567890', 'MACEDO TEJEDA JESUS	', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 0),
(131, 'cmagana@syesoftware.com', '2371742921', 'MAGAÑA GAVILANES CESAR ALONSO	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(132, 'vmarquez@qualtop.com', '3194744507', 'MARQUEZ VARGAS VERONICA	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(133, 'brauliomtz29@gmail.com', '2434740104', 'MARTINEZ BRAULIO	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(134, 'imartinez@qualtop.com', '6217748224', 'MARTINEZ DIAZ OSCAR IGNACIO	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(136, 'ldmartinez@syesoftware.com', '7677747444', 'MARTÍNEZ MARTÍNEZ LUIS DANIEL 	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(137, 'emartinez@syesoftware.com', '6020747609', 'MARTINEZ MENDOZA MARIA ELENA	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(138, 'amayon@syesoftware.com', '8946744209', 'MAYON VILLALOBOS ARMANDO 	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(139, 'amelchor@syesoftware.com', '1009745936', 'MELCHOR CENTENO ABRAHAM', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 0),
(140, 'jmelendez@syesoftware.com', '2861741678', 'MELENDEZ DIAZ JUAN CARLOS', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 0),
(141, 'mramos@qualtop.com', '0270748163', 'MÉNDEZ RAMOS MAYTE	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(142, 'fmero@syesoftware.com', '3800746312', 'MERO RAMIREZ FABIOLA	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(143, 'rmorales@qualtop.com', '2582749295', 'MORALES VILLA RAFAEL	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(144, 'jgmoreno@syesoftware.com', '1436746265', 'MORENO DOLORES JOSE GUILLERMO	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(145, 'knoguez@syesoftware.com', '9952743473', 'NOGUEZ GARCIA KARLA VERONICA	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(146, 'nruy@syesoftware.com', '3556741162', 'NORMA RUY SANCHEZ VALENZUELA	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(147, 'forozco@syesoftware.com', '1078742135', 'OROZCO RAMIREZ FRANCISCO JAVIER	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(148, 'gortega@redobra.com.mx', '8152744846', 'ORTEGA GERARDO	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(149, 'sortiz@qualtop.com', '1607742129', 'ORTIZ SALDIVAR SUSANA GUADALUPE	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(150, 'posorio@syesoftware.com', '0368741051', 'OSORIO RODRIGUEZ PAULINA	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(151, 'jperales@syesoftware.com', '6852742969', 'PERALES RIOS JORGE	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(152, 'mpimentel@syesoftware.com', '1941748307', 'PIMENTEL BECERRA MIGUEL ANGEL	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(153, 'lpolikevics@qualtop.com', '2326744020', 'POLIKEVICS VILLASEÑOR LILIANA 	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(154, 'rpulido@qualtop.com', '4228746419', 'PULIDO MARTINEZ RENE	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(155, 'dramirezarana@gmail.com', '4138749848', 'RAMIREZ DAVID	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(156, 'tramirez@syesoftware.com', '3303743053', 'RAMIREZ URIBE TERESITA	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(157, 'hreyes@syesoftware.com', '0405742204', 'REYES MENDEZ HERIBERTO IVAN	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(158, 'greynaga@qualtop.com', '7743747252', 'REYNAGA VARGAS GABRIELA 	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(159, 'ireynoso@qualtop.com', '1897744017', 'REYNOSO CRUZ  IXCHEL	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(160, 'jfrodriguez@syesoftware.com', '7941740402', 'RODRIGUEZ DOMINGUEZ JESIAS FRANCISCO', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(161, 'trodriguez@qualtop.com', '9862745559', 'RODRIGUEZ GUTIERREZ TAMARA 	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(162, 'lrodriguez@syesoftware.com', '8878743604', 'RODRIGUEZ PEREZ LUIS OCTAVIO	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(163, 'krojas@syesoftware.com', '2612743798', 'ROJAS SALAS KALY MANUEL	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(164, 'iromero@syesoftware.com', '7257749862', 'ROMERO TORRES IAN ALBERTO	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(165, 'druiz@syesoftware.com', '2668748040', 'RUIZ CONTRERAS DAISY ARELY	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(166, 'jruizg@syesoftware.com', '0878743888', 'RUIZ GOMEZ JUAN CARLOS	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(167, 'snavarro@syesoftware.com', '7855749307', 'SALVADOR NAVARRO TZINTZUN	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(168, 'gsanchez@syesoftware.com', '6920742123', 'SANCHEZ DE TAGLE GARCIA CESAR 	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(169, 'asanchez@qualtop.com', '7921749424', 'SANCHEZ PLASCENCIA MARIA ANGELICA	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(170, 'rsanchez@syesoftware.com', '2522741992', 'SÁNCHEZ VAZQUEZ RAMÓN DE JESUS	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(171, 'csantos@syesoftware.com', '3704741839', 'SANTOS GARCÍA CHRISTIAN 	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(172, 'fsierra@qualtop.com', '8441743607', 'SIERRA GRACIA FELIPE DE JESUS	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(173, 'jsilva@syesoftware.com', '7200741110', 'SILVA FIGUEROA JONATHAN 	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(174, 'asosa@qualtop.com', '6232742416', 'SOSA QUEZADA ARIANA NAYELI	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(175, 'rtoledo@qualtop.com', '9281743295', 'TOLEDO ESPINOZA RODRIGO	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(176, 'mtorres@syesoftware.com', '6610746341', 'TORRES GUTIERREZ MARIO ABRAHAM	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(177, 'lvaldez@qualtop.com', '4587742232', 'VALDEZ FELIX LILIANA ELIZABETH	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(178, 'rvalencia@syesoftware.com', '0637749342', 'VALENCIA GONZALEZ RICARDO IVAN	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(179, 'rvalle@qualtop.com', '3526747299', 'VALLE HERNANDEZ LAURA ROCIO	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(180, 'mvazquez@syesoftware.com', '4896748044', 'VAZQUEZ GUERRERO MARCO ANTONIO', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 0),
(181, 'jvega@syesoftware.com', '5976740951', 'VEGA DURAN JONATHAN JAVIER	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(182, 'jvelasco@syesoftware.com', '7255740832', 'VELASCO ZARAGOZA JOSÉ CARLOS	 ', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(183, 'lvilla@qualtop.com', '2658743876', 'VILLA NUÑO REYNA LIZETH	', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(184, 'rzaragoza@syesoftware.com', '8509740129', 'ZARAGOZA MEDINA ROCIO JOSEFINA	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(185, 'gzavala@syesoftware.com', '6416744685', 'ZAVALA GONZALEZ GLORIA	', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(186, 'rzuniga@syesoftware.com', '', 'ZUÑIGA DURÁN RAYMUNDO', NULL, NULL, 'MIEMBRO', 'MODIFICADO', 0),
(187, 'aide.yunis@gmail.com', '4805748467', 'YUNIS DIAZ AIDE CAROLINA ', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(188, 'cesar@x.com', '123', 'cesar', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(189, 'admin@bihaiv.com', '9592710991', 'Juan carlos garcía mendez', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(190, 'x@xxxxxxxxxx.com', '8510717133', 'x', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(191, 'x@y.com', '4500719186', 'xx', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(192, 'lnhaux@qualtop.com', '0929745026', 'LEONARDO N´HAUX', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(193, 'ajatuff@syesoftware.com', '3831740048', 'ARIEL JATUFF', NULL, NULL, 'MIEMBRO', 'CREADO', 0),
(194, 'gtamayo@qualtop.com', '3077747168', 'MARIA GABRIELA TAMAYO ANDRADE', NULL, NULL, 'MIEMBRO', 'CREADO', 1),
(209, 'cesar@gmail.com', '84f742a5a84aea478bf0689cd02cbe706ff1c9fb', 'Gabriela Tamayo', NULL, NULL, 'LIDER', 'CREADO', 0),
(211, 'gabriela.tamayo@hotmail.com', 'gabrielathdo', 'Gabriela Tamayo', NULL, NULL, 'LIDER', 'CREADO', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=185 ;

--
-- Volcado de datos para la tabla `usuario_has_articulo`
--

INSERT INTO `usuario_has_articulo` (`idusuario_has_articulo`, `usuario_idusuario`, `articulo_idarticulo`, `promedio`) VALUES
(50, 72, 71, 5),
(51, 72, 72, 5),
(52, 73, 73, 5),
(65, 163, 83, 5),
(67, 111, 86, 5),
(68, 153, 86, 5),
(69, 153, 72, 5),
(74, 170, 90, 5),
(75, 107, 91, 5),
(76, 170, 85, 5),
(79, 131, 92, 5),
(80, 163, 84, 5),
(81, 170, 93, 5),
(82, 163, 94, 5),
(83, 97, 85, 5),
(84, 97, 95, 5),
(88, 161, 97, 5),
(89, 161, 100, 5),
(90, 161, 101, 5),
(92, 173, 103, 5),
(93, 141, 104, 5),
(94, 173, 105, 5),
(95, 154, 73, 5),
(96, 154, 106, 5),
(97, 154, 104, 5),
(98, 142, 77, 5),
(99, 142, 107, 5),
(100, 142, 108, 5),
(101, 167, 109, 5),
(103, 118, 111, 5),
(104, 167, 112, 5),
(105, 167, 114, 5),
(115, 90, 104, 5),
(116, 112, 85, 5),
(117, 112, 120, 5),
(118, 112, 104, 5),
(119, 111, 121, 5),
(120, 137, 122, 5),
(121, 137, 123, 5),
(122, 111, 124, 5),
(123, 129, 88, 5),
(124, 138, 125, 5),
(125, 138, 105, 5),
(130, 129, 82, 5),
(131, 138, 127, 5),
(132, 88, 107, 5),
(136, 136, 128, 5),
(139, 92, 130, 5),
(140, 90, 107, 5),
(141, 136, 131, 5),
(143, 92, 133, 5),
(144, 92, 134, 5),
(145, 136, 135, 5),
(146, 179, 136, 5),
(148, 124, 141, 5),
(150, 179, 118, 5),
(151, 131, 143, 5),
(152, 114, 144, 5),
(153, 114, 145, 5),
(154, 131, 146, 5),
(155, 107, 147, 5),
(156, 192, 148, 5),
(157, 124, 85, 5),
(158, 124, 149, 5),
(159, 108, 150, 5),
(160, 108, 118, 5),
(164, 126, 153, 5),
(165, 126, 154, 5),
(166, 177, 155, 5),
(167, 177, 156, 5),
(168, 88, 157, 5),
(169, 185, 119, 5),
(170, 185, 124, 5),
(171, 185, 158, 5),
(173, 87, 123, 5),
(175, 173, 162, 5),
(176, 87, 109, 5),
(177, 87, 141, 5),
(178, 119, 167, 5),
(179, 187, 150, 5),
(182, 187, 95, 5),
(183, 187, 170, 5),
(184, 97, 171, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=152 ;

--
-- Volcado de datos para la tabla `usuario_has_equipo`
--

INSERT INTO `usuario_has_equipo` (`idusuario_has_equipo`, `usuario_idusuario`, `equipo_idequipo`, `estatus_encuesta`) VALUES
(31, 72, 18, 'CREADO'),
(32, 73, 18, 'CREADO'),
(33, 75, 19, 'CREADO'),
(34, 76, 19, 'CREADO'),
(35, 77, 19, 'CREADO'),
(36, 78, 19, 'CREADO'),
(37, 79, 19, 'CREADO'),
(38, 80, 19, 'CREADO'),
(39, 81, 19, 'CREADO'),
(40, 82, 19, 'CREADO'),
(41, 83, 19, 'CREADO'),
(42, 84, 19, 'CREADO'),
(43, 85, 19, 'CREADO'),
(44, 86, 19, 'CREADO'),
(45, 87, 19, 'CREADO'),
(46, 88, 19, 'CREADO'),
(47, 89, 19, 'CREADO'),
(48, 90, 19, 'CREADO'),
(49, 91, 19, 'CREADO'),
(50, 92, 19, 'CREADO'),
(51, 93, 19, 'CREADO'),
(52, 94, 19, 'CREADO'),
(53, 95, 19, 'CREADO'),
(54, 96, 19, 'CREADO'),
(55, 97, 19, 'CREADO'),
(56, 98, 19, 'CREADO'),
(57, 99, 19, 'CREADO'),
(58, 100, 19, 'CREADO'),
(59, 101, 19, 'CREADO'),
(60, 102, 19, 'CREADO'),
(61, 103, 19, 'CREADO'),
(62, 104, 19, 'CREADO'),
(63, 105, 19, 'CREADO'),
(64, 106, 19, 'CREADO'),
(65, 107, 19, 'CREADO'),
(66, 108, 19, 'CREADO'),
(67, 109, 19, 'CREADO'),
(68, 110, 19, 'CREADO'),
(69, 111, 19, 'CREADO'),
(70, 112, 19, 'CREADO'),
(71, 113, 19, 'CREADO'),
(72, 114, 19, 'CREADO'),
(73, 115, 19, 'CREADO'),
(74, 116, 19, 'CREADO'),
(75, 117, 19, 'CREADO'),
(76, 118, 19, 'CREADO'),
(77, 119, 19, 'CREADO'),
(78, 120, 19, 'CREADO'),
(79, 122, 19, 'CREADO'),
(80, 123, 19, 'CREADO'),
(81, 124, 19, 'CREADO'),
(82, 125, 19, 'CREADO'),
(83, 126, 19, 'CREADO'),
(84, 127, 19, 'CREADO'),
(85, 128, 19, 'CREADO'),
(86, 129, 19, 'CREADO'),
(87, 130, 19, 'CREADO'),
(88, 131, 19, 'CREADO'),
(89, 132, 19, 'CREADO'),
(90, 133, 19, 'CREADO'),
(91, 134, 19, 'CREADO'),
(93, 136, 19, 'CREADO'),
(94, 137, 19, 'CREADO'),
(95, 138, 19, 'CREADO'),
(96, 139, 19, 'CREADO'),
(97, 140, 19, 'CREADO'),
(98, 141, 19, 'CREADO'),
(99, 142, 19, 'CREADO'),
(100, 143, 19, 'CREADO'),
(101, 144, 19, 'CREADO'),
(102, 145, 19, 'CREADO'),
(103, 146, 19, 'CREADO'),
(104, 147, 19, 'CREADO'),
(105, 148, 19, 'CREADO'),
(106, 149, 19, 'CREADO'),
(107, 150, 19, 'CREADO'),
(108, 151, 19, 'CREADO'),
(109, 152, 19, 'CREADO'),
(110, 153, 19, 'CREADO'),
(111, 154, 19, 'CREADO'),
(112, 155, 19, 'CREADO'),
(113, 156, 19, 'CREADO'),
(114, 157, 19, 'CREADO'),
(115, 158, 19, 'CREADO'),
(116, 159, 19, 'CREADO'),
(117, 160, 19, 'CREADO'),
(118, 161, 19, 'CREADO'),
(119, 162, 19, 'CREADO'),
(120, 163, 19, 'CREADO'),
(121, 164, 19, 'CREADO'),
(122, 165, 19, 'CREADO'),
(123, 166, 19, 'CREADO'),
(124, 167, 19, 'CREADO'),
(125, 168, 19, 'CREADO'),
(126, 169, 19, 'CREADO'),
(127, 170, 19, 'CREADO'),
(128, 171, 19, 'CREADO'),
(129, 172, 19, 'CREADO'),
(130, 173, 19, 'CREADO'),
(131, 174, 19, 'CREADO'),
(132, 175, 19, 'CREADO'),
(133, 176, 19, 'CREADO'),
(134, 177, 19, 'CREADO'),
(135, 178, 19, 'CREADO'),
(136, 179, 19, 'CREADO'),
(137, 180, 19, 'CREADO'),
(138, 181, 19, 'CREADO'),
(139, 182, 19, 'CREADO'),
(140, 183, 19, 'CREADO'),
(141, 184, 19, 'CREADO'),
(142, 185, 19, 'CREADO'),
(143, 186, 19, 'CREADO'),
(144, 187, 19, 'CREADO'),
(145, 189, 18, 'CREADO'),
(146, 190, 18, 'CREADO'),
(147, 191, 18, 'CREADO'),
(148, 192, 19, 'CREADO'),
(149, 193, 19, 'CREADO'),
(150, 194, 19, 'CREADO');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=155 ;

--
-- Volcado de datos para la tabla `usuario_like_usuario_articulo`
--

INSERT INTO `usuario_like_usuario_articulo` (`idusuario_like_usuario_articulo`, `usuario_idusuario_vota`, `usuario_idusuario_votado`, `articulo_idarticulo`, `created_at`) VALUES
(68, 72, 72, 72, '2016-12-01 18:02:53'),
(69, 72, 73, 73, '2016-12-01 18:02:53'),
(70, 73, 72, 72, '2016-12-01 18:02:56'),
(71, 73, 73, 73, '2016-12-01 18:02:57'),
(77, 170, 153, 86, '2016-12-01 23:34:12'),
(78, 170, 187, 78, '2016-12-01 23:34:13'),
(80, 131, 161, 97, '2016-12-02 16:48:22'),
(81, 131, 163, 83, '2016-12-02 16:48:22'),
(82, 131, 167, 109, '2016-12-02 16:48:22'),
(83, 131, 170, 90, '2016-12-02 16:48:22'),
(84, 131, 173, 103, '2016-12-02 16:48:23'),
(85, 131, 179, 115, '2016-12-02 16:48:23'),
(86, 131, 187, 80, '2016-12-02 16:48:23'),
(87, 138, 90, 119, '2016-12-02 18:04:52'),
(88, 138, 97, 95, '2016-12-02 18:04:52'),
(89, 138, 111, 124, '2016-12-02 18:04:52'),
(90, 138, 112, 85, '2016-12-02 18:04:52'),
(91, 138, 129, 88, '2016-12-02 18:04:52'),
(92, 138, 131, 92, '2016-12-02 18:04:52'),
(93, 138, 137, 122, '2016-12-02 18:04:52'),
(94, 138, 138, 127, '2016-12-02 18:04:52'),
(95, 138, 142, 107, '2016-12-02 18:04:52'),
(96, 138, 153, 72, '2016-12-02 18:04:52'),
(97, 138, 154, 106, '2016-12-02 18:04:53'),
(98, 138, 161, 97, '2016-12-02 18:04:53'),
(99, 138, 163, 83, '2016-12-02 18:04:53'),
(100, 138, 167, 112, '2016-12-02 18:04:53'),
(101, 138, 170, 90, '2016-12-02 18:04:53'),
(102, 138, 173, 105, '2016-12-02 18:04:53'),
(103, 138, 179, 115, '2016-12-02 18:04:53'),
(104, 138, 187, 80, '2016-12-02 18:04:53'),
(105, 131, 131, 143, '2016-12-02 18:33:32'),
(107, 170, 97, 102, '2016-12-02 22:20:40'),
(108, 170, 107, 147, '2016-12-02 22:20:40'),
(109, 170, 108, 118, '2016-12-02 22:20:40'),
(110, 170, 111, 124, '2016-12-02 22:20:40'),
(111, 170, 112, 120, '2016-12-02 22:20:40'),
(112, 170, 114, 145, '2016-12-02 22:20:40'),
(113, 170, 124, 141, '2016-12-02 22:20:41'),
(114, 170, 126, 153, '2016-12-02 22:20:41'),
(115, 170, 192, 148, '2016-12-02 22:20:41'),
(116, 170, 129, 88, '2016-12-02 22:20:41'),
(117, 170, 131, 143, '2016-12-02 22:20:41'),
(118, 170, 138, 125, '2016-12-02 22:20:41'),
(119, 170, 163, 83, '2016-12-02 22:20:41'),
(120, 170, 185, 158, '2016-12-02 22:20:41'),
(121, 111, 185, 158, '2016-12-02 23:00:51'),
(122, 97, 87, 141, '2016-12-02 23:43:10'),
(123, 97, 88, 107, '2016-12-02 23:43:10'),
(124, 97, 90, 104, '2016-12-02 23:43:10'),
(125, 97, 92, 134, '2016-12-02 23:43:10'),
(126, 97, 97, 85, '2016-12-02 23:43:11'),
(127, 97, 107, 91, '2016-12-02 23:43:11'),
(128, 97, 108, 118, '2016-12-02 23:43:11'),
(129, 97, 111, 86, '2016-12-02 23:43:11'),
(130, 97, 112, 104, '2016-12-02 23:43:11'),
(131, 97, 114, 145, '2016-12-02 23:43:11'),
(132, 97, 118, 111, '2016-12-02 23:43:11'),
(133, 97, 119, 167, '2016-12-02 23:43:11'),
(134, 97, 124, 149, '2016-12-02 23:43:11'),
(135, 97, 126, 153, '2016-12-02 23:43:12'),
(136, 97, 192, 148, '2016-12-02 23:43:12'),
(137, 97, 129, 88, '2016-12-02 23:43:12'),
(138, 97, 131, 143, '2016-12-02 23:43:12'),
(139, 97, 136, 131, '2016-12-02 23:43:12'),
(140, 97, 137, 123, '2016-12-02 23:43:12'),
(141, 97, 138, 125, '2016-12-02 23:43:12'),
(142, 97, 141, 104, '2016-12-02 23:43:12'),
(143, 97, 142, 77, '2016-12-02 23:43:12'),
(144, 97, 153, 86, '2016-12-02 23:43:13'),
(145, 97, 154, 104, '2016-12-02 23:43:13'),
(146, 97, 161, 97, '2016-12-02 23:43:13'),
(147, 97, 163, 84, '2016-12-02 23:43:13'),
(148, 97, 167, 112, '2016-12-02 23:43:13'),
(149, 97, 170, 93, '2016-12-02 23:43:13'),
(150, 97, 173, 105, '2016-12-02 23:43:13'),
(151, 97, 177, 155, '2016-12-02 23:43:13'),
(152, 97, 179, 136, '2016-12-02 23:43:13'),
(153, 97, 187, 95, '2016-12-02 23:43:13'),
(154, 97, 185, 158, '2016-12-02 23:43:14');

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
