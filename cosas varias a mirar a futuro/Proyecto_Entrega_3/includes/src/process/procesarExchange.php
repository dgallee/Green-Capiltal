<?php
require_once '../../config.php';
require_once RAIZ_APP.'/vistas/helpers/autorizacion.php';
$tituloPagina = 'Nuevo Post';

$idItem = $_POST["Productos"] ?? null;
$idPost= $_POST["idPost"] ?? null;


if (!estaLogado()) {
	Utils::paginaError(403, $tituloPagina, 'Usuario no conectado!', 'Debes iniciar sesión para ver el contenido.');
}
else{ 

    // $a="";
    // foreach ($_POST as $key => $value) {
    //     $a=$a."Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
    // }
    
    $conn = BD::getInstance()->getConexion();
    $queryItem = sprintf("SELECT * FROM items i WHERE i.id=%d",$idItem);
    $item = $conn->query($queryItem);
    $item = $item->fetch_assoc();


    //comprobacion de que el item que ofreces no este ofrecido 2 veces
    $queryExchange = sprintf("SELECT * FROM exchanges e WHERE e.id_exchanged_item=%d",$idItem);
    $ex = $conn->query($queryExchange);

    // if(isset($ex)){
    //     $contenidoPrincipal=<<<EOS
    //     <h1>El item que has puesto ya esta en la lista de intercambios</h1>
    //     EOS;
    // }
    // else{
    $queryPost = sprintf("INSERT INTO exchanges (idpost,id_exchanged_item,confirmation) VALUES ($idPost, $idItem, FALSE)");
    if($conn->query($queryPost)){
        $contenidoPrincipal=<<<EOS
        <h1>Has ofrecido tu $item[Nombre]</h1>
        EOS;
    }else{
        $contenidoPrincipal=<<<EOS
        <h1>No se ha podido hacer el intercambio</h1>
        EOS;
    }
    

    
}

require_once RAIZ_APP."/vistas/comun/layout.php";

