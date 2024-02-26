/*
  Recuerda que deshabilitar la opción "Enable foreign key checks" para evitar problemas a la hora de importar el script.
  utf8mb4_general_ci
*/
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


INSERT INTO usuario (NombreApellido,email,psswd,IsAdmin)
VALUES("felipe","felipeye@ucm.es","$2y$10$wXqYnutGX5pzw3G/TIU2sO/F1wpNJBkn422tGJDo0fIUyer51rzhC",1);

INSERT INTO usuario (NombreApellido,email,psswd,IsAdmin)
VALUES("Jose","jose@gmail.com","$2y$10$wXqYnutGX5pzw3G/TIU2sO/F1wpNJBkn422tGJDo0fIUyer51rzhC",0);

INSERT INTO usuario (NombreApellido,email,psswd,IsAdmin)
VALUES("Juanjo","juanjo@gmail.com","$2y$10$wXqYnutGX5pzw3G/TIU2sO/F1wpNJBkn422tGJDo0fIUyer51rzhC",0);




INSERT INTO items(idUs,Nombre,Descripcion,Image)
VALUES(1,"Objeto de prueba","Esto es un objeto de prueba para la prueba de base de datos","img/imagen_prueba.png");

INSERT INTO items(idUs,Nombre,Descripcion,Image)
VALUES(1,"Libro de Harry Potter","Libro de harry potter donde aparece la serpiente, me interesa un algun libro de juego de tronos","img/libro_harry_potter.png");

INSERT INTO items(idUs,Nombre,Descripcion,Image)
VALUES(2,"Portatil Gaming","Portatil gaming con rtx 3070 16GB RAM 1TB HHD, me gustaria cambiarlo por una xbox ONE o una playstation 4","img/portatil.png");

INSERT INTO items(idUs,Nombre,Descripcion,Image)
VALUES(2,"Iphone 10","Iphone 10 nuevo 64GB 16GB RAM Camara de 24MP, quiero cambiarlo por un xiaomi nuevo a partir del año 2022","img/iphone-x.jpg");

INSERT INTO items(idUs,Nombre,Descripcion,Image)
VALUES(2,"Camiseta Futbol Messi","Camiset de Messi de la seleccion argentina, quiero cambiarlo por una camiseta de Mbappe del mundial","img/camiseta-messi.jpg");

INSERT INTO items(idUs,Nombre,Descripcion,Image)
VALUES(3,"Carta Pikachu X/Y","Carta pokemon de Pikachu comun, no tengo nada en mente con que intercambiarlo, sube tus cartas y vemos","img/carta-pikachu.png");

INSERT INTO items(idUs,Nombre,Descripcion,Image)
VALUES(3,"Raqueta Tenis","Raqueta Tenis, quiero cambiarlo por un set de ping pong","img/raqueta-tenis.jpg");

INSERT INTO items(idUs,Nombre,Descripcion,Image)
VALUES(3,"Parrilla","Encontre esta parrilla en el almacen de mi casa, querria intercambiarlo por algun otro utensilio de cocina","img/parrilla.jpg");

INSERT INTO items(idUs,Nombre,Descripcion,Image)
VALUES(2,"Carta Charizard","Quiero intercambiar esta carta por tu carta de pikachu","img/carta-charizard.jpg");

INSERT INTO items(idUs,Nombre,Descripcion,Image)
VALUES(2,"Set de ping pong","Me interesa tus raquetas de tenis","img/pingpong.jpg");

INSERT INTO items(idUs,Nombre,Descripcion,Image)
VALUES(3,"xiaomi 13","te cambio el iphone 10 por este xioami 13","img/xiaomi13.png");


INSERT INTO post(idPropietario,idItem,Categoria)
VALUES(1,1,"miscelano");

INSERT INTO post(idPropietario,idItem,Categoria)
VALUES(1,2,"libros");

INSERT INTO post(idPropietario,idItem,Categoria)
VALUES(2,3,"tecnologia");

INSERT INTO post(idPropietario,idItem,Categoria)
VALUES(2,4,"tecnologia");

INSERT INTO post(idPropietario,idItem,Categoria)
VALUES(2,5,"ropa");

INSERT INTO post(idPropietario,idItem,Categoria)
VALUES(3,6,"colleccionismo");

INSERT INTO post(idPropietario,idItem,Categoria)
VALUES(3,7,"deporte");

INSERT INTO post(idPropietario,idItem,Categoria)
VALUES(3,8,"miscelano");



INSERT INTO exchanges(idpost,id_exchanged_item,confirmation)
VALUES(6,9,0);

INSERT INTO exchanges(idpost,id_exchanged_item,confirmation)
VALUES(4,11,0);



