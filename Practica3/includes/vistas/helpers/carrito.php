<?php

require_once 'productosDAO.php';

function builtTablaCarrito($carrito) {

    $tablaCarrito = <<<EOS
    <table class="tablaCarrito">
    EOS;
    
    $precioTotal = 0;

    foreach ($carrito as $articulos) {
        
        $infoProd = Producto::search($articulos['IdProducto']);
        
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
                    <button class="red" type="submit">Eliminar</button>
                </form>
                <form method="post" action="sumaUnidadCarrito.php">
                    <input type="hidden" name="idProducto" value="{$articulos['IdProducto']}">
                    <input type="hidden" name="Cantidad" value="{$cantidad}">
                    <button type="submit">+</button>
                </form>
                <form method="post" action="restaUnidadCarrito.php">
                    <input type="hidden" name="idProducto" value="{$articulos['IdProducto']}">
                    <input type="hidden" name="Cantidad" value="{$cantidad}">
                    <button type="submit">-</button>
                </form>

        </td>
        </tr>
        EOS;
    }

    $tablaCarrito .= "</table>";
    $tablaCarrito .= <<<EOS
    <p class="descripcion2">El precio total del pedido es de $precioTotal €</p>
    <button class="finalizar-pedido" onclick="location.href='procesarPago.php'">Finalizar el pedido y pagar</button>
    EOS;
    return $tablaCarrito;
}

?>
