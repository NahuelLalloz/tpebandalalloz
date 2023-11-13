-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 23:16:37
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pelispagoood`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `director` varchar(256) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `genero` varchar(80) NOT NULL,
  `servicio_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `nombre`, `director`, `tipo`, `genero`, `servicio_fk`) VALUES
(2227, 'testpeli', 'aaa', 'Serie', 'Drama', 1),
(2228, 'aaaa', 'aaa', 'Serie', 'Drama', 1),
(2229, 'aaaa', 'aaa', 'Serie', 'Drama', 1),
(2230, 'aaaa', 'aaa', 'Serie', 'Drama', 1),
(2231, 'aaaa', 'aaa', 'Serie', 'Drama', 1),
(2232, 'aaaa', 'aaa', 'Serie', 'Drama', 1),
(2233, 'aaaa', 'aaa', 'Serie', 'Drama', 1),
(2235, 'aaaaaaaba', 'aaa', 'Serie', 'Drama', 1),
(2236, 'aabbaabbaa', 'aaa', 'Serie', 'Drama', 1),
(2237, 'aaaaaaaaaaaa', 'aaa', 'Serie', 'Drama', 1),
(2238, 'hola', 'aaa', 'Serie', 'Drama', 1),
(2239, 'trest', 'aaa', 'Serie', 'Drama', 1),
(2240, 'cuatro', 'aaa', 'Serie', 'Drama', 1),
(2241, 'juanalbertofernandez', 'aaa', 'Serie', 'Drama', 2224),
(2242, 'nueva', 'aaa', 'Serie', 'Drama', 1),
(2243, 'testpeli', 'aaa', 'Serie', 'Drama', 1),
(2244, 'nuevaedit', 'aaa', 'Serie', 'Drama', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_streaming`
--

CREATE TABLE `servicio_streaming` (
  `id_servicio_streaming` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicio_streaming`
--

INSERT INTO `servicio_streaming` (`id_servicio_streaming`, `nombre`) VALUES
(1, 'Dinsey'),
(2224, 'Netflix'),
(2225, 'Cuevana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'webadmin', '$2y$10$KFGlB8MMLJXGs2liUJnRAexQMfnICQgOZeoWYikR6oD8mQlkIanbS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `fk_servicio_streaming` (`servicio_fk`);

--
-- Indices de la tabla `servicio_streaming`
--
ALTER TABLE `servicio_streaming`
  ADD PRIMARY KEY (`id_servicio_streaming`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2245;

--
-- AUTO_INCREMENT de la tabla `servicio_streaming`
--
ALTER TABLE `servicio_streaming`
  MODIFY `id_servicio_streaming` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2229;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `fk_servicio_streaming` FOREIGN KEY (`servicio_fk`) REFERENCES `servicio_streaming` (`id_servicio_streaming`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
