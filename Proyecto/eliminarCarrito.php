<?php
    
    require_once 'includes/config.php';
    use es\ucm\fdi\aw\carrito\carritoDAO;

    $id = htmlspecialchars($_POST['idProducto']);
    $dni = $app->DNIUsuario();
    $delete = carritoDAO::elimina($id, $dni);
    
    if ($delete){
        header('Location: carrito.php');
    }

    else {
        echo "No se ha podido eliminar el producto seleccionado del carrito";
        header('Location: carrito.php');
    }
?>