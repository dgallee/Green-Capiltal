<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\usuarios\usuarioDAO;

$tituloPagina = 'Login';

$form= new es\ucm\fdi\aw\usuarios\FormularioLogin();
$htmlFormLogin = $form->gestiona();
$contenidoPrincipal=<<<EOS
<h1 class='titulo'>Acceso al sistema</h1>
$htmlFormLogin
EOS;

require 'includes/vistas/comun/layout.php';
?>
