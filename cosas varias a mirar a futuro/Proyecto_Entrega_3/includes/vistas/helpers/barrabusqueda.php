<?php

function buildFormularioBusqueda($itemname='')
{
    $ruta=RUTA_APP."/includes/src/process/procesarBusqueda.php";
    return <<<EOS
    <form method="get" action=$ruta>
        <label for="busqueda">Buscar item:</label>
        <input type="text" id="busqueda" name="busqueda">
        <button type="submit">Buscar</button>
    </form>
   
    EOS;
}