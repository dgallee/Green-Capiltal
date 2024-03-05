<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';

$tituloPagina = 'Admin';

if (!esAdmin()) {
	Utils::paginaError(403, $tituloPagina, 'Acceso Denegado!', 'No tienes permisos suficientes para administrar la web.');
}

$contenidoPrincipal = <<<EOS
<h1>Consola de administración</h1>
<li><a href="adminUsuarios.php">Administración de usuarios</a></li>
        <li><a href="archivo2.php">Archivo 2</a></li>
        <li><a href="archivo3.php">Archivo 3</a></li>
EOS;


require 'includes/vistas/comun/layout.php';
