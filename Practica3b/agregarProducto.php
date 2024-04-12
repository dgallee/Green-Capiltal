<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/vistas/helpers/agregarProducto.php';
    require_once 'productosDAO.php';

    $tituloPagina = 'Agregar';

    $formEdit = builtFormularioAgregarProducto();
    $contenidoPrincipal=<<<EOS
    <h1>Agregar productos</h1>
    $formEdit
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

