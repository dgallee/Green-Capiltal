<?php

    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/vistas/helpers/login.php';
    require_once 'includes/vistas/helpers/registro.php';
    require_once 'usuarioDAO.php';

    $name = $_POST["nombre"];
    $surname = $_POST["apellidos"];
    $mail = $_POST["correo"];
    $dire = $_POST["direccion"];
    $tfno = $_POST["telefono"];
    $dni = $_POST["dni"];
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST["password"] ?? null;

    $esValido = ($usuario = Usuario::register($name, $surname, $mail, $dire, $tfno, $dni, $username, $password));
    if ($esValido){
        $htmlFormLogin = buildFormularioLogin($username, $password);
        $contenidoPrincipal = <<<EOS
    <h1 class='titulo'>Registro</h1>
    <p class='mensaje'>Usuario registrado con éxito.</p>
    $htmlFormLogin
    EOS;
        require 'includes/vistas/comun/layout.php';
        exit();
    }  
    else{
        $htmlFormReg = buildFormularioRegistro();
        $contenidoPrincipal = <<<EOS
    <h1 class='titulo'>Error</h1>
    <p class='mensaje'>Error en el registro.</p>
    $htmlFormReg
    EOS;
        require 'includes/vistas/comun/layout.php';
        exit();
    }
    
?>