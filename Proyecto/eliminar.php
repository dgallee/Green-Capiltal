<?php
    
    require_once 'includes/config.php';
    use es\ucm\fdi\aw\usuarios\usuarioDAO;

    $user = htmlspecialchars($_GET['user']);
    $dni = usuarioDAO::delete($user);
    
    if ($delete){
        header('Location: adminUsuarios.php');
    }

    else {
        error_log("ERROR");
        header('Location: adminUsuarios.php');
    }
?>
