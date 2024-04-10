<?php

require_once 'productosDAO.php';

function builtTablaPedidos($pedidos) {

    $tablaPedidos = <<<EOS
    <table class="tablaCarrito">
    EOS;

    $precioTotal = 0;

    foreach ($pedidos as $articulos) {
        
        $infoProd = Producto::search($articulos['IdProducto']);
        $precioProducto = $infoProd->getPrecio();
        $articuloPrecioTotal = $articulos['PrecioTotal'];
        $precioTotal = $precioTotal + $articuloPrecioTotal;
        $tablaCarrito .= <<<EOS
        <tr>
        <td> Artículo: {$infoProd->getNombre()}</td>
        <td>{$infoProd->getRes()}</td>
        <td> Precio: {$infoProd->getPrecio()} €</td>
        <td> Cantidad: {$articulos['Cantidad']}</td>
        <td> Precio total del artículo: {$articuloPrecioTotal} €</td>
        <td><img src='{$infoProd->getImagen()}' alt='' width='200'></td>
        </tr>
        EOS;
    }

    $tablaPedidos .= "</table>";
    $tablaPedidos .= '<p class="descripcion2">El precio total del pedido es de ' . $precioTotal . '€</p>';

    return $tablaPedidos;
}

?>
