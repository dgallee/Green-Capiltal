<?php
require_once 'includes/config.php';

$tituloPagina = 'procesarBusqueda';

$items = null;

$form = new es\ucm\fdi\aw\busqueda\FormularioBusqueda();

$formBusqueda = $form->gestiona();    
?>
<div class="busqueda">
  <?= $formBusqueda ?>
</div>

<?php
// Siempre muestra el formulario
$items = $form->getItems();

//Mirar si es de aplicacion
if (isset($items)) {
    // Si hay elementos, muestra el contenido de la tienda
    
    $contenidoTienda = <<<EOS
    
    <div class='container'>
    EOS;

    foreach($items as $producto) {
        if ($producto["Existencias"] > 0) {
            // Escapar los valores dinámicos antes de imprimirlos en la cadena HTML
            $nombreProducto = htmlspecialchars($producto["Nombre"]);
            $resumenProducto = htmlspecialchars($producto["Resumen"]);
            $precioProducto = htmlspecialchars($producto["Precio"]);
            $existenciasProducto = htmlspecialchars($producto["Existencias"]);
            $imagenProducto = htmlspecialchars($producto["Imagen"]);
            $idProducto = htmlspecialchars($producto["Id"]);
    
            // Concatenar los valores escapados en la cadena HTML
            $contenido .= <<<EOS
            <div class='producto'>
                <h2>{$nombreProducto}</h2>
                <p>{$resumenProducto}</p>
                <p>Precio: {$precioProducto}€</p>
                <p>Existencias: {$existenciasProducto} unidades</p>
                <img src='{$imagenProducto}' alt='{$nombreProducto}' width='200'>
                <a href='detalles.php?prod={$idProducto}' class='btn-comprar'>Comprar</a>
            </div>
            EOS;
        }
    }

    $contenidoTienda .= "</div>";

    foreach ($items as $item) {
        $contenidoPrincipal = <<<EOS
        <h1 class="titulo-tienda">Tienda</h1>
        <p>$contenidoTienda</p>
        EOS;
    }
} else {
        // Si no hay elementos, muestra un mensaje indicando que no se encontraron elementos
    
        $contenidoPrincipal = "<p id='busqueda-vacia'>No se encontraron items.</p>";
    
   
}

?>
