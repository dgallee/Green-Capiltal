<?php
require_once __DIR__.'/../helpers/barrabusqueda.php';
require_once 'includes/src/FORMULARIOBusqueda.php';

$form= new MiProyecto\Formularios\FormularioBusqueda();
$formsearch = $form->gestiona();
?>

<div class="busqueda">
       <p><?=$formsearch?></p>
</div>
