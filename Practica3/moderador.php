<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';

$tituloPagina = 'Moderador';

if (!esModerador()) {
	Utils::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para acceder al panel de comerciante de la web.');
}

$contenidoPrincipal = <<<EOS
<h1 class='titulo'>Centro de valoraciones</h1>
<p class='descripcion4'> ¡Bienvenido al centro de valoraciones! Desde aquí podrás comprobar que todas las valoraciones cumplen
las normas de la comunidad, y modificar o eliminar aquellas que no los cumplan o contengan contenido no deseado.</p>
<p class='descripcion5'> Accede a nuestro completo servicio de gestión de valoraciones haciendo click <a href="adminValoraciones.php">aquí</a><p>
EOS;


require 'includes/vistas/comun/layout.php';
