-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2023 a las 20:39:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web2tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_Cliente` int(225) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `CorreoElectronico` varchar(100) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `DNI` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de Clientes para el TPE';

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_Cliente`, `Nombre`, `Apellido`, `CorreoElectronico`, `FechaNacimiento`, `DNI`, `Direccion`) VALUES
(1, 'Juan', 'Pérez', 'juan.perez@example.com', '1990-05-15', '12345678A', 'Calle A, Ciudad A'),
(2, 'María', 'García', 'maria.garcia@example.com', '1985-08-20', '98765432B', 'Calle B, Ciudad B'),
(3, 'Pedro', 'López', 'pedro.lopez@example.com', '1992-03-10', '45678901C', 'Calle C, Ciudad C'),
(4, 'Ana', 'Martínez', 'ana.martinez@example.com', '1988-11-25', '65432109D', 'Calle D, Ciudad D'),
(5, 'Carlos', 'Rodríguez', 'carlos.rodriguez@example.com', '1995-07-12', '78901234E', 'Calle E, Ciudad E'),
(6, 'Laura', 'Fernández', 'laura.fernandez@example.com', '1983-02-05', '89012345F', 'Calle F, Ciudad F'),
(7, 'Miguel', 'Sánchez', 'miguel.sanchez@example.com', '1993-09-30', '01234567G', 'Calle G, Ciudad G'),
(8, 'Elena', 'Gómez', 'elena.gomez@example.com', '1991-06-18', '23456789H', 'Calle H, Ciudad H'),
(9, 'Luis', 'Pardo', 'luis.pardo@example.com', '1987-04-22', '34567890I', 'Calle I, Ciudad I'),
(10, 'Sofía', 'Hernández', 'sofia.hernandez@example.com', '1994-01-07', '45678901J', 'Calle J, Ciudad J'),
(11, 'Javier', 'Díaz', 'javier.diaz@example.com', '1996-10-14', '56789012K', 'Calle K, Ciudad K'),
(12, 'Isabel', 'López', 'isabel.lopez@example.com', '1986-12-03', '67890123L', 'Calle L, Ciudad L'),
(13, 'David', 'Ramos', 'david.ramos@example.com', '1997-07-28', '78901234M', 'Calle M, Ciudad M'),
(14, 'Carmen', 'Martín', 'carmen.martin@example.com', '1984-04-17', '89012345N', 'Calle N, Ciudad N'),
(15, 'Diego', 'González', 'diego.gonzalez@example.com', '1998-03-22', '90123456O', 'Calle O, Ciudad O'),
(16, 'Patricia', 'Soto', 'patricia.soto@example.com', '1989-09-09', '01234567P', 'Calle P, Ciudad P'),
(17, 'Adrián', 'Ortega', 'adrian.ortega@example.com', '1999-05-05', '12345678Q', 'Calle Q, Ciudad Q'),
(18, 'Eva', 'Vega', 'eva.vega@example.com', '1982-08-02', '23456789R', 'Calle R, Ciudad R'),
(19, 'José', 'Ferrer', 'jose.ferrer@example.com', '1990-11-11', '34567890S', 'Calle S, Ciudad S'),
(20, 'Lorena', 'Roca', 'lorena.roca@example.com', '1981-06-30', '45678901T', 'Calle T, Ciudad T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `NombreUsuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `NombreUsuario`, `password`) VALUES
(1, 'webAdmin', '$2y$10$mBQ9qu.flqPxRN.687b8n.7eiTzL7kDZ7FTjkyYgv/xkvd7Pkuige');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `ID_Viaje` int(225) NOT NULL,
  `Destino` varchar(100) NOT NULL,
  `FechaSalida` date NOT NULL,
  `FechaRegreso` date NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` double NOT NULL,
  `id_Cliente` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`ID_Viaje`, `Destino`, `FechaSalida`, `FechaRegreso`, `Descripcion`, `Precio`, `id_Cliente`) VALUES
(1, 'París', '2023-10-15', '2023-10-20', 'Viaje a París', 1200.5, 11),
(2, 'Londres', '2023-11-05', '2023-11-10', 'Vacaciones en Londres', 1100.25, 2),
(3, 'Nueva York', '2023-12-01', '2023-12-10', 'Gran aventura en Nueva York', 1500.75, 17),
(4, 'Roma', '2024-01-10', '2024-01-15', 'Explorando la antigua Roma', 900, 18),
(5, 'Tokio', '2024-02-20', '2024-02-28', 'Viaje a la capital de Japón', 1800.6, 16),
(6, 'Barcelona', '2024-03-15', '2024-03-20', 'Descubriendo Barcelona', 950.25, 5),
(7, 'Sidney', '2024-04-05', '2024-04-15', 'Aventura en Australia', 2100.75, 17),
(8, 'Ámsterdam', '2024-05-10', '2024-05-17', 'Explorando los canales de Ámsterdam', 800, 8),
(9, 'Berlín', '2024-06-01', '2024-06-10', 'Viaje a la capital alemana', 1100.5, 8),
(10, 'Praga', '2024-07-15', '2024-07-22', 'Descubriendo la historia de Praga', 950.75, 16),
(11, 'Bangkok', '2024-08-10', '2024-08-18', 'Aventura en Tailandia', 1700.25, 16),
(12, 'Budapest', '2024-09-05', '2024-09-12', 'Explorando la perla del Danubio', 1050, 12),
(13, 'Viena', '2024-10-01', '2024-10-10', 'Viaje a la capital austriaca', 1250.6, 8),
(14, 'Atenas', '2024-11-20', '2024-11-28', 'Explorando la cuna de la civilización', 1350.75, 6),
(15, 'Estambul', '2024-12-15', '2024-12-22', 'Viaje a la ciudad entre dos continentes', 1150.25, 3),
(16, 'San Francisco', '2025-01-10', '2025-01-18', 'Aventura en la bahía de San Francisco', 1600.5, 17),
(17, 'Dubái', '2025-02-05', '2025-02-12', 'Explorando la ciudad del lujo', 1400.75, 13),
(18, 'Moscú', '2025-03-20', '2025-03-28', 'Viaje a la capital rusa', 1300.6, 13),
(19, 'Toronto', '2025-04-15', '2025-04-22', 'Descubriendo la ciudad canadiense', 1050.25, 5),
(20, 'Ciudad del Cabo', '2025-05-01', '2025-05-10', 'Aventura en Sudáfrica', 1900, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_Cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`ID_Viaje`),
  ADD KEY `id_Cliente` (`id_Cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_Cliente` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `ID_Viaje` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `clientes` (`ID_Cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
