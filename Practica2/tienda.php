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
$tituloPagina = "Tienda en línea";
$contenidoPrincipal = <<<EOS
<h1>¡Bienvenido a nuestra tienda!</h1>

EOS;

require_once "includes/src/BD.php";
require_once "includes/config.php";
require_once 'includes/vistas/helpers/usuarios.php';
$conn = BD::getInstance()->getConexion();
// Consulta SQL para recuperar los productos
$sql = 'SELECT Nombre, Descripción, Precio, Categoría, Existencias, Especie, Imagen FROM productos';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Inicio del contenedor de productos
    $contenidoPrincipal .= "<div class='container'>";

    // Mostrar los productos
    while($row = $result->fetch_assoc()) {
        $contenidoPrincipal .= "<div class='producto'>";
        $contenidoPrincipal .= "<h2>" . $row["Nombre"] . "</h2>";
        $contenidoPrincipal .= "<p>" . $row["Descripción"] . "</p>";
        $contenidoPrincipal .= "<p>Precio: " . $row["Precio"] . "€</p>";
        $contenidoPrincipal .= "<p>Existencias: " . $row["Existencias"] . " unidades</p>";
        $contenidoPrincipal .= "<img src='" . $row["Imagen"] . "' alt='" . $row["Nombre"] . "' width='200'>";
        $contenidoPrincipal .= "<a href='#' class='btn-comprar'>Comprar</a>";
        $contenidoPrincipal .= "</div>";
    }

    // Fin del contenedor de productos
    $contenidoPrincipal .= "</div>";
} else {
    $contenidoPrincipal .= "No se encontraron productos.";
}

require('includes/vistas/comun/layout.php');
?>

</body>
</html>