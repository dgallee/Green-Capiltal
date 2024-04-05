<?php
function builtDetails($nombre, $id, $descripcion, $precio, $categoria, $existencias, $especie, $imagen) {
    $detalles = <<<EOS
<div class='detalles'>
    <h1 class='titulo-tienda'>$nombre</h1>
    <img src='$imagen' alt='$nombre'>
    <p><strong></strong> $descripcion</p>
    <div class='linea-botón'>
        <p class='precio-existencias'><strong></strong> $precio</p>
        <p class='precio-existencias'><strong></strong> $existencias</p>
        <form action='carrito.php' method='post'>
            <input type='hidden' name='id' value='$id'>
            <button type='submit'>Agregar al carrito</button>
        </form>
    </div>
    <p class='categoria-especie'><strong></strong> $categoria</p>
    <p class='categoria-especie'><strong></strong> $especie</p>
</div>
EOS;
    return $detalles;
}
?>

