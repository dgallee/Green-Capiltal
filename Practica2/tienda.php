<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="tienda.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en línea</title>
</head>
<body>

<h1>¡Bienvenido a nuestra tienda!</h1>

<?php
require_once "includes/src/BD.php";
require_once "includes/config.php";
$conn = BD::getInstance()->getConexion();
// Consulta SQL para recuperar los productos
$sql = "SELECT Nombre, Descripción, Precio, Categoría, Existencias, Especie, Imagen FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Inicio del contenedor de productos
    echo "<div class='container'>";

    // Mostrar los productos
    while($row = $result->fetch_assoc()) {
        echo "<div class='producto'>";
        echo "<h2>" . $row["Nombre"] . "</h2>";
        echo "<p>" . $row["Descripción"] . "</p>";
        echo "<p>Precio: " . $row["Precio"] . "€</p>";
        echo "<p>Existencias: " . $row["Existencias"] . " unidades</p>";
        echo "<img src='" . $row["Imagen"] . "' alt='" . $row["Nombre"] . "' width='200'>";
        echo "<a href='#' class='btn-comprar'>Comprar</a>";
        echo "</div>";
    }

    // Fin del contenedor de productos
    echo "</div>";
} else {
    echo "No se encontraron productos.";
}
?>

</body>
</html>