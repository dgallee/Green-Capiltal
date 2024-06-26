-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2024 a las 10:28:51
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

--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Nombre` varchar(20) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Telefono` int(9) DEFAULT NULL,
  `DNI` varchar(9) NOT NULL PRIMARY KEY,
  `Usuario` varchar(20) NOT NULL,
  `Contrasena` varchar(300) DEFAULT NULL,
  `Tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Estructura de tabla para la tabla `productos`

CREATE TABLE `productos` (
  `Nombre` varchar(30) NOT NULL,
  `Id` varchar(3) NOT NULL PRIMARY KEY,
  `Resumen` text NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` decimal(4,2) NOT NULL,
  `Categoria` varchar(30) NOT NULL,
  `Existencias` int(2) NOT NULL,
  `Especie` varchar(30) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  `DniVendedor`varchar(9) NOT NULL,
  FOREIGN KEY (`DniVendedor`) REFERENCES usuarios(`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Estructura de tabla para la tabla `productos`

CREATE TABLE `carrito` (
    `Id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `DniUsuario` varchar(9) NOT NULL,
    `IdProducto` varchar(3) NOT NULL,
    `Cantidad` INT NOT NULL,
    `PrecioTotal` decimal(4,2) NOT NULL,
    FOREIGN KEY (`DniUsuario`) REFERENCES usuarios(`DNI`),
    FOREIGN KEY (`IdProducto`) REFERENCES productos(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


CREATE TABLE `pedidos` (
    `Id` INT NOT NULL,
    `DniUsuario` varchar(9) NOT NULL,
    `IdProducto` varchar(3) NOT NULL,
    `Unidades` INT NOT NULL,
    `PrecioTotal` decimal(4,2) NOT NULL,
    PRIMARY KEY (`Id`, `DniUsuario`, `IdProducto`),
    FOREIGN KEY (`DniUsuario`) REFERENCES usuarios(`DNI`),
    FOREIGN KEY (`IdProducto`) REFERENCES productos(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `valoraciones` (
   `DniUsuario` varchar(9) NOT NULL,
   `IdProducto` varchar(3) NOT NULL,
   `Puntuacion` INT,
   `Texto` TEXT,
    PRIMARY KEY (`DniUsuario`, `IdProducto`),
    CONSTRAINT `restriccionPuntuacion` CHECK (`Puntuacion` IN (1, 2, 3, 4, 5)),
    FOREIGN KEY (`DniUsuario`) REFERENCES `usuarios`(`DNI`),
    FOREIGN KEY (`IdProducto`) REFERENCES `productos`(`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
