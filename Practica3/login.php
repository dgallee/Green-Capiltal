<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/login.php';
require_once 'includes/src/FORMULARIOLogin.php';


$tituloPagina = 'Login';


$form= new MiProyecto\Formularios\FormularioLogin();
$htmlFormLogin = $form->gestiona();
$contenidoPrincipal=<<<EOS
<h1 class='titulo'>Acceso al sistema</h1>
$htmlFormLogin
EOS;

require 'includes/vistas/comun/layout.php';
?>
