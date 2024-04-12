<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/registro.php';
require_once 'includes/src/FORMULARIORegistro.php';

$tituloPagina = 'Registro';

//$htmlFormReg = buildFormularioRegistro();
$form= new MiProyecto\Formularios\FormularioRegistro();
$htmlFormReg = $form->gestiona();

$contenidoPrincipal=<<<EOS
<h1 class='titulo'>Registro en la web</h1>
$htmlFormReg
EOS;

require 'includes/vistas/comun/layout.php';
?>