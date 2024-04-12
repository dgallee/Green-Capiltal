<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';

$tituloPagina = 'Comerciante';

if (!esComerciante()) {
	Utils::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para acceder al panel de comerciante de la web.');
}

$contenidoPrincipal = <<<EOS
<h1 class='titulo'>Centro de comerciantes</h1>
<p class='descripcion4'> ¡Bienvenido al centro de comerciantes! Sabemos que ser un emprendedor desde cero puede ser difícil, por eso te ponemos
todas las facilidades posibles. Accediendo a nuestro sistema de gestión de productos, podrás agregar nuevos productos a la venta
aprovechando la gran imagen y popularidad de nuestra marca, añadir existencias a los productos que ya tengas en venta 
o eliminar aquellos que no quieras vender más.</p>
<p class='descripcion5'> Accede a nuestro completo servicio de gestión de productos haciendo click <a href="adminProductos.php">aquí</a><p>
EOS;


require 'includes/vistas/comun/layout.php';
