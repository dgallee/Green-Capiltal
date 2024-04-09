<?php

require_once 'productosDAO.php';

function builtTablaCarrito($carrito) {

    $tablaCarrito = <<<EOS
    <table class="tablaCarrito">
    EOS;

    foreach ($carrito as $articulos) {
        
        $infoProd = Producto::search($articulos['Id_producto']);
        
        $tablaCarrito .= <<<EOS
        <tr>
        <td>{$infoProd->getNombre()}</td>
        <td>{$infoProd->getRes()}</td>
        <td>{$infoProd->getPrecio()}</td>
        <td>{$articulos['Cantidad']}</td>
        <td><img src='{$infoProd->getImagen()}' alt='' width='200'></td>
        </tr>
        EOS;
    }

    $tablaCarrito .= "</table>";

    $tablaCarrito .= '<button onclick="location.href=\'agregarProducto.php\'">PAGAR</button>';

    return $tablaCarrito;
}

?>
