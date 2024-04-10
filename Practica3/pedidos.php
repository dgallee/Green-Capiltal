<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/vistas/helpers/carrito.php';
    require_once 'includes/vistas/helpers/pedidos.php';
    require_once 'carritoDAO.php';
    require_once 'productosDAO.php';


    $tituloPagina = 'Mis pedidos';
    $DNI = $_SESSION["DNI"];
    $pedidos = Pedido::mostrarPedidos($DNI);


    if($pedidos){
    
        $tablaPedidos = builtTablaPedidos($pedidos);    
    
    } else {
        $tablaPedidos = '<div class="descripcion2">No ha realizado aún ningún pedido en nuestra web.
        Acceda a nuestra <a href="tienda.php">tienda</a> para empezar a disfrutar de nuestros impresionantes productos</div>';
    }

    $contenidoPrincipal=<<<EOS
    <h1 class="titulo-tienda">Mis pedidos</h1>
    $tablaPedidos
    EOS;

    require 'includes/vistas/comun/layout.php';
?>