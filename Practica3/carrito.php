<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/vistas/helpers/carrito.php';
    require_once 'carritoDAO.php';
    require_once 'productosDAO.php';

    $tituloPagina = 'Carrito';
    $DNI = $_SESSION["DNI"];
    $carrito = Carrito::mostrarCarrito($DNI);

    if($carrito){
    
        $formCar = builtTablaCarrito($carrito);    
    
    } else {
        $formCar= "No hay productos aún en el carrito. Visita nuestra tienda para llenarlo de maravillosas flores.";
    }

    $contenidoPrincipal=<<<EOS
    <h1 class="titulo-tienda">Carrito</h1>
    $formCar
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

