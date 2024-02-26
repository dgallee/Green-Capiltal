<?php
require_once '../autorizacion.php';
require_once '../../../config.php';
require_once RAIZ_APP.'/src/BD.php';

require_once RAIZ_APP."/vistas/helpers/forms/form_post.php";
$id = $_GET['id'];


$conn = BD::getInstance()->getConexion();
$query = sprintf("SELECT * FROM post WHERE idPost=%d",$id);
$post = $conn->query($query);
$post = $post->fetch_assoc();

$queryUser = sprintf("SELECT * FROM usuario u WHERE u.idusuario=%d",$post['idPropietario']);
$user = $conn->query($queryUser);
$user = $user->fetch_assoc();

$queryItem = sprintf("SELECT * FROM items i WHERE i.id=%d",$post['idItem']);
$item = $conn->query($queryItem);
$item = $item->fetch_assoc();


$productos=buildItemOptions();

$ruta=RUTA_APP."/includes/vistas/helpers/process/procesarExchange.php";

$contenidoPrincipal="";
            $img_route=RUTA_APP.'/'.$item['Image'];
            $contenidoPrincipal=<<<EOS
            <p>Propietario: $user[NombreApellido]</p>
            <p>Item: $item[Nombre]</p>
            
            <img src="$img_route" alt="$item[Nombre]" style="width:500px;height:500px;">
            <p>Descripcion: $item[Descripcion]</p>
            <p>Categorias Interesadas: $post[Categoria]</p>

            <h3>Hazle una oferta con tus objetos:</h3>

            <form id="formItem" action=$ruta method="POST">
            <fieldset>
                <legend>Escoge tu producto</legend>
                $productos

                <input type="hidden" name="idPost" value="$post[idPost]">
                <div><button type="submit">Subir</button></div>
            </fieldset>
            </form>
            EOS;



require_once RAIZ_APP."/vistas/comun/layout.php";


?>