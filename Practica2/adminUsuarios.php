<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'usuarioDAO.php';

$tituloPagina = 'Admin';

if (!esAdmin()) {
	Utils::paginaError(403, $tituloPagina, 'Acceso Denegado!', 'No tienes permisos suficientes para administrar la web.');
}

// Obtén el array de usuarios
$usuarios = Usuario::showTable();

// Comienza a construir la tabla
$tablaUsuarios = "<table>";
$tablaUsuarios .= "<tr>
<th>Nombre</th>
<th>Apellidos</th>
<th>Correo</th>
<th>Dirección</th>
<th>Teléfono</th>
<th>DNI</th>
<th>Usuario</th>
<th>Contraseña</th>
<th>Tipo usuario</th>
</tr>";

// Añade una fila a la tabla para cada usuario
foreach ($usuarios as $usuario) {
	$tablaUsuarios .= "<tr>
	<td>{$usuario['Nombre']}</td>
	<td>{$usuario['Apellidos']}</td>
	<td>{$usuario['Correo']}</td>
	<td>{$usuario['Direccion']}</td>
	<td>{$usuario['Telefono']}</td>
	<td>{$usuario['DNI']}</td>
	<td>{$usuario['Usuario']}</td>
	<td>{$usuario['Contrasena']}</td>
	<td>{$usuario['Tipo']}</td>
    <td>
		<button onclick=\"location.href='editar.php?id={$usuario['Usuario']}'\">Editar</button>
		<button onclick=\"location.href='eliminar.php?id={$usuario['DNI']}'\">Eliminar</button>
	</td>
	</tr>";
}

// Cierra la tabla
$tablaUsuarios .= "</table>";

$contenidoPrincipal = <<<EOS
<h1>Listado de Usuarios</h1>
<p>$tablaUsuarios</p>
EOS;

require 'includes/vistas/comun/layout.php';
