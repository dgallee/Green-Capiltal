<?php
require_once 'productosDAO.php';
require_once 'usuarioDAO.php';
function buildTablaValoraciones($valoraciones){
    $tablaValoraciones = '';

    // Verifica si $productos no está vacío
    if(!empty($valoraciones)){
        // Agrega la estructura HTML para la tabla si $productos no está vacío
        $tablaValoraciones .= <<<EOS
        <div class="tableContainer">
            <table class="tableAdmin">
                <tr>
                    <th>Producto</th>
                    <th>Usuario</th>
                    <th>Valoracion</th>
                    <th>Puntuacion</th>
                </tr>
        EOS;
    }
    foreach ($valoraciones as $valoracion) {
        $idProducto = $valoracion['IdProducto'];
        $dniUsuario = $valoracion['DniUsuario'];
        $nombreProd = Producto::obtenerNombre($idProducto);
        $nombreUsuario = Usuario::obtenerNombre($dniUsuario);
        $tablaValoraciones .= <<<EOS
        <tr>
        <td>{$nombreProd}</td>
        <td>{$nombreUsuario}</td>
        <td>{$valoracion['Texto']}</td>
        <td>{$valoracion['Puntuacion']}</td>
        <td>
        </td>
        </tr>
        EOS;
    }

    // Cierra la tabla
    $tablaValoraciones .= "</table>";   
    $tablaValoraciones .= '</div>'; 

    return $tablaValoraciones;
}

?>
