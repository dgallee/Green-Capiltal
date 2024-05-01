<?php
    require_once 'includes/config.php';
    use es\ucm\fdi\aw\pedidos\pedidosDAO;
    use es\ucm\fdi\aw\productos\productosDAO;
    use es\ucm\fdi\aw\valoraciones\valoracionesDAO;


    $tituloPagina = 'Mis pedidos';
    $DNI = $_SESSION["DNI"];
    $pedidos = pedidosDAO::mostrarPedidos($DNI);


    if($pedidos){
    
        $pedidosAgrupados = [];
        foreach ($pedidos as $pedido) {
            $idPedido = $pedido['Id'];
            if (!isset($pedidosAgrupados[$idPedido])) {
                $pedidosAgrupados[$idPedido] = [];
            }
        $pedidosAgrupados[$idPedido][] = $pedido;
    }
    $dni=$pedido['DniUsuario'];
    //Scrollbar linea 19 a implementar en tienda?
    $tablaPedidos = <<<EOS
    <div style="width: 100%; height: 400px; overflow-y: scroll;">
    <table class="tablaPedidos">
    EOS;

    foreach ($pedidosAgrupados as $idPedido => $articulos) {
        $precioTotal = 0;
        $tablaPedidos .= <<<EOS
        <tr>
        <tr><td>Pedido con ID #$idPedido:</td></tr>
        EOS;
        foreach ($articulos as $articulo) {
            $idProducto = $articulo['IdProducto'];
            $infoProd = productosDAO::search($idProducto);
            $valoracion = valoracionesDAO::getValoracion($dni,$idProducto);
            $articuloPrecioTotal = $articulo['PrecioTotal'];
            $precioTotal += $articuloPrecioTotal;
            $accion = 'Editar';
            if($valoracion==''){
                $accion='Agregar';
            }
            $tablaPedidos .= <<<EOS
            <tr>
            <td> Artículo: {$infoProd->getNombre()}</td>
            <td> Precio: {$infoProd->getPrecio()} €</td>
            <td> Cantidad: {$articulo['Unidades']}</td>
            <td> Precio total del artículo: {$articuloPrecioTotal} €</td>
            <td><img src='{$infoProd->getImagen()}' alt='' width='200'></td>
                <td><button type="button" class="botonvalorar" dni='{$dni}' idProducto='{$infoProd->getId()}' >$accion valoracion</button></td>
            </tr>
            EOS;
        }

        $tablaPedidos .= <<<EOS
        <tr><td>Precio total del pedido: $precioTotal €</td></tr>
        </tr>
        EOS;
    }

    $tablaPedidos .= "</table>";
    $tablaPedidos .= "</div>";

    
    } else {
        $tablaPedidos = '<div class="descripcion2">No ha realizado aún ningún pedido en nuestra web.
        Acceda a nuestra <a href="tienda.php">tienda</a> para empezar a disfrutar de nuestros impresionantes productos</div>';
    }

    $contenidoPrincipal=<<<EOS
    <h1 class="titulo-tienda">Mis pedidos</h1>
    $tablaPedidos
    EOS;

    require 'includes/vistas/comun/layout.php';
?>