<?php
    
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'usuarioDAO.php';

    $user = $_GET['user'];
    $dni = Usuario::delete($user);
    
    if ($delete){
        header('Location: adminUsuarios.php');
    }

    else {
        echo "ERROR";
        header('Location: adminUsuarios.php');
    }
?>
