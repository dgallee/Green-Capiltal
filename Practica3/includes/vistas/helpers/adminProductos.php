<?php

function buildTablaProductos($productos){
    $tablaProductos = <<<EOS
    <div class="admin-container">
    <table>
    <tr>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Existencias</th>
    <th>Id</th>
    </tr>
    EOS;

    // Añade una fila a la tabla para cada usuario
    $ruta = RUTA_APP . "/procesarsumarexistencias.php";
    foreach ($productos as $producto) {
//me molaria alinear al centro las tablas pero primero haz lo del form
        $tablaProductos .= <<<EOS
        <tr>
        <td>{$producto['Nombre']}</td>
        <td>{$producto['Precio']}</td>
        <td>
            {$producto['Existencias']}
            <form action="$ruta" method="post">
                <input type="hidden" name="id" value="{$producto['Id']}">
                <input type="number" name="cantidad" min="1" value="1">
                <button type="submit">Añadir existencias</button>
            </form>
        </td>
        <td>{$producto['Id']}</td>
        <td>
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
    $tablaProductos .= '</div>'; 
   

    return $tablaProductos;
}

?>
