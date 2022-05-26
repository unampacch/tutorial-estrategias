-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mariadb:3306
-- Tiempo de generación: 19-05-2022 a las 21:01:58
-- Versión del servidor: 10.5.5-MariaDB-1:10.5.5+maria~focal
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tea`
--
CREATE DATABASE IF NOT EXISTS `tea` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tea`;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `alumnos_estadisticas`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `alumnos_estadisticas`;
CREATE TABLE IF NOT EXISTS `alumnos_estadisticas` (
`usuario` varchar(100)
,`plantel` smallint(5) unsigned
,`turno` tinyint(4)
,`generacion` smallint(4)
,`genero` enum('M','H')
,`grupo` varchar(10)
,`bloque_1` decimal(5,2)
,`bloque_2` decimal(5,2)
,`bloque_3` decimal(5,2)
,`bloque_4` decimal(5,2)
,`avance_global` decimal(8,2)
,`activo` float(9,3)
,`reflexivo` float(9,3)
,`teorico` float(9,3)
,`pragmatico` float(9,3)
,`b1_03_p1` tinyint(2)
,`b1_03_p2` tinyint(2)
,`b1_03_p3` tinyint(2)
,`b2_01_p1` tinyint(2)
,`b2_01_p2` tinyint(2)
,`b2_04_p1` tinyint(2)
,`b2_04_p2` tinyint(2)
,`b2_06_1_p1` tinyint(2)
,`b2_06_1_p2` tinyint(2)
,`b2_06_1_p3` varchar(100)
,`b2_06_2_p1` int(11)
,`b2_06_2_p2` varchar(250)
,`b2_06_2_p3` varchar(250)
,`b2_06_3_p1` int(11)
,`b2_06_3_p2` int(11)
,`b2_06_3_p3` int(11)
,`b2_06_3_p4` int(11)
,`b2_06_3_p5` int(11)
,`b2_06_3_p6` tinyint(2)
,`b2_06_3_p7` tinyint(2)
,`b2_06_3_p8` tinyint(2)
,`b2_06_3_p9` tinyint(2)
,`b2_06_3_p10` tinyint(2)
,`b2_06_3_p11` tinyint(2)
,`b2_06_3_p12` tinyint(2)
,`b2_06_3_p13` tinyint(2)
,`b2_06_3_p14` tinyint(2)
,`b2_06_3_p15` tinyint(2)
,`b2_06_3_p16` tinyint(2)
,`b2_10_p1` tinyint(2)
,`b2_10_p2` tinyint(2)
,`b2_10_p3` tinyint(2)
,`b2_10_p4` tinyint(2)
,`b2_10_p5` tinyint(2)
,`b2_10_p6` tinyint(2)
,`b2_10_p7` tinyint(2)
,`b2_10_p8` tinyint(2)
,`b2_10_p9` tinyint(2)
,`b2_10_p10` tinyint(2)
,`b2_10_p11` tinyint(2)
,`opinion_p1` int(11)
,`opinion_p2` int(11)
,`opinion_p3` int(11)
,`opinion_p4` int(11)
,`opinion_p5` int(11)
,`opinion_p6` int(11)
,`opinion_p7` int(11)
,`opinion_p8` int(11)
,`opinion_p9` int(11)
,`opinion_p10` int(11)
,`opinion_p11` int(11)
,`opinion_p12` int(11)
,`opinion_p13` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance`
--

DROP TABLE IF EXISTS `avance`;
CREATE TABLE IF NOT EXISTS `avance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `ingresos` tinyint(1) DEFAULT 0 COMMENT '0=no ha entrado, 1 o más las veces que ha entrado',
  `b0_00` tinyint(1) DEFAULT 0,
  `b1_00` tinyint(1) DEFAULT 0,
  `b1_01` tinyint(1) DEFAULT 0,
  `b1_02` tinyint(1) DEFAULT 0,
  `b1_03` tinyint(1) DEFAULT 0,
  `b2_00` tinyint(1) DEFAULT 0,
  `b2_01` tinyint(1) DEFAULT 0,
  `b2_02` tinyint(1) DEFAULT 0,
  `b2_03` tinyint(1) DEFAULT 0,
  `b2_04` tinyint(1) DEFAULT 0,
  `b2_05` tinyint(1) DEFAULT 0,
  `b2_06` tinyint(1) DEFAULT 0,
  `b2_07` tinyint(1) DEFAULT 0,
  `b2_08` tinyint(1) DEFAULT 0,
  `b2_09` tinyint(1) DEFAULT 0,
  `b2_10` tinyint(1) DEFAULT 0,
  `b3_00` tinyint(1) DEFAULT 0,
  `b3_01` tinyint(1) DEFAULT 0,
  `b3_02` tinyint(1) DEFAULT 0,
  `b3_03` tinyint(1) DEFAULT 0,
  `b3_04` tinyint(1) DEFAULT 0,
  `b3_05` tinyint(1) DEFAULT 0,
  `b4_00` tinyint(1) DEFAULT 0,
  `b4_01` tinyint(1) DEFAULT 0,
  `b4_02` tinyint(1) DEFAULT 0,
  `b4_03` tinyint(1) DEFAULT 0,
  `b5_00` tinyint(1) DEFAULT 0,
  `bloque_1` decimal(5,2) NOT NULL DEFAULT 0.00,
  `bloque_2` decimal(5,2) NOT NULL DEFAULT 0.00,
  `bloque_3` decimal(5,2) NOT NULL DEFAULT 0.00,
  `bloque_4` decimal(5,2) NOT NULL DEFAULT 0.00,
  `opinion` decimal(5,2) NOT NULL DEFAULT 0.00,
  `creacion` datetime NOT NULL,
  `actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_avance_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para control de los alumnos';

--
-- Truncar tablas antes de insertar `avance`
--

TRUNCATE TABLE `avance`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE IF NOT EXISTS `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) DEFAULT NULL,
  `pagina` varchar(70) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `fechayhora` datetime DEFAULT NULL,
  `modulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bitacora_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `bitacora`
--

TRUNCATE TABLE `bitacora`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_b1_03`
--

DROP TABLE IF EXISTS `cuestionario_b1_03`;
CREATE TABLE IF NOT EXISTS `cuestionario_b1_03` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `p1` tinyint(2) DEFAULT NULL,
  `p2` tinyint(2) DEFAULT NULL,
  `p3` tinyint(2) DEFAULT NULL,
  `creacion` datetime DEFAULT NULL,
  `actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cuestionario_b1_03_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `cuestionario_b1_03`
--

TRUNCATE TABLE `cuestionario_b1_03`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_b2_01`
--

DROP TABLE IF EXISTS `cuestionario_b2_01`;
CREATE TABLE IF NOT EXISTS `cuestionario_b2_01` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `p1` tinyint(2) DEFAULT NULL,
  `p2` tinyint(2) DEFAULT NULL,
  `creacion` datetime DEFAULT NULL,
  `actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cuestionario_b2_01_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='bloque2/aprenderVida';

--
-- Truncar tablas antes de insertar `cuestionario_b2_01`
--

TRUNCATE TABLE `cuestionario_b2_01`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_b2_03`
--

DROP TABLE IF EXISTS `cuestionario_b2_03`;
CREATE TABLE IF NOT EXISTS `cuestionario_b2_03` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) DEFAULT NULL,
  `respuestas_guardadas` int(11) DEFAULT 0,
  `activo` float(9,3) DEFAULT NULL,
  `reflexivo` float(9,3) DEFAULT NULL,
  `teorico` float(9,3) DEFAULT NULL,
  `pragmatico` float(9,3) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p2` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p3` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p4` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p5` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p6` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p7` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p8` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p9` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p10` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p11` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p12` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p13` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p14` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p15` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p16` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p17` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p18` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p19` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p20` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p21` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p22` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p23` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p24` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p25` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p26` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p27` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p28` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p29` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p30` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p31` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p32` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p33` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p34` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p35` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p36` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p37` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p38` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p39` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p40` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p41` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p42` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p43` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p44` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p45` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p46` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p47` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p48` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p49` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p50` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p51` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p52` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p53` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p54` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p55` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p56` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p57` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p58` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p59` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p60` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p61` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p62` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p63` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p64` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p65` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p66` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p67` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p68` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p69` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p70` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p71` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p72` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p73` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p74` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p75` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p76` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p77` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p78` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p79` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `p80` int(11) DEFAULT NULL COMMENT '1=SI, 0=NO',
  `creacion` datetime DEFAULT NULL,
  `actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cuestionario_b2_03_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='aprendizajes alonso';

--
-- Truncar tablas antes de insertar `cuestionario_b2_03`
--

TRUNCATE TABLE `cuestionario_b2_03`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_b2_04`
--

DROP TABLE IF EXISTS `cuestionario_b2_04`;
CREATE TABLE IF NOT EXISTS `cuestionario_b2_04` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) DEFAULT NULL,
  `p1` tinyint(2) DEFAULT NULL,
  `p2` tinyint(2) DEFAULT NULL,
  `creacion` datetime DEFAULT NULL,
  `actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_id_cuestionario_b2_05_1_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `cuestionario_b2_04`
--

TRUNCATE TABLE `cuestionario_b2_04`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_b2_06_1`
--

DROP TABLE IF EXISTS `cuestionario_b2_06_1`;
CREATE TABLE IF NOT EXISTS `cuestionario_b2_06_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) DEFAULT NULL,
  `p1` tinyint(2) DEFAULT NULL COMMENT 'plantel',
  `p2` tinyint(2) DEFAULT NULL COMMENT 'libro',
  `p3` varchar(100) NOT NULL COMMENT 'isbn',
  `creacion` datetime DEFAULT NULL,
  `actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cuestionario_b2_06_1_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `cuestionario_b2_06_1`
--

TRUNCATE TABLE `cuestionario_b2_06_1`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_b2_06_2`
--

DROP TABLE IF EXISTS `cuestionario_b2_06_2`;
CREATE TABLE IF NOT EXISTS `cuestionario_b2_06_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL COMMENT 'area',
  `p2` varchar(250) DEFAULT NULL COMMENT 'libro',
  `p3` varchar(250) DEFAULT NULL COMMENT 'autor',
  `creacion` datetime DEFAULT NULL,
  `actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cuestionario_b2_06_2_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `cuestionario_b2_06_2`
--

TRUNCATE TABLE `cuestionario_b2_06_2`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_b2_06_3`
--

DROP TABLE IF EXISTS `cuestionario_b2_06_3`;
CREATE TABLE IF NOT EXISTS `cuestionario_b2_06_3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL COMMENT 'sitio',
  `p2` int(11) DEFAULT NULL COMMENT 'actualizado',
  `p3` int(11) DEFAULT NULL COMMENT 'confiabilidad',
  `p4` int(11) DEFAULT NULL COMMENT 'calidad del contenido',
  `p5` int(11) DEFAULT NULL COMMENT 'calidad del sitio',
  `p6` tinyint(2) NOT NULL,
  `p7` tinyint(2) NOT NULL,
  `p8` tinyint(2) NOT NULL,
  `p9` tinyint(2) NOT NULL,
  `p10` tinyint(2) NOT NULL,
  `p11` tinyint(2) NOT NULL,
  `p12` tinyint(2) NOT NULL,
  `p13` tinyint(2) NOT NULL,
  `p14` tinyint(2) NOT NULL,
  `p15` tinyint(2) NOT NULL,
  `p16` tinyint(2) NOT NULL,
  `creacion` datetime DEFAULT NULL,
  `actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cuestionario_b2_06_3_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `cuestionario_b2_06_3`
--

TRUNCATE TABLE `cuestionario_b2_06_3`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_b2_10`
--

DROP TABLE IF EXISTS `cuestionario_b2_10`;
CREATE TABLE IF NOT EXISTS `cuestionario_b2_10` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `p1` tinyint(2) DEFAULT NULL,
  `p2` tinyint(2) DEFAULT NULL,
  `p3` tinyint(2) DEFAULT NULL,
  `p4` tinyint(2) DEFAULT NULL,
  `p5` tinyint(2) DEFAULT NULL,
  `p6` tinyint(2) NOT NULL,
  `p7` tinyint(2) NOT NULL,
  `p8` tinyint(2) NOT NULL,
  `p9` tinyint(2) NOT NULL,
  `p10` tinyint(2) NOT NULL,
  `p11` tinyint(2) NOT NULL,
  `actualizacion` datetime DEFAULT NULL,
  `creacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cuestionario_b2_10_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='cuestionario de espacio de trabajo';

--
-- Truncar tablas antes de insertar `cuestionario_b2_10`
--

TRUNCATE TABLE `cuestionario_b2_10`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_b2_12_2`
--

DROP TABLE IF EXISTS `cuestionario_b2_12_2`;
CREATE TABLE IF NOT EXISTS `cuestionario_b2_12_2` (
  `id_cuestionario_b2_12_1` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` varchar(20) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL COMMENT '1=estudiante, 2=profesor',
  `fecha_hora` datetime DEFAULT NULL,
  `p1` int(11) DEFAULT NULL COMMENT 'sitio',
  `p2` int(11) DEFAULT NULL COMMENT 'actualizado',
  `p3` int(11) DEFAULT NULL COMMENT 'confiabilidad',
  `p4` int(11) DEFAULT NULL COMMENT 'calidad del contenido',
  `p5` int(11) DEFAULT NULL COMMENT 'calidad del sitio',
  `p6` int(11) DEFAULT NULL COMMENT 'calidad del sitio',
  PRIMARY KEY (`id_cuestionario_b2_12_1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='cuestionario de ambiente de trabajo';

--
-- Truncar tablas antes de insertar `cuestionario_b2_12_2`
--

TRUNCATE TABLE `cuestionario_b2_12_2`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_opinion`
--

DROP TABLE IF EXISTS `cuestionario_opinion`;
CREATE TABLE IF NOT EXISTS `cuestionario_opinion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `p11` int(11) DEFAULT NULL,
  `p12` int(11) DEFAULT NULL,
  `p13` int(11) DEFAULT NULL,
  `creacion` datetime NOT NULL,
  `actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cuestionario_opinion_usuarios` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `cuestionario_opinion`
--

TRUNCATE TABLE `cuestionario_opinion`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL COMMENT 'RFC para profesores, numero cuenta para alumnos',
  `password` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `genero` enum('M','H') NOT NULL COMMENT 'M=Mujer H=Hombre',
  `plantel` smallint(5) UNSIGNED DEFAULT NULL,
  `turno` tinyint(4) DEFAULT NULL,
  `grupo` varchar(10) DEFAULT NULL,
  `generacion` smallint(4) NOT NULL,
  `tipo` enum('A','P','E') NOT NULL COMMENT 'A=Alumno, P=Profesor, E=Especial o invitado',
  `creacion` datetime NOT NULL,
  `actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`usuario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `usuarios`
--

TRUNCATE TABLE `usuarios`;
--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `apellidos`, `correo`, `genero`, `plantel`, `turno`, `grupo`, `generacion`, `tipo`, `creacion`, `actualizacion`) VALUES
(5, 'basj850331631', '851788', 'Jonathan', 'Bailon', 'jonn59@gmail.com', 'H', 40702, 2, '401', 2022, 'P', '2022-05-19 20:31:12', '2022-05-19 20:31:12');
INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `apellidos`, `correo`, `genero`, `plantel`, `turno`, `grupo`, `generacion`, `tipo`, `creacion`, `actualizacion`) VALUES
(6, 'aipj840407v55', '847702', 'Rodrigo', 'Aizpuru', 'rodrigoaiz@gmail.com', 'H', 40702, 2, '401', 2022, 'P', '2022-05-19 20:31:12', '2022-05-19 20:31:12');


-- --------------------------------------------------------

--
-- Estructura para la vista `alumnos_estadisticas`
--
DROP TABLE IF EXISTS `alumnos_estadisticas`;

DROP VIEW IF EXISTS `alumnos_estadisticas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`dbadmin`@`localhost` SQL SECURITY DEFINER VIEW `alumnos_estadisticas`  AS SELECT `usuarios`.`usuario` AS `usuario`, `usuarios`.`plantel` AS `plantel`, `usuarios`.`turno` AS `turno`, `usuarios`.`generacion` AS `generacion`, `usuarios`.`genero` AS `genero`, `usuarios`.`grupo` AS `grupo`, `avance`.`bloque_1` AS `bloque_1`, `avance`.`bloque_2` AS `bloque_2`, `avance`.`bloque_3` AS `bloque_3`, `avance`.`bloque_4` AS `bloque_4`, truncate((`avance`.`bloque_1` + `avance`.`bloque_2` + `avance`.`bloque_3` + `avance`.`bloque_4`) / 4,2) AS `avance_global`, `honey`.`activo` AS `activo`, `honey`.`reflexivo` AS `reflexivo`, `honey`.`teorico` AS `teorico`, `honey`.`pragmatico` AS `pragmatico`, `C1`.`p1` AS `b1_03_p1`, `C1`.`p2` AS `b1_03_p2`, `C1`.`p3` AS `b1_03_p3`, `C2_01`.`p1` AS `b2_01_p1`, `C2_01`.`p2` AS `b2_01_p2`, `C2_04`.`p1` AS `b2_04_p1`, `C2_04`.`p2` AS `b2_04_p2`, `C2_06_1`.`p1` AS `b2_06_1_p1`, `C2_06_1`.`p2` AS `b2_06_1_p2`, `C2_06_1`.`p3` AS `b2_06_1_p3`, `C2_06_2`.`p1` AS `b2_06_2_p1`, `C2_06_2`.`p2` AS `b2_06_2_p2`, `C2_06_2`.`p3` AS `b2_06_2_p3`, `C2_06_3`.`p1` AS `b2_06_3_p1`, `C2_06_3`.`p2` AS `b2_06_3_p2`, `C2_06_3`.`p3` AS `b2_06_3_p3`, `C2_06_3`.`p4` AS `b2_06_3_p4`, `C2_06_3`.`p5` AS `b2_06_3_p5`, `C2_06_3`.`p6` AS `b2_06_3_p6`, `C2_06_3`.`p7` AS `b2_06_3_p7`, `C2_06_3`.`p8` AS `b2_06_3_p8`, `C2_06_3`.`p9` AS `b2_06_3_p9`, `C2_06_3`.`p10` AS `b2_06_3_p10`, `C2_06_3`.`p11` AS `b2_06_3_p11`, `C2_06_3`.`p12` AS `b2_06_3_p12`, `C2_06_3`.`p13` AS `b2_06_3_p13`, `C2_06_3`.`p14` AS `b2_06_3_p14`, `C2_06_3`.`p15` AS `b2_06_3_p15`, `C2_06_3`.`p16` AS `b2_06_3_p16`, `C2_10`.`p1` AS `b2_10_p1`, `C2_10`.`p2` AS `b2_10_p2`, `C2_10`.`p3` AS `b2_10_p3`, `C2_10`.`p4` AS `b2_10_p4`, `C2_10`.`p5` AS `b2_10_p5`, `C2_10`.`p6` AS `b2_10_p6`, `C2_10`.`p7` AS `b2_10_p7`, `C2_10`.`p8` AS `b2_10_p8`, `C2_10`.`p9` AS `b2_10_p9`, `C2_10`.`p10` AS `b2_10_p10`, `C2_10`.`p11` AS `b2_10_p11`, `Opi`.`p1` AS `opinion_p1`, `Opi`.`p2` AS `opinion_p2`, `Opi`.`p3` AS `opinion_p3`, `Opi`.`p4` AS `opinion_p4`, `Opi`.`p5` AS `opinion_p5`, `Opi`.`p6` AS `opinion_p6`, `Opi`.`p7` AS `opinion_p7`, `Opi`.`p8` AS `opinion_p8`, `Opi`.`p9` AS `opinion_p9`, `Opi`.`p10` AS `opinion_p10`, `Opi`.`p11` AS `opinion_p11`, `Opi`.`p12` AS `opinion_p12`, `Opi`.`p13` AS `opinion_p13` FROM ((((((((((`usuarios` left join `avance` on(`avance`.`usuarios_id` = `usuarios`.`id`)) left join `cuestionario_b2_03` `honey` on(`honey`.`usuarios_id` = `usuarios`.`id`)) left join `cuestionario_b1_03` `C1` on(`C1`.`usuarios_id` = `usuarios`.`id`)) left join `cuestionario_b2_01` `C2_01` on(`C2_01`.`usuarios_id` = `usuarios`.`id`)) left join `cuestionario_b2_04` `C2_04` on(`C2_04`.`usuarios_id` = `usuarios`.`id`)) left join `cuestionario_b2_06_1` `C2_06_1` on(`C2_06_1`.`usuarios_id` = `usuarios`.`id`)) left join `cuestionario_b2_06_2` `C2_06_2` on(`C2_06_2`.`usuarios_id` = `usuarios`.`id`)) left join `cuestionario_b2_06_3` `C2_06_3` on(`C2_06_3`.`usuarios_id` = `usuarios`.`id`)) left join `cuestionario_b2_10` `C2_10` on(`C2_10`.`usuarios_id` = `usuarios`.`id`)) left join `cuestionario_opinion` `Opi` on(`Opi`.`usuarios_id` = `usuarios`.`id`)) WHERE `usuarios`.`tipo` = 'A''A'  ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avance`
--
ALTER TABLE `avance`
  ADD CONSTRAINT `FK_avance_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `FK_bitacora_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario_b1_03`
--
ALTER TABLE `cuestionario_b1_03`
  ADD CONSTRAINT `FK_cuestionario_b1_03_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario_b2_01`
--
ALTER TABLE `cuestionario_b2_01`
  ADD CONSTRAINT `FK_cuestionario_b2_01_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario_b2_03`
--
ALTER TABLE `cuestionario_b2_03`
  ADD CONSTRAINT `FK_cuestionario_b2_03_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario_b2_04`
--
ALTER TABLE `cuestionario_b2_04`
  ADD CONSTRAINT `FK_id_cuestionario_b2_05_1_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario_b2_06_1`
--
ALTER TABLE `cuestionario_b2_06_1`
  ADD CONSTRAINT `FK_cuestionario_b2_06_1_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario_b2_06_2`
--
ALTER TABLE `cuestionario_b2_06_2`
  ADD CONSTRAINT `FK_cuestionario_b2_06_2_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario_b2_06_3`
--
ALTER TABLE `cuestionario_b2_06_3`
  ADD CONSTRAINT `FK_cuestionario_b2_06_3_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario_b2_10`
--
ALTER TABLE `cuestionario_b2_10`
  ADD CONSTRAINT `FK_cuestionario_b2_10_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario_opinion`
--
ALTER TABLE `cuestionario_opinion`
  ADD CONSTRAINT `FK_cuestionario_opinion_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
