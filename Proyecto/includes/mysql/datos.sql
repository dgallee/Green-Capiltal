--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono`, `DNI`, `Usuario`, `Contrasena`, `Tipo`) VALUES
('Vendedor', 'Común', 'vendedor@ucm.es', 'Calle del Gobernador', 678564392, '06374892W', 'vendedor', '$2y$10$.qRbcDsSOVHnw7LHaAbGDeKDfgvYFvT.caLxxJBtFWAPwheB6wj6y', 2),
('admin', 'admin', 'admin@ucm.es', '654891276', 666555111, '12345678O', 'admin', '$2y$10$GpoDTA8.i9gygcwuuDPG5usUCdw5cpMngs.Wa8uDsYpQK0ugw.y0u', 1),
('user', 'user', 'user@ucm.es', 'calle ejemplo nº3 2ºB', 666111888, '87654321Q', 'user', '$2y$10$1kGi7DsGgFhEB73Ppmu.DuKbxgJd.b5La42LCc67otKSk7KQriBpS', 0);

INSERT INTO `productos` (`Nombre`, `Id`, `Resumen`, `Descripcion`, `Precio`, `Categoria`, `Existencias`, `Especie`, `Imagen`, `DniVendedor`) VALUES
('Palmera cocotera', '001', 'Ideal para cualquier hogar', 'La palmera cocotera, símbolo tropical por excelencia, es una adición esencial para 
cualquier jardín o espacio exterior. Originaria de las regiones tropicales y subtropicales, esta majestuosa planta aporta un toque de exotismo 
y elegancia a cualquier entorno. Sus frondosas hojas verdes y su distintiva forma la convierten en una presencia imprescindible para crear un 
ambiente tropical y relajado. Con sus características hojas plumosas y su tronco alto y esbelto, la palmera cocotera ofrece una vista 
impresionante en cualquier paisaje. Además, sus frutos, los cocos, añaden un elemento decorativo y funcional al jardín. Esta planta prospera en 
climas cálidos y soleados, pero puede adaptarse a una variedad de condiciones. Es importante proporcionarle un suelo bien drenado y suficiente 
espacio para crecer. Durante los meses más cálidos del año, disfruta de su máximo esplendor, ofreciendo un refugio sombrío y fresco. En invierno, 
es recomendable protegerla de las heladas para asegurar su salud y vigor.', 6.99, 'Plantas exóticas', 12, 'Cocotera', 'img/palmera-cocotera.png', '12345678O'),
('Cyclamen', '002', 'Aporta vida a tu jardín', 'Delicada y elegante planta bulbosa, el cyclamen es ideal para decorar nuestros balcones y jardines 
durante las épocas del año frescas o frías, ya que florece abundantemente entre otoño, invierno y primavera. De hojas carnosas y flores con colores 
intensos de tonos rojizos, lilas, rosas y blancos, es resistente al frío, a las heladas y a las nevadas en invierno y en espacios de sombra o 
semisombra se desarrolla muy bien en épocas más calurosas. El ciclamen es también resistente a la sequía.', 6.00, 'Plantas de interior', 11, 'Cyclamen', 
'img/cyclamen.png', '12345678O'),
('Dahlia', '003', 'Luminosa y con presencia', 'La dahlia decorativa o flor de dahlia es una planta bulbosa anual que tiene una de las flores más 
bonitas que se puede poner en el jardín. Frondosa y delicada, florece durante toda la primavera y el verano. Flores en múltiples colores. Ideal 
para macetas o parterres.', 4.99, 'Plantas de exterior', 22, 'Dahlia', 'img/dahlia.png', '12345678O'),
('Margarita dimorfoteca', '004', 'La más especial de las margaritas', 'La margarita dimorfoteca es una planta vivaz perenne que resiste los inviernos 
con heladas leves y poco duraderas, pero prefiere los climas cálidos de primavera y verano, que es cuando florece abundantemente. Tiene un rápido 
crecimiento y abundante floración similar a la margarita y las hojas verdes y tupidas. Las flores se abren con el sol y se cierran con la sombra. 
Desprenden una suave fragancia muy característica. Hay múltiples colores. Planta tupida y muy rústica que se suele cultivar en macetas o en el suelo 
directamente.', 5.99, 'Plantas exóticas', 18, 'Dimorfoteca', 'img/margarita-dimorfoteca.png', '12345678O'),
('Geranio', '005', 'Fundamental para cualquier jardín', 'El geranio común, procedente de Sudáfrica, es la planta por excelencia para decorar balcones 
y terrazas. Tiene bonitas hojas de un verde oscuro manchado, y flores espectaculares que nos ofrece durante primavera, verano y otoño, y en muchos 
colores diferentes. Es una planta que destaca por su gran capacidad de floración. Recomendamos situarlo en un espacio de sol y caluroso en verano, 
en macetas y jardineras con bastante sustrato para que pueda desarrollarse hasta medidas de más de 50 cm de altura, pero se adapta a cualquier maceta, 
hasta la más pequeña. En invierno, debemos protegerlo de las heladas.', 3.99, 'Plantas de exterior', 18, 'Geranio', 'img/geranio.png', '12345678O'),
('Margarita blanca', '006', 'Blanca y pura, básica para tu jardín', 'La margarita blanca es una planta arbustiva muy similar a la margarita pero más 
leñosa. También es margarita grande, mayor que las tradicionales, y se reproduce fácilmente. Sus flores también son mucho más grandes, sólo de color 
blanco con el botoncito amarillo. Llamada también margarita de la abuela. Muy resistente a las inclemencias del tiempo, en zonas templadas florece casi 
todo el año. Es resistente al pleno sol y también al frío siempre que no sea muy brusco y constante. Muy sufrida, utilizada en macetas y en parterres.',
3.99, 'Flores de temporada', 21, 'Margarita', 'img/margarita-blanca.png', '12345678O'),
('Muscari', '007', 'Exótica y refinada', 'Planta de origen mediterráneo, ideal para rocallas o en macetas, es autóctona de muchos de nuestros parajes y 
por lo tanto es de muy fácil cultivo. De plantación en otoño, florece en primavera. De riego moderado y sustrato muy drenado. Aunque su nombre 
científico es Muscari, popularmente se la conoce por Nazarenos. Esta planta de pequeñas flores, de un azul intenso – a veces blanco- y un agradable olor, 
pertenece a la familia de la liláceas.', 3.99, 'Plantas de interior', 20, 'Muscari', 'img/muscari.png', '12345678O'),
('Orquídea', '008', 'Su forma y olor maravillan', 'Las orquídeas son plantas fáciles de reconocer. Las orquídeas son plantas tropicales que se 
caracterizan por sus populares flores, con tres sépalos: dos pétalos y un lobelo, en donde se posa el insecto polinizador. Se trata de una planta 
monopodial, lo que significa que se desarrolla en un solo eje. Sus hojas nacen en la base de su tallo y suele haber entre 2 y 6. De color verde intenso,
son carnosas y crecen dispuestas muy cerca las unas de las otras. Las orquídeas se caracterizan también por sus raíces bastante gruesas, grandes y 
numerosas. Son plantas muy aromáticas y pueden cambiar su olor según la especie.', 4.49, 'Plantas de interior', 24, 'Orquidea', 'img/orquidea.png', '12345678O'),
('Pensamiento', '009', 'Pensarás que es una maravilla', 'Planta anual de floración muy dilatada en el tiempo. De las más utilizadas para la decoración 
del jardín en invierno. Muy resistente al frío y a las heladas, muy agradecida en floración. Pleno sol y resistente a la sequía. De todas las plantas
anuales de desarrollo invernal, el pensamiento es, sin duda, la más florida de todas. Es una planta híbrida ornamental obtenida de la especie silvestre 
Viola tricolor. No deja de florecer durante todo el invierno, llegando a su esplendor a finales de la estación inicios de primavera y es que, con los
primeros calores, la planta decae.', 2.99, 'Plantas de interior', 32, 'Pensamiento', 'img/pensamiento.png', '12345678O'),
('Pothos', '010', 'Sus hojas derrochan amor', 'Los pothos, también conocidos como Epipremnum aureum, son plantas de interior muy populares y fáciles de cuidar. Estas plantas se distinguen 
por sus hojas grandes y brillantes en forma de corazón que pueden tener variaciones de color, desde verde oscuro hasta verde claro con manchas blancas o 
amarillas.Originarias de las regiones tropicales del sudeste asiático, los pothos son apreciados por su capacidad de adaptación a diferentes condiciones de 
luz y humedad. Son plantas trepadoras que pueden crecer en vertical o colgar, lo que las hace perfectas para decorar estanterías, repisas o cestas colgantes. 
Las hojas del pothos nacen en tallos largos y delgados que pueden crecer hasta varios metros de longitud. Son hojas gruesas y carnosas que crecen en una 
disposición alterna a lo largo del tallo. Además, tienen la capacidad de purificar el aire al absorber toxinas como el formaldehído, el xileno y el benceno. 
El pothos es una planta resistente que puede prosperar con poca luz y riego ocasional. Sus raíces son gruesas y numerosas, lo que le permite absorber la 
humedad del sustrato y del aire circundante. Además, es una planta que puede propagarse fácilmente a partir de esquejes de tallo en agua o sustrato.', 4.99, 
'Plantas de interior', 25, 'Pothos', 'img/pothos.png', '12345678O'),
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
tanto para jardineros como para amantes de la aromaterapia.', 3.49, 'Plantas de exterior', 27, 'Lavanda', 'img/lavanda.png', '12345678O'),
('Cactus Euphorbia', '012', 'Exótica, resistente y llena de personalidad', 'La Euphorbia, también conocida como "cactus africano" o "planta candelabro", es una planta suculenta que se 
caracteriza por su apariencia exótica y su facilidad de cuidado. Aunque a menudo se confunde con los cactus debido a su aspecto espinoso, la Euphorbia no es realmente 
un cactus, sino un tipo de planta suculenta originaria de África. Esta planta presenta tallos gruesos y columnares que crecen verticalmente, ramificándose en forma de 
candelabro. A lo largo de los tallos, desarrolla espinas afiladas que le proporcionan una apariencia peculiar y una defensa natural contra los depredadores. Durante la 
primavera y el verano, la Euphorbia puede producir pequeñas flores de color verde o amarillo en la parte superior de sus tallos. La Euphorbia es una planta de bajo 
mantenimiento que requiere poco riego y luz solar indirecta. Es ideal para decorar interiores soleados o patios y terrazas exteriores. Sin embargo, es importante 
manipularla con cuidado, ya que su savia lechosa puede ser tóxica y causar irritación en la piel y los ojos.', 12.99, 'Plantas exóticas', 18, 'Cactus', 'img/cactuseuphorbia.png', '12345678O'),
('Amapola', '013', 'Belleza efímera e inolvidable', 'La amapola, conocida científicamente como Papaver rhoeas, es una flor silvestre de belleza efímera pero impactante. Su vibrante 
color rojo intenso y sus delicados pétalos hacen que sea una de las flores más reconocibles y apreciadas en jardinería y arte floral. Esta planta anual se caracteriza por sus tallos 
delgados que pueden alcanzar alturas de hasta 60 cm. Las flores de la amapola tienen forma de copa, con pétalos sedosos y brillantes que rodean un centro oscuro de estambres. 
Florecen durante la primavera y el verano, creando espectaculares mantos de color en campos y prados. La amapola es una planta fácil de cultivar que prefiere suelos bien drenados 
y soleados. Se siembra fácilmente a partir de semillas y es una excelente opción para añadir un toque de color a jardines, bordes de caminos o macetas. Además de su belleza 
ornamental, la amapola tiene un significado simbólico en muchas culturas, asociada con el recuerdo y la esperanza.', 7.99, 'Flores de temporada', 25, 'Amapola', 'img/amapola.png', '12345678O'),
('Tulipán', '014', 'La joya de la primavera', 'El tulipán, conocido científicamente como Tulipa, es una de las flores más emblemáticas y apreciadas en todo el mundo. Originario de 
Asia Central, el tulipán es conocido por sus brillantes y coloridas flores en forma de copa que florecen en primavera, iluminando jardines, parques y paisajes con su belleza 
efímera. Los tulipanes presentan una amplia variedad de colores y formas, desde los clásicos tonos rojos, amarillos y blancos hasta los más exóticos púrpuras, naranjas y multicolores. 
Sus tallos erectos pueden alcanzar alturas que van desde unos pocos centímetros hasta más de un metro, dependiendo de la variedad. Estas flores bulbosas son fáciles de cultivar y 
se adaptan a una amplia gama de climas y suelos bien drenados. Se plantan en otoño para florecer en primavera, y aunque su floración es breve, su impacto visual es inolvidable. Los 
tulipanes también son populares como flores cortadas, utilizadas en arreglos florales y ramos.', 5.99, 'Flores de temporada', 31, 'Tulipán', 'img/tulipan.png', '12345678O'),
('Girasol', '015', 'Ilumina tu día con su energía', 'El girasol, conocido científicamente como Helianthus annuus, es una de las flores más emblemáticas y reconocibles del mundo. Originario 
de América del Norte, el girasol es famoso por su gran tamaño, brillante color amarillo y su capacidad para seguir la trayectoria del sol a lo largo del día. El girasol es una planta 
anual que puede crecer hasta alcanzar alturas impresionantes, superando fácilmente los dos metros en condiciones óptimas. Sus tallos robustos y peludos soportan grandes cabezas 
florales compuestas por cientos de pequeñas flores dispuestas en espiral alrededor de un disco central. Estas flores no solo son hermosas, sino que también son una fuente valiosa de 
alimento para las abejas y otros polinizadores. Además de su belleza ornamental, el girasol es apreciado por su utilidad en la agricultura y la alimentación. Sus semillas, que se 
encuentran en el centro de la cabeza floral, son ricas en nutrientes y se pueden comer crudas o tostadas, y también se utilizan para hacer aceite de girasol.', 3.79, 
'Plantas de exterior', 42, 'Girasol', 'img/girasol.png', '12345678O'),
('Petunia', '016', 'Vibrante, alegre y muy colorida', 'La petunia, conocida científicamente como Petunia x hybrida, es una planta ornamental muy popular en jardinería debido 
a su abundante floración y su amplia variedad de colores. Originaria de América del Sur, la petunia es una planta perenne cultivada como anual en la mayoría de las regiones 
debido a su sensibilidad al frío. Las petunias producen flores en forma de trompeta que pueden ser simples o dobles, y vienen en una amplia gama de colores que incluyen tonos 
de rosa, morado, blanco, rojo, y hasta bicolor. Pueden tener un aroma suave y agradable, y su floración se extiende desde la primavera hasta finales del verano, añadiendo un toque 
de color a jardines, balcones y macetas. Estas plantas son fáciles de cuidar y prefieren suelos bien drenados y pleno sol para florecer en su máximo esplendor. Además de ser 
cultivadas en macetas y jardineras, las petunias también son populares como flores de borde y cubre-suelos en jardines.', 6.99, 'Plantas de exterior', 25, 'Petunia', 'img/petunia.png', '12345678O'),
('Ave del Paraiso', '017', 'Sus hojas derrochan amor', 'La Ave del Paraíso, conocida científicamente como Strelitzia reginae, es una planta tropical majestuosa y exótica que cautiva 
con su llamativa apariencia y sus flores únicas. Originaria de Sudáfrica, esta planta perenne pertenece a la familia Strelitziaceae y es apreciada en todo el mundo por su distintivo 
aspecto de "ave en vuelo" y sus flores de colores brillantes. La principal característica de la Ave del Paraíso es su inflorescencia, que se asemeja a la cabeza de un ave exótica. 
Sus flores consisten en tres sépalos naranjas y tres pétalos azules que emergen de una espata en forma de pluma, creando una apariencia única y espectacular. Estas flores pueden durar 
semanas o incluso meses en la planta, y son atractivas para los polinizadores. Además de sus flores, la Ave del Paraíso también se distingue por su follaje de hojas grandes y coriáceas, 
que crecen en forma de abanico desde la base de la planta. Estas hojas son de color verde intenso y añaden un toque tropical al paisaje. Aunque la Ave del Paraíso es originaria de climas 
cálidos, puede cultivarse con éxito en climas más templados en macetas o en el suelo, siempre que se proteja de las heladas. Es una planta resistente y de bajo mantenimiento que prospera 
en suelos bien drenados y con riego moderado.', 13.49, 'Plantas exóticas', 25, 'Strelitzia reginae', 'img/avedelparaiso.png', '12345678O');
