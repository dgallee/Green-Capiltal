<?php

function buildFormularioItem($itemname='', $descripcion='',$image='')
{
    $ruta=RUTA_APP."/includes/vistas/helpers/process/procesarItem.php";
    return <<<EOS
    <form id="formItem" action=$ruta method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Subir nuevo Item</legend>
            <div><label>Name:</label> <input type="text" name="itemname" /></div>
            <div><label>Descripcion:</label> <textarea name="descripcion" rows="4" cols="50"></textarea></div>
            <div><label>Image:</label> <input type="file" name="image" id="image" /></div>
            <div><button type="submit">Subir</button></div>
        </fieldset>
    </form>
   
    EOS;
}