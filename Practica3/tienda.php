<?php

    $tituloPagina = "Tienda en línea";
    $contenidoPrincipal = <<<EOS
    <h1>¡Bienvenido a nuestra tienda!</h1>

    EOS;

    require_once "includes/src/Aplicacion.php";
    require_once "includes/config.php";
    require_once 'includes/vistas/helpers/usuarios.php';
    require_once 'productosDAO.php';
    require_once 'includes/vistas/helpers/tienda.php';

    // Consulta SQL para recuperar los productos
    // Inicio del contenedor de productos
    
    $productos = Producto::showProducts();
    $contenidoTienda = builtContent($productos);

    $contenidoPrincipal = <<<EOS
    <h1 class="titulo-tienda">Tienda</h1>
    <p>$contenidoTienda</p>
    EOS;
   


    require('includes/vistas/comun/layout.php');
?>
