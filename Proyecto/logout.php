<?php
require_once 'includes/config.php';

$app->logout();

$tituloPagina = 'Logout';

$contenidoPrincipal=<<<EOS
	<h1 class="titulo">¡Hasta pronto!</h1>
EOS;

require 'includes/vistas/comun/layout.php';
?>
