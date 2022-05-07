-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2022 a las 16:30:37
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sissalud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `detalle` text NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diagnosticos`
--

INSERT INTO `diagnosticos` (`id`, `codigo`, `detalle`, `fecha_registro`, `estado_id`) VALUES
(1, 'cod1', 'algo', '2021-12-22', 2),
(2, 'cod2', 'ninguno', '2021-12-22', 1),
(4, 'cod3', 'tos', '2021-12-22', 2),
(5, 'cod4', 'fiebre', '2021-12-22', 1),
(6, 'cod5', 'tos', '2021-12-22', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`, `fecha_registro`) VALUES
(1, 'ACTIVO', '2021-12-22'),
(2, 'INACTIVO', '2021-12-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `num_documento` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombres`, `apellidos`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `fecha_registro`, `estado_id`) VALUES
(1, 'asdf', 'asdf', 2, 'asdf', 'asdf', 'asdf', '2021-12-22', 2),
(2, 'qwer', 'wqwer', 1, 'qwer', 'qwert', 'qwer', '2021-12-22', 2),
(4, 'juan', 'asdf', 0, 'ads', '', 'asdf', '2021-12-22', 1),
(5, 'asdf', 'asdf', 0, '1234', 'asdf', 'asdf', '2021-12-22', 1),
(6, 'asfda', 'asddfasf', 2, '4321', 'asdfa', 'dasfas', '2021-12-22', 2),
(7, 'adf', 'asfas', 1, '1234557', 'asfd', 'asdfasf', '2021-12-22', 2),
(9, 'ningun', 'apellido', 0, '4444', '', 'algo', '2021-12-22', 1),
(10, 'nombres', 'last', 0, '9999', 'algo', 'cra falsa 1234', '2021-12-22', 1),
(11, 'asddf', 'asfsas', 1, '888', 'asfa', 'asfa', '2021-12-22', 1),
(12, 'asdf', 'safd', 1, '7777', 'sf', 'sfsa', '2021-12-22', 2),
(14, 'jose', 'ernesto', 1, '8427', 'cra falsa 1234', '2349349', '2021-12-22', 1),
(16, 'jose', 'saramago', 3, '3365', 'cra falsa 1234', '8785544', '2021-12-22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_diagnosticos`
--

CREATE TABLE `pacientes_diagnosticos` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `diagnostico_id` int(11) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes_diagnosticos`
--

INSERT INTO `pacientes_diagnosticos` (`id`, `paciente_id`, `diagnostico_id`, `fecha_registro`, `estado_id`) VALUES
(1, 12, 1, '2021-12-22', 1),
(2, 14, 5, '2021-12-22', 1),
(3, 16, 2, '2021-12-22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documento`
--

CREATE TABLE `tipos_documento` (
  `id` int(11) NOT NULL,
  `detalle` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp(),
  `estado_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_documento`
--

INSERT INTO `tipos_documento` (`id`, `detalle`, `fecha_registro`, `estado_id`) VALUES
(1, 'Cedula Ciudadania', '2021-12-22', 1),
(2, 'Cedula Extranjeria', '2021-12-22', 1),
(3, 'Tarjeta Identidad', '2021-12-22', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num_documento` (`num_documento`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Indices de la tabla `pacientes_diagnosticos`
--
ALTER TABLE `pacientes_diagnosticos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_id` (`paciente_id`),
  ADD KEY `diagnostico_id` (`diagnostico_id`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Indices de la tabla `tipos_documento`
--
ALTER TABLE `tipos_documento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_id` (`estado_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pacientes_diagnosticos`
--
ALTER TABLE `pacientes_diagnosticos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipos_documento`
--
ALTER TABLE `tipos_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `diagnosticos_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacientes_diagnosticos`
--
ALTER TABLE `pacientes_diagnosticos`
  ADD CONSTRAINT `pacientes_diagnosticos_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pacientes_diagnosticos_ibfk_2` FOREIGN KEY (`diagnostico_id`) REFERENCES `diagnosticos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pacientes_diagnosticos_ibfk_3` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipos_documento`
--
ALTER TABLE `tipos_documento`
  ADD CONSTRAINT `tipos_documento_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
