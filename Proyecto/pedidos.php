<?php
    require_once 'includes/config.php';
    use es\ucm\fdi\aw\pedidos\pedidosDAO;
    use es\ucm\fdi\aw\productos\productosDAO;
    use es\ucm\fdi\aw\valoraciones\valoracionesDAO;


    $tituloPagina = 'Mis pedidos';
    $DNI = $app->DNIUsuario();
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
    $dni=htmlspecialchars($pedido['DniUsuario']);
    //Scrollbar linea 19 a implementar en tienda?
    $tablaPedidos = <<<EOS
    <div style="width: 100%; height: 400px; overflow-y: scroll;">
    <table class="tablaPedidos">
    EOS;

    foreach ($pedidosAgrupados as $idPedido => $articulos) {
        $precioTotal = 0;
        $tablaPedidos .= <<<EOS
        <tr><td>Pedido con ID #$idPedido:</td><td></td><td></td><td></td><td></td><td></td></tr>
        EOS;
        foreach ($articulos as $articulo) {
            $idProducto = htmlspecialchars($articulo['IdProducto']);
            $infoProd = productosDAO::search($idProducto);
            $valoracion = valoracionesDAO::getValoracion($dni,$idProducto);
            $articuloPrecioTotal = htmlspecialchars($articulo['PrecioTotal']);
            $precioTotal += $articuloPrecioTotal;
            $accion = 'Editar';
            if($valoracion==''){
                $accion='Agregar';
            }
            $tablaPedidos .= <<<EOS
            <tr>
            <td> Artículo: {$infoProd->getNombre()}</td>
            <td> Precio: {$infoProd->getPrecio()}€ </td>
            <td> Cantidad: {$articulo['Unidades']}</td>
            <td> Precio total del artículo: {$articuloPrecioTotal} €</td>
            <td><img src='{$infoProd->getImagen()}' alt='' width='200'></td>
                <td><button type="button" class="botonvalorar" data-dni='{$dni}' data-idProducto='{$infoProd->getId()}' >$accion valoracion</button></td>
            </tr>
            EOS;
        }

        $tablaPedidos .= <<<EOS
        <tr><td>Precio total del pedido: $precioTotal €</td><td></td><td></td><td></td><td></td><td></td></tr>
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