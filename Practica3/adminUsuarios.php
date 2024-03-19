<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/vistas/helpers/adminUsuarios.php';
require_once 'usuarioDAO.php';

$tituloPagina = 'Admin';

if (!esAdmin()) {
	Utils::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para acceder al panel de administración de la web.');
}

// Obtén el array de usuarios
$usuarios = Usuario::showTable();

// Comienza a construir la tabla

$tablaUsuarios = buildTablaUsuarios($usuarios);

$contenidoPrincipal = <<<EOS
<h1 class='titulo'>Listado de Usuarios</h1>
<p>$tablaUsuarios</p>
EOS;

require 'includes/vistas/comun/layout.php';

?>