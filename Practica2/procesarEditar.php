<?php

    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/vistas/helpers/login.php';
    require_once 'usuarioDAO.php';

    $name = $_POST["nombre"];
    $surname = $_POST["apellidos"];
    $mail = $_POST["correo"];
    $dire = $_POST["direccion"];
    $tfno = $_POST["telefono"];
    $dni = $_POST["dni"];
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST["password"];
    $tipo = $_POST["type"];
    $oldUser = $_POST["oldUser"];

    $esValido = (Usuario::edit($name, $surname, $mail, $dire, $tfno, $dni, $username, $password, $tipo, $oldUser));
    if ($esValido){

        header('Location: adminUsuarios.php');
    }
    else{
        
        header('Location: adminUsuarios.php');
    }  

?>