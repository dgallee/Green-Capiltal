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
    
        // Ruta donde se almacenará la imagen en la carpeta de imágenes del proyecto
        $rutaDestino = IMAG . $nombreArchivo;
        $rutaBD = 'img/' . $nombreArchivo;
    
        // Mover el archivo a la carpeta de imágenes del proyecto
        if(move_uploaded_file($ubicacionTemporal, $rutaDestino)) {
            // Si se mueve correctamente, continúa con el proceso de guardar la ruta en la base de datos
            $esValido = (Producto::add($name, $res, $desc, $precio, $cat, $existencias, $esp, $rutaBD, $dniVendedor));
            if ($esValido) {
                header('Location: adminProductos.php');
            } else {
                header('Location: adminProductos.php');
            }
        } else {
            // Si hay algún error al mover el archivo, redirecciona a una página de error o maneja el error según corresponda
            echo "Hubo un error al subir el archivo.";
        }
    } else {
        // Si no se cargó ningún archivo, redirecciona a una página de error o maneja la situación según corresponda
        echo "No se cargó ninguna imagen.";
    }


?>