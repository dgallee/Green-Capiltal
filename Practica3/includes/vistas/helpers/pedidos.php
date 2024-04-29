



<?php

require_once 'productosDAO.php';
require_once 'pedidos.php';

function builtTablaPedidos($pedidos) {

    $pedidosAgrupados = [];
    foreach ($pedidos as $pedido) {
        $idPedido = $pedido['Id'];
        if (!isset($pedidosAgrupados[$idPedido])) {
            $pedidosAgrupados[$idPedido] = [];
        }
        $pedidosAgrupados[$idPedido][] = $pedido;
    }
    $dni=$pedido['DniUsuario'];
    //Scrollbar linea 19 a implementar en tienda?
    $tablaPedidos = <<<EOS
    <div style="width: 100%; height: 400px; overflow-y: scroll;">
    <table class="tablaPedidos">
    EOS;

    foreach ($pedidosAgrupados as $idPedido => $articulos) {
        $precioTotal = 0;
        $tablaPedidos .= <<<EOS
        <tr>
        <tr><td>Pedido con ID #$idPedido:</td></tr>
        EOS;
        foreach ($articulos as $articulo) {
            $infoProd = Producto::search($articulo['IdProducto']);
            $articuloPrecioTotal = $articulo['PrecioTotal'];
            $precioTotal += $articuloPrecioTotal;
            $tablaPedidos .= <<<EOS
            <tr>
            <td> Artículo: {$infoProd->getNombre()}</td>
            <td> Precio: {$infoProd->getPrecio()} €</td>
            <td> Cantidad: {$articulo['Unidades']}</td>
            <td> Precio total del artículo: {$articuloPrecioTotal} €</td>
            <td><img src='{$infoProd->getImagen()}' alt='' width='200'></td>
            <td><button type="button" class="botonvalorar" dni='{$dni}' idProducto='{$infoProd->getId()}' >valorar o modficar</button></td>

            </tr>
            EOS;
        }

        $tablaPedidos .= <<<EOS
        <tr><td>Precio total del pedido: $precioTotal €</td></tr>
        </tr>
        EOS;
    }

    $tablaPedidos .= "</table>";
    $tablaPedidos .= "</div>";

    return $tablaPedidos;
}

?>
