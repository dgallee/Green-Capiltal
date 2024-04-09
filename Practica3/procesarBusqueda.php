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

if (isset($_GET["filter2"]) && $_GET["filter2"] != "") {
    $categoria = $_GET["filter2"];
    
}

if (isset($_GET["filter1"])) {
    $precio = $_GET["filter1"];
    // Ajusta esta parte según tu estructura de precios en la base de datos
  
}



$query = "SELECT * FROM productos WHERE 1";
// buscar los items que contengan el término ingresado
if (!empty($termino)) {
    
    
    $query .= " AND (Nombre LIKE ? OR Descripcion LIKE ?)";

    if (!empty($categoria)) {
        
        $query .= " AND Categoria = ?";
    }
    
    if (!empty($precio)) {
       
        $query .= " AND Precio <= ?";
    }
    
    $statement = $conn->prepare($query);
    $termino = "%".$termino."%";
    if(!empty($categoria)  and !empty($precio)){
        $statement->bind_param("sssd", $termino, $termino,$categoria, $precio);
        
    }
    else if(!empty($categoria)){
        $statement->bind_param("sss", $termino, $termino, $categoria);
    }
    else if(!empty($precio)){
        $statement->bind_param("ssd", $termino, $termino, $precio);
    }
    else{
        $statement->bind_param("ss", $termino, $termino);
    }

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
    if (!empty($categoria) || !empty($categoria)) {//busqueda sin termino 
        
        if (!empty($precio)) {//busqueda solo por precio
       
            $query .= " AND Categoria = ?";
        }
        if (!empty($precio)) {//busqueda solo por precio
       
            $query .= " AND Precio <= ?";
        }

        $statement = $conn->prepare($query);
        $termino = "%".$termino."%";
        if(!empty($categoria)  and !empty($precio)){
            $statement->bind_param("sd",$categoria, $precio);
            
        }
        else if(!empty($categoria)){
            $statement->bind_param("s", $categoria);
        }
        else if(!empty($precio)){
            $statement->bind_param("d", $precio);
        }
        
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

    else{
        
        $items = [];
        $contenidoPrincipal = "<p>No se encontraron items.</p>";
        require_once RAIZ_APP."/vistas/comun/layout.php";
    }
}
?>






