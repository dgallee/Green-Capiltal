<?php
namespace es\ucm\fdi\aw\busqueda;

use es\ucm\fdi\aw\productos\productosDAO;
use es\ucm\fdi\aw\Formulario;

class FormularioBusqueda extends Formulario {


    private $items;

    public function __construct() {
        $this->items = [];
        parent::__construct('formSearch', ['urlRedireccion' => 'tienda.php']);
    }

    protected function generaCamposFormulario(&$datos)
    {
       // $busqueda = $datos['busqueda'] ?? '';

        $itemname='';
        $itemCat='';
        $categorias = productosDAO::getCategorias();
        // $ruta=RUTA_APP . "/includes/vistas/comun/busqueda.php";

       // $ruta=RUTA_APP."/procesarBusqueda.php";


        $ret = <<<EOS
        <div class="contenedor-de-busqueda">
        
            <div class="search-container">
                <input type="text" id="search-input" class="search-input" name="busqueda" placeholder="$itemname">
                <label for="search-input" class="search-label">Buscar:</label>
            </div>
        
            <div class="filter-container">
                <label for="filter1">Precio:</label>
                <span id="filter1-value">0€</span>
                <input type="range" id="filter1" name="filter1" min="0.1" max="100" step="0.1" value="100">  
                <span id="filter1-max">100€</span>

                <label for="filter2"> Filtrar por categoría: </label>
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
                <button type="submit" class="search-button">Buscar</button>
                <div class="filter-item clear-all-button" id="clear-all-filters">Limpiar Filtros</div>
            </div>
     
    </div>
    EOS;
        return $ret;
    }

    protected function procesaFormulario(&$datos)
    {

        
        $tituloPagina = 'procesarBusqueda';
        $busqueda = $datos['busqueda'] ?? '';
        $filter1 = $datos['filter1'] ?? '';
        $filter2 = $datos['filter2'] ?? '';


        
        $items = productosDAO::queryBusqueda($busqueda, $filter1, $filter2);

        if (!empty($items)) {
            
           return $items;
            
        } else {

            return null;

        }
    }

    public function gestiona(){
        // Obtener los datos del formulario (POST o GET)
        $datos = &$_POST;
        if (strcasecmp('GET', $this->method) == 0 ) {
            $datos = &$_GET;
        }

        $this->errores = [];

        

        // Verificar si el formulario no ha sido enviado
        if (!$this->formularioEnviado($datos)) {
            return $this->generaFormulario();
        }

        // Procesar el formulario y obtener los items
        $items = $this->procesaFormulario($datos);
        $this->items = $items;

        // Verificar si se han devuelto items
        if (!empty($items)) {
            // Si se encontraron resultados, no modificamos la variable $items y devolvemos el formulario
            
            return $this->generaFormulario($datos);
            
        } else {
            // Si no hay items, generar nuevamente el formulario con algún mensaje indicando que no se encontraron resultados
           
            $this->errores['global'] = 'No se encontraron resultados para la búsqueda.';
            return $this->generaFormulario($datos);
            
        }
    }

    public function getItems() {
        return $this->items;
    }



}

?>


