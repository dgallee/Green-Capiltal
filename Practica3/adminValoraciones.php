<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/vistas/helpers/adminValoraciones.php';
require_once 'valoracionesDAO.php';

$tituloPagina = 'Gestion de Valoraciones';

if (!esAdmin() && !esModerador()) {
	Utils::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para administrar y gestionar las valoraciones');
}

// Obtén el array de valoraciones
$valoraciones = Valoracion::showTable();
// Comienza a construir la tabla
$tablaValoraciones = buildTablaValoraciones($valoraciones);

$contenidoPrincipal = <<<EOS
<h1 class='titulo'>Listado de valoraciones</h1>
<p>$tablaValoraciones</p>
EOS;

require 'includes/vistas/comun/layout.php';

?>