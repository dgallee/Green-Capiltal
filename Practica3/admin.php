<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';

$tituloPagina = 'Admin';

if (!esAdmin()) {
	Utils::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para acceder al panel de administración de la web.');
}

$contenidoPrincipal = <<<EOS
        <h1 class='titulo'>Consola de administración</h1>
        <ul><li><a href="adminUsuarios.php" class="adminopciones">Administración de usuarios</a></li>
        <li><a href="adminProductos.php" class="adminopciones">Gestión de productos</a></li>
        <li><a href="adminValoraciones.php" class="adminopciones">Gestión de valoraciones</a></li>
        </ul>
EOS;


require 'includes/vistas/comun/layout.php';
