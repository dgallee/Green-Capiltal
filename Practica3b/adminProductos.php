<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/vistas/helpers/adminProductos.php';
require_once 'productosDAO.php';

$tituloPagina = 'Gestion Productos';

if (!esAdmin() && !esComerciante()) {
	Utils::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para administrar y gestionar los productos');
}

$parametro;

if(esAdmin()){
	$parametro = "admin";
}
else if(esComerciante()){
	$dni = $_SESSION["DNI"];
	$parametro = $dni;
}
// Obtén el array de usuarios
$productos = Producto::showTable($parametro);

// Comienza a construir la tabla

$tablaProductos = buildTablaProductos($productos);

$contenidoPrincipal = <<<EOS
<h1 class='titulo'>Listado de productos en tienda</h1>
<p>$tablaProductos</p>
EOS;

require 'includes/vistas/comun/layout.php';

?>