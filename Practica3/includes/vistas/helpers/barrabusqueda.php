<?php

require_once 'includes/config.php';

function buildFormularioBusqueda($itemname = '', $itemCat = '') {
    $ruta = RUTA_APP . "/procesarBusqueda.php";
    $categorias = Producto::getCategorias();

    $ret = <<<EOS
    <div class="contenedor-de-busqueda">
        <form method="get" action="$ruta" class="search-form">
            <div class="search-container">
                <input type="text" id="search-input" class="search-input" name="busqueda" placeholder="$itemname">
                <label for="search-input" class="search-label">Buscar:</label>
            </div>
        
            <div class="filter-container">
                <label for="filter1">Precio:</label>
                <span id="filter1-value">0€</span>
                <input type="range" id="filter1" name="filter1" min="0" max="100" step="0.1" value="100">  
                <span id="filter1-max">100€</span>
                
                

                <label for="filter2">Filtrar por categoría:</label>
                <select id="filter2" name="filter2" >
                <option value="">--Seleccionar categoría--</option>
EOS;
                    foreach ($categorias as $categoria) {
                        $ret .= <<<EOS
                        <option value="$categoria">$categoria</option>
EOS;
                    }
                    $ret .= <<<EOS
                </select>
                 
            </div>
            
            <div class="filter-butons">
                <button type="submit" class="search-button">Search</button>
                <div class="filter-item clear-all-button" id="clear-all-filters">Clear All</div>
            </div>
        </form>
    </div>
EOS;
    return $ret;
}

?>
