<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\Aplicacion;

$app = Aplicacion::getInstance();
$usuario_actual = $app->usuarioLogueado();
$dni = $app->DNIUsuario();
?>

<header class="mi-cabecera">
    <div class="logo">
        <a href="index.php">
        <img src= "<?= RUTA_IMGS.'/logo.png'?>" alt="Logo de Green Capital">
        </a>
    </div>
    <h2><a href="index.php">Inicio</a></h2>
    <h2><a href="tienda.php?pagina=1">Tienda</a></h2>
    <?php if ($usuario_actual && $app->esAdmin()): ?>
        <h2><a href="admin.php">Administración</a></h2>
    <?php endif; ?>

    <?php if ($usuario_actual && $app->esComerciante()): ?>
        <h2><a href="comerciante.php">Centro de comerciantes</a></h2>
    <?php endif; ?>

    <?php if ($usuario_actual && $app->esModerador()): ?>
        <h2><a href="moderador.php">Centro de valoraciones</a></h2>
    <?php endif; ?>

    <?php if ($usuario_actual): ?>
    <h2><a href="pedidos.php">Mis pedidos</a></h2>
    <h2>
        <a href="carrito.php">
            <img src="img/compras.png" alt="Carrito" class="botonImagen">
        </a>
    </h2>
    <?php endif; ?>


    <div class="user-login">
        <?= $app->saludo() ?>
    </div>
  
</header>
