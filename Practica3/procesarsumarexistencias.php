<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/adminProductos.php';


$tituloPagina = 'procesarsumarexistencias';

$conn = new mysqli(BD_HOST,BD_USER,BD_PASS,BD_NAME);
    if ($conn->connect_error){
        die("La conexión ha fallado" . $conn->connect_error);
    }

// obtener el término de búsqueda ingresado en el formulario

$id_item = isset($_POST["id"]) ? $_POST["id"] : null;
$cantidad = isset($_POST["cantidad"]) ? $_POST["cantidad"] : null;

// buscar los items que contengan el término ingresado
if (!empty($cantidad)) {
    
    
    $query = "UPDATE productos SET existencias = existencias + ? WHERE id = ?";
   
    
    $statement = $conn->prepare($query);
    $statement->bind_param("ii", $cantidad, $id_item);
    $statement->execute();
    

    header('Location: adminProductos.php');


    require_once RAIZ_APP."/vistas/comun/layout.php";

} 
else {

}
?>