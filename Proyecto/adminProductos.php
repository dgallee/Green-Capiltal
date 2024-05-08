<?php

require_once 'includes/config.php';
use es\ucm\fdi\aw\productos\productosDAO;


$tituloPagina = 'Gestion Productos';

if ($app->esAdmin() == false && $app->esComerciante() == false) {
	Utils::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para administrar y gestionar los productos');
}

$parametro;

if($app->esAdmin()){
	$parametro = "admin";
}
else if($app->esComerciante()){
	$dni = $_SESSION["DNI"];
	$parametro = $dni;
}
// Obtén el array de usuarios
$productos = productosDAO::showTable($parametro);

// Comienza a construir la tabla

$tablaProductos = '';

// Verifica si $productos no está vacío ERROR???
if(!empty($productos)){
	// Agrega la estructura HTML para la tabla si $productos no está vacío
	$tablaProductos .= <<<EOS
	<div class="tableContainer">
		<table class="tableAdmin">
			<tr>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Existencias</th>
				<th>Id</th>
				<th>Acciones</th>
			</tr>
	EOS;
}

// Añade una fila a la tabla para cada usuario


foreach ($productos as $producto) {

	$form= new es\ucm\fdi\aw\productos\FormularioSumarExistencias($producto['Id']);
	$htmlFormAdd = $form->gestiona();
	$tablaProductos .= <<<EOS
	<tr>
	<td>{$producto['Nombre']}</td>
	<td>{$producto['Precio']}</td>
	<td>
		{$producto['Existencias']}
		$htmlFormAdd
	</td>
	<td>{$producto['Id']}</td>
	<td>
		<a href="editarProducto.php?prod={$producto['Id']}">
			<img src="img/editar.png" alt="Editar información" class="botonImagen" >
		</a>
		<a href="eliminarProducto.php?prod={$producto['Id']}">
			<img src="img/eliminar.png" alt="Eliminar información" class="botonImagen" >
		</a>
	</td>
	</tr>
	EOS;
}

// Cierra la tabla
$tablaProductos .= "</table>";

// Añadir producto button
$tablaProductos .= '<button onclick="location.href=\'agregarProducto.php\'"><img src="img/agregar.png" alt="Añadir producto" class="botonImagen"></button>';    
$tablaProductos .= '</div>';

$contenidoPrincipal = <<<EOS
<h1 class='titulo'>Listado de productos en tienda</h1>
<p>$tablaProductos
EOS;

require 'includes/vistas/comun/layout.php';

?>