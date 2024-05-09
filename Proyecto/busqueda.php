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

        if ($producto["Existencias"] > 0){
            
            $contenidoTienda .= <<<EOS
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
