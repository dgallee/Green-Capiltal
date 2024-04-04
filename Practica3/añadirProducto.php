<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/vistas/helpers/añadirProducto.php';
    require_once 'productosDAO.php';

    $tituloPagina = 'Añadir';

    $formEdit = builtFormularioAñadirProducto();
    $contenidoPrincipal=<<<EOS
    <h1>Añadir productos</h1>
    $formEdit
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

