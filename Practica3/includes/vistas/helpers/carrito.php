<?php

require_once 'productosDAO.php';

function builtTablaCarrito($carrito) {

    $tablaCarrito = <<<EOS
    <table class="tablaCarrito">
    EOS;

    foreach ($carrito as $articulos) {
        
        $infoProd = Producto::search($articulos['IdProducto']);
        
        $tablaCarrito .= <<<EOS
        <tr>
        <td> Artículo: {$infoProd->getNombre()}</td>
        <td>{$infoProd->getRes()}</td>
        <td> Precio: {$infoProd->getPrecio()} €</td>
        <td> Cantidad: {$articulos['Cantidad']}</td>
        <td><img src='{$infoProd->getImagen()}' alt='' width='200'></td>
        <td>
                <form method="post" action="eliminarCarrito.php">
                    <input type="hidden" name="idProducto" value="{$articulos['IdProducto']}">
                    <button type="submit">Eliminar</button>
                </form>
        </td>
        </tr>
        EOS;
    }

    $tablaCarrito .= "</table>";
    $tablaCarrito .= '<button onclick="location.href=\'agregarProducto.php\'">PAGAR</button>';

    return $tablaCarrito;
}

?>
