<?php
    require_once 'includes/config.php';
    use es\ucm\fdi\aw\carrito\carritoDAO;
    use es\ucm\fdi\aw\productos\productosDAO;

    $tituloPagina = 'Carrito';
    $DNI = $app->DNIUsuario();
    $carrito = carritoDAO::mostrarCarrito($DNI);

    if($carrito){
    
        $tablaCarrito = <<<EOS
        <table class="tablaCarrito">
        EOS;
        
        $precioTotal = 0;
    
        foreach ($carrito as $articulos) {
            
            $infoProd = productosDAO::search($articulos['IdProducto']);
            
            $precioProducto = $infoProd->getPrecio();
            $articuloPrecioTotal = $articulos['PrecioTotal'];
            $cantidad = $articulos['Cantidad'];
            $precioTotal = $precioTotal + $articuloPrecioTotal;
            $tablaCarrito .= <<<EOS
            <tr>
            <td> Artículo: {$infoProd->getNombre()}</td>
    
            <td> Precio: {$infoProd->getPrecio()} €</td>
            <td> Cantidad: {$cantidad}</td>
            <td> Precio total del artículo: {$articuloPrecioTotal} €</td>
            <td><img src='{$infoProd->getImagen()}' alt='' width='200'></td>
            <td>
                    <form method="post" action="eliminarCarrito.php">
                        <input type="hidden" name="idProducto" value="{$articulos['IdProducto']}">
                        <input type="hidden" name="precioProducto" value="{$precioProducto}">
                        <button class="botonElimina" type="submit">Eliminar</button>
                    </form>
                    <form method="post" action="sumaUnidadCarrito.php" class="botonContainerCarrito">
                        <input type="hidden" name="idProducto" value="{$articulos['IdProducto']}">
                        <input type="hidden" name="Cantidad" value="{$cantidad}">
                        <button class="botonCarrito" type="submit">+</button>
                    </form>
                    <form method="post" action="restaUnidadCarrito.php" class="botonContainerCarrito">
                        <input type="hidden" name="idProducto" value="{$articulos['IdProducto']}">
                        <input type="hidden" name="Cantidad" value="{$cantidad}">
                        <button class="botonCarrito" type="submit">-</button>
                    </form>
    
            </td>
            </tr>
            EOS;
        }
    
        $tablaCarrito .= "</table>";
        $tablaCarrito .= <<<EOS
        <p class="descripcion2">El precio total del pedido es de $precioTotal €</p>
        <button class="finalizarPedido" onclick="location.href='procesarPago.php'">Finalizar el pedido y pagar</button>
        EOS;    
    
    } else {
        $tablaCarrito= '<div class="descripcion2">No hay productos aún en el carrito.
        Visita nuestra <a href="tienda.php">tienda</a> para llenarlo de maravillosas flores.</div>';    
    }
    $contenidoPrincipal=<<<EOS
    <h1 class="titulo-tienda">Carrito</h1>
    $tablaCarrito
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

