--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono`, `DNI`, `Usuario`, `Contrasena`, `Tipo`) VALUES
('Paula', 'Smith', 'paulaswiftie@gmail.com', 'Calle Houston 33', 627389200, '01176545P', 'paula', '$2y$10$.VtCr9rLogtsmAgB4cLxue.wQqOPpkc5viDcmW404C3i0NUGyvLki', 0),
('Marta', 'Fernandez', 'martamoderadora@gmail.com', 'Calle de Abril 1', 627356281, '03922174L', 'marta', '$2y$10$0yfXdQNiCy./LVPg2OEYx.jg80b6MEmyeENY9OxNKRx7w.nGh1uyK', 3),
('Luisa', 'Sanchez', 'luisavende@gmail.com', 'Calle Zagreb 2', 627819283, '03942572N', 'luisa', '$2y$10$MXPbo/qeGn0t9ZNWOlFY8eyQD2fUx1ZH18/SmOoEiUI61/R/IpnAq', 2),
('Pablo', 'Martin', 'pablovendeplantas@gmail.com', 'Calle del Artista 22', 678564391, '06374892W', 'pablo', '$2y$10$bdVckt.NNhWlTcRsMWkLPewhXD1YtCY2kTA2kvdR3zhWpMsa7mvti', 2),
('Javier', 'Arriaga', 'javier29@ucm.es', 'Calle de Madrid 23', 654728903, '07263744R', 'javier', '$2y$10$JKTPEfXGPH1qGhTaSzWotez..aBKDOhBZn5l.CCjDlWFtp2dh1jOa', 3),
('Sofia', 'Torres', 'sofcompradora@gmail.com', 'Calle Londres 9', 637488762, '08765483T', 'sofia', '$2y$10$nqTm4bEpO4E3lX0vkJ/qh.yXQ9SdXyZgR3c.9UJP60S5V.6GIm0Di', 0),
('admin', 'admin', 'admin@ucm.es', 'Calle Brasilia 3', 666555111, '12345678O', 'admin', '$2y$10$GpoDTA8.i9gygcwuuDPG5usUCdw5cpMngs.Wa8uDsYpQK0ugw.y0u', 1),
('Victor', 'Murillo', 'victor33@gmail.com', 'Calle del Misterio 11', 628930043, '14248573R', 'victor', '$2y$10$aZk7zU1yBhEfFouJIPEh9e3wANmCuwN/5RnNnyh0vLubIq2NFetqu', 0),
('user', 'surname', 'user@ucm.es', 'Calle Tokyo 31', 666111888, '87654321Q', 'user', '$2y$10$1kGi7DsGgFhEB73Ppmu.DuKbxgJd.b5La42LCc67otKSk7KQriBpS', 0),
('Mario', 'Perez', 'marioperez@gmail.com', 'Calle Europa 12', 626839201, '92837465Q', 'mario', '$2y$10$PT0A.IeDYJfJi4oWV2ey8uy4eyLnfo63nOewV0dLzKQDt5zMrx.ee', 2);

INSERT INTO `productos` (`Nombre`, `Id`, `Resumen`, `Descripcion`, `Precio`, `Categoria`, `Existencias`, `Especie`, `Imagen`, `DniVendedor`) VALUES
('Palmera cocotera', '001', 'Ideal para cualquier hogar', 'La palmera cocotera, símbolo tropical por excelencia, es una adición esencial para 
cualquier jardín o espacio exterior. Originaria de las regiones tropicales y subtropicales, esta majestuosa planta aporta un toque de exotismo 
y elegancia a cualquier entorno. Sus frondosas hojas verdes y su distintiva forma la convierten en una presencia imprescindible para crear un 
ambiente tropical y relajado. Con sus características hojas plumosas y su tronco alto y esbelto, la palmera cocotera ofrece una vista 
impresionante en cualquier paisaje. Además, sus frutos, los cocos, añaden un elemento decorativo y funcional al jardín. Esta planta prospera en 
climas cálidos y soleados, pero puede adaptarse a una variedad de condiciones. Es importante proporcionarle un suelo bien drenado y suficiente 
espacio para crecer. Durante los meses más cálidos del año, disfruta de su máximo esplendor, ofreciendo un refugio sombrío y fresco. En invierno, 
es recomendable protegerla de las heladas para asegurar su salud y vigor.', 6.99, 'Plantas exóticas', 12, 'Cocotera', 'img/palmera-cocotera.png', '03942572N'),
('Cyclamen', '002', 'Aporta vida a tu jardín', 'Delicada y elegante planta bulbosa, el cyclamen es ideal para decorar nuestros balcones y jardines 
durante las épocas del año frescas o frías, ya que florece abundantemente entre otoño, invierno y primavera. De hojas carnosas y flores con colores 
intensos de tonos rojizos, lilas, rosas y blancos, es resistente al frío, a las heladas y a las nevadas en invierno y en espacios de sombra o 
semisombra se desarrolla muy bien en épocas más calurosas. El ciclamen es también resistente a la sequía.', 6.00, 'Plantas de interior', 11, 'Cyclamen', 
'img/cyclamen.png', '06374892W'),
('Dahlia', '003', 'Luminosa y con presencia', 'La dahlia decorativa o flor de dahlia es una planta bulbosa anual que tiene una de las flores más 
bonitas que se puede poner en el jardín. Frondosa y delicada, florece durante toda la primavera y el verano. Flores en múltiples colores. Ideal 
para macetas o parterres.', 4.99, 'Plantas de exterior', 22, 'Dahlia', 'img/dahlia.png', '92837465Q'),
('Margarita dimorfoteca', '004', 'La más especial de las margaritas', 'La margarita dimorfoteca es una planta vivaz perenne que resiste los inviernos 
con heladas leves y poco duraderas, pero prefiere los climas cálidos de primavera y verano, que es cuando florece abundantemente. Tiene un rápido 
crecimiento y abundante floración similar a la margarita y las hojas verdes y tupidas. Las flores se abren con el sol y se cierran con la sombra. 
Desprenden una suave fragancia muy característica. Hay múltiples colores. Planta tupida y muy rústica que se suele cultivar en macetas o en el suelo 
directamente.', 5.99, 'Plantas exóticas', 18, 'Dimorfoteca', 'img/margarita-dimorfoteca.png', '03942572N'),
('Geranio', '005', 'Fundamental para cualquier jardín', 'El geranio común, procedente de Sudáfrica, es la planta por excelencia para decorar balcones 
y terrazas. Tiene bonitas hojas de un verde oscuro manchado, y flores espectaculares que nos ofrece durante primavera, verano y otoño, y en muchos 
colores diferentes. Es una planta que destaca por su gran capacidad de floración. Recomendamos situarlo en un espacio de sol y caluroso en verano, 
en macetas y jardineras con bastante sustrato para que pueda desarrollarse hasta medidas de más de 50 cm de altura, pero se adapta a cualquier maceta, 
hasta la más pequeña. En invierno, debemos protegerlo de las heladas.', 3.99, 'Plantas de exterior', 18, 'Geranio', 'img/geranio.png', '06374892W'),
('Margarita blanca', '006', 'Blanca y pura, básica para tu jardín', 'La margarita blanca es una planta arbustiva muy similar a la margarita pero más 
leñosa. También es margarita grande, mayor que las tradicionales, y se reproduce fácilmente. Sus flores también son mucho más grandes, sólo de color 
blanco con el botoncito amarillo. Llamada también margarita de la abuela. Muy resistente a las inclemencias del tiempo, en zonas templadas florece casi 
todo el año. Es resistente al pleno sol y también al frío siempre que no sea muy brusco y constante. Muy sufrida, utilizada en macetas y en parterres.',
3.99, 'Flores de temporada', 21, 'Margarita', 'img/margarita-blanca.png', '92837465Q'),
('Muscari', '007', 'Exótica y refinada', 'Planta de origen mediterráneo, ideal para rocallas o en macetas, es autóctona de muchos de nuestros parajes y 
por lo tanto es de muy fácil cultivo. De plantación en otoño, florece en primavera. De riego moderado y sustrato muy drenado. Aunque su nombre 
científico es Muscari, popularmente se la conoce por Nazarenos. Esta planta de pequeñas flores, de un azul intenso – a veces blanco- y un agradable olor, 
pertenece a la familia de la liláceas.', 3.99, 'Plantas de interior', 20, 'Muscari', 'img/muscari.png', '03942572N'),
('Orquídea', '008', 'Su forma y olor maravillan', 'Las orquídeas son plantas fáciles de reconocer. Las orquídeas son plantas tropicales que se 
caracterizan por sus populares flores, con tres sépalos: dos pétalos y un lobelo, en donde se posa el insecto polinizador. Se trata de una planta 
monopodial, lo que significa que se desarrolla en un solo eje. Sus hojas nacen en la base de su tallo y suele haber entre 2 y 6. De color verde intenso,
son carnosas y crecen dispuestas muy cerca las unas de las otras. Las orquídeas se caracterizan también por sus raíces bastante gruesas, grandes y 
numerosas. Son plantas muy aromáticas y pueden cambiar su olor según la especie.', 4.49, 'Plantas de interior', 24, 'Orquidea', 'img/orquidea.png', '06374892W'),
('Pensamiento', '009', 'Pensarás que es una maravilla', 'Planta anual de floración muy dilatada en el tiempo. De las más utilizadas para la decoración 
del jardín en invierno. Muy resistente al frío y a las heladas, muy agradecida en floración. Pleno sol y resistente a la sequía. De todas las plantas
anuales de desarrollo invernal, el pensamiento es, sin duda, la más florida de todas. Es una planta híbrida ornamental obtenida de la especie silvestre 
Viola tricolor. No deja de florecer durante todo el invierno, llegando a su esplendor a finales de la estación inicios de primavera y es que, con los
primeros calores, la planta decae.', 2.99, 'Plantas de interior', 32, 'Pensamiento', 'img/pensamiento.png', '92837465Q'),
('Pothos', '010', 'Sus hojas derrochan amor', 'Los pothos, también conocidos como Epipremnum aureum, son plantas de interior muy populares y fáciles de cuidar. Estas plantas se distinguen 
por sus hojas grandes y brillantes en forma de corazón que pueden tener variaciones de color, desde verde oscuro hasta verde claro con manchas blancas o 
amarillas.Originarias de las regiones tropicales del sudeste asiático, los pothos son apreciados por su capacidad de adaptación a diferentes condiciones de 
luz y humedad. Son plantas trepadoras que pueden crecer en vertical o colgar, lo que las hace perfectas para decorar estanterías, repisas o cestas colgantes. 
Las hojas del pothos nacen en tallos largos y delgados que pueden crecer hasta varios metros de longitud. Son hojas gruesas y carnosas que crecen en una 
disposición alterna a lo largo del tallo. Además, tienen la capacidad de purificar el aire al absorber toxinas como el formaldehído, el xileno y el benceno. 
El pothos es una planta resistente que puede prosperar con poca luz y riego ocasional. Sus raíces son gruesas y numerosas, lo que le permite absorber la 
humedad del sustrato y del aire circundante. Además, es una planta que puede propagarse fácilmente a partir de esquejes de tallo en agua o sustrato.', 4.99, 
'Plantas de interior', 25, 'Pothos', 'img/pothos.png', '03942572N'),
('Lavanda', '011', 'Aroma relajante y belleza natural', 'La lavanda, conocida científicamente como Lavandula angustifolia, es una planta aromática y ornamental muy 
apreciada en jardinería y en la industria de la perfumería. Originaria de las regiones mediterráneas, la lavanda es famosa por su aroma dulce y floral, 
así como por sus hermosas espigas de flores de color violeta. Las características más distintivas de la lavanda son sus hojas estrechas y plateadas, y sus 
espigas de flores que se alzan sobre tallos delgados y leñosos. Las flores de lavanda están formadas por pequeñas florecillas que crecen en racimos densos, lo 
que le confiere su distintivo aspecto y fragancia. La lavanda es una planta perenne que florece durante la primavera y el verano, atrayendo a abejas y mariposas 
con su dulce aroma. Además de su belleza ornamental, la lavanda es apreciada por su uso en aromaterapia y en la fabricación de productos de cuidado personal y del 
hogar, como aceites esenciales, jabones, y sachets. En cuanto a su cultivo, la lavanda prefiere suelos bien drenados y soleados. Es una planta resistente a la 
sequía y relativamente fácil de cuidar una vez establecida. Sus hojas son aromáticas y liberan su fragancia cuando se las roza suavemente. Además, la lavanda puede 
ser podada después de la floración para mantener su forma compacta y promover un nuevo crecimiento. En resumen, la lavanda es una planta versátil y encantadora que 
no solo embellece los jardines con su exuberante follaje y sus delicadas flores, sino que también aporta un aroma relajante y agradable que la convierte en una favorita 
tanto para jardineros como para amantes de la aromaterapia.', 3.49, 'Plantas de exterior', 27, 'Lavanda', 'img/lavanda.png', '06374892W'),
('Cactus Euphorbia', '012', 'Exótica, resistente y llena de personalidad', 'La Euphorbia, también conocida como "cactus africano" o "planta candelabro", es una planta suculenta que se 
caracteriza por su apariencia exótica y su facilidad de cuidado. Aunque a menudo se confunde con los cactus debido a su aspecto espinoso, la Euphorbia no es realmente 
un cactus, sino un tipo de planta suculenta originaria de África. Esta planta presenta tallos gruesos y columnares que crecen verticalmente, ramificándose en forma de 
candelabro. A lo largo de los tallos, desarrolla espinas afiladas que le proporcionan una apariencia peculiar y una defensa natural contra los depredadores. Durante la 
primavera y el verano, la Euphorbia puede producir pequeñas flores de color verde o amarillo en la parte superior de sus tallos. La Euphorbia es una planta de bajo 
mantenimiento que requiere poco riego y luz solar indirecta. Es ideal para decorar interiores soleados o patios y terrazas exteriores. Sin embargo, es importante 
manipularla con cuidado, ya que su savia lechosa puede ser tóxica y causar irritación en la piel y los ojos.', 12.99, 'Plantas exóticas', 18, 'Cactus', 'img/cactuseuphorbia.png', '92837465Q'),
('Amapola', '013', 'Belleza efímera e inolvidable', 'La amapola, conocida científicamente como Papaver rhoeas, es una flor silvestre de belleza efímera pero impactante. Su vibrante 
color rojo intenso y sus delicados pétalos hacen que sea una de las flores más reconocibles y apreciadas en jardinería y arte floral. Esta planta anual se caracteriza por sus tallos 
delgados que pueden alcanzar alturas de hasta 60 cm. Las flores de la amapola tienen forma de copa, con pétalos sedosos y brillantes que rodean un centro oscuro de estambres. 
Florecen durante la primavera y el verano, creando espectaculares mantos de color en campos y prados. La amapola es una planta fácil de cultivar que prefiere suelos bien drenados 
y soleados. Se siembra fácilmente a partir de semillas y es una excelente opción para añadir un toque de color a jardines, bordes de caminos o macetas. Además de su belleza 
ornamental, la amapola tiene un significado simbólico en muchas culturas, asociada con el recuerdo y la esperanza.', 7.99, 'Flores de temporada', 25, 'Amapola', 'img/amapola.png', '03942572N'),
('Tulipán', '014', 'La joya de la primavera', 'El tulipán, conocido científicamente como Tulipa, es una de las flores más emblemáticas y apreciadas en todo el mundo. Originario de 
Asia Central, el tulipán es conocido por sus brillantes y coloridas flores en forma de copa que florecen en primavera, iluminando jardines, parques y paisajes con su belleza 
efímera. Los tulipanes presentan una amplia variedad de colores y formas, desde los clásicos tonos rojos, amarillos y blancos hasta los más exóticos púrpuras, naranjas y multicolores. 
Sus tallos erectos pueden alcanzar alturas que van desde unos pocos centímetros hasta más de un metro, dependiendo de la variedad. Estas flores bulbosas son fáciles de cultivar y 
se adaptan a una amplia gama de climas y suelos bien drenados. Se plantan en otoño para florecer en primavera, y aunque su floración es breve, su impacto visual es inolvidable. Los 
tulipanes también son populares como flores cortadas, utilizadas en arreglos florales y ramos.', 5.99, 'Flores de temporada', 31, 'Tulipán', 'img/tulipan.png', '06374892W'),
('Girasol', '015', 'Ilumina tu día con su energía', 'El girasol, conocido científicamente como Helianthus annuus, es una de las flores más emblemáticas y reconocibles del mundo. Originario 
de América del Norte, el girasol es famoso por su gran tamaño, brillante color amarillo y su capacidad para seguir la trayectoria del sol a lo largo del día. El girasol es una planta 
anual que puede crecer hasta alcanzar alturas impresionantes, superando fácilmente los dos metros en condiciones óptimas. Sus tallos robustos y peludos soportan grandes cabezas 
florales compuestas por cientos de pequeñas flores dispuestas en espiral alrededor de un disco central. Estas flores no solo son hermosas, sino que también son una fuente valiosa de 
alimento para las abejas y otros polinizadores. Además de su belleza ornamental, el girasol es apreciado por su utilidad en la agricultura y la alimentación. Sus semillas, que se 
encuentran en el centro de la cabeza floral, son ricas en nutrientes y se pueden comer crudas o tostadas, y también se utilizan para hacer aceite de girasol.', 3.79, 
'Plantas de exterior', 42, 'Girasol', 'img/girasol.png', '92837465Q'),
('Petunia', '016', 'Vibrante, alegre y muy colorida', 'La petunia, conocida científicamente como Petunia x hybrida, es una planta ornamental muy popular en jardinería debido 
a su abundante floración y su amplia variedad de colores. Originaria de América del Sur, la petunia es una planta perenne cultivada como anual en la mayoría de las regiones 
debido a su sensibilidad al frío. Las petunias producen flores en forma de trompeta que pueden ser simples o dobles, y vienen en una amplia gama de colores que incluyen tonos 
de rosa, morado, blanco, rojo, y hasta bicolor. Pueden tener un aroma suave y agradable, y su floración se extiende desde la primavera hasta finales del verano, añadiendo un toque 
de color a jardines, balcones y macetas. Estas plantas son fáciles de cuidar y prefieren suelos bien drenados y pleno sol para florecer en su máximo esplendor. Además de ser 
cultivadas en macetas y jardineras, las petunias también son populares como flores de borde y cubre-suelos en jardines.', 6.99, 'Plantas de exterior', 25, 'Petunia', 'img/petunia.png', '03942572N'),
('Ave del Paraiso', '017', 'Sus hojas derrochan amor', 'La Ave del Paraíso, conocida científicamente como Strelitzia reginae, es una planta tropical majestuosa y exótica que cautiva 
con su llamativa apariencia y sus flores únicas. Originaria de Sudáfrica, esta planta perenne pertenece a la familia Strelitziaceae y es apreciada en todo el mundo por su distintivo 
aspecto de "ave en vuelo" y sus flores de colores brillantes. La principal característica de la Ave del Paraíso es su inflorescencia, que se asemeja a la cabeza de un ave exótica. 
Sus flores consisten en tres sépalos naranjas y tres pétalos azules que emergen de una espata en forma de pluma, creando una apariencia única y espectacular. Estas flores pueden durar 
semanas o incluso meses en la planta, y son atractivas para los polinizadores. Además de sus flores, la Ave del Paraíso también se distingue por su follaje de hojas grandes y coriáceas, 
que crecen en forma de abanico desde la base de la planta. Estas hojas son de color verde intenso y añaden un toque tropical al paisaje. Aunque la Ave del Paraíso es originaria de climas 
cálidos, puede cultivarse con éxito en climas más templados en macetas o en el suelo, siempre que se proteja de las heladas. Es una planta resistente y de bajo mantenimiento que prospera 
en suelos bien drenados y con riego moderado.', 13.49, 'Plantas exóticas', 25, 'Strelitzia reginae', 'img/avedelparaiso.png', '06374892W'),
('Planta Araña', '018', 'Arácnida pero sutil ', 'La planta araña, también conocida como Clorophytum comosum, es una belleza natural que irradia frescura y vitalidad en cualquier espacio. 
Originaria de Sudáfrica, esta planta perenne pertenece a la familia Asparagaceae y es apreciada en todo el mundo por su encantador follaje en forma de araña y sus propiedades purificadoras 
de aire. Sus hojas largas y delgadas, que crecen en forma de cascada desde el centro de la planta, aportan un toque de frescura y elegancia a cualquier ambiente. La planta araña es fácil 
de cuidar y se adapta a una amplia gama de condiciones de luz y temperatura. Con su capacidad para eliminar toxinas del aire y su aspecto exuberante, es la elección perfecta para añadir 
un toque de verdor a tu hogar u oficina.', 6.29, 'Plantas de interior', 16, 'Chlorophytum comosum', 'img/plantaarana.png', '92837465Q'),
('Ramo de Narcisos', '019', 'Enamoran a cualquiera', 'Los narcisos, conocidos científicamente como Narcissus, son una verdadera señal de la llegada de la primavera. Estas encantadoras 
flores, nativas de Europa y Asia, pertenecen a la familia Amaryllidaceae y son apreciadas en todo el mundo por su belleza y fragancia. Las flores de los narcisos vienen en una variedad 
de colores y formas, desde tonos brillantes de amarillo hasta blancos puros y naranjas vibrantes. Con sus tallos altos y delgados y sus flores en forma de trompeta, los narcisos añaden un 
toque de alegría y color a cualquier jardín o espacio interior. Estas plantas perennes son fáciles de cultivar y prosperan en una amplia gama de condiciones climáticas. Además de su belleza 
estética, los narcisos también son apreciados por su resistencia y longevidad, con flores que pueden durar varias semanas en la planta. Añade un toque de primavera a tu vida con los encantadores 
narcisos, una elección perfecta para iluminar cualquier paisaje o florero.', 22.99, 'Flores de temporada', 12, 'Narcissus', 'img/narcisos.png', '03942572N'),
('Maceta de Jacintos', '020', 'Fragancia que enamora y belleza que perdura', 'Los jacintos, científicamente conocidos como Hyacinthus, son una exquisita obra maestra de la naturaleza. 
Originarios de la región mediterránea y del Medio Oriente, estos bulbos pertenecen a la familia Asparagaceae y son apreciados en todo el mundo por su fragancia embriagadora y su belleza única. 
Las flores de los jacintos vienen en una amplia gama de colores, desde el azul intenso hasta el blanco puro, pasando por tonos rosados y morados, llenando el aire con su aroma dulce y delicado. 
Los tallos altos y erectos de los jacintos sostienen racimos compactos de flores en forma de campana, creando un espectáculo encantador en jardines y arriates. Estas plantas perennes son fáciles 
de cultivar y florecen en primavera, trayendo consigo la promesa de la nueva vida y la renovación. Con su fragancia embriagadora y su elegante apariencia, los jacintos son la elección perfecta 
para dar un toque de encanto y sofisticación a cualquier espacio.', 18.99, 'Flores de temporada', 19, 'Hyacinthus', 'img/jacintos.png', '06374892W'),
('Dracaena', '021', 'Elegancia verde para tu hogar', 'La Dracaena, una joya entre las plantas de interior, es un símbolo de elegancia y estilo en cualquier espacio. Conocida científicamente 
como Dracaena, esta planta tropical es originaria de África y pertenece a la familia Asparagaceae. Sus largas hojas lanceoladas, que crecen en espiral desde tallos delgados y erguidos, añaden 
un toque de frescura y sofisticación a cualquier ambiente. La Dracaena viene en una variedad de formas y colores, desde tonos vibrantes de verde hasta combinaciones de verde y amarillo, lo que 
la convierte en una opción versátil para cualquier decoración. Además de su belleza estética, la Dracaena es una planta de interior fácil de cuidar que prospera en condiciones de luz media a 
brillante y requiere un riego moderado. Con su capacidad para purificar el aire y su aspecto elegante, la Dracaena es la elección perfecta para añadir un toque de naturaleza y frescura a tu hogar 
u oficina.', 11.99, 'Plantas de interior', 39, 'Dracaena', 'img/dracaena.png', '92837465Q'),
('Aloe Vera', '022', 'Naturalidad y cuidado en cada hoja', 'El Aloe vera, también conocido como sábila, es una planta suculenta que ha cautivado a la humanidad durante siglos por sus innumerables 
beneficios para la salud y la belleza. Originaria de África, esta planta perenne pertenece a la familia Asphodelaceae y es apreciada en todo el mundo por su capacidad para sanar, hidratar y 
revitalizar la piel y el cuerpo. Las hojas carnosas y puntiagudas del Aloe vera contienen un gel transparente lleno de vitaminas, minerales y antioxidantes, que se utiliza en una variedad de 
productos cosméticos y medicinales. Desde la cicatrización de heridas hasta el tratamiento de quemaduras solares y la hidratación de la piel, el Aloe vera es una solución natural para muchos 
problemas comunes de la piel. Además de sus beneficios para la salud, esta planta resistente es fácil de cuidar y prospera en una amplia gama de condiciones climáticas. Con su aspecto distintivo 
y sus propiedades curativas, el Aloe vera es una adición imprescindible para cualquier jardín o hogar consciente de la salud y la belleza natural.', 7.99, 'Plantas exóticas', 24, 'Aloe Vera', 'img/aloevera.png', '12345678O'),
('Ramo de Rosas Blancas', '023', 'Puras y blancas como la nieve', 'Un ramo de rosas blancas es la personificación misma de la elegancia y la pureza. Cada rosa, con su tallo largo y delicado, sostiene un 
capullo blanco como la nieve que se despliega en una flor exquisitamente perfumada. Estas hermosas flores, símbolo de amor y respeto, son una declaración de gracia y refinamiento. El blanco puro de las 
rosas transmite una sensación de serenidad y paz, mientras que su aroma embriagador llena el aire con su dulzura. Regalar un ramo de rosas blancas es ofrecer un gesto de admiración y devoción, una expresión 
de afecto sincero y profundo. Ya sea para una ocasión especial o simplemente para transmitir tus sentimientos más sinceros, un ramo de rosas blancas es siempre 
una elección atemporal y elegante.', 12.99, 'Flores de temporada', 19, 'Rosa', 'img/rosasblancas.png', '12345678O'),
('Ramo de Rosas Rojas', '024', 'La pasión siempre es roja', 'Un ramo de rosas rojas es la encarnación misma del romance y la pasión. Cada rosa, con su color intenso y sus pétalos sedosos, representa 
el amor ardiente y la devoción eterna. Estas flores, símbolo clásico del amor apasionado, transmiten emociones profundas y sinceras con cada fragancia embriagadora. El rojo vibrante de las rosas evoca 
la calidez del corazón y la llama del deseo, creando una atmósfera de romance y ternura. Regalar un ramo de rosas rojas es expresar un amor apasionado y una conexión profunda, un gesto que nunca pasa 
de moda y que siempre es bien recibido. Ya sea para celebrar una ocasión especial o simplemente para decir "te quiero", un ramo de rosas rojas es la elección perfecta para derretir corazones y hacer 
que el amor florezca.', 11.99, 'Flores de temporada', 22, 'Rosa', 'img/rosasrojas.png', '12345678O'),
('Sansevieria', '025', 'Verde que inspira tranquilidad', 'La Sansevieria, también conocida como lengua de suegra, es una planta que irradia elegancia y serenidad en cualquier espacio. Con sus hojas 
largas y erectas en forma de espada, la Sansevieria añade un toque de frescura y sofisticación a cualquier hogar u oficina. Originaria de África y Asia, esta planta pertenece a la familia Asparagaceae 
y es apreciada en todo el mundo por su fácil cuidado y sus propiedades purificadoras de aire. La Sansevieria es una planta resistente que prospera en una amplia gama de condiciones de luz y temperatura, 
lo que la convierte en la elección perfecta para aquellos que buscan una planta de interior de bajo mantenimiento. Además de su belleza estética, la Sansevieria también se sabe que mejora la calidad del 
aire al absorber toxinas y liberar oxígeno durante la noche, lo que la convierte en una compañera ideal para promover un ambiente saludable y relajante.', 8.99, 'Plantas de interior', 17, 'Sansevieria', 'img/sansevieria.png', '12345678O'),
('Hibisco', '026', 'Flores que despiertan tus sentidos', 'El Hibisco, una maravilla tropical, es una explosión de color y vitalidad en cualquier jardín. Conocido científicamente como Hibiscus rosa-sinensis, 
esta planta perenne pertenece a la familia Malvaceae y es apreciada en todo el mundo por sus flores grandes y llamativas que vienen en una variedad de colores vibrantes como el rojo, rosa, amarillo y naranja. 
Las flores del Hibisco, con sus pétalos suaves y ondulados y su centro prominente, son una invitación irresistible para los polinizadores y los amantes de la jardinería por igual. Además de su belleza estética, 
el Hibisco es apreciado por sus propiedades medicinales y culinarias. Las flores se utilizan en infusiones y tés que se valoran por sus beneficios para la salud, como el alivio del estrés y la mejora de la salud 
cardiovascular. Además, el Hibisco es una planta resistente que prospera en climas cálidos y soleados, añadiendo un toque exótico y tropical a cualquier paisaje. Déjate cautivar por la belleza y el encanto del 
Hibisco y deja que sus flores despierten tus sentidos y alegría en tu jardín.', 7.49, 'Plantas de exterior', 37, 'Hibiscus', 'img/hibisco.png', '12345678O'),
('Clavel', '027', 'La clave de tu jardín', 'Los claveles, con su belleza atemporal y fragancia embriagadora, son la personificación misma de la elegancia y el encanto. Estas flores, conocidas científicamente 
como Dianthus caryophyllus, son apreciadas en todo el mundo por sus pétalos suaves y ondulados que vienen en una variedad de colores vibrantes, incluyendo el blanco, rojo, rosa, amarillo y púrpura. Ya sea en 
un ramo, en un jardín o como adorno en un evento especial, los claveles añaden un toque de distinción y sofisticación a cualquier ocasión. Su fragancia dulce y delicada llena el aire con su aroma seductor, 
creando una atmósfera encantadora y acogedora. Además de su belleza estética, los claveles son conocidos por su longevidad y durabilidad, haciendo que sean una opción popular para arreglos florales y decoraciones 
que perduran. Cultivados en jardines o en macetas, los claveles son fáciles de cuidar y florecen durante todo el año, brindando alegría y color en cualquier temporada. Déjate seducir por la elegancia y el encanto 
de los claveles y disfruta de su belleza duradera en tu vida cotidiana.', 4.99, 'Flores de temporada', 26, 'Dianthus caryophyllus', 'img/clavel.png', '12345678O'),
('Lirio', '028', 'Te hará delirar su majestuosidad', 'Los lirios, con su elegancia atemporal y su aroma delicado, son una obra maestra de la naturaleza que cautiva los sentidos. Conocidos científicamente como Lilium, estos majestuosos y delicados 
tallos son apreciados en todo el mundo por sus flores exquisitas que vienen en una variedad de colores deslumbrantes como el blanco, rosa, amarillo, naranja y morado. Cada pétalo suave y ondulado parece una obra 
de arte, creando un espectáculo visual que inspira admiración y asombro. Además de su belleza estética, los lirios tienen un aroma dulce y embriagador que llena el aire con su fragancia celestial, creando un 
ambiente sereno y relajante. Estas flores son un símbolo de pureza, renovación y amor, y se han utilizado durante siglos en celebraciones y rituales en todo el mundo. Tanto en jardines como en arreglos florales, 
los lirios son una adición impresionante que añade un toque de gracia y sofisticación a cualquier espacio. Con su belleza que perdura y su significado simbólico, los lirios son una elección perfecta para aquellos 
que buscan una flor que eleve el espíritu y deleite los sentidos.', 5.99, 'Plantas de exterior', 32, 'Lilium', 'img/lirio.png', '12345678O'),
('Bromelia', '029', 'Colores que iluminan tu día', 'Las bromelias, con su exótica belleza y vibrantes colores, son una fuente de alegría y frescura en cualquier espacio. Estas plantas tropicales, conocidas 
científicamente como Bromeliaceae, son apreciadas por sus hojas exuberantes y sus flores llamativas que vienen en una variedad de tonos brillantes como el rojo, naranja, amarillo y rosa. Cada roseta de hojas 
forma una estructura única que sostiene las flores en su centro, creando un espectáculo visual fascinante que ilumina cualquier habitación. Además de su belleza estética, las bromelias son plantas de bajo mantenimiento 
que prosperan en interiores y exteriores con poca luz y altos niveles de humedad. Su capacidad para florecer durante semanas o incluso meses las convierte en una opción popular para añadir un toque de color y frescura 
a cualquier espacio. Además, algunas variedades de bromelias, como la popular piña ornamental, producen frutas comestibles que añaden un toque tropical a la dieta. Las bromelias son una adición vibrante y alegre a 
cualquier jardín o hogar, trayendo consigo una sensación de bienestar y vitalidad que ilumina cada día.', 9.99, 'Plantas exóticas', 17, 'Bromelia', 'img/bromelia.png', '12345678O'),
('Hortensia', '030', 'Una belleza abrumadora', 'Las hortensias, con su exuberante belleza y elegancia clásica, son una adición encantadora a cualquier jardín o arreglo floral. Conocidas científicamente como Hydrangea, 
estas flores cautivan con sus grandes cabezas de flores compuestas por numerosas flores diminutas que forman una esfera de color y textura única. Disponibles en una variedad de tonos, desde el blanco puro hasta el azul 
profundo, el rosa suave y el púrpura intenso, las hortensias añaden un toque de encanto y sofisticación a cualquier entorno. Además de su belleza estética, las hortensias son conocidas por su longevidad y durabilidad, 
floreciendo durante meses con los cuidados adecuados. Son una opción popular para bodas, decoraciones de eventos y arreglos florales de interior debido a su capacidad para llenar el espacio con su encanto natural. 
Cultivadas en jardines, macetas o como flores cortadas, las hortensias son una elección versátil que ilumina cualquier lugar con su belleza inigualable.', 7.49, 'Plantas de exterior', 33, 'Hydrangea', 'img/hortensia.png', '12345678O'),
('Eucalipto', '031', 'Frescura en estado puro', 'El eucalipto, con su aroma refrescante y propiedades beneficiosas, es un tesoro natural que brinda una sensación de frescura y bienestar. Conocido por su follaje aromático y sus 
ramas elegantes, el eucalipto es apreciado en todo el mundo por sus numerosos usos, desde aromaterapia hasta medicina herbal. Originario de Australia, esta planta pertenece a la familia Myrtaceae y se destaca por sus hojas alargadas 
y plateadas que exudan un aroma característico a mentol. Además de su fragancia revitalizante, las hojas de eucalipto se utilizan en infusión para aliviar la congestión nasal y mejorar la salud respiratoria. Las ramas de eucalipto 
también se utilizan en arreglos florales y decoraciones para añadir un toque de frescura y elegancia a cualquier espacio. Además, el eucalipto es una planta fácil de cultivar que prospera en climas cálidos y soleados, convirtiéndola 
en una opción popular para jardines y paisajes ornamentales. Disfruta de la frescura y el bienestar que proporciona el eucalipto y deja que su aroma te envuelva en una sensación de calma 
y rejuvenecimiento.', 4.99, 'Plantas de interior', 24, 'Eucalyptus', 'img/eucalipto.png', '12345678O'),
('Rosa de Siria', '032', 'Encanto oriental en cada pétalo', 'La Rosa de Siria, también conocida como Rosa Damascena, es una flor emblemática que ha cautivado corazones durante siglos con su belleza exótica y su fragancia embriagadora. 
Originaria de la región de Oriente Medio, esta rosa pertenece a la familia Rosaceae y es apreciada por sus pétalos suaves y delicados que vienen en tonos de rosa pálido y blanco crema. Cada flor exuda un aroma distintivo y dulce que 
llena el aire con su perfume celestial, creando una atmósfera de romance y elegancia. Además de su belleza estética y su aroma embriagador, la Rosa de Siria tiene una larga historia de uso en la perfumería y la medicina tradicional. 
Sus pétalos se utilizan para producir aceite de rosa, que se valora por sus propiedades calmantes y rejuvenecedoras para la piel, así como por su aroma exquisito. Las rosas de Siria también se han utilizado en la cocina y en ceremonias 
religiosas, añadiendo un toque de encanto oriental a diversas tradiciones. Cultivada en jardines y plantaciones en la región mediterránea, la Rosa de Siria es una flor que evoca la belleza y el misterio de Oriente, ofreciendo un regalo 
inigualable para los sentidos y el alma.', 9.29, 'Flores de temporada', 16, 'Rosa', 'img/rosadesiria.png', '12345678O'),
('Gazania', '033', 'Un rayo de sol en tu jardín', 'La Gazania, conocida por su vibrante colorido y su resistencia, es una flor que ilumina cualquier espacio con su belleza radiante. Originaria del sur de África, esta planta perteneciente 
a la familia Asteraceae es apreciada por sus llamativas flores en forma de margarita que vienen en una amplia gama de colores brillantes, como el naranja, amarillo, rojo, rosa y blanco. Cada flor de Gazania parece capturar la esencia 
misma del sol, con pétalos que se abren ampliamente para recibir la luz del día y cerrarse por la noche. Además de su espectacular aspecto, la Gazania es una planta resistente que prospera en condiciones soleadas y secas, lo que la 
convierte en una elección popular para jardines de rocalla, macizos de flores y bordes de caminos. Sus hojas plateadas y peludas también ofrecen un atractivo adicional y ayudan a conservar la humedad del suelo en climas áridos. Fácil 
de cuidar y de bajo mantenimiento, la Gazania es una opción ideal para aquellos que desean agregar un toque de color y vitalidad a su jardín con una planta que florece durante toda la temporada. Déjate cautivar por el encanto soleado 
de la Gazania y deja que ilumine tu jardín con su belleza radiante.', 5.99, 'Flores de temporada', 22, 'Gazania', 'img/gazania.png', '12345678O');

INSERT INTO `carrito` (`Id`, `DniUsuario`, `IdProducto`, `Cantidad`, `PrecioTotal`) VALUES
(8, '08765483T', '024', 2, 23.98),
(9, '08765483T', '031', 1, 4.99),
(10, '08765483T', '006', 3, 11.97),
(46, '01176545P', '029', 2, 19.98),
(47, '01176545P', '026', 1, 7.49),
(48, '14248573R', '008', 2, 8.98),
(49, '14248573R', '023', 1, 12.99),
(50, '14248573R', '032', 2, 18.58),
(51, '14248573R', '033', 1, 5.99);

INSERT INTO `pedidos` (`Id`, `DniUsuario`, `IdProducto`, `Unidades`, `PrecioTotal`) VALUES
(1, '08765483T', '004', 2, 11.98),
(1, '08765483T', '026', 3, 22.47),
(2, '08765483T', '007', 1, 3.99),
(2, '08765483T', '009', 1, 2.99),
(2, '08765483T', '029', 2, 19.98),
(3, '08765483T', '013', 2, 15.98),
(3, '08765483T', '019', 1, 22.99),
(4, '01176545P', '005', 2, 7.98),
(4, '01176545P', '014', 4, 23.96),
(5, '01176545P', '007', 2, 7.98),
(5, '01176545P', '022', 1, 7.99),
(5, '01176545P', '032', 1, 9.29),
(6, '01176545P', '004', 1, 5.99),
(7, '01176545P', '006', 2, 7.98),
(7, '01176545P', '020', 2, 37.98),
(7, '01176545P', '025', 1, 8.99),
(8, '01176545P', '011', 1, 3.49),
(8, '01176545P', '023', 2, 25.98),
(9, '01176545P', '008', 2, 8.98),
(9, '01176545P', '027', 1, 4.99),
(9, '01176545P', '033', 3, 17.97),
(10, '14248573R', '002', 1, 6.00),
(10, '14248573R', '003', 2, 9.98),
(10, '14248573R', '017', 2, 26.98),
(11, '14248573R', '001', 2, 13.98),
(11, '14248573R', '004', 1, 5.99),
(11, '14248573R', '025', 1, 8.99),
(12, '14248573R', '009', 2, 5.98),
(12, '14248573R', '010', 2, 9.98),
(12, '14248573R', '011', 1, 3.49),
(12, '14248573R', '013', 1, 7.99),
(13, '14248573R', '028', 1, 5.99),
(13, '14248573R', '031', 2, 9.98),
(14, '14248573R', '006', 1, 3.99),
(14, '14248573R', '026', 2, 14.98),
(15, '01176545P', '001', 1, 6.99),
(15, '01176545P', '003', 3, 14.97),
(15, '01176545P', '026', 2, 14.98),
(16, '01176545P', '015', 2, 7.58),
(16, '01176545P', '017', 1, 13.49),
(16, '01176545P', '028', 2, 11.98);

INSERT INTO `valoraciones` (`DniUsuario`, `IdProducto`, `Puntuacion`, `Texto`) VALUES
('01176545P', '001', 3, 'Le da un toque gracioso a mi casa'),
('01176545P', '003', 2, 'Pensaba que daría vida a mi casa y nada que ver'),
('01176545P', '004', 3, 'No ha sido mala compra, decora bien el jardín'),
('01176545P', '005', 3, 'Esperaba más de este producto, me ha decepcionado'),
('01176545P', '006', 2, 'Tenía muchas expectativas pero el producto no es lo que esperaba'),
('01176545P', '007', 4, '¡Es igual a lo que se ve en la foto, genial!'),
('01176545P', '008', 2, 'Se murieron a los pocos días de comprarlas'),
('01176545P', '011', 4, 'Me encanta olerla por las mañanas'),
('01176545P', '014', 4, 'No es mala compra pero tampoco nada del otro mundo'),
('01176545P', '015', 4, 'Tan clásica como impresionante en mi jardín'),
('01176545P', '017', 5, 'No sé por qué no la compre antes, es maravillosa'),
('01176545P', '020', 4, 'Me encantan sus colores, aportan mucha energía'),
('01176545P', '022', 1, 'Nada que ver con lo que me esperaba, qué decepción'),
('01176545P', '023', 3, 'En la foto tenían mejor aspecto que en la realidad'),
('01176545P', '025', 5, 'Es muy elegante y queda genial en el salón'),
('01176545P', '026', 5, 'Es preciosa, la que más me gusta de todas las de la tienda'),
('01176545P', '027', 5, 'Me encanta cómo quedan en mi jardín'),
('01176545P', '028', 3, 'Es bonito sí pero ocupa demasiado espacio'),
('01176545P', '032', 5, 'La mejor adquisición para mi jardín'),
('01176545P', '033', 4, 'Son llamativas y gustan siempre a mis invitados'),
('08765483T', '004', 4, 'La calidad es buena, de eso no hay duda'),
('08765483T', '009', 2, 'Me ha parecido demasiado cara'),
('08765483T', '013', 4, 'Es algo sencillo pero precioso'),
('08765483T', '019', 5, 'Perfectas para regalar, a mi pareja le encantaron'),
('08765483T', '026', 5, 'Es una planta muy bonita y tiene una excelente relación calidad-precio'),
('08765483T', '029', 3, 'No es mala planta pero hay mejores'),
('14248573R', '001', 4, 'La tengo en la oficina y mis empleados siempre hablan bien de ella'),
('14248573R', '002', 2, 'La verdad es que no me ha gustado demasiado, tenía mejor pinta en la foto'),
('14248573R', '003', 5, 'Me encanta la planta y esta tienda en general'),
('14248573R', '004', 2, 'Demasiado común para mi gusto, no destaca de las demás'),
('14248573R', '006', 4, 'Había oído que no merecían la pena pero para mí sin duda'),
('14248573R', '010', 5, 'El nombre me parecía raro pero el producto ha merecido la pena'),
('14248573R', '011', 1, 'Esperaba más calidad sinceramente'),
('14248573R', '013', 4, 'Parece simple pero es bella y huele de maravilla'),
('14248573R', '017', 4, 'A pesar de ser exótica, ya es una más en mi colección'),
('14248573R', '025', 4, 'Le da un toque especial a mi casa'),
('14248573R', '026', 5, 'Mi madre siempre me compra esta planta y estoy encantado'),
('14248573R', '028', 5, 'Muy pero que muy bonita, qué maravilla'),
('14248573R', '031', 3, 'Ni me gusta ni me disgusta, no es la que más recomiendo');