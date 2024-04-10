<?php
namespace MiProyecto\Formularios;

require_once __DIR__.'\..\config.php';
require_once __DIR__.'/../vistas/helpers/tienda.php';
require_once __DIR__.'/../src/Formulario.php'; // Asegúrate de incluir el archivo donde está definida la clase Formulario
use Aplicacion;
use mysqli;



class FormularioBusqueda extends Formulario {

    public function __construct() {
        parent::__construct('formSearch');
    }
    function getCategorias() {
        $conn = Aplicacion::getInstance()->getConexionBD();
        $sql = "SELECT Categoria FROM productos";
        $resultado = $conn->query($sql);
        $categorias = array();
    
        while ($fila = $resultado->fetch_assoc()) {
            $categorias[] = $fila['Categoria'];
        }
    
        // Elimina duplicados
        $categorias = array_unique($categorias);
    
        return $categorias;
    }
    



    protected function generaCamposFormulario(&$datos)
    {
       // $busqueda = $datos['busqueda'] ?? '';

       $itemname='';
       $itemCat='';
        $categorias = getCategorias();
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
                    <span id="filter1-value">0</span>
                    <input type="range" id="filter1" name="filter1" min="0" max="100" step="0,1" value="100">  
                    <span id="filter1-max">100</span>
                    
                    
    
                    <label for="filter2">Filter by category:</label>
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
        $conn = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
        if ($conn->connect_error){
            die("La conexión ha fallado" . $conn->connect_error);
        }
      

        // obtener el término de búsqueda ingresado en el formulario
        $termino = isset($datos["busqueda"]) ? trim($datos["busqueda"]) : "";

        // buscar los items que contengan el término ingresado
        if (!empty($termino)) {
            $query = "SELECT * FROM productos WHERE Nombre LIKE ? OR Descripcion LIKE ?";
            $statement = $conn->prepare($query);
            $termino = "%".$termino."%";
            $statement->bind_param("ss", $termino, $termino);
            $statement->execute();
            $items = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

            if (!empty($items)) {
                $contenidoTienda = builtContent($items);
                return <<<EOS
                <h1 class="titulo-tienda">Tienda</h1>
                <p>$contenidoTienda</p>
                EOS;
            
            } else {
               
                return "<p>No se encontraron items.</p>";
            }
        } else {
            return "<p>No se encontraron items.</p>";
           

        }

       
    }
}

?>
