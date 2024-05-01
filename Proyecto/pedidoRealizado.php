<?php
require_once 'includes/config.php';


$tituloPagina = 'Pedidos';

$contenidoPrincipal=<<<EOS
	<h1 class="titulo">¡Enhorabuena! Tu pedido se ha completado con éxito</h1>
    <p class ="definicion2"> Puedes acceder a la informacion completa de tus pedidos en la sección Mis pedidos o 
    haciendo click <a href="pedidos.php">aquí</a> </p>
EOS;

require 'includes/vistas/comun/layout.php';
?>