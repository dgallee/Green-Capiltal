<?php

function builtFormularioAgregarProducto(){
    return <<<EOS
    <form action="procesarAgregarProducto.php" method="post" enctype="multipart/form-data">
    <fieldset>
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
    </div>
    <div>
        <label for="resumen">Resumen:</label>
        <input type="text" name="resumen" id="resumen" required>
    </div>
    <div>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" required>
    </div>
    <div>
    <label for="precio">Precio:</label>
    <input type="text" name="precio" id="precio" pattern="^\d+(\.\d{1,2})?$" title="Por favor, introduce un número con hasta dos decimales." required>
    </div>
    <div>
        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" id="categoria" required>
    </div>

    <div>
    <label for="existencias">Existencias:</label>
    <input type="number" name="existencias" id="existencias" required>
    </div>
    <div>
        <label for="especie">Especie:</label>
        <input type="text" name="especie" id="especie" required>
    </div>
    <div>
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" required>
    </div>
    <button type="submit">Ingresar</button>
    </fieldset>
    </form>

    EOS;
}
?>