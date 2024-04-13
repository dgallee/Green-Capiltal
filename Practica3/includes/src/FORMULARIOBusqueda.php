<?php
namespace MiProyecto\Formularios;

require_once __DIR__.'\..\config.php';
require_once __DIR__.'/../vistas/helpers/tienda.php';
require_once __DIR__.'/../src/Formulario.php'; // Asegúrate de incluir el archivo donde está definida la clase Formulario
require_once "productosDAO.php";
require_once RAIZ_APP."/vistas/comun/layout.php";
use Aplicacion;
use mysqli;
use Producto;




class FormularioBusqueda extends Formulario {

    public function __construct() {
        parent::__construct('formSearch');
    }

    protected function generaCamposFormulario(&$datos)
    {
       // $busqueda = $datos['busqueda'] ?? '';

        $itemname='';
        $itemCat='';
        $categorias = Producto::getCategorias();
        $ruta=RUTA_APP . "/includes/vistas/comun/busqueda.php";

       // $ruta=RUTA_APP."/procesarBusqueda.php";


        $ret = <<<EOS
        <div class="contenedor-de-busqueda">
        <form method="get" action="$ruta" class="search-form">
            <div class="search-container">
                <input type="text" id="search-input" class="search-input" name="busqueda" placeholder="$itemname">
                <label for="search-input" class="search-label">Buscar:</label>
            </div>
        
            <div class="filter-container">
                <label for="filter1">Price:</label>
                <span id="filter1-value">0€</span>
                <input type="range" id="filter1" name="filter1" min="0" max="100" step="0,1" value="100">  
                <span id="filter1-max">100€</span>

                <label for="filter2"> Filter by category: </label>
                <select id="filter2" name="filter2" placeholder="$itemCat">
                <option value="">--Select category--</option>
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

    protected function procesaFormulario(&$datos)
    {
        $tituloPagina = 'procesarBusqueda';
        $busqueda = $datos['busqueda'] ?? '';
        $filter1 = $datos['filter1'] ?? '';
        $filter2 = $datos['filter2'] ?? '';

        $items = Producto::queryBusqueda($busqueda, $filter1, $filter2);
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

        $this->setRedirectUrl("procesarformulario.php?cont={$contenidoPrincipal}");
    }
}

?>
