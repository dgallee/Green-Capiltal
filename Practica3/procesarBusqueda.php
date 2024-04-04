<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/tienda.php';

$tituloPagina = 'procesarBusqueda';

$conn = new mysqli(BD_HOST,BD_USER,BD_PASS,BD_NAME);
    if ($conn->connect_error){
        die("La conexión ha fallado" . $conn->connect_error);
    }

// obtener el término de búsqueda ingresado en el formulario


$termino = isset($_GET["busqueda"]) ? trim($_GET["busqueda"]) : "";




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
        
        foreach ($items as $item) {
            
            if(isset($item)){
                $contenidoPrincipal = <<<EOS
                <h1 class="titulo-tienda">Tienda</h1>
                <p>$contenidoTienda</p>
                EOS;
            }
            else{
                $contenidoPrincipal = "<p>No se encontraron items.</p>";
            }
        }
        
    } else {
        $contenidoPrincipal = "<p>No se encontraron items.</p>";
    }
    
    require_once RAIZ_APP."/vistas/comun/layout.php";

} 
else {
    $items = [];
    $contenidoPrincipal = "<p>No se encontraron items.</p>";
    require_once RAIZ_APP."/vistas/comun/layout.php";
}
?>






