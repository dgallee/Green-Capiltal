<!DOCTYPE html>
<html lang="es">
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?= RUTA_CSS.'/estilo.css'?>" />
	<link rel="stylesheet" type="text/css" href="<?= RUTA_CSS.'/estilo.css'?>" />
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
<script src="<?= RUTA_JS ?>/busqueda.js"></script>
</body>
</html>