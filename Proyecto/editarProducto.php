<?php
    require_once 'includes/config.php';
    use es\ucm\fdi\aw\productos\productosDAO;
    $tituloPagina = 'Editar';

    $id = htmlspecialchars($_GET['prod']);
    $prodEdit = productosDAO::search($id);

    if($prodEdit){
    
        $form = new es\ucm\fdi\aw\productos\FormularioEditarProducto($prodEdit->getNombre(), $prodEdit->getRes(), $prodEdit->getDesc(), $prodEdit->getPrecio(), $prodEdit->getCategoria(), $prodEdit->getId(), $prodEdit->getExistencias(), $prodEdit->getEspecie(), $prodEdit->getImagen());
        $formEdit= $form->gestiona();
    } else {
        echo "El producto no existe.";
        $infoant= "";
    }

    $contenidoPrincipal=<<<EOS
    <h1>Editar productos</h1>
    $formEdit
    EOS;

    require 'includes/vistas/comun/layout.php';
?>

