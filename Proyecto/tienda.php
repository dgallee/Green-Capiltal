<script src="./js/paginacion.js"></script>

<?php
    require_once "includes/config.php";
    use es\ucm\fdi\aw\productos\productosDAO;

    $tituloPagina = "Tienda en línea";
    $contenidoPrincipal = <<<EOS
    <h1>¡Bienvenido a nuestra tienda!</h1>
    EOS;

    $productos = productosDAO::showProducts();

    $contenido = <<<EOS
    <div class='container'>
    EOS;

    foreach($productos as $producto) {
        if ($producto["Existencias"] > 0){
            $contenido .= <<<EOS
            <div class='producto'>
            <h2>{$producto["Nombre"]}</h2>
            <p>{$producto["Resumen"]}</p>
            <p>Precio: {$producto["Precio"]}€</p>
            <p>Existencias: {$producto["Existencias"]} unidades</p>
            <img src='{$producto["Imagen"]}' alt='{$producto["Nombre"]}' width='200'>
            <a href='detalles.php?prod={$producto['Id']}' class='btn-comprar'>Comprar</a>
            </div>
            EOS;
        }
    }

    $contenido .= "</div>";
    
    $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $itemsPorPagina = 9;
    $numeroDePaginas = ceil(count($productos) / $itemsPorPagina);

    $contenido .= "<div id='paginacion'>";

    if ($paginaActual > 1) {
        $contenido .= "<a href='?pagina=" . ($paginaActual - 1) . "' id='botonAnterior'>Anterior</a>";
    }

    $inicioPaginas = max(1, $paginaActual - 2);
    $finPaginas = min($numeroDePaginas, $inicioPaginas + 3);
    for ($i = $inicioPaginas; $i <= $finPaginas; $i++) {
        $contenido .= "<a href='?pagina=$i' id='pagina$i' class='botonPagina'>$i</a>";
    }

    if ($paginaActual < $numeroDePaginas) {
        $contenido .= "<a href='?pagina=" . ($paginaActual + 1) . "' id='botonSiguiente'>Siguiente</a>";
    }

    $contenido .= "</div>";

    $contenidoPrincipal = <<<EOS
    <h1 class="titulo-tienda">Tienda</h1>
    <p>$contenido
    EOS;

    require('includes/vistas/comun/layout.php');
?>
