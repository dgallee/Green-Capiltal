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

    foreach($items as $item) {

        if ($item["Existencias"] > 0){
            
            $contenidoTienda .= <<<EOS
            <div class='item'>
            <h2>{$item["Nombre"]}</h2>
            <p>{$item["Resumen"]}</p>
            <p>Precio: {$item["Precio"]}€</p>
            <p>Existencias: {$item["Existencias"]} unidades</p>
            <img src='{$item["Imagen"]}' alt='{$item["Nombre"]}' width='200'>
            <a href='detalles.php?prod={$item['Id']}' class='btn-comprar'>Comprar</a>
            </div>
            EOS;
        }
    }

    $contenidoTienda .= "</div>";


    foreach ($items as $item) {
        $contenidoPrincipal = <<<EOS
        <h1 class="titulo-tienda">Tienda</h1>
        <p>$contenidoTienda
        EOS;
    }
} else {
        // Si no hay elementos, muestra un mensaje indicando que no se encontraron elementos
    
        $contenidoPrincipal = "<p id='busqueda-vacia'>No se encontraron items.</p>";
    
   
}

?>
