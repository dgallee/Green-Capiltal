<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/tienda.php';

    $tituloPagina = 'procesarBusqueda';

        $items = Producto::queryBusqueda();

        if (!empty($items)) {
            
            $contenidoTienda = builtContent($items);
            
            foreach ($items as $item) {
                
                if(isset($item)){
                    $contenidoPrincipal = <<<EOS
                    <h1 class="titulo-tienda">Tienda</h1>
                    <p>$contenidoTienda</p>
                    EOS;
                }
                else{
                   
                    $contenidoPrincipal = "<p id='busqueda-vacia'>No se encontraron items.</p>";

                }
            }
            
        } else {

            
            
            $contenidoPrincipal = "<p id='busqueda-vacia'>No se encontraron items.</p>";

        }
        
        require_once RAIZ_APP."/vistas/comun/layout.php";

        
?>






