<?php
require_once 'includes/config.php';
require_once 'includes/src/forms/form_post.php';
require_once 'includes/vistas/helpers/autorizacion.php';


$tituloPagina = 'Nuevo Post';

if (!estaLogado()) {
	Utils::paginaError(403, $tituloPagina, 'Usuario no conectado!', 'Debes iniciar sesión para ver el contenido.');
}
else{
$htmlFormLogin = buildFormularioPost();
$contenidoPrincipal=<<<EOS
<h1>Añadir un nuevo Post</h1>
$htmlFormLogin

EOS;
}
require 'includes/vistas/comun/layout.php';
