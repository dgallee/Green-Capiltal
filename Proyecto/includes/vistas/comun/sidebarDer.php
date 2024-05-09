<?php
use es\ucm\fdi\aw\Aplicacion;

// Get the instance of the Aplicacion class
$app = Aplicacion::getInstance();
?>

<aside id="sidebarDer">
    <?php if(!$app->usuarioLogueado()): ?>
        <h2 class='titulo'> ¿Aún no te has registrado?</h2>
        <h3 class='ventajas'>Mira todas las ventajas que te pierdes...</h3>
        <ul>
            <li><strong>Ofertas personalizadas</strong></li>
            <li><strong>Acceso prioritario a nuevos productos</strong></li>
            <li><strong>Asesoramiento experto</strong></li>
            <li><strong>Seguimiento de pedidos</strong></li>
            <li><strong>Contenido exclusivo</strong></li>
            <li><strong>Eventos únicos para usuarios registrados</strong></li>
            <li><strong>Seguro antiaccidentes en el transporte</strong></li>
        </ul>
        <p> </p>
        <h4 class='ventajas'> No lo dudes más y regístrate ya haciendo click <a href="registro.php">aquí</a> </h4>
    <?php else: ?>
        <h2 class='privilegio'> ¡Privilegio exclusivo para usuarios registrados! </h2>
        <h3 class='aviso'> Masterclass gratuita del reconocido jardinero Monty Don en Julio</h3>
		<img src="img/montydon.png" alt="Monty Don" class="imagen-monty-don">
        <p class='sugerencia'> Revisa diariamente tu correo para poder asistir, habrá plazas limitadas</p>
    <?php endif; ?>
</aside>