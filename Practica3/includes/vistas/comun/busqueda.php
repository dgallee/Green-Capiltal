<?php
require_once __DIR__.'/../helpers/barrabusqueda.php';
require_once 'includes/src/FORMULARIOBusqueda.php';

$form= new MiProyecto\Formularios\FormularioBusqueda();
$formsearch = $form->gestiona();
// $contenidoPrincipal=$form->procesaFormulario();
?>

<div class="busqueda">
       <p><?=$formsearch?></p>
</div>
