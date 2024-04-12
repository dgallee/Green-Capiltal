<?php

require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/vistas/helpers/login.php';
require_once 'productosDAO.php';

$name = $_POST["nombre"];
$res = $_POST["resumen"];
$desc = $_POST["descripcion"];
$precio = $_POST["precio"];
$cat = $_POST["categoria"];
$existencias = $_POST["existencias"];
$esp = $_POST["especie"];
$dniVendedor = $_SESSION["DNI"];

if(isset($_FILES['imagen'])) {
    $nombreArchivo = $_FILES['imagen']['name'];
    $ubicacionTemporal = $_FILES['imagen']['tmp_name'];
    $error = $_FILES['imagen']['error'];

    // Obtener el ID del producto después de insertarlo en la base de datos
    $idProducto = Producto::add($name, $res, $desc, $precio, $cat, $existencias, $esp, '', $dniVendedor);

    if ($idProducto !== false) {
        // Renombrar el archivo de imagen con el ID del producto
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $nuevoNombreArchivo = $idProducto . '.' . $extension;
        $rutaDestino = IMAG . $nuevoNombreArchivo;
        $rutaBD = 'img/' . $nuevoNombreArchivo;

        // Mover el archivo a la carpeta de imágenes del proyecto con el nuevo nombre
        if(move_uploaded_file($ubicacionTemporal, $rutaDestino)) {
            // Actualizar la ruta de la imagen en la base de datos con el nuevo nombre
            rename($rutaDestino, IMAG . $nuevoNombreArchivo);
            // Agregar el producto con la ruta de la imagen actualizada
            $esValido = (Producto::actualizarImagen($idProducto, $rutaBD));

            if ($esValido) {
                header('Location: adminProductos.php');
            } else {
                echo "Hubo un error al agregar el producto.";
            }
        } else {
            // Si hay algún error al mover el archivo, redirecciona a una página de error o maneja el error según corresponda
            echo "Hubo un error al subir el archivo.";
        }
    } else {
        // Si no se pudo agregar el producto a la base de datos, redirecciona a una página de error o maneja el error según corresponda
        echo "Hubo un error al agregar el producto.";
    }
} else {
    // Si no se cargó ningún archivo, redirecciona a una página de error o maneja la situación según corresponda
    echo "No se cargó ninguna imagen.";
}

?>
