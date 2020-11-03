-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2020 a las 04:37:28
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` smallint(6) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `activo` tinyint(3) DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'dddddddconstruccion ', 1, '2020-10-24 22:10:00', '2020-10-24 22:10:00'),
(2, 'ddddddddddddddddddddddddddd  ', 1, '2020-10-29 18:03:27', '2020-10-29 18:03:27'),
(3, 'Datos', 1, '2020-10-24 22:10:14', '2020-10-24 22:10:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT NULL,
  `precio_compra` decimal(10,2) DEFAULT 0.00,
  `existencia` int(11) DEFAULT 0,
  `stock_minimo` int(11) DEFAULT 0,
  `inventariable` tinyint(4) DEFAULT NULL,
  `id_unidad` smallint(6) DEFAULT NULL,
  `id_categoria` smallint(6) DEFAULT NULL,
  `activo` tinyint(3) DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `precio_venta`, `precio_compra`, `existencia`, `stock_minimo`, `inventariable`, `id_unidad`, `id_categoria`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, '00000000000000000000000000', '80000', '20.00', '30.00', 10, 5000, 0, 6, 3, 1, '2020-11-03 00:12:27', '2020-11-02 23:12:27'),
(2, '5555555555555555555', '80000', '20.00', '30.00', 10, 5000, 0, 6, 3, 1, '2020-11-01 03:03:01', '2020-11-01 03:03:01'),
(3, '1', '80000', '20.00', '30.00', 0, 5000, 0, 6, 3, 1, '2020-11-01 02:51:15', '2020-11-01 02:51:15'),
(4, '2', '80000', '20.00', '30.00', 0, 5000, 0, 6, 3, 1, '2020-11-01 03:01:11', '2020-11-01 03:01:11'),
(5, '3333', '80000', '20.00', '30.00', 0, 5000, 0, 6, 3, 1, '2020-11-01 03:03:09', '2020-11-01 03:03:09'),
(6, '5555555555555555555', '80000', '20.00', '30.00', 0, 5000, 0, 6, 3, 1, '2020-11-01 03:03:00', '2020-11-01 03:03:00'),
(7, '5555555555555555555', '80000', '20.00', '30.00', 0, 1, 0, 6, 3, 1, '2020-11-01 03:02:55', '2020-11-01 03:02:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `id` smallint(6) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nombre_corto` varchar(100) NOT NULL,
  `activo` tinyint(3) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_edit` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id`, `nombre`, `nombre_corto`, `activo`, `fecha_alta`, `fecha_edit`) VALUES
(1, 'Litros', 'lt', 1, '2020-10-29 14:48:53', '2020-10-29 14:48:53'),
(2, '111111111111', '1', 1, '2020-11-01 02:39:39', '2020-11-01 02:39:39'),
(3, 'Metros', 'mt', 1, '2020-10-24 17:29:34', '2020-10-24 17:29:34'),
(4, 'ddddd ', 'd rrrrr', 1, '2020-11-01 02:58:58', '2020-11-01 02:58:58'),
(5, 'Kilogramos', 'kg', 0, '2020-10-29 14:49:17', '2020-10-29 14:49:17'),
(6, 'Bolas', 'b', 1, '2020-10-29 14:17:11', '2020-10-29 14:17:11'),
(7, 'ddddd ', 'ccccccc', 0, '2020-10-29 14:49:19', '2020-10-29 14:49:19'),
(8, 'Pieza ', 'Pza ', 1, '2020-10-24 18:42:53', '2020-10-24 18:42:53'),
(9, '', '', 1, '2020-10-29 14:23:11', '2020-10-29 14:23:11'),
(10, 'MMMMM ', 'MM', 1, '2020-10-29 14:23:08', '2020-10-29 14:23:08'),
(11, 'caja', 'cja', 1, '2020-10-24 22:54:25', '2020-10-24 22:54:25'),
(12, 'ddddddddd', 'ddd', 0, '2020-10-29 14:49:24', '2020-10-29 14:49:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_unidad` (`id_unidad`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_unidad`) REFERENCES `unidades` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
