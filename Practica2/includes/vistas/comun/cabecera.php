<?php
require_once __DIR__.'/../helpers/usuarios.php';
?>

<header class="mi-cabecera">
    <div class="logo">
        <a href="index.php">
            <img src="/Proyecto-AW/Green-Capiltal/Practica2/img/logo.png" alt="Logo de Green Capital">
        </a>
    </div>
    <h2><a href="index.php">Inicio</a></h2>
    <h2><a href="contenido.php">Contenido</a></h2>
    <h2><a href="tienda.php">Tienda</a></h2>
    <div class="user-login">
        <?= saludo() ?>
        <!-- Aquí puedes incluir la lógica PHP para mostrar el nombre de usuario y el enlace de inicio de sesión o cierre de sesión -->
    </div>
</header>