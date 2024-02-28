<?php
require_once 'includes/config.php';
require_once 'includes/src/forms/form_register.php';


$tituloPagina = 'Register';
$htmlFormRegister = buildFormularioRegister();
$contenidoPrincipal=<<<EOS
<h1>Register</h1>
$htmlFormRegister


EOS;

require 'includes/vistas/comun/layout.php';
