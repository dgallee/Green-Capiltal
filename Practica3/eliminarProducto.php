<?php
    
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'productosDAO.php';

    $id = $_GET['prod'];
    $delete = Producto::delete($id);
    
    if ($delete){
        header('Location: adminProductos.php');
    }

    else {
        echo "ERROR";
        header('Location: adminProductos.php');
    }
?>