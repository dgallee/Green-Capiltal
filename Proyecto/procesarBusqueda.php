<?php
require_once 'includes/config.php';
use es\ucm\fdi\aw\productos\productosDAO;

    $tituloPagina = 'procesarBusqueda';

        $items = productosDAO::queryBusqueda();

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






