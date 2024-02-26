<?php
// establecer conexión a la base de datos

require_once '../../config.php';
require_once RAIZ_APP.'/vistas/helpers/autorizacion.php';


$tituloPagina = 'procesarBusqueda';


$conn = new mysqli(BD_HOST,BD_USER,BD_PASS,BD_NAME);
    if ($conn->connect_error){
        die("La conexión ha fallado" . $conn->connect_error);
    }

// obtener el término de búsqueda ingresado en el formulario
$termino = isset($_GET["busqueda"]) ? trim($_GET["busqueda"]) : "";

// buscar los items que contengan el término ingresado
if (!empty($termino)) {
    $query = "SELECT * FROM items WHERE Nombre LIKE ? OR Descripcion LIKE ?";
    $statement = $conn->prepare($query);
    $termino = "%".$termino."%";
    $statement->bind_param("ss", $termino, $termino);
    $statement->execute();
    $items = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

    
    
    if (!empty($items)) {
        $contenidoPrincipal = <<<EOS
            <table>
                <thead>
                    <tr>
                        
                        <th>Nombre</th>
                      
                    </tr>
                </thead>
                <tbody>
        EOS;
        
        foreach ($items as $item) {
            //get post related
            $query_post = sprintf("SELECT * FROM post p WHERE p.idPost=%d",$item['id']);
            $post = $conn->query($query_post);
            $post=$post->fetch_assoc();

            $post_detail_dir=RUTA_APP.'/includes/src/process/post_detail.php';

            if(isset($post['idPost'])){
                $contenidoPrincipal .= <<<EOS
                <tr>
                    <td><a href="$post_detail_dir?id=$post[idPost]">$item[Nombre]</a></br></td>
                </tr>
            EOS;
            }
            else{

                $contenidoPrincipal = "<p>No se encontraron items.</p>";
            }
            
        }
    
        $contenidoPrincipal .= <<<EOS
                </tbody>
            </table>
        EOS;
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






