-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2024 a las 12:29:42
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
-- Base de datos: `greencapital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Nombre` varchar(30) NOT NULL,
  `Descripción` text NOT NULL,
  `Precio` decimal(4,2) NOT NULL,
  `Categoría` varchar(15) NOT NULL,
  `Existencias` int(2) NOT NULL,
  `Especie` varchar(30) NOT NULL,
  `Imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Nombre`, `Descripción`, `Precio`, `Categoría`, `Existencias`, `Especie`, `Imagen`) VALUES
('Bellis', 'Bella como su nombre indica', 4.99, 'Bellis', 14, 'Bellis', 'img/bellis.png'),
('Palmera cocotera', 'Ideal para cualquier hogar', 6.99, 'Palmeras', 12, 'Cocotera', 'img/palmera-cocotera.png'),
('Cyclamen', 'Aporta vida a tu jardín', 6.00, 'Cyclamen', 11, 'Cyclamen', 'img/cyclamen.png'),
('Dahlia', 'Luminosa y con presencia', 4.99, 'Dahlia', 22, 'Dahlia', 'img/dahlia.png'),
('Margarita dimorfoteca', 'La más especial de las margaritas', 5.99, 'Margarita', 18, 'Dimorfoteca', 'img/margarita-dimorfoteca.png'),
('Geranio', 'Fundamental para cualquier jardín', 3.99, 'Geranio', 18, 'Geranio', 'img/geranio.png'),
('Margarita blanca', 'Blanca y pura, básica para tu jardín', 3.99, 'Margaritas', 21, 'Margarita', 'img/margarita-blanca.png'),
('Muscari', 'Exótica y refinada', 3.99, 'Muscari', 20, 'Muscari', 'img/muscari.png'),
('Orquídea', 'Su forma y olor maravillan', 4.49, 'Orquidea', 24, 'Orquidea', 'img/orquidea.png'),
('Pensamiento', 'Pensarás que es una maravilla', 2.99, 'Pensamiento', 32, 'Pensamiento', 'img/pensamiento.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Especie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
