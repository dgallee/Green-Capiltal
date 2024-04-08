--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono`, `DNI`, `Usuario`, `Contrasena`, `Tipo`) VALUES
('admin', 'admin', 'admin@ucm.es', '654891276', 666555111, '12345678O', 'admin', 'adminpass', 1),
('editar', 'editar', 'edit@gmail.com', 'calle ejemplo nº3 2ºQ', 666555444, '12365478Z', 'edit', 'editpass', 0),
('eliminar', 'eliminar', 'elim@gmail.com', 'calle ejemplo nº4 2ºS', 666234677, '76249815A', 'delete', 'deletepass', 0),
('user', 'user', 'user@ucm.es', 'calle ejemplo nº3 2ºB', 666111888, '87654321Q', 'user', 'userpass', 0);


INSERT INTO `productos` (`Nombre`, `Id`, `Resumen`, `Descripcion`, `Precio`, `Categoria`, `Existencias`, `Especie`, `Imagen`) VALUES
('Palmera cocotera', '001', 'Ideal para cualquier hogar', 'La palmera cocotera, símbolo tropical por excelencia, es una adición esencial para 
cualquier jardín o espacio exterior. Originaria de las regiones tropicales y subtropicales, esta majestuosa planta aporta un toque de exotismo 
y elegancia a cualquier entorno. Sus frondosas hojas verdes y su distintiva forma la convierten en una presencia imprescindible para crear un 
ambiente tropical y relajado. Con sus características hojas plumosas y su tronco alto y esbelto, la palmera cocotera ofrece una vista 
impresionante en cualquier paisaje. Además, sus frutos, los cocos, añaden un elemento decorativo y funcional al jardín. Esta planta prospera en 
climas cálidos y soleados, pero puede adaptarse a una variedad de condiciones. Es importante proporcionarle un suelo bien drenado y suficiente 
espacio para crecer. Durante los meses más cálidos del año, disfruta de su máximo esplendor, ofreciendo un refugio sombrío y fresco. En invierno, 
es recomendable protegerla de las heladas para asegurar su salud y vigor.', 6.99, 'Palmeras', 12, 'Cocotera', 'img/palmera-cocotera.png'),
('Cyclamen', '002', 'Aporta vida a tu jardín', 'Delicada y elegante planta bulbosa, el cyclamen es ideal para decorar nuestros balcones y jardines 
durante las épocas del año frescas o frías, ya que florece abundantemente entre otoño, invierno y primavera. De hojas carnosas y flores con colores 
intensos de tonos rojizos, lilas, rosas y blancos, es resistente al frío, a las heladas y a las nevadas en invierno y en espacios de sombra o 
semisombra se desarrolla muy bien en épocas más calurosas. El ciclamen es también resistente a la sequía.', 6.00, 'Cyclamen', 11, 'Cyclamen', 
'img/cyclamen.png'),
('Dahlia', '003', 'Luminosa y con presencia', 'La dahlia decorativa o flor de dahlia es una planta bulbosa anual que tiene una de las flores más 
bonitas que se puede poner en el jardín. Frondosa y delicada, florece durante toda la primavera y el verano. Flores en múltiples colores. Ideal 
para macetas o parterres.', 4.99, 'Flor', 22, 'Dahlia', 'img/dahlia.png'),
('Margarita dimorfoteca', '004', 'La más especial de las margaritas', 'La margarita dimorfoteca es una planta vivaz perenne que resiste los inviernos 
con heladas leves y poco duraderas, pero prefiere los climas cálidos de primavera y verano, que es cuando florece abundantemente. Tiene un rápido 
crecimiento y abundante floración similar a la margarita y las hojas verdes y tupidas. Las flores se abren con el sol y se cierran con la sombra. 
Desprenden una suave fragancia muy característica. Hay múltiples colores. Planta tupida y muy rústica que se suele cultivar en macetas o en el suelo 
directamente.', 5.99, 'Flor', 18, 'Dimorfoteca', 'img/margarita-dimorfoteca.png'),
('Geranio', '005', 'Fundamental para cualquier jardín', 'El geranio común, procedente de Sudáfrica, es la planta por excelencia para decorar balcones 
y terrazas. Tiene bonitas hojas de un verde oscuro manchado, y flores espectaculares que nos ofrece durante primavera, verano y otoño, y en muchos 
colores diferentes. Es una planta que destaca por su gran capacidad de floración. Recomendamos situarlo en un espacio de sol y caluroso en verano, 
en macetas y jardineras con bastante sustrato para que pueda desarrollarse hasta medidas de más de 50 cm de altura, pero se adapta a cualquier maceta, 
hasta la más pequeña. En invierno, debemos protegerlo de las heladas.', 3.99, 'Flor', 18, 'Geranio', 'img/geranio.png'),
('Margarita blanca', '006', 'Blanca y pura, básica para tu jardín', 'La margarita blanca es una planta arbustiva muy similar a la margarita pero más 
leñosa. También es margarita grande, mayor que las tradicionales, y se reproduce fácilmente. Sus flores también son mucho más grandes, sólo de color 
blanco con el botoncito amarillo. Llamada también margarita de la abuela. Muy resistente a las inclemencias del tiempo, en zonas templadas florece casi 
todo el año. Es resistente al pleno sol y también al frío siempre que no sea muy brusco y constante. Muy sufrida, utilizada en macetas y en parterres.',
3.99, 'Margaritas', 21, 'Margarita', 'img/margarita-blanca.png'),
('Muscari', '007', 'Exótica y refinada', 'Planta de origen mediterráneo, ideal para rocallas o en macetas, es autóctona de muchos de nuestros parajes y 
por lo tanto es de muy fácil cultivo. De plantación en otoño, florece en primavera. De riego moderado y sustrato muy drenado. Aunque su nombre 
científico es Muscari, popularmente se la conoce por Nazarenos. Esta planta de pequeñas flores, de un azul intenso – a veces blanco- y un agradable olor, 
pertenece a la familia de la liláceas.', 3.99, 'Flor', 20, 'Muscari', 'img/muscari.png'),
('Orquídea', '008', 'Su forma y olor maravillan', 'Las orquídeas son plantas fáciles de reconocer. Las orquídeas son plantas tropicales que se 
caracterizan por sus populares flores, con tres sépalos: dos pétalos y un lobelo, en donde se posa el insecto polinizador. Se trata de una planta 
monopodial, lo que significa que se desarrolla en un solo eje. Sus hojas nacen en la base de su tallo y suele haber entre 2 y 6. De color verde intenso,
son carnosas y crecen dispuestas muy cerca las unas de las otras. Las orquídeas se caracterizan también por sus raíces bastante gruesas, grandes y 
numerosas. Son plantas muy aromáticas y pueden cambiar su olor según la especie.', 4.49, 'Flor', 24, 'Orquidea', 'img/orquidea.png'),
('Pensamiento', '009', 'Pensarás que es una maravilla', 'Planta anual de floración muy dilatada en el tiempo. De las más utilizadas para la decoración 
del jardín en invierno. Muy resistente al frío y a las heladas, muy agradecida en floración. Pleno sol y resistente a la sequía. De todas las plantas
anuales de desarrollo invernal, el pensamiento es, sin duda, la más florida de todas. Es una planta híbrida ornamental obtenida de la especie silvestre 
Viola tricolor. No deja de florecer durante todo el invierno, llegando a su esplendor a finales de la estación inicios de primavera y es que, con los
primeros calores, la planta decae.', 2.99, 'Flor', 32, 'Pensamiento', 'img/pensamiento.png');