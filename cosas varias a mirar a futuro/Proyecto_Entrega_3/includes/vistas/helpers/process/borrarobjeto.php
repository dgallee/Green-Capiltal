<?php
// Establecer conexión a la base de datos
require_once '../../../../includes/config.php';

// Verificar que se ha enviado un ID válido por GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Si no hay un ID válido, redirigir al listado de objetos
    header("Location: adminobjetos.php");
    exit();
}

// Obtener el ID del objeto a borrar
$idObjeto = $_GET['id'];

// Conectar a la base de datos
$conn = new mysqli(BD_HOST,BD_USER,BD_PASS,BD_NAME);
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Consulta SQL para borrar el objeto con el ID especificado
$sql = "DELETE FROM items WHERE id = $idObjeto";

if ($conn->query($sql) === TRUE) {
    // Si se ha borrado el objeto, redirigir al listado de objetos
    header("Location: adminobjetos.php");
    exit();
} else {
    // Si ha habido un error al borrar el objeto, mostrar un mensaje de error
    echo "Error al borrar el objeto: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
