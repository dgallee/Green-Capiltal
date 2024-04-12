<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/vistas/helpers/agregarProducto.php';
    require_once 'productosDAO.php';
    require_once 'includes/src/FORMULARIOAgregarProducto.php';

    $tituloPagina = 'Agregar';

    $form= new MiProyecto\Formularios\FormularioAgregarProducto();
    $formAddProduct = $form->gestiona();    
    $contenidoPrincipal=<<<EOS
    <h1>Agregar productos</h1>
    $formAddProduct
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

