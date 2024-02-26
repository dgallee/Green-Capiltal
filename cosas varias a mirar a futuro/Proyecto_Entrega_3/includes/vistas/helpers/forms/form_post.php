<?php

function buildFormularioPost($username='', $password='')
{
    $productos = buildItemOptions();
    $ruta=RUTA_APP."/includes/vistas/helpers/process/procesarPost.php";
    return <<<EOS
    <form id="formItem" action=$ruta method="POST">
        <fieldset>
            <legend>Publicar un nuevo Post</legend>
            $productos
            <div><label>Categoria:</label>
            <select name="Categoria">
            <option value= "electrodomesticos"> Electrodomesticos </options>
            <option value= "ropa"> Ropa </options>
            </select></div>
            <div><button type="submit">Subir</button></div>
        </fieldset>
    </form>
   
    EOS;
}

function buildItemOptions(){
    $seleccionProductos = "";

    $conn = BD::getInstance()->getConexion();
    $query = sprintf("SELECT * FROM items i WHERE i.idUs=%d", $_SESSION['idUsuario']);
    $items = $conn->query($query);

    if($items){

        foreach($items as $item){
            $singleItem =<<<EOS
            <option value= "$item[id]"> $item[Nombre]</option>
            EOS;
            $seleccionProductos=$seleccionProductos.$singleItem;
        }

    }else{

        $error = "No se ha podido obtener la lista con tus productos";
        $seleccionProductos=$seleccionProductos.$error;

    }

    return <<<EOS
    <div><label>Mis Productos:</label>
    <select name="Productos">
    $seleccionProductos
    </select></div>
    EOS;
}
