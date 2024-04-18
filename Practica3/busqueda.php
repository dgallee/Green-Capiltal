<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';
require_once 'productosDAO.php';
require_once 'includes/src/FORMULARIOBusqueda.php';

$tituloPagina = 'procesarBusqueda';


$items = null;

$form = new MiProyecto\Formularios\FormularioBusqueda();

$formBusqueda = $form->gestiona();    
?>
<div class="busqueda">
  <?= $formBusqueda ?>
</div>

<?php
// Siempre muestra el formulario
$items = $form->getItems();

if (isset($items)) {
    // Si hay elementos, muestra el contenido de la tienda
    
    $contenidoTienda = builtContent($items);
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
