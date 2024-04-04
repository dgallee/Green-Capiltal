<?php

function buildTablaProductos($productos){
    $tablaProductos = <<<EOS
    <table>
    <tr>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Existencias</th>
    <th>Id</th>
    </tr>
    EOS;

    // Añade una fila a la tabla para cada usuario
    foreach ($productos as $producto) {
        $tablaProductos .= <<<EOS
        <tr>
        <td>{$producto['Nombre']}</td>
        <td>{$producto['Precio']}</td>
        <td>{$producto['Existencias']}</td>
        <td>{$producto['Id']}</td>
        <td>
            <button onclick="location.href='editar.php?prod={$producto['Id']}'">Añadir existencias</button>
            <button onclick="location.href='editarProducto.php?prod={$producto['Id']}'">Editar información</button>
            <button onclick="location.href='eliminarProducto.php?prod={$producto['Id']}'">Eliminar producto</button>
        </td>
        </tr>
        EOS;
    }

    // Cierra la tabla
    $tablaProductos .= "</table>";

    // Añadir producto button
    $tablaProductos .= '<button onclick="location.href=\'añadirProducto.php\'">Añadir producto</button>';

    return $tablaProductos;
}

?>
