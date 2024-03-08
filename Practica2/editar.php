<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Iniciar Sesión</title>
</head>
<body>

<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/vistas/helpers/editar.php';
    require_once 'usuarioDAO.php';

    $user = $_GET['user'];
    $userEdit = Usuario::search($user);

    if($userEdit){
        echo "Nombre: " . $userEdit->getUName() . "<br>";
        echo "Apellidos: " . $userEdit->getUSurname() . "<br>";
        echo "Correo: " . $userEdit->getUEmail() . "<br>";
        echo "Dirección: " . $userEdit->getUDir() . "<br>";
        echo "Teléfono: " . $userEdit->getUTel() . "<br>";
        echo "DNI: " . $userEdit->getuDNI() . "<br>";
        echo "Usuario: " . $userEdit->getUUser() . "<br>";
        echo "Contraseña: " . $userEdit->getUPass() . "<br>";
        echo "Tipo: " . $userEdit->getUTipo() . "<br>";
    } else {
        echo "El usuario no existe.";
    }

    $formEdit = builtFormularioEditar($user, $userEdit->getuDNI());
    $contenidoPrincipal=<<<EOS
    <h1>Editar usuarios</h1>
    $formEdit
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

