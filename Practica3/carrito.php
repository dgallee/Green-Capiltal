<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/vistas/helpers/carrito.php';
    require_once 'carritoDAO.php';
    require_once 'productosDAO.php';

    $tituloPagina = 'Editar';

    $DNI = $_GET['DNI'];
    $carrito = Carrito::mostrarCarrito($DNI);

    if($carrito){
    
        $formCar = builtTablaCarrito($carrito);    
    
    } else {
        echo "El producto no existe.";
        $formCar= "";
    }

    $contenidoPrincipal=<<<EOS
    <h1>Carrito</h1>
    $formCar
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

