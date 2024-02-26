<?php
require_once 'includes/config.php';
require_once 'includes/src/forms/form_login.php';


$tituloPagina = 'Login';
$htmlFormLogin = buildFormularioLogin();
$contenidoPrincipal=<<<EOS
    <h1>LOGIN</h1>
    $htmlFormLogin
    <p>Crear una cuenta <a href=register.php>aqui</a>.</p>

EOS;

require 'includes/vistas/comun/layout.php';

?>
