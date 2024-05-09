<?php

require_once 'includes/config.php';

$tituloPagina = 'Portada';

$contenidoPrincipal=<<<EOS
<h1 class="titulo-destacado">Green Capital, mucho más que una tienda</h1>
<p class="descripcion">Nuestra aplicación web Green Capital es mucho más que una simple tienda de plantas.
Se trata de un lugar interactivo donde los usuarios pueden maravillarse con la extensa oferta de plantas a su
disposición,
buscar aquellas que les interesen mediante filtros de búsqueda, comprar las que más les gusten y
escribir reseñas para opinar acerca de los productos adquiridos.
Nuestro objetivo es ofrecer a nuestros clientes una experiencia única, donde puedan sumergirse en un maravilloso
mundo de plantas,
flores y accesorios para el hogar. Nuestro compromiso firme por preservar la naturaleza y sus recursos nos define como 
una empresa responsable con el medioambiente.
</p>
<p class="descripcion">En Green Capital, permitimos a comerciantes y negocios locales vender sus artículos ayudando a la comunidad y
ampliando nuestro variado catálogo de plantas. Además, ofrecemos privilegios exclusivos a nuestros usuarios registrados, como 
interesantes conferencias de figuras reconocidas dentro del mundo de la jardinería y la botánica o descuentos en los mejores jardines 
botánicos de toda Europa. Desde hermosos tulipanes y cactus hasta impresionantes petunias y orquídeas, tenemos todo lo que necesitas para dar 
vida y color a tu hogar u oficina. ¡Únete a Green Capital y deja que la vida florezca en tu hogar!<p>
EOS;

require 'includes/vistas/comun/layout.php';
?>
