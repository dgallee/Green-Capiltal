<?php
// Establecer conexión a la base de datos
require_once '../../config.php';
require_once RAIZ_APP.'/vistas/helpers/autorizacion.php';

// Verificar que se ha enviado un ID válido por GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Si no hay un ID válido, redirigir al listado de objetos
    header("Location: adminusuario.php");
    exit();
}

// Obtener el ID del objeto a borrar
$idUser = $_GET['id'];

if($idUser==$_SESSION['idUsuario']){

    $contenidoPrincipal=<<<EOS
    <h1>No te puedes borrar a ti mismo como admin desde aqui</h1>
    <h1>Hazlo desde la terminal de la base de datos</h1>
    EOS;
    require_once RAIZ_APP."/vistas/comun/layout.php";


}
else{// Conectar a la base de datos
$conn = new mysqli(BD_HOST,BD_USER,BD_PASS,BD_NAME);
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Consulta SQL para borrar el objeto con el ID especificado
$sql = "DELETE FROM usuario WHERE idusuario = $idUser";

if ($conn->query($sql) === TRUE) {
    // Si se ha borrado el objeto, redirigir al listado de objetos
    header("Location: adminusuario.php");
    exit();
} else {
    // Si ha habido un error al borrar el objeto, mostrar un mensaje de error
    echo "Error al borrar el usuario: " . $conn->error;

}
$conn->close();
}
// Cerrar la conexión a la base de datos

?>
