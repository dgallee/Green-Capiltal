<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="tienda.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en línea</title>
</head>
<body>

<?php

function builtContent($productos) {
    $contenido = <<<EOS
<div class='container'>
EOS;

    foreach($productos as $producto) {
        $contenido .= <<<EOS
<div class='producto'>
<h2>{$producto["Nombre"]}</h2>
<p>{$producto["Descripción"]}</p>
<p>Precio: {$producto["Precio"]}€</p>
<p>Existencias: {$producto["Existencias"]} unidades</p>
<img src='{$producto["Imagen"]}' alt='{$producto["Nombre"]}' width='200'>
<a href='#' class='btn-comprar'>Comprar</a>
</div>
EOS;
    }

    $contenido .= "</div>";

    return $contenido;
}

?>

</body>
</html>
