<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?= RUTA_CSS.'/estilo.css'?>" >
	<link rel="stylesheet" type="text/css" href="<?= RUTA_CSS.'/estilo.css'?>" >
	<link rel="stylesheet" href="css/tienda.css">
	<title><?= $tituloPagina ?></title>
</head>
<body>
<div id="contenedor">
<?php

require('cabecera.php');
require('busqueda.php');
require('sidebarIzq.php');

?>
<main>
	<article>
		<?= $contenidoPrincipal ?>
	</article>
</main>
<?php

require('sidebarDer.php');
require('pie.php');

?>
</div>
<script src="<?= RUTA_JS ?>/jquery-3.7.1.min.js"></script>
<script src="<?= RUTA_JS ?>/busqueda.js"></script>
<script src="<?= RUTA_JS ?>/valoraciones.js"></script>
<script src="<?= RUTA_JS ?>/comprobaciones.js"></script>
<script src="<?= RUTA_JS ?>/compra.js"></script>
<script src="<?= RUTA_JS ?>/paginacion.js"></script>

</body>
</html>