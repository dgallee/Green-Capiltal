<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\productos\productosDAO;

$tituloPagina = 'procesarSumarExistencias';

if(isset($_POST["id"]) && isset($_POST["cantidad"])) {
    $idProducto = $_POST["id"];
    $cantidad = $_POST["cantidad"];

    // Validar que los datos recibidos no estén vacíos
    if(empty($idProducto) || empty($cantidad)) {
        // Manejar el caso en que los datos estén vacíos
        $mensajeError = "Error: Los datos recibidos son inválidos.";
    } else {
        // Sumar las existencias del producto
        if(productosDAO::sumarUnidades($idProducto, $cantidad)) {
            // Redirigir a la página de administración de productos con un mensaje de éxito
            header('Location: adminProductos.php?mensaje=Existencias actualizadas correctamente.');
            exit(); // Terminar la ejecución del script después de la redirección
        } else {
            // Manejar el caso en que ocurra un error al sumar las existencias
            $mensajeError = "Error: No se pudo actualizar las existencias del producto.";
        }
    }
} else {
    // Manejar el caso en que los datos no se hayan recibido correctamente
    $mensajeError = "Error: No se han recibido los datos necesarios.";
}



require_once RAIZ_APP."/vistas/comun/layout.php";

?>