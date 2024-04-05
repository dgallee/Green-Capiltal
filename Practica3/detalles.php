<?php

    require_once "includes/src/Aplicacion.php";
    require_once "includes/config.php";
    require_once 'includes/vistas/helpers/usuarios.php';
    require_once 'productosDAO.php';
    require_once 'includes/vistas/helpers/detalles.php';
    
    $tituloPagina = "Detalles del producto";

    $id = $_GET['prod'];
    $caracteristicas = Producto::search($id);
    $detallesProd = builtDetails($caracteristicas->getNombre(), $caracteristicas->getId(), $caracteristicas->getDesc(), $caracteristicas->getPrecio(), $caracteristicas->getCategoria(), $caracteristicas->getExistencias(), $caracteristicas->getEspecie(), $caracteristicas->getImagen());

    $contenidoPrincipal = <<<EOS
    <p>$detallesProd</p>
    EOS;
   


    require('includes/vistas/comun/layout.php');
?>
