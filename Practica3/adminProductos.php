<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/vistas/helpers/adminProductos.php';
require_once 'productosDAO.php';

$tituloPagina = 'Admin Productos';

if (!esAdmin()) {
	Utils::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para acceder al panel de administración de la web.');
}

// Obtén el array de usuarios
$productos = Producto::showTable();

// Comienza a construir la tabla

$tablaProductos = buildTablaProductos($productos);

$contenidoPrincipal = <<<EOS
<h1 class='titulo'>Listado de productos en tienda</h1>
<p>$tablaProductos</p>
EOS;

require 'includes/vistas/comun/layout.php';

?>