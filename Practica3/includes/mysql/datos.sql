--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono`, `DNI`, `Usuario`, `Contrasena`, `Tipo`) VALUES
('admin', 'admin', 'admin@ucm.es', '654891276', 666555111, '12345678O', 'admin', 'adminpass', 1),
('editar', 'editar', 'edit@gmail.com', 'calle ejemplo nº3 2ºQ', 666555444, '12365478Z', 'edit', 'editpass', 0),
('eliminar', 'eliminar', 'elim@gmail.com', 'calle ejemplo nº4 2ºS', 666234677, '76249815A', 'delete', 'deletepass', 0),
('user', 'user', 'user@ucm.es', 'calle ejemplo nº3 2ºB', 666111888, '87654321Q', 'user', 'userpass', 0);


INSERT INTO `productos` (`Nombre`, `Descripcion`, `Precio`, `Categoria`, `Existencias`, `Especie`, `Imagen`) VALUES
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
