<?php
    
    require_once 'includes/config.php';
    use es\ucm\fdi\aw\usuarios\usuarioDAO;

    $user = $_GET['user'];
    $dni = usuarioDAO::delete($user);
    
    if ($delete){
        header('Location: adminUsuarios.php');
    }

    else {
        echo "ERROR";
        header('Location: adminUsuarios.php');
    }
?>
