SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `carrito` (
  `Id` int(11) NOT NULL,
  `DniUsuario` varchar(9) NOT NULL,
  `IdProducto` varchar(3) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioTotal` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `pedidos` (
  `Id` int(11) NOT NULL,
  `DniUsuario` varchar(9) NOT NULL,
  `IdProducto` varchar(3) NOT NULL,
  `Unidades` int(11) NOT NULL,
  `PrecioTotal` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `productos` (
  `Nombre` varchar(30) NOT NULL,
  `Id` varchar(3) NOT NULL,
  `Resumen` text NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` decimal(4,2) NOT NULL,
  `Categoria` varchar(30) NOT NULL,
  `Existencias` int(2) NOT NULL,
  `Especie` varchar(30) NOT NULL,
  `Imagen` varchar(100) NOT NULL,
  `DniVendedor` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `usuarios` (
  `Nombre` varchar(20) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Telefono` int(9) DEFAULT NULL,
  `DNI` varchar(9) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Contrasena` varchar(300) DEFAULT NULL,
  `salt` int(11) NOT NULL,
  `Tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `valoraciones` (
  `DniUsuario` varchar(9) NOT NULL,
  `IdProducto` varchar(3) NOT NULL,
  `Puntuacion` int(11) DEFAULT NULL,
  `Texto` text DEFAULT NULL
) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `DniUsuario` (`DniUsuario`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Id`,`DniUsuario`,`IdProducto`),
  ADD KEY `DniUsuario` (`DniUsuario`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `DniVendedor` (`DniVendedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`DniUsuario`,`IdProducto`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`DniUsuario`) REFERENCES `usuarios` (`DNI`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`Id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`DniUsuario`) REFERENCES `usuarios` (`DNI`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`Id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`DniVendedor`) REFERENCES `usuarios` (`DNI`);

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`DniUsuario`) REFERENCES `usuarios` (`DNI`),
  ADD CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`Id`);
COMMIT;