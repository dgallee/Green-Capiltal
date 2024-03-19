<?php

require_once 'includes/config.php';

$tituloPagina = 'Portada';

$contenidoPrincipal=<<<EOS
<h1 class="titulo-destacado">Green Capital, mucho más que una tienda</h1>
<p class="descripcion">Nuestra aplicación web Green Capital será mucho más que una simple tienda de plantas.
Se tratará de un lugar interactivo donde los usuarios podrán maravillarse con la extensa oferta de plantas a su
disposición,
buscar aquellas que les interesen mediante filtros de búsqueda, comprar las que más les gusten,
escribir reseñas para opinar acerca de los productos e interactuar con los artículos del blog.
Nuestro objetivo es ofrecer a nuestros clientes una experiencia única, donde puedan sumergirse en un maravilloso
mundo de plantas,
flores y accesorios para el hogar.</p>
<p class="descripcion">En Green Capital, permitimos a comerciantes y negocios locales vender sus artículos ayudando a la comunidad y
ampliando nuestro variado catálogo de plantas.
Además, nuestro blog constantemente actualizado ofrece a nuestros usuarios contenido de valor e interesantes
artículos relativos al mundo de las plantas y la jardinería. También disponemos de una página de contacto para
que los usuarios puedan contactar con nosotros y disfrutar de diseños personalizados para sus jardines u hogar.
Desde hermosos tulipanes y cactus hasta helechos y orquídeas, tenemos todo lo que necesitas para dar vida a tu
hogar u oficina. ¡Únete a Green Capital y deja que la vida florezca en tu hogar!<p>
EOS;

require 'includes/vistas/comun/layout.php';
?>
