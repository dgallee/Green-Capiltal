<?php

function builtFormularioEditarProducto($name, $id, $res, $desc, $precio, $cat, $existencias, $esp, $img){
    return <<<EOS
    <form action="procesarEditarProducto.php" method="post">
    <fieldset>
    <div>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"  value="$name"/> 
    </div>
    <div>
        <label for="resumen">Resumen:</label>
        <input type="text" name="resumen" id="resumen"  value="$res"/>  
    </div>
    <div>
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" value= "$desc"/>
    </div>
    <div>
    <label for="precio">Precio:</label>
    <input type="text" name="precio" id="precio" value="$precio" pattern="^\d+(\.\d{1,2})?$" title="Por favor, introduce un número con hasta dos decimales.">
    </div>
    <div>
        <label for="categoria">Categoría:</label>
        <input type="text" name="categoria" id="categoria" value= "$cat"/>
    </div>

    <input type="hidden" name="id" value="$id">

    <div>
        <label for="especie">Especie:</label>
        <input type="text" name="especie" id="especie"  value="$esp"/>
    </div>
    <div>
        <label for="imagen">Imagen:</label>
        <input type="imagen" name="imagen" id="imagen" value="$img"/>
    </div>

    <button type="submit">Ingresar</button>
    </fieldset>
    </form>

    EOS;
}
?>