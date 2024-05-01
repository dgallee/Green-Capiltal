<?php
    require_once 'includes/config.php';

    $tituloPagina = 'Agregar';

    $form= new es\ucm\fdi\aw\productos\FormularioAgregarProducto();
    $formAddProduct = $form->gestiona();    
    $contenidoPrincipal=<<<EOS
    <h1>Agregar productos</h1>
    $formAddProduct
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

