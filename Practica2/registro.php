<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <main>
        
    </main>
</body>
</html>


<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/registro.php';


$tituloPagina = 'Registro';

$htmlFormReg = buildFormularioRegistro();
$contenidoPrincipal=<<<EOS
<h1>Registro en la web</h1>
$htmlFormReg
EOS;

require 'includes/vistas/comun/layout.php';
?>