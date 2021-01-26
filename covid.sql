-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2021 a las 00:34:47
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `covid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `codigo` varchar(12) DEFAULT NULL,
  `docprueba` varchar(15) DEFAULT NULL,
  `tipoprueba` varchar(20) DEFAULT NULL,
  `fechaprueba` date DEFAULT NULL,
  `fechareg` date DEFAULT NULL,
  `mtransporte` varchar(20) DEFAULT NULL,
  `resultado` varchar(10) DEFAULT NULL,
  `estadiapersona` varchar(15) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`id`, `codigo`, `docprueba`, `tipoprueba`, `fechaprueba`, `fechareg`, `mtransporte`, `resultado`, `estadiapersona`, `usuario_id`) VALUES
(24, '7241353867', '234', 'Prueba rapida', '2021-01-21', '2021-01-21', 'Terrestre', 'Negativo', 'Permanente', 2),
(27, '343541353867', '', 'Ninguno', '0000-00-00', '0000-00-00', 'Terrestre', 'false', 'Permanente', 2),
(28, '625841353867', '', 'Ninguno', '0000-00-00', '0000-00-00', 'Terrestre', 'false', 'Permanente', 2),
(29, '188241353867', '', 'Ninguno', '0000-00-00', '0000-00-00', 'Terrestre', 'Cuarentena', 'Permanente', 2),
(30, '919341353867', '23432', 'Prueba rapida', '2021-01-25', '2021-01-25', 'Terrestre', 'Negativo', 'Permanente', 2),
(31, '673541353867', '234324', 'Prueba rapida', '2021-01-01', '2021-01-01', 'Terrestre', 'Negativo', 'Permanente', 2),
(32, '514841353867', '345435', 'Ninguno', '0000-00-00', '2021-01-25', 'Terrestre', 'Cuarentena', 'Permanente', 2),
(33, '879841353867', '3243', 'Prueba rapida', '2021-01-25', '2021-01-25', 'Terrestre', 'Negativo', 'Permanente', 2),
(34, '265904206064', '', 'Ninguno', '0000-00-00', '2021-01-25', 'Terrestre', 'Cuarentena', 'Permanente', 2),
(35, '780604206116', '', 'Ninguno', '0000-00-00', '2021-01-25', 'Terrestre', 'Negativo', 'Transito', 2),
(36, '905541353867', '', 'Ninguno', '0000-00-00', '2021-01-26', 'Terrestre', 'Negativo', 'Transito', 2),
(37, '651941353867', '', 'Ninguno', '0000-00-00', '2021-01-26', 'Terrestre', 'Cuarentena', 'Permanente', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuarentena`
--

CREATE TABLE `cuarentena` (
  `id` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `control_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuarentena`
--

INSERT INTO `cuarentena` (`id`, `fecha_inicio`, `fecha_final`, `descripcion`, `control_id`) VALUES
(1, '2021-01-24', '2021-02-09', '', 29),
(2, '2021-01-25', '2021-02-09', '', 32),
(3, '2021-01-25', '2021-02-09', '', 34),
(4, '2021-01-26', '2021-02-10', '', 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `control_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `control_id`, `persona_id`) VALUES
(3, 24, 11),
(4, 27, 11),
(5, 28, 11),
(6, 29, 11),
(7, 30, 11),
(8, 31, 11),
(9, 32, 11),
(10, 33, 11),
(11, 34, 13),
(12, 35, 14),
(13, 36, 11),
(14, 37, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `tipoDoc` varchar(40) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `tipoDoc`, `documento`, `nombres`, `apellidos`) VALUES
(11, 'DNI', '41353867', 'ELIAS RAMIRO', 'RAYMUNDO TORRES'),
(13, 'DNI', '04206064', 'RAMIRO VICTOR', 'RAYMUNDO JUSTINIANO'),
(14, 'DNI', '04206116', 'ROSA', 'TORRES DE RAYMUNDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `policia`
--

CREATE TABLE `policia` (
  `id` int(11) NOT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `cip` varchar(10) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `control_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `user` varchar(80) DEFAULT NULL,
  `clave` text DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `user`, `clave`, `tipo`) VALUES
(2, 'ELIAS RAYMUNDO', 'elias@gmail.com', '$2y$10$2OeyqoTL5rBmNOQEjYXHzu1biZh5avgTypxi5XRkF12vUs/2VreoS', 1),
(3, 'Carlos', 'carlos@gmail.com', '$2y$10$76xiReIszBoduPR/g1t3j.D7OFfAt1eIMD1J1qATsHibFf6iplLdK', 2),
(4, 'Daniela', 'dani@gmail.com', '$2y$10$9ba0YfomUEd07ZRx1k0TQ.4V.Jzn9RmPqG50cfWxg8BbXl1dgD36m', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  ADD KEY `fk_control_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `cuarentena`
--
ALTER TABLE `cuarentena`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cuarentena_control1_idx` (`control_id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historial_control1_idx` (`control_id`),
  ADD KEY `fk_historial_persona1_idx` (`persona_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`);

--
-- Indices de la tabla `policia`
--
ALTER TABLE `policia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`),
  ADD KEY `fk_policia_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seguimiento_control1_idx` (`control_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `cuarentena`
--
ALTER TABLE `cuarentena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `policia`
--
ALTER TABLE `policia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `fk_control_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuarentena`
--
ALTER TABLE `cuarentena`
  ADD CONSTRAINT `fk_cuarentena_control1` FOREIGN KEY (`control_id`) REFERENCES `control` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_historial_control1` FOREIGN KEY (`control_id`) REFERENCES `control` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historial_persona1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `policia`
--
ALTER TABLE `policia`
  ADD CONSTRAINT `fk_policia_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `fk_seguimiento_control1` FOREIGN KEY (`control_id`) REFERENCES `control` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
