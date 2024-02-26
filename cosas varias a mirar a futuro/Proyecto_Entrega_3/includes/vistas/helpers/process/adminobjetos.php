<?php
// establecer conexión a la base de datos
require_once '../../../../includes/config.php';
require_once RAIZ_APP."/vistas/helpers/autorizacion.php";

$tituloPagina = 'adminobjetos';
$contenidoPrincipal = '';
$conn = new mysqli(BD_HOST,BD_USER,BD_PASS,BD_NAME);
if ($conn->connect_error){
    die("La conexión ha fallado" . $conn->connect_error);
}

if(esAdmin()){//es un administrador
    
    $sql = "SELECT * FROM items";//Coge todos los objetos
    $result = $conn->query($sql);
}
else{
  
    $sql = sprintf("SELECT * FROM items WHERE idUs=%d",$_SESSION['idUsuario']);
    $result = $conn->query($sql);
}
// Consulta SQL para obtener todos los objetos de la tabla


// Variable para almacenar el contenido principal


// Mostrar los objetos en una tabla HTML

$contenidoPrincipal .= "<table>";
$contenidoPrincipal .= "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Acciones</th></tr>";
while($row = $result->fetch_assoc()) {
    $contenidoPrincipal .= "<tr>";
    $contenidoPrincipal .= "<td>" . $row["id"] . "</td>";
    $contenidoPrincipal .= "<td>" . $row["Nombre"] . "</td>";
    $contenidoPrincipal .= "<td>" . $row["Descripcion"] . "</td>";
    $contenidoPrincipal .= "<td>";
    $contenidoPrincipal .= "<a href='editarobjeto.php?id=" . $row["id"] . "'>Editar  </a>";
    $contenidoPrincipal .= "<a href='borrarobjeto.php?id=" . $row["id"] . "' onclick='return confirm(\"¿Estás seguro de que deseas borrar este objeto?\")'> Borrar</a>";
    $contenidoPrincipal .= "</td>";
    $contenidoPrincipal .= "</tr>";
}
$contenidoPrincipal .= "</table>";

// Cierre de la conexión a la base de datos
$conn->close();

// Incluye el layout
require_once RAIZ_APP."/vistas/comun/layout.php";
?>

