<?php

function buildTablaProductos($productos){
    $tablaProductos = <<<EOS
    <div class="tableContainer">
    <table class="tableAdmin">
    <tr>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Existencias</th>
    <th>Id</th>
    <th>Acciones</th>
    </tr>
    EOS;

    // Añade una fila a la tabla para cada usuario
    $ruta = RUTA_APP . "/procesarsumarexistencias.php";
    foreach ($productos as $producto) {
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
            <a href="editarProducto.php?prod={$producto['Id']}">
                <img src="img/editar.png" alt="Editar información" class="botonImagen" />
            </a>
            <a href="eliminarProducto.php?prod={$producto['Id']}">
                <img src="img/eliminar.png" alt="Eliminar información" class="botonImagen" />
            </a>
        </td>
        </tr>
        EOS;
    }

    // Cierra la tabla
    $tablaProductos .= "</table>";

    // Añadir producto button
    $tablaProductos .= '<button onclick="location.href=\'agregarProducto.php\'">Añadir producto</button>';
    $tablaProductos .= '</div>'; 

    return $tablaProductos;
}

?>
