<?php

    require_once "includes/config.php";
    use es\ucm\fdi\aw\productos\productosDAO;

    $tituloPagina = "Tienda en línea";
    $contenidoPrincipal = <<<EOS
    <h1>¡Bienvenido a nuestra tienda!</h1>
    EOS;
    
    $productos = productosDAO::showProducts();
    $contenido = <<<EOS
    
    <div class='container'>
    EOS;

    foreach($productos as $producto) {

        if ($producto["Existencias"] > 0){
            
            $contenido .= <<<EOS
            <div class='producto'>
            <h2>{$producto["Nombre"]}</h2>
            <p>{$producto["Resumen"]}</p>
            <p>Precio: {$producto["Precio"]}€</p>
            <p>Existencias: {$producto["Existencias"]} unidades</p>
            <img src='{$producto["Imagen"]}' alt='{$producto["Nombre"]}' width='200'>
            <a href='detalles.php?prod={$producto['Id']}' class='btn-comprar'>Comprar</a>
            </div>
            EOS;
        }
    }

    $contenido .= "</div>";

    $contenidoPrincipal = <<<EOS
    <h1 class="titulo-tienda">Tienda</h1>
    <p>$contenido
    EOS;
   


    require('includes/vistas/comun/layout.php');
?>
