-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2024 a las 19:03:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wonderful_travel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continents`
--

CREATE TABLE `continents` (
  `id` int(11) NOT NULL,
  `nom_continent` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `continents`
--

INSERT INTO `continents` (`id`, `nom_continent`) VALUES
(1, 'Europa'),
(2, 'Amèrica'),
(3, 'Àsia'),
(4, 'Àfrica'),
(5, 'Oceania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paisos`
--

CREATE TABLE `paisos` (
  `id` int(11) NOT NULL,
  `nom_pais` varchar(100) DEFAULT NULL,
  `continent_id` int(11) NOT NULL,
  `preu` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paisos`
--

INSERT INTO `paisos` (`id`, `nom_pais`, `continent_id`, `preu`) VALUES
(1, 'Espanya', 1, 100.00),
(2, 'França', 1, 120.00),
(3, 'Alemanya', 1, 150.00),
(4, 'Itàlia', 1, 130.00),
(5, 'Portugal', 1, 110.00),
(6, 'Estats Units', 2, 200.00),
(7, 'Canadà', 2, 220.00),
(8, 'Mèxic', 2, 180.00),
(9, 'Brasil', 2, 210.00),
(10, 'Argentina', 2, 190.00),
(11, 'Japó', 3, 300.00),
(12, 'Xina', 3, 320.00),
(13, 'Índia', 3, 250.00),
(14, 'Corea del Sud', 3, 270.00),
(15, 'Tailàndia', 3, 260.00),
(16, 'Nigèria', 4, 350.00),
(17, 'Egipte', 4, 330.00),
(18, 'Sud-àfrica', 4, 340.00),
(19, 'Kenya', 4, 360.00),
(20, 'Marroc', 4, 370.00),
(21, 'Austràlia', 5, 400.00),
(22, 'Nova Zelanda', 5, 420.00),
(23, 'Fiji', 5, 380.00),
(24, 'Papua Nova Guinea', 5, 390.00),
(25, 'Samoa', 5, 410.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viatges`
--

CREATE TABLE `viatges` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `telefon` int(14) NOT NULL,
  `num_persones` int(2) NOT NULL,
  `data` date NOT NULL,
  `preu` int(11) NOT NULL,
  `pais_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paisos`
--
ALTER TABLE `paisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_IdContinent` (`continent_id`);

--
-- Indices de la tabla `viatges`
--
ALTER TABLE `viatges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PaisID` (`pais_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `continents`
--
ALTER TABLE `continents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `viatges`
--
ALTER TABLE `viatges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `paisos`
--
ALTER TABLE `paisos`
  ADD CONSTRAINT `FK_IdContinent` FOREIGN KEY (`continent_id`) REFERENCES `continents` (`id`);

--
-- Filtros para la tabla `viatges`
--
ALTER TABLE `viatges`
  ADD CONSTRAINT `FK_PaisID` FOREIGN KEY (`pais_id`) REFERENCES `paisos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
