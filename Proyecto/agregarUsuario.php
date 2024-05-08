<?php
    require_once 'includes/config.php';

    $tituloPagina = 'Agregar';

    $form= new es\ucm\fdi\aw\usuarios\FormularioAgregarUsuario();
    $formAddUser = $form->gestiona();    
    $contenidoPrincipal=<<<EOS
    <h1>Agregar usuarios</h1>
    $formAddUser
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

