<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/vistas/helpers/editarProducto.php';
    require_once 'productosDAO.php';

    $tituloPagina = 'Editar';

    $id = $_GET['prod'];
    $prodEdit = Producto::search($id);

    if($prodEdit){
    
        $formEdit = builtFormularioEditarProducto($prodEdit->getNombre(), $prodEdit->getId(), $prodEdit->getRes(), $prodEdit->getDesc(), $prodEdit->getPrecio(), $prodEdit->getCategoria(), $prodEdit->getExistencias(), $prodEdit->getEspecie(), $prodEdit->getImagen());
    
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

