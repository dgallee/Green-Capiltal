<?php
// establecer conexión a la base de datos

require_once '../../config.php';
require_once RAIZ_APP.'/vistas/helpers/autorizacion.php';

$tituloPagina = 'adminobjetos';

$conn = new mysqli(BD_HOST,BD_USER,BD_PASS,BD_NAME);
if ($conn->connect_error){
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Comprobar si se ha enviado el formulario de actualización
if(isset($_POST['actualizar'])) {
    
    
    $id = $_POST['id'];
    $nombre = $_POST['Nombre'];
    $descripcion = $_POST['Descripcion'];
    $db_img_path="img/".$_FILES["image"]["name"];
    
    // Actualizar los datos en la base de datos

    
    $sql = "UPDATE items SET Nombre='$nombre', Descripcion='$descripcion',Image='$db_img_path'WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Los datos han sido actualizados con éxito.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener el ID del objeto a editar
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del objeto
    $sql = "SELECT * FROM items WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre = $row['Nombre'];
        $descripcion = $row['Descripcion'];
    } else {
        echo "No se ha encontrado ningún objeto con ese ID.";
    }
}
?>

<?php ob_start(); ?>
<h2>Editar objeto</h2>

<form id="formItem" action="editarobjeto.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>cambiar tu objeto</legend>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div>
            <label for="Nombre">Nombre:</label>
            <input type="text" name="Nombre" value="<?php echo $nombre; ?>"><br>
            <div><label for="Image">Image:</label> <input type="file" name="image" id="image" /></div>
            </div>
            <label for="Descripcion">Descripción:</label>
            <textarea name="Descripcion"><?php echo $descripcion; ?></textarea><br>
            <input type="submit" name="actualizar" value="Actualizar datos">
            </div>
        </fieldset>
    </form>

<?php
$contenidoPrincipal = ob_get_clean();

// Cierre de la conexión a la base de datos
$conn->close();

// Incluye el layout
require_once RAIZ_APP."/vistas/comun/layout.php";
?>

