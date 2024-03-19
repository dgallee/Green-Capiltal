<?php
require_once __DIR__.'/../helpers/usuarios.php';
$usuario_actual = estaLogado();
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
    <?php if ($usuario_actual && esAdmin()): ?>
        <h2><a href="admin.php">Administración</a></h2>
    <?php endif; ?>
    <div class="user-login">
        <?= saludo() ?>
    </div>
</header>