<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'includes/src/FORMULARIOEditarProducto.php';
    require_once 'productosDAO.php';

    $tituloPagina = 'Editar';

    $id = $_GET['prod'];
    $prodEdit = Producto::search($id);

    if($prodEdit){
    
        $form = new MiProyecto\Formularios\FormularioEditarProducto($prodEdit->getNombre(), $prodEdit->getRes(), $prodEdit->getDesc(), $prodEdit->getPrecio(), $prodEdit->getCategoria(), $prodEdit->getId(), $prodEdit->getExistencias(), $prodEdit->getEspecie(), $prodEdit->getImagen());
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

