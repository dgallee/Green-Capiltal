/*
  Recuerda que deshabilitar la opción "Enable foreign key checks" para evitar problemas a la hora de importar el script.
*/
TRUNCATE TABLE `usuarios`;

INSERT INTO `usuarios` (`Nombre`, `Apellidos`, `Correo`, `Dirección`, `Teléfono`, `DNI`, `Usuario`, `Contraseña`, `Tipo`) VALUES
('Admin', 'admin', 'admin@ucm.es', 'calle ejemplo nº1 2ºA', 666777888, '12345678O', 'admin', 'adminpass', 1),
('Álvaro', 'González-Barros Medina', 'barrosloveszaka@gmail.com', 'Calle ejemplo nº1, 2ºS', 675456623, '45633891B', 'barros', '1234', 1),
('User', 'user', 'user@ucm.es', 'calle ejemplo nº3 2ºB', 666111888, '87654321Q', 'user', 'userpass', 0);