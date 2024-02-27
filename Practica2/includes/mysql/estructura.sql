/*
  Recuerda que deshabilitar la opción "Enable foreign key checks" para evitar problemas a la hora de importar el script.
*/
DROP TABLE IF EXISTS `usuarios`;
DROP TABLE IF EXISTS `productos`;


CREATE TABLE IF NOT EXISTS `usuarios` (
  `Nombre` varchar(20) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Dirección` varchar(100) NOT NULL,
  `Teléfono` int(9) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Contraseña` varchar(20) NOT NULL,
  `Tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


CREATE TABLE IF NOT EXISTS `productos` (
  `Nombre` varchar(30) NOT NULL,
  `Descripción` text NOT NULL,
  `Precio` decimal(4,0) NOT NULL,
  `Categoría` varchar(15) NOT NULL,
  `Existencias` int(2) NOT NULL,
  `Especie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


ALTER TABLE `productos`
  ADD PRIMARY KEY (`Especie`);
COMMIT;

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`DNI`);
COMMIT;
