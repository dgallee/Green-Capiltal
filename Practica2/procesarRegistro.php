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
    $password = $_POST["password"] ?? null;

    $esValido = ($usuario = Usuario::register($name, $surname, $mail, $dire, $tfno, $dni, $username, $password));
    if ($esValido)  echo "Inicio de sesión correcto.";
    else  echo "Inicio de sesión malo.";
?>