DROP TABLE IF EXISTS `resenas`;
DROP TABLE IF EXISTS `exchanges`;
DROP TABLE IF EXISTS `post`;
DROP TABLE IF EXISTS `items`;
DROP TABLE IF EXISTS `mensajes`;
DROP TABLE IF EXISTS `chat`;
DROP TABLE IF EXISTS `usuario`;




CREATE TABLE usuario (
  idusuario int AUTO_INCREMENT PRIMARY KEY,
  NombreApellido varchar(70) NOT NULL,
  Email varchar(70) NOT NULL,
  psswd varchar(70) NOT NULL,
  IsAdmin int
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `chat` (
  `idChat` int NOT NULL,
  `Idusuario1` int NOT NULL,
  `Idusuario2` int NOT NULL,
  PRIMARY KEY (`idChat`),
  KEY `idu2_idx` (`Idusuario2`),
  KEY `idu1_idx` (`Idusuario1`),
  CONSTRAINT `idu1` FOREIGN KEY (`Idusuario1`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idu2` FOREIGN KEY (`Idusuario2`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mensajes` (
  `idmensajes` int NOT NULL,
  `IdC` int NOT NULL,
  `idusuario` int NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  PRIMARY KEY (`idmensajes`),
  KEY `idchat_idx` (`IdC`),
  KEY `idUs_idx` (`idusuario`),
  CONSTRAINT `idchat` FOREIGN KEY (`IdC`) REFERENCES `chat` (`idChat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idUs` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `items` (
  `id` int AUTO_INCREMENT NOT NULL,
  `idUs` int NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`idUs`),
  KEY `idusuario_idx` (`idUs`),
  CONSTRAINT `idusuario` FOREIGN KEY (`idUs`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `post` (
  `idPost` int AUTO_INCREMENT NOT NULL,
  `idPropietario` int NOT NULL,
  `idItem` int NOT NULL,
  `Categoria` enum('electrodomesticos','ropa','libros','tecnologia','colleccionismo','deporte','miscelano') NOT NULL,
  PRIMARY KEY (`idPost`,`idPropietario`,`idItem`),
  KEY `idprop_idx` (`idPropietario`),
  KEY `iditem_idx` (`idItem`),
  CONSTRAINT `iditem` FOREIGN KEY (`idItem`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_item_post` FOREIGN KEY (`idItem`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_propietario_post` FOREIGN KEY (`idPropietario`) REFERENCES `items` (`idUs`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idprop` FOREIGN KEY (`idPropietario`) REFERENCES `items` (`idUs`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `resenas` (
  `idresenas` int NOT NULL,
  `idpost` int NOT NULL,
  `idUsuario` int NOT NULL,
  `resena` varchar(200) NOT NULL,
  PRIMARY KEY (`idresenas`),
  KEY `idPost_idx` (`idpost`),
  KEY `idprop_idx` (`idUsuario`),
  CONSTRAINT `idPost` FOREIGN KEY (`idpost`) REFERENCES `post` (`idPost`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Idpropietario` FOREIGN KEY (`idUsuario`) REFERENCES `post` (`idPropietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `exchanges` (
    `idExchange` int AUTO_INCREMENT NOT NULL,
	  `idpost` int not NULL,
    `id_exchanged_item` int not NULL,
    `confirmation` boolean,
   PRIMARY KEY (`idExchange`),
	foreign key (`idpost`) references post(`idPost`) ON DELETE CASCADE ON UPDATE CASCADE
	
   
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
