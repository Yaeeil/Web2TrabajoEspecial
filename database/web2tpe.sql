-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2023 a las 02:56:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

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
  `DNI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de Clientes para el TPE';

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_Cliente`, `Nombre`, `Apellido`, `CorreoElectronico`, `FechaNacimiento`, `DNI`) VALUES
(1, 'Juan', 'Perez', 'juan.perez@email.com', '1990-05-15', '12345678'),
(2, 'Ana', 'González', 'ana.gonzalez@email.com', '1985-09-23', '98765432'),
(3, 'Carlos', 'López', 'carlos.lopez@email.com', '1995-02-10', '45678912'),
(4, 'Laura', 'Rodriguez', 'laura.rodriguez@email.com', '1988-07-30', '78912345'),
(5, 'Pedro', 'Martínez', 'pedro.martinez@email.com', '1992-12-18', '23456789'),
(6, 'María', 'Sánchez', 'maria.sanchez@email.com', '1983-04-05', '67891234'),
(7, 'Javier', 'Gómez', 'javier.gomez@email.com', '1998-08-22', '34567891'),
(8, 'Sofía', 'Fernández', 'sofia.fernandez@email.com', '1993-03-14', '78912345'),
(9, 'Luis', 'Díaz', 'luis.diaz@email.com', '1991-11-27', '45678912'),
(10, 'Elena', 'López', 'elena.lopez@email.com', '1987-06-10', '23456789'),
(11, 'Diego', 'Hernández', 'diego.hernandez@email.com', '1996-01-05', '67891234'),
(12, 'Carmen', 'Pérez', 'carmen.perez@email.com', '1984-09-17', '34567891'),
(13, 'Hugo', 'García', 'hugo.garcia@email.com', '1997-07-01', '78912345'),
(14, 'Paula', 'Vargas', 'paula.vargas@email.com', '1994-04-09', '45678912'),
(15, 'Miguel', 'Torres', 'miguel.torres@email.com', '1990-10-25', '23456789');

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
(1, 'París, Francia', '2024-03-15', '2024-03-22', 'Disfruta de una estancia de 7 días en la hermosa ciudad de París, Francia. Visita la Torre Eiffel, el Louvre y pasea por los encantadores bulevares parisinos. Precio: $150000.00 por persona.', 150000, 1),
(2, 'Nueva York, EE. UU.', '2024-04-10', '2024-04-18', 'Explora la Gran Manzana durante 8 días en Nueva York, Estados Unidos. Visita Times Square, Central Park y disfruta de un espectáculo en Broadway. Precio: $220000.00 por persona.', 220000, 2),
(3, 'Roma, Italia', '2024-05-05', '2024-05-12', 'Descubre la historia de Roma, Italia, durante 7 días. Explora el Coliseo, el Vaticano y saborea auténtica pasta italiana. Precio: $180000.00 por persona.', 180000, 3),
(4, 'Tokio, Japón', '2024-06-20', '2024-06-30', 'Sumérgete en la cultura japonesa durante 10 días en Tokio, Japón. Visita el Templo Senso-ji, el barrio de Akihabara y prueba sushi fresco. Precio: $250000.00 por persona.', 250000, 4),
(5, 'Barcelona, España', '2024-07-10', '2024-07-18', 'Explora la belleza de Barcelona, España, durante 8 días. Descubre la Sagrada Familia, pasea por Las Ramblas y disfruta de tapas españolas. Precio: $120000.00 por persona.', 120000, 5),
(6, 'Sídney, Australia', '2024-08-15', '2024-08-25', 'Disfruta de 10 días en Sídney, Australia. Explora la Ópera de Sídney, Bondi Beach y conoce la fauna australiana. Precio: $280000.00 por persona.', 280000, 6),
(7, 'Machu Picchu, Perú', '2024-09-10', '2024-09-18', 'Embárcate en una aventura de 9 días a Machu Picchu, Perú. Camina por el Camino Inca, explora las ruinas y conoce la cultura peruana. Precio: $170000.00 por persona.', 170000, 7),
(8, 'Venecia, Italia', '2024-10-05', '2024-10-12', 'Descubre la belleza de Venecia, Italia, durante 7 días. Viaja en góndola por los canales, visita la Plaza de San Marcos y saborea la gastronomía veneciana. Precio: $190000.00 por persona.', 190000, 8),
(9, 'Cancún, México', '2024-11-20', '2024-11-28', 'Relájate en Cancún, México, durante 9 días. Disfruta de playas de arena blanca, bucea en los arrecifes de coral y degusta la comida mexicana. Precio: $2300.00 por persona.', 230000, 9),
(10, 'Ámsterdam, Países Bajos', '2024-12-10', '2025-01-02', 'Explora Ámsterdam, Países Bajos, durante 24 días, durante las festividades de fin de año. Descubre los canales, visita el Museo Van Gogh y disfruta de la vida nocturna. Precio: $160000.00 por persona.', 160000, 10),
(11, 'París, Francia', '2024-03-15', '2024-03-22', 'Disfruta de una estancia de 7 días en la hermosa ciudad de París, Francia. Visita la Torre Eiffel, el Louvre y pasea por los encantadores bulevares parisinos. Precio: $150000.00 por persona.', 150000, 10),
(12, 'Nueva York, EE. UU.', '2024-04-10', '2024-04-18', 'Explora la Gran Manzana durante 8 días en Nueva York, Estados Unidos. Visita Times Square, Central Park y disfruta de un espectáculo en Broadway. Precio: $220000.00 por persona.', 220000, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_Cliente`);

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
  MODIFY `ID_Cliente` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `ID_Viaje` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
