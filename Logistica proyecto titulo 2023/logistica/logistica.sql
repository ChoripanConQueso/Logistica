-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 19:42:01
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logistica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `nombre` varchar(25) NOT NULL,
  `id` varchar(10) NOT NULL,
  `cargo` varchar(10) NOT NULL,
  `socursal` varchar(15) NOT NULL,
  `clave` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`nombre`, `id`, `cargo`, `socursal`, `clave`) VALUES
('Rancagua', '12', 'repartidor', 'Rancagua', '12345'),
('gerente', '88', 'gerente', 'Rancagua', '123456'),
('recepcionista', '92', 'recepcioni', 'Rancagua', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `codigo` int(20) NOT NULL,
  `servicio` varchar(11) NOT NULL,
  `origen` varchar(15) NOT NULL,
  `destino` varchar(40) NOT NULL,
  `remitente` varchar(25) NOT NULL,
  `direntrega` varchar(40) NOT NULL,
  `destinatario` varchar(25) NOT NULL,
  `estado` varchar(22) NOT NULL,
  `receptor` varchar(25) DEFAULT NULL,
  `fechain` date NOT NULL,
  `ubicacionact` varchar(15) NOT NULL,
  `Fecha_modificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`codigo`, `servicio`, `origen`, `destino`, `remitente`, `direntrega`, `destinatario`, `estado`, `receptor`, `fechain`, `ubicacionact`, `Fecha_modificacion`) VALUES
(5, 'express', 'Socursal1', 'a', 'test005', 'a', 'a', 'Entrega completada', NULL, '2023-11-01', 'osorno', '2023-11-15'),
(6, 'express', 'Socursal1', 'a', 'test2', 'a', 'a', 'Entrega completada', NULL, '2023-11-01', 'rancagua', '2023-11-13'),
(7, 'express', 'Socursal1', 'si', 'juanin001', 'si', 'si', 'recibido', NULL, '0000-00-00', '', NULL),
(12, 'express', 'Socursal1', 'a', 'juanin0022', 'av juan perez 037', 'a', 'a', NULL, '2023-11-01', 'Socursal2', NULL),
(13, 'express', 'Socursal2', 'a', 'juanin0022', 'av juan perez 037', 'agusto hernandez', 'en transito', NULL, '2023-11-01', 'SanFernando', '2023-11-16'),
(14, 'express', 'Rancagua', 'si', 'juanin0022', 'si', 'si', 'recepcionado', NULL, '2023-11-16', 'Rancagua', NULL),
(15, 'express', 'Rancagua', 'si', 'juanin0022', 'si', 'si', 'recepcionado', NULL, '2023-11-16', 'Rancagua', NULL),
(16, 'express', 'Santiago Norte', 'si', 'juanin0022', 'si', 'si', 'recepcionado', NULL, '2023-11-16', 'Santiago Norte', NULL),
(17, 'express', 'Santiago Sur', 'santiago sur', 'juanin0022', 'si', 'si', 'recepcionado', NULL, '2023-11-16', 'SanFernando', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receptor`
--

CREATE TABLE `receptor` (
  `nombre` varchar(25) NOT NULL,
  `rut` int(20) NOT NULL,
  `fono` int(11) NOT NULL,
  `NumeroPaquete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `receptor`
--

INSERT INTO `receptor` (`nombre`, `rut`, `fono`, `NumeroPaquete`) VALUES
('juanin', 21085, 1234, 0),
('juanin', 21085, 1234, 12345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remitente`
--

CREATE TABLE `remitente` (
  `nombre` varchar(25) NOT NULL,
  `Rut` varchar(12) NOT NULL,
  `fono` int(11) NOT NULL,
  `Correo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `remitente`
--

INSERT INTO `remitente` (`nombre`, `Rut`, `fono`, `Correo`) VALUES
('', '', 0, ''),
('juanin001', '0001', 343, 'correo'),
('juanin0022', '21.085.991-8', 0, ''),
('test', '111', 111, 'test@gmail.com'),
('test005', '1111', 343, 'aaa'),
('test006', '1111', 1111, 'a'),
('test2', '111', 111, '1111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socursal`
--

CREATE TABLE `socursal` (
  `nombre` varchar(15) NOT NULL,
  `region` varchar(25) NOT NULL,
  `direccion` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socursal`
--

INSERT INTO `socursal` (`nombre`, `region`, `direccion`) VALUES
('Rancagua', 'ohiggins', 'Calle rubio 0147'),
('SanFernando', 'ohiggins', 'Villa imperial 338'),
('Santiago Norte', 'metropolitana', 'Perro silva 0590'),
('Santiago Sur', 'metropolitana', 'Luis mercedes 3040'),
('Socursal1', 'Los lagos', 'av142'),
('Socursal2', 'Los lagos', 'av143');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socursal` (`socursal`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `origen` (`origen`),
  ADD KEY `remitente` (`remitente`);

--
-- Indices de la tabla `remitente`
--
ALTER TABLE `remitente`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `socursal`
--
ALTER TABLE `socursal`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `codigo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`socursal`) REFERENCES `socursal` (`nombre`);

--
-- Filtros para la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD CONSTRAINT `origen` FOREIGN KEY (`origen`) REFERENCES `socursal` (`nombre`),
  ADD CONSTRAINT `remitente` FOREIGN KEY (`remitente`) REFERENCES `remitente` (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
