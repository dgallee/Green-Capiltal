<?php
require_once '../../../../includes/config.php';
require_once RAIZ_APP."/vistas/helpers/autorizacion.php";
require_once RAIZ_APP."/vistas/helpers/forms/form_post.php";
// require_once RAIZ_APP."/src/usuarios/bd/post.php";
$tituloPagina = 'Nuevo Post';

$idItem = $_POST["Productos"] ?? null;
$categoria = $_POST["Categoria"] ?? null;

if (!estaLogado()) {
	Utils::paginaError(403, $tituloPagina, 'Usuario no conectado!', 'Debes iniciar sesión para ver el contenido.');
}
else{ 

    $conn = BD::getInstance()->getConexion();
    $queryItem = sprintf("SELECT * FROM items i WHERE i.id=%d",$idItem);
    $item = $conn->query($queryItem);
    $item = $item->fetch_assoc();

    // $exists=Post::buscaPost($item['id']);
    $queryExists=sprintf("SELECT * FROM post p WHERE p.idItem=%d",$idItem);
    $rs = $conn->query($queryExists);
    $rs =$rs->fetch_assoc();
    if($rs){
        $contenidoPrincipal=<<<EOS
        <h1>$idItem</h1>
        <h1>$$item[Nombre]</h1>
        <h1>$$rs[idItem]</h1>
        <h1>El item ya esta en un post</h1>
        EOS;
    }
    else{
    $queryPost = sprintf("INSERT INTO post (idPropietario,idItem,Categoria) VALUES ($item[idUs], $item[id], '$categoria')");
    if($conn->query($queryPost)){
        $contenidoPrincipal=<<<EOS
        <h1>Se ha registrado un nuevo post</h1>
        EOS;
    }else{
        $contenidoPrincipal=<<<EOS
        <h1>No se ha podido registrar el nuevo post</h1>
        EOS;
    }
    }
}

require_once RAIZ_APP."/vistas/comun/layout.php";