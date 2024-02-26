<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';

$tituloPagina = 'Contenido';



if (! estaLogado()) {
	Utils::paginaError(403, $tituloPagina, 'Usuario no conectado!', 'Debes iniciar sesión para ver el contenido.');
}

$contenidoPrincipal=<<<EOS
	<?= buildFormularioBusqueda()?>
	EOS;

require 'includes/vistas/comun/layout.php';
