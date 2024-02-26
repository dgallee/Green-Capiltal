<?php
require_once 'includes/config.php';
require_once 'includes/src/forms/form_item.php';
require_once 'includes/vistas/helpers/autorizacion.php';


$tituloPagina = 'Nuevo Item';
if (!estaLogado()) {
	Utils::paginaError(403, $tituloPagina, 'Usuario no conectado!', 'Debes iniciar sesión para ver el contenido.');
}
else{
$htmlFormLogin = buildFormularioItem();
$contenidoPrincipal=<<<EOS
<h1>Añadir un nuevo Item</h1>
$htmlFormLogin

EOS;
}

require 'includes/vistas/comun/layout.php';
