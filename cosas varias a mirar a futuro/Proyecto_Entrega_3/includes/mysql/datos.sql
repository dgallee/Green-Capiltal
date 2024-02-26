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



