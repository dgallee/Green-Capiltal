<?php
require_once 'includes/config.php';
require_once 'includes/vistas/helpers/autorizacion.php';

$tituloPagina = 'Posts';
$page = $_GET['page'];
if(!isset($page)){
    $page=1;
}
if($page<1){
    $page=1;
}

$contenidoPrincipal="";
if (!estaLogado()) {
	Utils::paginaError(403, $tituloPagina, 'Usuario no conectado!', 'Debes iniciar sesión para ver el contenido.');
}
else{
    $offset=($page-1)*5;
    $conn = BD::getInstance()->getConexion();
    // $query = sprintf("SELECT * FROM post p WHERE idPost BETWEEN 1+($page-1)*5 AND $page*5");
    $query = sprintf("SELECT * FROM post LIMIT 5 OFFSET $offset");

    $posts = $conn->query($query);

    $RUTACSS=RUTA_CSS."/grids.css";
    $SinglePost=<<<EOS
    <head>
    <title>Posts</title>
    <link rel="stylesheet" type="text/css" href=$RUTACSS>
    </head>

    EOS;

    $next_page_dir=RUTA_APP."/post.php";//el ref se pone page=x
    if($posts){

        foreach($posts as $post){
           
            //ideal hacer un buildquery o algo
            $queryUser = sprintf("SELECT * FROM usuario u WHERE u.idusuario=%d",$post['idPropietario']);
            $user = $conn->query($queryUser);
            $user = $user->fetch_assoc();

            $queryItem = sprintf("SELECT * FROM items i WHERE i.id=%d",$post['idItem']);
            $item = $conn->query($queryItem);
            $item = $item->fetch_assoc();

            //meter link al post clase nueva?
            //<a href="post_detail.php?id=echo $post['idPost']">$item[Nombre]</a>
            // <p>Item: $item[Nombre]</p>
            
            if($item['Image']=="img/"){//no tiene image
                $item['Image']="img/no_image.png";
            }
            $post_detail_dir=RUTA_APP.'/includes/src/process/post_detail.php';
           


            $SinglePost.=<<<EOS
            <div class="grid-container">
            <div class="grid-item">
    
            <a href="$post_detail_dir?id=$post[idPost]">$item[Nombre]</a></br>
            <img src="$item[Image]" alt="$item[Nombre]">
            <p>Categorias Interesadas: $post[Categoria]</p>
            </div>
            EOS;
            //concatenar contenido
            //Ruta de la image :img/imagen_prueba.png
           


        }
        $next_page_dir=RUTA_APP."/post.php";
        $npage=$page+1;
        $ppage=$page-1;
        $contenidoPrincipal.=<<<EOS
    
        <div class="page-navigation">
        <div class="previous-page">
        <a href="$next_page_dir?page=$ppage">Previous Page</a></br>
        </div>
        <div class="next-page">
        <a href="$next_page_dir?page=$npage">Next Page</a></br>
        </div>
        </div>
        
        EOS;
        $contenidoPrincipal=$contenidoPrincipal.$SinglePost;
    }

}
//  <a href="$next_page_dir?page=$npage">Next Page</a></br>

require 'includes/vistas/comun/layout.php';
