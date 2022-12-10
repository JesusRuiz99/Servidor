-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2022 a las 09:08:07
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
-- Base de datos: `studium_dws_p2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juguetes`
--

CREATE TABLE `juguetes` (
  `idJuguete` int(11) NOT NULL,
  `nombreJuguete` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `precio` float NOT NULL,
  `idReyFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juguetes`
--

INSERT INTO `juguetes` (`idJuguete`, `nombreJuguete`, `precio`, `idReyFK`) VALUES
(1, 'Aula de ciencia: Robot Mini ERP', 159, 1),
(2, 'Carbón', 0, 1),
(3, 'Cochecito Classic', 99, 1),
(4, 'Consola PS4 1 TB', 349, 1),
(5, 'Lego Villa familiar modular', 64, 2),
(6, 'Magia Borrás Clásica 150 trucos con luz', 32, 2),
(7, 'Meccano Excavadora construcción', 30, 2),
(8, 'Nenuco Hace pompas', 29, 2),
(9, 'Peluche delfín rosa', 34, 2),
(10, 'Pequeordenador', 22, 3),
(11, 'Robot Coji', 69, 3),
(12, 'Telescopio astronómico terrestre', 72, 3),
(13, 'Twister', 17, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninoregalo`
--

CREATE TABLE `ninoregalo` (
  `idJugueteFK` int(11) NOT NULL,
  `idNinoFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ninoregalo`
--

INSERT INTO `ninoregalo` (`idJugueteFK`, `idNinoFK`) VALUES
(1, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 3),
(7, 3),
(8, 5),
(9, 4),
(10, 4),
(11, 5),
(12, 6),
(13, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ninos`
--

CREATE TABLE `ninos` (
  `idNino` int(11) NOT NULL,
  `nombreNino` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellidoNino` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `bueno` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ninos`
--

INSERT INTO `ninos` (`idNino`, `nombreNino`, `apellidoNino`, `fechaNacimiento`, `bueno`) VALUES
(1, 'Alberto', 'Alcántara', '1994-10-13', 0),
(2, 'Beatriz', 'Bueno', '1982-04-18', 1),
(3, 'Carlos', 'Crepo', '1998-12-01', 1),
(4, 'Diana', 'Domínguez', '1987-09-02', 0),
(5, 'Emilio', 'Enamorado', '1996-08-12', 1),
(6, 'Francisca', 'Fernández', '1990-07-28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reyes`
--

CREATE TABLE `reyes` (
  `idRey` int(11) NOT NULL,
  `nombreRey` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reyes`
--

INSERT INTO `reyes` (`idRey`, `nombreRey`) VALUES
(1, 'Melchor'),
(2, 'Gaspar'),
(3, 'Baltasar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juguetes`
--
ALTER TABLE `juguetes`
  ADD PRIMARY KEY (`idJuguete`),
  ADD KEY `idReyFK` (`idReyFK`);

--
-- Indices de la tabla `ninoregalo`
--
ALTER TABLE `ninoregalo`
  ADD KEY `idJugueteFK` (`idJugueteFK`),
  ADD KEY `idNinoFK` (`idNinoFK`);

--
-- Indices de la tabla `ninos`
--
ALTER TABLE `ninos`
  ADD PRIMARY KEY (`idNino`);

--
-- Indices de la tabla `reyes`
--
ALTER TABLE `reyes`
  ADD PRIMARY KEY (`idRey`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juguetes`
--
ALTER TABLE `juguetes`
  MODIFY `idJuguete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ninos`
--
ALTER TABLE `ninos`
  MODIFY `idNino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reyes`
--
ALTER TABLE `reyes`
  MODIFY `idRey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juguetes`
--
ALTER TABLE `juguetes`
  ADD CONSTRAINT `idReyFK` FOREIGN KEY (`idReyFK`) REFERENCES `reyes` (`idRey`);

--
-- Filtros para la tabla `ninoregalo`
--
ALTER TABLE `ninoregalo`
  ADD CONSTRAINT `idJugueteFK` FOREIGN KEY (`idJugueteFK`) REFERENCES `juguetes` (`idJuguete`),
  ADD CONSTRAINT `idNinoFK` FOREIGN KEY (`idNinoFK`) REFERENCES `ninos` (`idNino`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
