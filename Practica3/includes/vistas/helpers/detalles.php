<?php
function builtDetails($nombre, $id, $descripcion, $precio, $categoria, $existencias, $especie, $imagen) {
    
    $detalles = "<div class='detalles'>";
    $detalles .= "<h1 class='titulo-tienda'>$nombre</h1>";
    $detalles .= "<img src='$imagen' alt='$nombre'>";
    $detalles .= "<p><strong>Precio:</strong> $precio</p>";
    $detalles .= "<p><strong>Categoría:</strong> $categoria</p>";
    $detalles .= "<p><strong>Existencias:</strong> $existencias</p>";
    $detalles .= "<p><strong>Especie:</strong> $especie</p>";
    $detalles .= "<p><strong>Descripción:</strong> $descripcion</p>";

    $detalles .= "<form action='carrito.php' method='post'>";
    $detalles .= "<input type='hidden' name='id' value='$id'>";
    $detalles .= "<button type='submit'>Agregar al carrito</button>";
    $detalles .= "</form>";
    $detalles .= "</div>";
    return $detalles;
}
?>

