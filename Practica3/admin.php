<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';

$tituloPagina = 'Admin';

if (!esAdmin()) {
	Utils::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para acceder al panel de administración de la web.');
}

$contenidoPrincipal = <<<EOS
<h1 class='titulo'>Consola de administración</h1>
<li><a href="adminUsuarios.php">Administración de usuarios</a></li>
        <li><a href="admin.php">Gestión del blog</a></li>
        <li><a href="admin.php">Gestión de reseñas</a></li>
EOS;


require 'includes/vistas/comun/layout.php';
