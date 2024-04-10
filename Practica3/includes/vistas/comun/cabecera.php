<?php
require_once __DIR__.'/../helpers/usuarios.php';
require_once __DIR__.'/../helpers/barrabusqueda.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/login.php';

$usuario_actual = estaLogado();
$dni = dniUsuarioLogado();
?>

<header class="mi-cabecera">
    <div class="logo">
        <a href="index.php">
        <img src= "<?= RUTA_IMGS.'/logo.png'?>" alt="Logo de Green Capital">
        </a>
    </div>
    <h2><a href="index.php">Inicio</a></h2>
    <h2><a href="contenido.php">Contenido</a></h2>
    <h2><a href="tienda.php">Tienda</a></h2>
    <?php if ($usuario_actual && esAdmin()): ?>
        <h2><a href="admin.php">Administración</a></h2>
    <?php endif; ?>

    <?php if ($usuario_actual && esComerciante()): ?>
        <h2><a href="comerciante.php">Centro de comerciantes</a></h2>
    <?php endif; ?>

    <?php if ($usuario_actual): ?>
        <h2><a href="carrito.php">Carrito</a></h2>
    <?php endif; ?>

    <?php if ($usuario_actual): ?>
        <h2><a href="pedidos.php">Mis pedidos</a></h2>
    <?php endif; ?>

    <div class="user-login">
        <?= saludo() ?>
    </div>
  
</header>
