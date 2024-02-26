<?php
require_once '../../config.php';
require_once RAIZ_APP.'/vistas/helpers/autorizacion.php';
require_once RAIZ_APP."/src/forms/form_item.php";
// D:\XAMPP\htdocs\proyectos\github\Proyecto_Entrega_2\includes

$a=RAIZ_APP;
$b = str_replace('includes', 'img/', $a);
$img_path = str_replace('\\', '/', $b);

$tituloPagina = 'Nuevo Item';

$nombreItem = $_POST["itemname"] ?? null;
$descripcion = $_POST["descripcion"] ?? null;

$target_file =  $img_path. basename($_FILES["image"]["name"]);

if (!estaLogado()) {
	Utils::paginaError(403, $tituloPagina, 'Usuario no conectado!', 'Debes iniciar sesión para ver el contenido.');
}
else{ 
    $conn = BD::getInstance()->getConexion();

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $db_img_path="img/".$_FILES["image"]["name"];

    $query = sprintf("INSERT INTO items (idUs,Nombre,Descripcion,Image) VALUES ({$_SESSION['idUsuario']},'$nombreItem','$descripcion','$db_img_path')");
    if($conn->query($query)){
        $contenidoPrincipal=<<<EOS
        <h1>Se ha registrado un nuevo item</h1>
        EOS;
    }else{
        $contenidoPrincipal=<<<EOS
        <h1>No se ha podido registrar el item</h1>
        EOS;
    }
}

require_once RAIZ_APP."/vistas/comun/layout.php";

