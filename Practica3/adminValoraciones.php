<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/vistas/helpers/adminProductos.php';
require_once 'valoracionesDAO.php';

$tituloPagina = 'Gestion de Valoraciones';

if (!esAdmin() && !esComerciante()) {
	Utils::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para administrar y gestionar las valoraciones');
}

$parametro;

// Obtén el array de valoraciones
$valoraciones = Valoracion::showTable($parametro);
// Comienza a construir la tabla
$tablaValoraciones = buildTablaProductos($valoraciones);

$contenidoPrincipal = <<<EOS
<h1 class='titulo'>Listado de valoraciones</h1>
<p>$tablaValoraciones</p>
EOS;

require 'includes/vistas/comun/layout.php';

?>