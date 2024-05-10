<?php
    
    require_once 'includes/config.php';
    use es\ucm\fdi\aw\productos\productosDAO;

    $id = htmlspecialchars($_GET['prod']);
    $delete = productosDAO::delete($id);
    
    if ($delete){
        header('Location: adminProductos.php');
    }

    else {
        error_log("ERROR");
        header('Location: adminProductos.php');
    }
?>