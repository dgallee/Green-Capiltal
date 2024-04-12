<?php
    
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'carritoDAO.php';

    $id = $_POST['idProducto'];
    $dni = $_SESSION['DNI'];
    $delete = Carrito::elimina($id, $dni);
    
    if ($delete){
        header('Location: carrito.php');
    }

    else {
        echo "No se ha podido eliminar el producto seleccionado del carrito";
        header('Location: carrito.php');
    }
?>