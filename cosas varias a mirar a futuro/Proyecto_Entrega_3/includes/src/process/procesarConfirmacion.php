<?php
require_once '../../config.php';
require_once RAIZ_APP.'/vistas/helpers/autorizacion.php';
$tituloPagina = 'Nuevo Post';

$id = $_GET['id'];

if (!estaLogado()) {
	Utils::paginaError(403, $tituloPagina, 'Usuario no conectado!', 'Debes iniciar sesión para ver el contenido.');
}
else{ 

    $conn = BD::getInstance()->getConexion();

    $queryEx = sprintf("UPDATE exchanges SET confirmation =TRUE WHERE idExchange=$id");
    $ex = $conn->query($queryEx);


    $contenidoPrincipal=<<<EOS
    <h1>Has confirmado tu oferta</h1>

    EOS;
}

require_once RAIZ_APP."/vistas/comun/layout.php";

