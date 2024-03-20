<?php

function buildFormularioBusqueda($itemname='')
{
    $ruta=RUTA_APP."/procesarBusqueda.php";
    //"/includes/src/process/procesarBusqueda.php"
    return <<<EOS
    <form method="get" action=$ruta>
        <label for="busqueda">Buscar:</label>
        <input type="text" id="busqueda" name="busqueda">
        <button type="submit">Buscar</button>
    </form>
   
    EOS;
}