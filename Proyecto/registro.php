<?php
require_once 'includes/config.php';

$tituloPagina = 'Registro';

$form= new es\ucm\fdi\aw\usuarios\FormularioRegistro();
$htmlFormReg = $form->gestiona();

$contenidoPrincipal=<<<EOS
<h1 class='titulo'>Registro en la web</h1>
$htmlFormReg
EOS;

require 'includes/vistas/comun/layout.php';
?>