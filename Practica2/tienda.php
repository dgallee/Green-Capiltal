<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en línea</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Tienda en línea</h1>
        <?php
            // Simular datos de productos (reemplaza esto con tu lógica para recuperar los datos de tu base de datos)
            $productos = array(
                array("nombre" => "Producto 1", "descripcion" => "Descripción del producto 1", "precio" => 10, "existencias" => 5, "imagen" => "producto1.jpg"),
                array("nombre" => "Producto 2", "descripcion" => "Descripción del producto 2", "precio" => 20, "existencias" => 10, "imagen" => "producto2.jpg"),
                // Agrega más productos aquí
            );

            // Mostrar productos
            foreach ($productos as $producto) {
                echo "<div class='producto'>";
                echo "<img src='imagenes/{$producto['imagen']}' alt='{$producto['nombre']}'>";
                echo "<h2>{$producto['nombre']}</h2>";
                echo "<p>{$producto['descripcion']}</p>";
                echo "<p>Precio: {$producto['precio']} €</p>";
                echo "<p>Existencias: {$producto['existencias']}</p>";
                echo "<a href='producto.php?nombre={$producto['nombre']}'>Más información</a>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>