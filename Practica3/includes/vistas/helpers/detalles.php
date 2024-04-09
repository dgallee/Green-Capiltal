<?php
function builtDetails($nombre, $id, $descripcion, $precio, $categoria, $existencias, $especie, $imagen) {
    $detalles = <<<EOS
    <div class='detalles'>
    <h1 class='titulo-tienda'>$nombre</h1>
    <img src='$imagen' alt='$nombre'>
    <p><strong></strong> $descripcion</p>
    <div class='linea-botón'>
        <p class='precio-existencias'><strong></strong> Precio: $precio €</p>
        <p class='precio-existencias'><strong></strong> Existencias: $existencias</p>
        <form id="form-cantidad" action="procesarAgregarCarrito.php" method="post">
            <input type="hidden" name="prodId" value=$id>
            <p>Unidades a comprar: <span id="unidades-comprar">1</span></p>
            <input type="hidden" id="cantidad" name="cantidad" value="1">
            <button type="button" id="btn-sumar">+</button>
            <button type="button" id="btn-restar">-</button>
            <button type="submit" id="btn-add-articulo">Agregar al carrito</button>
        </form>
    </div>
    <p class='categoria-especie'><strong></strong> Categoria: $categoria</p>
    <p class='categoria-especie'><strong></strong> Especie: $especie</p>
    </div>
    EOS;
    return $detalles;
}
?>

