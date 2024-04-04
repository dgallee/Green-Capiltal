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
    $id = $_POST["id"];
    $esp = $_POST["especie"];
    $img = $_POST["imagen"];

    $esValido = (Producto::edit($name, $res, $desc, $precio, $cat, $id, $esp, $img));
    if ($esValido){

        header('Location: adminProductos.php');
    }
    else{
        
        header('Location: adminProductos.php');
    }  

?>