<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\valoraciones\valoracionesDAO;
use es\ucm\fdi\aw\productos\productosDAO;
use es\ucm\fdi\aw\usuarios\usuarioDAO;

$tituloPagina = 'Gestion de Valoraciones';

if ($app->esAdmin() == false && $app->esModerador() == false) {
	Aplicacion::paginaError(403, $tituloPagina, '¡Acceso Denegado!', 'No tienes permisos suficientes para administrar y gestionar las valoraciones');
}

// Obtén el array de valoraciones
$valoraciones = valoracionesDAO::showTable();
// Comienza a construir la tabla
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
                    <th>Acciones</th>
                </tr>
        EOS;
    }
    foreach ($valoraciones as $valoracion) {
        $idProducto = $valoracion['IdProducto'];
        $dniUsuario = $valoracion['DniUsuario'];
        $nombreProd = productosDAO::obtenerNombre($idProducto);
        $nombreUsuario = usuarioDAO::obtenerNombre($dniUsuario);
        $tablaValoraciones .= <<<EOS
        <tr>
        <td>{$nombreProd}</td>
        <td>{$nombreUsuario}</td>
        <td>{$valoracion['Texto']}</td>
        <td>{$valoracion['Puntuacion']}</td>
        <td>
        <a href="valoraciones.php?Dni={$dniUsuario}&idProd={$idProducto}">
            <img src="img/editar.png" alt="Editar" class="botonImagen" >
         </a>
    
        <a href="eliminarvaloracion.php?Dni={$dniUsuario}&idProd={$idProducto}">
                <img src="img/eliminar.png" alt="Eliminar" class="botonImagen" >
        </a>
        </td>
        </tr>
        EOS;
    }

    // Cierra la tabla
    $tablaValoraciones .= "</table>";    
    $tablaValoraciones .= '</div>'; 

$contenidoPrincipal = <<<EOS
<h1 class='titulo'>Listado de valoraciones</h1>
<p>$tablaValoraciones</p>
EOS;

require 'includes/vistas/comun/layout.php';

?>