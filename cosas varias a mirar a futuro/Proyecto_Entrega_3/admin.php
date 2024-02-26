<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';

$tituloPagina = 'Admin';

if (!esAdmin()) {
	Utils::paginaError(403, $tituloPagina, 'Acceso Denegado!', 'No tienes permisos suficientes para administrar la web.');
}

$contenidoPrincipal=<<<EOS
	<h1>Consola de administración</h1>
	<p>Aquí estarían todos los controles de administración</p>
	<a href= 'includes/src/process/adminobjetos.php'>Gestion de Objetos </a> 

	<br> </br>
	<a href= 'includes/src/process/adminusuario.php'>Gestion de Usuarios </a> 	
EOS;

require 'includes/vistas/comun/layout.php';
